<?php
// $Id$
// Module Info
//Dutch translation Shine

// The name of this module
define('_MI_WIWIMOD_NAME','Wiwi');

// A brief description of this module
define('_MI_WIWIMOD_DESC','Een wiki-achtige tool.');

// Admin menu
define('_MI_WIWIMOD_ADMENU1','Pagina\'s ');
define('_MI_WIWIMOD_ADMENU2','Toegangsrechten');
define('_MI_WIWIMOD_ADMENU3','Blocks/Groepen');
define('_MI_WIWIMOD_ADMENU4','Over...');

// Admin options
define('_MI_WIWIMOD_EDITOR','Welke editor moet wiwi gebruiken?');
define('_MI_WIWIMOD_EDITOR_DESC','Beschrijving editor');
define('_MI_WIWIMOD_DEFAULTPROFILE','Standaard Profiel');
// Default profile description was added in re-release, see below
define('_MI_WIWIMOD_ALLOWPDF','PDF button op pagina\'s tonen?');
define('_MI_WIWIMOD_ALLOWPDF_DESC','ATTENTIE: De HTML naar PDF generatie verkeert nog in een experimentele fase. Zodra er afbeeldingen in een wiwi pagina aanwezig zijn kunnen er problemen optreden.');

define('_MI_WIWIMOD_SHOWTITLES','Toon de pagina titels in plaats van de PaginaNaamLink');
define('_MI_WIWIMOD_SHOWTITLES_DESC','Toon de pagina titels in plaats van de pagina linknamen opgemaakt in CamelCase/Wiwilinks');

define('_MI_WIWIMOD_USECAMELCASE','Use CamelCase syntax');
define('_MI_WIWIMOD_USECAMELCASE_DESC','Interprets CamelCase words as links to other wiki pages.');

//Added for wiwi 0.8.2
define('_MI_WIWIMOD_XOOPSEDITOR','Kies een door Xoops ondersteunde "XoopsEditor" ');
define('_MI_WIWIMOD_XOOPSEDITOR_DESC','Alleen geldig indien in bovenstaande setting de XoopsEditor is gekozen');

// Notification options
define('_MI_WIWIMOD_PAGENOTIFYCAT_TITLE','Pagina');
define('_MI_WIWIMOD_PAGENOTIFYCAT_DESC','Kennisgevingen die betrekking hebben op de huidige pagina');
define('_MI_WIWIMOD_PAGENOTIFY_TITLE','Pagina bijgewerkt');
define('_MI_WIWIMOD_PAGENOTIFY_CAPTION','Stuur mij een kennisgeving zodra deze pagina is bijgewerkt.');
define('_MI_WIWIMOD_PAGENOTIFY_DESC','Ontvang een kennisgeving zodra deze pagina doort willekeurige gebruiker is bijgewerkt.');
define('_MI_WIWIMOD_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} automatische-kennisgeving : pagina bijgewerkt');
/* Added in version 0.83 Re-release */
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_DESC','Notifications that apply to the all pages');
define('_MI_WIWIMOD_GLOBALNOTIFY_TITLE','Page updated');
define('_MI_WIWIMOD_GLOBALNOTIFY_CAPTION','Notify me when any page is modified');
define('_MI_WIWIMOD_GLOBALNOTIFY_DESC','Receive notification when any user updates any page.');
define('_MI_WIWIMOD_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page updated');

define('_MI_WIWIMOD_TEMPLATE_VIEW_DESC','View Wiwi Page');
define('_MI_WIWIMOD_TEMPLATE_EDIT_DESC','Edit Wiwi Page');
define('_MI_WIWIMOD_TEMPLATE_HISTORY_DESC','View page history');
define('_MI_WIWIMOD_TEMPLATE_PDF_DESC','WiwiMod - pdf');
define('_MI_WIWIMOD_BLOCK_TOC_NAME','Wiwi TOC');
define('_MI_WIWIMOD_BLOCK_TOC_DESC','Wiwi selected entry pages');
define('_MI_WIWIMOD_BLOCK_RECENT_NAME','Wiwi Recent');
define('_MI_WIWIMOD_BLOCK_RECENT_DESC','Wiwi recently modified');
define('_MI_WIWIMOD_BLOCK_RELATED_NAME','WiwiSideContent');
define('_MI_WIWIMOD_BLOCK_RELATED_DESC','Side block for extra content on Wiwi pages');
define('_MI_WIWIMOD_BLOCK_SHOWPAGE_NAME','WiwiShowPage');
define('_MI_WIWIMOD_BLOCK_SHOWPAGE_DESC','Show a wiwi page');
define('_MI_WIWIMOD_AUTHOR_WORD','<h4>About Wiwi 0.8.3</h4><br />Wiwi is GPL software ; visit Wiwi home page at <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">www.zonatim.com</a> to support or get help.<br /><br />If you\'ve just migrated from an older Wiwi version (0.7.1 or less), please click here : <input type="button" value="UPGRADE" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'../manual.html\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');

?>