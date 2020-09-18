<?php
// Module Info
// Traducción por debianus
// The name of this module
define('_MI_SWIKI_NAME', 'SimplyWiki');

// A brief description of this module
define('_MI_SWIKI_DESC', 'Un wiki <em>WYSIWYG.</em>');

// Admin menu
define('_MI_SWIKI_ADMENU1', 'Páginas');
define('_MI_SWIKI_ADMENU2', 'Permisos');
define('_MI_SWIKI_ADMENU3', 'Bloques y grupos');
define('_MI_SWIKI_ADMENU4', 'Acerca de...');
define('_MI_SWIKI_ADMENU5', 'Ayuda');

// Admin options
define('_MI_SWIKI_EDITOR', 'Editor de texto a usar');
define('_MI_SWIKI_EDITOR_DESC', '');
define('_MI_SWIKI_DEFAULTPROFILE', 'Perfil inicial');
// Default profile description was added in re-release, see below
define('_MI_SWIKI_ALLOWPDF', 'Mostrar el icono de creación de archivos PDF');
define('_MI_SWIKI_ALLOWPDF_DESC', 'La creación de archivos PDF a partir de las páginas es una característica experimental.');

define('_MI_SWIKI_SHOWTITLES', '¿Mostrar el título de las páginas en lugar de su nombre?');
define('_MI_SWIKI_SHOWTITLES_DESC', 'Esta característica es relativa a los vínculos automáticos creados con <em>CamelCase</em> en las páginas.');

define('_MI_SWIKI_USECAMELCASE', 'Interpretar el <em>CamelCase</em>');
define('_MI_SWIKI_USECAMELCASE_DESC', 'Interpreta las palabras en <em>CamelCase</em> como vínculos hacia otras páginas del wiki.<em>CamelCase</em> es la práctica de escribir frases o palabras compuestas eliminando los espacios y poniendo en mayúscula la primera letra de cada palabra. El nombre viene del parecido de estas mayúsculas, entre las demás letras, con las jorobas de los camellos.');

define('_MI_SWIKI_XOOPSEDITOR', 'Seleccione un editor');
define('_MI_SWIKI_XOOPSEDITOR_DESC', '');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE', 'Página');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC', 'Notificaciones que se aplican a la página actual');
define('_MI_SWIKI_PAGENOTIFY_TITLE', 'Página modificada');
define('_MI_SWIKI_PAGENOTIFY_CAPTION', 'Notifíqueme cuando la página sea modificada');
define('_MI_SWIKI_PAGENOTIFY_DESC', 'Recibir una notificación cuando algún usuario modifique la página actual.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT', '[{X_SITENAME}] {X_MODULE} - página modificada (notificación automática)');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE', 'Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC', 'Notificaciones relativas a todas las páginas');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE', 'Página actualizada');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION', 'Notificarme cuando cualquier página es modificada');
define('_MI_SWIKI_GLOBALNOTIFY_DESC', 'Recibir una notificación cuando cualquier usuario actualiza cualquier página.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT', '[{X_SITENAME}] {X_MODULE} notificación automática: página actualizada');
define('_MI_SWIKI_TEMPLATE_VIEW_DESC', 'Ver página');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC', 'Modificar página');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC', 'Ver historial de la página');
define('_MI_SWIKI_TEMPLATE_PDF_DESC', 'SimplyWiki - pdf');
define('_MI_SWIKI_BLOCK_TOC_NAME', 'Tabla de contenido'); // Wiwi TOC
define('_MI_SWIKI_BLOCK_TOC_DESC', 'Páginas'); // Wiwi selected entry pages
define('_MI_SWIKI_BLOCK_RECENT_NAME', 'Páginas recientes');
define('_MI_SWIKI_BLOCK_RECENT_DESC', 'Páginas recientemente modificadas o creadas'); // wiwi recently modified
define('_MI_SWIKI_BLOCK_RELATED_NAME', 'Contenido relacionado');
define('_MI_SWIKI_BLOCK_RELATED_DESC', 'Bloque que muestra la página(s) cuyo nombre se haya indicado en el campo <em>Contenido relacionado</em> '); // Side block for extra content on Wiwi pages
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME', 'Mostrar página');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC', 'Mostrar una página');
define('_MI_SWIKI_AUTHOR_WORD', '<h4>Sobre SimplyWiki</h4><br />SimplyWiki es software con licencia GPL. Visite la página <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> para obtener ayuda o soporte.<br /><br />Si ha migrado desde una versión anterior de Wiwi (0.7.1 o inferior), haga clic aquí: <input type="button" value="Actualizar" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'../language/spanish/manual.php\' target=\'_blank\'>Lea el Manual</a> y <a href=\'../ReadMe.txt\' target=\'_blank\'>las Notas de la versión</a> para comenzar.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC', 'Perfil predeterminado asignado a las nuevas páginas');
if (!defined('_MI_SWIKI_HOME')) {
	define('_MI_SWIKI_HOME', 'Inicio');
}

