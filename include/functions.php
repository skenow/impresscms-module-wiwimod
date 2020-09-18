<?php
/**
 * Common functions for SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id
 */
if (!defined('ICMS_ROOT_PATH')) exit();

// reproduces right in RTL languages and left in LTR languages
if (!defined("_GLOBAL_LEFT")) {
	define('_GLOBAL_LEFT', ((defined('_ADM_USE_RTL') && _ADM_USE_RTL) ? "right" : "left"));
}
// reproduces left in RTL languages and right in LTR languages
if (!defined("_GLOBAL_RIGHT")) {
	define('_GLOBAL_RIGHT', ((defined('_ADM_USE_RTL') && _ADM_USE_RTL) ? "left" : "right"));
}
$wikiModDir = basename(dirname(__DIR__));

/**
 *
 * @param mixed $blkname
 *        block title or id
 */
function swiki_getBlock($blkname) {
	$wikiModDir = basename(dirname(__DIR__));
	$block = array ();
	$bcontent = '';
	$bid = (int) $blkname;

	// get all blocks
	$block_handler = &icms::handler('icms_view_block');
	$block_arr = $block_handler->getAllBlocks();

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
		$blk = $block_handler->get($bid, TRUE);

		$btpl = $blk->getVar('template');
		$bid = $blk->getVar('bid');
		$bresult = $blk->buildBlock();
		if ($bresult) {
			$icmsTemplate = new icms_view_Tpl();
			$icmsTemplate->caching = 2;

			if ($btpl != '') {
				$icmsTemplate->assign_by_ref('block', $bresult);
				$bcontent = $icmsTemplate->fetch('db:' . $btpl);
				$icmsTemplate->clear_assign('block');
			} else {
				$icmsTemplate->assign_by_ref('dummy_content', $bresult['content']);
				$bcontent = $icmsTemplate->fetch('db:system_dummy.html', 'blk_' . $bid);
				$icmsTemplate->clear_assign('dummy_content');
			}
		}
	}
	$block['content'] = $bcontent;

	return $block;
}

/**
 * code adapted from the excellent SmartFaq module (www.smartfactory.ca)
 *
 * @deprecated
 */
function getAdminMenu($currentoption = 0, $breadcrumb = '') {
	$wikiModDir = basename(dirname(__DIR__));
	$wikiModPath = ICMS_MODULES_PATH . '/' . $wikiModDir;
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

	global $icmsConfig;
	$module = icms::handler('icms_module')->getByDirname($wikiModDir);
	$myts = icms_core_Textsanitizer::getInstance();

	$tblColors = array ();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = $tblColors[3] = $tblColors[4] = $tblColors[5] = $tblColors[6] = '';
	$tblColors[$currentoption] = 'current';
	if (file_exists($wikiModPath . '/language/' . $icmsConfig['language'] . '/modinfo.php')) {
		include_once $wikiModPath . '/language/' . $icmsConfig['language'] . '/modinfo.php';
	} else {
		include_once $wikiModPath . '/language/english/modinfo.php';
	}

	$html .= "<div id='buttontop'>" . "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";

	$html .= "<td style='width: 60%; font-size: 14px; font-weight:bolder; text-align: " . _GLOBAL_LEFT . "; color: #2F5376; padding: 0 6px; line-height: 18px;'>" . _MI_SWIKI_NAME . " - " . _MI_SWIKI_DESC . "<br /><span style='font-size: 10px;'><a href='" . ICMS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $module->getVar('mid') . "'>" . _PREFERENCES . "</a> | <a href='" . ICMS_URL . "/modules/" . $wikiModDir . "' title=''>" . _AM_SWIKI_GOTO_MODULE . "</a> | <a href='" . ICMS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $wikiModDir . "' title=''>" . _AM_SWIKI_UPDATE_MODULE . "</a></span></td>" . "<td style='width: 40%; font-size: 10px; text-align: " . _GLOBAL_RIGHT . "; color: #2F5376; padding: 0 6px; line-height: 18px;'>" . _AM_SWIKI_ADMIN_TXT . " : " . $module->getVar('name') . " : " . $breadcrumb . "</td>" . "</tr></table>" . "</div>";

	$html .= "<div id='buttonbar'>" . "<ul>" . "<li id='" . $tblColors[0] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/index.php\"><span>" . _MI_SWIKI_ADMENU1 . "</span></a></li>" . "<li id='" . $tblColors[1] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/acladmin.php\"><span>" . _MI_SWIKI_ADMENU2 . "</span></a></li>" . "<li id='" . $tblColors[4] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/about.php\"><span>" . _MI_SWIKI_ADMENU4 . "</span></a></li>" . "<li id='" . $tblColors[5] . "'><a href=\"" . ICMS_URL . "/modules/" . $wikiModDir . "/admin/help.php\"><span>" . _MI_SWIKI_ADMENU5 . "</span></a></li>" . "</ul></div>&nbsp;";

	return $html;
}

/**
 * The old XOOPS Tag module does not work in ImpressCMS 1.3 or higher
 *
 * @todo Remove all checks for this module
 */
function isTagModuleActivated() {
	return false;
}

/**
 * Basic validation and sanitation of user input
 *
 * This can be expanded for all different types of input: email, URL, filenames, media/mimetypes
 *
 * @param array $input_var
 *        Array of user input, gather from $_GET, $_POST
 * @param array $valid_vars
 *        Array of valid variables and data type (integer, boolean, string, )
 * @return array Array of validated and sanitized variables
 */
function swiki_cleanVars($input_var, $valid_vars) {
	$clean_var = array ();
	foreach ($valid_vars as $key => $type) {
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

			case 'binary':/* only PHP6 - for now */
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
