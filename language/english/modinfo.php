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
/* Added in version ... */
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_DESC','Notifications that apply to the all pages');
define('_MI_WIWIMOD_GLOBALNOTIFY_TITLE','Page updated');
define('_MI_WIWIMOD_GLOBALNOTIFY_CAPTION','Notify me when any page is modified');
define('_MI_WIWIMOD_GLOBALNOTIFY_DESC','Receive notification when any user updates any page.');
define('_MI_WIWIMOD_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notify : page updated');

?>