<?php
/**
 * Main configuration file for SimplyWiki
 *
 * @package	SimplyWiki
 * @author	Steve Kenow <skenow@impresscms.org>
 * @author	Wiwimod: Xavier JIMENEZ
 * @author	Wiwimod: Gizmhail
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */
$modversion = array(
  'name' => _MI_SWIKI_NAME,
  'version' => '2.0.0',
  'status' => 'Beta',
  'description' => _MI_SWIKI_DESC,
  'author' => 'Steve Kenow <skenow@impresscms.org>',
  'credits' => 'Based on Wiwimod by Xavier JIMENEZ; with further contributions by Gizmhail and GibaPHP',
  'license' => 'GNU General Public License',
  'help' => '',
  'official' => 0,
  'image' => 'images/wiwimod.png', /* standard XOOPS icon, 92x52 px  */
  'iconbig' => 'images/wiwimod.png', /* big icon for ImpressCMS, 37x35 px */
  'iconsmall' => 'images/wiwimod-small.png', /* small icon for ImpressCMS, 16x16 px */
  'dirname' => basename(dirname(__FILE__)),
  'onInstall' => 'include/oninstall.inc.php',
  'onUpdate' => 'include/onupdate.inc.php',
  'demo_site_url' => 'http://www.simplywiki.org/',
  'demo_site_name' => 'SimplyWiki',
  'support_site_url' => 'https://www.impresscms.org/',
  'support_site_name' => 'ImpressCMS Community',
  'submit_bug' => '',
  'submit_feature' => '',
  'warning' => '',
  'author_word' => '_MI_SWIKI_AUTHOR_WORD',
);

// Tables created by the SQL file (without prefix!)
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'] = array(
	'wiki_pages',
	'wiki_revisions',
	'wiki_profiles',
	'wiki_prof_groups',
);

// Administration tools
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Main menu
$modversion['hasMain'] = 1;

// Templates
$modversion['templates'][1] = array(
  'file' => 'wiwimod_view.html',
  'description' => _MI_SWIKI_TEMPLATE_VIEW_DESC);
$modversion['templates'][] = array(
  'file' => 'wiwimod_edit.html',
  'description' => _MI_SWIKI_TEMPLATE_EDIT_DESC);
$modversion['templates'][]= array(
  'file' => 'wiwimod_history.html',
  'description' => _MI_SWIKI_TEMPLATE_HISTORY_DESC);
$modversion['templates'][] = array(
  'file' => 'wiwimod_pdf.html',
  'description' => _MI_SWIKI_TEMPLATE_PDF_DESC);

// Search
$modversion['hasSearch'] = 1;
$modversion['search'] = array(
	'file' => 'include/search.php',
	'func' => 'swiki_search',
);

// Comments
$modversion['hasComments'] = 1;
$modversion['comments'] = array(
	'itemName' => 'pageid',
	'pageName' => 'index.php',
);

// Blocks
$modversion['blocks'][1] = array(
  'file' => 'wiwimod_toc.php',
  'name' => _MI_SWIKI_BLOCK_TOC_NAME,
  'description' => _MI_SWIKI_BLOCK_TOC_DESC,
  'show_func' => 'swiki_toc',
  'template' => 'wiwimod_toc.html',
  'can_clone' => true);

$modversion['blocks'][] = array(
  'file' => 'wiwimod_recent.php',
  'name' => _MI_SWIKI_BLOCK_RECENT_NAME,
  'description' => _MI_SWIKI_BLOCK_RECENT_DESC,
  'show_func' => 'swiki_recent',
  'edit_func' => 'swiki_recent_blockedit',
  'options' => '5',
  'template' => 'wiwimod_recent.html',
  'can_clone' => true);

$modversion['blocks'][] = array(
  'file' => 'wiwimod_showpage.php',
  'name' => _MI_SWIKI_BLOCK_RELATED_NAME,
  'description' => _MI_SWIKI_BLOCK_RELATED_DESC,
  'show_func' => 'swiki_contextshow',
  'template' => 'wiwimod_context.html',
  'can_clone' => true);

$modversion['blocks'][] = array(
  'file' => 'wiwimod_showpage.php',
  'name' => _MI_SWIKI_BLOCK_SHOWPAGE_NAME,
  'description' => _MI_SWIKI_BLOCK_SHOWPAGE_DESC,
  'show_func' => 'swiki_showpage',
  'edit_func' => 'swiki_showpage_blockedit',
  'options' => '_MI_SWIKI_HOME|0|0',
  'template' => 'wiwimod_showpage.html',
  'can_clone' => true);

