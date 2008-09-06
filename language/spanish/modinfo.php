<?php
// $Id$
// Module Info

// The name of this module
define('_MI_WIWIMOD_NAME','Wiwi');

// A brief description of this module
define('_MI_WIWIMOD_DESC','Un wiki wysiwyg.');

// Admin menu
define('_MI_WIWIMOD_ADMENU1','Páginas');
define('_MI_WIWIMOD_ADMENU2','Privilegios');
define('_MI_WIWIMOD_ADMENU3','Bloques y grupos');
define('_MI_WIWIMOD_ADMENU4','Acerca de ...');

// Admin options
define('_MI_WIWIMOD_EDITOR','Qué editor se ha de usar');
define('_MI_WIWIMOD_EDITOR_DESC','');
define('_MI_WIWIMOD_DEFAULTPROFILE','Perfil inicial');

define('_MI_WIWIMOD_ALLOWPDF','Exponer el botón PDF ?');
define('_MI_WIWIMOD_ALLOWPDF_DESC','La generación de PDF a partir de las páginas es aun experimental ...');

define('_MI_WIWIMOD_SHOWTITLES','Exponer el título de las páginas, en vez de su nombre ?');
define('_MI_WIWIMOD_SHOWTITLES_DESC','(para los vínculos automáticos creados con CamelCase en las páginas');

define('_MI_WIWIMOD_USECAMELCASE','Interpretar el CamelCase');
define('_MI_WIWIMOD_USECAMELCASE_DESC','Interpreta las palabras en CamelCase como vínculos hacia otras páginas del wiki.');

define('_MI_WIWIMOD_XOOPSEDITOR','Elija un editor del package "XoopsEditor"');
define('_MI_WIWIMOD_XOOPSEDITOR_DESC','Usese cuando el editor elegido es XoopsEditor');

// Notification options
define('_MI_WIWIMOD_PAGENOTIFYCAT_TITLE','Página');
define('_MI_WIWIMOD_PAGENOTIFYCAT_DESC','Notificaciones que se aplican a la página corriente');
define('_MI_WIWIMOD_PAGENOTIFY_TITLE','Página modificada');
define('_MI_WIWIMOD_PAGENOTIFY_CAPTION','Notifiqueme cuando la página sea modificada');
define('_MI_WIWIMOD_PAGENOTIFY_DESC','Reciba notificación cuando algún usuario modifique la página corriente.');
define('_MI_WIWIMOD_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} - página modificada (notificación automática)');
/* Added in version ... */
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_DESC','Notifications that apply to the all pages');
define('_MI_WIWIMOD_GLOBALNOTIFY_TITLE','Page updated');
define('_MI_WIWIMOD_GLOBALNOTIFY_CAPTION','Notify me when any page is modified');
define('_MI_WIWIMOD_GLOBALNOTIFY_DESC','Receive notification when any user updates any page.');
define('_MI_WIWIMOD_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page updated');


?>
