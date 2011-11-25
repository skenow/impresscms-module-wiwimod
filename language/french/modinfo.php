<?php
// $Id$
// Module Info

// The name of this module
define('_MI_SWIKI_NAME','Wiwi');

// A brief description of this module
define('_MI_SWIKI_DESC','Un wiki wysiwyg.');

// Admin menu
define('_MI_SWIKI_ADMENU1','Pages');
define('_MI_SWIKI_ADMENU2','Privil�ges');
define('_MI_SWIKI_ADMENU3','Blocs et Groupes');
define('_MI_SWIKI_ADMENU4','A Propos...');
define('_MI_SWIKI_ADMENU5','Help');

// Admin options
define('_MI_SWIKI_EDITOR','Quel �diteur utiliser');
define('_MI_SWIKI_EDITOR_DESC','');
define('_MI_SWIKI_DEFAULTPROFILE','Profil par d�faut');
// Default profile description was added in re-release, see below
define('_MI_SWIKI_ALLOWPDF','Afficher le bouton PDF ?');
define('_MI_SWIKI_ALLOWPDF_DESC','La g�n�ration de fichiers PDF � partir de wiwi est encore au stade experimental.');

define('_MI_SWIKI_SHOWTITLES','Afficher le titre des pages au lieu de leur nom ');
define('_MI_SWIKI_SHOWTITLES_DESC','Concerne les liens automatiques cr��s en CamelCase dans le corps des pages');

define('_MI_SWIKI_USECAMELCASE','Activer la syntaxe CamelCase');
define('_MI_SWIKI_USECAMELCASE_DESC','Interpr�te les mots en syntaxe CamelCase comme des liens vers d\'autres pages du wiki.');

define('_MI_SWIKI_XOOPSEDITOR','Choisissez un �diteur (package "XoopsEditor") ');
define('_MI_SWIKI_XOOPSEDITOR_DESC','Cette option est utile si vous choisissez le package XoopsEditor');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE','Page');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC','Notifications concernant la page courante');
define('_MI_SWIKI_PAGENOTIFY_TITLE','Page mise � jour');
define('_MI_SWIKI_PAGENOTIFY_CAPTION','Notifiez-moi quand la page courante est mise � jour');
define('_MI_SWIKI_PAGENOTIFY_DESC','Recevez une notification chaque fois qu\'un utilisateur met � jour cette page.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} - page mise � jour (notification automatique) ');
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
define('_MI_SWIKI_AUTHOR_WORD','<h4>Help About SimpyWiki</h4><br />SimplyWiki is GPL software ; visit the community support page at <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> to support or get help.<br /><br /><a href=\'../http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');
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
