{{-- Plantilla base de NAVUSSYS en Laravel 12 --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> {{-- Codificación UTF-8 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- Soporte multidispositivo --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Token CSRF para peticiones seguras --}}
    <title>{{ config('app.name', 'NAVUSSYS') }} · Venta de Sistemas Web Profesionales | Ing. Juan Wilber Supa Ttito</title>
    
    {{-- Favicon vectorial SVG --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%236366f1'><path d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/></svg>">
    
    {{-- Hojas de estilos y fuentes --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> {{-- Iconos --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"> {{-- Preconexión Google Fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> {{-- Preconexión Gstatic --}}
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"> {{-- Tipografías --}}
    
    {{-- SweetAlert2 y estilos propios --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- Modales interactivos --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> {{-- Estilos personalizados --}}
</head>
<body class="bg-surface text-slate-800">

    @include('layouts.partials.navbar') {{-- Barra de navegación superior --}}

    <div class="nav-spacer"></div> {{-- Espaciador para navbar fija --}}

    @yield('content') {{-- Contenido dinámico inyectado por las vistas --}}

    @include('layouts.partials.footer') {{-- Pie de página institucional --}}
    @include('layouts.partials.whatsapp_btn') {{-- Botón flotante animado de WhatsApp --}}
    @include('layouts.partials.scripts') {{-- Scripts de Bootstrap y JavaScript principal --}}

</body>
</html>
