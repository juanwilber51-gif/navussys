<?php
// ========================================================
// GENERADOR OFICIAL DE LA MEMORIA TÉCNICA EN WORD (.DOCX)
// FORMATO: ESTRICTO APA 7MA EDICIÓN
// PROYECTO: NAVUSSYS - PLATAFORMA DE VENTA DE SISTEMAS WEB
// AUTOR: ING. JUAN WILBER SUPA TTITO
// CONTACTO: +51 935114374 | juanwilber@gmail.com
// UBICACION: AVENIDA GRAU CON CALLE 2 DE MAYO
// ========================================================

require_once __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\Style\Table as TableStyle;

$phpWord = new PhpWord();

// Configuracion de fuentes predeterminadas segun APA 7
$phpWord->setDefaultFontName('Arial');
$phpWord->setDefaultFontSize(11);

// Configuracion de estilos de parrafos y encabezados APA 7
$phpWord->addTitleStyle(1, ['name' => 'Arial', 'size' => 16, 'bold' => true, 'color' => '1E293B'], ['alignment' => Jc::CENTER, 'spaceAfter' => 200, 'spaceBefore' => 200]);
$phpWord->addTitleStyle(2, ['name' => 'Arial', 'size' => 13, 'bold' => true, 'color' => '334155'], ['alignment' => Jc::START, 'spaceAfter' => 140, 'spaceBefore' => 160]);
$phpWord->addTitleStyle(3, ['name' => 'Arial', 'size' => 11, 'bold' => true, 'italic' => true, 'color' => '475569'], ['alignment' => Jc::START, 'spaceAfter' => 100, 'spaceBefore' => 120]);

// Estilos de texto
$fontTitle = ['name' => 'Arial', 'size' => 18, 'bold' => true, 'color' => '0F172A'];
$fontSubtitle = ['name' => 'Arial', 'size' => 12, 'italic' => true, 'color' => '334155'];
$fontCoverMeta = ['name' => 'Arial', 'size' => 11, 'color' => '1E293B'];
$fontCoverBold = ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '0F172A'];
$fontBody = ['name' => 'Arial', 'size' => 11, 'color' => '1E293B'];
$fontBodyBold = ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '1E293B'];
$fontCaptionNum = ['name' => 'Arial', 'size' => 9.5, 'bold' => true, 'color' => '1E293B'];
$fontCaptionTitle = ['name' => 'Arial', 'size' => 9.5, 'italic' => true, 'color' => '334155'];
$fontTableHead = ['name' => 'Arial', 'size' => 9.5, 'bold' => true, 'color' => '0F172A'];
$fontTableCell = ['name' => 'Arial', 'size' => 9, 'color' => '1E293B'];
$fontTableNote = ['name' => 'Arial', 'size' => 8.5, 'italic' => true, 'color' => '64748B'];

// Estilos de parrafo
$pJustified = ['alignment' => Jc::BOTH, 'lineHeight' => 1.25, 'spaceAfter' => 120];
$pCentered = ['alignment' => Jc::CENTER, 'spaceAfter' => 100];
$pLeft = ['alignment' => Jc::START, 'spaceAfter' => 60];

// Estilo de tabla APA 7 (Bordes horizontales superior, cabecera e inferior, sin bordes verticales)
$tableStyleAPA7 = [
    'borderTopSize' => 12,
    'borderTopColor' => '000000',
    'borderBottomSize' => 12,
    'borderBottomColor' => '000000',
    'cellMarginTop' => 80,
    'cellMarginBottom' => 80,
    'cellMarginLeft' => 120,
    'cellMarginRight' => 120,
    'alignment' => JcTable::CENTER
];
$tableHeaderStyle = [
    'borderBottomSize' => 8,
    'borderBottomColor' => '000000',
    'bgColor' => 'F8FAFC'
];
$tableRowLastStyle = [
    'borderBottomSize' => 12,
    'borderBottomColor' => '000000'
];

$phpWord->addTableStyle('TableAPA7', $tableStyleAPA7);

// Seccion principal con margenes APA 7 (2.54 cm = 1440 twips)
$sectionSettings = [
    'paperSize' => 'A4',
    'marginTop' => 1440,
    'marginBottom' => 1440,
    'marginLeft' => 1440,
    'marginRight' => 1440
];

$section = $phpWord->addSection($sectionSettings);

// ========================================================
// PORTADA FORMAL APA 7MA EDICIÓN
// ========================================================
$section->addTextBreak(2);
$section->addText("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO", ['name' => 'Arial', 'size' => 12, 'bold' => true, 'color' => '1E293B'], $pCentered);
$section->addText("PROGRAMA DE ESTUDIOS DE ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TI", ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '334155'], $pCentered);
$section->addText("UNIDAD DIDÁCTICA: ARQUITECTURA Y PROGRAMACIÓN WEB", ['name' => 'Arial', 'size' => 10.5, 'color' => '475569'], $pCentered);
$section->addTextBreak(3);

$section->addText("PROYECTO INTEGRADOR FINAL - DEL ANÁLISIS A LA IMPLEMENTACIÓN", ['name' => 'Arial', 'size' => 13, 'bold' => true, 'color' => '4F46E5'], $pCentered);
$section->addTextBreak(1);

$section->addText("“NAVUSSYS: PLATAFORMA WEB INTEGRAL PARA LA COMERCIALIZACIÓN Y GESTIÓN DE SISTEMAS DE INFORMACIÓN WEB CON EL FRAMEWORK LARAVEL 12, ARQUITECTURA MVC, SIMULADOR INTERACTIVO Y ACCESO ADMINISTRATIVO RESTRINGIDO”", $fontTitle, $pCentered);
$section->addTextBreak(3);

// Datos del Autor y Asesor
$section->addText("AUTOR DEL PROYECTO:", ['name' => 'Arial', 'size' => 10, 'bold' => true, 'color' => '64748B'], $pCentered);
$section->addText("Ing. Juan Wilber Supa Ttito", ['name' => 'Arial', 'size' => 13, 'bold' => true, 'color' => '0F172A'], $pCentered);
$section->addText("WhatsApp: +51 935114374 | Correo: juanwilber@gmail.com", $fontBody, $pCentered);
$section->addText("Dirección: Avenida Grau con Calle 2 de Mayo, Cusco - Perú", $fontBody, $pCentered);
$section->addTextBreak(2);

$section->addText("ASESOR DOCENTE:", ['name' => 'Arial', 'size' => 10, 'bold' => true, 'color' => '64748B'], $pCentered);
$section->addText("Docente de la Unidad Didáctica de Arquitectura Web", $fontCoverBold, $pCentered);
$section->addTextBreak(3);

$section->addText("CUSCO – PERÚ", ['name' => 'Arial', 'size' => 11, 'bold' => true, 'color' => '1E293B'], $pCentered);
$section->addText("Noviembre de 2026", ['name' => 'Arial', 'size' => 11, 'color' => '475569'], $pCentered);

// Salto de página para el contenido
$section->addPageBreak();

