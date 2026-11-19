<?php
// ========================================================
// GENERADOR DE DIAGRAMAS RATIONAL ROSE PARA NAVUSSYS
// Proyecto: NAVUSSYS - Ing. Juan Wilber Supa Ttito
// Formato: PNG Alta Resolución con Estética Clásica Rational Rose
// Paleta: Fondo Blanco, Cajas Amarillo Pergamino (#FFFFCC),
//         Bordes Negros Nítidos (#000000), Texto Arial / Tahoma
// ========================================================

$font = 'C:/Windows/Fonts/arial.ttf';
$fontBold = 'C:/Windows/Fonts/arialbd.ttf';
$outputDir = __DIR__ . '/docs/diagrams';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

// ----------------------------------------------------
// FUNCIONES AUXILIARES DE DIBUJO ESTILO RATIONAL ROSE
// ----------------------------------------------------

function createRoseCanvas($w, $h) {
    $im = imagecreatetruecolor($w, $h);
    imageantialias($im, true);
    $white = imagecolorallocate($im, 255, 255, 255);
    imagefill($im, 0, 0, $white);
    return $im;
}

function getColors($im) {
    return [
        'white'      => imagecolorallocate($im, 255, 255, 255),
        'black'      => imagecolorallocate($im, 0, 0, 0),
        'charcoal'   => imagecolorallocate($im, 40, 40, 40),
        'yellow'     => imagecolorallocate($im, 255, 255, 204), // #FFFFCC Rational Rose
        'yellowDark' => imagecolorallocate($im, 245, 245, 175),
        'blueLight'  => imagecolorallocate($im, 230, 240, 255),
        'grayLight'  => imagecolorallocate($im, 240, 240, 240),
        'grayDark'   => imagecolorallocate($im, 180, 180, 180),
        'lineGray'   => imagecolorallocate($im, 100, 100, 100),
        'red'        => imagecolorallocate($im, 180, 20, 20),
        'green'      => imagecolorallocate($im, 20, 130, 40),
        'blue'       => imagecolorallocate($im, 20, 50, 160),
    ];
}

function drawTitleBox($im, $c, $title, $code, $w, $h, $font, $fontBold) {
    // Marco exterior general
    imagerectangle($im, 10, 10, $w - 11, $h - 11, $c['black']);
    imagerectangle($im, 12, 12, $w - 13, $h - 13, $c['grayDark']);
    // Franja de titulo
    imagefilledrectangle($im, 14, 14, $w - 14, 52, $c['grayLight']);
    imageline($im, 14, 52, $w - 14, 52, $c['black']);
    imagettftext($im, 13, 0, 25, 38, $c['black'], $fontBold, $code . " · " . $title);
    imagettftext($im, 9, 0, $w - 240, 36, $c['lineGray'], $font, "Rational Rose 2000 Modeler | NAVUSSYS");
}

function drawRoseBox($im, $c, $x, $y, $w, $h, $title, $lines = [], $font = '', $fontBold = '', $isStereotype = '') {
    // Sombra suave sutil estilo Rational Rose
    imagefilledrectangle($im, $x + 3, $y + 3, $x + $w + 3, $y + $h + 3, $c['grayDark']);
    // Relleno amarillo parchment
    imagefilledrectangle($im, $x, $y, $x + $w, $y + $h, $c['yellow']);
    // Borde negro nítido
    imagerectangle($im, $x, $y, $x + $w, $y + $h, $c['black']);

    $currY = $y + 18;
    if ($isStereotype) {
        $box = imagettfbbox(8, 0, $font, "<<" . $isStereotype . ">>");
        $tw = $box[2] - $box[0];
        imagettftext($im, 8, 0, $x + ($w - $tw) / 2, $currY, $c['charcoal'], $font, "<<" . $isStereotype . ">>");
        $currY += 14;
    }

    // Titulo de la clase / caja centrado
    $bbox = imagettfbbox(10, 0, $fontBold, $title);
    $tw = $bbox[2] - $bbox[0];
    imagettftext($im, 10, 0, $x + ($w - $tw) / 2, $currY, $c['black'], $fontBold, $title);
    $currY += 8;

    // Linea divisoria si hay atributos
    if (!empty($lines)) {
        imageline($im, $x, $currY, $x + $w, $currY, $c['black']);
        $currY += 15;
        foreach ($lines as $line) {
            if ($line === '---') {
                imageline($im, $x, $currY - 5, $x + $w, $currY - 5, $c['black']);
                $currY += 10;
            } else {
                imagettftext($im, 8.5, 0, $x + 8, $currY, $c['charcoal'], $font, $line);
                $currY += 14;
            }
        }
    }
}

function drawRoseActor($im, $c, $x, $y, $name, $font, $fontBold) {
    // Cabeza
    imageellipse($im, $x, $y, 22, 22, $c['black']);
    imagefilledellipse($im, $x, $y, 20, 20, $c['yellow']);
    // Tronco
    imageline($im, $x, $y + 11, $x, $y + 40, $c['black']);
    // Brazos
    imageline($im, $x - 16, $y + 22, $x + 16, $y + 22, $c['black']);
    // Pierna izquierda
    imageline($im, $x, $y + 40, $x - 14, $y + 62, $c['black']);
    // Pierna derecha
    imageline($im, $x, $y + 40, $x + 14, $y + 62, $c['black']);
    // Nombre
    $bbox = imagettfbbox(9, 0, $fontBold, $name);
    $tw = $bbox[2] - $bbox[0];
    imagettftext($im, 9, 0, $x - ($tw / 2), $y + 78, $c['black'], $fontBold, $name);
}

function drawRoseUseCase($im, $c, $cx, $cy, $w, $h, $name, $font, $fontBold) {
    // Sombra
    imagefilledellipse($im, $cx + 2, $cy + 2, $w, $h, $c['grayDark']);
    // Relleno ovalado amarillo Rational Rose
    imagefilledellipse($im, $cx, $cy, $w, $h, $c['yellow']);
    imageellipse($im, $cx, $cy, $w, $h, $c['black']);
    // Texto
    $lines = explode("\n", $name);
    $totalH = count($lines) * 13;
    $startY = $cy - ($totalH / 2) + 9;
    foreach ($lines as $i => $l) {
        $bbox = imagettfbbox(8.5, 0, $font, $l);
        $tw = $bbox[2] - $bbox[0];
        imagettftext($im, 8.5, 0, $cx - ($tw / 2), $startY + ($i * 13), $c['black'], $font, $l);
    }
}

