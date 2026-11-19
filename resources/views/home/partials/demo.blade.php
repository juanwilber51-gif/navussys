<!-- ========================================================
     SECCION DEL SIMULADOR DE DEMO INTERACTIVA EN VIVO
     ======================================================== -->
<section id="demo-simulador" class="py-5 bg-dark-navy text-white">
    <!-- Contenedor centralizado -->
    <div class="container">
        <!-- Cabecera explicativa del simulador web -->
        <div class="text-center max-w-2xl mx-auto mb-4">
            <!-- Badge superior con color cian -->
            <span class="badge bg-cyan-subtle text-cyan px-3 py-1.5 rounded-pill fw-semibold text-uppercase tracking-wider fs-xs mb-2">
                Simulador Web Interactivo
            </span>
            <!-- Titulo de nivel 2 -->
            <h2 class="display-6 fw-bold text-white">Prueba los Sistemas Web Directamente en el Navegador</h2>
            <!-- Parrafo descriptivo -->
            <p class="text-slate-400">
                Interactúa con las funciones clave de nuestros sistemas en tiempo real antes de solicitarlos.
            </p>

            <!-- Botonera tipo tabs para alternar entre las diferentes demostraciones -->
            <div class="d-inline-flex p-1.5 rounded-pill bg-slate-900 border border-slate-800 gap-1">
                <!-- Boton para cambiar a la demo del Punto de Venta (POS) -->
                <button id="demo-btn-pos" class="btn btn-sm btn-primary rounded-pill px-3 py-1.5 fw-semibold demo-nav-btn active" onclick="switchDemoTab('pos')">
                    <i class="bi bi-cart4 me-1"></i> Demo POS & Caja
                </button>
                <!-- Boton para cambiar a la demo del Kardex de Almacen -->
                <button id="demo-btn-kardex" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1.5 fw-semibold demo-nav-btn" onclick="switchDemoTab('kardex')">
                    <i class="bi bi-boxes me-1"></i> Demo Kardex Almacén
                </button>
                <!-- Boton para cambiar a la demo de Facturacion Electronica SUNAT -->
                <button id="demo-btn-fact" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1.5 fw-semibold demo-nav-btn" onclick="switchDemoTab('fact')">
                    <i class="bi bi-receipt-cutoff me-1"></i> Demo Facturación SUNAT
                </button>
            </div>
        </div>

        <!-- Marco de ventana que simula un navegador web real -->
        <div class="demo-window-frame mx-auto" style="max-width: 980px;">
            <!-- Barra de titulo de la ventana simulada -->
            <div class="demo-titlebar">
                <!-- Circulos simulados de control de ventana de macOS/Linux -->
                <div class="d-flex gap-1.5">
                    <!-- Punto rojo para cerrar -->
                    <span class="demo-dot red"></span>
                    <!-- Punto amarillo para minimizar -->
                    <span class="demo-dot yellow"></span>
                    <!-- Punto verde para maximizar -->
                    <span class="demo-dot green"></span>
                </div>
                <!-- Barra de direccion URL simulada -->
                <div class="demo-url-bar" id="demoUrlBar">
                    https://demo.navussys.com/pos/caja-rapida
                </div>
                <!-- Badge de conexion segura SSL con Laravel 12 -->
                <span class="badge bg-emerald-500/20 text-emerald fs-xs">Laravel 12 SSL Verified</span>
            </div>

            <!-- Viewport interior donde se visualiza el contenido del sistema simulado -->
            <div class="demo-viewport text-dark">
                <!-- VISTA 1: DEMO POS (Punto de Venta con cobro interactivo) -->
                <div id="demo-view-pos" class="demo-tab-content">
                    <!-- Fila de division del POS: Catalogo a la izquierda, Ticket a la derecha -->
                    <div class="row g-3">
                        <!-- Columna izquierda: Catalogo rapido de productos disponibles -->
                        <div class="col-md-7">
                            <!-- Titulo del lector de productos -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0 text-slate-800"><i class="bi bi-upc-scan me-1 text-primary"></i> Lector / Catálogo Rápido</h6>
                                <span class="badge bg-primary-subtle text-primary">Haz clic para agregar</span>
                            </div>
                            <!-- Rejilla de productos interactivos -->
                            <div class="row g-2">
                                <!-- Producto 1: Teclado Mecanico -->
                                <div class="col-6">
                                    <div class="card p-2 text-center border h-100 hover-shadow cursor-pointer" onclick="demoAddPosItem('Teclado Mecánico RGB', 120.00)">
                                        <span class="fs-4">⌨️</span>
                                        <strong class="fs-xs text-truncate">Teclado Mecánico RGB</strong>
                                        <span class="text-primary fw-bold fs-sm">S/. 120.00</span>
                                    </div>
                                </div>
                                <!-- Producto 2: Mouse Inalambrico -->
                                <div class="col-6">
                                    <div class="card p-2 text-center border h-100 hover-shadow cursor-pointer" onclick="demoAddPosItem('Mouse Inalámbrico Pro', 65.50)">
                                        <span class="fs-4">🖱️</span>
                                        <strong class="fs-xs text-truncate">Mouse Inalámbrico</strong>
                                        <span class="text-primary fw-bold fs-sm">S/. 65.50</span>
                                    </div>
                                </div>
                                <!-- Producto 3: Cable HDMI -->
                                <div class="col-6">
                                    <div class="card p-2 text-center border h-100 hover-shadow cursor-pointer" onclick="demoAddPosItem('Cable HDMI 4K 2M', 25.00)">
                                        <span class="fs-4">🔌</span>
                                        <strong class="fs-xs text-truncate">Cable HDMI 4K</strong>
                                        <span class="text-primary fw-bold fs-sm">S/. 25.00</span>
                                    </div>
                                </div>
                                <!-- Producto 4: Memoria USB -->
                                <div class="col-6">
                                    <div class="card p-2 text-center border h-100 hover-shadow cursor-pointer" onclick="demoAddPosItem('Memoria USB 64GB 3.0', 35.00)">
                                        <span class="fs-4">💾</span>
                                        <strong class="fs-xs text-truncate">Memoria USB 64GB</strong>
                                        <span class="text-primary fw-bold fs-sm">S/. 35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Columna derecha: Ticket de venta en tiempo real -->
                        <div class="col-md-5">
                            <div class="card bg-white border p-3 shadow-sm h-100 d-flex flex-column">
                                <div class="border-bottom pb-2 mb-2 d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold mb-0 text-slate-900"><i class="bi bi-receipt me-1 text-success"></i> Ticket Actual</h6>
                                    <span class="badge bg-light text-dark border">Caja #01</span>
                                </div>
                                <!-- Tabla de items agregados al ticket -->
                                <div class="table-responsive flex-grow-1" style="max-height: 200px;">
                                    <table class="table table-sm fs-xs align-middle">
                                        <tbody id="demoPosTableBody">
                                            <tr>
                                                <td>1x</td>
                                                <td><strong>Mouse Inalámbrico Pro</strong></td>
                                                <td class="text-end">S/. 65.50</td>
                                                <td class="text-end"><button class="btn btn-sm btn-outline-danger py-0 px-1" onclick="this.closest('tr').remove();"><i class="bi bi-x"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Seccion de total y boton de cobro -->
                                <div class="border-top pt-2 mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="fw-bold fs-6">TOTAL A COBRAR:</span>
                                        <span class="fw-extrabold fs-4 text-emerald" id="demoPosTotal">S/. 65.50</span>
                                    </div>
                                    <button class="btn btn-emerald-gradient w-100 py-2 fw-bold shadow-emerald" onclick="demoCobrarTicket()">
                                        <i class="bi bi-cash-coin me-1"></i> Cobrar y Emitir Comprobante
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VISTA 2: DEMO KARDEX (Metodo PEPS de valuacion de inventario) -->
                <div id="demo-view-kardex" class="demo-tab-content d-none">
                    <div class="card border p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="fw-bold mb-0 text-slate-900"><i class="bi bi-boxes me-1 text-warning"></i> Kardex Físico y Valorizado (PEPS)</h6>
                                <span class="text-muted fs-xs">Almacén Central Cusco - Producto: Laptop Core i7</span>
                            </div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle">Stock Disponible: 24 Und.</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm fs-xs align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Operación</th>
                                        <th>Entrada</th>
                                        <th>Salida</th>
                                        <th>Saldo Stock</th>
                                        <th>Costo Unit.</th>
                                        <th>Valor Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10/11/2026</td>
                                        <td><span class="badge bg-primary">Compra Fact. 001-492</span></td>
                                        <td>+20</td>
                                        <td>-</td>
                                        <td><strong>20</strong></td>
                                        <td>S/. 2,800.00</td>
                                        <td>S/. 56,000.00</td>
                                    </tr>
                                    <tr>
                                        <td>11/11/2026</td>
                                        <td><span class="badge bg-primary">Compra Fact. 001-510</span></td>
                                        <td>+10</td>
                                        <td>-</td>
                                        <td><strong>30</strong></td>
                                        <td>S/. 2,850.00</td>
                                        <td>S/. 84,500.00</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>12/11/2026</td>
                                        <td><span class="badge bg-danger">Venta Boleta 002-140</span></td>
                                        <td>-</td>
                                        <td>-6</td>
                                        <td><strong>24</strong></td>
                                        <td>S/. 2,800.00</td>
                                        <td>S/. 67,700.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- VISTA 3: DEMO FACTURACION SUNAT (Emision electronica con firma digital XML) -->
                <div id="demo-view-fact" class="demo-tab-content d-none">
                    <div class="card border p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold mb-0 text-slate-900"><i class="bi bi-receipt-cutoff me-1 text-danger"></i> Emisión Electrónica Homologada SUNAT</h6>
                            <span class="badge bg-success"><i class="bi bi-shield-check"></i> Conexión OSE Activa</span>
                        </div>
                        <div class="p-3 bg-light rounded-3 border text-center">
                            <p class="fs-xs text-muted mb-2">Comprobante firmado digitalmente con certificado SHA-256 UBL 2.1 en Laravel 12</p>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-outline-danger" onclick="Swal.fire('PDF Generado', 'Representación impresa generada correctamente.', 'info')">
                                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> Ver PDF A4
                                </button>
                                <button class="btn btn-sm btn-outline-primary" onclick="Swal.fire('XML SUNAT', 'Archivo XML con firma digital validado exitosamente.', 'info')">
                                    <i class="bi bi-file-code-fill me-1"></i> Descargar XML
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="Swal.fire('Constancia CDR', 'CDR SUNAT: Comprobante F001-000129 ha sido ACEPTADO.', 'success')">
                                    <i class="bi bi-check2-all me-1"></i> Consultar CDR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
