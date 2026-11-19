<!-- Pie de pagina profesional institucional -->
<footer class="bg-dark-navy text-slate-300 pt-5 pb-4 mt-5 border-top border-slate-800">
    <!-- Contenedor central -->
    <div class="container">
        <!-- Rejilla con las 3 columnas informativas -->
        <div class="row g-4 mb-5">
            <!-- Columna 1: Presentacion corporativa y de valor tecnologico -->
            <div class="col-lg-4 col-md-6">
                <!-- Logotipo e isotipo en el pie de pagina -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <!-- Icono en caja pequena -->
                    <span class="brand-icon-box sm">
                        <!-- Icono de CPU -->
                        <i class="bi bi-cpu-fill text-white"></i>
                    </span>
                    <!-- Nombre de la marca en texto blanco -->
                    <span class="fs-4 fw-bold text-white tracking-wider">{{ config('app.name', 'NAVUSSYS') }}</span>
                </div>
                <!-- Resumen de servicios y tecnologias -->
                <p class="text-slate-400 small mb-4">
                    Desarrollo e implementacion de sistemas web de alta gama, diseñados con arquitectura limpia MVC, Laravel 12, PHP 8.3 y MySQL. Soluciones escalables listas para empresas peruanas.
                </p>
                <!-- Insignias de garantia tecnica -->
                <div class="d-flex gap-2">
                    <!-- Badge de codigo limpio -->
                    <span class="badge bg-slate-800 text-slate-300 px-3 py-2 rounded-pill border border-slate-700">
                        <i class="bi bi-code-slash me-1 text-primary"></i> Codigo Limpio
                    </span>
                    <!-- Badge de entrega veloz -->
                    <span class="badge bg-slate-800 text-slate-300 px-3 py-2 rounded-pill border border-slate-700">
                        <i class="bi bi-lightning-charge-fill me-1 text-warning"></i> Entrega 24h
                    </span>
                </div>
            </div>

            <!-- Columna 2: Enlaces rapidos a los sistemas del catalogo -->
            <div class="col-lg-3 col-md-6">
                <!-- Titulo de seccion -->
                <h6 class="text-white fw-bold text-uppercase tracking-wider mb-3 fs-sm border-start border-3 border-primary ps-2">Sistemas en Venta</h6>
                <!-- Lista de sistemas populares -->
                <ul class="list-unstyled text-slate-400 small d-flex flex-column gap-2">
                    <!-- Enlace directo a POS -->
                    <li><a href="#catalogo" class="text-decoration-none text-slate-400 hover-text-white"><i class="bi bi-chevron-right text-primary me-1"></i> NAVUS-POS: Ventas & Caja</a></li>
                    <!-- Enlace directo a Kardex -->
                    <li><a href="#catalogo" class="text-decoration-none text-slate-400 hover-text-white"><i class="bi bi-chevron-right text-primary me-1"></i> NAVUS-KARDEX: Inventarios</a></li>
                    <!-- Enlace directo a Facturacion -->
                    <li><a href="#catalogo" class="text-decoration-none text-slate-400 hover-text-white"><i class="bi bi-chevron-right text-primary me-1"></i> NAVUS-FACT: Facturacion SUNAT</a></li>
                    <!-- Enlace directo a Restaurantes -->
                    <li><a href="#catalogo" class="text-decoration-none text-slate-400 hover-text-white"><i class="bi bi-chevron-right text-primary me-1"></i> NAVUS-RESTO: Restaurantes & Bar</a></li>
                    <!-- Enlace directo a Clinicas -->
                    <li><a href="#catalogo" class="text-decoration-none text-slate-400 hover-text-white"><i class="bi bi-chevron-right text-primary me-1"></i> NAVUS-CLINIC: Historias Clinicas</a></li>
                </ul>
            </div>

            <!-- Columna 3: Tarjeta de contacto y atencion directa -->
            <div class="col-lg-5 col-md-12">
                <!-- Titulo de la columna de contacto -->
                <h6 class="text-white fw-bold text-uppercase tracking-wider mb-3 fs-sm border-start border-3 border-emerald ps-2">Contacto & Atencion Directa</h6>
                <!-- Tarjeta con fondo oscuro y bordes para datos directos -->
                <div class="bg-slate-900/60 p-3 rounded-4 border border-slate-800">
                    <!-- Fila: Propietario e ingeniero a cargo -->
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <!-- Icono con fondo indigo sutil -->
                        <div class="contact-icon bg-indigo-subtle text-indigo rounded-circle">
                            <i class="bi bi-person-badge-fill fs-5"></i>
                        </div>
                        <!-- Datos del titular -->
                        <div>
                            <span class="d-block text-slate-400 fs-xs text-uppercase fw-semibold">Desarrollador / Propietario</span>
                            <strong class="text-white">Juan Wilber Supa Ttito</strong>
                        </div>
                    </div>
                    <!-- Fila: Enlace directo a WhatsApp y llamadas -->
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <!-- Icono esmeralda -->
                        <div class="contact-icon bg-emerald-subtle text-emerald rounded-circle">
                            <i class="bi bi-whatsapp fs-5"></i>
                        </div>
                        <!-- Enlace con numero telefonico -->
                        <div>
                            <span class="d-block text-slate-400 fs-xs text-uppercase fw-semibold">WhatsApp & Llamadas</span>
                            <a href="https://wa.me/51935114374" target="_blank" class="text-emerald text-decoration-none fw-bold hover-underline">
                                +51 935114374
                            </a>
                        </div>
                    </div>
                    <!-- Fila: Correo electronico -->
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <!-- Icono celeste cian -->
                        <div class="contact-icon bg-cyan-subtle text-cyan rounded-circle">
                            <i class="bi bi-envelope-at-fill fs-5"></i>
                        </div>
                        <!-- Enlace de correo mailto -->
                        <div>
                            <span class="d-block text-slate-400 fs-xs text-uppercase fw-semibold">Correo Electronico</span>
                            <a href="mailto:juanwilber@gmail.com" class="text-white text-decoration-none hover-underline">
                                juanwilber@gmail.com
                            </a>
                        </div>
                    </div>
                    <!-- Fila: Direccion de oficina -->
                    <div class="d-flex align-items-center gap-3">
                        <!-- Icono rojo -->
                        <div class="contact-icon bg-danger-subtle text-danger rounded-circle">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <!-- Direccion fisica -->
                        <div>
                            <span class="d-block text-slate-400 fs-xs text-uppercase fw-semibold">Ubicacion de Oficina</span>
                            <span class="text-white">Avenida Grau con Calle 2 de Mayo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fila de pie de pagina con creditos y atajo discreto de administrador -->
        <div class="border-top border-slate-800 pt-3 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-slate-400">
            <!-- Creditos de autor -->
            <div>
                &copy; {{ date('Y') }} <strong class="text-white">{{ config('app.name', 'NAVUSSYS') }}</strong> · Diseñado e implementado por 
                <span class="text-white fw-semibold">Juan Wilber Supa Ttito</span>.
            </div>
            <!-- Acceso secreto y atajo de teclado para el login -->
            <div class="d-flex align-items-center gap-3">
                <!-- Indicador del atajo de teclado -->
                <span class="text-slate-400 fs-xs">
                    Atajo Admin: <kbd class="bg-slate-800 text-slate-300 border border-slate-700 px-1 py-0.5 rounded">Ctrl + Shift + A</kbd>
                </span>
                <!-- Icono de candado con enlace a login administrativo -->
                <a href="{{ route('admin.login') }}" class="text-slate-400 text-decoration-none hover-text-white p-1" title="Acceso Administrativo">
                    <i class="bi bi-shield-lock text-slate-400 fs-sm"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
