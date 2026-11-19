<?php
// Rutas web de NAVUSSYS para Laravel 12
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;

// ----------------------------------------------------
// RUTAS PUBLICAS (TIENDA Y CATALOGO INTERACTIVO)
// ----------------------------------------------------

// Ruta principal: Catalogo interactivo y vitrina comercial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para recibir solicitudes de pedidos y cotizaciones
Route::post('/order/submit', [HomeController::class, 'submitOrder'])->name('order.submit');

// Ruta para recibir mensajes del formulario de contacto
Route::post('/contact/submit', [HomeController::class, 'submitContact'])->name('contact.submit');

// Ruta AJAX para obtener informacion detallada de un sistema
Route::get('/sistema/json', [HomeController::class, 'getSistemaJson'])->name('sistema.json');

// Descarga directa del informe academico en formato Word APA 7ma Edicion
Route::get('/docs/download', [AdminDashboardController::class, 'downloadDoc'])->name('docs.download');

// ----------------------------------------------------
// RUTAS DE AUTENTICACION DEL ADMINISTRADOR (ACCESO OCULTO)
// Nota: No se muestra enlace visible en la navegacion publica
// ----------------------------------------------------

// Muestra el formulario de inicio de sesion discreto
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
// Alias para compatibilidad nativa del middleware auth y helpers de Laravel
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');

// Procesa las credenciales de seguridad con bcrypt
Route::post('/admin/authenticate', [AdminAuthController::class, 'login'])->name('admin.authenticate');

// Cierre de sesion seguro del administrador
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ----------------------------------------------------
// RUTAS PROTEGIDAS DEL PANEL DE CONTROL ADMINISTRATIVO
// ----------------------------------------------------
Route::middleware(['auth'])->group(function () {
    // Panel de control y metricas analiticas
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Mantenimiento CRUD de sistemas web en venta
    Route::post('/admin/sistema/store', [AdminDashboardController::class, 'storeSistema'])->name('admin.sistema.store');
    Route::post('/admin/sistema/update', [AdminDashboardController::class, 'updateSistema'])->name('admin.sistema.update');
    Route::delete('/admin/sistema/delete/{id}', [AdminDashboardController::class, 'deleteSistema'])->name('admin.sistema.delete');

    // Actualizacion de estados de pedidos de clientes
    Route::post('/admin/pedido/status', [AdminDashboardController::class, 'updatePedidoEstado'])->name('admin.pedido.status');
});