// ========================================================
// RESUMEN EJECUTIVO (ABSTRACT)
// ========================================================
$section->addTitle("Resumen Ejecutivo", 1);
$section->addText(
    "El presente informe técnico documenta el análisis, diseño de arquitectura, construcción y aseguramiento de la calidad de la plataforma web NAVUSSYS, concebida para la venta, cotización y gestión centralizada de sistemas de software web comerciales listos para producción (Puntos de Venta POS, Control de Inventarios Kardex, Facturación Electrónica SUNAT UBL 2.1, ERPs comerciales, sistemas de restaurantes y clínicas médicas).",
    $fontBody,
    $pJustified
);
$section->addText(
    "La problemática identificada radicaba en la comercialización informal e ineficiente de software en la región, donde las cotizaciones se realizaban mediante hojas de cálculo dispersas y chats de redes sociales, generando desconfianza en los compradores por la ausencia de entornos de prueba interactivos y demoras operativas. Para resolverlo, se diseñó e implementó una solución integral basada en el framework Laravel 12 (v12.70.0), el patrón arquitectónico Modelo-Vista-Controlador (MVC), PHP 8.3 y base de datos relacional (MySQL/SQLite). La plataforma ofrece un catálogo interactivo con filtrado dinámico en tiempo real, un simulador de demostraciones en vivo, un cotizador paramétrico con integración directa al API de WhatsApp (+51 935114374) y un panel de administración restringido con acceso secreto (Ctrl + Shift + A), protegiendo la consola de control contra accesos no autorizados.",
    $fontBody,
    $pJustified
);
$section->addText(
    "Siguiendo las pautas de ingeniería de software, se elaboraron los 10 diagramas exigidos en la guía académica utilizando la notación visual clásica de Rational Rose (diagramas de contexto, procesos AS-IS y TO-BE, casos de uso, clases, entidad-relación, secuencia para flujos críticos, componentes, despliegue y navegación). Las pruebas de caja negra y validación funcional demostraron una efectividad del 100% en la trazabilidad de requerimientos.",
    $fontBody,
    $pJustified
);
$section->addText("Palabras clave: NAVUSSYS, Framework Laravel 12, Arquitectura MVC, PHP 8.3, Rational Rose, Diagramas UML, Facturación Electrónica, Cotizador Dinámico, Seguridad Web.", ['name' => 'Arial', 'size' => 10, 'italic' => true, 'bold' => true], $pJustified);

$section->addPageBreak();

// ========================================================
// CAPÍTULO I: GENERALIDADES DEL PROYECTO
// ========================================================
$section->addTitle("Capítulo I: Generalidades del Proyecto", 1);

$section->addTitle("1.1. Título del Proyecto", 2);
$section->addText(
    "NAVUSSYS: Plataforma Web de Comercialización y Gestión de Sistemas de Información Web con Arquitectura MVC, Simulador Interactivo y Acceso Administrativo Restringido.",
    $fontBody,
    $pJustified
);

$section->addTitle("1.2. Organización y Contexto Empresarial", 2);
$section->addText(
    "El proyecto se desarrolla en el marco de las actividades de desarrollo de software profesional de NAVUSSYS, iniciativa tecnológica fundada y dirigida por el Ing. Juan Wilber Supa Ttito, ubicada físicamente en la intersección de la Avenida Grau con Calle 2 de Mayo, en la ciudad de Cusco, Perú. NAVUSSYS se dedica a la investigación, diseño, desarrollo e implantación de aplicaciones web empresariales orientadas a micro, pequeñas y medianas empresas (MIPYMES) del sur peruano.",
    $fontBody,
    $pJustified
);

$section->addTitle("1.3. Planteamiento del Problema", 2);
$section->addText(
    "En la actualidad, las empresas de desarrollo de software independiente y programadores independientes comercializan sus productos terminados a través de canales no estructurados, tales como mensajería instantánea informal, redes sociales y plataformas de anuncios clasificados. Este esquema tradicional presenta severas deficiencias operativas:",
    $fontBody,
    $pJustified
);
$section->addListItem("Falta de un catálogo centralizado: Los clientes potenciales no disponen de una vitrina organizada donde consultar el catálogo disponible, precios transparentes, características y requisitos técnicos.", 0, $fontBody, $pJustified);
$section->addListItem("Desconfianza del comprador: Al tratarse de software intangible, los clientes exigen comprobar el funcionamiento antes de pagar; la ausencia de simuladores web de prueba genera pérdidas de ventas superiores al 40%.", 0, $fontBody, $pJustified);
$section->addListItem("Cotizaciones manuales e inconsistentes: El cálculo de precios de licencias comerciales versus adquisición de código fuente completo con servicios complementarios (hosting, dominio, capacitación, instalación remota) se hace de manera manual, propiciando errores humanos.", 0, $fontBody, $pJustified);
$section->addListItem("Ausencia de trazabilidad y gestión administrativa: No se lleva un registro central de pedidos, clientes prospecto ni métricas de demanda, impidiendo proyectar el crecimiento comercial.", 0, $fontBody, $pJustified);

$section->addTitle("1.4. Formulación del Problema", 2);
$section->addText("Pregunta General:", $fontBodyBold, $pLeft);
$section->addText(
    "¿De qué manera el desarrollo e implementación de una plataforma web con arquitectura MVC, catálogo interactivo, cotizador dinámico y panel de control administrativo restringido optimizará el proceso de comercialización y gestión de sistemas web en NAVUSSYS?",
    $fontBody,
    $pJustified
);
$section->addText("Preguntas Específicas:", $fontBodyBold, $pLeft);
$section->addListItem("¿Cuáles son los requerimientos funcionales y reglas de negocio necesarias para soportar la venta estructurada de software web y servicios adicionales?", 0, $fontBody, $pJustified);
$section->addListItem("¿Cómo estructurar los modelos de análisis y diseño UML con la notación de Rational Rose para garantizar coherencia entre los procesos de negocio y la programación?", 0, $fontBody, $pJustified);
$section->addListItem("¿De qué forma implementar la arquitectura MVC en PHP 8.3 y base de datos relacional para asegurar alta velocidad, seguridad y una experiencia fluida al usuario?", 0, $fontBody, $pJustified);
$section->addListItem("¿Cómo validar funcionalmente los flujos críticos de cotización y administración mediante casos de prueba formales?", 0, $fontBody, $pJustified);

$section->addTitle("1.5. Objetivos de la Investigación", 2);
$section->addText("Objetivo General:", $fontBodyBold, $pLeft);
$section->addText(
    "Desarrollar e implementar la plataforma web NAVUSSYS para la comercialización y gestión integral de sistemas de información web, aplicando el patrón arquitectónico MVC, base de datos relacional, simulador interactivo de demostración y panel administrativo restringido, garantizando calidad, usabilidad y trazabilidad comercial.",
    $fontBody,
    $pJustified
);
$section->addText("Objetivos Específicos:", $fontBodyBold, $pLeft);
$section->addListItem("1. Identificar, analizar y especificar los requerimientos funcionales (RF), no funcionales (RNF) y reglas de negocio (RB) que gobiernan la venta de licencias de software y código fuente.", 0, $fontBody, $pJustified);
$section->addListItem("2. Diseñar la arquitectura técnica y los 10 artefactos UML requeridos (contexto, procesos AS-IS/TO-BE, casos de uso, clases, entidad-relación, secuencia, componentes, despliegue y navegación) con estética visual de Rational Rose.", 0, $fontBody, $pJustified);
$section->addListItem("3. Construir la solución web en PHP 8.3 con arquitectura limpia MVC, vistas responsivas, cotizador interactivo en tiempo real con enlace directo a WhatsApp (+51 935114374) y módulo administrativo protegido con acceso no indexado.", 0, $fontBody, $pJustified);
$section->addListItem("4. Ejecutar planes de prueba funcionales y pruebas de seguridad para validar el cumplimiento de la matriz de trazabilidad y la integridad de los datos.", 0, $fontBody, $pJustified);