// Added in SimplyWiki 1.1
define('_MI_SWIKI_BLOCK_LISTPAGES_NAME', 'Lista de páginas');
define('_MI_SWIKI_BLOCK_LISTPAGES_DESC', 'Muestra una lista con las páginas.');
define('_MI_SWIKI_BLOCK_ADDPAGE_NAME', 'Añadir página');
define('_MI_SWIKI_BLOCK_ADDPAGE_DESC', 'Permite añadir una página en el wiki desde cualquier otra de su sitio.');
define('_MI_SWIKI_PAGEINFO', 'Mostrar información de la página');
define('_MI_SWIKI_PAGEINFO_DESC', 'Seleccione la información detallada que se mostrará en cada página.');
define('_MI_SWIKI_SHOWREVISIONS', 'Mostrar el número de revisiones');
define('_MI_SWIKI_SHOWVIEWS', 'Mostrar el número de veces que la página ha sido leída');
define('_MI_SWIKI_SHOWCREATED', 'Mostrar la fecha de creación y el nombre del autor');
define('_MI_SWIKI_SHOWLASTREVISED', 'Mostrar la fecha de la última revisión');
define('_MI_SWIKI_LASTVIEWED', 'Mostrar la fecha de la última visualización');
define('_MI_SWIKI_USECAPTCHA', 'Activar CAPTCHA');
define('_MI_SWIKI_USECAPTCHA_DESC', 'Mostrar CAPTCHA en el formulario de edición o en el de creación.');
define('_MI_SWIKI_SHOWQUICKADD', 'Activar la característica de <em>Añadir página</em>');
define('_MI_SWIKI_SHOWQUICKADD_DESC', 'Si selecciona <em>Sí</em> se mostrará un campo de <em>Añadir página</em> que permite a los editores introducir el nombre de la nueva página y empezar a crearla directamente.');
define('_MI_SWIKI_TOPPAGE', 'Página índice');
define('_MI_SWIKI_TOPPAGE_DESC', 'Página que será mostrada como la de inicio del módulo.');
// Added in SimplyWiki 1.2
define('_MI_SWIKI_PAGERESTORE_TITLE', 'Página restaurada');
define('_MI_SWIKI_PAGERESTORE_CAPTION', 'Notificarme cuando una versión anterior de esta página sea restaurada');
define('_MI_SWIKI_PAGERESTORE_DESC', 'Recibir notificación cuando cualquier usuario restaure una versión anterior de esta página.');
define('_MI_SWIKI_PAGERESTORE_SUBJECT', '[{X_SITENAME}] {X_MODULE} autonotificación: página restaurada');
define('_MI_SWIKI_GLOBALPAGERESTORE_TITLE', 'Página restaurada');
define('_MI_SWIKI_GLOBALPAGERESTORE_CAPTION', 'Notificarme cuando una versión anterior de cualquier página sea restaurada');
define('_MI_SWIKI_GLOBALPAGERESTORE_DESC', 'ecibir notificación cuando cualquier usuario restaure una versión anterior de cualquier página.');
define('_MI_SWIKI_GLOBALPAGERESTORE_SUBJECT', '[{X_SITENAME}] {X_MODULE} autonotificación: página restaurada');

// Added in SimplyWiki 2.0
define('_MI_SWIKI_SITE_DFLT_EDITOR', 'Site Default');
define('_MI_SWIKI_SITE_ALT_EDITOR', 'Alternate Editor');
