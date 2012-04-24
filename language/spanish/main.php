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
define('_MD_SWIKI_THISPAGE','');

define('_MD_SWIKI_SUBMITREVISION_BTN','Nueva revisión');
define('_MD_SWIKI_QUIETSAVE_BTN','Guardar');//Comprobar el sentido
define('_MD_SWIKI_HISTORY_BTN','Revisiones');
define('_MD_SWIKI_PAGEVIEW_BTN','Volver a la página');
define('_MD_SWIKI_VIEW_BTN','Ver');
define('_MD_SWIKI_RESTORE_BTN','Restaurar');
define('_MD_SWIKI_FIX_BTN','Suprimir revisiones anteriores');
define('_MD_SWIKI_COMPARE_BTN','Comparar');
define('_MD_SWIKI_SELEDITOR_BTN','(haga clic con el botón derecho del ratón para cambiar de editor)');

define('_MD_SWIKI_TITLE_FLD','Título');
define('_MD_SWIKI_BODY_FLD','Contenido');
define('_MD_SWIKI_VISIBLE_FLD','Visibilidad (0 para no mostrar en el bloque <em>Tabla de contenido</em>; otros números determinan su orden de presentación)');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Contenido relacionado');
define('_MD_SWIKI_PARENT_FLD','Página superior (ésta será subpágina de la que indique)');
define('_MD_SWIKI_PROFILE_FLD','Perfil de acceso');

define('_MD_SWIKI_TITLE_COL','Título');
define('_MD_SWIKI_MODIFIED_COL','Modificada');
define('_MD_SWIKI_AUTHOR_COL','Autor');
define('_MD_SWIKI_ACTION_COL','Acción');
define('_MD_SWIKI_KEYWORD_COL','Nombre');

define('_MD_SWIKI_PAGENOTFOUND_MSG',"Esta página no existe en la base de datos.");
define('_MD_SWIKI_DBUPDATED_MSG','Base de datos actualizada');
define('_MD_SWIKI_ERRORINSERT_MSG','Se produjo un error mientras se actualizaba la base de datos');
define('_MD_SWIKI_EDITCONFLICT_MSG','Conflicto de versiones: sus modificaciones han sido rechazadas');
define('_MD_SWIKI_NOREADACCESS_MSG','<br><h4>Lo sentimos: la página tiene el acceso protegido.</h4><br>');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br><h4>Lo sentimos: no tiene permisos para modificar esta página.</h4><br>');

// Wiki special pages -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','Inicio');} // Also need in modinfo.php
define('_MI_SWIKI_404','Nombre no permitido');//Comprobar la validez del nombre

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Resumen de la revisión');
define('_MI_SWIKI_ALLOW_COMMENTS','Permitir comentarios');
define('_MD_SWIKI_ADDPAGE_BTN','Añadir página');
define('_MD_SWIKI_ADDPAGE','Crear una página nueva');
define('_MD_SWIKI_PDF_ERROR_MSG','Error al crear el archivo PDF');
define('_MD_SWIKI_NOPAGE_MSG','No fue posible crear el archivo PDF: al menos una de las páginas no existe');
define('_MD_SWIKI_CREATED','Esta página fue creada el %2$s por %1$s');
define('_MD_SWIKI_REVISIONS','Esta página ha sido revisada %u veces');
define('_MD_SWIKI_LASTVIEWED','La última vez que esta página fue vista fue el %s');
define('_MD_SWIKI_VIEWED','Esta página ha sido vista %u veces');

//Added in version 1.2
define('_MD_SWIKI_VIEWS', 'Vistas');
