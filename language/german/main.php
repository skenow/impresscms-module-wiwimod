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
 * @package Wiwimod
 * @version $Id$
 */

define('_MD_SWIKI_MODIFIED_TXT', 'Aktualisierung ');
define('_MD_SWIKI_BY','von');
define('_MD_SWIKI_HISTORY_TXT','Historie');
define('_MD_SWIKI_EDIT_TXT','Seite bearbeiten');
define('_MD_SWIKI_BODY_TXT','Inhalt');
define('_MD_SWIKI_DIFF_TXT','Unterschied zwischen aktueller und letzter Revisions');
define('_MD_SWIKI_THISPAGE','Dieser Seite');

//define('_MD_WIWI_EDIT_BTN','Edit');
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_SWIKI_SUBMITREVISION_BTN','Neue Revision');
define('_MD_SWIKI_QUIETSAVE_BTN','Speichern');
define('_MD_SWIKI_HISTORY_BTN','Historie');
define('_MD_SWIKI_PAGEVIEW_BTN','Zurück zu Seitenansicht');
define('_MD_SWIKI_VIEW_BTN','Ansicht');
define('_MD_SWIKI_RESTORE_BTN','Wiederherstellen');
define('_MD_SWIKI_FIX_BTN','Fix');
define('_MD_SWIKI_COMPARE_BTN','Vergleichen Sie');
define('_MD_SWIKI_SELEDITOR_BTN','(Rechtsklick zum Auswählen eines Editors)');

define('_MD_SWIKI_TITLE_FLD','Titel');
define('_MD_SWIKI_BODY_FLD','Inhalt');
define('_MD_SWIKI_VISIBLE_FLD','Sichtbar');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Inhalt des Seitenblock');
define('_MD_SWIKI_PARENT_FLD','Bezugsseite');
define('_MD_SWIKI_PROFILE_FLD','Benutzerprofil');

define('_MD_SWIKI_TITLE_COL','Titel');
define('_MD_SWIKI_MODIFIED_COL','Aktualisierung');
define('_MD_SWIKI_AUTHOR_COL','Autor');
define('_MD_SWIKI_ACTION_COL','Aktion');
define('_MD_SWIKI_KEYWORD_COL','Seiten ID');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"Die Seite existiert bisher nicht.");
define('_MD_SWIKI_DBUPDATED_MSG','Datenbank erfolgreich aktualisiert!');
define('_MD_SWIKI_ERRORINSERT_MSG','Fehler beim Aktualisieren der Datenbank!');
define('_MD_SWIKI_EDITCONFLICT_MSG','Ungültige Angaben! - Die &Auml;nderungen wurden abgelehnt!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br><h4>Entschuldigung, die Ansicht dieser Seite erfordert weitergehende Benutzerrechte.</h4><br>');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br><h4>Entschuldigung, Sie haben keine Berechtigung zum Bearbeiten dieser Seite.</h4><br>');

// Wiwi special pages -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage'); }// Also need in modinfo.php
define('_MI_SWIKI_404','IllegalName');

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Zusammenfassung der Änderung(en)');
define('_MI_SWIKI_ALLOW_COMMENTS','Kommantare zulassen');
define('_MD_SWIKI_ADDPAGE_BTN','Seite hinzufügen');
define('_MD_SWIKI_ADDPAGE','Neue Seite erstellen');
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