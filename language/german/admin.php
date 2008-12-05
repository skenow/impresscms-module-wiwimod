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


define('_AM_SWIKI_ADMIN_TXT','Module Benutzerrechte (ACL)');
define('_AM_SWIKI_PAGESFILTER_TXT','Show pages where');
define('_AM_SWIKI_LIKE_TXT','contains');
define('_AM_SWIKI_PROFILEIS_TXT','is');
define('_AM_SWIKI_ORDERBY_TXT',', sortiert nach');
define('_AM_SWIKI_LISTPAGES_RESULTS_TXT','results');

define('_AM_SWIKI_SELECTACL_BOX','');
define('_AM_SWIKI_SELECTACL_TXT','Profil bearbeiten:');
define('_AM_SWIKI_CREATEACL_TXT','Neues Profil erstellen:');
define('_AM_SWIKI_EDITACL_TXT','Profileigenschaften');
define('_AM_SWIKI_ACLHELP_TXT','
	<p>Die Wiki Benutzerrechte bestehen aus Profilen, die bestimmten Gruppen Lese-, Schreib- oder Administrationsrechte für definierte Wiwi-Seiten einräumen.</p>
	<ul>
		<li>Benutzer mit Schreibberechtigung können Seiten verändern und neue Seiten mit dem gleichen Profil erstellen.</li>
		<li>Benutzer mit Administrationsberechtigung können die Seitenprofile im Rahmen ihrer zugeordneten Administrationsrechte verändern.</li></ul>
	<p>Neue Seiten erhalten per Voreinstellung das Profil ihrer Ausgangsseite.</p>
	<p>Die Benutzerprofile definieren ebenfalls die Lese- und Schreibberechtigungen für die Kommentare. Das ist nützlich, um z.B. private Kommentare auf öffentlichen Seiten zu ermöglichen.</p>
	<p>Beachte: Webmaster haben immer vollständige Benutzerrechte für alle Seiten.</p>
	');
define('_AM_SWIKI_DELCONFIRMTITLE_TXT','Bestätigung der Profillöschung');
define('_AM_SWIKI_DELCONFIRM_TXT','Konten-Löschung durch Aktivierung der Checkbox bestätigen.');
define('_AM_SWIKI_DELREDIR_TXT','Neues Profil für die entsprechenden Seiten.');

define('_AM_SWIKI_LISTPAGES_BTN','<< Back to pages list');
define('_AM_SWIKI_CREATEACL_BTN','Neu');
define('_AM_SWIKI_EDITACL_SAVE_BTN','Speichern');
define('_AM_SWIKI_EDITACL_DELETE_BTN','Löschen');
define('_AM_SWIKI_EDITACL_CANCEL_BTN','Abbrechen');
define('_AM_SWIKI_CLEANUPDB_BTN','Datenbank aufräumen');


define('_AM_SWIKI_ACLNAME_FLD','Profilename');
define('_AM_SWIKI_ACLDESC_FLD','Profilbeschreibung');
define('_AM_SWIKI_READERS_FLD','Leseberechtigte');
define('_AM_SWIKI_WRITERS_FLD','Schreibberechtigte');
define('_AM_SWIKI_ADMINISTRATORS_FLD','Administratoren');
define('_AM_SWIKI_COMMENTS_FLD','Lese- und Schreibberechtigung für Kommentare');
define('_AM_SWIKI_HISTORY_FLD','Who can access page revisions history :');
define('_AM_SWIKI_DELREDIR_FLD','Ersatzprofil:');

define('_AM_SWIKI_SELECTACL_OPT','(wähle)');
define('_AM_SWIKI_READERS_OPT','Leseberechtigung');
define('_AM_SWIKI_WRITERS_OPT','Schreibberechtigung');
define('_AM_SWIKI_ADMINISTRATORS_OPT','Administrationsberechtigung');
define('_AM_SWIKI_COMMENTS_NONE_OPT','(Keine Kommentare)');
define('_AM_SWIKI_HISTORY_NONE_OPT','(Keine Historie)');
define('_AM_SWIKI_DELCONFIRM_OPT','JA, ich möchte das Profil löschen.');

define('_AM_SWIKI_LISTPAGES_ALLPAGES_OPT','Alle Seiten');
define('_AM_SWIKI_LISTPAGES_KEYWORD_OPT','Name');
define('_AM_SWIKI_LISTPAGES_TITLE_OPT','Titel');
define('_AM_SWIKI_LISTPAGES_BODY_OPT','Inhalt');
define('_AM_SWIKI_LISTPAGES_UID_OPT','Letzter Autor');
define('_AM_SWIKI_LISTPAGES_PARENT_OPT','parent');
define('_AM_SWIKI_LISTPAGES_PRID_OPT','profile');
define('_AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT','Letzte Änderung');
define('_AM_SWIKI_LISTPAGES_ORDERDESC_OPT','absteigend');
define('_AM_SWIKI_LISTPAGES_ORDERASC_OPT','aufsteigend');

define('_AM_SWIKI_LISTPAGE_NAV','browse pages');
define('_AM_SWIKI_HISTORY_NAV','geschichte');
define('_AM_SWIKI_ACLADMIN_NAV','privileges (ACL)');
define("_AM_SWIKI_BLOCKSNGROUPS_NAV", "Blöcke und Gruppen");

define('_AM_SWIKI_NOPAGESPECIFIED_MSG','Bitte wählen Sie eine Seite');
define('_AM_SWIKI_CONFIRMDEL_MSG','Möchten Sie wirklich die Wiwi-Seite löschen');
define('_AM_SWIKI_CONFIRMFIX_MSG','Möchten Sie wirklich die Wiwi-Seite fixieren');
define('_AM_SWIKI_CONFIRMCLEAN_MSG','Möchten Sie wirklich die Datenbank aufrämen');
define('_AM_SWIKI_PRFSAVESUCCESS_MSG','Profil erfolgreich gespeichert');
define('_AM_SWIKI_PRFSAVEFAILED_MSG','Fehler! Profil wurde nicht erfolgreich gepeichert');
define('_AM_SWIKI_ERRDELETE_MSG','Fehler: Profil konnte nicht gelöscht werden');
define('_AM_SWIKI_PRFDELSUCCESS_MSG','Profil erfolgreich gelöscht');
define('_AM_SWIKI_PRFDELFAILED_MSG','Fehler! Profil wurde nicht erfolgreich gelöscht');
define('_AM_SWIKI_SYS_CFG','System-Konfiguration');
?>