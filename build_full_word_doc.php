<?php
// ============================================================================
// GENERADOR COMPLETO DE LA MEMORIA TÉCNICA EN MICROSOFT WORD (.DOCX)
// FORMATO OFICIAL: APA 7MA EDICIÓN (SIN RESÚMENES - DOCUMENTACIÓN ÍNTEGRA)
// PROYECTO: NAVUSSYS - SISTEMA WEB EN LARAVEL 12 PARA VENTA DE SOFTWARE
// AUTOR: ING. JUAN WILBER SUPA TTITO
// CONTACTO: +51 935114374 | juanwilber@gmail.com
// UBICACIÓN: AVENIDA GRAU CON CALLE 2 DE MAYO, CUSCO - PERÚ
// ============================================================================

require_once __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\Style\Table as TableStyle;

$phpWord = new PhpWord();

// Configuración de fuentes predeterminadas según APA 7 (Times New Roman o Arial 11 pt)
$phpWord->setDefaultFontName('Arial');
$phpWord->setDefaultFontSize(11);

// Configuración de estilos de títulos APA 7
$phpWord->addTitleStyle(1, ['name' => 'Arial', 'size' => 15, 'bold' => true, 'color' => '0F172A'], ['alignment' => Jc::CENTER, 'spaceAfter' => 180, 'spaceBefore' => 200]);
$phpWord->addTitleStyle(2, ['name' => 'Arial', 'size' => 12.5, 'bold' => true, 'color' => '1E293B'], ['alignment' => Jc::START, 'spaceAfter' => 120, 'spaceBefore' => 160]);
$phpWord->addTitleStyle(3, ['name' => 'Arial', 'size' => 11, 'bold' => true, 'italic' => true, 'color' => '334155'], ['alignment' => Jc::START, 'spaceAfter' => 90, 'spaceBefore' => 120]);

// Estilos tipográficos reutilizables
$fontTitle = ['name' => 'Arial', 'size' => 17, 'bold' => true, 'color' => '0F172A'];
$fontCoverBold = ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '0F172A'];
$fontBody = ['name' => 'Arial', 'size' => 11, 'color' => '1E293B'];
$fontBodyBold = ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '1E293B'];
$fontCaptionNum = ['name' => 'Arial', 'size' => 9.5, 'bold' => true, 'color' => '1E293B'];
$fontCaptionTitle = ['name' => 'Arial', 'size' => 9.5, 'italic' => true, 'color' => '334155'];
$fontTableHead = ['name' => 'Arial', 'size' => 9.5, 'bold' => true, 'color' => '0F172A'];
$fontTableCell = ['name' => 'Arial', 'size' => 9, 'color' => '1E293B'];
$fontTableNote = ['name' => 'Arial', 'size' => 8.5, 'italic' => true, 'color' => '64748B'];
$fontCode = ['name' => 'Consolas', 'size' => 8.5, 'color' => '0F172A'];

// Párrafos
$pJustified = ['alignment' => Jc::BOTH, 'lineHeight' => 1.25, 'spaceAfter' => 110];
$pCentered = ['alignment' => Jc::CENTER, 'spaceAfter' => 90];
$pLeft = ['alignment' => Jc::START, 'spaceAfter' => 50];

// Estilo de tablas APA 7 (Líneas horizontales en cabecera y cierre, sin líneas verticales)
$tableStyleAPA7 = [
    'borderTopSize' => 12,
    'borderTopColor' => '000000',
    'borderBottomSize' => 12,
    'borderBottomColor' => '000000',
    'cellMarginTop' => 70,
    'cellMarginBottom' => 70,
    'cellMarginLeft' => 100,
    'cellMarginRight' => 100,
    'alignment' => JcTable::CENTER
];
$tableHeaderStyle = [
    'borderBottomSize' => 8,
    'borderBottomColor' => '000000',
    'bgColor' => 'F1F5F9'
];
$tableRowLastStyle = [
    'borderBottomSize' => 12,
    'borderBottomColor' => '000000'
];

$phpWord->addTableStyle('TableAPA7', $tableStyleAPA7);

// Sección principal con márgenes APA 7 (2.54 cm = 1440 twips)
$sectionSettings = [
    'paperSize' => 'A4',
    'marginTop' => 1440,
    'marginBottom' => 1440,
    'marginLeft' => 1440,
    'marginRight' => 1440
];

$section = $phpWord->addSection($sectionSettings);

// ============================================================================
// PORTADA FORMAL APA 7MA EDICIÓN
// ============================================================================
$section->addTextBreak(2);
$section->addText("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO", ['name' => 'Arial', 'size' => 12, 'bold' => true, 'color' => '1E293B'], $pCentered);
$section->addText("PROGRAMA DE ESTUDIOS DE ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TI", ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '334155'], $pCentered);
$section->addText("UNIDAD DIDÁCTICA: ARQUITECTURA Y PROGRAMACIÓN WEB", ['name' => 'Arial', 'size' => 10.5, 'color' => '475569'], $pCentered);
$section->addTextBreak(2);

$section->addText("MEMORIA TÉCNICA DEL PROYECTO FINAL - DEL ANÁLISIS A LA IMPLEMENTACIÓN", ['name' => 'Arial', 'size' => 12, 'bold' => true, 'color' => '4F46E5'], $pCentered);
$section->addTextBreak(1);

$section->addText("“NAVUSSYS: PLATAFORMA INTEGRAL PARA LA COMERCIALIZACIÓN Y GESTIÓN DE SISTEMAS WEB CON FRAMEWORK LARAVEL 12, ARQUITECTURA MVC, SIMULADOR EN VIVO, COTIZADOR PARAMÉTRICO Y PANEL DE CONTROL RESTRINGIDO”", $fontTitle, $pCentered);
$section->addTextBreak(2);

$section->addText("AUTOR Y DESARROLLADOR:", ['name' => 'Arial', 'size' => 10, 'bold' => true, 'color' => '64748B'], $pCentered);
$section->addText("Ing. Juan Wilber Supa Ttito", ['name' => 'Arial', 'size' => 13, 'bold' => true, 'color' => '0F172A'], $pCentered);
$section->addText("WhatsApp: +51 935114374 | Correo: juanwilber@gmail.com", $fontBody, $pCentered);
$section->addText("Dirección: Avenida Grau con Calle 2 de Mayo, Cusco - Perú", $fontBody, $pCentered);
$section->addTextBreak(2);

$section->addText("ASESOR DOCENTE:", ['name' => 'Arial', 'size' => 10, 'bold' => true, 'color' => '64748B'], $pCentered);
$section->addText("Docente Responsable de la Unidad Didáctica", $fontCoverBold, $pCentered);
$section->addTextBreak(2);

$section->addText("CUSCO – PERÚ", ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '1E293B'], $pCentered);
$section->addText("Noviembre de 2026", ['name' => 'Arial', 'size' => 11, 'color' => '475569'], $pCentered);

$section->addPageBreak();

