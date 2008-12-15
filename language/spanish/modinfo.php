<?php
// $Id$
// Module Info
//Traducción por debianus
// The name of this module
define('_MI_SWIKI_NAME','Wiwi');

// A brief description of this module
define('_MI_SWIKI_DESC','Un wiki <em>WYSIWYG.</em>');

// Admin menu
define('_MI_SWIKI_ADMENU1','Páginas');
define('_MI_SWIKI_ADMENU2','Privilegios');
define('_MI_SWIKI_ADMENU3','Bloques y grupos');
define('_MI_SWIKI_ADMENU4','Acerca de...');
define('_MI_SWIKI_ADMENU5','Ayuda');

// Admin options
define('_MI_SWIKI_EDITOR','Editor de texto a usar');
define('_MI_SWIKI_EDITOR_DESC','');
define('_MI_SWIKI_DEFAULTPROFILE','Perfil inicial');
// Default profile description was added in re-release, see below
define('_MI_SWIKI_ALLOWPDF','Mostrar el icono de creación de archivos PDF');
define('_MI_SWIKI_ALLOWPDF_DESC','La generación de archivos PDF a partir de las páginas es aun experimental...');

define('_MI_SWIKI_SHOWTITLES','Mostrar el título de las páginas en lugar de su nombre ?');
define('_MI_SWIKI_SHOWTITLES_DESC','(para los vínculos automáticos creados con <em>CamelCase</em> en las páginas');

define('_MI_SWIKI_USECAMELCASE','Interpretar el <em>CamelCase</em>');
define('_MI_SWIKI_USECAMELCASE_DESC','Interpreta las palabras en <em>CamelCase</em> como vínculos hacia otras páginas del wiki.<em>CamelCase</em> es la práctica de escribir frases o palabras compuestas eliminando los espacios y poniendo en mayúscula la primera letra de cada palabra. El nombre viene del parecido de estas mayúsculas, entre las demás letras, con las jorobas de los camellos.');

define('_MI_SWIKI_XOOPSEDITOR','Elija un editor del paquete "XoopsEditor"');
define('_MI_SWIKI_XOOPSEDITOR_DESC','Úsese cuando el editor elegido es XoopsEditor');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE','Página');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC','Notificaciones que se aplican a la página corriente');
define('_MI_SWIKI_PAGENOTIFY_TITLE','Página modificada');
define('_MI_SWIKI_PAGENOTIFY_CAPTION','Notifíqueme cuando la página sea modificada');
define('_MI_SWIKI_PAGENOTIFY_DESC','Recibir una notificación cuando algún usuario modifique la página actual.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} - página modificada (notificación automática)');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC','Notificaciones relativas a todas las páginas');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE','Página actualizada');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION','Notificarme cuando cualquier página es modificada');
define('_MI_SWIKI_GLOBALNOTIFY_DESC','Recibir una notificación cuando cualquier usuario actualiza cualquier página.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} notificación automática: página actualizada');

define('_MI_SWIKI_TEMPLATE_VIEW_DESC','Ver página');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC','Modificar página');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC','Ver historial de la página');
define('_MI_SWIKI_TEMPLATE_PDF_DESC','SimplyWiki - pdf');
define('_MI_SWIKI_BLOCK_TOC_NAME','Tabla de contenido');//Wiwi TOC
define('_MI_SWIKI_BLOCK_TOC_DESC','Páginas');//Wiwi selected entry pages
define('_MI_SWIKI_BLOCK_RECENT_NAME','Páginas recientes');
define('_MI_SWIKI_BLOCK_RECENT_DESC','Páginas recientemente modificadas o creadas');//wiwi recently modified
define('_MI_SWIKI_BLOCK_RELATED_NAME','Contenido extra');
define('_MI_SWIKI_BLOCK_RELATED_DESC','Bloque de contenido extra para las páginas');//Side block for extra content on Wiwi pages
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME','Mostrar página');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC','Mostrar una página');
define('_MI_SWIKI_AUTHOR_WORD','<h4>Sobre Wiwi 0.8.3</h4><br />Wiwi es software bajo licencia GPL; visite la página de Wiwi <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">www.zonatim.com</a> to support or get help.<br /><br />If you\'ve just migrated from an older Wiwi version (0.7.1 or less), please click here : <input type="button" value="UPGRADE" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'../manual.html\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC','Perfil predeterminado asignado a las nuevas páginas');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','Inicio');}
?>