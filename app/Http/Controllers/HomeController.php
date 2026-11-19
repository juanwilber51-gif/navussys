<?php
// Define el archivo como script PHP de Laravel
namespace App\Http\Controllers;
// Importa el modelo Categoria para consultar los rubros de sistemas
use App\Models\Categoria;
// Importa el modelo Sistema para consultar los sistemas web en venta
use App\Models\Sistema;
// Importa el modelo Pedido para registrar las cotizaciones solicitadas
use App\Models\Pedido;
// Importa el modelo MensajeContacto para almacenar los mensajes del formulario
use App\Models\MensajeContacto;
// Importa la clase Request para recibir parametros HTTP
use Illuminate\Http\Request;
// Importa la clase JsonResponse para tipar la respuesta de la API
use Illuminate\Http\JsonResponse;
// Importa el Facade Response para generar respuestas JSON sin errores de tipado
use Illuminate\Support\Facades\Response;

// Controlador principal encargado de la vista publica y de procesar solicitudes del cliente
class HomeController extends Controller
{
    // Metodo principal que renderiza la portada publica con los sistemas y categorias
    public function index(Request $request)
    {
        // Obtiene el parametro de filtro por categoria enviado por URL
        $cat = $request->get('cat', '');
        // Obtiene el termino de busqueda textual
        $search = $request->get('q', '');
        // Obtiene el criterio de orden seleccionado
        $order = $request->get('order', 'destacado');

        // Inicializa la consulta Eloquent cargando la relacion categoria y filtrando solo sistemas activos
        $query = Sistema::with('categoria')->where('estado', true);

        // Verifica si se envio un filtro valido de categoria
        if (!empty($cat) && $cat !== 'todos') {
            // Aplica el filtro en la relacion de categoria mediante su slug
            $query->whereHas('categoria', function ($q) use ($cat) {
                // Compara el slug de la categoria con el parametro
                $q->where('slug', $cat);
            });
        }

        // Verifica si el usuario envio un termino de busqueda
        if (!empty($search)) {
            // Agrupa las condiciones de busqueda con OR
            $query->where(function ($q) use ($search) {
                // Busca coincidencia en el nombre del sistema
                $q->where('nombre', 'like', "%{$search}%")
                  // O busca coincidencia en la descripcion corta
                  ->orWhere('descripcion_corta', 'like', "%{$search}%")
                  // O busca coincidencia en las tecnologias utilizadas
                  ->orWhere('tecnologias', 'like', "%{$search}%");
            });
        }

        // Condicional para ordenar por precio de menor a mayor
        if ($order === 'precio_asc') {
            // Ordena ascendentemente por precio base
            $query->orderBy('precio_base', 'asc');
        // Condicional para ordenar por precio de mayor a menor
        } elseif ($order === 'precio_desc') {
            // Ordena descendentemente por precio base
            $query->orderBy('precio_base', 'desc');
        // Condicional para ordenar por los mas populares
        } elseif ($order === 'populares') {
            // Ordena descendentemente por cantidad de ventas e implementaciones
            $query->orderBy('ventas_count', 'desc');
        // Ordenamiento por defecto
        } else {
            // Ordena priorizando los destacados y luego los mas recientes
            $query->orderBy('destacado', 'desc')->orderBy('id', 'desc');
        }

        // Ejecuta la consulta y obtiene la coleccion de sistemas
        $sistemas = $query->get();
        // Obtiene todas las categorias activas ordenadas alfabeticamente
        $categorias = Categoria::where('estado', true)->orderBy('nombre')->get();

        // Construye un arreglo asociativo con metricas generales del sitio
        $stats = [
            // Cuenta la cantidad total de sistemas activos
            'total_sistemas' => Sistema::where('estado', true)->count(),
            // Cuenta el total de pedidos registrados
            'total_pedidos' => Pedido::count(),
            // Suma los ingresos de pedidos no cancelados
            'total_ingresos' => (float)Pedido::where('estado', '!=', 'cancelado')->sum('precio_total'),
            // Cuenta los mensajes recibidos desde el formulario
            'total_mensajes' => MensajeContacto::count()
        ];

        // Retorna la vista Blade 'home' pasando las variables necesarias
        return view('home', compact('sistemas', 'categorias', 'stats'));
    }

