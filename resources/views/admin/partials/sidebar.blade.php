<!-- Barra lateral de navegacion fija para el panel de administracion -->
<aside class="admin-sidebar d-flex flex-column p-3">
    <!-- Encabezado con logotipo e informacion del sistema -->
    <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom border-slate-800">
        <!-- Icono decorativo con gradiente en color indigo y purpura -->
        <span class="p-2 rounded-3 bg-indigo text-white fs-4" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">
            <!-- Icono de tacometro representativo del dashboard -->
            <i class="bi bi-speedometer2"></i>
        </span>
        <!-- Contenedor del nombre de la marca y subtitulo -->
        <div>
            <!-- Titulo principal con la marca NAVUSSYS -->
            <h5 class="fw-bold mb-0 text-white" style="font-family: 'Outfit';">{{ config('app.name', 'NAVUSSYS') }}</h5>
            <!-- Subtitulo indicando la version de framework Laravel 12 -->
            <span class="fs-xs text-slate-400">Laravel 12 Control Panel</span>
        </div>
    </div>

    <!-- Lista de navegacion de pestanas del panel administrativo -->
    <ul class="nav nav-pills flex-column gap-1 mb-auto" id="adminTabs" role="tablist">
        <!-- Elemento de pestana: Resumen de metricas -->
        <li class="nav-item">
            <!-- Boton de la pestana de resumen activa por defecto -->
            <button class="nav-link admin-tab w-100 text-start active" id="tab-resumen-btn" data-bs-toggle="pill" data-bs-target="#tab-resumen">
                <!-- Icono de grafico circular -->
                <i class="bi bi-pie-chart-fill me-2 text-indigo"></i> Metricas & Resumen
            </button>
        </li>
        <!-- Elemento de pestana: Gestion de sistemas -->
        <li class="nav-item">
            <!-- Boton de la pestana del catalogo de sistemas -->
            <button class="nav-link admin-tab w-100 text-start" id="tab-sistemas-btn" data-bs-toggle="pill" data-bs-target="#tab-sistemas">
                <!-- Icono de laptop -->
                <i class="bi bi-laptop me-2 text-info"></i> Gestion de Sistemas (CRUD)
            </button>
        </li>
        <!-- Elemento de pestana: Pedidos y cotizaciones -->
        <li class="nav-item">
            <!-- Boton de la pestana de pedidos con contador -->
            <button class="nav-link admin-tab w-100 text-start" id="tab-pedidos-btn" data-bs-toggle="pill" data-bs-target="#tab-pedidos">
                <!-- Icono de carrito de compras con check -->
                <i class="bi bi-cart-check-fill me-2 text-success"></i> Pedidos y Cotizaciones
                <!-- Contador de pedidos recibidos -->
                <span class="badge bg-success-subtle text-success float-end">{{ $pedidos->count() }}</span>
            </button>
        </li>
        <!-- Elemento de pestana: Mensajes de contacto -->
        <li class="nav-item">
            <!-- Boton de la pestana de mensajes con contador -->
            <button class="nav-link admin-tab w-100 text-start" id="tab-mensajes-btn" data-bs-toggle="pill" data-bs-target="#tab-mensajes">
                <!-- Icono de mensajes y comentarios -->
                <i class="bi bi-chat-dots-fill me-2 text-warning"></i> Mensajes Recibidos
                <!-- Contador de mensajes en bandeja -->
                <span class="badge bg-warning-subtle text-warning float-end">{{ $mensajes->count() }}</span>
            </button>
        </li>
    </ul>

    <!-- Seccion inferior con perfil del administrador y botones de sesion -->
    <div class="pt-3 border-top border-slate-800">
        <!-- Informacion del usuario autenticado -->
        <div class="d-flex align-items-center gap-2 mb-3">
            <!-- Avatar circular con las iniciales del ingeniero -->
            <div class="rounded-circle bg-indigo-subtle p-2 text-indigo fw-bold">
                JW
            </div>
            <!-- Nombre y correo electronico -->
            <div class="overflow-hidden">
                <!-- Nombre del desarrollador -->
                <strong class="d-block text-white fs-xs text-truncate">Juan Wilber Supa Ttito</strong>
                <!-- Correo electronico corporativo -->
                <span class="text-slate-400 fs-xs d-block text-truncate">juanwilber@gmail.com</span>
            </div>
        </div>
        <!-- Botones de accion para ver la tienda publica o cerrar sesion -->
        <div class="d-grid gap-2">
            <!-- Enlace que abre la portada publica en nueva pestana -->
            <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-light rounded-pill">
                <!-- Icono de tienda publica -->
                <i class="bi bi-shop me-1"></i> Ver Tienda Publica
            </a>
            <!-- Enlace para desautenticarse del panel -->
            <a href="{{ route('admin.logout') }}" class="btn btn-sm btn-danger rounded-pill">
                <!-- Icono de salida de sesion -->
                <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesion
            </a>
        </div>
    </div>
</aside>
