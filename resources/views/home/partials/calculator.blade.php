<!-- ========================================================
     SECCION DE CALCULADORA INTERACTIVA DE PRECIOS Y COTIZADOR
     ======================================================== -->
<section id="calculadora" class="py-5">
    <!-- Contenedor central -->
    <div class="container">
        <!-- Titulo y subtitulo explicativo de la calculadora de presupuestos -->
        <div class="text-center max-w-2xl mx-auto mb-5">
            <!-- Badge amarillo advertencia -->
            <span class="badge bg-warning-subtle text-warning px-3 py-1.5 rounded-pill fw-semibold text-uppercase tracking-wider fs-xs mb-2">
                Cotizador Dinámico
            </span>
            <!-- Titulo principal del cotizador -->
            <h2 class="display-6 fw-bold text-slate-900">Calcula tu Presupuesto a Medida</h2>
            <!-- Parrafo de instrucciones -->
            <p class="text-slate-600">
                Selecciona tu sistema, el tipo de licencia y los complementos que necesites para calcular el monto exacto de inversión al instante.
            </p>
        </div>

        <!-- Fila centrada con el formulario de la calculadora -->
        <div class="row g-4 align-items-center justify-content-center">
            <div class="col-lg-8">
                <!-- Tarjeta contenedora de la calculadora con estilos propios -->
                <div class="calculator-card">
                    <!-- Paso 1: Seleccion del sistema web -->
                    <div class="mb-4">
                        <label for="calcSistema" class="form-label fw-bold text-slate-800">1. Selecciona el Sistema Web:</label>
                        <!-- Selector desplegable de sistemas con atributos de precio -->
                        <select id="calcSistema" class="form-select form-select-lg">
                            @foreach ($sistemas as $index => $item)
                                <option value="{{ $item->id }}" 
                                        data-comercial="{{ $item->precio_base }}" 
                                        data-fuente="{{ $item->precio_codigo_fuente }}"
                                        {{ $index === 0 ? 'selected' : '' }}>
                                    {{ $item->nombre }} (Comercial: S/. {{ number_format($item->precio_base, 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Paso 2: Eleccion del tipo de licencia comercial o codigo fuente -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-slate-800">2. Elige el Tipo de Licencia:</label>
                        <div class="row g-3">
                            <!-- Opcion: Licencia comercial lista para operar -->
                            <div class="col-md-6">
                                <label class="service-addon-label h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="radio" name="calc_tipo_licencia" value="comercial" class="form-check-input" checked>
                                        <div class="addon-content">
                                            <strong class="d-block text-slate-900">Licencia Comercial</strong>
                                            <span class="fs-xs text-slate-500">Instalado y listo para operar en tu servidor</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <!-- Opcion: Codigo fuente completo 100% editable -->
                            <div class="col-md-6">
                                <label class="service-addon-label h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="radio" name="calc_tipo_licencia" value="fuente" class="form-check-input">
                                        <div class="addon-content">
                                            <strong class="d-block text-slate-900">Código Fuente Completo</strong>
                                            <span class="fs-xs text-slate-500">100% editable + Base de Datos + Derechos</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Paso 3: Servicios adicionales opcionales -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-slate-800">3. Servicios Adicionales (Opcionales):</label>
                        <div class="vstack gap-2">
                            <!-- Servicio adicional 1: Hosting y dominio -->
                            <label class="service-addon-label">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="checkbox" class="form-check-input calc-addon-check" data-price="120" data-name="Hosting SSD + Dominio .com por 1 año">
                                    <div class="addon-content">
                                        <strong class="text-slate-900">Hosting SSD NVMe + Dominio .com (1 año)</strong>
                                        <span class="d-block fs-xs text-slate-500">Servidor optimizado para Laravel 12 y MySQL con SSL gratis</span>
                                    </div>
                                </div>
                                <span class="fw-bold text-indigo">+ S/. 120.00</span>
                            </label>

                            <!-- Servicio adicional 2: Instalacion remota -->
                            <label class="service-addon-label">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="checkbox" class="form-check-input calc-addon-check" data-price="80" data-name="Instalación y Configuración Remota">
                                    <div class="addon-content">
                                        <strong class="text-slate-900">Instalación y Configuración Remota (AnyDesk)</strong>
                                        <span class="d-block fs-xs text-slate-500">Puesta en marcha en tu servidor local WAMP o VPS en la nube</span>
                                    </div>
                                </div>
                                <span class="fw-bold text-indigo">+ S/. 80.00</span>
                            </label>

                            <!-- Servicio adicional 3: Capacitacion personalizada -->
                            <label class="service-addon-label">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="checkbox" class="form-check-input calc-addon-check" data-price="90" data-name="Capacitación personalizada por Zoom">
                                    <div class="addon-content">
                                        <strong class="text-slate-900">Capacitación Personalizada (Sesión en vivo de 2 horas)</strong>
                                        <span class="d-block fs-xs text-slate-500">Inducción directa a tu equipo de trabajo o cajeros</span>
                                    </div>
                                </div>
                                <span class="fw-bold text-indigo">+ S/. 90.00</span>
                            </label>
                        </div>
                    </div>

                    <!-- Panel del total calculado con boton para derivar a WhatsApp -->
                    <div class="bg-indigo-950 text-white p-4 rounded-4 text-center">
                        <span class="text-slate-300 fs-sm text-uppercase tracking-wider fw-semibold">Presupuesto Total Estimado</span>
                        <!-- Monto dinamico calculado en tiempo real con JavaScript -->
                        <div class="display-5 fw-extrabold text-white my-2" id="calcTotalPrice">
                            S/. 0.00
                        </div>
                        <p class="text-slate-400 fs-xs mb-4">
                            Precios netos sin costos ocultos. Incluye garantía técnica de soporte y actualizaciones.
                        </p>
                        <!-- Boton interactivo para contactar con los datos calculados -->
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a id="calcBtnWhatsApp" href="#" target="_blank" class="btn btn-emerald-gradient btn-lg px-4 py-3 rounded-pill fw-bold shadow-emerald d-flex align-items-center gap-2">
                                <i class="bi bi-whatsapp fs-5"></i>
                                <span>Solicitar Cotización por WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
