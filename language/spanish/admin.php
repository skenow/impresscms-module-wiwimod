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
define('_AM_WIWI_ADMIN_TXT','Administración del módulo');
define('_AM_WIWI_PAGESFILTER_TXT','Listar las páginas en que ');
define('_AM_WIWI_LIKE_TXT','contiene');
define('_AM_WIWI_PROFILEIS_TXT','es');
define('_AM_WIWI_ORDERBY_TXT',', ordenado por');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','resultados');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','modifique un perfil :');
define('_AM_WIWI_CREATEACL_TXT','o cree une nuevo :');
define('_AM_WIWI_EDITACL_TXT','Datos del perfil');
define('_AM_WIWI_ACLHELP_TXT','
	<p>El sistema de privilegios de acceso se apoya en \"perfiles\" nombrados, que enumeran los grupos Xoops autorizados a leer/editar/administrar las páginas correspondientes.</p>
	<ul>
		<li>Los editores pueden modificar la página actual y crear nuevas páginas con el mismo perfil de privilegios.</li>
		<li>Los administradores pueden cambiar el perfil de una página por otro de su elección del que tengan derechos de administrador tambien).</li></ul>
	<p>El perfil inicial de una página es el de su página superior en la jerarquía.</p>
	<p>Los perfiles tambien sirven para administrar el acceso a los comentarios. Esto permite por ejemplo admitir comentarios privados en páginas públicas ...</p>
	<p>Nota : los administradores tienen privilegios de administrador en todas las páginas.</p>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','CONFIRMACION DE SUPRESION');
define('_AM_WIWI_DELCONFIRM_TXT','Va a suprimir un perfil: confirme su intención.');
define('_AM_WIWI_DELREDIR_TXT','Elija un perfil para las páginas actualmente protegidas por el que está suprimiendo.');

define('_AM_WIWI_LISTPAGES_BTN','<< Vuelta a la lista de páginas');
define('_AM_WIWI_CREATEACL_BTN','Nuevo');
define('_AM_WIWI_EDITACL_SAVE_BTN','Guardar');
define('_AM_WIWI_EDITACL_DELETE_BTN','Suprimir');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Cancelar');
define('_AM_WIWI_CLEANUPDB_BTN','Limpiar la base de datos');


define('_AM_WIWI_ACLNAME_FLD','Nombre del perfil');
define('_AM_WIWI_ACLDESC_FLD','Descripcción');
define('_AM_WIWI_READERS_FLD','Grupos con acceso de lectura');
define('_AM_WIWI_WRITERS_FLD','Grupos con acceso de edición');
define('_AM_WIWI_ADMINISTRATORS_FLD','Grupos administradores');
define('_AM_WIWI_COMMENTS_FLD','Quién puede ver/añadir comentarios :');
define('_AM_WIWI_HISTORY_FLD','Quién puede ver el índice historico de revisiones:');
define('_AM_WIWI_DELREDIR_FLD','Perfil repuesto:');

define('_AM_WIWI_SELECTACL_OPT','(elija)');
define('_AM_WIWI_READERS_OPT','Lectores');
define('_AM_WIWI_WRITERS_OPT','Editores');
define('_AM_WIWI_ADMINISTRATORS_OPT','Administradores');
define('_AM_WIWI_COMMENTS_NONE_OPT','(sin comentarios)');
define('_AM_WIWI_HISTORY_NONE_OPT','(sin historico)');
define('_AM_WIWI_DELCONFIRM_OPT','Sí: quiero suprimir este perfil de acceso.');

define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','todas las páginas');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','nombre');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','título');
define('_AM_WIWI_LISTPAGES_BODY_OPT','contenido');
define('_AM_WIWI_LISTPAGES_UID_OPT','ultimo autor');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','pariente');
define('_AM_WIWI_LISTPAGES_PRID_OPT','perfil');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','modificada');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','decreciente');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','creciente');

define('_AM_WIWI_LISTPAGE_NAV','páginas');
define('_AM_WIWI_HISTORY_NAV','historico');
define('_AM_WIWI_ACLADMIN_NAV','privilegios (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "bloques y grupos");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Seleccione una página');
define('_AM_WIWI_CONFIRMDEL_MSG','¿Está seguro de suprimir esta página?');
define('_AM_WIWI_CONFIRMFIX_MSG','¿Está seguro de suprimir todas las revisiones anteriores a ésta?');
define('_AM_WIWI_CONFIRMCLEAN_MSG','¿Está seguro de suprimir las revisiones más antiguas?');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Perfil guardado en la base de datos');
define('_AM_WIWI_PRFSAVEFAILED_MSG','Error durante la grabación del perfil.');
define('_AM_WIWI_ERRDELETE_MSG','Error: fue imposible suprimir el perfil');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Perfil suprimido con exito.');
define('_AM_WIWI_PRFDELFAILED_MSG','Error durante la supresión del perfil.');
?>