$modversion['blocks'][] = array(
  'file' => 'swiki_blocks.php',
  'name' => _MI_SWIKI_BLOCK_LISTPAGES_NAME,
  'description' => _MI_SWIKI_BLOCK_LISTPAGES_DESC,
  'show_func' => 'swiki_listpages',
  'edit_func' => 'swiki_listpages_blockedit',
  'options' => '5|createdate|DESC|full|',
  'template' => 'swiki_listpages.html',
  'can_clone' => true);

$modversion['blocks'][] = array(
  'file' => 'swiki_blocks.php',
  'name' => _MI_SWIKI_BLOCK_ADDPAGE_NAME,
  'description' => _MI_SWIKI_BLOCK_ADDPAGE_DESC,
  'show_func' => 'swiki_addpage',
  'template' => 'swiki_addpage.html',
  'can_clone' => true);

include_once dirname(__FILE__) . '/include/functions.php';
// Admin preferences items

// name of config option for accessing its specified value. i.e. $xoopsModuleConfig['storyhome']
$modversion['config'][1]['name'] = 'Editor';

// title of this config option displayed in config settings form
$modversion['config'][1]['title'] = '_MI_SWIKI_EDITOR';

// description of this config option displayed under title
$modversion['config'][1]['description'] = '_MI_SWIKI_EDITOR_DESC';

// form element type used in config form for this option. can be one of either textbox, textarea, select, select_multi, yesno, group, group_multi
$modversion['config'][1]['formtype'] = 'select';

// value type of this config option. can be one of either int, text, float, array, or other
// form type of group_multi, select_multi must always be value type of array
$modversion['config'][1]['valuetype'] = 'int';

// the default value for this option
// ignore it if no default
// 'yesno' formtype must be either 0(no) or 1(yes)
$modversion['config'][1]['default'] = 0;

// options to be displayed in selection box
// required and valid for 'select' or 'select_multi' formtype option only
// language constants can be used for array key, otherwise use integer
//$modversion['config'][1]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30);
$modversion['config'][1]['options'] = array(
	'Xoops Standard' => 0,
	'XoopsEditor' => 1);
if (file_exists(ICMS_ROOT_PATH.'/class/spaw/formspaw.php')){
	$modversion['config'][1]['options']['Spaw'] = 2;}
if (file_exists(ICMS_ROOT_PATH.'/class/htmlarea/formhtmlarea.php')){
	$modversion['config'][1]['options']['HtmlArea'] = 3;}
if (file_exists(ICMS_ROOT_PATH. '/class/wysiwyg/formwysiwygtextarea.php')){
	$modversion['config'][1]['options']['Koivi'] = 4;}
if (file_exists(ICMS_ROOT_PATH.'/class/fckeditor/formfckeditor.php')){
	$modversion['config'][1]['options']['FCK Editor'] = 5;}

$modversion['config'][2] = array(
  'name' => 'XoopsEditor',
  'title' => '_MI_SWIKI_XOOPSEDITOR',
  'description' => '_MI_SWIKI_XOOPSEDITOR_DESC',
  'formtype' => 'select',
  'valuetype' => 'text',
  'default' => 0);

$editor_name = !empty($_GET['editor_name']) ? $_GET['editor_name'] : '';
$editorhandler = new icms_plugins_EditorHandler();
$modversion['config'][2]['options'] = array_flip($editorhandler->getList());

$modversion['config'][]  = array(
  'name' => 'DefaultProfile',
  'title' => '_MI_SWIKI_DEFAULTPROFILE',
  'description' => '_MI_SWIKI_DEFAULTPROFILE_DESC',
  'formtype' => 'select',
  'valuetype' => 'int',
  'default' => 0,
  'options' => array());

$modversion['config'][] = array(
  'name' => 'allowPDF',
  'title' => '_MI_SWIKI_ALLOWPDF',
  'description' => '_MI_SWIKI_ALLOWPDF_DESC',
  'formtype' => 'yesno',
  'valuetype' => 'int',
  'default' => 0);

$modversion['config'][] = array(
  'name' => 'ShowTitles',
  'title' => '_MI_SWIKI_SHOWTITLES',
  'description' => '_MI_SWIKI_SHOWTITLES_DESC',
  'formtype' => 'yesno',
  'valuetype' => 'int',
  'default' => 0);

$modversion['config'][] = array(
  'name' => 'ShowCamelCase',
  'title' => '_MI_SWIKI_USECAMELCASE',
  'description' => '_MI_SWIKI_USECAMELCASE_DESC',
  'formtype' => 'yesno',
  'valuetype' => 'int',
  'default' => 0);

