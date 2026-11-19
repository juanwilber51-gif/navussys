<!-- Contenedor del panel de resumen de metricas e indicadores clave -->
<div class="tab-pane fade show active" id="tab-resumen">
    <!-- Fila de tarjetas KPI con indicadores de gestion -->
    <div class="row g-3 mb-4">
        <!-- Tarjeta KPI 1: Cantidad de sistemas en venta -->
        <div class="col-md-3 col-sm-6">
            <!-- Tarjeta con sombra suave y estilo redondeado -->
            <div class="kpi-card">
                <!-- Cabecera de la tarjeta con titulo e icono -->
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <!-- Etiqueta del indicador -->
                    <span class="text-muted small fw-semibold">Sistemas en Venta</span>
                    <!-- Icono en contenedor de color indigo -->
                    <div class="kpi-icon bg-indigo-subtle text-indigo">
                        <!-- Icono de laptop -->
                        <i class="bi bi-laptop"></i>
                    </div>
                </div>
                <!-- Valor numerico total de sistemas activos -->
                <h3 class="fw-bold mb-1">{{ $stats['total_sistemas'] }}</h3>
                <!-- Etiqueta de estado en color verde -->
                <span class="text-success small"><i class="bi bi-arrow-up-right me-1"></i> Laravel 12 Active</span>
            </div>
        </div>

        <!-- Tarjeta KPI 2: Cantidad de cotizaciones recibidas -->
        <div class="col-md-3 col-sm-6">
            <!-- Tarjeta de indicadores de pedidos -->
            <div class="kpi-card">
                <!-- Encabezado de la tarjeta -->
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <!-- Etiqueta de la metrica -->
                    <span class="text-muted small fw-semibold">Cotizaciones Recibidas</span>
                    <!-- Icono en contenedor esmeralda -->
                    <div class="kpi-icon bg-emerald-subtle text-emerald">
                        <!-- Icono de carrito -->
                        <i class="bi bi-cart-check"></i>
                    </div>
                </div>
                <!-- Total acumulado de cotizaciones -->
                <h3 class="fw-bold mb-1">{{ $stats['total_pedidos'] }}</h3>
                <!-- Indicador de prospectos calificados -->
                <span class="text-primary small"><i class="bi bi-person-lines-fill me-1"></i> Leads calificados</span>
            </div>
        </div>

        <!-- Tarjeta KPI 3: Presupuesto total estimado -->
        <div class="col-md-3 col-sm-6">
            <!-- Tarjeta de valor monetario total -->
            <div class="kpi-card">
                <!-- Encabezado de la tarjeta -->
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <!-- Etiqueta del monto total -->
                    <span class="text-muted small fw-semibold">Presupuesto Estimado</span>
                    <!-- Icono en contenedor celeste cian -->
                    <div class="kpi-icon bg-cyan-subtle text-cyan">
                        <!-- Icono de billetes y dinero -->
                        <i class="bi bi-cash-stack"></i>
                    </div>
                </div>
                <!-- Monto en soles peruanos formateado -->
                <h3 class="fw-bold mb-1">S/. {{ number_format($stats['total_ingresos'], 2) }}</h3>
                <!-- Estado del monto en negociacion comercial -->
                <span class="text-emerald small"><i class="bi bi-graph-up-arrow me-1"></i> En negociacion</span>
            </div>
        </div>

        <!-- Tarjeta KPI 4: Mensajes de contacto recibidos -->
        <div class="col-md-3 col-sm-6">
            <!-- Tarjeta de consultas de clientes -->
            <div class="kpi-card">
                <!-- Encabezado de la tarjeta -->
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <!-- Etiqueta de mensajes -->
                    <span class="text-muted small fw-semibold">Mensajes de Contacto</span>
                    <!-- Icono en contenedor ambar advertencia -->
                    <div class="kpi-icon bg-warning-subtle text-warning">
                        <!-- Icono de sobre de correo -->
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <!-- Total de mensajes en bandeja -->
                <h3 class="fw-bold mb-1">{{ $stats['total_mensajes'] }}</h3>
                <!-- Subtexto de soporte directo por WhatsApp -->
                <span class="text-muted small">Atencion directa WhatsApp</span>
            </div>
        </div>
    </div>

    <!-- Fila de graficos estadisticos interactivos -->
    <div class="row g-4 mb-4">
        <!-- Columna del grafico de tendencias de ventas -->
        <div class="col-lg-8">
            <!-- Tarjeta contenedora del grafico de lineas -->
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <!-- Cabecera del grafico de ventas -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Titulo del grafico de demanda comercial -->
                    <h5 class="fw-bold mb-0">Demanda de Sistemas y Proyeccion Comercial 2026</h5>
                    <!-- Badge con estado de actualizacion en vivo -->
                    <span class="badge bg-indigo-subtle text-indigo">Actualizado en Tiempo Real</span>
                </div>
                <!-- Canvas para renderizar el grafico de tendencias con Chart.js -->
                <canvas id="salesTrendChart" height="120"></canvas>
            </div>
        </div>
        <!-- Columna del grafico de distribucion por categorias -->
        <div class="col-lg-4">
            <!-- Tarjeta contenedora del grafico dona -->
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <!-- Titulo del grafico de distribucion -->
                <h5 class="fw-bold mb-3">Distribucion por Categorias</h5>
                <!-- Canvas para renderizar el grafico de categorias con Chart.js -->
                <canvas id="categoriesDoughnutChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