function drawRoseComponent($im, $c, $x, $y, $w, $h, $name, $font, $fontBold) {
    // Sombra
    imagefilledrectangle($im, $x + 3, $y + 3, $x + $w + 3, $y + $h + 3, $c['grayDark']);
    // Cuerpo
    imagefilledrectangle($im, $x, $y, $x + $w, $y + $h, $c['yellow']);
    imagerectangle($im, $x, $y, $x + $w, $y + $h, $c['black']);
    // Lenguetas distintivas de componente Rational Rose
    imagefilledrectangle($im, $x - 8, $y + 12, $x + 8, $y + 24, $c['yellow']);
    imagerectangle($im, $x - 8, $y + 12, $x + 8, $y + 24, $c['black']);
    imagefilledrectangle($im, $x - 8, $y + 32, $x + 8, $y + 44, $c['yellow']);
    imagerectangle($im, $x - 8, $y + 32, $x + 8, $y + 44, $c['black']);
    // Estereotipo y nombre
    imagettftext($im, 7.5, 0, $x + 16, $y + 18, $c['charcoal'], $font, "<<component>>");
    imagettftext($im, 9.5, 0, $x + 16, $y + 34, $c['black'], $fontBold, $name);
}

function drawRoseNode($im, $c, $x, $y, $w, $h, $d, $name, $items = [], $font = '', $fontBold = '') {
    // Cubo 3D de nodo de despliegue
    // Cara superior
    $ptsTop = [$x, $y, $x + $d, $y - $d, $x + $w + $d, $y - $d, $x + $w, $y];
    imagefilledpolygon($im, $ptsTop, $c['yellowDark']);
    imagepolygon($im, $ptsTop, $c['black']);
    // Cara lateral derecha
    $ptsSide = [$x + $w, $y, $x + $w + $d, $y - $d, $x + $w + $d, $y + $h - $d, $x + $w, $y + $h];
    imagefilledpolygon($im, $ptsSide, $c['grayLight']);
    imagepolygon($im, $ptsSide, $c['black']);
    // Cara frontal
    imagefilledrectangle($im, $x, $y, $x + $w, $y + $h, $c['yellow']);
    imagerectangle($im, $x, $y, $x + $w, $y + $h, $c['black']);

    imagettftext($im, 7.5, 0, $x + 10, $y + 16, $c['charcoal'], $font, "<<device / executionEnvironment>>");
    imagettftext($im, 10, 0, $x + 10, $y + 34, $c['black'], $fontBold, $name);
    imageline($im, $x, $y + 42, $x + $w, $y + 42, $c['black']);

    $currY = $y + 58;
    foreach ($items as $item) {
        imagettftext($im, 8.5, 0, $x + 12, $currY, $c['charcoal'], $font, "• " . $item);
        $currY += 15;
    }
}

function drawArrow($im, $c, $x1, $y1, $x2, $y2, $dashed = false, $label = '', $font = '') {
    if ($dashed) {
        imagedashedline($im, $x1, $y1, $x2, $y2, $c['black']);
    } else {
        imageline($im, $x1, $y1, $x2, $y2, $c['black']);
    }

    // Punta de flecha abierta clasica
    $angle = atan2($y2 - $y1, $x2 - $x1);
    $len = 10;
    $x3 = $x2 - $len * cos($angle - M_PI / 6);
    $y3 = $y2 - $len * sin($angle - M_PI / 6);
    $x4 = $x2 - $len * cos($angle + M_PI / 6);
    $y4 = $y2 - $len * sin($angle + M_PI / 6);
    imageline($im, $x2, $y2, (int)$x3, (int)$y3, $c['black']);
    imageline($im, $x2, $y2, (int)$x4, (int)$y4, $c['black']);

    if ($label && $font) {
        $midX = ($x1 + $x2) / 2;
        $midY = ($y1 + $y2) / 2 - 4;
        imagettftext($im, 7.5, 0, (int)$midX, (int)$midY, $c['blue'], $font, $label);
    }
}

// ========================================================
// 1. DG-01: DIAGRAMA DE CONTEXTO DEL SISTEMA
// ========================================================
echo "Generando DG-01: Contexto del Sistema...\n";
$im = createRoseCanvas(900, 520);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Contexto del Sistema (Límite y Actores Externos)", "DG-01", 900, 520, $font, $fontBold);

// Caja central: Sistema NAVUSSYS
drawRoseBox($im, $c, 310, 160, 280, 180, "SISTEMA NAVUSSYS", [
    "<<System Boundary>>",
    "Plataforma Web de Venta de Sistemas",
    "---------------------------------",
    "+ Catálogo Interactivo de Software",
    "+ Cotizador Dinámico de Licencias",
    "+ Simulador de Demos en Vivo",
    "+ Módulo Oculto de Autenticación",
    "+ Gestión de Pedidos y Cotizaciones",
    "+ Reportes y Estadísticas de Ventas"
], $font, $fontBold, "Sistema Informático");

// Actor 1: Cliente Comprador / Visitante
drawRoseActor($im, $c, 110, 200, "Cliente Comprador", $font, $fontBold);
drawArrow($im, $c, 140, 220, 310, 220, false, "1: Consulta catálogo y prueba demo", $font);
drawArrow($im, $c, 310, 250, 140, 250, true, "2: Retorna presupuestos y cotización", $font);

// Actor 2: Administrador (Ing. Juan Wilber Supa Ttito)
drawRoseActor($im, $c, 780, 200, "Administrador (Juan Wilber)", $font, $fontBold);
drawArrow($im, $c, 750, 220, 590, 220, false, "3: Login privado (Ctrl+Shift+A)", $font);
drawArrow($im, $c, 750, 260, 590, 260, false, "4: CRUD sistemas y estados de pedido", $font);

// Sistema Externo 1: Pasarela WhatsApp Web API
drawRoseBox($im, $c, 160, 390, 240, 90, "API WhatsApp (+51 935114374)", [
    "<<External Communication API>>",
    "Recepción de solicitudes de compra",
    "Atención directa al cliente por chat"
], $font, $fontBold, "external");
drawArrow($im, $c, 370, 340, 310, 390, false, "Envío de pedido estructurado", $font);

// Sistema Externo 2: Servicio de Correo SMTP / DNS
drawRoseBox($im, $c, 520, 390, 250, 90, "Servidor Correo (juanwilber@gmail.com)", [
    "<<External Mail Service>>",
    "Notificaciones de formulario de contacto",
    "Confirmación de pedidos registrados"
], $font, $fontBold, "external");
drawArrow($im, $c, 530, 340, 590, 390, false, "Registro de leads y mensajes", $font);

imagepng($im, $outputDir . '/DG-01_Contexto_Sistema.png');
imagedestroy($im);

// ========================================================
// 2. DG-02: PROCESO ACTUAL (BPMN / ACTIVIDADES AS-IS)
// ========================================================
echo "Generando DG-02: Proceso Actual AS-IS...\n";
$im = createRoseCanvas(940, 540);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Proceso Actual (Flujo AS-IS - Dificultades Detectadas)", "DG-02", 940, 540, $font, $fontBold);

// Carril 1: Cliente
imagerectangle($im, 30, 70, 910, 230, $c['black']);
imagefilledrectangle($im, 31, 71, 140, 229, $c['grayLight']);
imagettftext($im, 10, 90, 75, 180, $c['black'], $fontBold, "CLIENTE COMPRADOR");

