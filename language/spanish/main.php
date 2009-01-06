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

define('_MD_SWIKI_MODIFIED_TXT', 'Página modificada el:');
define('_MD_SWIKI_BY','por');
define('_MD_SWIKI_HISTORY_TXT','Revisiones de la página');
define('_MD_SWIKI_EDIT_TXT','Edición');
define('_MD_SWIKI_BODY_TXT','Contenido de la página');
define('_MD_SWIKI_DIFF_TXT','Diferencias entre esta revision y la más reciente');
define('_MD_SWIKI_THISPAGE','Esta página');

//define('_MD_SWIKI_EDIT_BTN','Edit');
//define('_MD_SWIKI_PREVIEW_BTN','Preview');
define('_MD_SWIKI_SUBMITREVISION_BTN','Nueva revisión');
define('_MD_SWIKI_QUIETSAVE_BTN','Grabar');//Comprobar el sentido
define('_MD_SWIKI_HISTORY_BTN','Revisiones');
define('_MD_SWIKI_PAGEVIEW_BTN','Volver a la página');
define('_MD_SWIKI_VIEW_BTN','Ver');
define('_MD_SWIKI_RESTORE_BTN','Restaurar');
define('_MD_SWIKI_FIX_BTN','Fix');
define('_MD_SWIKI_COMPARE_BTN','Comparar');
define('_MD_SWIKI_SELEDITOR_BTN','(clic-derecho para cambiar de editor)');

define('_MD_SWIKI_TITLE_FLD','Título');
define('_MD_SWIKI_BODY_FLD','Contenido');
define('_MD_SWIKI_VISIBLE_FLD','Visible');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Contenido lateral');
define('_MD_SWIKI_PARENT_FLD','Página superior');
define('_MD_SWIKI_PROFILE_FLD','Perfil de acceso');

define('_MD_SWIKI_TITLE_COL','Título');
define('_MD_SWIKI_MODIFIED_COL','Modificada');
define('_MD_SWIKI_AUTHOR_COL','Autor');
define('_MD_SWIKI_ACTION_COL','Acción');
define('_MD_SWIKI_KEYWORD_COL','Nombre');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"Esta página no existe en la base de datos.");
define('_MD_SWIKI_DBUPDATED_MSG','Base de datos actualizada');
define('_MD_SWIKI_ERRORINSERT_MSG','Se produjo un error mientras se actualizaba la base de datos');
define('_MD_SWIKI_EDITCONFLICT_MSG','Conflicto de versiones: sus modificaciones han sido rechazadas!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br><h4>Lo sentimos: la página tiene el acceso protegido.</h4><br>');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br><h4>Lo sentimos: no tiene permisos para modificar esta página.</h4><br>');


// Wiwi special pages -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','Inicio');} // Also need in modinfo.php
define('_MI_SWIKI_404','Nombre no permitido');//Comprobar la validez del nombre

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Resumen de revisiones');
define('_MI_SWIKI_ALLOW_COMMENTS','Permitir comentarios');
define('_MD_SWIKI_ADDPAGE_BTN','Añadir página');
define('_MD_SWIKI_ADDPAGE','Crear página');
define('_MD_SWIKI_PDF_ERROR_MSG','Error creating PDF');
define('_MD_SWIKI_NOPAGE_MSG','Could not create PDF - at least one of the pages did not exist');
define('_MI_SWIKI_TOPPAGE', 'Index Page');
define('_MI_SWIKI_TOPPAGE_DESC', 'Page to be shown on the main page of the module');
define('_MD_SWIKI_CREATED','This page was created on %2$s by %1$s');
define('_MD_SWIKI_REVISIONS','This page has been revised %u time(s)');
define('_MD_SWIKI_LASTVIEWED','This page was last viewed on %s');
define('_MD_SWIKI_VIEWS','This page has been viewed %u time(s)');
define('_MI_SWIKI_SHOWREVISIONS','Show number of revisions');
define('_MI_SWIKI_SHOWVIEWS','Show number of views');
define('_MI_SWIKI_SHOWCREATED','Show date created and creator');
define('_MI_SWIKI_SHOWLASTREVISED','Show date of last revision');
define('_MI_SWIKI_LASTVIEWED','Show date last viewed');
define('_MI_SWIKI_USECAPTCHA','Enable CAPTCHA');
define('_MI_SWIKI_USECAPTCHA_DESC', 'Display CAPTCHA on edit form')
?>