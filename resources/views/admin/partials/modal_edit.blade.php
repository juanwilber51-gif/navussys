<!-- Modal emergente para modificar los datos de un sistema existente -->
<div class="modal fade" id="modalEditSistema" tabindex="-1">
    <!-- Ventana de dialogo de tamano grande -->
    <div class="modal-dialog modal-lg">
        <!-- Contenido del modal con esquinas redondeadas -->
        <div class="modal-content rounded-4 border-0">
            <!-- Encabezado del modal en tono oscuro -->
            <div class="modal-header bg-slate-900 text-white rounded-top-4">
                <!-- Titulo del modal con icono de edicion -->
                <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square me-1"></i> Modificar Sistema Web</h5>
                <!-- Boton para cerrar el modal -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Formulario para enviar los cambios por metodo POST -->
            <form action="{{ route('admin.sistema.update') }}" method="POST">
                <!-- Token de proteccion CSRF de Laravel -->
                @csrf
                <!-- Campo oculto para almacenar el ID del sistema a editar -->
                <input type="hidden" name="id" id="editSysId">
                <!-- Cuerpo con los campos del formulario -->
                <div class="modal-body p-4">
                    <!-- Fila con disposicion en rejilla -->
                    <div class="row g-3">
                        <!-- Campo para modificar el nombre comercial -->
                        <div class="col-md-8">
                            <!-- Etiqueta del nombre -->
                            <label class="form-label small fw-bold">Nombre Comercial</label>
                            <!-- Input para el nombre cargado dinamicamente -->
                            <input type="text" name="nombre" id="editSysNombre" class="form-control" required>
                        </div>
                        <!-- Selector para modificar la categoria -->
                        <div class="col-md-4">
                            <!-- Etiqueta de categoria -->
                            <label class="form-label small fw-bold">Categoria</label>
                            <!-- Desplegable con las categorias disponibles -->
                            <select name="categoria_id" id="editSysCategoria" class="form-select" required>
                                <!-- Itera sobre las categorias -->
                                @foreach ($categorias as $c)
                                    <!-- Opcion individual con ID de categoria -->
                                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Campo para la descripcion corta -->
                        <div class="col-12">
                            <!-- Etiqueta de la descripcion corta -->
                            <label class="form-label small fw-bold">Descripcion Corta</label>
                            <!-- Input de texto con la descripcion corta -->
                            <input type="text" name="descripcion_corta" id="editSysDescCorta" class="form-control" required>
                        </div>
                        <!-- Campo para la descripcion detallada -->
                        <div class="col-12">
                            <!-- Etiqueta de la descripcion larga -->
                            <label class="form-label small fw-bold">Descripcion Detallada</label>
                            <!-- Area de texto con la descripcion completa -->
                            <textarea name="descripcion_larga" id="editSysDescLarga" rows="3" class="form-control" required></textarea>
                        </div>
                        <!-- Campo para el precio de licencia comercial -->
                        <div class="col-md-6">
                            <!-- Etiqueta del precio comercial -->
                            <label class="form-label small fw-bold">Precio Comercial (S/.)</label>
                            <!-- Input numerico para el precio comercial -->
                            <input type="number" step="0.01" name="precio_base" id="editSysPrecioBase" class="form-control" required>
                        </div>
                        <!-- Campo para el precio del codigo fuente -->
                        <div class="col-md-6">
                            <!-- Etiqueta del precio de codigo fuente -->
                            <label class="form-label small fw-bold">Precio Cod. Fuente (S/.)</label>
                            <!-- Input numerico para el precio de codigo fuente -->
                            <input type="number" step="0.01" name="precio_codigo_fuente" id="editSysPrecioFuente" class="form-control" required>
                        </div>
                        <!-- Campo para el listado de tecnologias -->
                        <div class="col-md-6">
                            <!-- Etiqueta de tecnologias -->
                            <label class="form-label small fw-bold">Tecnologias</label>
                            <!-- Input de texto con las tecnologias -->
                            <input type="text" name="tecnologias" id="editSysTech" class="form-control" required>
                        </div>
                        <!-- Campo para el estado de publicacion del sistema -->
                        <div class="col-md-6">
                            <!-- Etiqueta del estado -->
                            <label class="form-label small fw-bold">Estado</label>
                            <!-- Selector del estado activo o desactivado -->
                            <select name="estado" id="editSysEstado" class="form-select">
                                <!-- Opcion activo -->
                                <option value="1">Activo en Catalogo</option>
                                <!-- Opcion inactivo -->
                                <option value="0">Oculto / Desactivado</option>
                            </select>
                        </div>
                        <!-- Campo para las caracteristicas del sistema -->
                        <div class="col-12">
                            <!-- Etiqueta de caracteristicas -->
                            <label class="form-label small fw-bold">Caracteristicas</label>
                            <!-- Area de texto de caracteristicas -->
                            <textarea name="caracteristicas" id="editSysCaracteristicas" rows="4" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- Pie del modal con botones de accion -->
                <div class="modal-footer border-0 p-4 pt-0">
                    <!-- Boton para cancelar los cambios -->
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Boton para guardar la modificacion del sistema -->
                    <button type="submit" class="btn btn-indigo-gradient rounded-pill px-4 fw-bold">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