// Carril 2: Vendedor (Vía Informal)
imagerectangle($im, 30, 230, 910, 490, $c['black']);
imagefilledrectangle($im, 31, 231, 140, 489, $c['grayLight']);
imagettftext($im, 10, 90, 75, 410, $c['black'], $fontBold, "VENDEDOR MANUAL");

// Inicio
imagefilledellipse($im, 170, 150, 24, 24, $c['green']);
imageellipse($im, 170, 150, 24, 24, $c['black']);
drawArrow($im, $c, 182, 150, 220, 150);

// Tarea 1: Preguntar por WhatsApp o redes
drawRoseBox($im, $c, 220, 120, 140, 60, "Solicitar catálogo\npor WhatsApp", [], $font, $fontBold);
drawArrow($im, $c, 290, 180, 290, 270, false, "Mensaje informal");

// Tarea 2: Vendedor busca capturas manuales
drawRoseBox($im, $c, 220, 270, 150, 70, "Buscar capturas en\nGoogle Drive / PC", [
    "! Dificultad: Desorden",
    "! Demora en responder"
], $font, $fontBold);
drawArrow($im, $c, 370, 305, 430, 305);

// Tarea 3: Cotizar manualmente en Excel
drawRoseBox($im, $c, 430, 270, 150, 70, "Calcular costo en\nhoja de cálculo", [
    "! Precios dispares",
    "! Error en aditamentos"
], $font, $fontBold);
drawArrow($im, $c, 505, 270, 505, 180, false, "Envío de PDF o texto");

// Tarea 4: Cliente evalúa desconfiado sin ver demo
drawRoseBox($im, $c, 440, 120, 150, 60, "Evaluar propuesta\nsin demo en vivo", [
    "! Desconfianza del cliente",
    "! No sabe si sirve"
], $font, $fontBold);
drawArrow($im, $c, 590, 150, 650, 150);

// Decision: ¿Cliente acepta cotización?
$ptsRomb = [680, 120, 715, 150, 680, 180, 645, 150];
imagefilledpolygon($im, $ptsRomb, $c['yellowDark']);
imagepolygon($im, $ptsRomb, $c['black']);
imagettftext($im, 7.5, 0, 660, 153, $c['black'], $fontBold, "¿Acepta?");

// Ruta NO: Abandono de compra
drawArrow($im, $c, 680, 120, 680, 95, false, "NO");
drawRoseBox($im, $c, 740, 75, 140, 45, "Pérdida de venta\ny desinterés", [], $font, $fontBold);
drawArrow($im, $c, 680, 95, 740, 95);

// Ruta SI: Coordinar pago manual
drawArrow($im, $c, 715, 150, 760, 150, false, "SÍ");
drawRoseBox($im, $c, 760, 130, 140, 55, "Coordinar pago\npor transferencia", [], $font, $fontBold);
drawArrow($im, $c, 830, 185, 830, 340);

// Tarea 5: Instalación manual sin registro central
drawRoseBox($im, $c, 750, 340, 150, 75, "Enviar ZIP manual\nsin trazabilidad", [
    "! Sin control de licencias",
    "! Sin panel administrativo"
], $font, $fontBold);
drawArrow($im, $c, 825, 415, 825, 450);

// Fin
imagefilledellipse($im, 825, 460, 24, 24, $c['red']);
imageellipse($im, 825, 460, 24, 24, $c['black']);
imageellipse($im, 825, 460, 18, 18, $c['black']);

imagepng($im, $outputDir . '/DG-02_Proceso_Actual_AS-IS.png');
imagedestroy($im);

// ========================================================
// 3. DG-03: CASOS DE USO UML (ESTÉTICA RATIONAL ROSE)
// ========================================================
echo "Generando DG-03: Casos de Uso UML...\n";
$im = createRoseCanvas(960, 620);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama General de Casos de Uso UML (Modelo del Dominio)", "DG-03", 960, 620, $font, $fontBold);

// Limite del sistema (System Boundary Box)
imagerectangle($im, 200, 70, 760, 590, $c['black']);
imagerectangle($im, 202, 72, 758, 588, $c['grayDark']);
imagefilledrectangle($im, 204, 74, 460, 96, $c['grayLight']);
imagettftext($im, 10, 0, 215, 90, $c['black'], $fontBold, "Límite del Sistema: NAVUSSYS Platform");

// Actor 1: Cliente / Visitante
drawRoseActor($im, $c, 100, 220, "Cliente Comprador", $font, $fontBold);

// Actor 2: Administrador (Ing. Juan Wilber Supa Ttito)
drawRoseActor($im, $c, 870, 290, "Administrador\n(Juan Wilber)", $font, $fontBold);

// Casos de Uso del Cliente
drawRoseUseCase($im, $c, 340, 140, 210, 55, "CU-01: Explorar Catálogo\ny Filtrar Sistemas", $font, $fontBold);
drawRoseUseCase($im, $c, 340, 230, 210, 55, "CU-02: Probar Demo Interactiva\nen Simulador Web", $font, $fontBold);
drawRoseUseCase($im, $c, 340, 320, 210, 55, "CU-03: Calcular Presupuesto\ny Licencia con Cotizador", $font, $fontBold);
drawRoseUseCase($im, $c, 340, 410, 210, 55, "CU-04: Registrar Pedido y\nNotificar por WhatsApp", $font, $fontBold);
drawRoseUseCase($im, $c, 340, 500, 210, 50, "CU-05: Enviar Consulta por\nFormulario de Contacto", $font, $fontBold);

// Casos de Uso Include / Extend
drawRoseUseCase($im, $c, 600, 140, 200, 50, "CU-06: Validar Stock y\nPrecio Dinámico <<include>>", $font, $fontBold);
drawRoseUseCase($im, $c, 600, 230, 200, 50, "CU-07: Autenticación Secreta\ndel Administrador", $font, $fontBold);
drawRoseUseCase($im, $c, 600, 340, 200, 55, "CU-08: Gestionar Catálogo\n(CRUD de Sistemas Web)", $font, $fontBold);
drawRoseUseCase($im, $c, 600, 440, 200, 55, "CU-09: Administrar Pedidos\ny Estados de Venta", $font, $fontBold);
drawRoseUseCase($im, $c, 600, 530, 200, 50, "CU-10: Generar Reporte y\nDescargar Documento APA7", $font, $fontBold);

// Conexiones Cliente -> Casos de uso
drawArrow($im, $c, 130, 230, 240, 150);
drawArrow($im, $c, 130, 250, 235, 230);
drawArrow($im, $c, 130, 270, 235, 320);
drawArrow($im, $c, 130, 290, 240, 400);
drawArrow($im, $c, 130, 310, 240, 490);

// Include entre CU-04 y CU-06
drawArrow($im, $c, 445, 395, 520, 165, true, "<<include>>", $font);

