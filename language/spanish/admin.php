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

//Traducción por debianus
define('_AM_SWIKI_ADMIN_TXT','Administración del módulo');
define('_AM_SWIKI_PAGESFILTER_TXT','Listar las páginas en las que el');
define('_AM_SWIKI_LIKE_TXT','contiene');
define('_AM_SWIKI_PROFILEIS_TXT','es');
define('_AM_SWIKI_ORDERBY_TXT',', ordenadas por');
define('_AM_SWIKI_LISTPAGES_RESULTS_TXT','resultados');

define('_AM_SWIKI_SELECTACL_BOX','');
define('_AM_SWIKI_SELECTACL_TXT','Modificar un perfil:');
define('_AM_SWIKI_CREATEACL_TXT','Crear uno nuevo:');
define('_AM_SWIKI_EDITACL_TXT','Datos del perfil');
define('_AM_SWIKI_ACLHELP_TXT','
	<p>El sistema de permisos de acceso está relacionado con los grupos de usuarios que haya creado, pudiendo seleccionar los que están autorizados a leer, modificar o administrar las páginas correspondientes.</p>
	<ul>
		<li>Los editores pueden modificar la página actual y crear nuevas páginas con el mismo perfil de permisos.</li>
		<li>Los administradores pueden cambiar el perfil de una página por otro de su elección del que también tengan derechos de administrador).</li></ul>
	<p>El perfil inicial de una página es el de su página superior en la jerarquía.</p>
	<p>Los perfiles tambien sirven para administrar el acceso a los comentarios. Esto permite, por ejemplo, admitir comentarios privados en páginas públicas.</p>
	<p>Nota: los administradores tienen permisos como tales en todas las páginas.</p>
	');
define('_AM_SWIKI_DELCONFIRMTITLE_TXT','CONFIRMACION DE SUPRESIÓN');
define('_AM_SWIKI_DELCONFIRM_TXT','Va a suprimir un perfil: confirme su decisión.');
define('_AM_SWIKI_DELREDIR_TXT','Elija un perfil para las páginas actualmente incluídas en el que está suprimiendo.');

define('_AM_SWIKI_LISTPAGES_BTN','<< Volver a la lista de páginas');
define('_AM_SWIKI_CREATEACL_BTN','Nuevo');
define('_AM_SWIKI_EDITACL_SAVE_BTN','Guardar');
define('_AM_SWIKI_EDITACL_DELETE_BTN','Suprimir');
define('_AM_SWIKI_EDITACL_CANCEL_BTN','Cancelar');
define('_AM_SWIKI_CLEANUPDB_BTN','Limpiar la base de datos');


define('_AM_SWIKI_ACLNAME_FLD','Nombre del perfil');
define('_AM_SWIKI_ACLDESC_FLD','Descripcción');
define('_AM_SWIKI_READERS_FLD','Grupos con acceso de lectura');
define('_AM_SWIKI_WRITERS_FLD','Grupos con acceso de edición');
define('_AM_SWIKI_ADMINISTRATORS_FLD','Grupos administradores');
define('_AM_SWIKI_COMMENTS_FLD','Quién puede ver/añadir comentarios :');
define('_AM_SWIKI_HISTORY_FLD','Quién puede ver el índice historico de revisiones:');
define('_AM_SWIKI_DELREDIR_FLD','Perfil repuesto:');

define('_AM_SWIKI_SELECTACL_OPT','(Seleccione)');
define('_AM_SWIKI_READERS_OPT','Lectores');
define('_AM_SWIKI_WRITERS_OPT','Editores');
define('_AM_SWIKI_ADMINISTRATORS_OPT','Administradores');
define('_AM_SWIKI_COMMENTS_NONE_OPT','(sin comentarios)');
define('_AM_SWIKI_HISTORY_NONE_OPT','(sin historico)');
define('_AM_SWIKI_DELCONFIRM_OPT','Sí: quiero suprimir este perfil de acceso.');

define('_AM_SWIKI_LISTPAGES_ALLPAGES_OPT','todas las páginas');
define('_AM_SWIKI_LISTPAGES_KEYWORD_OPT','nombre');
define('_AM_SWIKI_LISTPAGES_TITLE_OPT','título');
define('_AM_SWIKI_LISTPAGES_BODY_OPT','contenido');
define('_AM_SWIKI_LISTPAGES_UID_OPT','ultimo autor');
define('_AM_SWIKI_LISTPAGES_PARENT_OPT','importancia');
define('_AM_SWIKI_LISTPAGES_PRID_OPT','perfil');
define('_AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT','modificada');
define('_AM_SWIKI_LISTPAGES_ORDERDESC_OPT','decreciente');
define('_AM_SWIKI_LISTPAGES_ORDERASC_OPT','creciente');

define('_AM_SWIKI_LISTPAGE_NAV','páginas');
define('_AM_SWIKI_HISTORY_NAV','historico');
define('_AM_SWIKI_ACLADMIN_NAV','permisos (ACL)');
define("_AM_SWIKI_BLOCKSNGROUPS_NAV", "bloques y grupos");

define('_AM_SWIKI_NOPAGESPECIFIED_MSG','Seleccione una página');
define('_AM_SWIKI_CONFIRMDEL_MSG','¿Está seguro de suprimir esta página?');
define('_AM_SWIKI_CONFIRMFIX_MSG','¿Está seguro de suprimir todas las revisiones anteriores a ésta?');
define('_AM_SWIKI_CONFIRMCLEAN_MSG','¿Está seguro de suprimir las revisiones más antiguas?');
define('_AM_SWIKI_PRFSAVESUCCESS_MSG','Perfil guardado en la base de datos');
define('_AM_SWIKI_PRFSAVEFAILED_MSG','Error durante la grabación del perfil.');
define('_AM_SWIKI_ERRDELETE_MSG','Error: fue imposible suprimir el perfil');
define('_AM_SWIKI_PRFDELSUCCESS_MSG','Perfil suprimido con exito.');
define('_AM_SWIKI_PRFDELFAILED_MSG','Error durante la supresión del perfil.');

//added in version 1.2
define('_AM_SWIKI_GOTO_MODULE', 'Ir al módulo');
define('_AM_SWIKI_UPDATE_MODULE', 'Actualizar');
