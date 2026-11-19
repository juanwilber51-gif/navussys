<!-- ========================================================
     MODAL DE COTIZACION Y PEDIDO RAPIDO
     ======================================================== -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
    <!-- Ventana de dialogo centrada -->
    <div class="modal-dialog modal-dialog-centered">
        <!-- Contenido con bordes estilizados -->
        <div class="modal-content rounded-4 border-0 shadow-2xl">
            <!-- Encabezado del modal en azul oscuro -->
            <div class="modal-header bg-indigo-950 text-white rounded-top-4 p-4">
                <div>
                    <!-- Badge de confirmacion de cotizacion -->
                    <span class="badge bg-emerald-500/20 text-emerald rounded-pill px-2.5 py-1 fs-xs mb-1">Cotización Oficial</span>
                    <!-- Titulo con el nombre del sistema seleccionado -->
                    <h5 class="modal-title fw-bold mb-0 text-white" id="orderSysNameDisplay">Sistema Web</h5>
                </div>
                <!-- Boton para cerrar el modal -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Formulario de envio de pedido procesado por AJAX -->
            <form id="orderFormModal">
                <div class="modal-body p-4">
                    <!-- Campo oculto para el ID del sistema -->
                    <input type="hidden" name="sistema_id" id="orderSysId">
                    <!-- Campo oculto para el precio total -->
                    <input type="hidden" name="precio_total" id="orderPriceDisplay">

                    <!-- Campo: Nombre o razon social del solicitante -->
                    <div class="mb-3">
                        <label class="form-label fs-sm fw-semibold">Tu Nombre o Razón Social *</label>
                        <input type="text" name="cliente_nombre" class="form-control" placeholder="Ej: Carlos Mendoza" required>
                    </div>

                    <!-- Fila con email y telefono -->
                    <div class="row g-2 mb-3">
                        <!-- Campo: Correo electronico -->
                        <div class="col-6">
                            <label class="form-label fs-sm fw-semibold">Correo Electrónico *</label>
                            <input type="email" name="cliente_email" class="form-control" placeholder="carlos@correo.com" required>
                        </div>
                        <!-- Campo: WhatsApp o telefono -->
                        <div class="col-6">
                            <label class="form-label fs-sm fw-semibold">WhatsApp / Teléfono *</label>
                            <input type="text" name="cliente_telefono" class="form-control" placeholder="+51 900 000 000" required>
                        </div>
                    </div>

                    <!-- Selector de la modalidad de adquisicion -->
                    <div class="mb-3">
                        <label class="form-label fs-sm fw-semibold">Modalidad de Adquisición:</label>
                        <select name="tipo_licencia" class="form-select">
                            <option value="Licencia Comercial Instalada">Licencia Comercial (Listo para operar)</option>
                            <option value="Código Fuente Completo + BD">Código Fuente Completo (100% editable)</option>
                        </select>
                    </div>

                    <!-- Campo: Comentarios u observaciones adicionales -->
                    <div class="mb-3">
                        <label class="form-label fs-sm fw-semibold">Comentarios o Adaptaciones que Necesites:</label>
                        <textarea name="observaciones" rows="2" class="form-control" placeholder="Opcional: Si deseas que adaptemos algo a tu negocio..."></textarea>
                    </div>

                    <!-- Cuadro con el monto base a invertir -->
                    <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
                        <span class="fs-sm fw-semibold text-slate-700">Monto Base de Inversión:</span>
                        <strong class="fs-5 text-indigo" id="orderPriceText">S/. 0.00</strong>
                    </div>
                </div>
                <!-- Pie del modal con boton de cancelacion y boton de envio a WhatsApp -->
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-emerald-gradient rounded-pill px-4 fw-bold shadow-emerald">
                        <i class="bi bi-send-check-fill me-1"></i> Confirmar y Enviar Cotización
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
