<?php
/**
 * Common functions for SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id
 */
if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

// reproduces right in RTL languages and left in LTR languages
if (!defined("_GLOBAL_LEFT")) {
	define('_GLOBAL_LEFT', ((defined('_ADM_USE_RTL') && _ADM_USE_RTL )
		? "right"
		: "left")
	);
}
// reproduces left in RTL languages and right in LTR languages
if (!defined("_GLOBAL_RIGHT")) {
	define('_GLOBAL_RIGHT', ((defined('_ADM_USE_RTL') && _ADM_USE_RTL )
		? "left"
		: "right")
	);
}
$wikiModDir = basename(dirname(dirname(__FILE__)));

/**
 * Returns a clickable username for a userid
 * @deprecated	Use xoops_getLinkedUnameFromId, instead (which is deprecated in XOOPS 2.5.0)
 * @param		$uid
 */
function getUserName($uid) {
	return xoops_getLinkedUnameFromId($uid);
}

/**
 * @todo	This will not work in ImpressCMS until it is updated for the proper
 * 			class handler
 * @param 	$blkname block title or id
 */
function swiki_getXoopsBlock ($blkname) {
	global $xoopsUser;
	global $xoopsDB;
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	$block = array();
	$bcontent = '';
	$bid = (int) $blkname;

	// get all blocks
	if (defined('ICMS_VERSION_BUILD') && ICMS_VERSION_BUILD > 27) {
		/* ImpressCMS 1.2+ */
		$block_handler =& xoops_gethandler('block');
		$block_arr =& $block_handler->getAllBlocks();
	} else {
		/* legacy support */
		$block_arr =& XoopsBlock::getAllBlocks();
		$blk = new XoopsBlock;
	}

	// check block to show
	if ($bid == 0) {
		foreach ($block_arr as $b) {
			if (strcasecmp($b->getVar('title'), $blkname) == 0) {
				$bid = $b->getVar('bid');
				break;
			}
		}
	}

	// build block and extract content
	if ($bid > 0) {
		if (defined('ICMS_VERSION_BUILD') && ICMS_VERSION_BUILD > 27) {
			/* ImpressCMS 1.2+ */
			$blk = $block_handler->get($bid, TRUE);
		} else {
			/* legacy support */
			$blk->load($bid);
		}

		$btpl = $blk->getVar('template');
		$bid = $blk->getVar('bid');
		$bresult =& $blk->buildBlock();
		if ($bresult) {
			require_once ICMS_ROOT_PATH . '/class/template.php';
			$xoopsTpl = new XoopsTpl();
			$xoopsTpl->xoops_setCaching(2);

			if ($btpl != '') {
				$xoopsTpl->assign_by_ref('block', $bresult);
				$bcontent =& $xoopsTpl->fetch('db:' . $btpl);
				$xoopsTpl->clear_assign('block');
			} else {
				$xoopsTpl->assign_by_ref('dummy_content', $bresult['content']);
				$bcontent =& $xoopsTpl->fetch('db:system_dummy.html', 'blk_' . $bid);
				$xoopsTpl->clear_assign('dummy_content');
			}
		}
	}
	$block['content'] = $bcontent;

	return $block;
}

/**
 * @deprecated
 * code adapted from the excellent SmartFaq module (www.smartfactory.ca)
 */
function w_adminMenu ($currentoption = 0, $breadcrumb = '') {

	echo getAdminMenu($currentoption, $breadcrumb);
}

/**
 * code adapted from the excellent SmartFaq module (www.smartfactory.ca)
 * @deprecated
 */