// Conexiones Administrador -> Casos de uso
drawArrow($im, $c, 820, 300, 700, 240);
drawArrow($im, $c, 820, 320, 700, 340);
drawArrow($im, $c, 820, 340, 700, 440);
drawArrow($im, $c, 820, 360, 700, 530);

// Dependency entre CRUD y Login
drawArrow($im, $c, 600, 310, 600, 260, true, "<<include>>", $font);

imagepng($im, $outputDir . '/DG-03_Casos_de_Uso_UML.png');
imagedestroy($im);

// ========================================================
// 4. DG-04: ACTIVIDAD UML / BPMN TO-BE
// ========================================================
echo "Generando DG-04: Actividad TO-BE...\n";
$im = createRoseCanvas(940, 540);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Actividades / BPMN Propuesto (Flujo Optimizado TO-BE)", "DG-04", 940, 540, $font, $fontBold);

// Carril 1: Cliente
imagerectangle($im, 30, 70, 910, 240, $c['black']);
imagefilledrectangle($im, 31, 71, 140, 239, $c['grayLight']);
imagettftext($im, 10, 90, 75, 180, $c['black'], $fontBold, "CLIENTE / USUARIO");

// Carril 2: Sistema NAVUSSYS (Automatizado)
imagerectangle($im, 30, 240, 910, 380, $c['black']);
imagefilledrectangle($im, 31, 241, 140, 379, $c['grayLight']);
imagettftext($im, 10, 90, 75, 330, $c['black'], $fontBold, "SISTEMA NAVUSSYS");

// Carril 3: Administrador (Ing. Juan Wilber)
imagerectangle($im, 30, 380, 910, 510, $c['black']);
imagefilledrectangle($im, 31, 381, 140, 509, $c['grayLight']);
imagettftext($im, 10, 90, 75, 470, $c['black'], $fontBold, "ADMINISTRADOR");

// Inicio
imagefilledellipse($im, 170, 140, 22, 22, $c['green']);
imageellipse($im, 170, 140, 22, 22, $c['black']);
drawArrow($im, $c, 181, 140, 215, 140);

// Tarea 1: Explorar Catalogo
drawRoseBox($im, $c, 215, 110, 140, 60, "Explorar Catálogo\ny Filtrar Sistemas", [], $font, $fontBold);
drawArrow($im, $c, 355, 140, 395, 140);

// Tarea 2: Probar Demo Interactiva
drawRoseBox($im, $c, 395, 110, 140, 60, "Probar Demo en\nSimulador Web", [], $font, $fontBold);
drawArrow($im, $c, 535, 140, 575, 140);

// Tarea 3: Cotizar en linea
drawRoseBox($im, $c, 575, 110, 145, 60, "Configurar Licencia\ny Adicionales", [], $font, $fontBold);
drawArrow($im, $c, 647, 170, 647, 260);

// Tarea 4 (Sistema): Calcular total y registrar pedido
drawRoseBox($im, $c, 565, 260, 165, 65, "Calcular Total y\nRegistrar en BD", [
    "+ Crea registro en 'pedidos'",
    "+ Genera URL de WhatsApp"
], $font, $fontBold);
drawArrow($im, $c, 730, 290, 780, 290);

// Tarea 5 (Cliente): Redireccion y atencion WhatsApp
drawRoseBox($im, $c, 780, 120, 120, 60, "Chatear por\nWhatsApp API", [], $font, $fontBold);
drawArrow($im, $c, 780, 280, 830, 180);
drawArrow($im, $c, 840, 180, 840, 400);

// Tarea 6 (Admin): Ver en panel administrativo y despachar
drawRoseBox($im, $c, 760, 400, 140, 70, "Gestionar Pedido en\nPanel Administrativo", [
    "+ Validar pago",
    "+ Entrega en 24h"
], $font, $fontBold);
drawArrow($im, $c, 760, 435, 690, 435);

// Fin
imagefilledellipse($im, 670, 435, 24, 24, $c['red']);
imageellipse($im, 670, 435, 24, 24, $c['black']);
imageellipse($im, 670, 435, 18, 18, $c['black']);

imagepng($im, $outputDir . '/DG-04_Actividad_TO-BE.png');
imagedestroy($im);

// ========================================================
// 5. DG-05: CLASES UML DEL DOMINIO (RATIONAL ROSE STYLE)
// ========================================================
echo "Generando DG-05: Clases UML del Dominio...\n";
$im = createRoseCanvas(960, 600);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Clases UML del Dominio (Entidades de Negocio)", "DG-05", 960, 600, $font, $fontBold);

// Clase 1: Categoria
drawRoseBox($im, $c, 40, 100, 240, 160, "Categoria", [
    "- id: int",
    "- nombre: string",
    "- slug: string",
    "- icono: string",
    "- descripcion: string",
    "- estado: int",
    "---",
    "+ all(): array",
    "+ find(id: int): Categoria"
], $font, $fontBold, "Entity");

// Clase 2: Sistema
drawRoseBox($im, $c, 370, 80, 280, 240, "Sistema", [
    "- id: int",
    "- categoria_id: int",
    "- nombre: string",
    "- slug: string",
    "- descripcion_corta: string",
    "- descripcion_larga: string",
    "- precio_base: float",
    "- precio_codigo_fuente: float",
    "- tecnologias: string",
    "- caracteristicas: string",
    "- demo_url: string",
    "- ventas_count: int",
    "- estado: int",
    "---",
    "+ all(filtro: string): array",
    "+ find(id: int): Sistema",
    "+ create(data: array): int",
    "+ update(id: int, data: array): bool",
    "+ delete(id: int): bool"
], $font, $fontBold, "Entity");

// Relacion Categoria 1 ---- * Sistema
drawArrow($im, $c, 280, 180, 370, 180);
imagettftext($im, 9, 0, 285, 172, $c['black'], $fontBold, "1");
imagettftext($im, 9, 0, 345, 172, $c['black'], $fontBold, "1..*");
imagettftext($im, 8, 0, 305, 195, $c['blue'], $font, "clasifica a");

// Clase 3: PedidoCotizacion
drawRoseBox($im, $c, 370, 380, 280, 180, "PedidoCotizacion", [
    "- id: int",
    "- sistema_id: int",
    "- cliente_nombre: string",
    "- cliente_email: string",
    "- cliente_telefono: string",
    "- tipo_licencia: string",
    "- servicios_adicionales: string",
    "- precio_total: float",
    "- estado: string",
    "---",
    "+ create(data: array): int",
    "+ all(): array",
    "+ updateStatus(id: int, status: string): bool"
], $font, $fontBold, "Entity");

// Relacion Sistema 1 ---- * PedidoCotizacion
drawArrow($im, $c, 510, 320, 510, 380);
imagettftext($im, 9, 0, 515, 335, $c['black'], $fontBold, "1");
imagettftext($im, 9, 0, 515, 375, $c['black'], $fontBold, "0..*");
imagettftext($im, 8, 0, 440, 355, $c['blue'], $font, "recibe pedidos");

