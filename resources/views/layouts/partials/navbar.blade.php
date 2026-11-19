<!-- Barra de navegacion principal publica fija en la parte superior -->
<nav class="navbar navbar-expand-lg navbar-dark bg-nav-glass fixed-top py-2">
    <!-- Contenedor centrado de Bootstrap -->
    <div class="container">
        <!-- Logo comercial con isotipo llamativo y enlace al inicio -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4" href="{{ route('home') }}">
            <!-- Caja de icono de la marca con diseno tecnologico -->
            <span class="brand-icon-box">
                <!-- Icono de microprocesador CPU -->
                <i class="bi bi-cpu-fill text-white"></i>
            </span>
            <!-- Nombre de la marca con gradiente llamativo -->
            <span class="brand-gradient-text tracking-wider">{{ config('app.name', 'NAVUSSYS') }}</span>
            <!-- Badge indicador de Laravel 12 -->
            <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill fs-xs">LARAVEL 12</span>
        </a>

        <!-- Boton tipo hamburguesa para navegacion en pantallas moviles -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <!-- Icono de barras del boton hamburguesa -->
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu colapsable con los enlaces de navegacion -->
        <div class="collapse navbar-collapse" id="navMain">
            <!-- Lista de enlaces centrados con espaciado -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3 fw-medium">
                <!-- Enlace al catalogo de software -->
                <li class="nav-item">
                    <!-- Enlace directo a la seccion catalogo -->
                    <a class="nav-link active px-2" href="#catalogo"><i class="bi bi-grid-fill me-1 text-primary"></i> Catalogo</a>
                </li>
                <!-- Enlace al simulador de demos -->
                <li class="nav-item">
                    <!-- Enlace directo a la seccion de demos -->
                    <a class="nav-link px-2" href="#demo-simulador"><i class="bi bi-display me-1 text-info"></i> Demos en Vivo</a>
                </li>
                <!-- Enlace a la calculadora de cotizaciones -->
                <li class="nav-item">
                    <!-- Enlace directo al cotizador -->
                    <a class="nav-link px-2" href="#calculadora"><i class="bi bi-calculator-fill me-1 text-warning"></i> Cotizador</a>
                </li>
                <!-- Enlace a la seccion de contacto y ubicacion -->
                <li class="nav-item">
                    <!-- Enlace directo al formulario de contacto -->
                    <a class="nav-link px-2" href="#contacto"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Contacto</a>
                </li>
            </ul>

            <!-- Accion rapida: Boton destacado para atencion directa por WhatsApp -->
            <div class="d-flex align-items-center gap-2">
                <!-- Enlace directo al WhatsApp oficial de NAVUSSYS -->
                <a href="https://wa.me/51935114374" target="_blank" class="btn btn-emerald-gradient rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-2 shadow-emerald">
                    <!-- Icono de WhatsApp -->
                    <i class="bi bi-whatsapp fs-5"></i>
                    <!-- Texto de llamada a la accion -->
                    <span>WhatsApp Directo</span>
                </a>
            </div>
        </div>
    </div>
</nav>