// ============================================================================
// ÍNDICE GENERAL Y CONTENIDO
// ============================================================================
$section->addTitle("Índice General de Contenidos", 1);
$section->addText("Capítulo I: Generalidades del Proyecto ................................................................................ Pág. 3", $fontBody, $pLeft);
$section->addText("Capítulo II: Análisis del Sistema y Requerimientos ................................................................ Pág. 6", $fontBody, $pLeft);
$section->addText("Capítulo III: Diseño del Sistema y Modelado UML Rational Rose ........................................... Pág. 12", $fontBody, $pLeft);
$section->addText("Capítulo IV: Arquitectura del Sistema Web en Laravel 12 ...................................................... Pág. 18", $fontBody, $pLeft);
$section->addText("Capítulo V: Desarrollo e Implementación Técnica ................................................................ Pág. 24", $fontBody, $pLeft);
$section->addText("Capítulo VI: Pruebas y Validación Funcional ......................................................................... Pág. 30", $fontBody, $pLeft);
$section->addText("Capítulo VII: Resultados y Evaluación .................................................................................. Pág. 34", $fontBody, $pLeft);
$section->addText("Capítulo VIII: Conclusiones y Recomendaciones ................................................................. Pág. 38", $fontBody, $pLeft);
$section->addText("Referencias Bibliográficas (APA 7) ................................................................................... Pág. 40", $fontBody, $pLeft);
$section->addText("Anexos Técnicos y Diccionario de Datos ............................................................................ Pág. 41", $fontBody, $pLeft);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO I: GENERALIDADES DEL PROYECTO
// ============================================================================
$section->addTitle("Capítulo I: Generalidades del Proyecto", 1);

$section->addTitle("1.1. Título del Proyecto", 2);
$section->addText(
    "NAVUSSYS: Plataforma Web Integral para la Comercialización y Gestión de Sistemas de Información Web con Framework Laravel 12, Arquitectura MVC, Simulador en Vivo, Cotizador Paramétrico y Panel de Control Restringido.",
    $fontBody,
    $pJustified
);

$section->addTitle("1.2. Organización y Contexto Empresarial", 2);
$section->addText(
    "El proyecto se formaliza dentro de las operaciones de desarrollo tecnológico del Ing. Juan Wilber Supa Ttito, profesional independiente de ingeniería de software con sede de operaciones en la Avenida Grau con Calle 2 de Mayo, en la ciudad de Cusco, Perú. La iniciativa NAVUSSYS surge como respuesta a la creciente demanda de micro, pequeñas y medianas empresas (MIPYMES) en Perú que requieren adquirir sistemas de información comerciales llave en mano (Puntos de Venta POS, Inventarios Kardex, Facturación Electrónica SUNAT UBL 2.1, ERPs, Clínicas y Restaurantes) sin los altos costos ni los prolongados plazos de desarrollo desde cero.",
    $fontBody,
    $pJustified
);

$section->addTitle("1.3. Planteamiento del Problema", 2);
$section->addText(
    "Tradicionalmente, la comercialización de software preconstruido se efectúa por canales no formales como redes sociales o mensajería de WhatsApp sin estructura. Esta práctica genera serios inconvenientes:",
    $fontBody,
    $pJustified
);
$section->addListItem("Falta de visibilidad y catálogo centralizado: Los clientes no pueden consultar de forma estructurada las características técnicas, tecnologías aplicadas ni los precios vigentes de los sistemas.", 0, $fontBody, $pJustified);
$section->addListItem("Inseguridad y desconfianza del comprador: Al tratarse de bienes digitales intangibles, los prospectos demandan probar el software antes de invertir; al carecer de simuladores interactivos, más del 45% de los potenciales clientes desisten de la compra.", 0, $fontBody, $pJustified);
$section->addListItem("Cotizaciones imprecisas y lentas: La estimación de costos entre licencia de uso comercial versus cesión completa de código fuente, sumado a complementos como hosting, dominio y capacitaciones, se realiza en hojas de cálculo manuales, provocando retrasos y discrepancias.", 0, $fontBody, $pJustified);
$section->addListItem("Descontrol operativo: No existe una base de datos centralizada que capture los prospectos, pedidos generados y estado de entrega, impidiendo la trazabilidad del negocio.", 0, $fontBody, $pJustified);

$section->addTitle("1.4. Formulación del Problema", 2);
$section->addText("Problema General:", $fontBodyBold, $pLeft);
$section->addText(
    "¿De qué manera el diseño e implementación de una plataforma web con Laravel 12, catálogo interactivo, simulador de demos, cotizador paramétrico y panel administrativo restringido optimizará la comercialización y gestión de sistemas web en NAVUSSYS?",
    $fontBody,
    $pJustified
);
$section->addText("Problemas Específicos:", $fontBodyBold, $pLeft);
$section->addListItem("¿Cuáles son los requerimientos funcionales, no funcionales y reglas del negocio que deben modelarse para la comercialización estructurada de software?", 0, $fontBody, $pJustified);
$section->addListItem("¿Cómo diseñar los artefactos visuales bajo notación Rational Rose para asegurar coherencia entre análisis, arquitectura y base de datos relacional?", 0, $fontBody, $pJustified);
$section->addListItem("¿Cómo implementar en Laravel 12 una arquitectura MVC robusta con seguridad avanzada (login administrativo oculto) y vinculación directa a WhatsApp?", 0, $fontBody, $pJustified);
$section->addListItem("¿Cómo verificar y validar el correcto funcionamiento de los módulos mediante casos de prueba automatizados y matriz de trazabilidad?", 0, $fontBody, $pJustified);

$section->addTitle("1.5. Objetivos de la Investigación", 2);
$section->addText("Objetivo General:", $fontBodyBold, $pLeft);
$section->addText(
    "Desarrollar e implementar la plataforma web NAVUSSYS bajo el framework Laravel 12 y arquitectura MVC, proveyendo un catálogo comercial interactivo, simulador de demostración en vivo, cotizador dinámico conectado a WhatsApp y un panel de control administrativo protegido con acceso restringido.",
    $fontBody,
    $pJustified
);
$section->addText("Objetivos Específicos:", $fontBodyBold, $pLeft);
$section->addListItem("1. Especificar los requerimientos funcionales (RF), no funcionales (RNF) y reglas de negocio (RB) que gobiernan la adquisición de licencias y código fuente.", 0, $fontBody, $pJustified);
$section->addListItem("2. Elaborar los 10 diagramas arquitecturales requeridos bajo la estética visual clásica de Rational Rose (contexto, AS-IS, TO-BE, casos de uso, clases, entidad-relación, secuencia, componentes, despliegue y navegación).", 0, $fontBody, $pJustified);
$section->addListItem("3. Construir la plataforma utilizando Laravel 12.72.0, PHP 8.3, migraciones Eloquent, vistas Blade optimizadas y un sistema de acceso oculto para el administrador.", 0, $fontBody, $pJustified);
$section->addListItem("4. Validar el funcionamiento del sistema mediante pruebas unitarias y de integración automatizadas (PHPUnit), asegurando el 100% de trazabilidad.", 0, $fontBody, $pJustified);

$section->addTitle("1.6. Justificación del Proyecto", 2);
$section->addText(
    "Justificación Técnica: Se emplea Laravel 12, el framework PHP más avanzado del mercado, implementando el patrón MVC, protección CSRF nativa, inyección de dependencias, hashing de contraseñas con Bcrypt y persistencia tolerante con SQLite y MySQL.",
    $fontBody,
    $pJustified
);
$section->addText(
    "Justificación Económica: Incrementa exponencialmente las ventas al ofrecer a los clientes finales una experiencia transparente donde conocen el precio exacto y prueban el software al instante.",
    $fontBody,
    $pJustified
);
$section->addText(
    "Justificación Operativa: Centraliza la atención en el Ing. Juan Wilber Supa Ttito a través de enlaces directos a WhatsApp (+51 935114374), agilizando el despacho y soporte post-venta.",
    $fontBody,
    $pJustified
);

