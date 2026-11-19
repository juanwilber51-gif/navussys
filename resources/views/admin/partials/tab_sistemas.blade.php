<!-- Contenedor del panel CRUD para la gestion de sistemas web -->
<div class="tab-pane fade" id="tab-sistemas">
    <!-- Tarjeta con borde suave y sombra para la tabla de inventario -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <!-- Cabecera con titulo y boton para registrar nuevo sistema -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Titulo de la seccion -->
            <h5 class="fw-bold mb-0">Catalogo de Sistemas Web en Venta</h5>
            <!-- Boton que abre el modal para crear nuevo sistema -->
            <button class="btn btn-indigo-gradient btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalNewSistema">
                <!-- Icono de agregar elemento -->
                <i class="bi bi-plus-lg me-1"></i> Agregar Sistema
            </button>
        </div>
        <!-- Contenedor responsivo para visualizacion fluida de la tabla -->
        <div class="table-responsive">
            <!-- Tabla con hover y alineacion vertical centrada -->
            <table class="table table-hover align-middle">
                <!-- Cabecera de la tabla con fondo claro -->
                <thead class="table-light">
                    <!-- Fila de nombres de columnas -->
                    <tr>
                        <!-- Columna de identificador unico -->
                        <th>ID</th>
                        <!-- Columna de nombre y tecnologias del software -->
                        <th>Sistema</th>
                        <!-- Columna de categoria a la que pertenece -->
                        <th>Categoria</th>
                        <!-- Columna de precio por licencia comercial -->
                        <th>Precio Comercial</th>
                        <!-- Columna de precio por codigo fuente completo -->
                        <th>Precio Cod. Fuente</th>
                        <!-- Columna de cantidad de implementaciones vendidas -->
                        <th>Implementaciones</th>
                        <!-- Columna de estado activo o inactivo -->
                        <th>Estado</th>
                        <!-- Columna de botones de accion -->
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla con los registros de sistemas -->
                <tbody>
                    <!-- Itera sobre la coleccion de sistemas registrados -->
                    @foreach ($sistemas as $s)
                        <!-- Fila individual por cada sistema -->
                        <tr>
                            <!-- Muestra el ID del sistema en un badge -->
                            <td><span class="badge bg-light text-dark border">#{{ $s->id }}</span></td>
                            <!-- Celda de datos principales del sistema -->
                            <td>
                                <!-- Nombre comercial del software -->
                                <strong>{{ $s->nombre }}</strong>
                                <!-- Tecnologias utilizadas con texto truncado si es extenso -->
                                <div class="small text-muted text-truncate" style="max-width: 280px;">{{ $s->tecnologias }}</div>
                            </td>
                            <!-- Categoria del sistema con badge informativo -->
                            <td><span class="badge bg-info-subtle text-info">{{ $s->categoria->nombre ?? 'General' }}</span></td>
                            <!-- Precio base comercial con formato monetario -->
                            <td><strong>S/. {{ number_format($s->precio_base, 2) }}</strong></td>
                            <!-- Precio de codigo fuente destacado en color primario -->
                            <td><span class="text-primary fw-bold">S/. {{ number_format($s->precio_codigo_fuente, 2) }}</span></td>
                            <!-- Numero de implementaciones realizadas -->
                            <td><span class="badge bg-secondary rounded-pill">{{ $s->ventas_count }}</span></td>
                            <!-- Estado actual de publicacion del sistema -->
                            <td>
                                <!-- Condicion si el sistema se encuentra activo -->
                                @if ($s->estado)
                                    <!-- Badge verde indicando disponibilidad activa -->
                                    <span class="badge bg-success">Activo</span>
                                <!-- Condicion si el sistema esta desactivado -->
                                @else
                                    <!-- Badge rojo indicando estado oculto -->
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <!-- Botones para editar o eliminar el sistema -->
                            <td class="text-end">
                                <!-- Boton que abre el modal de edicion con los datos del sistema cargados en JSON -->
                                <button class="btn btn-sm btn-outline-primary py-1 px-2" onclick="editSistemaModal({{ json_encode($s) }})">
                                    <!-- Icono de lapiz de modificacion -->
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <!-- Formulario para eliminar el sistema mediante peticion DELETE -->
                                <form action="{{ route('admin.sistema.delete', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro de eliminar este sistema?');">
                                    <!-- Directiva CSRF de proteccion de Laravel -->
                                    @csrf
                                    <!-- Directiva para simular el metodo HTTP DELETE -->
                                    @method('DELETE')
                                    <!-- Boton para ejecutar la eliminacion del registro -->
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2">
                                        <!-- Icono de tacho de basura -->
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
