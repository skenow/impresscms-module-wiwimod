<?php
$modversion['name']        = _MI_WIWIMOD_NAME;
$modversion['version']     = '0.8.3';
$modversion['description'] = _MI_WIWIMOD_DESC;
$modversion['author']      = 'Xavier JIMENEZ';
$modversion['credits']     = '';
$modversion['license']     = "GNU General Public License";
$modversion['help']        = "";
$modversion['official']    = 0;
$modversion['image']       = "images/wiwilogo.gif";
$modversion['dirname']     = "wiwimod";

// Tables created by the SQL file (without prefix!)
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "wiwimod";
$modversion['tables'][1] = "wiwimod_profiles";
$modversion['tables'][2] = "wiwimod_prof_groups";

// Administration tools
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Main menu
$modversion['hasMain'] = 1;

// Templates
$modversion['templates'][1]['file'] = 'wiwimod_view.html';
$modversion['templates'][1]['description'] = 'WiwiMod - View Wiwi Page';
$modversion['templates'][2]['file'] = 'wiwimod_edit.html';
$modversion['templates'][2]['description'] = 'WiwiMod - Edit with Page';
$modversion['templates'][3]['file'] = 'wiwimod_history.html';
$modversion['templates'][3]['description'] = 'WiwiMod - View page history';
$modversion['templates'][4]['file'] = 'wiwimod_pdf.html';
$modversion['templates'][4]['description'] = 'WiwiMod - pdf';

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.php";
$modversion['search']['func'] = "wiwimod_search";

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'pageid';
$modversion['comments']['pageName'] = 'index.php';

// Blocks
$modversion['blocks'][1]['file'] = "wiwimod_toc.php";
$modversion['blocks'][1]['name'] = "Wiwi TOC";
$modversion['blocks'][1]['description'] = "Wiwi selected entry pages";
$modversion['blocks'][1]['show_func'] = "wiwimod_toc";
$modversion['blocks'][1]['template'] = 'wiwimod_toc.html';

$modversion['blocks'][2]['file'] = "wiwimod_recent.php";
$modversion['blocks'][2]['name'] = "Wiwi Recent";
$modversion['blocks'][2]['description'] = "Wiwi recently modified";
$modversion['blocks'][2]['show_func'] = "wiwimod_recent";
$modversion['blocks'][2]['edit_func'] = "wiwimod_recent_blockedit";
$modversion['blocks'][2]['options'] = "5";
$modversion['blocks'][2]['template'] = 'wiwimod_recent.html';

$modversion['blocks'][3]['file'] = "wiwimod_showpage.php";
$modversion['blocks'][3]['name'] = "WiwiSideContent";
$modversion['blocks'][3]['description'] = "side block for extra content on Wiwi pages";
$modversion['blocks'][3]['show_func'] = "wiwimod_contextshow";
$modversion['blocks'][3]['template'] = 'wiwimod_context.html';

$modversion['blocks'][4]['file'] = "wiwimod_showpage.php";
$modversion['blocks'][4]['name'] = "WiwiShowPage";
$modversion['blocks'][4]['description'] = "Show a wiwi page";
$modversion['blocks'][4]['show_func'] = "wiwimod_showpage";
$modversion['blocks'][4]['edit_func'] = "wiwimod_showpage_blockedit";
$modversion['blocks'][4]['options'] = "WiwiHome";
$modversion['blocks'][4]['template'] = 'wiwimod_showpage.html';

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



$modversion['config'][2]['name'] = 'XoopsEditor';
$modversion['config'][2]['title'] = '_MI_WIWIMOD_XOOPSEDITOR';
$modversion['config'][2]['description'] = '_MI_WIWIMOD_XOOPSEDITOR_DESC';
$modversion['config'][2]['formtype'] = 'select';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = 0;
if (file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php")) {
	include_once(XOOPS_ROOT_PATH."/class/xoopslists.php");
	include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");
	$editor_name = !empty($_GET['editor_name'])?$_GET['editor_name']:"";
	$editorhandler = new XoopsEditorHandler();
	$modversion['config'][2]['options'] = array_flip($editorhandler->getList());
	} 
else $modversion['config'][2]['options'] = array();


$modversion['config'][3]['name'] = 'DefaultProfile';
$modversion['config'][3]['title'] = '_MI_WIWIMOD_DEFAULTPROFILE';
$modversion['config'][3]['description'] = '_MI_WIWIMOD_DEFAULTPROFILE_DESC';
$modversion['config'][3]['formtype'] = 'select';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 0;
$modversion['config'][3]['options'] = array();

$modversion['config'][4]['name'] = 'allowPDF';
$modversion['config'][4]['title'] = '_MI_WIWIMOD_ALLOWPDF';
$modversion['config'][4]['description'] = '_MI_WIWIMOD_ALLOWPDF_DESC';
$modversion['config'][4]['formtype'] = 'yesno';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 0;

$modversion['config'][5]['name'] = 'ShowTitles';
$modversion['config'][5]['title'] = '_MI_WIWIMOD_SHOWTITLES';
$modversion['config'][5]['description'] ='_MI_WIWIMOD_SHOWTITLES_DESC';
$modversion['config'][5]['formtype'] = 'yesno';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = 0;

$modversion['config'][6]['name'] = 'ShowCamelCase';
$modversion['config'][6]['title'] = '_MI_WIWIMOD_USECAMELCASE';
$modversion['config'][6]['description'] ='_MI_WIWIMOD_USECAMELCASE_DESC';
$modversion['config'][6]['formtype'] = 'yesno';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = 0;


// Notification

$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = '';
$modversion['notification']['lookup_func'] = '';

$modversion['notification']['category'][1]['name'] = 'page';
$modversion['notification']['category'][1]['title'] = _MI_WIWIMOD_PAGENOTIFYCAT_TITLE;
$modversion['notification']['category'][1]['description'] = _MI_WIWIMOD_PAGENOTIFYCAT_DESC;
$modversion['notification']['category'][1]['subscribe_from'] = 'index.php';
$modversion['notification']['category'][1]['item_name'] = 'pageid';
$modversion['notification']['category'][1]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name'] = 'page_modified';
$modversion['notification']['event'][1]['category'] = 'page';
$modversion['notification']['event'][1]['title'] = _MI_WIWIMOD_PAGENOTIFY_TITLE;
$modversion['notification']['event'][1]['caption'] = _MI_WIWIMOD_PAGENOTIFY_CAPTION;
$modversion['notification']['event'][1]['description'] = _MI_WIWIMOD_PAGENOTIFY_DESC;
$modversion['notification']['event'][1]['mail_template'] = 'global_pagemodified_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_WIWIMOD_PAGENOTIFY_SUBJECT;

?>