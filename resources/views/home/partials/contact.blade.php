<!-- ========================================================
     SECCION DE CONTACTO Y UBICACION OFICIAL
     ======================================================== -->
<section id="contacto" class="py-5 bg-white">
    <!-- Contenedor central -->
    <div class="container">
        <!-- Encabezado con titulo y presentacion -->
        <div class="text-center max-w-2xl mx-auto mb-5">
            <!-- Badge superior rojo atencion -->
            <span class="badge bg-danger-subtle text-danger px-3 py-1.5 rounded-pill fw-semibold text-uppercase tracking-wider fs-xs mb-2">
                Atención Directa
            </span>
            <!-- Titulo de nivel 2 -->
            <h2 class="display-6 fw-bold text-slate-900">Comunícate con Nosotros</h2>
            <!-- Parrafo de introduccion -->
            <p class="text-slate-600">
                Estamos listos para implementar el sistema ideal para tu negocio o brindarte una demostración guiada.
            </p>
        </div>

        <!-- Fila con el formulario a la izquierda y datos de oficina a la derecha -->
        <div class="row g-5">
            <!-- Columna izquierda: Formulario de contacto interactivo -->
            <div class="col-lg-7">
                <!-- Tarjeta con sombra sutil para el formulario -->
                <div class="card p-4 rounded-4 shadow-sm border">
                    <h5 class="fw-bold text-slate-800 mb-3"><i class="bi bi-send-fill text-primary me-2"></i> Envíanos tu Consulta</h5>
                    <!-- Formulario de contacto procesado por JavaScript/AJAX -->
                    <form id="contactForm">
                        <div class="row g-3">
                            <!-- Campo: Nombre completo -->
                            <div class="col-md-6">
                                <label class="form-label fs-sm fw-semibold">Nombre Completo *</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ej: Roberto Quispe" required>
                            </div>
                            <!-- Campo: Correo electronico -->
                            <div class="col-md-6">
                                <label class="form-label fs-sm fw-semibold">Correo Electrónico *</label>
                                <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                            </div>
                            <!-- Campo: Telefono de contacto -->
                            <div class="col-md-6">
                                <label class="form-label fs-sm fw-semibold">Teléfono / WhatsApp</label>
                                <input type="text" name="telefono" class="form-control" placeholder="+51 900 000 000">
                            </div>
                            <!-- Campo: Asunto o interes comercial -->
                            <div class="col-md-6">
                                <label class="form-label fs-sm fw-semibold">Asunto o Sistema de Interés</label>
                                <input type="text" name="asunto" class="form-control" placeholder="Ej: Cotización Sistema de Ventas POS">
                            </div>
                            <!-- Campo: Detalle del mensaje o requerimientos -->
                            <div class="col-12">
                                <label class="form-label fs-sm fw-semibold">Detalle de tu Proyecto o Requerimiento *</label>
                                <textarea name="mensaje" rows="4" class="form-control" placeholder="Describe qué rubro tienes y qué funciones necesitas..." required></textarea>
                            </div>
                            <!-- Boton de envio del formulario -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-indigo-gradient w-100 py-3 rounded-pill fw-bold shadow-lg">
                                    <i class="bi bi-envelope-paper-fill me-1"></i> Enviar Mensaje a Ing. Juan Wilber
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Columna derecha: Tarjeta informativa con datos y direccion fisica -->
            <div class="col-lg-5">
                <div class="card p-4 rounded-4 bg-slate-50 border h-100">
                    <h5 class="fw-bold text-slate-900 mb-4"><i class="bi bi-buildings-fill text-indigo me-2"></i> Oficina Principal</h5>
                    
                    <!-- Lista vertical de datos de contacto institucional -->
                    <div class="vstack gap-3 mb-4">
                        <!-- Dato 1: Direccion fisica de la oficina -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="contact-icon bg-indigo-subtle text-indigo rounded-circle">
                                <i class="bi bi-geo-alt-fill fs-5"></i>
                            </div>
                            <div>
                                <span class="d-block text-slate-500 fs-xs text-uppercase fw-semibold">Dirección</span>
                                <strong class="text-slate-800">Avenida Grau con Calle 2 de Mayo</strong>
                            </div>
                        </div>

                        <!-- Dato 2: WhatsApp oficial con enlace directo -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="contact-icon bg-emerald-subtle text-emerald rounded-circle">
                                <i class="bi bi-whatsapp fs-5"></i>
                            </div>
                            <div>
                                <span class="d-block text-slate-500 fs-xs text-uppercase fw-semibold">WhatsApp Oficial</span>
                                <a href="https://wa.me/51935114374" target="_blank" class="text-emerald text-decoration-none fw-bold">
                                    +51 935114374
                                </a>
                            </div>
                        </div>

                        <!-- Dato 3: Correo electronico corporativo -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="contact-icon bg-cyan-subtle text-cyan rounded-circle">
                                <i class="bi bi-envelope-at-fill fs-5"></i>
                            </div>
                            <div>
                                <span class="d-block text-slate-500 fs-xs text-uppercase fw-semibold">Correo Electrónico</span>
                                <a href="mailto:juanwilber@gmail.com" class="text-slate-800 text-decoration-none fw-semibold">
                                    juanwilber@gmail.com
                                </a>
                            </div>
                        </div>

                        <!-- Dato 4: Ingeniero desarrollador responsable -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="contact-icon bg-warning-subtle text-warning rounded-circle">
                                <i class="bi bi-person-check-fill fs-5"></i>
                            </div>
                            <div>
                                <span class="d-block text-slate-500 fs-xs text-uppercase fw-semibold">Desarrollador Responsable</span>
                                <strong class="text-slate-800">Juan Wilber Supa Ttito</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Cuadro informativo para visitas con cita previa -->
                    <div class="p-3 bg-white rounded-3 border text-center mt-auto">
                        <i class="bi bi-map-fill text-danger fs-3 mb-1 d-block"></i>
                        <span class="fs-xs text-slate-500 d-block">Atención presencial previa cita en:</span>
                        <strong class="fs-sm text-slate-800">Avenida Grau con Calle 2 de Mayo</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
