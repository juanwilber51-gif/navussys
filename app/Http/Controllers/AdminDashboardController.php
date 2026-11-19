<?php
// Define el archivo como script PHP de Laravel 12
namespace App\Http\Controllers;
// Importa el modelo Sistema para administrar el catalogo
use App\Models\Sistema;
// Importa el modelo Categoria para clasificar los sistemas
use App\Models\Categoria;
// Importa el modelo Pedido para la gestion de cotizaciones
use App\Models\Pedido;
// Importa el modelo MensajeContacto para visualizar consultas de clientes
use App\Models\MensajeContacto;
// Importa la clase Request para recibir peticiones HTTP
use Illuminate\Http\Request;
// Importa la clase Str para manipulacion de cadenas y creacion de slugs
use Illuminate\Support\Str;
// Importa el Facade Response para descargas de archivos y respuestas tipadas
use Illuminate\Support\Facades\Response;

// Controlador para la gestion administrativa del sistema NAVUSSYS
class AdminDashboardController extends Controller
{
    // Renderiza la vista principal del panel administrativo con metricas
    public function index()
    {
        // Agrupa las metricas globales en un array asociativo
        $stats = [
            // Cuenta los sistemas activos en el catalogo
            'total_sistemas' => Sistema::where('estado', true)->count(),
            // Cuenta la cantidad total de pedidos
            'total_pedidos' => Pedido::count(),
            // Suma los montos de pedidos no cancelados
            'total_ingresos' => (float)Pedido::where('estado', '!=', 'cancelado')->sum('precio_total'),
            // Cuenta la cantidad total de mensajes recibidos
            'total_mensajes' => MensajeContacto::count()
        ];

        // Obtiene todos los sistemas con su categoria ordenados del mas reciente al mas antiguo
        $sistemas = Sistema::with('categoria')->orderBy('id', 'desc')->get();
        // Obtiene todas las categorias disponibles ordenadas por nombre
        $categorias = Categoria::orderBy('nombre')->get();
        // Obtiene la lista completa de pedidos junto a los datos del sistema vinculado
        $pedidos = Pedido::with('sistema')->orderBy('id', 'desc')->get();
        // Obtiene la lista de mensajes de contacto ordenados descendentemente
        $mensajes = MensajeContacto::orderBy('id', 'desc')->get();

        // Retorna la vista Blade del dashboard enviando todas las colecciones y metricas
        return view('admin.dashboard', compact('stats', 'sistemas', 'categorias', 'pedidos', 'mensajes'));
    }

    // Registra un nuevo sistema web en la base de datos
    public function storeSistema(Request $request)
    {
        // Valida que los datos recibidos cumplan las reglas del formulario
        $validated = $request->validate([
            // La categoria debe ser un ID valido en la tabla categorias
            'categoria_id' => 'required|exists:categorias,id',
            // El nombre comercial es requerido con maximo 150 caracteres
            'nombre' => 'required|string|max:150',
            // La descripcion corta es requerida con maximo 255 caracteres
            'descripcion_corta' => 'required|string|max:255',
            // La descripcion larga es requerida para el modal de detalles
            'descripcion_larga' => 'required|string',
            // El precio comercial base es obligatorio y numerico positivo
            'precio_base' => 'required|numeric|min:0',
            // El precio de codigo fuente es obligatorio y numerico positivo
            'precio_codigo_fuente' => 'required|numeric|min:0',
            // El listado de tecnologias es obligatorio
            'tecnologias' => 'required|string|max:255',
            // Las caracteristicas del sistema son obligatorias
            'caracteristicas' => 'required|string',
            // La URL de demo interactiva es opcional
            'demo_url' => 'nullable|string|max:255',
            // El campo destacado es opcional y booleano
            'destacado' => 'nullable|boolean'
        ]);

        // Genera automaticamente el slug amigable a partir del nombre comercial
        $validated['slug'] = Str::slug($validated['nombre']);
        // Establece si el sistema sera mostrado como destacado
        $validated['destacado'] = $request->has('destacado');
        // Asigna estado activo por defecto
        $validated['estado'] = true;
        // Asigna la imagen banner estandar del sistema
        $validated['imagen'] = 'assets/images/pos_banner.jpg';

        // Crea el nuevo registro en la tabla de sistemas
        Sistema::create($validated);

        // Redirige al panel con un mensaje de sesion indicando creacion exitosa
        return redirect()->route('admin.dashboard')->with('msg', 'created');
    }

