<!-- Contenedor del panel de mensajes recibidos de clientes -->
<div class="tab-pane fade" id="tab-mensajes">
    <!-- Tarjeta contenedora de la bandeja de mensajes -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <!-- Titulo de la seccion de mensajes -->
        <h5 class="fw-bold mb-4">Mensajes Recibidos desde el Formulario Web</h5>
        <!-- Condicion cuando no hay mensajes en la bandeja -->
        @if ($mensajes->isEmpty())
            <!-- Texto informativo de bandeja vacia -->
            <p class="text-muted text-center py-4">Bandeja de mensajes vacia.</p>
        <!-- Bloque cuando si existen mensajes registrados -->
        @else
            <!-- Contenedor vertical de tarjetas de mensajes con espaciado -->
            <div class="vstack gap-3">
                <!-- Itera sobre cada mensaje recibido -->
                @foreach ($mensajes as $m)
                    <!-- Tarjeta individual para mostrar el mensaje -->
                    <div class="p-3 bg-light rounded-3 border">
                        <!-- Cabecera del mensaje con datos del remitente y fecha -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <!-- Datos del remitente -->
                            <div>
                                <!-- Nombre de la persona que envio el mensaje -->
                                <strong>{{ $m->nombre }}</strong>
                                <!-- Correo electronico entre simbolos de menor y mayor -->
                                <span class="text-muted small ms-2">&lt;{{ $m->email }}&gt;</span>
                                <!-- Condicion si el remitente registro su numero telefonico -->
                                @if ($m->telefono)
                                    <!-- Badge con el numero de telefono -->
                                    <span class="badge bg-secondary ms-2">{{ $m->telefono }}</span>
                                @endif
                            </div>
                            <!-- Fecha y hora de recepcion del mensaje -->
                            <span class="small text-muted">{{ $m->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <!-- Asunto del mensaje -->
                        <h6 class="text-primary fs-sm fw-bold mb-1">{{ $m->asunto }}</h6>
                        <!-- Contenido completo del mensaje -->
                        <p class="mb-0 small text-slate-700">{{ $m->mensaje }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
