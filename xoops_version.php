<?php
/**
 * xoops_version: Main configuration file for wiwimod
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 * @author Gizmhail
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
$modversion = array(
  'name' => _MI_WIWIMOD_NAME,
  'version' => '0.83',
  'description' => _MI_WIWIMOD_DESC,
  'author' => 'Xavier JIMENEZ',
  'credits' => '',
  'license' => 'GNU General Public License',
  'help' => '',
  'official' => 0,
  'image' => 'images/wiwilogo.gif', /* standard XOOPS icon, 92x52 px  */
  'iconbig' => '', /* big icon for ImpressCMS, 37x35 px */
  'iconsmall' => '', /* small icon for ImpressCMS, 16x16 px */
  'dirname' => basename(dirname(__FILE__)),
  'status' => 'Final',
  'onInstall' => 'include/oninstall.inc.php',
  'onUpdate' => 'include/onupdate.inc.php' ); 


// Tables created by the SQL file (without prefix!)
$modversion['sqlfile']['mysql'] = 'language/'.$xoopsConfig['language'].'/mysql.sql';
$modversion['tables'][0] = 'wiwimod';
$modversion['tables'][] = 'wiwimod_profiles';
$modversion['tables'][] = 'wiwimod_prof_groups';

// Administration tools
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Main menu
$modversion['hasMain'] = 1;

// Templates
$modversion['templates'][1] = array(
  'file' => 'wiwimod_view.html',
  'description' => 'WiwiMod - View Wiwi Page');
$modversion['templates'][] = array(
  'file' => 'wiwimod_edit.html',
  'description' => 'WiwiMod - Edit Wiwi Page');
$modversion['templates'][]= array(
  'file' => 'wiwimod_history.html',
  'description' => 'WiwiMod - View page history');
$modversion['templates'][] = array(
  'file' => 'wiwimod_pdf.html',
  'description' => 'WiwiMod - pdf');

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = 'include/search.php';
$modversion['search']['func'] = 'wiwimod_search';

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'pageid';
$modversion['comments']['pageName'] = 'index.php';

// Blocks
$modversion['blocks'][1] = array(
  'file' => 'wiwimod_toc.php',
  'name' => 'Wiwi TOC',
  'description' => 'Wiwi selected entry pages',
  'show_func' => 'wiwimod_toc',
  'template' => 'wiwimod_toc.html');

$modversion['blocks'][] = array(
  'file' => 'wiwimod_recent.php',
  'name' => 'Wiwi Recent',
  'description' => 'Wiwi recently modified',
  'show_func' => 'wiwimod_recent',
  'edit_func' => 'wiwimod_recent_blockedit',
  'options' => '5',
  'template' => 'wiwimod_recent.html');

$modversion['blocks'][] = array(
  'file' => 'wiwimod_showpage.php',
  'name' => 'WiwiSideContent',
  'description' => 'side block for extra content on Wiwi pages',
  'show_func' => 'wiwimod_contextshow',
  'template' => 'wiwimod_context.html');

$modversion['blocks'][] = array(
  'file' => 'wiwimod_showpage.php',
  'name' => 'WiwiShowPage',
  'description' => 'Show a wiwi page',
  'show_func' => 'wiwimod_showpage',
  'edit_func' => 'wiwimod_showpage_blockedit',
  'options' => 'WiwiHome',
  'template' => 'wiwimod_showpage.html');

// Admin preferences items

// name of config option for accessing its specified value. i.e. $xoopsModuleConfig['storyhome']
$modversion['config'][1]['name'] = 'Editor';

// title of this config option displayed in config settings form
$modversion['config'][1]['title'] = '_MI_WIWIMOD_EDITOR';

// description of this config option displayed under title
$modversion['config'][1]['description'] = '_MI_WIWIMOD_EDITOR_DESC';

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
$modversion['config'][1]['options'] = array('Xoops Standard' => 0, 'XoopsEditor' => 1,'Spaw' => 2, 'HtmlArea' => 3, 'Koivi' => 4, 'FCK Editor' => 5);

