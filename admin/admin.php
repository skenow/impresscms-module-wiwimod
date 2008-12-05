<?php
/**
 * Main admin page for SimplyWiki
 * 
 * @package SimplyWiki
 * @author Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
 /** @todo validate and sanitize HTTP vars */
if (isset($_POST['fct'])) {
	$fct = trim($_POST['fct']);
}
if (isset($_GET['fct'])) {
	$fct = trim($_GET['fct']);
}
if( empty( $fct ) ) $fct = 'preferences' ;
//if (isset($fct) && $fct == "users") {
//	$xoopsOption['pagetype'] = "user";
//}
include '../../../mainfile.php';
// include "../../mainfile.php"; GIJ
include XOOPS_ROOT_PATH.'/include/cp_functions.php';
if ( file_exists(XOOPS_ROOT_PATH.'/modules/system/language/'.$xoopsConfig['language'].'/admin.php') ) {
	include XOOPS_ROOT_PATH.'/modules/system/language/'.$xoopsConfig['language'].'/admin.php';
} else {
	include XOOPS_ROOT_PATH.'/modules/system/language/english/admin.php';
}
require_once XOOPS_ROOT_PATH.'/kernel/module.php';
$admintest = 0;
if (is_object($xoopsUser)) {
	$xoopsModule =& XoopsModule::getByDirname('system');
	if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
		redirect_header(XOOPS_URL.'/user.php',3,_NOPERM);
		exit();
	}
	$admintest=1;
} else {
	redirect_header(XOOPS_URL.'/user.php',3,_NOPERM);
	exit();
}
// include system category definitions
include_once XOOPS_ROOT_PATH.'/modules/system/constants.php';
$error = false;
if ($admintest != 0) {
	if (isset($fct) && $fct != '') {
		if (file_exists(XOOPS_ROOT_PATH.'/modules/system/admin/'.$fct.'/xoops_version.php')) {
			if (file_exists(XOOPS_ROOT_PATH.'/modules/system/language/'.$xoopsConfig['language'].'/admin/'.$fct.'.php')) {
				include XOOPS_ROOT_PATH.'/modules/system/language/'.$xoopsConfig['language'].'/admin/'.$fct.'.php';
			} elseif (file_exists(XOOPS_ROOT_PATH.'/modules/system/language/english/admin/'.$fct.'.php')) {
				include XOOPS_ROOT_PATH.'/modules/system/language/english/admin/'.$fct.'.php';
			}
			include XOOPS_ROOT_PATH.'/modules/system/admin/'.$fct.'/xoops_version.php';
			$sysperm_handler =& xoops_gethandler('groupperm');
			$category = !empty($modversion['category']) ? intval($modversion['category']) : 0;
			unset($modversion);
			if ($category > 0) {
				$groups =& $xoopsUser->getGroups();
				if (in_array(XOOPS_GROUP_ADMIN, $groups) || false != $sysperm_handler->checkRight('system_admin', $category, $groups, $xoopsModule->getVar('mid'))){
//					if (file_exists(XOOPS_ROOT_PATH."/modules/system/admin/".$fct."/main.php")) {
//						include_once XOOPS_ROOT_PATH."/modules/system/admin/".$fct."/main.php"; GIJ
					if (file_exists("../include/{$fct}.inc.php")) {
						include_once "../include/{$fct}.inc.php" ;
					} else {
						$error = true;
					}
				} else {
					$error = true;
				}
			} elseif ($fct == 'version') {
				if (file_exists(XOOPS_ROOT_PATH.'/modules/system/admin/version/main.php')) {
					include_once XOOPS_ROOT_PATH.'/modules/system/admin/version/main.php';
				} else {
					$error = true;
				}
			} else {
				$error = true;
			}
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
}
if (false != $error) {
	xoops_cp_header();
	echo '<h4>'._AM_SWIKI_SYS_CFG.'</h4>';
	echo '<table class="outer" cellpadding="4" cellspacing="1">';
	echo '<tr>';
	$groups = $xoopsUser->getGroups();
	$all_ok = false;
	if (!in_array(XOOPS_GROUP_ADMIN, $groups)) {
		$sysperm_handler =& xoops_gethandler('groupperm');
		$ok_syscats =& $sysperm_handler->getItemIds('system_admin', $groups);
	} else {
		$all_ok = true;
	}
	$admin_dir = XOOPS_ROOT_PATH.'/modules/system/admin';
	$handle = opendir($admin_dir);
	$counter = 0;
	$class = 'even';
	while ($file = readdir($handle)) {
		if (strtolower($file) != 'cvs' && !preg_match("/[.]/", $file) && is_dir($admin_dir.'/'.$file)) {
			include $admin_dir.'/'.$file.'/xoops_version.php';
			if ($modversion['hasAdmin']) {
				$category = isset($modversion['category']) ? intval($modversion['category']) : 0;
				if (false != $all_ok || in_array($modversion['category'], $ok_syscats)) {
					echo "<td class='$class' align='center' valign='bottom' width='19%'>";
					echo "<a href='".XOOPS_URL."/modules/system/admin.php?fct=".$file."'><b>" .trim($modversion['name'])."</b></a>\n";
					echo '</td>';
					$counter++;
					$class = ($class == 'even') ? 'odd' : 'even';
				}
				if ( $counter > 4 ) {
					$counter = 0;
					echo '</tr>';
					echo '<tr>';
				}
			}
			unset($modversion);
		}
	}
	while ($counter < 5) {
		echo '<td class="'.$class.'">&nbsp;</td>';
		$class = ($class == 'even') ? 'odd' : 'even';
		$counter++;
	}
	echo '</tr></table>';
    xoops_cp_footer();
}
?>