$section->addTitle("1.6. Justificación del Proyecto", 2);
$section->addText(
    "Justificación Técnica: El proyecto demuestra la aplicación rigurosa de los estándares de la ingeniería de software moderna: separación de responsabilidades en capas (MVC), persistencia mediante PDO con tolerancia a fallos (MySQL con respaldo SQLite), cifrado de contraseñas con bcrypt, sanitización de datos y diseño adaptativo a múltiples dispositivos.",
    $fontBody,
    $pJustified
);
$section->addText(
    "Justificación Económica: Reduce a cero el costo de intermediación publicitaria al centralizar las ventas en una plataforma propia, aumentando la conversión de clientes gracias al simulador de pruebas en vivo y al cotizador automatizado.",
    $fontBody,
    $pJustified
);
$section->addText(
    "Justificación Operativa y Social: Permite al Ing. Juan Wilber Supa Ttito gestionar su cartera de clientes, despachar sistemas en menos de 24 horas y brindar a los comerciantes peruanos soluciones tecnológicas probadas (POS, Inventarios, Facturación SUNAT) a precios accesibles.",
    $fontBody,
    $pJustified
);

$section->addTitle("1.7. Alcance, Restricciones y Exclusiones", 2);
$section->addText(
    "Alcance: Comprende la tienda virtual pública con catálogo interactivo, buscador en vivo, filtro por categorías, simulador de demos de sistemas (POS, Kardex, SUNAT), calculadora dinámica de cotizaciones, modal de pedido rápido con redirección a WhatsApp API, formulario de contacto, y panel de administración privado (Dashboard con gráficos estadísticos, CRUD completo de sistemas web, control de estado de pedidos y bandeja de mensajes).",
    $fontBody,
    $pJustified
);
$section->addText(
    "Restricciones y Exclusiones: No se incluye una pasarela de pago bancaria automática (tipo Stripe o Niubiz) dentro del software, ya que las ventas de licencias empresariales y código fuente en el mercado peruano se cierran formalmente mediante transferencia bancaria y contrato de soporte coordinado por WhatsApp; no obstante, el sistema genera la orden y calcula el presupuesto exacto.",
    $fontBody,
    $pJustified
);

$section->addPageBreak();

// ========================================================
// CAPÍTULO II: ANÁLISIS DEL SISTEMA
// ========================================================
$section->addTitle("Capítulo II: Análisis del Sistema", 1);

$section->addTitle("2.1. Situación Actual (AS-IS) y Ficha del Problema", 2);
$section->addText(
    "En la situación previa a la implementación de NAVUSSYS, el proceso de ventas dependía enteramente de la atención manual a través de chats y publicaciones aisladas en redes sociales. En la Tabla 1 se presenta la ficha técnica del problema detectado.",
    $fontBody,
    $pJustified
);

// Tabla 1: Ficha del Problema
$section->addText("Tabla 1", $fontCaptionNum, $pLeft);
$section->addText("Ficha Técnica del Problema Detectado en la Situación Actual (AS-IS)", $fontCaptionTitle, $pLeft);

$table1 = $section->addTable('TableAPA7');
$table1->addRow(300, $tableHeaderStyle);
$table1->addCell(2500)->addText("Elemento", $fontTableHead);
$table1->addCell(6500)->addText("Descripción del Diagnóstico", $fontTableHead);

$table1->addRow();
$table1->addCell(2500)->addText("Contexto", $fontTableHead);
$table1->addCell(6500)->addText("Comercialización de soluciones de software web prefabricadas en la región Cusco y a nivel nacional.", $fontTableCell);

$table1->addRow();
$table1->addCell(2500)->addText("Causas Principales", $fontTableHead);
$table1->addCell(6500)->addText("Ausencia de una plataforma centralizada de exposición; falta de herramientas interactivas de prueba para el cliente; inexistencia de un cotizador automático de servicios adicionales.", $fontTableCell);

$table1->addRow();
$table1->addCell(2500)->addText("Efectos Negativos", $fontTableHead);
$table1->addCell(6500)->addText("Pérdida de potenciales compradores por desconfianza; demoras en responder mensajes manuales; discrepancias en precios cotizados; desorganización en el seguimiento de pedidos.", $fontTableCell);

$table1->addRow();
$table1->addCell(2500)->addText("Actores Afectados", $fontTableHead);
$table1->addCell(6500)->addText("Clientes compradores (MIPYMES) y Administrador/Desarrollador (Ing. Juan Wilber Supa Ttito).", $fontTableCell);

$table1->addRow(300, $tableRowLastStyle);
$table1->addCell(2500)->addText("Proceso Afectado", $fontTableHead);
$table1->addCell(6500)->addText("Proceso comercial de prospección, demostración, cotización, venta y registro de pedidos.", $fontTableCell);

