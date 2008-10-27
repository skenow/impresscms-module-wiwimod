<?php
/**
 * Common functions for wiwimod
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id
 */ 
if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

$wiwidir = basename( dirname( dirname( __FILE__ ) ) );
function getUserName($uid)
{
    global $myts, $xoopsConfig;
    $wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
    
	if (!isset($myts)) $myts =& MyTextSanitizer::getInstance();
    
    $uid = intval($uid);
    if ($uid > 0) {
        $member_handler =& xoops_gethandler('member');
        $user =& $member_handler->getUser($uid);
        if (is_object($user)) {
            return "<a href=\"".XOOPS_URL."/userinfo.php?uid=$uid\">".$myts->htmlSpecialChars($user->getVar('uname'))."</a>";
        }
    }
    
    return $xoopsConfig['anonymous'];
}

//ok >> rename to ??? , and check block access rights for current user.
function wiwimod_getXoopsBlock ($blkname) {  // block title or id
	global $xoopsUser;
	global $xoopsDB;
  $wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
	$block = array();
	$bcontent = '';
	$bid = intval($blkname);

	// 
	// check block to show
	//
	$blk = new XoopsBlock;
	if ($bid == 0) {
		$blklst = $blk->getAllBlocks();
		foreach ($blklst as $b) {
			if (strcasecmp($b->getVar('title'), $blkname) == 0) {
				$bid = $b->getVar('bid');
				break;
			}
		}
	}

	//
	// build block and extract content
	//
	if ($bid > 0) {
		$blk->load($bid);

		$btpl = $blk->getVar('template');
		$bid = $blk->getVar('bid');
		$bresult =& $blk->buildBlock();
		if ($bresult) {
			require_once XOOPS_ROOT_PATH.'/class/template.php';
			$xoopsTpl = new XoopsTpl();
			$xoopsTpl->xoops_setCaching(2);
			
			if ($btpl != '') {
				$xoopsTpl->assign_by_ref('block', $bresult);
				$bcontent =& $xoopsTpl->fetch('db:'.$btpl);
				$xoopsTpl->clear_assign('block');
			} else {
				$xoopsTpl->assign_by_ref('dummy_content', $bresult['content']);
				$bcontent =& $xoopsTpl->fetch('db:system_dummy.html', 'blk_'.$bid);
				$xoopsTpl->clear_assign('dummy_content');
			}
		}
	}
	$block['content'] = $bcontent;

	return $block;
}

//ok >> rename to render_block
function wiwiShowBlock ($blkname) {
  
	$blk = wiwimod_getXoopsBlock($blkname);
	return "<table><tr><td>".$blk['content']."</td></tr></table>";
}

/*
 * code adapted from the excellent SmartFaq module (www.smartfactory.ca)
 */
function w_adminMenu ($currentoption = 0, $breadcrumb = '')
{
  
	echo getAdminMenu($currentoption, $breadcrumb);
}

/*
 * code adapted from the excellent SmartFaq module (www.smartfactory.ca)
 */
function getAdminMenu ($currentoption = 0, $breadcrumb = '')
{
  $wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
	$html = '';
	/* Nice buttons styles */
	$html .= "
    	<style type='text/css'>
    	#buttontop { float".(( defined('_ADM_USE_RTL') && _ADM_USE_RTL )?"right":"left")."; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float".(( defined('_ADM_USE_RTL') && _ADM_USE_RTL )?"right":"left")."; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/" . $wiwidir . "/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:".(( defined('_ADM_USE_RTL') && _ADM_USE_RTL )?"right":"left")."; background:url('" . XOOPS_URL . "/modules/" . $wiwidir . "/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:".(( defined('_ADM_USE_RTL') && _ADM_USE_RTL )?"right":"left")."; display:block; background:url('" . XOOPS_URL . "/modules/" . $wiwidir . "/images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#buttonbar a span {float:none;}
		/* End IE5-Mac hack */
		#buttonbar a:hover span { color:#333; }
		#buttonbar #current a { background-position:0 -150px; border-width:0; }
		#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		#buttonbar a:hover { background-position:0% -150px; }
		#buttonbar a:hover span { background-position:100% -150px; }
		</style>
    ";
	
	// global $xoopsDB, $xoopsModule, $xoopsConfig, $xoopsModuleConfig;
	global $xoopsModule, $xoopsConfig;
	$myts = &MyTextSanitizer::getInstance();
	
	$tblColors = Array();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = $tblColors[3] = $tblColors[4] = $tblColors[5] = $tblColors[6] ='';
	$tblColors[$currentoption] = 'current';
	if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $wiwidir . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once XOOPS_ROOT_PATH . '/modules/' . $wiwidir . '/language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once XOOPS_ROOT_PATH . '/modules/' . $wiwidir . '/language/english/modinfo.php';
	}
	
	$html .= "<div id='buttontop'>";
	$html .= "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	
	$html .= "<td style='width: 60%; font-size: 14px; font-weight:bolder; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;'>"._MI_WIWIMOD_NAME." - "._MI_WIWIMOD_DESC."</td>";
	$html .= "<td style='width: 40%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;'>" . _AM_WIWI_ADMIN_TXT . " : " .$xoopsModule->name() . " : " . $breadcrumb . "</td>";
	$html .= "</tr></table>";
	$html .= "</div>";
	
	$html .= "<div id='buttonbar'>";
	$html .= "<ul>";
	$html .= "<li id='" . $tblColors[0] . "'><a href=\"" . XOOPS_URL . "/modules/" . $wiwidir . "/admin/index.php\"><span>" . _MI_WIWIMOD_ADMENU1 . "</span></a></li>";
	$html .= "<li id='" . $tblColors[1] . "'><a href=\"" . XOOPS_URL . "/modules/" . $wiwidir . "/admin/acladmin.php\"><span>" . _MI_WIWIMOD_ADMENU2 . "</span></a></li>";
	$html .= "<li id='" . $tblColors[2] . "'><a href=\"" . XOOPS_URL . "/modules/" . $wiwidir . "/admin/preferences.php\"><span>" . _PREFERENCES . "</span></a></li>";
	$html .= "<li id='" . $tblColors[3] . "'><a href=\"" . XOOPS_URL . "/modules/" . $wiwidir . "/admin/myblocksadmin.php\"><span>" . _MI_WIWIMOD_ADMENU3  . "</span></a></li>";
	$html .= "<li id='" . $tblColors[4] . "'><a href=\"" . XOOPS_URL . "/modules/" . $wiwidir . "/admin/about.php\"><span>" . _MI_WIWIMOD_ADMENU4 . "</span></a></li>";
	$html .= "<li id='" . $tblColors[5] . "'><a href=\"" . XOOPS_URL . "/modules/" . $wiwidir . "/admin/help.php\"><span>" . _MI_WIWIMOD_ADMENU5 . "</span></a></li>";
	$html .= "</ul></div>&nbsp;";

	return $html;
}