    // Metodo que procesa el registro de cotizaciones y pedidos mediante AJAX
    public function submitOrder(Request $request): JsonResponse
    {
        // Valida que los datos recibidos cumplan las reglas de negocio
        $validated = $request->validate([
            // El ID del sistema es obligatorio y debe existir en la tabla sistemas
            'sistema_id' => 'required|exists:sistemas,id',
            // El nombre del cliente es obligatorio con longitud maxima de 120 caracteres
            'cliente_nombre' => 'required|string|max:120',
            // El email debe tener formato de correo electronico valido
            'cliente_email' => 'required|email|max:150',
            // El telefono es obligatorio para coordinacion via WhatsApp
            'cliente_telefono' => 'required|string|max:50',
            // El tipo de licencia seleccionado
            'tipo_licencia' => 'nullable|string|max:50',
            // Lista de servicios adicionales opcionales
            'servicios' => 'nullable|array',
            // Monto total cotizado
            'precio_total' => 'required|numeric',
            // Observaciones o notas adicionales del cliente
            'observaciones' => 'nullable|string'
        ]);

        // Convierte el array de servicios en una cadena de texto legible
        $serviciosTexto = !empty($validated['servicios']) ? implode(', ', $validated['servicios']) : 'Ninguno';

        // Registra el pedido en la base de datos
        $pedido = Pedido::create([
            // Asigna el identificador del sistema seleccionado
            'sistema_id' => $validated['sistema_id'],
            // Guarda el nombre completo del cliente
            'cliente_nombre' => $validated['cliente_nombre'],
            // Guarda el correo electronico del cliente
            'cliente_email' => $validated['cliente_email'],
            // Guarda el numero telefonico del cliente
            'cliente_telefono' => $validated['cliente_telefono'],
            // Guarda el tipo de licencia elegida o comercial por defecto
            'tipo_licencia' => $validated['tipo_licencia'] ?? 'comercial',
            // Guarda los servicios adicionales concatenados
            'servicios_adicionales' => $serviciosTexto,
            // Guarda el precio total cotizado
            'precio_total' => $validated['precio_total'],
            // Establece el estado inicial del pedido como pendiente
            'estado' => 'pendiente',
            // Guarda notas u observaciones ingresadas
            'observaciones' => $validated['observaciones'] ?? ''
        ]);

        // Incrementa el contador de ventas del sistema solicitado
        Sistema::where('id', $validated['sistema_id'])->increment('ventas_count');

        // Busca el sistema correspondiente para obtener su nombre comercial
        $sistema = Sistema::find($validated['sistema_id']);
        // Determina el nombre o asigna un valor por defecto
        $nombreSistema = $sistema ? $sistema->nombre : 'Sistema Web';

        // Estructura el mensaje predeterminado que se abrira en WhatsApp
        $whatsappText = "Hola Ing. Juan Wilber Supa Ttito (*NAVUSSYS*), solicito cotización para el sistema:\n\n"
                      // Concatena el nombre del sistema
                      . "📌 *Sistema:* {$nombreSistema}\n"
                      // Concatena el tipo de licencia
                      . "📋 *Licencia:* " . ($validated['tipo_licencia'] ?? 'Comercial') . "\n"
                      // Concatena los servicios seleccionados
                      . "➕ *Servicios:* {$serviciosTexto}\n"
                      // Concatena el monto estimado con formato monetario
                      . "💰 *Monto Estimado:* S/. " . number_format($validated['precio_total'], 2) . "\n"
                      // Concatena el nombre del cliente
                      . "👤 *Cliente:* {$validated['cliente_nombre']}\n"
                      // Concatena el telefono del cliente
                      . "📱 *Teléfono:* {$validated['cliente_telefono']}\n"
                      // Concatena el email del cliente
                      . "✉️ *Email:* {$validated['cliente_email']}\n"
                      // Concatena observaciones si existen
                      . (!empty($validated['observaciones']) ? "📝 *Detalles:* {$validated['observaciones']}\n" : "")
                      // Pregunta de cierre para coordinar demostracion en vivo
                      . "\n¿Podemos coordinar la demostración en vivo y detalles de entrega?";

        // Genera el enlace directo para la API de WhatsApp web o movil
        $whatsappUrl = 'https://wa.me/51935114374?text=' . rawurlencode($whatsappText);

        // Retorna respuesta JSON utilizando el Facade Response para compatibilidad total con el tipado
        return Response::json([
            // Indica que la operacion fue exitosa
            'success' => true,
            // Devuelve el ID generado del pedido
            'order_id' => $pedido->id,
            // Devuelve la URL formateada para redirigir a WhatsApp
            'whatsapp_url' => $whatsappUrl,
            // Mensaje informativo para la notificacion del usuario
            'message' => '¡Cotización registrada con éxito! Te redirigiremos a WhatsApp para atención inmediata.'
        ]);
    }

    // Metodo que procesa el formulario de contacto de la portada
    public function submitContact(Request $request): JsonResponse
    {
        // Valida los campos ingresados en el formulario de contacto
        $validated = $request->validate([
            // El nombre completo del remitente es obligatorio
            'nombre' => 'required|string|max:120',
            // El correo electronico debe ser valido
            'email' => 'required|email|max:150',
            // El telefono es opcional
            'telefono' => 'nullable|string|max:50',
            // El asunto es opcional
            'asunto' => 'nullable|string|max:150',
            // El cuerpo del mensaje es obligatorio
            'mensaje' => 'required|string'
        ]);

        // Crea el registro del mensaje en la base de datos
        MensajeContacto::create($validated);

        // Retorna respuesta JSON de confirmacion al cliente
        return Response::json([
            // Indica exito en la operacion
            'success' => true,
            // Mensaje de confirmacion para la alerta SweetAlert2
            'message' => '¡Gracias por contactar a NAVUSSYS! El Ing. Juan Wilber Supa responderá a la brevedad posible.'
        ]);
    }

    // Metodo que devuelve los detalles de un sistema en formato JSON para el modal
    public function getSistemaJson(Request $request): JsonResponse
    {
        // Convierte a entero el parametro ID recibido
        $id = (int)$request->get('id', 0);
        // Busca el sistema junto a su categoria relacionada
        $sistema = Sistema::with('categoria')->find($id);

        // Verifica si el sistema existe en la base de datos
        if (!$sistema) {
            // Retorna error 404 si no fue encontrado
            return Response::json([
                // Indica fracaso en la consulta
                'success' => false,
                // Mensaje de error para el usuario
                'message' => 'Sistema no encontrado'
            ], 404);
        }

        // Convierte el modelo Eloquent a arreglo asociativo
        $data = $sistema->toArray();
        // Asigna el nombre de la categoria o General por defecto
        $data['categoria_nombre'] = $sistema->categoria ? $sistema->categoria->nombre : 'General';

        // Retorna los datos del sistema en formato JSON
        return Response::json([
            // Indica exito en la consulta
            'success' => true,
            // Envia la informacion estructurada del sistema
            'sistema' => $data
        ]);
    }
}