// Clase 4: Usuario (Administrador)
drawRoseBox($im, $c, 710, 100, 220, 180, "Usuario", [
    "- id: int",
    "- nombre: string",
    "- email: string",
    "- password_hash: string",
    "- rol: string",
    "- ultimo_login: datetime",
    "- estado: int",
    "---",
    "+ findByEmail(email: string): Usuario",
    "+ verifyPassword(pass: string): bool",
    "+ updateLastLogin(id: int): void"
], $font, $fontBold, "Entity");

// Relacion Usuario administra Sistemas y Pedidos
drawArrow($im, $c, 710, 190, 650, 190);
imagettftext($im, 8, 0, 660, 180, $c['blue'], $font, "administra");

// Clase 5: MensajeContacto
drawRoseBox($im, $c, 40, 380, 240, 160, "MensajeContacto", [
    "- id: int",
    "- nombre: string",
    "- email: string",
    "- telefono: string",
    "- asunto: string",
    "- mensaje: string",
    "- leido: int",
    "---",
    "+ create(data: array): int",
    "+ all(): array"
], $font, $fontBold, "Entity");

imagepng($im, $outputDir . '/DG-05_Clases_UML_Dominio.png');
imagedestroy($im);

// ========================================================
// 6. DG-06: ENTIDAD-RELACION (ER) Y MODELO RELACIONAL
// ========================================================
echo "Generando DG-06: Modelo ERD y Relacional...\n";
$im = createRoseCanvas(960, 580);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama Entidad-Relación y Estructura de Persistencia Relacional", "DG-06", 960, 580, $font, $fontBold);

// Tabla categorias
drawRoseBox($im, $c, 40, 120, 240, 160, "categorias (InnoDB)", [
    "[PK] id : INT (AI)",
    "nombre : VARCHAR(100)",
    "slug : VARCHAR(100)",
    "icono : VARCHAR(50)",
    "descripcion : TEXT",
    "estado : TINYINT(1)",
    "created_at : TIMESTAMP"
], $font, $fontBold, "Table");

// Tabla sistemas
drawRoseBox($im, $c, 370, 90, 270, 260, "sistemas (InnoDB)", [
    "[PK] id : INT (AI)",
    "[FK] categoria_id : INT",
    "nombre : VARCHAR(150)",
    "slug : VARCHAR(150)",
    "descripcion_corta : VARCHAR(255)",
    "descripcion_larga : TEXT",
    "precio_base : DECIMAL(10,2)",
    "precio_codigo_fuente : DECIMAL(10,2)",
    "tecnologias : VARCHAR(255)",
    "caracteristicas : TEXT",
    "demo_url : VARCHAR(255)",
    "imagen : VARCHAR(255)",
    "ventas_count : INT",
    "calificacion : DECIMAL(2,1)",
    "estado : TINYINT(1)"
], $font, $fontBold, "Table");

// FK Line
drawArrow($im, $c, 280, 180, 370, 180);
imagettftext($im, 8, 0, 290, 170, $c['red'], $fontBold, "1:N (ON DELETE CASCADE)");

// Tabla pedidos
drawRoseBox($im, $c, 370, 390, 270, 160, "pedidos (InnoDB)", [
    "[PK] id : INT (AI)",
    "[FK] sistema_id : INT",
    "cliente_nombre : VARCHAR(120)",
    "cliente_email : VARCHAR(150)",
    "cliente_telefono : VARCHAR(50)",
    "tipo_licencia : VARCHAR(50)",
    "servicios_adicionales : TEXT",
    "precio_total : DECIMAL(10,2)",
    "estado : VARCHAR(30)"
], $font, $fontBold, "Table");

drawArrow($im, $c, 505, 350, 505, 390);
imagettftext($im, 8, 0, 515, 375, $c['red'], $fontBold, "1:N (ON DELETE CASCADE)");

// Tabla usuarios
drawRoseBox($im, $c, 690, 120, 230, 160, "usuarios (InnoDB)", [
    "[PK] id : INT (AI)",
    "nombre : VARCHAR(100)",
    "email : VARCHAR(150) UNIQUE",
    "password : VARCHAR(255)",
    "rol : VARCHAR(50)",
    "ultimo_login : DATETIME",
    "estado : TINYINT(1)"
], $font, $fontBold, "Table");

// Tabla mensajes_contacto
drawRoseBox($im, $c, 690, 350, 230, 150, "mensajes_contacto (InnoDB)", [
    "[PK] id : INT (AI)",
    "nombre : VARCHAR(120)",
    "email : VARCHAR(150)",
    "telefono : VARCHAR(50)",
    "asunto : VARCHAR(150)",
    "mensaje : TEXT",
    "leido : TINYINT(1)"
], $font, $fontBold, "Table");

imagepng($im, $outputDir . '/DG-06_Entidad_Relacion_ERD.png');
imagedestroy($im);

// ========================================================
// 7. DG-07: SECUENCIA UML (FLUJO 1: COMPRA / COTIZACION)
// ========================================================
echo "Generando DG-07: Secuencia UML (Cotización de Sistema)...\n";
$im = createRoseCanvas(960, 540);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Secuencia UML 1: Cotización y Registro de Pedido por Cliente", "DG-07", 960, 540, $font, $fontBold);

// Lifelines (Cabeceras)
$cols = [
    ['x' => 90,  'name' => "Cliente\nComprador", 'isActor' => true],
    ['x' => 250, 'name' => ":HomeView\n(Navegador)", 'isActor' => false],
    ['x' => 430, 'name' => ":HomeController\n(Controlador)", 'isActor' => false],
    ['x' => 610, 'name' => ":Pedido\n(Modelo)", 'isActor' => false],
    ['x' => 770, 'name' => ":MySQL / SQLite\n(Base de Datos)", 'isActor' => false],
    ['x' => 890, 'name' => "WhatsApp API\n(+51 935114374)", 'isActor' => false]
];

foreach ($cols as $col) {
    if ($col['isActor']) {
        drawRoseActor($im, $c, $col['x'], 80, "Cliente", $font, $fontBold);
    } else {
        drawRoseBox($im, $c, $col['x'] - 55, 90, 110, 45, $col['name'], [], $font, $fontBold);
    }
    // Linea vertical discontinua
    imagedashedline($im, $col['x'], 145, $col['x'], 500, $c['lineGray']);
}

