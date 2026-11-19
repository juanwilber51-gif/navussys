// ========================================================
// JAVASCRIPT PRINCIPAL DE LA PLATAFORMA NAVUSSYS (LARAVEL 12)
// Desarrollador: Ing. Juan Wilber Supa Ttito
// Contacto: +51 935114374 | juanwilber@gmail.com
// ========================================================

// Espera a que el DOM este completamente cargado
document.addEventListener('DOMContentLoaded', () => {

    // ----------------------------------------------------
    // 1. ATAJO DE TECLADO SECRETO PARA EL ADMINISTRADOR
    // Permite acceder al login privado con Ctrl + Shift + A
    // ----------------------------------------------------
    document.addEventListener('keydown', (e) => {
        // Verifica si la combinacion presionada es Ctrl + Shift + A
        if (e.ctrlKey && e.shiftKey && (e.key === 'A' || e.key === 'a')) {
            // Previene la accion predeterminada
            e.preventDefault();
            // Notifica con un alert discreto y redirige al login administrativo
            Swal.fire({
                title: 'Acceso Privado NAVUSSYS',
                text: 'Redirigiendo al panel de control de administración...',
                icon: 'info',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                // Redirige a la ruta secreta
                window.location.href = '/admin/login';
            });
        }
    });

    // ----------------------------------------------------
    // 2. BUSQUEDA EN TIEMPO REAL Y FILTRADO DEL CATALOGO
    // ----------------------------------------------------
    const searchInput = document.getElementById('searchSystemsInput');
    const systemCards = document.querySelectorAll('.system-card-item');

    if (searchInput) {
        // Escucha cada pulsacion de tecla en el campo de busqueda
        searchInput.addEventListener('input', (e) => {
            // Convierte el termino ingresado a minusculas y sin espacios
            const query = e.target.value.toLowerCase().trim();
            // Itera sobre cada tarjeta de sistema
            systemCards.forEach((card) => {
                // Obtiene el texto del titulo, descripcion y tecnologias
                const title = card.getAttribute('data-title')?.toLowerCase() || '';
                const desc = card.getAttribute('data-desc')?.toLowerCase() || '';
                const tech = card.getAttribute('data-tech')?.toLowerCase() || '';
                // Comprueba si coincide con el termino buscado
                if (title.includes(query) || desc.includes(query) || tech.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // ----------------------------------------------------
    // 3. CALCULADORA INTERACTIVA DE PRECIOS Y COTIZADOR
    // ----------------------------------------------------
    const calcSelectSistema = document.getElementById('calcSistema');
    const calcRadioLicencia = document.querySelectorAll('input[name="calc_tipo_licencia"]');
    const calcAddons = document.querySelectorAll('.calc-addon-check');
    const calcTotalPriceDisplay = document.getElementById('calcTotalPrice');
    const calcBtnWhatsApp = document.getElementById('calcBtnWhatsApp');

    // Funcion para recalcular el precio total
    function recalcularPresupuesto() {
        if (!calcSelectSistema) return;
        // Obtiene la opcion seleccionada del selector de sistemas
        const selectedOption = calcSelectSistema.options[calcSelectSistema.selectedIndex];
        // Precio base comercial
        const precioComercial = parseFloat(selectedOption?.getAttribute('data-comercial') || 0);
        // Precio con codigo fuente
        const precioFuente = parseFloat(selectedOption?.getAttribute('data-fuente') || 0);

        // Identifica el tipo de licencia elegida
        let tipoElegido = 'comercial';
        calcRadioLicencia.forEach((r) => {
            if (r.checked) tipoElegido = r.value;
        });

        // Asigna el precio inicial segun la licencia
        let total = (tipoElegido === 'fuente') ? precioFuente : precioComercial;

        // Suma el valor de los complementos seleccionados
        let addonsSeleccionados = [];
        calcAddons.forEach((chk) => {
            if (chk.checked) {
                total += parseFloat(chk.getAttribute('data-price') || 0);
                addonsSeleccionados.push(chk.getAttribute('data-name'));
            }
        });

        // Actualiza el indicador visual de total en pantalla
        if (calcTotalPriceDisplay) {
            calcTotalPriceDisplay.textContent = 'S/. ' + total.toFixed(2);
        }

        // Construye el mensaje interactivo para WhatsApp
        const nombreSistema = selectedOption?.text || 'Sistema Web';
        const tipoLicenciaTexto = (tipoElegido === 'fuente') ? 'Código Fuente Completo + BD' : 'Licencia Comercial Instalada';
        const addonsTexto = addonsSeleccionados.length > 0 ? addonsSeleccionados.join(', ') : 'Ninguno';

        const mensajeWhatsApp = `Hola Ing. Juan Wilber Supa Ttito (*NAVUSSYS*),\n` +
            `Deseo cotizar el siguiente sistema:\n\n` +
            `💻 *Sistema:* ${nombreSistema}\n` +
            `📦 *Licencia:* ${tipoLicenciaTexto}\n` +
            `⚙️ *Adicionales:* ${addonsTexto}\n` +
            `💰 *Presupuesto Estimado:* S/. ${total.toFixed(2)}\n\n` +
            `¿Podemos agendar una reunión o demo virtual?`;

        // Actualiza el enlace de WhatsApp del boton
        if (calcBtnWhatsApp) {
            calcBtnWhatsApp.href = `https://wa.me/51935114374?text=${encodeURIComponent(mensajeWhatsApp)}`;
        }
    }

    // Agrega escuchadores a los controles de la calculadora
    if (calcSelectSistema) {
        calcSelectSistema.addEventListener('change', recalcularPresupuesto);
        calcRadioLicencia.forEach((r) => r.addEventListener('change', recalcularPresupuesto));
        calcAddons.forEach((chk) => chk.addEventListener('change', recalcularPresupuesto));
        // Ejecuta el calculo inicial
        recalcularPresupuesto();
    }

    // ----------------------------------------------------
    // 4. SIMULADOR DE DEMO INTERACTIVA EN VIVO
    // ----------------------------------------------------
    window.switchDemoTab = function(type) {
        document.querySelectorAll('.demo-tab-content').forEach(el => el.classList.add('d-none'));
        document.querySelectorAll('.demo-nav-btn').forEach(btn => btn.classList.remove('active', 'btn-primary'));
        document.querySelectorAll('.demo-nav-btn').forEach(btn => btn.classList.add('btn-outline-light'));

        const targetView = document.getElementById('demo-view-' + type);
        if (targetView) targetView.classList.remove('d-none');

        const activeBtn = document.getElementById('demo-btn-' + type);
        if (activeBtn) {
            activeBtn.classList.add('active', 'btn-primary');
            activeBtn.classList.remove('btn-outline-light');
        }

        const urlBar = document.getElementById('demoUrlBar');
        if (urlBar) {
            if (type === 'pos') urlBar.textContent = 'https://demo.navussys.com/pos/caja-rapida';
            if (type === 'kardex') urlBar.textContent = 'https://demo.navussys.com/kardex/almacen-central';
            if (type === 'fact') urlBar.textContent = 'https://demo.navussys.com/facturacion/sunat-online';
        }
    };

    // Simulador: Vender producto en la demo POS
    let posTotal = 65.50;
    window.demoAddPosItem = function(nombre, precio) {
        const tbody = document.getElementById('demoPosTableBody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>1x</td>
            <td><strong>${nombre}</strong></td>
            <td class="text-end">S/. ${precio.toFixed(2)}</td>
            <td class="text-end"><button class="btn btn-sm btn-outline-danger py-0 px-1" onclick="this.closest('tr').remove();"><i class="bi bi-x"></i></button></td>
        `;
        tbody.appendChild(tr);
        posTotal += precio;
        document.getElementById('demoPosTotal').textContent = 'S/. ' + posTotal.toFixed(2);
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: `+ ${nombre} agregado al ticket`,
            showConfirmButton: false,
            timer: 1200
        });
    };

    // Simulador: Cobrar ticket
    window.demoCobrarTicket = function() {
        Swal.fire({
            title: '¡Venta Registrada con Éxito!',
            html: `
                <div class="text-start p-3 bg-light rounded border">
                    <p class="mb-1"><strong>Ticket #:</strong> B001-000482</p>
                    <p class="mb-1"><strong>Total Cobrado:</strong> S/. ${posTotal.toFixed(2)}</p>
                    <p class="mb-1"><strong>Medio de Pago:</strong> Efectivo / Yape</p>
                    <p class="mb-0 text-success"><i class="bi bi-check-circle-fill"></i> Caja actualizada e inventario descontado.</p>
                </div>
            `,
            icon: 'success',
            confirmButtonText: 'Imprimir Ticket Térmico',
            confirmButtonColor: '#4f46e5'
        }).then(() => {
            const tbody = document.getElementById('demoPosTableBody');
            if (tbody) tbody.innerHTML = '';
            posTotal = 0;
            document.getElementById('demoPosTotal').textContent = 'S/. 0.00';
        });
    };

    // ----------------------------------------------------
    // 5. ENVIO DEL FORMULARIO DE PEDIDO / COTIZACION
    // ----------------------------------------------------
    const orderForm = document.getElementById('orderFormModal');
    if (orderForm) {
        orderForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = orderForm.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Procesando...';

            const formData = new FormData(orderForm);
            // Token CSRF de Laravel
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            try {
                const response = await fetch('/order/submit', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const res = await response.json();

                if (res.success) {
                    Swal.fire({
                        title: '¡Cotización Registrada!',
                        text: res.message,
                        icon: 'success',
                        confirmButtonText: 'Abrir WhatsApp Ahora',
                        confirmButtonColor: '#10b981',
                        showCancelButton: true,
                        cancelButtonText: 'Cerrar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.open(res.whatsapp_url, '_blank');
                        }
                        const modalEl = document.getElementById('orderModal');
                        if (modalEl) {
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            if (modal) modal.hide();
                        }
                        orderForm.reset();
                    });
                } else {
                    Swal.fire('Error', res.message || 'Error al procesar solicitud', 'error');
                }
            } catch (err) {
                Swal.fire('Error de Conexión', 'No se pudo conectar con el servidor', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-send-check-fill me-1"></i> Confirmar y Enviar Cotización';
            }
        });
    }

    // ----------------------------------------------------
    // 6. ENVIO DEL FORMULARIO DE CONTACTO GENERAL
    // ----------------------------------------------------
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Enviando...';

            const formData = new FormData(contactForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            try {
                const response = await fetch('/contact/submit', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const res = await response.json();

                if (res.success) {
                    Swal.fire({
                        title: '¡Mensaje Enviado!',
                        text: res.message,
                        icon: 'success',
                        confirmButtonColor: '#4f46e5'
                    });
                    contactForm.reset();
                } else {
                    Swal.fire('Error', res.message || 'Verifique los campos', 'error');
                }
            } catch (err) {
                Swal.fire('Error', 'No se pudo enviar el mensaje', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-envelope-paper-fill me-1"></i> Enviar Mensaje a Ing. Juan Wilber';
            }
        });
    }

    // ----------------------------------------------------
    // 7. ABRIR MODAL DE DETALLES DEL SISTEMA DINAMICO
    // ----------------------------------------------------
    window.openSystemDetails = async function(id) {
        try {
            const resp = await fetch(`/sistema/json?id=${id}`);
            const data = await resp.json();
            if (data.success && data.sistema) {
                const s = data.sistema;
                document.getElementById('modalSysTitle').textContent = s.nombre;
                document.getElementById('modalSysCategory').textContent = s.categoria_nombre;
                document.getElementById('modalSysShortDesc').textContent = s.descripcion_corta;
                document.getElementById('modalSysLongDesc').textContent = s.descripcion_larga;
                document.getElementById('modalSysTech').textContent = s.tecnologias;
                document.getElementById('modalSysPriceComercial').textContent = 'S/. ' + parseFloat(s.precio_base).toFixed(2);
                document.getElementById('modalSysPriceFuente').textContent = 'S/. ' + parseFloat(s.precio_codigo_fuente).toFixed(2);

                const featContainer = document.getElementById('modalSysFeatures');
                featContainer.innerHTML = '';
                const lines = s.caracteristicas.split('\n');
                lines.forEach(line => {
                    if (line.trim()) {
                        const li = document.createElement('li');
                        li.className = 'd-flex align-items-center gap-2 mb-1';
                        li.innerHTML = `<i class="bi bi-check2-circle text-success fs-5"></i> <span>${line.trim()}</span>`;
                        featContainer.appendChild(li);
                    }
                });

                const orderBtn = document.getElementById('modalSysOrderBtn');
                orderBtn.onclick = () => {
                    bootstrap.Modal.getInstance(document.getElementById('systemDetailsModal')).hide();
                    openOrderModal(s.id, s.nombre, s.precio_base);
                };

                const modal = new bootstrap.Modal(document.getElementById('systemDetailsModal'));
                modal.show();
            }
        } catch (e) {
            console.error(e);
        }
    };

    // Abrir modal de cotizacion para un sistema especifico
    window.openOrderModal = function(id, nombre, precioBase) {
        const orderModalEl = document.getElementById('orderModal');
        if (!orderModalEl) return;
        document.getElementById('orderSysId').value = id;
        document.getElementById('orderSysNameDisplay').textContent = nombre;
        document.getElementById('orderPriceDisplay').value = precioBase;
        document.getElementById('orderPriceText').textContent = 'S/. ' + parseFloat(precioBase).toFixed(2);
        const modal = new bootstrap.Modal(orderModalEl);
        modal.show();
    };
});
