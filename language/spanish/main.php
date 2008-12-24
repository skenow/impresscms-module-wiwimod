<?php
/*
 * Module and admin language definition
 * 
 *	_BTN	: text within buttons or action links
 *  _COL	: column headers
 *  _TXT	: "verbose" text (probably within content)
 *  _FLD	: title of form elements
 *  _DESC	: description under the title for form elements
 *  _MSG	: messages, alerts ...
 *
 */

define('_MD_WIWI_MODIFIED_TXT', 'modificada en :');
define('_MD_WIWI_BY','por');
define('_MD_WIWI_HISTORY_TXT','Revisiones de la página');
define('_MD_WIWI_EDIT_TXT','Edición');
define('_MD_WIWI_BODY_TXT','Contenido de la página');
define('_MD_WIWI_DIFF_TXT','Diferencias entre esta revision y la más reciente');
define('_MD_WIWI_THISPAGE','Esta página');

//define('_MD_WIWI_EDIT_BTN','Edit');
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_WIWI_SUBMITREVISION_BTN','Nueva revisión');
define('_MD_WIWI_QUIETSAVE_BTN','Grabar');
define('_MD_WIWI_HISTORY_BTN','Revisiones');
define('_MD_WIWI_PAGEVIEW_BTN','Volver a la página');
define('_MD_WIWI_VIEW_BTN','Ver');
define('_MD_WIWI_RESTORE_BTN','Restaurar');
define('_MD_WIWI_FIX_BTN','Fix');
define('_MD_WIWI_COMPARE_BTN','Comparar');
define('_MD_WIWI_SELEDITOR_BTN','(clic-derecho para cambiar de editor)');

define('_MD_WIWI_TITLE_FLD','Título');
define('_MD_WIWI_BODY_FLD','Contenido');
define('_MD_WIWI_VISIBLE_FLD','Visible');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Contenido lateral');
define('_MD_WIWI_PARENT_FLD','Página superior');
define('_MD_WIWI_PROFILE_FLD','Perfil de acceso');

define('_MD_WIWI_TITLE_COL','Título');
define('_MD_WIWI_MODIFIED_COL','Modificada');
define('_MD_WIWI_AUTHOR_COL','Autor');
define('_MD_WIWI_ACTION_COL','Acción');
define('_MD_WIWI_KEYWORD_COL','Nombre');


define('_MD_WIWI_PAGENOTFOUND_MSG',"Esta página no existe en la base de datos.");
define('_MD_WIWI_DBUPDATED_MSG','Base de datos actualizada');
define('_MD_WIWI_ERRORINSERT_MSG','Se produjo un error mientras se actualizaba la base de datos');
define('_MD_WIWI_EDITCONFLICT_MSG','Conflicto de versiones: sus modificaciones han sido rechazadas!');
define('_MD_WIWI_NOREADACCESS_MSG','<br><h4>Lo sentimos: la página tiene el acceso protegido.</h4><br>');
define('_MD_WIWI_NOWRITEACCESS_MSG','<br><h4>Lo sentimos: no tiene permisos para modificar esta página.</h4><br>');


// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_WIWIMOD_WIWIHOME')){define('_MI_WIWIMOD_WIWIHOME','Inicio');} // Also need in modinfo.php
define('_MI_WIWIMOD_WIWI404','Nombre no permitido');//Comprobar la validez del nombre

?>