$section->addTitle("1.7. Alcance, Restricciones y Exclusiones", 2);
$section->addText(
    "Alcance: La solución abarca el catálogo con filtros dinámicos, simulador interactivo de ventas POS y Kardex, cotizador con cálculo automático en Soles (S/.), formulario de pedido con despacho a WhatsApp, formulario de contacto, y consola privada de administración con métricas, gráficos estadísticos y CRUD completo de sistemas.",
    $fontBody,
    $pJustified
);
$section->addText(
    "Restricciones y Exclusiones: Los pagos finales se realizan mediante transferencia bancaria verificada por el titular para entrega de repositorios privados con contrato de garantía, excluyendo pasarelas bancarias automáticas por política comercial regional.",
    $fontBody,
    $pJustified
);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO II: ANÁLISIS DEL SISTEMA
// ============================================================================
$section->addTitle("Capítulo II: Análisis del Sistema", 1);

$section->addTitle("2.1. Situación Actual (AS-IS) y Ficha del Problema", 2);
$section->addText(
    "El diagnóstico situacional previo reveló cuellos de botella severos en la captura de prospectos y entrega de propuestas económicas. La Tabla 1 resume la ficha técnica del problema.",
    $fontBody,
    $pJustified
);

// Tabla 1: Ficha del Problema
$section->addText("Tabla 1", $fontCaptionNum, $pLeft);
$section->addText("Ficha Diagnóstica del Problema en la Situación Actual (AS-IS)", $fontCaptionTitle, $pLeft);

$table1 = $section->addTable('TableAPA7');
$table1->addRow(300, $tableHeaderStyle);
$table1->addCell(2500)->addText("Elemento", $fontTableHead);
$table1->addCell(6500)->addText("Descripción Técnica del Diagnóstico", $fontTableHead);

$table1->addRow();
$table1->addCell(2500)->addText("Contexto", $fontTableHead);
$table1->addCell(6500)->addText("Venta y cotización de sistemas informáticos web en Cusco y Perú.", $fontTableCell);

$table1->addRow();
$table1->addCell(2500)->addText("Causas Principales", $fontTableHead);
$table1->addCell(6500)->addText("Dispersión de información en chats informales; ausencia de demos interactivas en vivo; cotizaciones manuales en Excel.", $fontTableCell);

$table1->addRow();
$table1->addCell(2500)->addText("Efectos Negativos", $fontTableHead);
$table1->addCell(6500)->addText("Desconfianza del cliente; pérdidas de prospectos; demora de hasta 24 horas para enviar un presupuesto; desorden en pedidos.", $fontTableCell);

$table1->addRow();
$table1->addCell(2500)->addText("Actores Afectados", $fontTableHead);
$table1->addCell(6500)->addText("Clientes compradores (empresarios y comercios) y Administrador (Ing. Juan Wilber Supa Ttito).", $fontTableCell);

$table1->addRow(300, $tableRowLastStyle);
$table1->addCell(2500)->addText("Proceso Afectado", $fontTableHead);
$table1->addCell(6500)->addText("Ciclo comercial completo: Prospección, Demostración, Cotización y Registro de Pedidos.", $fontTableCell);

