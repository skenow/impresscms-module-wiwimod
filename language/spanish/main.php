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

define('_MD_SWIKI_MODIFIED_TXT', 'modificada en :');
define('_MD_SWIKI_BY','por');
define('_MD_SWIKI_HISTORY_TXT','Revisiones de la p�gina');
define('_MD_SWIKI_EDIT_TXT','Edici�n');
define('_MD_SWIKI_BODY_TXT','Contenido de la p�gina');
define('_MD_SWIKI_DIFF_TXT','Diferencias entre esta revision y la m�s reciente');
define('_MD_SWIKI_THISPAGE','Esta p�gina');

//define('_MD_WIWI_EDIT_BTN','Edit');
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_SWIKI_SUBMITREVISION_BTN','Nueva revisi�n');
define('_MD_SWIKI_QUIETSAVE_BTN','Grabar');
define('_MD_SWIKI_HISTORY_BTN','Revisiones');
define('_MD_SWIKI_PAGEVIEW_BTN','Volver a la p�gina');
define('_MD_SWIKI_VIEW_BTN','Ver');
define('_MD_SWIKI_RESTORE_BTN','Restaurar');
define('_MD_SWIKI_FIX_BTN','Fix');
define('_MD_SWIKI_COMPARE_BTN','Comparar');
define('_MD_SWIKI_SELEDITOR_BTN','(clic-derecho para cambiar de editor)');

define('_MD_SWIKI_TITLE_FLD','T�tulo');
define('_MD_SWIKI_BODY_FLD','Contenido');
define('_MD_SWIKI_VISIBLE_FLD','Visible');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Contenido lateral');
define('_MD_SWIKI_PARENT_FLD','P�gina superior');
define('_MD_SWIKI_PROFILE_FLD','Perfil de acceso');

define('_MD_SWIKI_TITLE_COL','T�tulo');
define('_MD_SWIKI_MODIFIED_COL','Modificada');
define('_MD_SWIKI_AUTHOR_COL','Autor');
define('_MD_SWIKI_ACTION_COL','Acci�n');
define('_MD_SWIKI_KEYWORD_COL','Nombre');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"Esta p�gina no existe en la base de datos.");
define('_MD_SWIKI_DBUPDATED_MSG','Base de datos actualizada');
define('_MD_SWIKI_ERRORINSERT_MSG','Se produjo un error mientras se actualizaba la base de datos');
define('_MD_SWIKI_EDITCONFLICT_MSG','Conflicto de versiones: sus modificaciones han sido rechazadas!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br><h4>Lo sentimos: la p�gina tiene el acceso protegido.</h4><br>');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br><h4>Lo sentimos: no tiene permisos para modificar esta p�gina.</h4><br>');


// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','Inicio');} // Also need in modinfo.php
define('_MI_SWIKI_404','Nombre no permitido');//Comprobar la validez del nombre

// Added in version 1.0
define('_MI_SWIKI_REVISION_SUMMARY', 'Resumen de revisiones');
define('_MI_SWIKI_ALLOW_COMMENTS','Permitir comentarios');
define('_MD_SWIKI_ADDPAGE_BTN','A�adir p�gina');
define('_MD_SWIKI_ADDPAGE','Crear p�gina');
?>