// Barras de activacion y Mensajes
drawArrow($im, $c, 90, 170, 250, 170, false, "1: Selecciona sistema y complementos", $font);
drawArrow($im, $c, 250, 200, 430, 200, false, "2: POST /order/submit (JSON)", $font);
drawArrow($im, $c, 430, 230, 610, 230, false, "3: create(datosPedido)", $font);
drawArrow($im, $c, 610, 260, 770, 260, false, "4: INSERT INTO pedidos...", $font);
drawArrow($im, $c, 770, 290, 610, 290, true, "5: ID de pedido generado (OK)", $font);
drawArrow($im, $c, 610, 320, 430, 320, true, "6: Retorna pedidoId", $font);
drawArrow($im, $c, 430, 350, 890, 350, false, "7: Genera enlace wa.me prellenado", $font);
drawArrow($im, $c, 430, 390, 250, 390, true, "8: {success:true, whatsapp_url}", $font);
drawArrow($im, $c, 250, 430, 90, 430, false, "9: Muestra SweetAlert y redirige", $font);
drawArrow($im, $c, 90, 470, 890, 470, false, "10: Inicia chat con Ing. Juan Wilber", $font);

imagepng($im, $outputDir . '/DG-07_Secuencia_UML_Cotizacion.png');
imagedestroy($im);

// ========================================================
// 7B. DG-07B: SECUENCIA UML (FLUJO 2: LOGIN Y CRUD ADMIN)
// ========================================================
echo "Generando DG-07B: Secuencia UML (Autenticación y CRUD Admin)...\n";
$im = createRoseCanvas(960, 540);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Secuencia UML 2: Autenticación Secreta y Publicación de Sistema", "DG-07B", 960, 540, $font, $fontBold);

$cols2 = [
    ['x' => 90,  'name' => "Admin\n(Juan Wilber)", 'isActor' => true],
    ['x' => 260, 'name' => ":AdminLoginView\n(Acceso Oculto)", 'isActor' => false],
    ['x' => 450, 'name' => ":AuthController\n(Controlador)", 'isActor' => false],
    ['x' => 640, 'name' => ":Usuario\n(Modelo)", 'isActor' => false],
    ['x' => 830, 'name' => ":Sistema / BD\n(Persistencia)", 'isActor' => false]
];

foreach ($cols2 as $col) {
    if ($col['isActor']) {
        drawRoseActor($im, $c, $col['x'], 80, "Admin", $font, $fontBold);
    } else {
        drawRoseBox($im, $c, $col['x'] - 60, 90, 120, 45, $col['name'], [], $font, $fontBold);
    }
    imagedashedline($im, $col['x'], 145, $col['x'], 500, $c['lineGray']);
}

drawArrow($im, $c, 90, 170, 260, 170, false, "1: Pulsa Ctrl+Shift+A o /admin/login", $font);
drawArrow($im, $c, 260, 200, 90, 200, true, "2: Renderiza vista de login privada", $font);
drawArrow($im, $c, 90, 230, 450, 230, false, "3: POST /admin/authenticate (email, pass)", $font);
drawArrow($im, $c, 450, 260, 640, 260, false, "4: findByEmail('juanwilber@gmail.com')", $font);
drawArrow($im, $c, 640, 290, 450, 290, true, "5: password_verify(hash, pass) = TRUE", $font);
drawArrow($im, $c, 450, 320, 260, 320, false, '6: Inicia sesion admin_user', $font);
drawArrow($im, $c, 260, 350, 90, 350, true, "7: Redirige a /admin/dashboard", $font);
drawArrow($im, $c, 90, 390, 450, 390, false, "8: POST /admin/sistema/store (Datos nuevo sistema)", $font);
drawArrow($im, $c, 450, 430, 830, 430, false, "9: INSERT INTO sistemas (nombre, precio, stack...)", $font);
drawArrow($im, $c, 830, 460, 90, 460, true, "10: Retorna éxito y publica en tienda en vivo", $font);

imagepng($im, $outputDir . '/DG-07B_Secuencia_UML_Admin_CRUD.png');
imagedestroy($im);

// ========================================================
// 8. DG-08: COMPONENTES UML (RATIONAL ROSE STYLE)
// ========================================================
echo "Generando DG-08: Componentes UML...\n";
$im = createRoseCanvas(960, 560);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Componentes UML (Arquitectura MVC y Módulos)", "DG-08", 960, 560, $font, $fontBold);

// Capa 1: Presentacion (Vistas)
imagerectangle($im, 30, 70, 260, 530, $c['black']);
imagefilledrectangle($im, 32, 72, 258, 100, $c['grayLight']);
imagettftext($im, 9.5, 0, 45, 92, $c['black'], $fontBold, "CAPA PRESENTACIÓN (VISTAS)");
drawRoseComponent($im, $c, 50, 120, 180, 55, "HomeView.php", $font, $fontBold);
drawRoseComponent($im, $c, 50, 200, 180, 55, "DemoSimulator.js", $font, $fontBold);
drawRoseComponent($im, $c, 50, 280, 180, 55, "PriceCalculator.js", $font, $fontBold);
drawRoseComponent($im, $c, 50, 360, 180, 55, "AdminLogin.php", $font, $fontBold);
drawRoseComponent($im, $c, 50, 440, 180, 55, "AdminDashboard.php", $font, $fontBold);

// Capa 2: Logica y Control (Controladores / Rutas)
imagerectangle($im, 300, 70, 590, 530, $c['black']);
imagefilledrectangle($im, 302, 72, 588, 100, $c['grayLight']);
imagettftext($im, 9.5, 0, 320, 92, $c['black'], $fontBold, "CAPA APLICACIÓN / CONTROLADORES (MVC)");
drawRoseComponent($im, $c, 320, 120, 240, 55, "Router / index.php", $font, $fontBold);
drawRoseComponent($im, $c, 320, 200, 240, 55, "HomeController.php", $font, $fontBold);
drawRoseComponent($im, $c, 320, 280, 240, 55, "AdminAuthController.php", $font, $fontBold);
drawRoseComponent($im, $c, 320, 360, 240, 55, "AdminDashboardController.php", $font, $fontBold);
drawRoseComponent($im, $c, 320, 440, 240, 55, "AuthMiddleware.php", $font, $fontBold);

// Capa 3: Dominio y Persistencia (Modelos / BD)
imagerectangle($im, 630, 70, 930, 530, $c['black']);
imagefilledrectangle($im, 632, 72, 928, 100, $c['grayLight']);
imagettftext($im, 9.5, 0, 650, 92, $c['black'], $fontBold, "CAPA DATOS Y PERSISTENCIA");
drawRoseComponent($im, $c, 660, 120, 240, 55, "Sistema.php (Model)", $font, $fontBold);
drawRoseComponent($im, $c, 660, 200, 240, 55, "PedidoCotizacion.php", $font, $fontBold);
drawRoseComponent($im, $c, 660, 280, 240, 55, "Usuario.php", $font, $fontBold);
drawRoseComponent($im, $c, 660, 360, 240, 55, "Database.php (PDO)", $font, $fontBold);
drawRoseComponent($im, $c, 660, 440, 240, 55, "navussys.sqlite / MySQL", $font, $fontBold);

