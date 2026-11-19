<!-- Contenedor del panel de control de cotizaciones y pedidos -->
<div class="tab-pane fade" id="tab-pedidos">
    <!-- Tarjeta contenedora de la lista de pedidos -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <!-- Titulo de la seccion de pedidos -->
        <h5 class="fw-bold mb-4">Solicitudes de Cotizacion y Pedidos de Clientes</h5>
        <!-- Condicion cuando no existen pedidos registrados -->
        @if ($pedidos->isEmpty())
            <!-- Mensaje informativo cuando la bandeja de pedidos esta vacia -->
            <p class="text-muted text-center py-4">Aun no se registran pedidos a traves de la web.</p>
        <!-- Bloque cuando si existen pedidos -->
        @else
            <!-- Contenedor responsivo de la tabla de pedidos -->
            <div class="table-responsive">
                <!-- Tabla interactiva con efecto hover -->
                <table class="table table-hover align-middle">
                    <!-- Cabecera de columnas de la tabla -->
                    <thead class="table-light">
                        <!-- Fila de nombres de campos -->
                        <tr>
                            <!-- Numero de orden o identificador -->
                            <th>#</th>
                            <!-- Fecha de recepcion de la solicitud -->
                            <th>Fecha</th>
                            <!-- Datos del solicitante -->
                            <th>Cliente</th>
                            <!-- Boton directo de atencion por WhatsApp -->
                            <th>Contacto Directo</th>
                            <!-- Nombre del software cotizado -->
                            <th>Sistema</th>
                            <!-- Modalidad o tipo de licencia solicitada -->
                            <th>Licencia</th>
                            <!-- Monto total de la cotizacion -->
                            <th>Total</th>
                            <!-- Estado de seguimiento del pedido -->
                            <th>Estado</th>
                            <!-- Ver notas o requerimientos adicionales -->
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <!-- Registros de pedidos -->
                    <tbody>
                        <!-- Recorre cada pedido de la base de datos -->
                        @foreach ($pedidos as $p)
                            <!-- Fila de datos del pedido -->
                            <tr>
                                <!-- Muestra el ID del pedido -->
                                <td><strong>#{{ $p->id }}</strong></td>
                                <!-- Fecha y hora de registro formateada -->
                                <td class="small text-muted">{{ $p->created_at->format('d/m/Y H:i') }}</td>
                                <!-- Informacion de contacto del cliente -->
                                <td>
                                    <!-- Nombre del cliente -->
                                    <strong>{{ $p->cliente_nombre }}</strong>
                                    <!-- Correo electronico del cliente -->
                                    <div class="small text-muted">{{ $p->cliente_email }}</div>
                                </td>
                                <!-- Boton para abrir conversacion directa en WhatsApp con el numero del cliente -->
                                <td>
                                    <!-- Enlace a la API de WhatsApp sin caracteres especiales en el telefono -->
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->cliente_telefono) }}" target="_blank" class="btn btn-sm btn-success py-0 px-2 rounded-pill">
                                        <!-- Icono de WhatsApp con el numero de telefono -->
                                        <i class="bi bi-whatsapp"></i> {{ $p->cliente_telefono }}
                                    </a>
                                </td>
                                <!-- Nombre del sistema asociado a la cotizacion -->
                                <td>{{ $p->sistema->nombre ?? 'Sistema Web' }}</td>
                                <!-- Tipo de licencia con badge informativo -->
                                <td><span class="badge bg-light text-dark border">{{ $p->tipo_licencia }}</span></td>
                                <!-- Monto total en soles -->
                                <td><strong class="text-emerald">S/. {{ number_format($p->precio_total, 2) }}</strong></td>
                                <!-- Formulario inline para actualizar el estado del pedido -->
                                <td>
                                    <!-- Formulario enviado mediante metodo POST al cambiar la seleccion -->
                                    <form action="{{ route('admin.pedido.status') }}" method="POST" class="d-inline">
                                        <!-- Token de seguridad CSRF de Laravel -->
                                        @csrf
                                        <!-- Campo oculto con el identificador del pedido -->
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <!-- Selector de estado con envio automatico onchange -->
                                        <select name="estado" class="form-select form-select-sm" onchange="this.form.submit()">
                                            <!-- Opcion: Pendiente de revision -->
                                            <option value="pendiente" {{ $p->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <!-- Opcion: En proceso de desarrollo o implementacion -->
                                            <option value="en_proceso" {{ $p->estado === 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                                            <!-- Opcion: Completado y entregado -->
                                            <option value="completado" {{ $p->estado === 'completado' ? 'selected' : '' }}>Completado</option>
                                            <!-- Opcion: Cancelado por el cliente -->
                                            <option value="cancelado" {{ $p->estado === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                        </select>
                                    </form>
                                </td>
                                <!-- Boton para ver observaciones mediante alerta emergente SweetAlert2 -->
                                <td>
                                    <!-- Boton con icono de ojo -->
                                    <button class="btn btn-sm btn-outline-secondary" onclick="Swal.fire('Detalles del Pedido', '{{ addslashes($p->observaciones ?: 'Sin observaciones adicionales') }}', 'info')">
                                        <!-- Icono de visualizar -->
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
