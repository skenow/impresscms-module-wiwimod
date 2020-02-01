<?php
// $Id$
// Module Info

// The name of this module
define('_MI_SWIKI_NAME', 'SimplyWiki');

// A brief description of this module
define('_MI_SWIKI_DESC', 'A wysiwyg wiki tool.');

// Admin menu
define('_MI_SWIKI_ADMENU1', 'Pages');
define('_MI_SWIKI_ADMENU2', 'Privileges');
define('_MI_SWIKI_ADMENU3', 'Blocks/Groups');
define('_MI_SWIKI_ADMENU4', 'About...');
define('_MI_SWIKI_ADMENU5', 'Help');

// Admin options
define('_MI_SWIKI_EDITOR', 'Which editor should SimplyWiki use');
define('_MI_SWIKI_EDITOR_DESC', '');
define('_MI_SWIKI_DEFAULTPROFILE', 'Default profile');
// Default profile description was added in re-release, see below

define('_MI_SWIKI_ALLOWPDF', 'Show PDF button on pages ?');
define('_MI_SWIKI_ALLOWPDF_DESC', 'PDF generation from HTML pages is still at experimental level.');

define('_MI_SWIKI_SHOWTITLES', 'Show page titles instead of page name');
define('_MI_SWIKI_SHOWTITLES_DESC', 'Show page titles instead of page names in wikilinks');

define('_MI_SWIKI_USECAMELCASE', 'Use CamelCase syntax');
define('_MI_SWIKI_USECAMELCASE_DESC', 'Interprets CamelCase words as links to other wiki pages.');

define('_MI_SWIKI_XOOPSEDITOR', 'Choose a "XoopsEditor" supported editor');
define('_MI_SWIKI_XOOPSEDITOR_DESC', 'Valid if XoopsEditor was chosen above');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE', 'Page');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC', 'Notifications that apply to the current page');
define('_MI_SWIKI_PAGENOTIFY_TITLE', 'Page updated');
define('_MI_SWIKI_PAGENOTIFY_CAPTION', 'Notify me when the current page is modified');
define('_MI_SWIKI_PAGENOTIFY_DESC', 'Receive notification when any user updates the current page.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT', '[{X_SITENAME}] {X_MODULE} auto-notify : page updated');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE', 'Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC', 'Notifications that apply to the all pages');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE', 'Page updated');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION', 'Notify me when any page is modified');
define('_MI_SWIKI_GLOBALNOTIFY_DESC', 'Receive notification when any user updates any page.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT', '[{X_SITENAME}] {X_MODULE} auto-notify : page updated');
define('_MI_SWIKI_TEMPLATE_VIEW_DESC', 'View Wiki Page');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC', 'Edit Wiki Page');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC', 'View page history');
define('_MI_SWIKI_TEMPLATE_PDF_DESC', 'SimplyWiki - pdf');
define('_MI_SWIKI_BLOCK_TOC_NAME', 'Wiki TOC');
define('_MI_SWIKI_BLOCK_TOC_DESC', 'Wiki selected entry pages');
define('_MI_SWIKI_BLOCK_RECENT_NAME', 'Wiki Recent');
define('_MI_SWIKI_BLOCK_RECENT_DESC', 'Wiki recently modified');
define('_MI_SWIKI_BLOCK_RELATED_NAME', 'WikiSideContent');
define('_MI_SWIKI_BLOCK_RELATED_DESC', 'Side block for extra content on Wiki pages');
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME', 'WikiShowPage');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC', 'Show a wiki page');
define('_MI_SWIKI_AUTHOR_WORD', '<h4>About SimplyWiki</h4><br />SimplyWiki is GPL software ; visit the community support page at <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> to support or get help.<br /><br /><a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC', 'Default profile assigned to new pages');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME', 'HomePage');}

// Added in SimplyWiki 1.1
define('_MI_SWIKI_BLOCK_LISTPAGES_NAME', 'List Pages');
define('_MI_SWIKI_BLOCK_LISTPAGES_DESC', 'Display a list of pages');
define('_MI_SWIKI_BLOCK_ADDPAGE_NAME', 'Add Page');
define('_MI_SWIKI_BLOCK_ADDPAGE_DESC', 'Add a wiki page from anywhere on your site');
define('_MI_SWIKI_PAGEINFO', 'Show Page Information');
define('_MI_SWIKI_PAGEINFO_DESC', 'Select which page details to display with the page');
define('_MI_SWIKI_SHOWREVISIONS', 'Show number of revisions');
define('_MI_SWIKI_SHOWVIEWS', 'Show number of views');
define('_MI_SWIKI_SHOWCREATED', 'Show date created and creator');
define('_MI_SWIKI_SHOWLASTREVISED', 'Show date of last revision');
define('_MI_SWIKI_LASTVIEWED', 'Show date last viewed');
define('_MI_SWIKI_USECAPTCHA', 'Enable CAPTCHA');
define('_MI_SWIKI_USECAPTCHA_DESC', 'Display CAPTCHA on edit form');
define('_MI_SWIKI_SHOWQUICKADD', 'Enable the Quick Add feature');
define('_MI_SWIKI_SHOWQUICKADD_DESC', 'Setting to <em>Yes</em> displays the Quick Add field, allowing the editors to type a page name and go directly to editing the page');
define('_MI_SWIKI_TOPPAGE', 'Index Page');
define('_MI_SWIKI_TOPPAGE_DESC', 'Page to be shown on the main page of the module');

// Added in SimplyWiki 1.2
define('_MI_SWIKI_PAGERESTORE_TITLE', 'Page restored');
define('_MI_SWIKI_PAGERESTORE_CAPTION', 'Notify me when a previous version of this page is restored');
define('_MI_SWIKI_PAGERESTORE_DESC', 'Receive notification when any user restores a previous version of this page');
define('_MI_SWIKI_PAGERESTORE_SUBJECT', '[{X_SITENAME}] {X_MODULE} auto-notify : page restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_TITLE', 'Page restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_CAPTION', 'Notify me when a previous version of any page is restored');
define('_MI_SWIKI_GLOBALPAGERESTORE_DESC', 'Receive notification when any user restores a previous version of any page');
define('_MI_SWIKI_GLOBALPAGERESTORE_SUBJECT', '[{X_SITENAME}] {X_MODULE} auto-notify : page restored');
