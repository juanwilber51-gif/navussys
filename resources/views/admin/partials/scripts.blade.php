<!-- Importa el paquete JavaScript de Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Scripts personalizados de inicializacion de graficos y modales -->
<script>
    // Espera a que el DOM este completamente cargado
    document.addEventListener('DOMContentLoaded', () => {
        // Obtiene el contexto 2D del canvas de tendencias de ventas
        const ctxTrend = document.getElementById('salesTrendChart')?.getContext('2d');
        // Si el elemento canvas existe en el documento
        if (ctxTrend) {
            // Inicializa una nueva instancia de grafico de linea con Chart.js
            new Chart(ctxTrend, {
                // Define el tipo de grafico como linea
                type: 'line',
                // Configura los datos del grafico
                data: {
                    // Etiquetas de los ultimos meses
                    labels: ['Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre 2026'],
                    // Conjunto de datos a graficar
                    datasets: [{
                        // Leyenda de la serie
                        label: 'Cotizaciones y Ventas (S/.)',
                        // Valores simulados de crecimiento comercial
                        data: [4200, 5800, 7100, 8900, 11400, 14200, 18900],
                        // Color de la linea del grafico
                        borderColor: '#4f46e5',
                        // Color de fondo semitransparente debajo de la curva
                        backgroundColor: 'rgba(79, 70, 229, 0.12)',
                        // Grosor del trazo de linea
                        borderWidth: 3,
                        // Rellena el area bajo la curva
                        fill: true,
                        // Suavizado y curvatura de la linea
                        tension: 0.4
                    }]
                },
                // Opciones de configuracion visual
                options: {
                    // Hace el grafico responsive
                    responsive: true,
                    // Oculta la leyenda superior
                    plugins: { legend: { display: false } },
                    // Inicia el eje vertical desde cero
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        // Obtiene el contexto 2D del canvas de distribucion por categorias
        const ctxCat = document.getElementById('categoriesDoughnutChart')?.getContext('2d');
        // Si el elemento canvas existe
        if (ctxCat) {
            // Inicializa una nueva instancia de grafico tipo dona
            new Chart(ctxCat, {
                // Define el tipo de grafico como dona
                type: 'doughnut',
                // Configura los datos de categorias
                data: {
                    // Nombres de las principales categorias
                    labels: ['POS Ventas', 'Kardex Almacen', 'Facturacion SUNAT', 'ERP Gestion', 'Restaurantes', 'Clinicas'],
                    // Serie de porcentajes de participacion
                    datasets: [{
                        // Valores porcentuales por rubro
                        data: [35, 25, 20, 10, 5, 5],
                        // Paleta de colores atractiva para cada porcion
                        backgroundColor: ['#4f46e5', '#10b981', '#f59e0b', '#06b6d4', '#ec4899', '#8b5cf6']
                    }]
                },
                // Opciones del grafico de dona
                options: {
                    // Ajusta automaticamente al contenedor
                    responsive: true,
                    // Coloca la leyenda en la parte inferior
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        }
    });

    // Funcion global para rellenar y abrir el modal de modificacion de sistemas
    function editSistemaModal(sys) {
        // Carga el ID del sistema en el campo oculto
        document.getElementById('editSysId').value = sys.id;
        // Asigna el nombre comercial al input
        document.getElementById('editSysNombre').value = sys.nombre;
        // Asigna la categoria seleccionada
        document.getElementById('editSysCategoria').value = sys.categoria_id;
        // Asigna la descripcion corta
        document.getElementById('editSysDescCorta').value = sys.descripcion_corta;
        // Asigna la descripcion larga
        document.getElementById('editSysDescLarga').value = sys.descripcion_larga;
        // Asigna el precio comercial
        document.getElementById('editSysPrecioBase').value = sys.precio_base;
        // Asigna el precio de codigo fuente
        document.getElementById('editSysPrecioFuente').value = sys.precio_codigo_fuente;
        // Asigna las tecnologias utilizadas
        document.getElementById('editSysTech').value = sys.tecnologias;
        // Asigna el estado activo o inactivo
        document.getElementById('editSysEstado').value = sys.estado ? 1 : 0;
        // Asigna las caracteristicas del sistema
        document.getElementById('editSysCaracteristicas').value = sys.caracteristicas;
        // Muestra el modal de Bootstrap en pantalla
        new bootstrap.Modal(document.getElementById('modalEditSistema')).show();
    }
</script>