function getAdminMenu ($currentoption = 0, $breadcrumb = '') {
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	$html = '';
	/* Nice buttons styles */
	$html .= "
    	<style type='text/css'>
    	#buttontop { float: " . _GLOBAL_LEFT . "; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float: " . _GLOBAL_LEFT . "; width:100%; background: #e7e7e7 url('" . ICMS_URL . "/modules/" . $wikiModDir . "/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:" . _GLOBAL_LEFT . "; background:url('" . ICMS_URL . "/modules/" . $wikiModDir . "/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:" . _GLOBAL_LEFT . "; display:block; background:url('" . ICMS_URL . "/modules/" . $wikiModDir . "/images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
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
	if (file_exists(ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/english/modinfo.php';
	}

	$html .= "<div id='buttontop'>"
		. "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";

	$html .= "<td style='width: 60%; font-size: 14px; font-weight:bolder; text-align: "._GLOBAL_LEFT."; color: #2F5376; padding: 0 6px; line-height: 18px;'>"._MI_SWIKI_NAME." - "._MI_SWIKI_DESC
		. "<br /><span style='font-size: 10px;'><a href='" . ICMS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->mid() . "'>" . _PREFERENCES . "</a> | <a href='" . ICMS_URL . "/modules/" . $wikiModDir . "' title=''>" . _AM_SWIKI_GOTO_MODULE . "</a> | <a href='" . ICMS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $wikiModDir . "' title=''>" . _AM_SWIKI_UPDATE_MODULE . "</a></span></td>"
		. "<td style='width: 40%; font-size: 10px; text-align: " . _GLOBAL_RIGHT . "; color: #2F5376; padding: 0 6px; line-height: 18px;'>" . _AM_SWIKI_ADMIN_TXT . " : " .$xoopsModule->name() . " : " . $breadcrumb . "</td>"
		. "</tr></table>"
		. "</div>";

	$html .= "<div id='buttonbar'>"
		. "<ul>"
		. "<li id='" . $tblColors[0] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/index.php\"><span>" . _MI_SWIKI_ADMENU1 . "</span></a></li>"
		. "<li id='" . $tblColors[1] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/acladmin.php\"><span>" . _MI_SWIKI_ADMENU2 . "</span></a></li>"
		. "<li id='" . $tblColors[3] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/myblocksadmin.php\"><span>" . _MI_SWIKI_ADMENU3  . "</span></a></li>"
		. "<li id='" . $tblColors[4] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/about.php\"><span>" . _MI_SWIKI_ADMENU4 . "</span></a></li>"
		. "<li id='" . $tblColors[5] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/help.php\"><span>" . _MI_SWIKI_ADMENU5 . "</span></a></li>"
		. "</ul></div>&nbsp;";

	return $html;
}

/**
 *
 */
function getAvailableEditors() {
	$arr[] = array('Standard' , 0 , '' );

	if (file_exists(ICMS_ROOT_PATH . '/class/xoopseditor')) {
		include_once ICMS_ROOT_PATH . '/class/xoopslists.php';
		include_once ICMS_ROOT_PATH . '/class/xoopseditor/xoopseditor.php';
		$editorhandler = new XoopsEditorHandler();
		$xedArr = array_flip($editorhandler->getList());
		foreach ($xedArr as $xedTitle => $xedName) {
			$arr[] = array($xedTitle, 1 , $xedName );
		}
	}

	if (file_exists(ICMS_ROOT_PATH . '/class/spaw')) {
		$arr[] = array('Spaw' , 2 , '' );
	}

	if (file_exists(ICMS_ROOT_PATH . '/class/htmlarea')) {
		$arr[] = array('HTMLArea' , 3 , '');
	}

	if (file_exists(ICMS_ROOT_PATH . '/class/wysiwyg')) {
		$arr[] = array('Koivi' , 4 , '');
	}

	if (file_exists(ICMS_ROOT_PATH . '/class/fckeditor')) {
		$arr[] = array('FCKEditor' , 5 , '');
	}

	return $arr;
}

/**
 * Determine if old XOOPS Tag module is present and activated
 *
 * @return	bool	Returns TRUE if the module is active
 */
function isTagModuleActivated() {
	if (!file_exists(ICMS_ROOT_PATH . '/modules/tag/include/formtag.php')) return false;
	$db =& Database::getInstance();
	$moduleHandler = new XoopsModuleHandler($db);
	$tagModule = $moduleHandler->getByDirName('tag');
	if ($tagModule == false) return false;
	if ($tagModule->getVar('isactive') == FALSE) return FALSE;
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
function swiki_cleanVars ($input_var, $valid_vars) {
	$clean_var = array();
	foreach ($valid_vars as $key=>$type){
		if (empty($input_var[$key])) {
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

			case 'binary':/* only PHP6 - for now*/
				break;

			case 'array': /* need to walk the array, I suppose */
				if (is_array($input_var[$key])) {
					$clean_var[$key] = $input_var[$key];
				}
				break;

			case 'object':
				if (is_object($input_var[$key])) {
					$clean_var[$key] = (object) $input_var[$key];
				}
				break;

			default:
				break;
		}
	}
	return $clean_var;
}
