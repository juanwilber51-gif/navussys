<?php
// Seeder oficial de la base de datos para Laravel 12
namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Sistema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // Ejecuta la siembra de datos de NAVUSSYS
    public function run(): void
    {
        // 1. Registra el usuario administrador Juan Wilber Supa Ttito
        User::firstOrCreate(
            ['email' => 'juanwilber@gmail.com'],
            [
                'name' => 'Juan Wilber Supa Ttito',
                'password' => Hash::make('AdminNavus2026*'),
            ]
        );

        // 2. Registra las categorias de sistemas web
        $cat1 = Categoria::create([
            'nombre' => 'Ventas y Punto de Venta (POS)',
            'slug' => 'ventas-pos',
            'icono' => 'bi-cart-check',
            'descripcion' => 'Sistemas de facturación rápida, control de caja y tickets'
        ]);

        $cat2 = Categoria::create([
            'nombre' => 'Inventarios y Almacenes (Kardex)',
            'slug' => 'inventarios-almacen',
            'icono' => 'bi-boxes',
            'descripcion' => 'Gestión de stocks, entradas, salidas, alertas de reposición'
        ]);

        $cat3 = Categoria::create([
            'nombre' => 'Facturación Electrónica',
            'slug' => 'facturacion-electronica',
            'icono' => 'bi-receipt-cutoff',
            'descripcion' => 'Emisión de boletas, facturas, notas de crédito y XML SUNAT'
        ]);

        $cat4 = Categoria::create([
            'nombre' => 'ERP y Gestión Comercial',
            'slug' => 'erp-gestion',
            'icono' => 'bi-building-gear',
            'descripcion' => 'Integración total de compras, ventas, finanzas y reportes'
        ]);

        $cat5 = Categoria::create([
            'nombre' => 'Restaurantes, Bares y Cafeterías',
            'slug' => 'restaurantes-bares',
            'icono' => 'bi-cup-hot',
            'descripcion' => 'Comandas digitales, control de mesas, cocina y delivery'
        ]);

        $cat6 = Categoria::create([
            'nombre' => 'Clínicas, Citas y Farmacias',
            'slug' => 'clinicas-citas',
            'icono' => 'bi-heart-pulse',
            'descripcion' => 'Historias clínicas, recetas, citas en línea y botica'
        ]);

        // 3. Registra el catalogo de sistemas web profesionales listos
        Sistema::create([
            'categoria_id' => $cat1->id,
            'nombre' => 'NAVUS-POS: Sistema de Ventas & Facturación Rápida',
            'slug' => 'navus-pos-ventas-rapidas',
            'descripcion_corta' => 'Control de ventas diarias, arqueo de caja chica, tickets térmicos y lector de código de barras.',
            'descripcion_larga' => 'Potente sistema web para puntos de venta con interfaz ultra rápida desarrollado con Laravel 12 y PHP 8.3. Diseñado para minimarkets, tiendas de ropa, ferreterías y comercio general. Permite vender en 3 clics, soporte para lector de código de barras, impresión en tiquetera de 80mm/58mm, múltiples formas de pago y reportes de rentabilidad.',
            'precio_base' => 350.00,
            'precio_codigo_fuente' => 950.00,
            'tecnologias' => 'PHP 8.3, Laravel 12, MySQL, Alpine.js, Tailwind CSS',
            'caracteristicas' => "Ventas rápidas con atajos de teclado\nArqueo y cierre de caja ciego\nGestión de clientes y cuentas por cobrar\nReporte de ganancias por producto y día\nSoporte para múltiples cajeros y turnos",
            'demo_url' => '#demo-pos',
            'imagen' => 'assets/images/pos_banner.jpg',
            'destacado' => 1,
            'ventas_count' => 48,
            'calificacion' => 4.9
        ]);

        Sistema::create([
            'categoria_id' => $cat2->id,
            'nombre' => 'NAVUS-KARDEX: Control de Inventario & Almacén',
            'slug' => 'navus-kardex-inventario-almacen',
            'descripcion_corta' => 'Valuación PEPS y promedio ponderado, traslados entre sucursales, alertas de stock mínimo.',
            'descripcion_larga' => 'Solución corporativa para la gestión integral de almacenes y cadenas de suministro con Laravel 12. Generación automática de Kardex físico y valorizado. Control de números de lote, fechas de vencimiento de productos, transferencias entre sucursales y alertas de reposición.',
            'precio_base' => 420.00,
            'precio_codigo_fuente' => 1100.00,
            'tecnologias' => 'PHP 8.3, Laravel 12, MySQL, Bootstrap 5, Chart.js',
            'caracteristicas' => "Kardex PEPS y Promedio valorizado\nControl de lotes y fechas de caducidad\nTransferencias inter-almacenes con guías\nAlertas automáticas de stock mínimo\nImportación y exportación masiva en Excel",
            'demo_url' => '#demo-kardex',
            'imagen' => 'assets/images/kardex_banner.jpg',
            'destacado' => 1,
            'ventas_count' => 39,
            'calificacion' => 5.0
        ]);

        Sistema::create([
            'categoria_id' => $cat3->id,
            'nombre' => 'NAVUS-FACT: Facturación Electrónica SUNAT API/UBL 2.1',
            'slug' => 'navus-facturacion-electronica-sunat',
            'descripcion_corta' => 'Emisión directa de Facturas, Boletas, Notas de Crédito, Débito y Guías de Remisión con firma digital.',
            'descripcion_larga' => 'Plataforma completa de facturación electrónica compatible al 100% con los estándares SUNAT y OSE del Perú. Genera automáticamente los archivos XML firmados digitalmente, CDR (Constancia de Recepción) y representación impresa en formato PDF A4 y Ticket.',
            'precio_base' => 480.00,
            'precio_codigo_fuente' => 1350.00,
            'tecnologias' => 'PHP 8.3, OpenSSL, UBL 2.1, MySQL, Laravel 12 REST API',
            'caracteristicas' => "Generación y firmado de XML UBL 2.1\nConsulta RUC/DNI en tiempo real sin captcha\nEnvío automático de comprobantes por WhatsApp y Email\nEnvío a SUNAT y OSE con reintento automático\nReporte tributario mensual para contador",
            'demo_url' => '#demo-fact',
            'imagen' => 'assets/images/fact_banner.jpg',
            'destacado' => 1,
            'ventas_count' => 52,
            'calificacion' => 4.9
        ]);

        Sistema::create([
            'categoria_id' => $cat5->id,
            'nombre' => 'NAVUS-RESTO: Sistema para Restaurantes & Comandas',
            'slug' => 'navus-resto-restaurantes-comandas',
            'descripcion_corta' => 'Mapa interactivo de mesas, comandas digitales para cocina, división de cuentas y delivery.',
            'descripcion_larga' => 'Diseñado para restaurantes, pollerías, pizzerías, bares y cafeterías. Permite a los mozos tomar pedidos desde tablets o celulares directamente a las pantallas de cocina o impresoras de comandas. Manejo de guarniciones, combo menús y división de cuentas.',
            'precio_base' => 390.00,
            'precio_codigo_fuente' => 1050.00,
            'tecnologias' => 'PHP 8.3, WebSockets, MySQL, Laravel 12, Tailwind',
            'caracteristicas' => "Mapa interactivo de mesas con estado en tiempo real\nPantalla KDS digital para cocineros y barman\nDivisión de cuentas automática por comensal\nMódulo de delivery con asignación de motorizados\nControl de recetas y descuento de insumos en stock",
            'demo_url' => '#demo-resto',
            'imagen' => 'assets/images/resto_banner.jpg',
            'destacado' => 1,
            'ventas_count' => 31,
            'calificacion' => 4.8
        ]);

        Sistema::create([
            'categoria_id' => $cat6->id,
            'nombre' => 'NAVUS-CLINIC: Historias Clínicas & Citas Médicas',
            'slug' => 'navus-clinic-historias-citas-farmacia',
            'descripcion_corta' => 'Agendamiento de citas web, historias clínicas electrónicas, recetas digitales y módulo de botica.',
            'descripcion_larga' => 'Sistema web moderno para clínicas, consultorios médicos, policlínicos y centros odontológicos. Incluye agenda médica interactiva con recordatorios automáticos, registro de antecedentes, odontograma digital, emisión de recetas médicas y punto de venta integrado para farmacia.',
            'precio_base' => 450.00,
            'precio_codigo_fuente' => 1250.00,
            'tecnologias' => 'PHP 8.3, Laravel 12, FullCalendar, Bootstrap 5',
            'caracteristicas' => "Agenda médica con reserva de citas online\nHistoria clínica electrónica confidencial\nOdontograma digital e informes radiológicos\nRecetario médico con impresión en PDF\nControl de farmacia y ventas de medicamentos",
            'demo_url' => '#demo-clinic',
            'imagen' => 'assets/images/clinic_banner.jpg',
            'destacado' => 0,
            'ventas_count' => 24,
            'calificacion' => 4.9
        ]);

        Sistema::create([
            'categoria_id' => $cat4->id,
            'nombre' => 'NAVUS-ERP: Gestión Comercial & Finanzas Pyme',
            'slug' => 'navus-erp-gestion-comercial-finanzas',
            'descripcion_corta' => 'Control de flujo de caja, cuentas por cobrar/pagar, compras a proveedores y centros de costos.',
            'descripcion_larga' => 'Solución ERP completa para pequeñas y medianas empresas que buscan automatizar sus procesos contables y administrativos. Módulos de tesorería, cuentas corrientes con clientes y proveedores, presupuestos, cotizaciones formales y panel de indicadores financieros.',
            'precio_base' => 590.00,
            'precio_codigo_fuente' => 1590.00,
            'tecnologias' => 'PHP 8.3, Laravel 12, MySQL, ApexCharts, Bootstrap',
            'caracteristicas' => "Flujo de caja proyectado y real\nGestión de compras, órdenes y proveedores\nCuentas por cobrar y pagar con semáforo de morosidad\nCentros de costos y presupuestos anuales\nExportación de reportes ejecutivos en PDF y Excel",
            'demo_url' => '#demo-erp',
            'imagen' => 'assets/images/erp_banner.jpg',
            'destacado' => 1,
            'ventas_count' => 41,
            'calificacion' => 5.0
        ]);
    }
}
