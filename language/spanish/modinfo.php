<?php
// $Id$
// Module Info
//Traducción por debianus
// The name of this module
define('_MI_WIWIMOD_NAME','Wiwi');

// A brief description of this module
define('_MI_WIWIMOD_DESC','Un wiki wysiwyg.');

// Admin menu
define('_MI_WIWIMOD_ADMENU1','Páginas');
define('_MI_WIWIMOD_ADMENU2','Privilegios');
define('_MI_WIWIMOD_ADMENU3','Bloques y grupos');
define('_MI_WIWIMOD_ADMENU4','Acerca de...');

// Admin options
define('_MI_WIWIMOD_EDITOR','Editor de texto a usar');
define('_MI_WIWIMOD_EDITOR_DESC','');
define('_MI_WIWIMOD_DEFAULTPROFILE','Perfil inicial');

define('_MI_WIWIMOD_ALLOWPDF','Mostrar el icono de creación de archivos PDF');
define('_MI_WIWIMOD_ALLOWPDF_DESC','La generación de archivos PDF a partir de las páginas es aun experimental ...');

define('_MI_WIWIMOD_SHOWTITLES','Mostrar el título de las páginas en lugar de su nombre ?');
define('_MI_WIWIMOD_SHOWTITLES_DESC','(para los vínculos automáticos creados con <em>CamelCase</em> en las páginas');

define('_MI_WIWIMOD_USECAMELCASE','Interpretar el CamelCase');
define('_MI_WIWIMOD_USECAMELCASE_DESC','Interpreta las palabras en CamelCase como vínculos hacia otras páginas del wiki.CamelCase es la práctica de escribir frases o palabras compuestas eliminando los espacios y poniendo en mayúscula la primera letra de cada palabra. El nombre viene del parecido de estas mayúsculas, entre las demás letras, con las jorobas de los camellos.');

define('_MI_WIWIMOD_XOOPSEDITOR','Elija un editor del package "XoopsEditor"');
define('_MI_WIWIMOD_XOOPSEDITOR_DESC','Usese cuando el editor elegido es XoopsEditor');

// Notification options
define('_MI_WIWIMOD_PAGENOTIFYCAT_TITLE','Página');
define('_MI_WIWIMOD_PAGENOTIFYCAT_DESC','Notificaciones que se aplican a la página corriente');
define('_MI_WIWIMOD_PAGENOTIFY_TITLE','Página modificada');
define('_MI_WIWIMOD_PAGENOTIFY_CAPTION','Notifíqueme cuando la página sea modificada');
define('_MI_WIWIMOD_PAGENOTIFY_DESC','Recibir una notificación cuando algún usuario modifique la página actual.');
define('_MI_WIWIMOD_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} - página modificada (notificación automática)');
/* Added in version ... */
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_DESC','Notificaciones relativas a todas las páginas');
define('_MI_WIWIMOD_GLOBALNOTIFY_TITLE','Página actualizada');
define('_MI_WIWIMOD_GLOBALNOTIFY_CAPTION','Notifíqueme cuando cualquier página es modificada');
define('_MI_WIWIMOD_GLOBALNOTIFY_DESC','Recibir una notificación cuando cualquier usuario actualiza cualquier página.');
define('_MI_WIWIMOD_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} notificación automática: página actualizada');
?>