// Conexiones de dependencias
drawArrow($im, $c, 230, 150, 320, 150, true, "<<HTTP GET>>", $font);
drawArrow($im, $c, 230, 230, 320, 230, true, "<<AJAX POST>>", $font);
drawArrow($im, $c, 230, 390, 320, 310, true, "<<POST Auth>>", $font);
drawArrow($im, $c, 560, 230, 660, 150, true, "<<invokes>>", $font);
drawArrow($im, $c, 560, 390, 660, 310, true, "<<manages>>", $font);
drawArrow($im, $c, 780, 415, 780, 440, true, "<<PDO SQL>>", $font);

imagepng($im, $outputDir . '/DG-08_Componentes_UML.png');
imagedestroy($im);

// ========================================================
// 9. DG-09: DESPLIEGUE UML (CUBOS 3D RATIONAL ROSE)
// ========================================================
echo "Generando DG-09: Despliegue UML...\n";
$im = createRoseCanvas(960, 540);
$c = getColors($im);
drawTitleBox($im, $c, "Diagrama de Despliegue UML (Nodos de Ejecución y Protocolos)", "DG-09", 960, 540, $font, $fontBold);

// Nodo 1: Dispositivo Cliente
drawRoseNode($im, $c, 40, 140, 240, 260, 25, "Cliente Web (PC / Móvil)", [
    "Sistema Operativo: Windows / Android / iOS",
    "Navegador: Chrome, Edge, Safari",
    "JavaScript Engine ES6+",
    "Librerías CDN: Bootstrap 5, SweetAlert2",
    "Chart.js Visualizer Engine"
], $font, $fontBold);

// Nodo 2: Servidor Web de Aplicación (WampServer / VPS)
drawRoseNode($im, $c, 370, 120, 270, 300, 25, "Servidor Web Apache 2.4", [
    "Motor PHP 8.3 (ZTS VC19 x64)",
    "Módulos: pdo_mysql, pdo_sqlite, gd, zip",
    "Instancia Laravel 12 MVC Core",
    "Módulo URL Rewrite / Router",
    "Sesiones Seguras PHP Session",
    "Generador OpenXML Word DOCX"
], $font, $fontBold);

// Nodo 3: Servidor de Base de Datos
drawRoseNode($im, $c, 710, 140, 220, 260, 25, "Servidor de Base de Datos", [
    "Motor MySQL 8.0 / SQLite 3",
    "Base de Datos: 'navussys'",
    "Codificación: utf8mb4_unicode_ci",
    "Tablas: sistemas, pedidos, usuarios,",
    "categorias, mensajes_contacto",
    "Conexión persistente PDO"
], $font, $fontBold);

// Conexiones de red entre nodos
drawArrow($im, $c, 280, 270, 370, 270, false, "HTTP / HTTPS (Puerto 80 / 443)", $font);
drawArrow($im, $c, 640, 270, 710, 270, false, "TCP/IP Socket (Puerto 3306 / Archivo SQLite)", $font);

// Dispositivo externo WhatsApp API
drawRoseBox($im, $c, 150, 440, 300, 60, "Dispositivo Móvil Administrador", [
    "WhatsApp Business (+51 935114374)",
    "Ing. Juan Wilber Supa Ttito"
], $font, $fontBold, "Device");
drawArrow($im, $c, 470, 420, 320, 440, false, "WhatsApp Webhook / Direct Chat API", $font);

imagepng($im, $outputDir . '/DG-09_Despliegue_UML.png');
imagedestroy($im);

// ========================================================
// 10. DG-10: NAVEGACION Y WIREFRAMES DE INTERFACES
// ========================================================
echo "Generando DG-10: Mapa de Navegación y Wireframes...\n";
$im = createRoseCanvas(960, 580);
$c = getColors($im);
drawTitleBox($im, $c, "Mapa de Navegación del Sistema y Prototipos Representativos", "DG-10", 960, 580, $font, $fontBold);

// Mapa de navegacion (Arriba)
imagefilledrectangle($im, 40, 70, 920, 230, $c['grayLight']);
imagerectangle($im, 40, 70, 920, 230, $c['black']);
imagettftext($im, 9.5, 0, 55, 90, $c['black'], $fontBold, "MAPA DE PANTALLAS Y FLUJO DE NAVEGACIÓN (PÚBLICO Y PRIVADO)");

// Nodo Raiz
drawRoseBox($im, $c, 60, 110, 130, 40, "Inicio / Catálogo\n(home.php)", [], $font, $fontBold);

// Vistas hijas publicas
drawRoseBox($im, $c, 230, 110, 130, 40, "Simulador Demos\n(#demo-simulador)", [], $font, $fontBold);
drawRoseBox($im, $c, 390, 110, 130, 40, "Cotizador Dinámico\n(#calculadora)", [], $font, $fontBold);
drawRoseBox($im, $c, 550, 110, 130, 40, "Modal Pedido\n(#orderModal)", [], $font, $fontBold);
drawRoseBox($im, $c, 710, 110, 140, 40, "WhatsApp API\n(+51 935114374)", [], $font, $fontBold);

drawArrow($im, $c, 190, 130, 230, 130);
drawArrow($im, $c, 360, 130, 390, 130);
drawArrow($im, $c, 520, 130, 550, 130);
drawArrow($im, $c, 680, 130, 710, 130);

// Flujo Oculto Administrativo (No visible en navbar)
drawRoseBox($im, $c, 60, 175, 140, 40, "Atajo Ctrl+Shift+A\n/admin/login", [], $font, $fontBold);
drawRoseBox($im, $c, 240, 175, 150, 40, "Login Administrativo\n(Acceso Oculto)", [], $font, $fontBold);
drawRoseBox($im, $c, 430, 175, 150, 40, "Admin Dashboard\n(Métricas & KPIs)", [], $font, $fontBold);
drawRoseBox($im, $c, 620, 175, 140, 40, "Gestión CRUD\n(Sistemas y Precios)", [], $font, $fontBold);
drawRoseBox($im, $c, 790, 175, 120, 40, "Control Pedidos\ny Documentos", [], $font, $fontBold);

drawArrow($im, $c, 200, 195, 240, 195);
drawArrow($im, $c, 390, 195, 430, 195);
drawArrow($im, $c, 580, 195, 620, 195);
drawArrow($im, $c, 760, 195, 790, 195);