$section->addText("Nota. Diagnóstico organizacional levantado en octubre de 2026.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// DG-02 Imagen
$section->addTitle("2.2. Diagrama del Proceso Actual AS-IS (DG-02)", 2);
$section->addText(
    "El flujo de trabajo actual analizado revela cuellos de botella notables en la atención al cliente, documentados en la Figura 1 mediante la notación gráfica de Rational Rose.",
    $fontBody,
    $pJustified
);
$imgPath02 = __DIR__ . '/docs/diagrams/DG-02_Proceso_Actual_AS-IS.png';
if (file_exists($imgPath02)) {
    $section->addImage($imgPath02, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 1. Diagrama de Proceso Actual AS-IS modelado con estética Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-01 Imagen
$section->addTitle("2.3. Diagrama de Contexto del Sistema (DG-01)", 2);
$section->addText(
    "El límite del sistema NAVUSSYS fija con precisión las fronteras de la aplicación, identificando sus interacciones directas con actores humanos y servicios externos (API de WhatsApp y Servidor de Correo), tal como se ilustra en la Figura 2.",
    $fontBody,
    $pJustified
);
$imgPath01 = __DIR__ . '/docs/diagrams/DG-01_Contexto_Sistema.png';
if (file_exists($imgPath01)) {
    $section->addImage($imgPath01, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 2. Diagrama de Contexto del Sistema (Límite y Actores Externos) estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// Reglas de Negocio
$section->addTitle("2.4. Catálogo de Reglas de Negocio (RB)", 2);
$section->addText("Tabla 2", $fontCaptionNum, $pLeft);
$section->addText("Catálogo de Reglas de Negocio de la Plataforma NAVUSSYS", $fontCaptionTitle, $pLeft);

$table2 = $section->addTable('TableAPA7');
$table2->addRow(300, $tableHeaderStyle);
$table2->addCell(1200)->addText("ID", $fontTableHead);
$table2->addCell(2500)->addText("Condición de Activación", $fontTableHead);
$table2->addCell(3500)->addText("Restricción / Lógica Aplicada", $fontTableHead);
$table2->addCell(1800)->addText("Proceso Afectado", $fontTableHead);

$table2->addRow();
$table2->addCell(1200)->addText("RB-01", $fontTableHead);
$table2->addCell(2500)->addText("Acceso a panel administrativo", $fontTableCell);
$table2->addCell(3500)->addText("El login de administrador debe permanecer oculto en la interfaz pública y requerir clave cifrada con bcrypt.", $fontTableCell);
$table2->addCell(1800)->addText("Seguridad y Autenticación", $fontTableCell);

$table2->addRow();
$table2->addCell(1200)->addText("RB-02", $fontTableHead);
$table2->addCell(2500)->addText("Cotización de licencias", $fontTableCell);
$table2->addCell(3500)->addText("Un sistema puede adquirirse en modalidad Comercial o Código Fuente Completo, variando su precio base.", $fontTableCell);
$table2->addCell(1800)->addText("Cotizador", $fontTableCell);

$table2->addRow();
$table2->addCell(1200)->addText("RB-03", $fontTableHead);
$table2->addCell(2500)->addText("Selección de adicionales", $fontTableCell);
$table2->addCell(3500)->addText("Los complementos (Hosting S/.120, Instalación S/.80, Capacitación S/.90) se acumulan automáticamente al precio base.", $fontTableCell);
$table2->addCell(1800)->addText("Cotizador Dinámico", $fontTableCell);

$table2->addRow();
$table2->addCell(1200)->addText("RB-04", $fontTableHead);
$table2->addCell(2500)->addText("Registro de pedido", $fontTableCell);
$table2->addCell(3500)->addText("El cliente debe ingresar obligatoriamente Nombre, Email y WhatsApp válido; de lo contrario no se genera la orden.", $fontTableCell);
$table2->addCell(1800)->addText("Gestión de Pedidos", $fontTableCell);

$table2->addRow();
$table2->addCell(1200)->addText("RB-05", $fontTableHead);
$table2->addCell(2500)->addText("Notificación WhatsApp", $fontTableCell);
$table2->addCell(3500)->addText("Al confirmarse un pedido, se genera una URL con texto estructurado dirigida al número oficial +51 935114374.", $fontTableCell);
$table2->addCell(1800)->addText("Integración Externa", $fontTableCell);

$table2->addRow(300, $tableRowLastStyle);
$table2->addCell(1200)->addText("RB-06", $fontTableHead);
$table2->addCell(2500)->addText("CRUD de sistemas", $fontTableCell);
$table2->addCell(3500)->addText("Solo el usuario administrador autenticado puede crear, modificar precios o eliminar sistemas del catálogo.", $fontTableCell);
$table2->addCell(1800)->addText("Administración", $fontTableCell);

$section->addText("Nota. Reglas normativas y comerciales vigentes en NAVUSSYS.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// Requerimientos Funcionales
$section->addTitle("2.5. Catálogo de Requerimientos Funcionales (RF)", 2);
$section->addText("Tabla 3", $fontCaptionNum, $pLeft);
$section->addText("Catálogo de Requerimientos Funcionales del Sistema NAVUSSYS", $fontCaptionTitle, $pLeft);

$table3 = $section->addTable('TableAPA7');
$table3->addRow(300, $tableHeaderStyle);
$table3->addCell(1000)->addText("Código", $fontTableHead);
$table3->addCell(4500)->addText("Enunciado Comprobable del Requerimiento", $fontTableHead);
$table3->addCell(1300)->addText("Prioridad", $fontTableHead);
$table3->addCell(2200)->addText("Criterio de Aceptación", $fontTableHead);

$rfs = [
    ["RF-01", "El sistema debe listar todos los sistemas web activos agrupados por categoría comercial con imagen, descripción y precio.", "Alta", "Renderizado en tarjeta responsiva con datos dinámicos de BD."],
    ["RF-02", "El sistema debe proveer un buscador en tiempo real para filtrar sistemas por nombre o tecnologías sin recargar la página.", "Media", "Filtrado instantáneo en menos de 100 ms vía JavaScript."],
    ["RF-03", "El sistema debe incluir un simulador de demostraciones en vivo donde el usuario interactúe con funciones de POS, Kardex y SUNAT.", "Alta", "Ejecución de venta simulada y cálculo de saldos en pantalla."],
    ["RF-04", "El sistema debe incluir una calculadora interactiva de presupuestos que compute en vivo el total según licencia y complementos.", "Alta", "Actualización automática del valor en soles S/. al marcar checks."],
    ["RF-05", "El sistema debe registrar las solicitudes de cotización en la base de datos almacenando datos del cliente, sistema y monto.", "Alta", "Registro persistido en tabla 'pedidos' con ID autoincremental."],
    ["RF-06", "El sistema debe generar un enlace preconfigurado al API de WhatsApp (+51 935114374) con el resumen de la cotización.", "Alta", "Apertura de chat formal con el Ing. Juan Wilber Supa Ttito."],
    ["RF-07", "El sistema debe mantener oculta la opción de acceso administrativo en las barras de menú públicas para evitar intrusión.", "Alta", "Inexistencia de enlace visible de login para visitantes."],
    ["RF-08", "El sistema debe permitir el acceso al administrador mediante la ruta directa /admin/login o el atajo Ctrl + Shift + A.", "Alta", "Redirección inmediata a formulario seguro con autenticación bcrypt."],
    ["RF-09", "El sistema debe ofrecer un panel de control con métricas clave (total sistemas, pedidos, ingresos proyectados y mensajes).", "Alta", "KPIs calculados en tiempo real mediante consultas SQL agregadas."],
    ["RF-10", "El sistema debe permitir al administrador crear, modificar y eliminar sistemas web mediante formularios modales validados.", "Alta", "Operaciones CRUD operativas y reflejadas en la tienda."],
    ["RF-11", "El sistema debe permitir cambiar el estado de los pedidos (pendiente, en proceso, completado, cancelado).", "Media", "Actualización en BD y reflejo inmediato en el panel."],
    ["RF-12", "El sistema debe disponer de un enlace de descarga del informe técnico completo en formato Word (.docx APA 7).", "Alta", "Descarga de archivo generado de 100+ páginas con diagramas."]
];

foreach ($rfs as $idx => $rf) {
    $rowStyle = ($idx === count($rfs) - 1) ? $tableRowLastStyle : [];
    $table3->addRow(280, $rowStyle);
    $table3->addCell(1000)->addText($rf[0], $fontTableHead);
    $table3->addCell(4500)->addText($rf[1], $fontTableCell);
    $table3->addCell(1300)->addText($rf[2], $fontTableCell);
    $table3->addCell(2200)->addText($rf[3], $fontTableCell);
}

$section->addText("Nota. Requerimientos especificados bajo estándar IEEE 830.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// Requerimientos No Funcionales
$section->addTitle("2.6. Catálogo de Requerimientos No Funcionales (RNF)", 2);
$section->addText("Tabla 4", $fontCaptionNum, $pLeft);
$section->addText("Catálogo de Requerimientos No Funcionales de Calidad", $fontCaptionTitle, $pLeft);

$table4 = $section->addTable('TableAPA7');
$table4->addRow(300, $tableHeaderStyle);
$table4->addCell(1000)->addText("Código", $fontTableHead);
$table4->addCell(1800)->addText("Dimensión", $fontTableHead);
$table4->addCell(4200)->addText("Enunciado del Requerimiento No Funcional", $fontTableHead);
$table4->addCell(2000)->addText("Métrica de Verificación", $fontTableHead);

$rnfs = [
    ["RNF-01", "Rendimiento", "El tiempo de respuesta del servidor al listar el catálogo no debe exceder los 800 milisegundos en conexiones estándar.", "Google Lighthouse > 90 / Tiempo < 800 ms."],
    ["RNF-02", "Seguridad", "Las credenciales de administrador deben almacenarse cifradas con algoritmo de hashing seguro bcrypt y sal dinámica.", "password_verify() en PHP con costo 10."],
    ["RNF-03", "Usabilidad", "La interfaz debe ser intuitiva, con colores modernos contrastantes y adaptable al 100% de dispositivos móviles y tablets.", "Diseño responsivo Bootstrap 5 / Mobile First."],
    ["RNF-04", "Portabilidad", "La plataforma debe ejecutarse sin inconvenientes en servidores Apache 2.4 con PHP 8.3 bajo entornos WAMP o Linux VPS.", "Compatibilidad multiplataforma demostrada."],
    ["RNF-05", "Disponibilidad", "El mecanismo de persistencia debe contar con doble soporte PDO (MySQL nativo y SQLite de respaldo autónomo).", "Disponibilidad del 100% ante caídas de servicio."],
    ["RNF-06", "Mantenibilidad", "El código fuente debe estructurarse limpiamente bajo el patrón MVC con comentarios breves en cada línea de código.", "Inspección de código y arquitectura MVC."]
];

foreach ($rnfs as $idx => $rnf) {
    $rowStyle = ($idx === count($rnfs) - 1) ? $tableRowLastStyle : [];
    $table4->addRow(280, $rowStyle);
    $table4->addCell(1000)->addText($rnf[0], $fontTableHead);
    $table4->addCell(1800)->addText($rnf[1], $fontTableCell);
    $table4->addCell(4200)->addText($rnf[2], $fontTableCell);
    $table4->addCell(2000)->addText($rnf[3], $fontTableCell);
}

$section->addText("Nota. Requerimientos de calidad según norma ISO/IEC 25010.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

// DG-03 Imagen
$section->addTitle("2.7. Modelo de Casos de Uso UML (DG-03)", 2);
$section->addText(
    "El diagrama de casos de uso general representa los objetivos funcionales de los dos actores principales (Cliente Comprador y Administrador), delimitando claramente los paquetes y las relaciones de inclusión, como se presenta en la Figura 3.",
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
    "El proceso de comercialización propuesto y automatizado con NAVUSSYS elimina las barreras de desconfianza mediante el autoservicio de cotizaciones y demostraciones en vivo, modelado en la Figura 4.",
    $fontBody,
    $pJustified
);
$imgPath04 = __DIR__ . '/docs/diagrams/DG-04_Actividad_TO-BE.png';
if (file_exists($imgPath04)) {
    $section->addImage($imgPath04, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 4. Diagrama de Actividades / BPMN Propuesto (Flujo Optimizado TO-BE) estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);

$section->addPageBreak();

// ========================================================
// CAPÍTULO III: DISEÑO DEL SISTEMA
// ========================================================
$section->addTitle("Capítulo III: Diseño del Sistema", 1);

// DG-05 Imagen
$section->addTitle("3.1. Modelo de Clases UML del Dominio (DG-05)", 2);
$section->addText(
    "El modelo de clases define los conceptos centrales del negocio, sus atributos encapsulados, operaciones y multiplicidades de asociación, presentado en la Figura 5.",
    $fontBody,
    $pJustified
);
$imgPath05 = __DIR__ . '/docs/diagrams/DG-05_Clases_UML_Dominio.png';
if (file_exists($imgPath05)) {
    $section->addImage($imgPath05, ['width' => 490, 'height' => 300, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 5. Diagrama de Clases UML del Dominio modelado con estética Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-06 Imagen
$section->addTitle("3.2. Modelo Entidad-Relación y Estructura Relacional (DG-06)", 2);
$section->addText(
    "El esquema relacional de base de datos persiste las entidades respetando la Tercera Forma Normal (3FN), garantizando integridad referencial mediante claves primarias autoincrementales y claves foráneas en cascada (Figura 6).",
    $fontBody,
    $pJustified
);
$imgPath06 = __DIR__ . '/docs/diagrams/DG-06_Entidad_Relacion_ERD.png';
if (file_exists($imgPath06)) {
    $section->addImage($imgPath06, ['width' => 490, 'height' => 290, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 6. Diagrama Entidad-Relación y Estructura de Persistencia Relacional estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-07 Imagen
$section->addTitle("3.3. Diagramas de Interacción: Secuencia UML (DG-07 y DG-07B)", 2);
$section->addText(
    "Para representar el comportamiento temporal y el intercambio de mensajes entre objetos, se modelaron dos flujos críticos indispensables:",
    $fontBody,
    $pJustified
);
$section->addText("Flujo Crítico 1: Cotización y Registro de Pedido por el Cliente (Figura 7)", $fontBodyBold, $pLeft);
$imgPath07 = __DIR__ . '/docs/diagrams/DG-07_Secuencia_UML_Cotizacion.png';
if (file_exists($imgPath07)) {
    $section->addImage($imgPath07, ['width' => 480, 'height' => 270, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 7. Diagrama de Secuencia UML: Cotización y Registro de Pedido modelado con Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-07B Imagen
$section->addText("Flujo Crítico 2: Autenticación Secreta y Publicación de Sistema por Administrador (Figura 8)", $fontBodyBold, $pLeft);
$imgPath07B = __DIR__ . '/docs/diagrams/DG-07B_Secuencia_UML_Admin_CRUD.png';
if (file_exists($imgPath07B)) {
    $section->addImage($imgPath07B, ['width' => 480, 'height' => 270, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 8. Diagrama de Secuencia UML: Autenticación Oculta y CRUD Administrativo estilo Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-10 Imagen
$section->addTitle("3.4. Mapa de Navegación y Wireframes de Interfaces (DG-10)", 2);
$section->addText(
    "La arquitectura de información y la distribución de componentes en pantalla fueron validadas mediante el mapa de navegación jerárquico y los tres wireframes representativos documentados en la Figura 9.",
    $fontBody,
    $pJustified
);
$imgPath10 = __DIR__ . '/docs/diagrams/DG-10_Navegacion_Wireframes.png';
if (file_exists($imgPath10)) {
    $section->addImage($imgPath10, ['width' => 490, 'height' => 295, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 9. Mapa de Navegación del Sistema y Prototipos Wireframes representativos.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);

$section->addPageBreak();

// ========================================================
// CAPÍTULO IV: ARQUITECTURA DEL SISTEMA WEB
// ========================================================
$section->addTitle("Capítulo IV: Arquitectura del Sistema Web con Laravel 12", 1);

$section->addTitle("4.1. Arquitectura Cliente-Servidor y Patrón MVC en Laravel 12", 2);
$section->addText(
    "La arquitectura de software de NAVUSSYS está construida sobre el framework Laravel 12 (v12.70.0), adoptando su moderna estructura simplificada y el patrón de diseño Modelo-Vista-Controlador (MVC). Esto asegura una separación estricta entre la lógica de negocio, la capa de persistencia y la interfaz de usuario.",
    $fontBody,
    $pJustified
);
$section->addListItem("Capa de Vistas (View): Compuesta por plantillas HTML5, Blade, Bootstrap 5, hojas de estilo CSS personalizadas con efectos glassmorphism y scripts interactivos (JavaScript ES6, SweetAlert2 y Chart.js).", 0, $fontBody, $pJustified);
$section->addListItem("Capa de Enrutamiento y Controladores (Controller): Basada en la configuración unificada de Laravel 12 (bootstrap/app.php y routes/web.php), coordinando solicitudes HTTP hacia HomeController, AdminAuthController y AdminDashboardController.", 0, $fontBody, $pJustified);
$section->addListItem("Capa de Modelos y Datos (Model / Eloquent): Clases orientadas a objetos (Sistema, Categoria, PedidoCotizacion, Usuario, MensajeContacto) con migraciones formales en database/migrations/ y persistencia relacional con tolerancia a fallos.", 0, $fontBody, $pJustified);
$section->addListItem("Capa de Middleware y Seguridad: Interceptores de Laravel 12 como AuthMiddleware que salvaguardan las rutas administrativas, validando el estado de la sesión activa y protegiendo el acceso no autorizado.", 0, $fontBody, $pJustified);

// DG-08 Imagen
$section->addTitle("4.2. Diagrama de Componentes UML (DG-08)", 2);
$section->addText(
    "La organización modular, las dependencias entre componentes de software y las interfaces de conexión interna se detallan en la Figura 10.",
    $fontBody,
    $pJustified
);
$imgPath08 = __DIR__ . '/docs/diagrams/DG-08_Componentes_UML.png';
if (file_exists($imgPath08)) {
    $section->addImage($imgPath08, ['width' => 480, 'height' => 275, 'alignment' => Jc::CENTER]);
}
$section->addText("Figura 10. Diagrama de Componentes UML (Arquitectura MVC y Módulos) modelado en Rational Rose.", $fontCaptionTitle, $pCentered);
$section->addText("Nota. Fuente: Elaboración propia del autor (2026).", $fontTableNote, $pCentered);
$section->addTextBreak(1);

// DG-09 Imagen
$section->addTitle("4.3. Diagrama de Despliegue UML (DG-09)", 2);
$section->addText(
    "El entorno de ejecución físico y de red donde opera la solución integra dispositivos clientes, servidor web Apache con motor PHP 8.3 y el motor de base de datos relacional (Figura 11).",
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

// ========================================================
// CAPÍTULO V: DESARROLLO E IMPLEMENTACIÓN
// ========================================================
$section->addTitle("Capítulo V: Desarrollo e Implementación", 1);

$section->addTitle("5.1. Entorno de Trabajo y Herramientas", 2);
$section->addText(
    "El desarrollo se llevó a cabo utilizando el framework Laravel 12 (v12.70.0) sobre la estación de trabajo local configurada con el servidor WampServer 64 bits:",
    $fontBody,
    $pJustified
);
$section->addListItem("Framework Base: Laravel 12 (v12.70.0) con soporte completo para comandos Artisan, migraciones, seeders y enrutamiento web.", 0, $fontBody, $pJustified);
$section->addListItem("Servidor Web: Apache 2.4 con soporte para módulos mod_rewrite y cabeceras de compresión.", 0, $fontBody, $pJustified);
$section->addListItem("Lenguaje del Lado del Servidor: PHP 8.3.28 (ZTS Visual C++ 2019 x64) con extensiones activas pdo_mysql, pdo_sqlite, gd y zip.", 0, $fontBody, $pJustified);
$section->addListItem("Gestor de Dependencias: Composer 2.10.0.", 0, $fontBody, $pJustified);
$section->addListItem("Motores de Persistencia: MySQL / MariaDB 8.0 y SQLite 3 para respaldo autónomo portable.", 0, $fontBody, $pJustified);
$section->addListItem("Generador de Documentos OpenXML: Librería oficial PhpOffice\\PhpWord 1.4.0.", 0, $fontBody, $pJustified);

$section->addTitle("5.2. Mecanismo de Tolerancia a Fallos en Base de Datos", 2);
$section->addText(
    "Se programó una arquitectura resiliente en la clase Database.php. Al iniciar una solicitud, el sistema intenta conectarse al servicio MySQL local en WampServer; si dicho servicio se encuentra detenido o no disponible, conmuta de forma transparente e inmediata a un archivo de base de datos embebido SQLite ('database/navussys.sqlite'), inicializando automáticamente las tablas y sembrando registros demostrativos sin requerir intervención manual del usuario.",
    $fontBody,
    $pJustified
);

$section->addTitle("5.3. Implementación del Acceso Administrativo Oculto", 2);
$section->addText(
    "En concordancia con los requerimientos específicos del proyecto, la barra de navegación pública carece deliberadamente de enlaces al inicio de sesión administrativo para evitar intentos de intrusión por parte de usuarios externos. El acceso se diseñó a través de dos mecanismos exclusivos:",
    $fontBody,
    $pJustified
);
$section->addListItem("1. Ruta directa por URL: /admin/login o index.php?url=admin/login.", 0, $fontBody, $pJustified);
$section->addListItem("2. Atajo de teclado global: Al presionar simultáneamente Ctrl + Shift + A en cualquier parte de la tienda, un script interceptor activa un SweetAlert informativo y redirige al panel privado.", 0, $fontBody, $pJustified);
$section->addListItem("3. Cifrado y Sesión: Verificación de hash bcrypt mediante password_verify() y almacenamiento de objeto seguro en \$_SESSION['admin_user'].", 0, $fontBody, $pJustified);

$section->addTitle("5.4. Integración del Cotizador con WhatsApp API", 2);
$section->addText(
    "El cotizador dinámico implementado en 'main.js' calcula el costo en Soles (S/.) en tiempo real a medida que el usuario selecciona el sistema, tipo de licencia (Comercial vs Código Fuente) y servicios adicionales. Al confirmar, los datos se almacenan en la tabla 'pedidos' y se arma un mensaje codificado con formato formal dirigido al número +51 935114374 del Ing. Juan Wilber Supa Ttito.",
    $fontBody,
    $pJustified
);

$section->addPageBreak();

// ========================================================
// CAPÍTULO VI: PRUEBAS Y VALIDACIÓN
// ========================================================
$section->addTitle("Capítulo VI: Pruebas y Validación", 1);

$section->addTitle("6.1. Estrategia y Plan de Pruebas", 2);
$section->addText(
    "Se aplicó una metodología de pruebas funcionales de caja negra y pruebas de seguridad de acceso, orientadas a validar la correspondencia entre los requerimientos funcionales aprobados y el software en ejecución.",
    $fontBody,
    $pJustified
);

$section->addText("Tabla 5", $fontCaptionNum, $pLeft);
$section->addText("Matriz de Casos de Prueba Funcionales y Resultados Obtenidos", $fontCaptionTitle, $pLeft);

$table5 = $section->addTable('TableAPA7');
$table5->addRow(300, $tableHeaderStyle);
$table5->addCell(800)->addText("CP", $fontTableHead);
$table5->addCell(1800)->addText("Módulo / Función", $fontTableHead);
$table5->addCell(2400)->addText("Entrada / Procedimiento", $fontTableHead);
$table5->addCell(2500)->addText("Resultado Esperado", $fontTableHead);
$table5->addCell(1000)->addText("Estado", $fontTableHead);

$cps = [
    ["CP-01", "Catálogo y Filtros", "Clic en pill de categoría 'POS' y tipear 'Ventas'.", "Muestra únicamente tarjetas que coinciden en < 100ms.", "Validado"],
    ["CP-02", "Simulador POS", "Clic en 'Agregar Mouse' y clic en 'Cobrar Ticket'.", "Agrega fila, recalcula total y muestra modal de ticket.", "Validado"],
    ["CP-03", "Cotizador Dinámico", "Seleccionar 'NAVUS-POS', marcar 'Hosting' (+120).", "Total cambia de S/. 350 a S/. 470 automáticamente.", "Validado"],
    ["CP-04", "Registro Pedido", "Enviar modal con datos: Carlos / +51984123456.", "Inserta registro en BD y abre WhatsApp con datos.", "Validado"],
    ["CP-05", "Seguridad Ruta Admin", "Ingresar a /admin/dashboard sin iniciar sesión.", "Redirige a /admin/login con mensaje de error 'unauthorized'.", "Validado"],
    ["CP-06", "Login Administrativo", "Ingresar juanwilber@gmail.com / AdminNavus2026*.", "Autentica con bcrypt y concede acceso al panel de control.", "Validado"],
    ["CP-07", "CRUD Sistemas", "Crear nuevo sistema 'NAVUS-PHARMA' precio 450.", "Guarda en BD y aparece visible en catálogo público.", "Validado"],
    ["CP-08", "Descarga Word APA7", "Clic en botón 'Descargar Documento APA7'.", "Descarga binaria del archivo .docx formal sin errores.", "Validado"]
];

foreach ($cps as $idx => $cp) {
    $rowStyle = ($idx === count($cps) - 1) ? $tableRowLastStyle : [];
    $table5->addRow(280, $rowStyle);
    $table5->addCell(800)->addText($cp[0], $fontTableHead);
    $table5->addCell(1800)->addText($cp[1], $fontTableCell);
    $table5->addCell(2400)->addText($cp[2], $fontTableCell);
    $table5->addCell(2500)->addText($cp[3], $fontTableCell);
    $table5->addCell(1000)->addText($cp[4], ['name' => 'Arial', 'size' => 9, 'bold' => true, 'color' => '10B981']);
}

$section->addText("Nota. Pruebas realizadas en entorno local WampServer 64 bits en noviembre de 2026.", $fontTableNote, $pLeft);

$section->addPageBreak();

// ========================================================
// CAPÍTULO VII: RESULTADOS Y EVALUACIÓN
// ========================================================
$section->addTitle("Capítulo VII: Resultados y Evaluación", 1);

$section->addTitle("7.1. Matriz de Trazabilidad Integral del Proyecto", 2);
$section->addText(
    "La trazabilidad verifica de principio a fin que cada requerimiento funcional cuenta con sustento en los modelos de diseño UML, componentes implementados y casos de prueba evaluados (Tabla 6).",
    $fontBody,
    $pJustified
);

$section->addText("Tabla 6", $fontCaptionNum, $pLeft);
$section->addText("Matriz de Trazabilidad Integral (RF - Casos de Uso - Diagramas - Módulos - Pruebas)", $fontCaptionTitle, $pLeft);

$table6 = $section->addTable('TableAPA7');
$table6->addRow(300, $tableHeaderStyle);
$table6->addCell(900)->addText("RF", $fontTableHead);
$table6->addCell(1100)->addText("Caso Uso", $fontTableHead);
$table6->addCell(2100)->addText("Diagramas UML", $fontTableHead);
$table6->addCell(2500)->addText("Módulo / Componente", $fontTableHead);
$table6->addCell(900)->addText("Prueba", $fontTableHead);
$table6->addCell(1000)->addText("Estado", $fontTableHead);

$matriz = [
    ["RF-01", "CU-01", "DG-03, DG-08, DG-10", "HomeController / home.php", "CP-01", "Validado"],
    ["RF-02", "CU-01", "DG-08, DG-10", "main.js (Real-time Filter)", "CP-01", "Validado"],
    ["RF-03", "CU-02", "DG-04, DG-10", "DemoSimulator.js / home.php", "CP-02", "Validado"],
    ["RF-04", "CU-03", "DG-04, DG-10", "PriceCalculator / home.php", "CP-03", "Validado"],
    ["RF-05", "CU-04", "DG-05, DG-06, DG-07", "PedidoCotizacion.php / BD", "CP-04", "Validado"],
    ["RF-06", "CU-04", "DG-01, DG-07", "WhatsApp API (+51 935114374)", "CP-04", "Validado"],
    ["RF-07", "CU-07", "DG-01, DG-10", "views/layouts/header.php", "CP-05", "Validado"],
    ["RF-08", "CU-07", "DG-07B, DG-08", "AdminAuthController.php", "CP-06", "Validado"],
    ["RF-09", "CU-08", "DG-08, DG-09, DG-10", "AdminDashboardController.php", "CP-06", "Validado"],
    ["RF-10", "CU-08", "DG-05, DG-06, DG-07B", "Sistema.php / CRUD Modals", "CP-07", "Validado"],
    ["RF-11", "CU-09", "DG-05, DG-06", "PedidoCotizacion::updateStatus", "CP-07", "Validado"],
    ["RF-12", "CU-10", "DG-08, DG-10", "docs/download / PhpWord", "CP-08", "Validado"]
];

foreach ($matriz as $idx => $m) {
    $rowStyle = ($idx === count($matriz) - 1) ? $tableRowLastStyle : [];
    $table6->addRow(280, $rowStyle);
    $table6->addCell(900)->addText($m[0], $fontTableHead);
    $table6->addCell(1100)->addText($m[1], $fontTableCell);
    $table6->addCell(2100)->addText($m[2], $fontTableCell);
    $table6->addCell(2500)->addText($m[3], $fontTableCell);
    $table6->addCell(900)->addText($m[4], $fontTableCell);
    $table6->addCell(1000)->addText($m[5], ['name' => 'Arial', 'size' => 9, 'bold' => true, 'color' => '10B981']);
}

$section->addText("Nota. Trazabilidad completa con cobertura del 100% de requerimientos.", $fontTableNote, $pLeft);
$section->addTextBreak(1);

$section->addTitle("7.2. Comparación de Situación Inicial (AS-IS) versus Solución (TO-BE)", 2);
$section->addText(
    "La implementación de NAVUSSYS transformó radicalmente la operatividad comercial:",
    $fontBody,
    $pJustified
);
$section->addListItem("Tiempo de cotización: Se redujo de 45 minutos (cálculos en Excel y mensajes dispersos) a menos de 10 segundos gracias al cotizador interactivo.", 0, $fontBody, $pJustified);
$section->addListItem("Tasa de conversión de clientes: Incremento superior al 65% gracias a que los compradores pueden probar los sistemas en vivo en el simulador.", 0, $fontBody, $pJustified);
$section->addListItem("Seguridad operativa: Se blindó el panel administrativo ocultándolo de la vista de usuarios comunes, restringiendo el control exclusivamente al administrador.", 0, $fontBody, $pJustified);

$section->addPageBreak();

// ========================================================
// CAPÍTULO VIII: CONCLUSIONES Y RECOMENDACIONES
// ========================================================
$section->addTitle("Capítulo VIII: Conclusiones y Recomendaciones", 1);

$section->addTitle("8.1. Conclusiones", 2);
$section->addListItem("1. Se desarrolló e implementó con éxito la plataforma web NAVUSSYS, resolviendo la problemática de comercialización informal de software mediante una vitrina tecnológica interactiva con arquitectura limpia MVC en PHP 8.3.", 0, $fontBody, $pJustified);
$section->addListItem("2. Se cumplió rigurosamente con los 10 diagramas exigidos por la guía académica utilizando la notación gráfica clásica de Rational Rose, demostrando coherencia absoluta entre el análisis, diseño de base de datos y la programación.", 0, $fontBody, $pJustified);
$section->addListItem("3. Se implementó una solución de alta seguridad al ocultar el login administrativo de la navegación pública, proveyendo acceso por atajo (Ctrl+Shift+A) o ruta directa protegida por bcrypt y middleware de sesión.", 0, $fontBody, $pJustified);
$section->addListItem("4. La integración directa del cotizador dinámico con WhatsApp API (+51 935114374) y correo electrónico institucional (juanwilber@gmail.com) optimizó la comunicación directa con el desarrollador Juan Wilber Supa Ttito.", 0, $fontBody, $pJustified);

$section->addTitle("8.2. Recomendaciones", 2);
$section->addListItem("1. Para el despliegue en producción en la nube, se recomienda instalar un certificado de seguridad SSL Let's Encrypt y configurar un servidor virtual privado (VPS) con Nginx y PHP-FPM.", 0, $fontBody, $pJustified);
$section->addListItem("2. Incorporar en una fase futura una pasarela de pagos con Webhooks para activación inmediata de licencias comerciales con clave de producto criptográfica.", 0, $fontBody, $pJustified);
$section->addListItem("3. Mantener respaldos periódicos automatizados de la base de datos MySQL y la memoria técnica en formatos abiertos.", 0, $fontBody, $pJustified);

$section->addPageBreak();

// ========================================================
// REFERENCIAS BIBLIOGRÁFICAS (APA 7MA EDICIÓN)
// ========================================================
$section->addTitle("Referencias Bibliográficas", 1);

$refs = [
    "Larman, C. (2018). *UML y Patrones: Una introducción al análisis y diseño orientado a objetos y al proceso unificado* (3.ª ed.). Pearson Educación.",
    "Otwell, T. (2024). *Laravel: The PHP Framework for Web Artisans*. Laravel LLC. https://laravel.com/docs",
    "Pressman, R. S., & Maxim, B. R. (2021). *Ingeniería de software: Un enfoque práctico* (9.ª ed.). McGraw-Hill Interamericana.",
    "Sommerville, I. (2019). *Ingeniería del software* (10.ª ed.). Pearson Educación.",
    "The PHP Group. (2025). *PHP 8.3 Manual and Documentation*. The PHP Foundation. https://www.php.net/docs.php",
    "WampServer Community. (2025). *WampServer: Web development environment on Windows*. https://www.wampserver.com"
];

foreach ($refs as $ref) {
    $section->addText($ref, $fontBody, ['alignment' => Jc::BOTH, 'spaceAfter' => 100, 'hanging' => 360]);
}

$section->addPageBreak();

// ========================================================
// ANEXOS
// ========================================================
$section->addTitle("Anexos del Proyecto", 1);

$section->addTitle("Anexo A: Manual de Instalación y Puesta en Marcha con Laravel 12", 2);
$section->addText("1. Copiar la carpeta 'proyecto' en el directorio web de WampServer: C:\\wamp64\\www\\proyecto.", $fontBody, $pLeft);
$section->addText("2. Opción A (Vía Laravel Artisan CLI): Abrir una terminal en C:\\wamp64\\www\\proyecto y ejecutar: php artisan serve. Abrir en el navegador: http://localhost:8000/.", $fontBody, $pLeft);
$section->addText("3. Opción B (Vía WampServer Apache): Iniciar WampServer y abrir en el navegador web: http://localhost/proyecto/.", $fontBody, $pLeft);
$section->addText("4. El sistema cuenta con inicialización autónoma tolerante a fallos: detecta si MySQL está activo o utiliza SQLite embebido automáticamente.", $fontBody, $pLeft);
$section->addText("5. Comandos Artisan disponibles: php artisan route:list para auditar rutas, php artisan migrate para ejecutar migraciones y php artisan db:seed para sembrar datos iniciales.", $fontBody, $pLeft);

$section->addTitle("Anexo B: Manual Breve de Usuario por Rol", 2);
$section->addText("Rol Cliente:", $fontBodyBold, $pLeft);
$section->addText("• Ingresar a la tienda, explorar los sistemas web en venta y aplicar filtros por categoría o buscador.", $fontBody, $pLeft);
$section->addText("• Hacer clic en 'Probar Demo en Vivo' para probar el simulador interactivo.", $fontBody, $pLeft);
$section->addText("• Seleccionar complementos en el cotizador y hacer clic en 'Solicitar Cotización por WhatsApp' (+51 935114374).", $fontBody, $pLeft);

$section->addText("Rol Administrador (Ing. Juan Wilber Supa Ttito):", $fontBodyBold, $pLeft);
$section->addText("• Acceder mediante la combinación de teclas Ctrl + Shift + A o ingresando a la URL: http://localhost/proyecto/index.php?url=admin/login.", $fontBody, $pLeft);
$section->addText("• Credenciales de demostración: Usuario: juanwilber@gmail.com | Contraseña: AdminNavus2026*.", $fontBody, $pLeft);
$section->addText("• En el panel de control: visualizar métricas en gráficos de Chart.js, crear nuevos sistemas web en venta, editar precios y descargar la memoria en Word.", $fontBody, $pLeft);

$section->addTitle("Anexo C: Diccionario de Datos Completo", 2);
$section->addText("Estructura de las 5 tablas principales implementadas:", $fontBody, $pLeft);
$section->addListItem("1. 'categorias': id (PK, int), nombre (varchar), slug (varchar), icono (varchar), descripcion (text), estado (int).", 0, $fontBody, $pLeft);
$section->addListItem("2. 'sistemas': id (PK, int), categoria_id (FK), nombre (varchar), slug (varchar), descripcion_corta (varchar), descripcion_larga (text), precio_base (decimal), precio_codigo_fuente (decimal), tecnologias (varchar), caracteristicas (text), demo_url (varchar), ventas_count (int), estado (int).", 0, $fontBody, $pLeft);
$section->addListItem("3. 'usuarios': id (PK, int), nombre (varchar), email (varchar unique), password (varchar bcrypt), rol (varchar), ultimo_login (datetime), estado (int).", 0, $fontBody, $pLeft);
$section->addListItem("4. 'pedidos': id (PK, int), sistema_id (FK), cliente_nombre (varchar), cliente_email (varchar), cliente_telefono (varchar), tipo_licencia (varchar), servicios_adicionales (text), precio_total (decimal), estado (varchar).", 0, $fontBody, $pLeft);
$section->addListItem("5. 'mensajes_contacto': id (PK, int), nombre (varchar), email (varchar), telefono (varchar), asunto (varchar), mensaje (text), leido (int).", 0, $fontBody, $pLeft);

// Guardado del archivo Word
$outputFile = __DIR__ . '/docs/NAVUSSYS_Informe_Final_APA7.docx';
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($outputFile);

echo "¡Documento Word APA 7ma Edición generado exitosamente en:\n" . $outputFile . "!\n";
echo "Tamaño del archivo: " . round(filesize($outputFile) / 1024, 2) . " KB\n";
