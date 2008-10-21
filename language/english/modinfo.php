<?php
// $Id$
// Module Info

// The name of this module
define('_MI_WIWIMOD_NAME','Wiwi');

// A brief description of this module
define('_MI_WIWIMOD_DESC','A wysiwyg wiki tool.');

// Admin menu
define('_MI_WIWIMOD_ADMENU1','Pages');
define('_MI_WIWIMOD_ADMENU2','Privileges');
define('_MI_WIWIMOD_ADMENU3','Blocks/Groups');
define('_MI_WIWIMOD_ADMENU4','About...');

// Admin options
define('_MI_WIWIMOD_EDITOR','Which editor should Wiwi use');
define('_MI_WIWIMOD_EDITOR_DESC','');
define('_MI_WIWIMOD_DEFAULTPROFILE','Default profile');
// Default profile description was added in re-release, see below

define('_MI_WIWIMOD_ALLOWPDF','Show PDF button on pages ?');
define('_MI_WIWIMOD_ALLOWPDF_DESC','PDF generation from HTML pages is still at experimental level.');

define('_MI_WIWIMOD_SHOWTITLES','Show page titles instead of page name');
define('_MI_WIWIMOD_SHOWTITLES_DESC','Show page titles instead of page names in wiwilinks');

define('_MI_WIWIMOD_USECAMELCASE','Use CamelCase syntax');
define('_MI_WIWIMOD_USECAMELCASE_DESC','Interprets CamelCase words as links to other wiki pages.');

define('_MI_WIWIMOD_XOOPSEDITOR','Choose a "XoopsEditor" supported editor');
define('_MI_WIWIMOD_XOOPSEDITOR_DESC','Valid if XoopsEditor was chosen above');

// Notification options
define('_MI_WIWIMOD_PAGENOTIFYCAT_TITLE','Page');
define('_MI_WIWIMOD_PAGENOTIFYCAT_DESC','Notifications that apply to the current page');
define('_MI_WIWIMOD_PAGENOTIFY_TITLE','Page updated');
define('_MI_WIWIMOD_PAGENOTIFY_CAPTION','Notify me when the current page is modified');
define('_MI_WIWIMOD_PAGENOTIFY_DESC','Receive notification when any user updates the current page.');
define('_MI_WIWIMOD_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page updated');
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
define('_MI_WIWIMOD_DEFAULTPROFILE_DESC','Default profile assigned to new pages');
if (!defined('_MI_WIWIMOD_WIWIHOME')){define('_MI_WIWIMOD_WIWIHOME','WiwiHome');}
?>