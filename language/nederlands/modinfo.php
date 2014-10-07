<?php
// $Id$
// Module Info
//Dutch translation Shine

// The name of this module
define('_MI_SWIKI_NAME','Wiwi');

// A brief description of this module
define('_MI_SWIKI_DESC','Een wiki-achtige tool.');

// Admin menu
define('_MI_SWIKI_ADMENU1','Pagina\'s ');
define('_MI_SWIKI_ADMENU2','Toegangsrechten');
define('_MI_SWIKI_ADMENU3','Blocks/Groepen');
define('_MI_SWIKI_ADMENU4','Over...');
define('_MI_SWIKI_ADMENU5','Help');

// Admin options
define('_MI_SWIKI_EDITOR','Welke editor moet wiwi gebruiken?');
define('_MI_SWIKI_EDITOR_DESC','Beschrijving editor');
define('_MI_SWIKI_DEFAULTPROFILE','Standaard Profiel');
// Default profile description was added in re-release, see below
define('_MI_SWIKI_ALLOWPDF','PDF button op pagina\'s tonen?');
define('_MI_SWIKI_ALLOWPDF_DESC','ATTENTIE: De HTML naar PDF generatie verkeert nog in een experimentele fase. Zodra er afbeeldingen in een wiwi pagina aanwezig zijn kunnen er problemen optreden.');

define('_MI_SWIKI_SHOWTITLES','Toon de pagina titels in plaats van de PaginaNaamLink');
define('_MI_SWIKI_SHOWTITLES_DESC','Toon de pagina titels in plaats van de pagina linknamen opgemaakt in CamelCase/Wiwilinks');

define('_MI_SWIKI_USECAMELCASE','Use CamelCase syntax');
define('_MI_SWIKI_USECAMELCASE_DESC','Interprets CamelCase words as links to other wiki pages.');

//Added for wiwi 0.8.2
define('_MI_SWIKI_XOOPSEDITOR','Kies een door Xoops ondersteunde "XoopsEditor" ');
define('_MI_SWIKI_XOOPSEDITOR_DESC','Alleen geldig indien in bovenstaande setting de XoopsEditor is gekozen');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE','Pagina');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC','Kennisgevingen die betrekking hebben op de huidige pagina');
define('_MI_SWIKI_PAGENOTIFY_TITLE','Pagina bijgewerkt');
define('_MI_SWIKI_PAGENOTIFY_CAPTION','Stuur mij een kennisgeving zodra deze pagina is bijgewerkt.');
define('_MI_SWIKI_PAGENOTIFY_DESC','Ontvang een kennisgeving zodra deze pagina doort willekeurige gebruiker is bijgewerkt.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} automatische-kennisgeving : pagina bijgewerkt');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC','Notifications that apply to the all pages');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE','Page updated');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION','Notify me when any page is modified');
define('_MI_SWIKI_GLOBALNOTIFY_DESC','Receive notification when any user updates any page.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page updated');

define('_MI_SWIKI_TEMPLATE_VIEW_DESC','View Wiwi Page');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC','Edit Wiwi Page');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC','View page history');
define('_MI_SWIKI_TEMPLATE_PDF_DESC','SimplyWiki - pdf');
define('_MI_SWIKI_BLOCK_TOC_NAME','Wiwi TOC');
define('_MI_SWIKI_BLOCK_TOC_DESC','Wiwi selected entry pages');
define('_MI_SWIKI_BLOCK_RECENT_NAME','Wiwi Recent');
define('_MI_SWIKI_BLOCK_RECENT_DESC','Wiwi recently modified');
define('_MI_SWIKI_BLOCK_RELATED_NAME','WiwiSideContent');
define('_MI_SWIKI_BLOCK_RELATED_DESC','Side block for extra content on Wiwi pages');
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME','WiwiShowPage');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC','Show a wiwi page');
define('_MI_SWIKI_AUTHOR_WORD','<h4>Help About SimplyWiki</h4><br />SimplyWiki is GPL software ; visit the community support page at <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> to support or get help.<br /><br /><a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC','Default profile assigned to new pages');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}

// Added in SimplyWiki 1.1
define('_MI_SWIKI_BLOCK_LISTPAGES_NAME','List Pages');
define('_MI_SWIKI_BLOCK_LISTPAGES_DESC','Display a list of pages');
define('_MI_SWIKI_BLOCK_ADDPAGE_NAME','Add Page');
define('_MI_SWIKI_BLOCK_ADDPAGE_DESC','Add a wiki page from anywhere on your site');
define('_MI_SWIKI_BLOCK_TAGCLOUD_NAME','Wiki Tag Cloud');
define('_MI_SWIKI_BLOCK_TAGCLOUD_DESC','A tag cloud for SimplyWiki');
define('_MI_SWIKI_BLOCK_TAG_NAME','Wiki Top Tags');
define('_MI_SWIKI_BLOCK_TAG_DESC','A list of top tags for SimplyWiki');
define('_MI_SWIKI_PAGEINFO','Show Page Information');
define('_MI_SWIKI_PAGEINFO_DESC', 'Select which page details to display with the page');
define('_MI_SWIKI_SHOWREVISIONS','Show number of revisions');
define('_MI_SWIKI_SHOWVIEWS','Show number of views');
define('_MI_SWIKI_SHOWCREATED','Show date created and creator');
define('_MI_SWIKI_SHOWLASTREVISED','Show date of last revision');
define('_MI_SWIKI_LASTVIEWED','Show date last viewed');
define('_MI_SWIKI_USECAPTCHA','Enable CAPTCHA');
define('_MI_SWIKI_USECAPTCHA_DESC', 'Display CAPTCHA on edit form');
define('_MI_SWIKI_SHOWQUICKADD','Enable the Quick Add feature');
define('_MI_SWIKI_SHOWQUICKADD_DESC', 'Setting to <em>Yes</em> displays the Quick Add field, allowing the editors to type a page name and go directly to editing the page');
define('_MI_SWIKI_TOPPAGE', 'Index Page');
define('_MI_SWIKI_TOPPAGE_DESC', 'Page to be shown on the main page of the module');

// Added in SimplyWiki 1.2
define('_MI_SWIKI_PAGERESTORE_TITLE','Page restored');
define('_MI_SWIKI_PAGERESTORE_CAPTION','Notify me when a previous version of this page is restored');
define('_MI_SWIKI_PAGERESTORE_DESC','Receive notification when any user restores a previous version of this page');
define('_MI_SWIKI_PAGERESTORE_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_TITLE','Page restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_CAPTION','Notify me when a previous version of any page is restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_DESC','Receive notification when any user restores a previous version of any page');
define('_MI_SWIKI_GLOBALPAGERESTORE_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page restored');