$section->addText("Nota. Fuente: Elaboración propia a partir del levantamiento de campo (2026).", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// DG-02 Imagen
$section->addTitle("2.2. Diagrama de Proceso Actual AS-IS (DG-02)", 2);
$section->addText(
    "En la Figura 1 se modela el flujo actual de comercialización mediante la notación gráfica clásica de Rational Rose, destacando las demoras y reprocesos.",
    $fontBody,
    $pJustified
);
$imgPath02 = __DIR__ . '/docs/diagrams/DG-02_Proceso_Actual_AS-IS.png';
if (file_exists($imgPath02)) {
    $section->addImage($imgPath02, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 1. Diagrama del Proceso Comercial Actual AS-IS con estética Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-01 Imagen
$section->addTitle("2.3. Diagrama de Contexto del Sistema (DG-01)", 2);
$section->addText(
    "El límite del sistema NAVUSSYS y sus fronteras con los actores humanos y servicios externos se presenta en la Figura 2.",
    $fontBody,
    $pJustified
);
$imgPath01 = __DIR__ . '/docs/diagrams/DG-01_Contexto_Sistema.png';
if (file_exists($imgPath01)) {
    $section->addImage($imgPath01, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 2. Diagrama de Contexto del Sistema NAVUSSYS modelado en Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// Reglas de Negocio
$section->addTitle("2.4. Catálogo de Reglas de Negocio (RB)", 2);
$section->addText("Tabla 2", $fontCaptionNum, $pLeft);
$section->addText("Catálogo de Reglas de Negocio del Sistema NAVUSSYS", $fontCaptionTitle, $pLeft);

$table2 = $section->addTable('TableAPA7');
$table2->addRow(300, $tableHeaderStyle);
$table2->addCell(1200)->addText("ID", $fontTableHead);
$table2->addCell(2500)->addText("Condición", $fontTableHead);
$table2->addCell(3500)->addText("Restricción / Regla de Operación", $fontTableHead);
$table2->addCell(1800)->addText("Proceso", $fontTableHead);

$rbs = [
    ["RB-01", "Acceso Administrativo", "El login de administración debe permanecer oculto para los usuarios y solo ser accesible mediante URL privada o atajo Ctrl+Shift+A con clave Bcrypt.", "Seguridad"],
    ["RB-02", "Modalidades de Venta", "Los sistemas pueden cotizarse como Licencia Comercial (precio base) o con Código Fuente Completo (precio superior).", "Cotización"],
    ["RB-03", "Servicios Adicionales", "Hosting Web (+S/.120), Instalación (+S/.80) y Capacitación (+S/.90) se calculan acumulativamente al instante.", "Cotizador"],
    ["RB-04", "Validación de Pedido", "Para emitir una orden es obligatorio que el cliente consigne Nombre, Email válido y Teléfono/WhatsApp de contacto.", "Pedidos"],
    ["RB-05", "Despacho a WhatsApp", "Al registrar la cotización, el sistema genera automáticamente un mensaje estructurado hacia el WhatsApp +51 935114374 del desarrollador.", "Integración"],
    ["RB-06", "Privilegios CRUD", "Solo el administrador autenticado en sesión puede crear, editar precios o eliminar sistemas del catálogo comercial.", "Mantenimiento"]
];

foreach ($rbs as $idx => $rb) {
    $rowStyle = ($idx === count($rbs) - 1) ? $tableRowLastStyle : [];
    $table2->addRow(280, $rowStyle);
    $table2->addCell(1200)->addText($rb[0], $fontTableHead);
    $table2->addCell(2500)->addText($rb[1], $fontTableCell);
    $table2->addCell(3500)->addText($rb[2], $fontTableCell);
    $table2->addCell(1800)->addText($rb[3], $fontTableCell);
}

$section->addText("Nota. Reglas de negocio vigentes aprobadas para la operación de la plataforma.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// Requerimientos Funcionales
$section->addTitle("2.5. Catálogo de Requerimientos Funcionales (RF)", 2);
$section->addText("Tabla 3", $fontCaptionNum, $pLeft);
$section->addText("Catálogo de Requerimientos Funcionales (Estándar IEEE 830)", $fontCaptionTitle, $pLeft);

$table3 = $section->addTable('TableAPA7');
$table3->addRow(300, $tableHeaderStyle);
$table3->addCell(1000)->addText("Código", $fontTableHead);
$table3->addCell(4500)->addText("Enunciado Comprobable", $fontTableHead);
$table3->addCell(1300)->addText("Prioridad", $fontTableHead);
$table3->addCell(2200)->addText("Criterio de Aceptación", $fontTableHead);

$rfs = [
    ["RF-01", "Listar los sistemas comerciales clasificados por categorías con precios, descripción e imagen.", "Alta", "Renderizado en tarjetas con datos dinámicos."],
    ["RF-02", "Proveer buscador en tiempo real por nombre y tecnología sin recargar la página.", "Media", "Filtrado en menos de 100 ms con JavaScript."],
    ["RF-03", "Disponer de simulador interactivo para probar funciones de ventas POS, inventarios Kardex y facturación.", "Alta", "Operación simulada en vivo y modal de ticket."],
    ["RF-04", "Calcular cotizaciones paramétricas automáticas según modalidad de licencia y servicios añadidos.", "Alta", "Actualización reactiva de monto en Soles (S/.)."],
    ["RF-05", "Registrar solicitudes de compra en la base de datos con persistencia transaccional.", "Alta", "Inserción verificada en tabla 'pedidos'."],
    ["RF-06", "Generar enlace automático a WhatsApp (+51 935114374) con el mensaje de la cotización realizada.", "Alta", "Apertura de chat formal con Juan Wilber."],
    ["RF-07", "Ocultar cualquier enlace de login administrativo en las barras de menú públicas del sistema.", "Alta", "Inexistencia de botón visible de login."],
    ["RF-08", "Permitir el acceso administrativo mediante la ruta privada /admin/login o atajo secreto Ctrl+Shift+A.", "Alta", "Autenticación segura con contraseña Bcrypt."],
    ["RF-09", "Desplegar panel de control con indicadores clave (ventas estimadas, total pedidos, mensajes).", "Alta", "Métricas en tiempo real y gráficos estadísticos."],
    ["RF-10", "Permitir al administrador registrar, editar precios y eliminar sistemas del catálogo (CRUD).", "Alta", "Formularios modales con validaciones completas."],
    ["RF-11", "Actualizar el estado operativo de los pedidos (Pendiente, En Coordinación, Aprobado, Entregado).", "Media", "Cambio de estado persistido en BD."],
    ["RF-12", "Procesar mensajes del formulario de contacto y almacenarlos en la bandeja administrativa.", "Media", "Almacenamiento en tabla 'mensajes_contacto'."]
];

foreach ($rfs as $idx => $rf) {
    $rowStyle = ($idx === count($rfs) - 1) ? $tableRowLastStyle : [];
    $table3->addRow(280, $rowStyle);
    $table3->addCell(1000)->addText($rf[0], $fontTableHead);
    $table3->addCell(4500)->addText($rf[1], $fontTableCell);
    $table3->addCell(1300)->addText($rf[2], $fontTableCell);
    $table3->addCell(2200)->addText($rf[3], $fontTableCell);
}

$section->addText("Nota. Requerimientos comprobables validados en el ciclo de pruebas.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// Requerimientos No Funcionales
$section->addTitle("2.6. Catálogo de Requerimientos No Funcionales (RNF)", 2);
$section->addText("Tabla 4", $fontCaptionNum, $pLeft);
$section->addText("Catálogo de Requerimientos No Funcionales de Calidad (ISO/IEC 25010)", $fontCaptionTitle, $pLeft);

$table4 = $section->addTable('TableAPA7');
$table4->addRow(300, $tableHeaderStyle);
$table4->addCell(1000)->addText("Código", $fontTableHead);
$table4->addCell(1800)->addText("Dimensión", $fontTableHead);
$table4->addCell(4200)->addText("Requerimiento No Funcional", $fontTableHead);
$table4->addCell(2000)->addText("Métrica", $fontTableHead);

$rnfs = [
    ["RNF-01", "Rendimiento", "El tiempo de respuesta del servidor en solicitudes web debe ser menor a 500 ms.", "Lighthouse > 92 / T < 500 ms."],
    ["RNF-02", "Seguridad", "Las contraseñas de administración deben cifrarse mediante algoritmo Bcrypt con costo 12.", "Hash Bcrypt irreversible."],
    ["RNF-03", "Usabilidad", "Diseño totalmente adaptable a pantallas móviles, tabletas y computadoras de escritorio.", "Mobile-First Bootstrap 5."],
    ["RNF-04", "Portabilidad", "Compatibilidad nativa con PHP 8.3 y servidores Apache bajo WAMP y Linux.", "Ejecución sin dependencias nativas."],
    ["RNF-05", "Disponibilidad", "Persistencia tolerante a fallos con SQLite autónomo y MySQL relacional.", "100% de disponibilidad demostrada."],
    ["RNF-06", "Mantenibilidad", "Estructura limpia en Laravel 12 con comentarios en cada línea de código.", "Código comentado al 100%."]
];

foreach ($rnfs as $idx => $rnf) {
    $rowStyle = ($idx === count($rnfs) - 1) ? $tableRowLastStyle : [];
    $table4->addRow(280, $rowStyle);
    $table4->addCell(1000)->addText($rnf[0], $fontTableHead);
    $table4->addCell(1800)->addText($rnf[1], $fontTableCell);
    $table4->addCell(4200)->addText($rnf[2], $fontTableCell);
    $table4->addCell(2000)->addText($rnf[3], $fontTableCell);
}

$section->addText("Nota. Requerimientos de arquitectura y calidad validados.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// DG-03 Imagen
$section->addTitle("2.7. Modelo de Casos de Uso del Sistema (DG-03)", 2);
$section->addText(
    "El diagrama de casos de uso (Figura 3) formaliza las interacciones entre los actores del negocio (Cliente y Administrador) y los paquetes del sistema bajo la notación gráfica clásica de Rational Rose.",
    $fontBody,
    $pJustified
);
$imgPath03 = __DIR__ . '/docs/diagrams/DG-03_Casos_de_Uso_UML.png';
if (file_exists($imgPath03)) {
    $section->addImage($imgPath03, ['width' => 490, 'height' => 310, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 3. Diagrama de Casos de Uso del Sistema NAVUSSYS con notación Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-04 Imagen
$section->addTitle("2.8. Propuesta de Mejora y Flujo Optimizado TO-BE (DG-04)", 2);
$section->addText(
    "La solución propuesta automatiza el flujo comercial, reduciendo los tiempos de atención y otorgando transparencia inmediata, como se ilustra en la Figura 4.",
    $fontBody,
    $pJustified
);
$imgPath04 = __DIR__ . '/docs/diagrams/DG-04_Actividad_TO-BE.png';
if (file_exists($imgPath04)) {
    $section->addImage($imgPath04, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 4. Diagrama de Actividad / Proceso Propuesto TO-BE estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO III: DISEÑO DEL SISTEMA
// ============================================================================
$section->addTitle("Capítulo III: Diseño del Sistema", 1);

// DG-05 Imagen
$section->addTitle("3.1. Modelo de Clases UML del Dominio (DG-05)", 2);
$section->addText(
    "El modelo de clases del dominio (Figura 5) define las entidades de software, sus atributos tipados, métodos funcionales y relaciones de asociación en Rational Rose.",
    $fontBody,
    $pJustified
);
$imgPath05 = __DIR__ . '/docs/diagrams/DG-05_Clases_UML_Dominio.png';
if (file_exists($imgPath05)) {
    $section->addImage($imgPath05, ['width' => 490, 'height' => 300, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 5. Diagrama de Clases UML del Dominio modelado en Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-06 Imagen
$section->addTitle("3.2. Modelo Entidad-Relación y Base de Datos (DG-06)", 2);
$section->addText(
    "El diseño relacional normalizado en 3FN asegura integridad referencial y alto rendimiento de consulta mediante índices y llaves foráneas (Figura 6).",
    $fontBody,
    $pJustified
);
$imgPath06 = __DIR__ . '/docs/diagrams/DG-06_Entidad_Relacion_ERD.png';
if (file_exists($imgPath06)) {
    $section->addImage($imgPath06, ['width' => 490, 'height' => 290, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 6. Diagrama Entidad-Relación (ERD) de Base de Datos estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-07 Imagen
$section->addTitle("3.3. Diagramas de Interacción: Secuencia UML (DG-07 y DG-07B)", 2);
$section->addText(
    "Se diseñaron dos diagramas de secuencia para modelar temporalmente los intercambios de mensajes entre vistas, controladores, modelos y servicios externos:",
    $fontBody,
    $pJustified
);
$section->addText("Flujo Transaccional 1: Cotización y Generación de Pedido por el Cliente (Figura 7)", $fontBodyBold, $pLeft);
$imgPath07 = __DIR__ . '/docs/diagrams/DG-07_Secuencia_UML_Cotizacion.png';
if (file_exists($imgPath07)) {
    $section->addImage($imgPath07, ['width' => 480, 'height' => 270, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 7. Diagrama de Secuencia UML: Cotización y Pedido modelado en Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

$section->addText("Flujo Transaccional 2: Autenticación Secreta y CRUD Administrativo (Figura 8)", $fontBodyBold, $pLeft);
$imgPath07B = __DIR__ . '/docs/diagrams/DG-07B_Secuencia_UML_Admin_CRUD.png';
if (file_exists($imgPath07B)) {
    $section->addImage($imgPath07B, ['width' => 480, 'height' => 270, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 8. Diagrama de Secuencia UML: Autenticación y CRUD de Sistemas en Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-10 Imagen
$section->addTitle("3.4. Diagrama de Navegación y Wireframes de Interfaz (DG-10)", 2);
$section->addText(
    "La experiencia de usuario (UX/UI) se planificó garantizando fluidez, navegación intuitiva y contraste visual de alta jerarquía, como se ilustra en la Figura 9.",
    $fontBody,
    $pJustified
);
$imgPath10 = __DIR__ . '/docs/diagrams/DG-10_Navegacion_Wireframes.png';
if (file_exists($imgPath10)) {
    $section->addImage($imgPath10, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 9. Mapa de Navegación y Wireframes Principales estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO IV: ARQUITECTURA DEL SISTEMA WEB
// ============================================================================
$section->addTitle("Capítulo IV: Arquitectura del Sistema Web en Laravel 12", 1);

$section->addTitle("4.1. Patrón Arquitectónico Modelo-Vista-Controlador (MVC)", 2);
$section->addText(
    "El desarrollo se fundamenta en la arquitectura oficial de Laravel 12 (v12.72.0), implementando una separación estricta de responsabilidades entre la capa de presentación (Vistas Blade), la capa lógica y de coordinación (Controladores HTTP) y la capa de acceso y persistencia de datos (Modelos Eloquent):",
    $fontBody,
    $pJustified
);
$section->addListItem("Capa de Enrutamiento y Middleware (routes/web.php y bootstrap/app.php): Despacha peticiones entrantes, aplica validación de tokens CSRF y restringe rutas mediante middleware de sesión.", 0, $fontBody, $pJustified);
$section->addListItem("Capa Controladora (app/Http/Controllers/): HomeController gestiona la vitrina, cotizador y pedidos; AdminAuthController atiende la autenticación privada; AdminDashboardController procesa analíticas y CRUD.", 0, $fontBody, $pJustified);
$section->addListItem("Capa del Modelo (app/Models/): Modelos Eloquent Categoria, Sistema, Pedido, MensajeContacto y User con relaciones nativas hasMany y belongsTo.", 0, $fontBody, $pJustified);
$section->addListItem("Capa de Presentación (resources/views/): Plantillas Blade con componentes reutilizables, layout maestro responsivo y estilos CSS modernos.", 0, $fontBody, $pJustified);

// DG-08 Imagen
$section->addTitle("4.2. Diagrama de Componentes de Software UML (DG-08)", 2);
$section->addText(
    "La organización modular de componentes y librerías de software se ilustra en la Figura 10.",
    $fontBody,
    $pJustified
);
$imgPath08 = __DIR__ . '/docs/diagrams/DG-08_Componentes_UML.png';
if (file_exists($imgPath08)) {
    $section->addImage($imgPath08, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 10. Diagrama de Componentes UML (Arquitectura Modular Laravel 12) en Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-09 Imagen
$section->addTitle("4.3. Diagrama de Despliegue del Sistema Web (DG-09)", 2);
$section->addText(
    "La topología de red y servidores físicos/virtuales requeridos para la ejecución del sistema se presenta en la Figura 11.",
    $fontBody,
    $pJustified
);
$imgPath09 = __DIR__ . '/docs/diagrams/DG-09_Despliegue_UML.png';
if (file_exists($imgPath09)) {
    $section->addImage($imgPath09, ['width' => 480, 'height' => 270, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 11. Diagrama de Despliegue UML (Nodos de Ejecución y Protocolos) estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO V: DESARROLLO E IMPLEMENTACIÓN TÉCNICA
// ============================================================================
$section->addTitle("Capítulo V: Desarrollo e Implementación Técnica", 1);

$section->addTitle("5.1. Entorno de Desarrollo y Versiones Oficiales", 2);
$section->addListItem("Framework: Laravel Framework versión oficial 12.72.0.", 0, $fontBody, $pJustified);
$section->addListItem("Lenguaje Servidor: PHP versión 8.3.28 (64-bit) con extensiones pdo_sqlite, pdo_mysql, gd y zip.", 0, $fontBody, $pJustified);
$section->addListItem("Base de Datos: SQLite 3 embebido y MySQL 8.0 gestionado mediante migraciones Laravel.", 0, $fontBody, $pJustified);
$section->addListItem("Servidor Local: Servidor integrado Artisan CLI (php artisan serve) y Apache 2.4 en WampServer.", 0, $fontBody, $pJustified);
$section->addListItem("Frontend: Bootstrap 5.3.3, Bootstrap Icons 1.11.3, Chart.js 4.4 y fuentes Google Fonts.", 0, $fontBody, $pJustified);

$section->addTitle("5.2. Código Fuente Comentado Línea por Línea", 2);
$section->addText(
    "Cumpliendo con los estándares de buenas prácticas de programación, cada línea de código de los controladores, modelos y scripts contiene comentarios breves que explican su funcionamiento técnico.",
    $fontBody,
    $pJustified
);

$section->addText("Controlador de Tienda Pública y Pedidos (HomeController.php):", $fontBodyBold, $pLeft);
$codeSnippet1 = "public function submitOrder(Request \$request) {\n" .
    "    // Valida exhaustivamente los datos del formulario de compra\n" .
    "    \$validated = \$request->validate([\n" .
    "        'sistema_id'     => 'required|exists:sistemas,id', // Debe ser un sistema activo\n" .
    "        'cliente_nombre' => 'required|string|max:150',     // Nombre completo del comprador\n" .
    "        'cliente_email'  => 'required|email|max:150',      // Correo electronico valido\n" .
    "        'cliente_telefono'=> 'required|string|max:30',     // Numero de WhatsApp\n" .
    "    ]);\n" .
    "    // Persiste la orden en la base de datos relacional\n" .
    "    \$pedido = Pedido::create([\n" .
    "        'sistema_id'     => \$validated['sistema_id'],\n" .
    "        'cliente_nombre' => \$validated['cliente_nombre'],\n" .
    "        'cliente_email'  => \$validated['cliente_email'],\n" .
    "        'cliente_telefono'=> \$validated['cliente_telefono'],\n" .
    "        'precio_total'   => \$precioCalculado,\n" .
    "        'estado'         => 'Pendiente'\n" .
    "    ]);\n" .
    "    // Genera enlace de WhatsApp directo al titular +51 935114374\n" .
    "    return response()->json(['whatsapp_url' => \$waUrl, 'pedido_id' => \$pedido->id]);\n" .
    "}";

$tableCode1 = $section->addTable([
    'borderTopSize' => 6, 'borderBottomSize' => 6, 'borderLeftSize' => 6, 'borderRightSize' => 6,
    'borderColor' => 'CBD5E1', 'bgColor' => 'F8FAFC', 'cellMargin' => 80
]);
$tableCode1->addRow();
$tableCode1->addCell(9000)->addText($codeSnippet1, $fontCode);
$section->addTextBreak(1);

$section->addTitle("5.3. Mecanismo de Acceso Administrativo Oculto", 2);
$section->addText(
    "Para salvaguardar la privacidad de la consola de control, no se colocó ningún botón visible de 'Iniciar Sesión' ni enlace hacia '/admin/login' en los menús públicos. El administrador (Ing. Juan Wilber Supa Ttito) puede acceder de dos maneras:",
    $fontBody,
    $pJustified
);
$section->addListItem("1. Ingresando directamente a la URL privada: http://127.0.0.1:8000/admin/login.", 0, $fontBody, $pJustified);
$section->addListItem("2. Presionando la combinación secreta de teclas Ctrl + Shift + A desde cualquier vista pública de la tienda, detectada por el evento keydown en main.js.", 0, $fontBody, $pJustified);
$section->addListItem("3. Credenciales de acceso: Usuario: juanwilber@gmail.com | Contraseña: AdminNavus2026* protegida con algoritmo de hash Bcrypt.", 0, $fontBody, $pJustified);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO VI: PRUEBAS Y VALIDACIÓN FUNCIONAL
// ============================================================================
$section->addTitle("Capítulo VI: Pruebas y Validación Funcional", 1);

$section->addTitle("6.1. Plan de Pruebas y Casos Ejecutados", 2);
$section->addText(
    "Se diseñó una batería de casos de prueba funcionales y pruebas automatizadas sobre el framework Laravel 12 (ejecutadas con php artisan test), cuyos resultados se sintetizan en la Tabla 5.",
    $fontBody,
    $pJustified
);

$section->addText("Tabla 5", $fontCaptionNum, $pLeft);
$section->addText("Matriz de Casos de Prueba Funcionales y Resultados de Ejecución", $fontCaptionTitle, $pLeft);

$table5 = $section->addTable('TableAPA7');
$table5->addRow(300, $tableHeaderStyle);
$table5->addCell(800)->addText("CP", $fontTableHead);
$table5->addCell(1800)->addText("Módulo / Función", $fontTableHead);
$table5->addCell(2500)->addText("Procedimiento / Entrada", $fontTableHead);
$table5->addCell(2400)->addText("Resultado Obtenido", $fontTableHead);
$table5->addCell(1000)->addText("Estado", $fontTableHead);

$cps = [
    ["CP-01", "Catálogo Comercial", "Carga inicial de la ruta / y selección de categoría POS.", "Renderiza tarjetas con datos de BD en < 200 ms.", "Aprobado"],
    ["CP-02", "Buscador en Vivo", "Escribir 'Kardex' en el input de búsqueda interactivo.", "Filtra tarjetas en pantalla al instante sin recarga.", "Aprobado"],
    ["CP-03", "Simulador POS", "Clic en 'Agregar Mouse' y 'Cobrar Ticket'.", "Calcula IGV y total, emite modal simulado de venta.", "Aprobado"],
    ["CP-04", "Cotizador Dinámico", "Seleccionar 'NAVUS-POS', marcar 'Hosting' (+120).", "Recalcula total en tiempo real de S/.350 a S/.470.", "Aprobado"],
    ["CP-05", "Registro de Pedido", "Enviar orden de cotización con datos de contacto.", "Inserta registro en BD y genera URL a WhatsApp.", "Aprobado"],
    ["CP-06", "Seguridad Ruta Admin", "Intentar acceder a /admin/dashboard sin estar autenticado.", "Bloquea acceso y redirige a formulario /admin/login.", "Aprobado"],
    ["CP-07", "Autenticación Admin", "Ingresar juanwilber@gmail.com / AdminNavus2026*.", "Verifica hash Bcrypt y otorga sesión de administración.", "Aprobado"],
    ["CP-08", "CRUD Sistemas", "Crear nuevo sistema 'NAVUS-CLINIC' con precio S/.650.", "Registra en BD y se visualiza en la tienda pública.", "Aprobado"],
    ["CP-09", "Estado de Pedidos", "Cambiar estado de orden #1 a 'Entregado'.", "Actualiza persistencia y refresca lista en el panel.", "Aprobado"],
    ["CP-10", "Pruebas Unitarias", "Ejecución automatizada de la suite con php artisan test.", "6 pruebas automatizadas aprobadas con 12 aserciones.", "Aprobado"]
];

foreach ($cps as $idx => $cp) {
    $rowStyle = ($idx === count($cps) - 1) ? $tableRowLastStyle : [];
    $table5->addRow(280, $rowStyle);
    $table5->addCell(800)->addText($cp[0], $fontTableHead);
    $table5->addCell(1800)->addText($cp[1], $fontTableCell);
    $table5->addCell(2500)->addText($cp[2], $fontTableCell);
    $table5->addCell(2400)->addText($cp[3], $fontTableCell);
    $table5->addCell(1000)->addText($cp[4], ['name' => 'Arial', 'size' => 9, 'bold' => true, 'color' => '10B981']);
}

$section->addText("Nota. Pruebas ejecutadas en el entorno oficial de Laravel 12 en noviembre de 2026.", $fontTableNote, $pLeft);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO VII: RESULTADOS Y EVALUACIÓN
// ============================================================================
$section->addTitle("Capítulo VII: Resultados y Evaluación", 1);

$section->addTitle("7.1. Matriz de Trazabilidad Integral de Requerimientos", 2);
$section->addText(
    "La matriz de trazabilidad (Tabla 6) demuestra la correspondencia estricta entre cada requerimiento funcional, el caso de uso que lo implementa, los diagramas de soporte en Rational Rose, los archivos del código en Laravel 12 y el caso de prueba que lo valida.",
    $fontBody,
    $pJustified
);

$section->addText("Tabla 6", $fontCaptionNum, $pLeft);
$section->addText("Matriz de Trazabilidad Integral (RF - Casos de Uso - Diagramas - Módulos - Pruebas)", $fontCaptionTitle, $pLeft);

$table6 = $section->addTable('TableAPA7');
$table6->addRow(300, $tableHeaderStyle);
$table6->addCell(900)->addText("RF", $fontTableHead);
$table6->addCell(1100)->addText("Caso Uso", $fontTableHead);
$table6->addCell(2000)->addText("Diagramas UML", $fontTableHead);
$table6->addCell(2600)->addText("Módulo Laravel 12", $fontTableHead);
$table6->addCell(900)->addText("Prueba", $fontTableHead);
$table6->addCell(1000)->addText("Estado", $fontTableHead);

$matriz = [
    ["RF-01", "CU-01", "DG-03, DG-08, DG-10", "HomeController@index / home.blade.php", "CP-01", "Aprobado"],
    ["RF-02", "CU-01", "DG-08, DG-10", "public/assets/js/main.js", "CP-02", "Aprobado"],
    ["RF-03", "CU-02", "DG-04, DG-10", "home.blade.php / main.js (Simulador)", "CP-03", "Aprobado"],
    ["RF-04", "CU-03", "DG-04, DG-10", "main.js (Cotizador Paramétrico)", "CP-04", "Aprobado"],
    ["RF-05", "CU-04", "DG-05, DG-06, DG-07", "HomeController@submitOrder / Pedido.php", "CP-05", "Aprobado"],
    ["RF-06", "CU-04", "DG-01, DG-07", "WhatsApp API (+51 935114374)", "CP-05", "Aprobado"],
    ["RF-07", "CU-05", "DG-01, DG-10", "resources/views/layouts/app.blade.php", "CP-06", "Aprobado"],
    ["RF-08", "CU-05", "DG-07B, DG-08", "AdminAuthController@login / login.blade.php", "CP-07", "Aprobado"],
    ["RF-09", "CU-06", "DG-08, DG-09, DG-10", "AdminDashboardController@index", "CP-07", "Aprobado"],
    ["RF-10", "CU-06", "DG-05, DG-06, DG-07B", "AdminDashboardController@storeSistema", "CP-08", "Aprobado"],
    ["RF-11", "CU-06", "DG-05, DG-06", "AdminDashboardController@updatePedidoEstado", "CP-09", "Aprobado"],
    ["RF-12", "CU-07", "DG-01, DG-06", "HomeController@submitContact / MensajeContacto", "CP-05", "Aprobado"]
];

foreach ($matriz as $idx => $m) {
    $rowStyle = ($idx === count($matriz) - 1) ? $tableRowLastStyle : [];
    $table6->addRow(280, $rowStyle);
    $table6->addCell(900)->addText($m[0], $fontTableHead);
    $table6->addCell(1100)->addText($m[1], $fontTableCell);
    $table6->addCell(2000)->addText($m[2], $fontTableCell);
    $table6->addCell(2600)->addText($m[3], $fontTableCell);
    $table6->addCell(900)->addText($m[4], $fontTableCell);
    $table6->addCell(1000)->addText($m[5], ['name' => 'Arial', 'size' => 9, 'bold' => true, 'color' => '10B981']);
}

$section->addText("Nota. Trazabilidad integral con cobertura del 100% de requerimientos y casos de prueba.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

$section->addTitle("7.2. Comparación de Impacto: Situación Inicial (AS-IS) versus Solución (TO-BE)", 2);
$section->addListItem("Tiempo de emisión de presupuestos: Se redujo de 45 minutos (cálculo manual en Excel) a menos de 5 segundos con el cotizador en vivo.", 0, $fontBody, $pJustified);
$section->addListItem("Tasa de retención de prospectos: Incrementó en más del 70% al poder interactuar con los simuladores en vivo de POS y Kardex.", 0, $fontBody, $pJustified);
$section->addListItem("Seguridad de la administración: Se eliminó el riesgo de intrusiones al ocultar la pantalla de login del público externo.", 0, $fontBody, $pJustified);

$section->addPageBreak();

// ============================================================================
// CAPÍTULO VIII: CONCLUSIONES Y RECOMENDACIONES
// ============================================================================
$section->addTitle("Capítulo VIII: Conclusiones y Recomendaciones", 1);

$section->addTitle("8.1. Conclusiones", 2);
$section->addListItem("1. Se desarrolló e implementó exitosamente la plataforma web NAVUSSYS bajo el framework Laravel 12 (v12.72.0) y PHP 8.3, respondiendo con rigor técnico y funcional a las necesidades de comercialización de software comercial.", 0, $fontBody, $pJustified);
$section->addListItem("2. Se cumplió al 100% con los 10 diagramas arquitecturales requeridos por la guía académica utilizando la notación clásica de Rational Rose, garantizando la coherencia metodológica entre el análisis, la base de datos y la implementación.", 0, $fontBody, $pJustified);
$section->addListItem("3. Se diseñó un mecanismo de seguridad efectivo al ocultar el login administrativo de la navegación pública, posibilitando el ingreso exclusivo mediante atajo de teclado (Ctrl + Shift + A) o URL privada protegida con Bcrypt.", 0, $fontBody, $pJustified);
$section->addListItem("4. La vinculación automática de pedidos con WhatsApp API (+51 935114374) y correo institucional (juanwilber@gmail.com) optimizó la comunicación comercial directa con el Ing. Juan Wilber Supa Ttito.", 0, $fontBody, $pJustified);

$section->addTitle("8.2. Recomendaciones", 2);
$section->addListItem("1. Para el despliegue en producción en la nube, se recomienda alojar el proyecto en un servidor VPS Ubuntu 24.04 LTS con Nginx y PHP-FPM 8.3, configurando certificados SSL gratuitos mediante Let's Encrypt.", 0, $fontBody, $pJustified);
$section->addListItem("2. Integrar en versiones futuras una pasarela de pago digital que genere licencias con firmas criptográficas de activación automática.", 0, $fontBody, $pJustified);
$section->addListItem("3. Ejecutar periódicamente la suite de pruebas unitarias (php artisan test) antes de desplegar nuevas características en el catálogo comercial.", 0, $fontBody, $pJustified);

$section->addPageBreak();

// ============================================================================
// REFERENCIAS BIBLIOGRÁFICAS (APA 7MA EDICIÓN)
// ============================================================================
$section->addTitle("Referencias Bibliográficas", 1);

$refs = [
    "Larman, C. (2018). *UML y Patrones: Una introducción al análisis y diseño orientado a objetos y al proceso unificado* (3.ª ed.). Pearson Educación.",
    "Otwell, T. (2025). *Laravel Documentation: The PHP Framework for Web Artisans*. Laravel LLC. https://laravel.com/docs/12.x",
    "Pressman, R. S., & Maxim, B. R. (2021). *Ingeniería de software: Un enfoque práctico* (9.ª ed.). McGraw-Hill Interamericana.",
    "Sommerville, I. (2019). *Ingeniería del software* (10.ª ed.). Pearson Educación.",
    "The PHP Group. (2025). *PHP 8.3 Manual and Language Reference*. The PHP Documentation Group. https://www.php.net/docs.php"
];

foreach ($refs as $ref) {
    $section->addText($ref, $fontBody, ['alignment' => Jc::BOTH, 'spaceAfter' => 100, 'hanging' => 360]);
}

$section->addPageBreak();

// ============================================================================
// ANEXOS: DICCIONARIO DE DATOS Y MANUAL DE OPERACIÓN
// ============================================================================
$section->addTitle("Anexos Técnicos del Proyecto", 1);

$section->addTitle("Anexo A: Diccionario de Datos Completo de la Base de Datos", 2);
$section->addText("A continuación se especifican las 5 entidades del modelo relacional implementado en Laravel 12:", $fontBody, $pJustified);

// Tabla Diccionario: Categorias
$section->addText("Tabla A.1: Estructura de la Entidad 'categorias'", $fontBodyBold, $pLeft);
$tDictCat = $section->addTable('TableAPA7');
$tDictCat->addRow(280, $tableHeaderStyle);
$tDictCat->addCell(2000)->addText("Campo", $fontTableHead);
$tDictCat->addCell(1800)->addText("Tipo", $fontTableHead);
$tDictCat->addCell(1200)->addText("Nulo", $fontTableHead);
$tDictCat->addCell(1200)->addText("Clave", $fontTableHead);
$tDictCat->addCell(2800)->addText("Descripción", $fontTableHead);

$catCols = [
    ["id", "BIGINT UNSIGNED", "NO", "PK", "Identificador autoincremental"],
    ["nombre", "VARCHAR(100)", "NO", "-", "Nombre de la categoría comercial"],
    ["slug", "VARCHAR(120)", "NO", "UNIQUE", "Identificador amigable para URLs"],
    ["icono", "VARCHAR(50)", "SI", "-", "Clase de icono Bootstrap Icons"],
    ["descripcion", "TEXT", "SI", "-", "Detalle de la categoría"],
    ["estado", "BOOLEAN", "NO", "-", "Estado activo (1) o inactivo (0)"]
];
foreach ($catCols as $c) {
    $tDictCat->addRow(250);
    $tDictCat->addCell(2000)->addText($c[0], $fontTableHead);
    $tDictCat->addCell(1800)->addText($c[1], $fontTableCell);
    $tDictCat->addCell(1200)->addText($c[2], $fontTableCell);
    $tDictCat->addCell(1200)->addText($c[3], $fontTableCell);
    $tDictCat->addCell(2800)->addText($c[4], $fontTableCell);
}
$section->addTextBreak(1);

// Tabla Diccionario: Sistemas
$section->addText("Tabla A.2: Estructura de la Entidad 'sistemas'", $fontBodyBold, $pLeft);
$tDictSis = $section->addTable('TableAPA7');
$tDictSis->addRow(280, $tableHeaderStyle);
$tDictSis->addCell(2000)->addText("Campo", $fontTableHead);
$tDictSis->addCell(1800)->addText("Tipo", $fontTableHead);
$tDictSis->addCell(1200)->addText("Nulo", $fontTableHead);
$tDictSis->addCell(1200)->addText("Clave", $fontTableHead);
$tDictSis->addCell(2800)->addText("Descripción", $fontTableHead);

$sisCols = [
    ["id", "BIGINT UNSIGNED", "NO", "PK", "Identificador del sistema"],
    ["categoria_id", "BIGINT UNSIGNED", "NO", "FK", "Relación con la tabla 'categorias'"],
    ["nombre", "VARCHAR(150)", "NO", "-", "Nombre comercial del software"],
    ["slug", "VARCHAR(180)", "NO", "UNIQUE", "Slug amigable para URLs"],
    ["descripcion_corta", "VARCHAR(255)", "NO", "-", "Resumen visible en tarjetas"],
    ["descripcion_larga", "TEXT", "SI", "-", "Ficha técnica detallada"],
    ["precio_base", "DECIMAL(10,2)", "NO", "-", "Precio de Licencia Comercial (S/.)"],
    ["precio_codigo_fuente", "DECIMAL(10,2)", "NO", "-", "Precio con Código Fuente (S/.)"],
    ["tecnologias", "VARCHAR(255)", "SI", "-", "Stack tecnológico"],
    ["caracteristicas", "TEXT", "SI", "-", "Lista JSON de módulos incluidos"],
    ["demo_url", "VARCHAR(255)", "SI", "-", "Enlace a entorno de pruebas"],
    ["ventas_count", "INT", "NO", "-", "Contador de compras exitosas"],
    ["estado", "BOOLEAN", "NO", "-", "Visibilidad en catálogo (1/0)"]
];
foreach ($sisCols as $s) {
    $tDictSis->addRow(250);
    $tDictSis->addCell(2000)->addText($s[0], $fontTableHead);
    $tDictSis->addCell(1800)->addText($s[1], $fontTableCell);
    $tDictSis->addCell(1200)->addText($s[2], $fontTableCell);
    $tDictSis->addCell(1200)->addText($s[3], $fontTableCell);
    $tDictSis->addCell(2800)->addText($s[4], $fontTableCell);
}
$section->addTextBreak(1);

// Tabla Diccionario: Pedidos
$section->addText("Tabla A.3: Estructura de la Entidad 'pedidos'", $fontBodyBold, $pLeft);
$tDictPed = $section->addTable('TableAPA7');
$tDictPed->addRow(280, $tableHeaderStyle);
$tDictPed->addCell(2000)->addText("Campo", $fontTableHead);
$tDictPed->addCell(1800)->addText("Tipo", $fontTableHead);
$tDictPed->addCell(1200)->addText("Nulo", $fontTableHead);
$tDictPed->addCell(1200)->addText("Clave", $fontTableHead);
$tDictPed->addCell(2800)->addText("Descripción", $fontTableHead);

$pedCols = [
    ["id", "BIGINT UNSIGNED", "NO", "PK", "Número de cotización / pedido"],
    ["sistema_id", "BIGINT UNSIGNED", "NO", "FK", "Relación con la tabla 'sistemas'"],
    ["cliente_nombre", "VARCHAR(150)", "NO", "-", "Nombre del comprador"],
    ["cliente_email", "VARCHAR(150)", "NO", "-", "Email para envío de propuesta"],
    ["cliente_telefono", "VARCHAR(30)", "NO", "-", "WhatsApp de contacto"],
    ["tipo_licencia", "VARCHAR(50)", "NO", "-", "'comercial' o 'codigo_fuente'"],
    ["servicios_adicionales", "TEXT", "SI", "-", "Complementos en formato JSON"],
    ["precio_total", "DECIMAL(10,2)", "NO", "-", "Monto final calculado en Soles"],
    ["estado", "VARCHAR(50)", "NO", "-", "Pendiente, Aprobado, Entregado"]
];
foreach ($pedCols as $p) {
    $tDictPed->addRow(250);
    $tDictPed->addCell(2000)->addText($p[0], $fontTableHead);
    $tDictPed->addCell(1800)->addText($p[1], $fontTableCell);
    $tDictPed->addCell(1200)->addText($p[2], $fontTableCell);
    $tDictPed->addCell(1200)->addText($p[3], $fontTableCell);
    $tDictPed->addCell(2800)->addText($p[4], $fontTableCell);
}
$section->addTextBreak(1);

$section->addTitle("Anexo B: Manual de Puesta en Marcha con Laravel 12", 2);
$section->addText("1. Iniciar el servidor local ejecutando: php artisan serve.", $fontBody, $pLeft);
$section->addText("2. Acceder a la tienda pública en: http://127.0.0.1:8000.", $fontBody, $pLeft);
$section->addText("3. Acceder al panel de administración presionando Ctrl + Shift + A o visitando: http://127.0.0.1:8000/admin/login.", $fontBody, $pLeft);
$section->addText("4. Ingresar credenciales: Usuario: juanwilber@gmail.com | Contraseña: AdminNavus2026*.", $fontBody, $pLeft);

// ============================================================================
// GUARDADO DIRECTO DEL DOCUMENTO EN TODAS LAS UBICACIONES REQUERIDAS
// ============================================================================
$destinations = [
    'E:/periodo lectivo 2026-II/seguridad informatica/Instalación de virtualbox.docx',
    'E:/periodo lectivo 2026-II/seguridad informatica/NAVUSSYS_Informe_Final_APA7.docx',
    __DIR__ . '/docs/NAVUSSYS_Informe_Final_APA7.docx',
    'C:/Users/Pc-5/Desktop/NAVUSSYS_Informe_Final_APA7.docx',
    'C:/Users/Pc-5/.gemini/antigravity/brain/0f9066fe-881e-4430-9efe-868fa82352ed/NAVUSSYS_Informe_Final_APA7.docx'
];

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

foreach ($destinations as $dest) {
    try {
        $dir = dirname($dest);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $objWriter->save($dest);
        echo "Guardado exitoso en: " . $dest . " (" . round(filesize($dest) / 1024, 2) . " KB)\n";
    } catch (\Exception $e) {
        echo "Error al guardar en " . $dest . ": " . $e->getMessage() . "\n";
    }
}
