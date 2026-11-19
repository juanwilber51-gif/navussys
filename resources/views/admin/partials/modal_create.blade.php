<!-- Modal emergente para registrar un nuevo sistema web en el catalogo -->
<div class="modal fade" id="modalNewSistema" tabindex="-1">
    <!-- Ventana de dialogo de tamano grande -->
    <div class="modal-dialog modal-lg">
        <!-- Contenido del modal con esquinas redondeadas -->
        <div class="modal-content rounded-4 border-0">
            <!-- Encabezado del modal con fondo oscuro -->
            <div class="modal-header bg-slate-900 text-white rounded-top-4">
                <!-- Titulo del modal con icono representativo -->
                <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle me-1"></i> Registrar Nuevo Sistema Web</h5>
                <!-- Boton para cerrar el modal -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Formulario para enviar los datos por metodo POST a la ruta de almacenamiento -->
            <form action="{{ route('admin.sistema.store') }}" method="POST">
                <!-- Directiva para insertar token CSRF de proteccion -->
                @csrf
                <!-- Cuerpo del formulario del modal -->
                <div class="modal-body p-4">
                    <!-- Fila con disposicion de rejilla Bootstrap -->
                    <div class="row g-3">
                        <!-- Campo para el nombre comercial del sistema -->
                        <div class="col-md-8">
                            <!-- Etiqueta del campo -->
                            <label class="form-label small fw-bold">Nombre Comercial del Sistema *</label>
                            <!-- Input de texto con valor requerido -->
                            <input type="text" name="nombre" class="form-control" required placeholder="Ej: NAVUS-PHARMA: Gestion de Farmacias">
                        </div>
                        <!-- Campo para seleccionar la categoria del sistema -->
                        <div class="col-md-4">
                            <!-- Etiqueta del selector -->
                            <label class="form-label small fw-bold">Categoria *</label>
                            <!-- Selector desplegable de categorias registradas -->
                            <select name="categoria_id" class="form-select" required>
                                <!-- Recorre la coleccion de categorias disponibles -->
                                @foreach ($categorias as $c)
                                    <!-- Opcion individual con ID de categoria -->
                                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Campo para la descripcion corta visible en la tarjeta -->
                        <div class="col-12">
                            <!-- Etiqueta del campo -->
                            <label class="form-label small fw-bold">Descripcion Corta *</label>
                            <!-- Input para ingresar el resumen corto -->
                            <input type="text" name="descripcion_corta" class="form-control" required placeholder="Resumen en una frase de los beneficios clave">
                        </div>
                        <!-- Campo para la descripcion completa y detallada -->
                        <div class="col-12">
                            <!-- Etiqueta del area de texto -->
                            <label class="form-label small fw-bold">Descripcion Detallada *</label>
                            <!-- Area de texto para la explicacion exhaustiva -->
                            <textarea name="descripcion_larga" rows="3" class="form-control" required placeholder="Explicacion exhaustiva del funcionamiento y alcance"></textarea>
                        </div>
                        <!-- Campo para el precio de la licencia comercial -->
                        <div class="col-md-6">
                            <!-- Etiqueta del precio comercial -->
                            <label class="form-label small fw-bold">Precio Licencia Comercial (S/.) *</label>
                            <!-- Input numerico decimal para el precio comercial -->
                            <input type="number" step="0.01" name="precio_base" class="form-control" required placeholder="350.00">
                        </div>
                        <!-- Campo para el precio del codigo fuente completo -->
                        <div class="col-md-6">
                            <!-- Etiqueta del precio de codigo fuente -->
                            <label class="form-label small fw-bold">Precio Codigo Fuente Completo (S/.) *</label>
                            <!-- Input numerico decimal para el codigo fuente -->
                            <input type="number" step="0.01" name="precio_codigo_fuente" class="form-control" required placeholder="950.00">
                        </div>
                        <!-- Campo para listar las tecnologias que componen el software -->
                        <div class="col-md-6">
                            <!-- Etiqueta del stack tecnologico -->
                            <label class="form-label small fw-bold">Stack Tecnologico *</label>
                            <!-- Input de texto separado por comas -->
                            <input type="text" name="tecnologias" class="form-control" required placeholder="PHP 8.3, Laravel 12, MySQL, Tailwind">
                        </div>
                        <!-- Campo opcional para ingresar enlace o ancla de demostracion -->
                        <div class="col-md-6">
                            <!-- Etiqueta de la demo -->
                            <label class="form-label small fw-bold">Enlace o ID de Demo</label>
                            <!-- Input de texto con identificador de la demo -->
                            <input type="text" name="demo_url" class="form-control" placeholder="#demo-pos">
                        </div>
                        <!-- Campo para ingresar la lista de caracteristicas una por linea -->
                        <div class="col-12">
                            <!-- Etiqueta de caracteristicas -->
                            <label class="form-label small fw-bold">Caracteristicas (Una por linea) *</label>
                            <!-- Area de texto de caracteristicas -->
                            <textarea name="caracteristicas" rows="4" class="form-control" required placeholder="Ventas rapidas con atajos&#10;Arqueo de caja chica&#10;Exportacion en Excel"></textarea>
                        </div>
                        <!-- Interruptor para marcar el sistema como destacado en la portada -->
                        <div class="col-12">
                            <!-- Contenedor switch de Bootstrap -->
                            <div class="form-check form-switch">
                                <!-- Checkbox de estado destacado marcado por defecto -->
                                <input class="form-check-input" type="checkbox" name="destacado" value="1" checked>
                                <!-- Etiqueta explicativa del switch -->
                                <label class="form-check-label small">Destacar en la portada principal</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pie del modal con botones de accion -->
                <div class="modal-footer border-0 p-4 pt-0">
                    <!-- Boton para cancelar y cerrar el modal -->
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Boton de envio para registrar el sistema -->
                    <button type="submit" class="btn btn-indigo-gradient rounded-pill px-4 fw-bold">Guardar Sistema</button>
                </div>
            </form>
        </div>
    </div>
</div>
