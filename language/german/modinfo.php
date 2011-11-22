<?php
// $Id: modinfo.php 8255 2009-04-11 18:20:13Z skenow $
// Module Info

// The name of this module
define('_MI_SWIKI_NAME','Wiwi');

// A brief description of this module
define('_MI_SWIKI_DESC','Ein Wiki mit WYSIWYG-Editor.');

// Admin menu
define('_MI_SWIKI_ADMENU1','Seiten');
define('_MI_SWIKI_ADMENU2','Benutzerrechte');
define('_MI_SWIKI_ADMENU3','Blöcke und Gruppen');
define('_MI_SWIKI_ADMENU4','Über...');
define('_MI_SWIKI_ADMENU5','Hilfe');

// Admin options
define('_MI_SWIKI_EDITOR','WYSIWYG-Editor');
define('_MI_SWIKI_EDITOR_DESC','');
define('_MI_SWIKI_DEFAULTPROFILE','Standardprofil');
// Default profile description was added in re-release, see below

define('_MI_SWIKI_ALLOWPDF','Zeige eine PDF Grafik auf den Seiten ?');
define('_MI_SWIKI_ALLOWPDF_DESC','PDF-Generierung von HTML-Seiten befindet sich noch im experimentellen Status.');

define('_MI_SWIKI_SHOWTITLES','Zeige Seite Titel anstelle der Seite Name');
define('_MI_SWIKI_SHOWTITLES_DESC','Show page titles instead of page names in wiwilinks');

define('_MI_SWIKI_USECAMELCASE','Benutze CamelCase Syntax');
define('_MI_SWIKI_USECAMELCASE_DESC','Interpretiert CamelCase-Wörter als einen Link zu einer anderen Wiki Seite. <br />Begriffserklärung: Als CamelCase bezeichnet man eine Schreibweise von zusammengesetzten Wörtern, bei der die einzelnen Wörter ohne Zwischenraum, aber jeweils mit einem Großbuchstaben am Anfang geschrieben werden [also mit so genannten Binnenversalien]');

define('_MI_SWIKI_XOOPSEDITOR','Choose a "Editor" supported editor');
define('_MI_SWIKI_XOOPSEDITOR_DESC','Valid if Editor was chosen above');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE','Seite');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC','Notifications that apply to the current page');
define('_MI_SWIKI_PAGENOTIFY_TITLE','Seite aktualisiert');
define('_MI_SWIKI_PAGENOTIFY_CAPTION','Notify me when the current page is modified');
define('_MI_SWIKI_PAGENOTIFY_DESC','Receive notification when any user updates the current page.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} Auto-Benachrichtigung : Seite aktualisiert');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC','Notifications that apply to the all pages');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE','Seite aktualisiert');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION','Benachrichtige mich, wenn die Seite aktualisiert wurde');
define('_MI_SWIKI_GLOBALNOTIFY_DESC','Receive notification when any user updates any page.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page updated');
define('_MI_SWIKI_TEMPLATE_VIEW_DESC','Zeite Wiwi Seite');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC','Bearbeite Wiwi Seite');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC','Zeige Seitenhistorie');
define('_MI_SWIKI_TEMPLATE_PDF_DESC','SimplyWiki - PDF');
define('_MI_SWIKI_BLOCK_TOC_NAME','Wiwi TOC');
define('_MI_SWIKI_BLOCK_TOC_DESC','Wiwi selected entry pages');
define('_MI_SWIKI_BLOCK_RECENT_NAME','Wiwi Recent');
define('_MI_SWIKI_BLOCK_RECENT_DESC','Wiwi recently modified');
define('_MI_SWIKI_BLOCK_RELATED_NAME','WiwiSideContent');
define('_MI_SWIKI_BLOCK_RELATED_DESC','Side block for extra content on Wiwi pages');
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME','WiwiShowPage');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC','Show a wiwi page');
define('_MI_SWIKI_AUTHOR_WORD','<h4>Help About SimpyWiki</h4><br />SimplyWiki is GPL software ; visit the community support page at <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> to support or get help.<br /><br />If you\'ve just migrated from an older Wiwi version (0.7.1 or less), please click here : <input type="button" value="UPGRADE" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC','Standard Profil für neue Seiten');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}

// Added in SimplyWiki 1.1
define('_MI_SWIKI_BLOCK_LISTPAGES_NAME','List Pages');
define('_MI_SWIKI_BLOCK_LISTPAGES_DESC','Zeige eine Liste der Seiten');
define('_MI_SWIKI_BLOCK_ADDPAGE_NAME','Erstellen einer neuen Seite');
define('_MI_SWIKI_BLOCK_ADDPAGE_DESC','Add a wiki page from anywhere on your site');
define('_MI_SWIKI_BLOCK_TAGCLOUD_NAME','Wiki Tag Cloud');
define('_MI_SWIKI_BLOCK_TAGCLOUD_DESC','A tag cloud for SimplyWiki');
define('_MI_SWIKI_BLOCK_TAG_NAME','Wiki Top Tags');
define('_MI_SWIKI_BLOCK_TAG_DESC','A list of top tags for SimplyWiki');
define('_MI_SWIKI_PAGEINFO','Zeige Information zur Seite');
define('_MI_SWIKI_PAGEINFO_DESC', 'Welche Details zur Seite sollen angezeigt werden.');
define('_MI_SWIKI_SHOWREVISIONS','Zeige Versionsnummern');
define('_MI_SWIKI_SHOWVIEWS','Zeige die Zahl Ansichten');
define('_MI_SWIKI_SHOWCREATED','Zeige Erstellungsdatum und Ersteller');
define('_MI_SWIKI_SHOWLASTREVISED','Zeige Datum der letzten Version');
define('_MI_SWIKI_LASTVIEWED','Zeige das Datum der letzten Ansicht');
define('_MI_SWIKI_USECAPTCHA','Verifizierung einschalten');
define('_MI_SWIKI_USECAPTCHA_DESC', 'Zeigt das CAPTCHA beim Bearbeiten an um Spam vorzubeugen');
define('_MI_SWIKI_SHOWQUICKADD','Aktivieren der Funktion "Schnelleintrag"');
define('_MI_SWIKI_SHOWQUICKADD_DESC', '<em>Ja</em> wählen zum Anzeigen der Funktion, allowing the editors to type a page name and go directly to editing the page');
define('_MI_SWIKI_TOPPAGE', 'Startseite des Modules');
define('_MI_SWIKI_TOPPAGE_DESC', 'Seitenname eingeben die auf der Hauptseite des Moduls angezeigt werden soll');

// Added in SimplyWiki 1.2
define('_MI_SWIKI_PAGERESTORE_TITLE','Seite wiederhergestellt');
define('_MI_SWIKI_PAGERESTORE_CAPTION','Notify me when a previous version of this page is restored');
define('_MI_SWIKI_PAGERESTORE_DESC','Receive notification when any user restores a previous vesion of this page');
define('_MI_SWIKI_PAGERESTORE_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_TITLE','Page restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_CAPTION','Notify me when a previous version of any page is restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_DESC','Receive notification when any user restores a previous vesion of any page');
define('_MI_SWIKI_GLOBALPAGERESTORE_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page restored');