// Wireframes en Miniatura (Abajo)
// Wireframe 1: Portada y Catalogo
imagefilledrectangle($im, 40, 250, 310, 550, $c['white']);
imagerectangle($im, 40, 250, 310, 550, $c['black']);
imagefilledrectangle($im, 40, 250, 310, 275, $c['charcoal']);
imagettftext($im, 8, 0, 50, 268, $c['white'], $fontBold, "WF-01: Portada & Catálogo Interactivo");
// Mini Header
imagefilledrectangle($im, 50, 285, 300, 305, $c['grayLight']);
imagettftext($im, 7, 0, 55, 298, $c['black'], $fontBold, "NAVUSSYS | Catálogo | Cotizador | Contacto");
// Mini Hero
imagefilledrectangle($im, 50, 315, 300, 370, $c['blueLight']);
imagettftext($im, 7.5, 0, 58, 335, $c['black'], $fontBold, "Sistemas Web Listos con Laravel 12");
imagettftext($im, 6.5, 0, 58, 350, $c['lineGray'], $font, "Desarrollado por Ing. Juan Wilber Supa");
imagefilledrectangle($im, 58, 355, 120, 365, $c['green']);
// Mini Tarjetas de Sistemas
imagefilledrectangle($im, 50, 380, 165, 450, $c['yellow']);
imagerectangle($im, 50, 380, 165, 450, $c['black']);
imagettftext($im, 6.5, 0, 54, 395, $c['black'], $fontBold, "NAVUS-POS: Ventas");
imagettftext($im, 6.5, 0, 54, 410, $c['charcoal'], $font, "S/. 350.00");
imagefilledrectangle($im, 175, 380, 300, 450, $c['yellow']);
imagerectangle($im, 175, 380, 300, 450, $c['black']);
imagettftext($im, 6.5, 0, 179, 395, $c['black'], $fontBold, "NAVUS-KARDEX");
imagettftext($im, 6.5, 0, 179, 410, $c['charcoal'], $font, "S/. 420.00");
// Mini Simulador
imagefilledrectangle($im, 50, 460, 300, 535, $c['grayLight']);
imagerectangle($im, 50, 460, 300, 535, $c['black']);
imagettftext($im, 7, 0, 58, 475, $c['black'], $fontBold, "Simulador de Demos en Vivo");
imagettftext($im, 6.5, 0, 58, 495, $c['charcoal'], $font, "[Demo POS] [Demo Kardex] [Demo SUNAT]");

// Wireframe 2: Cotizador y Modal Pedido
imagefilledrectangle($im, 340, 250, 610, 550, $c['white']);
imagerectangle($im, 340, 250, 610, 550, $c['black']);
imagefilledrectangle($im, 340, 250, 610, 275, $c['charcoal']);
imagettftext($im, 8, 0, 350, 268, $c['white'], $fontBold, "WF-02: Cotizador Dinámico & WhatsApp");
// Controles de cotizador
imagefilledrectangle($im, 355, 290, 595, 320, $c['grayLight']);
imagettftext($im, 7, 0, 365, 308, $c['black'], $font, "1. Selecciona: NAVUS-POS (S/. 350.00)");
imagefilledrectangle($im, 355, 330, 470, 360, $c['yellow']);
imagerectangle($im, 355, 330, 470, 360, $c['black']);
imagettftext($im, 6.5, 0, 365, 348, $c['black'], $fontBold, "(*) Comercial");
imagefilledrectangle($im, 480, 330, 595, 360, $c['grayLight']);
imagerectangle($im, 480, 330, 595, 360, $c['black']);
imagettftext($im, 6.5, 0, 485, 348, $c['charcoal'], $font, "( ) Cód. Fuente");
// Checks
imagettftext($im, 6.5, 0, 365, 380, $c['black'], $font, "[v] Hosting SSD + Dominio (+S/.120)");
imagettftext($im, 6.5, 0, 365, 400, $c['black'], $font, "[v] Instalación Remota (+S/.80)");
// Total
imagefilledrectangle($im, 355, 420, 595, 475, $c['blueLight']);
imagettftext($im, 8, 0, 390, 442, $c['blue'], $fontBold, "PRESUPUESTO: S/. 550.00");
imagefilledrectangle($im, 380, 450, 570, 468, $c['green']);
imagettftext($im, 6.5, 0, 395, 463, $c['white'], $fontBold, "Enviar por WhatsApp (+51 935114374)");

// Wireframe 3: Panel Administrativo Privado
imagefilledrectangle($im, 640, 250, 920, 550, $c['white']);
imagerectangle($im, 640, 250, 920, 550, $c['black']);
imagefilledrectangle($im, 640, 250, 920, 275, $c['charcoal']);
imagettftext($im, 8, 0, 650, 268, $c['white'], $fontBold, "WF-03: Dashboard de Administración");
// Sidebar mini
imagefilledrectangle($im, 645, 280, 715, 545, $c['charcoal']);
imagettftext($im, 6, 0, 650, 300, $c['white'], $fontBold, "NAVUSSYS");
imagettftext($im, 5.5, 0, 650, 320, $c['yellow'], $font, "• Métricas");
imagettftext($im, 5.5, 0, 650, 335, $c['grayDark'], $font, "• Sistemas");
imagettftext($im, 5.5, 0, 650, 350, $c['grayDark'], $font, "• Pedidos");
imagettftext($im, 5.5, 0, 650, 365, $c['grayDark'], $font, "• Doc. APA7");
// KPI Boxes
imagefilledrectangle($im, 725, 285, 785, 325, $c['blueLight']);
imagettftext($im, 6, 0, 730, 298, $c['charcoal'], $font, "Sistemas");
imagettftext($im, 8, 0, 730, 315, $c['blue'], $fontBold, "6");
imagefilledrectangle($im, 790, 285, 850, 325, $c['yellow']);
imagettftext($im, 6, 0, 795, 298, $c['charcoal'], $font, "Pedidos");
imagettftext($im, 8, 0, 795, 315, $c['black'], $fontBold, "12");
imagefilledrectangle($im, 855, 285, 915, 325, $c['green']);
imagettftext($im, 5.5, 0, 860, 298, $c['white'], $font, "Ingresos");
imagettftext($im, 7, 0, 860, 315, $c['white'], $fontBold, "S/. 5.8k");
// Mini Tabla de Gestion
imagefilledrectangle($im, 725, 340, 915, 460, $c['grayLight']);
imagerectangle($im, 725, 340, 915, 460, $c['black']);
imagettftext($im, 6.5, 0, 730, 355, $c['black'], $fontBold, "Gestión de Sistemas Web (CRUD)");
imagettftext($im, 6, 0, 730, 375, $c['charcoal'], $font, "1. NAVUS-POS | S/. 350 | [Editar] [X]");
imagettftext($im, 6, 0, 730, 395, $c['charcoal'], $font, "2. NAVUS-KARDEX | S/. 420 | [Editar] [X]");
imagettftext($im, 6, 0, 730, 415, $c['charcoal'], $font, "3. NAVUS-FACT | S/. 480 | [Editar] [X]");
// Boton Descargar Word APA7
imagefilledrectangle($im, 725, 475, 915, 520, $c['yellowDark']);
imagerectangle($im, 725, 475, 915, 520, $c['black']);
imagettftext($im, 6.5, 0, 735, 495, $c['black'], $fontBold, "[DOCX] Descargar Memoria APA 7");
imagettftext($im, 5.5, 0, 735, 510, $c['lineGray'], $font, "Capítulos I al VIII + 10 Diagramas");

imagepng($im, $outputDir . '/DG-10_Navegacion_Wireframes.png');
imagedestroy($im);

echo "¡Todos los 10 diagramas Rational Rose han sido generados exitosamente en docs/diagrams/!\n";
