{{-- Vista maestra del Dashboard Administrativo en Laravel 12 --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> {{-- Codificación UTF-8 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- Vista responsive --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Token CSRF para peticiones seguras --}}
    <title>Panel de Control · {{ config('app.name', 'NAVUSSYS') }}</title> {{-- Título de la pestaña --}}
    
    {{-- Librerías CSS y fuentes externas --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> {{-- Iconos --}}
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> {{-- Fuentes --}}
    
    {{-- Librerías JavaScript en cabecera --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> {{-- Chart.js para gráficos --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- SweetAlert2 para modales --}}
    
    {{-- Estilos personalizados del panel --}}
    <style>
        :root { --sidebar-width: 260px; --primary: #4f46e5; --emerald: #10b981; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f1f5f9; color: #1e293b; }
        .admin-sidebar { width: var(--sidebar-width); background: #0f172a; min-height: 100vh; color: #e2e8f0; position: fixed; top: 0; left: 0; z-index: 1000; }
        .admin-main-content { margin-left: var(--sidebar-width); padding: 30px; }
        @media (max-width: 991px) {
            .admin-sidebar { position: static; width: 100%; min-height: auto; }
            .admin-main-content { margin-left: 0; padding: 15px; }
        }
        .kpi-card { background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); transition: transform 0.2s; }
        .kpi-card:hover { transform: translateY(-4px); }
        .kpi-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; }
        .nav-link.admin-tab { color: #94a3b8; border-radius: 10px; padding: 10px 16px; font-weight: 500; transition: all 0.2s; }
        .nav-link.admin-tab.active, .nav-link.admin-tab:hover { background: rgba(99, 102, 241, 0.15); color: #ffffff; }
        .btn-indigo-gradient { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: #ffffff; border: none; }
        .btn-indigo-gradient:hover { background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); color: #ffffff; }
    </style>
</head>
<body>

    {{-- Barra lateral de navegación fija --}}
    @include('admin.partials.sidebar')

    {{-- Contenido principal dinámico --}}
    <main class="admin-main-content">
        {{-- Cabecera con título y botón de acción rápida --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1" style="font-family: 'Outfit';">Panel de Administración NAVUSSYS</h2> {{-- Título principal --}}
                <p class="text-muted small mb-0">Gestión de software web desarrollado por el Ing. Juan Wilber Supa Ttito.</p> {{-- Subtítulo --}}
            </div>
            <div class="d-flex gap-2">
                {{-- Botón para abrir modal de nuevo sistema --}}
                <button class="btn btn-indigo-gradient rounded-pill fw-bold d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalNewSistema">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>Nuevo Sistema Web</span>
                </button>
            </div>
        </div>

        {{-- Alertas de mensajes de sesión flash --}}
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                @if (session('msg') === 'created') Sistema web registrado exitosamente en el catálogo. @endif
                @if (session('msg') === 'updated') Información del sistema actualizada correctamente. @endif
                @if (session('msg') === 'deleted') Sistema web eliminado del catálogo. @endif
                @if (session('msg') === 'status_updated') Estado del pedido actualizado. @endif
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Paneles modulares de cada pestaña --}}
        <div class="tab-content" id="adminTabsContent">
            @include('admin.partials.tab_resumen') {{-- Métricas KPI y gráficos --}}
            @include('admin.partials.tab_sistemas') {{-- CRUD del catálogo de sistemas --}}
            @include('admin.partials.tab_pedidos') {{-- Pedidos y cotizaciones --}}
            @include('admin.partials.tab_mensajes') {{-- Mensajes recibidos de clientes --}}
        </div>
    </main>

    {{-- Modales modulares de administración --}}
    @include('admin.partials.modal_create') {{-- Modal crear sistema --}}
    @include('admin.partials.modal_edit') {{-- Modal editar sistema --}}
    @include('admin.partials.scripts') {{-- Scripts de gráficos y funciones --}}

</body>
</html>
