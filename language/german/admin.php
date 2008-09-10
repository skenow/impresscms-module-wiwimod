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


define('_AM_WIWI_ADMIN_TXT','Module Benutzerrechte (ACL)');
define('_AM_WIWI_PAGESFILTER_TXT','Show pages where');
define('_AM_WIWI_LIKE_TXT','contains');
define('_AM_WIWI_PROFILEIS_TXT','is');
define('_AM_WIWI_ORDERBY_TXT',', ordered by');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','results');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','Profil bearbeiten:');
define('_AM_WIWI_CREATEACL_TXT','Neues Profil erstellen:');
define('_AM_WIWI_EDITACL_TXT','Profileigenschaften');
define('_AM_WIWI_ACLHELP_TXT','
	<p>Die Wiwi Benutzerrechte bestehen aus Profilen, die bestimmten Gruppen Lese-, Schreib- oder Administrationsrechte für definierte Wiwi-Seiten einr&auml;umen.</p>
	<ul>
		<li>Benutzer mit Schreibberechtigung können Seiten ver&auml;ndern und neue Seiten mit dem gleichen Profil erstellen.</li>
		<li>Benutzer mit Administrationsberechtigung können die Seitenprofile im Rahmen ihrer zugeordneten Administrationsrechte ver&auml;ndern.</li></ul>
	<p>Neue Seiten erhalten per Voreinstellung das Profil ihrer Ausgangsseite.</p>
	<p>Die Benutzerprofile definieren ebenfalls die Lese- und Schreibberechtigungen für die Kommentare. Das ist n&uuml;tzlich, um z.B. private Kommentare auf &ouml;ffentlichen Seiten zu erm&ouml;glichen.</p>
	<p>Beachte: Xoops Webmaster haben immer vollst&auml;ndige Benutzerrechte f&uuml;r alle Seiten.</p>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','Best&auml;tigung der Profill&ouml;schung');
define('_AM_WIWI_DELCONFIRM_TXT','Profill&ouml;schung durch Aktivierung der Checkbox best&auml;tigen.');
define('_AM_WIWI_DELREDIR_TXT','Neues Profil für die entsprechenden Seiten.');

define('_AM_WIWI_LISTPAGES_BTN','<< Back to pages list');
define('_AM_WIWI_CREATEACL_BTN','Neu');
define('_AM_WIWI_EDITACL_SAVE_BTN','Speichern');
define('_AM_WIWI_EDITACL_DELETE_BTN','L&ouml;schen');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Abbrechen');
define('_AM_WIWI_CLEANUPDB_BTN','Datenbank aufr&auml;umen');


define('_AM_WIWI_ACLNAME_FLD','Profilename');
define('_AM_WIWI_ACLDESC_FLD','Profilbeschreibung');
define('_AM_WIWI_READERS_FLD','Leseberechtigte');
define('_AM_WIWI_WRITERS_FLD','Schreibberechtigte');
define('_AM_WIWI_ADMINISTRATORS_FLD','Administratoren');
define('_AM_WIWI_COMMENTS_FLD','Lese- und Schreibberechtigung für Kommentare');
define('_AM_WIWI_HISTORY_FLD','Who can access page revisions history :');
define('_AM_WIWI_DELREDIR_FLD','Ersatzprofil:');

define('_AM_WIWI_SELECTACL_OPT','(w&auml;hle)');
define('_AM_WIWI_READERS_OPT','Leseberechtigung');
define('_AM_WIWI_WRITERS_OPT','Schreibberechtigung');
define('_AM_WIWI_ADMINISTRATORS_OPT','Administrationsberechtigung');
define('_AM_WIWI_COMMENTS_NONE_OPT','(Keine Kommentare)');
define('_AM_WIWI_HISTORY_NONE_OPT','(no history)');
define('_AM_WIWI_DELCONFIRM_OPT','JA, ich m&ouml;chte das Profil l&ouml;schen.');
define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','all pages');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','name');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','title');
define('_AM_WIWI_LISTPAGES_BODY_OPT','content');
define('_AM_WIWI_LISTPAGES_UID_OPT','last author');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','parent');
define('_AM_WIWI_LISTPAGES_PRID_OPT','profile');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','last modified');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','descending');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','ascending');

define('_AM_WIWI_LISTPAGE_NAV','browse pages');
define('_AM_WIWI_HISTORY_NAV','geschichte');
define('_AM_WIWI_ACLADMIN_NAV','privileges (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "blocks and groups");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Please select a page');
define('_AM_WIWI_CONFIRMDEL_MSG','M&ouml;chten Sie wirklich die Wiwi-Seite l&ouml;schen');
define('_AM_WIWI_CONFIRMFIX_MSG','M&ouml;chten Sie wirklich die Wiwi-Seite fixieren');
define('_AM_WIWI_CONFIRMCLEAN_MSG','M&ouml;chten Sie wirklich die Datenbank aufr&auml;men');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Profil erfolgreich gespeichert');
define('_AM_WIWI_PRFSAVEFAILED_MSG','Fehler! Profil wurde nicht erfolgreich gepeichert');
define('_AM_WIWI_ERRDELETE_MSG','Fehler: Profil konnte nicht gel&ouml;scht werden');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Profil erfolgreich gel&ouml;scht');
define('_AM_WIWI_PRFDELFAILED_MSG','Fehler! Profil wurde nicht erfolgreich gel&ouml;scht');




?>

