<!-- ========================================================
     SECCION DEL CATALOGO INTERACTIVO DE SISTEMAS WEB
     ======================================================== -->
<section id="catalogo" class="py-5">
    <!-- Contenedor central de la seccion -->
    <div class="container">
        <!-- Encabezado centrado del catalogo con subtitulo -->
        <div class="text-center max-w-2xl mx-auto mb-5">
            <!-- Badge superior de presentacion -->
            <span class="badge bg-indigo-100 text-primary px-3 py-1.5 rounded-pill fw-semibold text-uppercase tracking-wider fs-xs mb-2">
                Catalogo de Software Especializado
            </span>
            <!-- Titulo de nivel 2 -->
            <h2 class="display-6 fw-bold text-slate-900">Sistemas Web Profesionales para tu Empresa</h2>
            <!-- Parrafo explicativo de las opciones de adquisicion -->
            <p class="text-slate-600">
                Selecciona la solucion adaptada a tu rubro de negocio. Incluye opcion de codigo fuente completo o licencia comercial instalada con soporte.
            </p>
        </div>

        <!-- Barra de filtros por categoria y buscador interactivo -->
        <div class="bg-white p-3 rounded-4 shadow-sm border mb-4">
            <!-- Fila con disposicion responsive -->
            <div class="row g-3 align-items-center">
                <!-- Columna de botones de categorias -->
                <div class="col-lg-8">
                    <!-- Contenedor flex con envoltura de botones -->
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Boton para mostrar todos los sistemas -->
                        <a href="{{ route('home') }}#catalogo" class="btn btn-sm {{ empty(request('cat')) || request('cat') === 'todos' ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">
                            <i class="bi bi-grid-3x3-gap-fill me-1"></i> Todos ({{ $sistemas->count() }})
                        </a>
                        <!-- Itera sobre cada categoria activa de la base de datos -->
                        @foreach ($categorias as $catItem)
                            <!-- Boton individual por categoria con clase activa si coincide el slug -->
                            <a href="{{ route('home', ['cat' => $catItem->slug]) }}#catalogo" class="btn btn-sm {{ request('cat') === $catItem->slug ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">
                                <i class="bi {{ $catItem->icono }} me-1"></i> {{ $catItem->nombre }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Columna del buscador por texto interactivo en tiempo real -->
                <div class="col-lg-4">
                    <!-- Grupo de entrada con icono de lupa -->
                    <div class="input-group">
                        <!-- Icono de lupa de busqueda -->
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <!-- Input de texto para filtrar las tarjetas por JavaScript -->
                        <input type="text" id="searchSystemsInput" class="form-control border-start-0 bg-light" placeholder="Buscar por nombre, tecnología...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor de la cuadricula de tarjetas de sistemas -->
        <div class="row g-4" id="systemsGridContainer">
            <!-- Condicional cuando no se encuentran sistemas -->
            @if ($sistemas->isEmpty())
                <!-- Bloque cuando no hay resultados -->
                <div class="col-12 text-center py-5">
                    <!-- Icono grande de bandeja vacia -->
                    <div class="text-muted fs-1 mb-3"><i class="bi bi-inbox"></i></div>
                    <!-- Mensaje de no encontrado -->
                    <h5>No se encontraron sistemas en esta categoría</h5>
                    <!-- Boton para regresar a la lista completa -->
                    <a href="{{ route('home') }}#catalogo" class="btn btn-outline-primary btn-sm rounded-pill mt-2">Ver todos los sistemas</a>
                </div>
            <!-- Bloque cuando existen sistemas en la coleccion -->
            @else
                <!-- Itera sobre cada sistema web disponible -->
                @foreach ($sistemas as $sys)
                    <!-- Columna de la tarjeta con atributos data para filtrado interactivo -->
                    <div class="col-lg-4 col-md-6 system-card-item" 
                         data-title="{{ $sys->nombre }}" 
                         data-desc="{{ $sys->descripcion_corta }}" 
                         data-tech="{{ $sys->tecnologias }}">
                        
                        <!-- Tarjeta con sombra, bordes y altura completa -->
                        <div class="system-card h-100">
                            <!-- Cabecera de la tarjeta con imagen o gradiente -->
                            <div class="system-card-header">
                                <!-- Fila superior con categoria y precio comercial -->
                                <div class="d-flex justify-content-between align-items-start">
                                    <!-- Badge con el icono y nombre de la categoria -->
                                    <span class="badge bg-white/20 text-white backdrop-blur border border-white/30 rounded-pill px-2.5 py-1 fs-xs">
                                        <i class="bi {{ $sys->categoria->icono ?? 'bi-laptop' }} me-1"></i> {{ $sys->categoria->nombre ?? 'General' }}
                                    </span>
                                    <!-- Badge con el precio comercial del sistema -->
                                    <span class="price-tag-badge fs-6">
                                        S/. {{ number_format($sys->precio_base, 2) }}
                                    </span>
                                </div>
                                <!-- Informacion de calificacion y titulo -->
                                <div>
                                    <!-- Estrellas doradas y numero de implementaciones -->
                                    <div class="d-flex align-items-center gap-1 text-warning fs-xs mb-1">
                                        <!-- Bucle para imprimir las 5 estrellas -->
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        <!-- Calificacion numerica -->
                                        <span class="text-white ms-1 fw-bold">{{ $sys->calificacion }}</span>
                                        <!-- Contador de ventas -->
                                        <span class="text-white-50 ms-1">({{ $sys->ventas_count }} implementaciones)</span>
                                    </div>
                                    <!-- Titulo comercial del software -->
                                    <h4 class="text-white fw-bold fs-5 mb-0 text-truncate" title="{{ $sys->nombre }}">
                                        {{ $sys->nombre }}
                                    </h4>
                                </div>
                            </div>

                            <!-- Cuerpo de la tarjeta con detalles y botones -->
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <!-- Descripcion corta del sistema -->
                                <p class="text-slate-600 fs-sm mb-3">
                                    {{ $sys->descripcion_corta }}
                                </p>

                                <!-- Bloque de tecnologias empleadas -->
                                <div class="mb-3">
                                    <span class="d-block text-slate-400 fs-xs text-uppercase fw-semibold mb-1">Stack Tecnológico:</span>
                                    <div class="d-flex flex-wrap gap-1">
                                        <!-- Divide las tecnologias por coma y las muestra como badges -->
                                        @foreach (explode(',', $sys->tecnologias) as $t)
                                            <span class="badge bg-slate-100 text-slate-700 border rounded-pill fs-xs">
                                                {{ trim($t) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Lista con las 3 primeras caracteristicas del sistema -->
                                <ul class="list-unstyled text-slate-600 fs-xs mb-4 vstack gap-1 flex-grow-1">
                                    @php
                                        // Extrae caracteristicas separadas por salto de linea
                                        $feats = explode("\n", $sys->caracteristicas);
                                        // Toma solo las tres primeras
                                        $firstThree = array_slice($feats, 0, 3);
                                    @endphp
                                    <!-- Recorre las 3 caracteristicas -->
                                    @foreach ($firstThree as $f)
                                        @if (trim($f))
                                            <!-- Elemento de la lista con icono de check verde -->
                                            <li class="d-flex align-items-center gap-2">
                                                <i class="bi bi-check-circle-fill text-emerald"></i>
                                                <span>{{ trim($f) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                                <!-- Comparativa de precios de licencia vs codigo fuente -->
                                <div class="bg-slate-50 p-2.5 rounded-3 border mb-3 fs-xs">
                                    <!-- Precio de la licencia comercial -->
                                    <div class="d-flex justify-content-between text-slate-600 mb-1">
                                        <span>Licencia Comercial:</span>
                                        <strong class="text-slate-900">S/. {{ number_format($sys->precio_base, 2) }}</strong>
                                    </div>
                                    <!-- Precio del codigo fuente completo -->
                                    <div class="d-flex justify-content-between text-slate-600">
                                        <span>Código Fuente Completo:</span>
                                        <strong class="text-primary">S/. {{ number_format($sys->precio_codigo_fuente, 2) }}</strong>
                                    </div>
                                </div>

                                <!-- Botones de accion para ver detalles o cotizar -->
                                <div class="d-flex gap-2 pt-2 border-top">
                                    <!-- Boton para abrir el modal de detalles con peticion AJAX -->
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill w-50 fw-semibold" onclick="openSystemDetails({{ $sys->id }})">
                                        <i class="bi bi-info-circle me-1"></i> Detalles
                                    </button>
                                    <!-- Boton para abrir el modal de cotizacion directa -->
                                    <button type="button" class="btn btn-indigo-gradient btn-sm rounded-pill w-50 fw-semibold" onclick="openOrderModal({{ $sys->id }}, '{{ addslashes($sys->nombre) }}', {{ $sys->precio_base }})">
                                        <i class="bi bi-cart-plus-fill me-1"></i> Cotizar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