$modversion['config'][2] = array(
  'name' => 'XoopsEditor',
  'title' => '_MI_WIWIMOD_XOOPSEDITOR',
  'description' => '_MI_WIWIMOD_XOOPSEDITOR_DESC',
  'formtype' => 'select',
  'valuetype' => 'text',
  'default' => 0);
if (file_exists(XOOPS_ROOT_PATH.'/class/xoopseditor/xoopseditor.php')) {
	include_once XOOPS_ROOT_PATH.'/class/xoopslists.php';
	include_once XOOPS_ROOT_PATH.'/class/xoopseditor/xoopseditor.php';
	$editor_name = !empty($_GET['editor_name'])?$_GET['editor_name']:'';
	$editorhandler = new XoopsEditorHandler();
	$modversion['config'][2]['options'] = array_flip($editorhandler->getList());
	} 
else $modversion['config'][2]['options'] = array();

$modversion['config'][]  = array(
  'name' => 'DefaultProfile',
  'title' => '_MI_WIWIMOD_DEFAULTPROFILE',
  'description' => '_MI_WIWIMOD_DEFAULTPROFILE_DESC',
  'formtype' => 'select',
  'valuetype' => 'int',
  'default' => 0,
  'options' => array());

$modversion['config'][] = array(
  'name' => 'allowPDF',
  'title' => '_MI_WIWIMOD_ALLOWPDF',
  'description' => '_MI_WIWIMOD_ALLOWPDF_DESC',
  'formtype' => 'yesno',
  'valuetype' => 'int',
  'default' => 0);

$modversion['config'][] = array(
  'name' => 'ShowTitles',
  'title' => '_MI_WIWIMOD_SHOWTITLES',
  'description' => '_MI_WIWIMOD_SHOWTITLES_DESC',
  'formtype' => 'yesno',
  'valuetype' => 'int',
  'default' => 0);

$modversion['config'][] = array(
  'name' => 'ShowCamelCase',
  'title' => '_MI_WIWIMOD_USECAMELCASE',
  'description' => '_MI_WIWIMOD_USECAMELCASE_DESC',
  'formtype' => 'yesno',
  'valuetype' => 'int',
  'default' => 0);

// Notification

$modversion['hasNotification'] = 1;
$modversion['notification'] = array(
  'lookup_file' => 'include/notification.inc.php',
  'lookup_func' => 'wiwimod_notify_iteminfo');

$modversion['notification']['category'][1] = array(
  'name' => 'page',
  'title' => _MI_WIWIMOD_PAGENOTIFYCAT_TITLE,
  'description' => _MI_WIWIMOD_PAGENOTIFYCAT_DESC,
  'subscribe_from' => array('index.php'),
  'allow_bookmark' => 1,
  'item_name' => 'pageid'); // must be a numeric value passed in a $_GET variable, or empty for global matching. See ROOT/include/nofitication_functions.php 

$modversion['notification']['category'][] = array(
  'name' => 'global',
  'title' => _MI_WIWIMOD_GLOBALNOTIFYCAT_TITLE,
  'description' => _MI_WIWIMOD_GLOBALNOTIFYCAT_DESC,
  'subscribe_from' => array('index.php'),
  'item_name' => ''); // must be a numeric value passed in a $_GET variable, or empty for global matching. See ROOT/include/nofitication_functions.php 

$modversion['notification']['event'][1] = array(
  'name' => 'page_modified',
  'category' => 'page',
  'title' => _MI_WIWIMOD_PAGENOTIFY_TITLE,
  'caption' => _MI_WIWIMOD_PAGENOTIFY_CAPTION,
  'description' => _MI_WIWIMOD_PAGENOTIFY_DESC,
  'mail_template' => 'global_pagemodified_notify',
  'mail_subject' => _MI_WIWIMOD_PAGENOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
  'name' => 'page_modified',
  'category' => 'global',
  'title' => _MI_WIWIMOD_GLOBALNOTIFY_TITLE,
  'caption' => _MI_WIWIMOD_GLOBALNOTIFY_CAPTION,
  'description' => _MI_WIWIMOD_GLOBALNOTIFY_DESC,
  'mail_template' => 'global_pagemodified_notify',
  'mail_subject' => _MI_WIWIMOD_GLOBALNOTIFY_SUBJECT);

?>