    // Actualiza los datos de un sistema existente en el catalogo
    public function updateSistema(Request $request)
    {
        // Valida los datos recibidos para la edicion
        $validated = $request->validate([
            // El ID del sistema debe existir en la base de datos
            'id' => 'required|exists:sistemas,id',
            // La categoria asignada debe existir en la base de datos
            'categoria_id' => 'required|exists:categorias,id',
            // El nombre comercial del sistema
            'nombre' => 'required|string|max:150',
            // Descripcion corta del sistema
            'descripcion_corta' => 'required|string|max:255',
            // Descripcion completa del sistema
            'descripcion_larga' => 'required|string',
            // Precio de la licencia comercial
            'precio_base' => 'required|numeric|min:0',
            // Precio del codigo fuente
            'precio_codigo_fuente' => 'required|numeric|min:0',
            // Lista de tecnologias empleadas
            'tecnologias' => 'required|string|max:255',
            // Lista de funcionalidades y modulos
            'caracteristicas' => 'required|string',
            // Enlace de la demostracion
            'demo_url' => 'nullable|string|max:255',
            // Estado activo o inactivo del sistema
            'estado' => 'required|boolean'
        ]);

        // Busca el modelo del sistema por su clave primaria o lanza error 404
        $sistema = Sistema::findOrFail($validated['id']);
        // Regenera el slug amigable con el nuevo nombre
        $validated['slug'] = Str::slug($validated['nombre']);
        // Aplica la actualizacion con los datos validados
        $sistema->update($validated);

        // Redirige al panel de administracion con confirmacion de actualizacion
        return redirect()->route('admin.dashboard')->with('msg', 'updated');
    }

    // Elimina un sistema del catalogo de software
    public function deleteSistema($id)
    {
        // Busca el registro del sistema o lanza excepcion
        $sistema = Sistema::findOrFail($id);
        // Ejecuta el borrado del sistema en la base de datos
        $sistema->delete();

        // Redirige con mensaje indicando eliminacion correcta
        return redirect()->route('admin.dashboard')->with('msg', 'deleted');
    }

    // Actualiza el estado de atencion de una solicitud de pedido o cotizacion
    public function updatePedidoEstado(Request $request)
    {
        // Valida la solicitud del cambio de estado
        $validated = $request->validate([
            // ID del pedido a modificar
            'id' => 'required|exists:pedidos,id',
            // Estado valido dentro del flujo de atencion
            'estado' => 'required|string|in:pendiente,en_proceso,completado,cancelado'
        ]);

        // Encuentra el pedido segun su ID
        $pedido = Pedido::findOrFail($validated['id']);
        // Actualiza unicamente el campo de estado
        $pedido->update(['estado' => $validated['estado']]);

        // Redirige al panel con confirmacion de cambio de estado
        return redirect()->route('admin.dashboard')->with('msg', 'status_updated');
    }

    // Procesa y entrega la descarga del documento formal APA 7ma Edicion
    public function downloadDoc()
    {
        // Define la ruta absoluta al documento Word generado
        $filePath = base_path('docs/NAVUSSYS_Informe_Final_APA7.docx');

        // Comprueba si el archivo ya existe en disco
        if (!file_exists($filePath)) {
            // Si no existe, invoca el script generador de la documentacion
            require_once base_path('generate_documentation_docx.php');
        }

        // Descarga el archivo docx estableciendo cabeceras MIME de Microsoft Word
        return Response::download($filePath, 'NAVUSSYS_Informe_Final_APA7.docx', [
            // Cabecera de tipo de contenido para documentos docx
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);
    }
}
