<!-- ========================================================
     SECCION HERO: PRESENTACION PRINCIPAL Y TARJETA INTERACTIVA
     ======================================================== -->
<section class="hero-wrapper">
    <!-- Efecto de resplandor ambiental de fondo con gradiente difuminado -->
    <div class="hero-glow-blob"></div>
    <!-- Contenedor central con posicion relativa sobre el resplandor -->
    <div class="container position-relative z-1">
        <!-- Rejilla con alineacion vertical centrada -->
        <div class="row align-items-center g-5">
            <!-- Columna izquierda: Titulares, propuesta de valor y llamados a la accion -->
            <div class="col-lg-7">
                <!-- Badge destacando la actualizacion a Laravel 12 y PHP 8.3 -->
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill bg-indigo-950/80 border border-indigo-500/30 text-indigo-300 fs-sm mb-3">
                    <!-- Etiqueta de nuevo ano 2026 -->
                    <span class="badge bg-indigo-500 text-white rounded-pill px-2 py-0.5">NUEVO 2026</span>
                    <!-- Texto indicando las tecnologias del backend -->
                    <span>Sistemas Web Listos con Laravel 12 & PHP 8.3</span>
                    <!-- Icono decorativo de estrellas brillantes -->
                    <i class="bi bi-stars text-warning"></i>
                </div>

                <!-- Titular principal de la portada con tipografia de gran tamano -->
                <h1 class="display-4 fw-extrabold text-white lh-tight mb-3">
                    Potencia tu Negocio con <br>
                    <!-- Subtitulo con gradiente de texto tricolor (indigo, cian, esmeralda) -->
                    <span class="text-transparent bg-clip-text bg-gradient-to-r" style="background: linear-gradient(135deg, #a5b4fc, #38bdf8, #34d399); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        Sistemas Web Profesionales
                    </span>
                </h1>

                <!-- Parrafo introductorio de los rubros cubiertos -->
                <p class="lead text-slate-300 mb-4 fs-5">
                    Adquiere software web de alta calidad: <strong>Puntos de Venta (POS)</strong>, <strong>Control de Inventarios (Kardex)</strong>, <strong>Facturacion Electronica SUNAT</strong> y <strong>ERP Comercial</strong>. Codigo fuente 100% editable o licencias listas para operar en la nube o local.
                </p>

                <!-- Botones de llamada a la accion principal (CTA) -->
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <!-- Boton principal para explorar el catalogo -->
                    <a href="#catalogo" class="btn btn-indigo-gradient btn-lg px-4 py-3 rounded-pill fw-bold shadow-lg d-flex align-items-center gap-2">
                        <!-- Icono de catalogo -->
                        <i class="bi bi-grid-fill"></i> Explorar Catalogo de Sistemas
                    </a>
                    <!-- Boton secundario para probar las demostraciones interactivas -->
                    <a href="#demo-simulador" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill fw-semibold d-flex align-items-center gap-2 border-slate-600 hover-border-light">
                        <!-- Icono de reproducir -->
                        <i class="bi bi-play-circle-fill text-cyan"></i> Probar Demos en Vivo
                    </a>
                </div>

                <!-- Bloque de confianza con credenciales del desarrollador Juan Wilber Supa Ttito -->
                <div class="d-flex align-items-center gap-3 pt-3 border-top border-slate-800">
                    <!-- Icono de insignia de verificacion profesional -->
                    <div class="rounded-circle bg-emerald-subtle p-2 text-emerald">
                        <!-- Icono de check verificado -->
                        <i class="bi bi-patch-check-fill fs-4"></i>
                    </div>
                    <!-- Nombre y especialidad del desarrollador -->
                    <div>
                        <!-- Etiqueta superior -->
                        <span class="d-block text-slate-400 fs-xs text-uppercase tracking-wider">Desarrollado y respaldado por</span>
                        <!-- Nombre del ingeniero en texto destacado -->
                        <strong class="text-white fs-6">Juan Wilber Supa Ttito</strong> · <span class="text-emerald fw-semibold">Ingeniero de Software</span>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Tarjeta flotante interactiva con demo simulada de ventas -->
            <div class="col-lg-5">
                <!-- Tarjeta con efecto de cristal y bordes iluminados -->
                <div class="card border-0 bg-slate-900/90 text-white rounded-4 p-4 shadow-2xl border border-slate-700/60 position-relative backdrop-blur">
                    <!-- Cabecera de la tarjeta con indicador de actividad en vivo -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- Indicador visual verde parpadeante -->
                        <div class="d-flex align-items-center gap-2">
                            <!-- Spinner de animacion verde -->
                            <span class="spinner-grow spinner-grow-sm text-success" role="status"></span>
                            <!-- Texto de demostracion activa -->
                            <span class="fs-xs fw-semibold text-emerald text-uppercase tracking-wider">Demostracion en Vivo</span>
                        </div>
                        <!-- Version del sistema POS -->
                        <span class="badge bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 rounded-pill">NAVUS-POS v2.5</span>
                    </div>

                    <!-- Caja con metricas simuladas de ventas del dia -->
                    <div class="bg-slate-950/80 rounded-3 p-3 mb-3 border border-slate-800">
                        <!-- Fila de titulo y total de ventas -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <!-- Etiqueta de ventas simuladas -->
                            <span class="text-slate-400 fs-sm">Ventas del Dia (Simulado)</span>
                            <!-- Monto alcanzado en soles -->
                            <span class="text-emerald fw-bold fs-5">S/. 3,842.50</span>
                        </div>
                        <!-- Barra de progreso del cumplimiento de meta comercial -->
                        <div class="progress" style="height: 6px;">
                            <!-- Progreso al 78% -->
                            <div class="progress-bar bg-emerald" style="width: 78%"></div>
                        </div>
                        <!-- Informacion del porcentaje y meta total -->
                        <div class="d-flex justify-content-between text-slate-500 fs-xs mt-1">
                            <!-- Meta del dia -->
                            <span>Meta S/. 4,500</span>
                            <!-- Porcentaje alcanzado -->
                            <span>78% Alcanzado</span>
                        </div>
                    </div>

                    <!-- Lista de modulos listos para operacion comercial -->
                    <div class="vstack gap-2 mb-4">
                        <!-- Modulo 1: Punto de venta touch -->
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-slate-800/60 border border-slate-700/40">
                            <!-- Nombre del modulo con icono de carrito -->
                            <span class="fs-sm"><i class="bi bi-cart-check-fill text-indigo-400 me-2"></i> Punto de Venta Touch / Barcode</span>
                            <!-- Estado de modulo listo -->
                            <span class="badge bg-emerald-500/20 text-emerald">Listo</span>
                        </div>
                        <!-- Modulo 2: Kardex fisico y valorizado -->
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-slate-800/60 border border-slate-700/40">
                            <!-- Nombre del modulo con icono de inventario -->
                            <span class="fs-sm"><i class="bi bi-boxes text-warning me-2"></i> Kardex Fisico & Valorizado</span>
                            <!-- Estado de modulo listo -->
                            <span class="badge bg-emerald-500/20 text-emerald">Listo</span>
                        </div>
                        <!-- Modulo 3: Facturacion electronica SUNAT -->
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-slate-800/60 border border-slate-700/40">
                            <!-- Nombre del modulo con icono de comprobante -->
                            <span class="fs-sm"><i class="bi bi-receipt text-cyan me-2"></i> Facturacion Electronica UBL 2.1</span>
                            <!-- Estado de modulo listo -->
                            <span class="badge bg-emerald-500/20 text-emerald">Listo</span>
                        </div>
                    </div>

                    <!-- Boton directo a WhatsApp para consultar este sistema especifico -->
                    <a href="https://wa.me/51935114374" target="_blank" class="btn btn-emerald-gradient w-100 py-2.5 rounded-pill fw-bold d-flex align-items-center justify-content-center gap-2 shadow-emerald">
                        <!-- Icono de WhatsApp -->
                        <i class="bi bi-whatsapp fs-5"></i>
                        <!-- Texto del boton -->
                        <span>Consultar por WhatsApp: +51 935114374</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
