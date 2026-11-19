<?php
// ====================================================================
// REDIRECCIÓN AUTOMÁTICA A LA CARPETA PÚBLICA DE LARAVEL 12
// Evita el listado de archivos en WampServer o accesos directos
// ====================================================================
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? ''
);

// Si se accede directamente a la raiz de /proyecto/, redirigir a /public/
header('Location: public/');
exit;