$modversion['config'][] = array(
  'name' => 'TopPage',
  'title' => '_MI_SWIKI_TOPPAGE',
  'description' => '_MI_SWIKI_TOPPAGE_DESC',
  'formtype' => 'textbox',
  'valuetype' => 'text',
  'default' => _MI_SWIKI_HOME);

$modversion['config'][] = array(
	'name' => 'ShowPageInfo',
	'title' => '_MI_SWIKI_PAGEINFO',
	'description' => '_MI_SWIKI_PAGEINFO_DESC',
	'formtype' => 'select_multi',
	'valuetype' => 'array',
	'options' => array( '_MI_SWIKI_SHOWREVISIONS' => 'ShowRevisions',
						'_MI_SWIKI_SHOWVIEWS' => 'ShowViews',
						'_MI_SWIKI_SHOWCREATED' => 'ShowCreated' ,
						'_MI_SWIKI_SHOWLASTREVISED' => 'ShowLastRevised',
						'_MI_SWIKI_LASTVIEWED' => 'ShowLastViewed'),
	'default' => 'ShowLastRevised'	);

$modversion['config'][] = array(
	'name' => 'Captcha',
	'title' => '_MI_SWIKI_USECAPTCHA',
	'description' => '_MI_SWIKI_USECAPTCHA_DESC',
	'formtype' => 'yesno',
	'valuetype' => 'int',
	'default' => 1);

$modversion['config'][] = array(
	'name' => 'ShowQuickAdd',
	'title' => '_MI_SWIKI_SHOWQUICKADD',
	'description' => '_MI_SWIKI_SHOWQUICKADD_DESC',
	'formtype' => 'yesno',
	'valuetype' => 'int',
	'default' => 1);

// Notification

$modversion['hasNotification'] = 1;
$modversion['notification'] = array(
  'lookup_file' => 'include/notification.inc.php',
  'lookup_func' => 'swiki_notify_iteminfo');

$modversion['notification']['category'][1] = array(
  'name' => 'page',
  'title' => _MI_SWIKI_PAGENOTIFYCAT_TITLE,
  'description' => '_MI_SWIKI_PAGENOTIFYCAT_DESC',
  'subscribe_from' => array('index.php'),
  'allow_bookmark' => 1,
  'item_name' => 'pageid'); // must be a numeric value passed in a $_GET variable, or empty for global matching. See ROOT/include/notification_functions.php

$modversion['notification']['category'][] = array(
  'name' => 'global',
  'title' => _MI_SWIKI_GLOBALNOTIFYCAT_TITLE,
  'description' => '_MI_SWIKI_GLOBALNOTIFYCAT_DESC',
  'subscribe_from' => array('index.php'),
  'item_name' => ''); // must be a numeric value passed in a $_GET variable, or empty for global matching. See ROOT/include/notification_functions.php

$modversion['notification']['event'][1] = array(
  'name' => 'page_modified',
  'category' => 'page',
  'title' => _MI_SWIKI_PAGENOTIFY_TITLE,
  'caption' => _MI_SWIKI_PAGENOTIFY_CAPTION,
  'description' => _MI_SWIKI_PAGENOTIFY_DESC,
  'mail_template' => 'global_pagemodified_notify',
  'mail_subject' => _MI_SWIKI_PAGENOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
  'name' => 'page_modified',
  'category' => 'global',
  'title' => _MI_SWIKI_GLOBALNOTIFY_TITLE,
  'caption' => _MI_SWIKI_GLOBALNOTIFY_CAPTION,
  'description' => _MI_SWIKI_GLOBALNOTIFY_DESC,
  'mail_template' => 'global_pagemodified_notify',
  'mail_subject' => _MI_SWIKI_GLOBALNOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
  'name' => 'page_restored',
  'category' => 'page',
  'title' => _MI_SWIKI_PAGERESTORE_TITLE,
  'caption' => _MI_SWIKI_PAGERESTORE_CAPTION,
  'description' => _MI_SWIKI_PAGERESTORE_DESC,
  'mail_template' => 'global_pagemodified_notify',
  'mail_subject' => _MI_SWIKI_PAGERESTORE_SUBJECT);

$modversion['notification']['event'][] = array(
  'name' => 'page_restored',
  'category' => 'global',
  'title' => _MI_SWIKI_GLOBALPAGERESTORE_TITLE,
  'caption' => _MI_SWIKI_GLOBALPAGERESTORE_CAPTION,
  'description' => _MI_SWIKI_GLOBALPAGERESTORE_DESC,
  'mail_template' => 'global_pagemodified_notify',
  'mail_subject' => _MI_SWIKI_GLOBALPAGERESTORE_SUBJECT);

