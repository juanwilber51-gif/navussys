<!-- ========================================================
     MODAL DE DETALLES DEL SISTEMA DINAMICO
     ======================================================== -->
<div class="modal fade" id="systemDetailsModal" tabindex="-1" aria-hidden="true">
    <!-- Ventana de dialogo centrada en pantalla -->
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!-- Contenido del modal con diseno curvado -->
        <div class="modal-content rounded-4 border-0 shadow-2xl">
            <!-- Encabezado del modal con fondo pizarra oscuro -->
            <div class="modal-header bg-slate-900 text-white rounded-top-4 p-4">
                <div>
                    <!-- Badge para la categoria del sistema seleccionado -->
                    <span class="badge bg-indigo-500/30 text-indigo-300 rounded-pill px-3 py-1 fs-xs text-uppercase mb-1" id="modalSysCategory">Categoría</span>
                    <!-- Titulo del sistema cargado por JavaScript -->
                    <h4 class="modal-title fw-bold mb-0 text-white" id="modalSysTitle">Nombre del Sistema</h4>
                </div>
                <!-- Boton para cerrar el modal -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Cuerpo del modal con informacion detallada -->
            <div class="modal-body p-4">
                <!-- Descripcion corta del sistema -->
                <p class="lead fs-6 text-slate-700" id="modalSysShortDesc"></p>
                <!-- Seccion de descripcion completa -->
                <div class="mb-4">
                    <h6 class="fw-bold text-slate-900 border-bottom pb-2">Descripción Completa</h6>
                    <p class="text-slate-600 fs-sm" id="modalSysLongDesc"></p>
                </div>
                <!-- Seccion de caracteristicas y funcionalidades del sistema -->
                <div class="mb-4">
                    <h6 class="fw-bold text-slate-900 border-bottom pb-2">Características Principales</h6>
                    <ul class="list-unstyled text-slate-700 fs-sm" id="modalSysFeatures"></ul>
                </div>
                <!-- Seccion del stack y arquitectura tecnologica -->
                <div class="mb-4">
                    <h6 class="fw-bold text-slate-900 border-bottom pb-2">Arquitectura & Stack</h6>
                    <span class="badge bg-dark text-white p-2 fs-xs" id="modalSysTech"></span>
                </div>
                <!-- Cuadro comparativo de precios de compra -->
                <div class="row g-3 bg-slate-50 p-3 rounded-3 border">
                    <!-- Precio por la licencia comercial -->
                    <div class="col-6">
                        <span class="text-slate-500 fs-xs d-block">Licencia Comercial:</span>
                        <strong class="text-slate-900 fs-5" id="modalSysPriceComercial"></strong>
                    </div>
                    <!-- Precio por el codigo fuente completo -->
                    <div class="col-6">
                        <span class="text-slate-500 fs-xs d-block">Código Fuente Completo:</span>
                        <strong class="text-primary fs-5" id="modalSysPriceFuente"></strong>
                    </div>
                </div>
            </div>
            <!-- Pie del modal con boton para cotizar el sistema -->
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="modalSysOrderBtn" class="btn btn-indigo-gradient rounded-pill px-4 fw-bold">
                    <i class="bi bi-cart-check-fill me-1"></i> Solicitar este Sistema
                </button>
            </div>
        </div>
    </div>
</div>
