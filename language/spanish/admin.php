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

//Traducci�n por debianus
define('_AM_SWIKI_ADMIN_TXT','Administraci�n del m�dulo');
define('_AM_SWIKI_PAGESFILTER_TXT','Listar las p�ginas en que ');
define('_AM_SWIKI_LIKE_TXT','contiene');
define('_AM_SWIKI_PROFILEIS_TXT','es');
define('_AM_SWIKI_ORDERBY_TXT',', ordenado por');
define('_AM_SWIKI_LISTPAGES_RESULTS_TXT','resultados');

define('_AM_SWIKI_SELECTACL_BOX','');
define('_AM_SWIKI_SELECTACL_TXT','modifique un perfil:');
define('_AM_SWIKI_CREATEACL_TXT','o cree une nuevo:');
define('_AM_SWIKI_EDITACL_TXT','Datos del perfil');
define('_AM_SWIKI_ACLHELP_TXT','
	<p>El sistema de privilegios de acceso est� relacionado con los grupos de usuarios que haya creado, pudiendo seleccionar los que est�n autorizados a leer, modificar o administrar las p�ginas correspondientes.</p>
	<ul>
		<li>Los editores pueden modificar la p�gina actual y crear nuevas p�ginas con el mismo perfil de privilegios.</li>
		<li>Los administradores pueden cambiar el perfil de una p�gina por otro de su elecci�n del que tengan derechos de administrador tambien).</li></ul>
	<p>El perfil inicial de una p�gina es el de su p�gina superior en la jerarqu�a.</p>
	<p>Los perfiles tambien sirven para administrar el acceso a los comentarios. Esto permite por ejemplo admitir comentarios privados en p�ginas p�blicas...</p>
	<p>Nota: los administradores tienen privilegios de administrador en todas las p�ginas.</p>
	');
define('_AM_SWIKI_DELCONFIRMTITLE_TXT','CONFIRMACION DE SUPRESION');
define('_AM_SWIKI_DELCONFIRM_TXT','Va a suprimir un perfil: confirme su intenci�n.');
define('_AM_SWIKI_DELREDIR_TXT','Elija un perfil para las p�ginas actualmente protegidas por el que est� suprimiendo.');

define('_AM_SWIKI_LISTPAGES_BTN','<< Vuelta a la lista de p�ginas');
define('_AM_SWIKI_CREATEACL_BTN','Nuevo');
define('_AM_SWIKI_EDITACL_SAVE_BTN','Guardar');
define('_AM_SWIKI_EDITACL_DELETE_BTN','Suprimir');
define('_AM_SWIKI_EDITACL_CANCEL_BTN','Cancelar');
define('_AM_SWIKI_CLEANUPDB_BTN','Limpiar la base de datos');


define('_AM_SWIKI_ACLNAME_FLD','Nombre del perfil');
define('_AM_SWIKI_ACLDESC_FLD','Descripcci�n');
define('_AM_SWIKI_READERS_FLD','Grupos con acceso de lectura');
define('_AM_SWIKI_WRITERS_FLD','Grupos con acceso de edici�n');
define('_AM_SWIKI_ADMINISTRATORS_FLD','Grupos administradores');
define('_AM_SWIKI_COMMENTS_FLD','Qui�n puede ver/a�adir comentarios :');
define('_AM_SWIKI_HISTORY_FLD','Qui�n puede ver el �ndice historico de revisiones:');
define('_AM_SWIKI_DELREDIR_FLD','Perfil repuesto:');

define('_AM_SWIKI_SELECTACL_OPT','(elija)');
define('_AM_SWIKI_READERS_OPT','Lectores');
define('_AM_SWIKI_WRITERS_OPT','Editores');
define('_AM_SWIKI_ADMINISTRATORS_OPT','Administradores');
define('_AM_SWIKI_COMMENTS_NONE_OPT','(sin comentarios)');
define('_AM_SWIKI_HISTORY_NONE_OPT','(sin historico)');
define('_AM_SWIKI_DELCONFIRM_OPT','S�: quiero suprimir este perfil de acceso.');

define('_AM_SWIKI_LISTPAGES_ALLPAGES_OPT','todas las p�ginas');
define('_AM_SWIKI_LISTPAGES_KEYWORD_OPT','nombre');
define('_AM_SWIKI_LISTPAGES_TITLE_OPT','t�tulo');
define('_AM_SWIKI_LISTPAGES_BODY_OPT','contenido');
define('_AM_SWIKI_LISTPAGES_UID_OPT','ultimo autor');
define('_AM_SWIKI_LISTPAGES_PARENT_OPT','pariente');
define('_AM_SWIKI_LISTPAGES_PRID_OPT','perfil');
define('_AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT','modificada');
define('_AM_SWIKI_LISTPAGES_ORDERDESC_OPT','decreciente');
define('_AM_SWIKI_LISTPAGES_ORDERASC_OPT','creciente');

define('_AM_SWIKI_LISTPAGE_NAV','p�ginas');
define('_AM_SWIKI_HISTORY_NAV','historico');
define('_AM_SWIKI_ACLADMIN_NAV','privilegios (ACL)');
define("_AM_SWIKI_BLOCKSNGROUPS_NAV", "bloques y grupos");

define('_AM_SWIKI_NOPAGESPECIFIED_MSG','Seleccione una p�gina');
define('_AM_SWIKI_CONFIRMDEL_MSG','�Est� seguro de suprimir esta p�gina?');
define('_AM_SWIKI_CONFIRMFIX_MSG','�Est� seguro de suprimir todas las revisiones anteriores a �sta?');
define('_AM_SWIKI_CONFIRMCLEAN_MSG','�Est� seguro de suprimir las revisiones m�s antiguas?');
define('_AM_SWIKI_PRFSAVESUCCESS_MSG','Perfil guardado en la base de datos');
define('_AM_SWIKI_PRFSAVEFAILED_MSG','Error durante la grabaci�n del perfil.');
define('_AM_SWIKI_ERRDELETE_MSG','Error: fue imposible suprimir el perfil');
define('_AM_SWIKI_PRFDELSUCCESS_MSG','Perfil suprimido con exito.');
define('_AM_SWIKI_PRFDELFAILED_MSG','Error durante la supresi�n del perfil.');
?>