function getAvailableEditors() {
	$arr = Array();

	$arr[] = Array('Xoops Standard' , 0 , '' );
	
	if (file_exists(XOOPS_ROOT_PATH . '/class/xoopseditor')) {
		include_once XOOPS_ROOT_PATH.'/class/xoopslists.php';
		include_once XOOPS_ROOT_PATH.'/class/xoopseditor/xoopseditor.php';
		$editorhandler = new XoopsEditorHandler();
		$xedArr = array_flip($editorhandler->getList());
		foreach ($xedArr as $xedTitle => $xedName) {
			$arr[] = Array("XE - $xedTitle", 1 , $xedName );
			}
		} 
	
	if (file_exists(XOOPS_ROOT_PATH . '/class/spaw')) {
		$arr[] = Array('Spaw' , 2 , '' );
	}
	 
	if (file_exists(XOOPS_ROOT_PATH . '/class/htmlarea')) {
		$arr[] = Array('HTMLArea' , 3 , '');
	}

	if (file_exists(XOOPS_ROOT_PATH . '/class/wysiwyg')) {
		$arr[] = Array('Koivi' , 4 , '');
	}

	if (file_exists(XOOPS_ROOT_PATH . '/class/fckeditor')) {
		$arr[] = Array('FCKEditor' , 5 , '');
	}

	return $arr;
}

function isTagModuleActivated()
{
  if( !file_exists( XOOPS_ROOT_PATH.'/modules/tag/include/formtag.php' ) )
    return false;
  $db =& Database::getInstance();
  $moduleHandler = new XoopsModuleHandler($db);
  $tagModule = $moduleHandler->getByDirName('tag');
  if($tagModule == false)
    return false;
  return true;
}
/**
 * Basic validation and sanitation of user input
 * 
 * This can be expanded for all different types of input: email, URL, filenames, media/mimetypes 
 * 
 * @param array $input_var Array of user input, gather from $_GET, $_POST
 * @param array $valid_vars Array of valid variables and data type (integer, boolean, string, )   
 * @return array Array of validated and sanitized variables
 */
 
 function wiwi_cleanVars ($input_var, $valid_vars) {
 $clean_var = array();
 foreach ($valid_vars as $key=>$type){
  if ( empty($input_var[$key])) {
    $input_var[$key] = NULL;
    continue;
  }
  switch ($type) {
    case 'int':
    case 'integer':
      $clean_var[$key] = 0;
      if (is_numeric($input_var[$key])) {
       $clean_var[$key] = (int) $input_var[$key];
      }
      break;
    case 'html':
    case 'string':
      $clean_var[$key] = '';
      if (is_string($input_var[$key])) {
      $clean_var[$key] = trim($input_var[$key]);
      }
      break;
    case 'plaintext':
      $clean_var[$key] = '';
      if (is_string($input_var[$key])) {
      $clean_var[$key] = htmlspecialchars(trim($input_var[$key]));
      }
      break;
    case 'float':
    case 'double':
    case 'real':
      $clean_var[$key] = 0;
      if (is_float($input_var[$key])) {
      $clean_var[$key] = (float) $input_var[$key];
      }
      break; 
    case 'bool':
    case 'boolean':
      $clean_var[$key] = false;
      if (is_bool($input_var[$key])) {
      $clean_var[$key] = (bool) $input_var[$key];
      }
      break;
    case 'binary':/* only PHP6 - for now
      if (is_string($input_var[$key])) {
      $clean_var[$key] = htmlspecialchars(trim($input_var[$key]));
      }*/
      break;
    case 'array': /* need to walk the array, I suppose */
      if (is_array($input_var[$key])) {
      $clean_var[$key] = $input_var[$key];
      }
      break;
    case 'object':
      if (is_object($input_var[$key])) {
      $clean_var[$key] = (object)$input_var[$key];
      }
      break;
    }
 }
 return $clean_var;
 }
?>