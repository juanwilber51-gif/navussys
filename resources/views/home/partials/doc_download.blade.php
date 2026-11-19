<!-- ========================================================
     SECCION DE DESCARGA DEL INFORME ACADEMICO APA 7 (.DOCX)
     ======================================================== -->
<section class="py-5 bg-indigo-950 text-white">
    <!-- Contenedor central -->
    <div class="container">
        <!-- Tarjeta destacada con borde iluminado y sombra profunda -->
        <div class="card bg-slate-900/90 border border-indigo-500/40 rounded-4 p-4 p-lg-5 shadow-2xl">
            <!-- Rejilla con alineacion vertical -->
            <div class="row align-items-center g-4">
                <!-- Columna informativa sobre la memoria tecnica y normas APA -->
                <div class="col-lg-8">
                    <!-- Insignia de entregable academico oficial -->
                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-bold fs-xs text-uppercase mb-2">
                        <i class="bi bi-award-fill me-1"></i> Entregable Oficial de Proyecto Final
                    </span>
                    <!-- Titulo de la documentacion tecnica -->
                    <h3 class="fw-bold text-white mb-2">Memoria Técnica y Documentación en Word (APA 7ma Edición)</h3>
                    <!-- Descripcion de los capitulos y diagramas incluidos -->
                    <p class="text-slate-300 mb-0">
                        Descarga el informe técnico formal completo desarrollado bajo la guía académica con los Capítulos I al VIII: Análisis de requerimientos (RF/RNF), Reglas de Negocio, Casos de Uso, Modelo Relacional, Arquitectura con <strong>Laravel 12</strong> y los <strong>10 Diagramas UML con estética visual de Rational Rose</strong> en alta resolución.
                    </p>
                </div>
                <!-- Columna con el boton de descarga directa -->
                <div class="col-lg-4 text-lg-end text-center">
                    <!-- Enlace a la ruta de descarga del documento en Word -->
                    <a href="{{ route('docs.download') }}" class="btn btn-warning btn-lg px-4 py-3 rounded-pill fw-extrabold shadow-lg d-inline-flex align-items-center gap-2 text-dark">
                        <!-- Icono de Microsoft Word -->
                        <i class="bi bi-file-earmark-word-fill fs-4 text-primary"></i>
                        <!-- Texto del boton -->
                        <span>Descargar Informe .DOCX</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
