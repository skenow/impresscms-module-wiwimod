<?php
/**
 * Set preferences for wiwimod
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
*
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

define('WIWI_NOCPFUNC',1);  // cp_functions will be loaded by /system/admin.php, so prevent initial load
include 'admin_header.php';

	$btnsbar = getAdminMenu (2,'preferences');

	function addAdminMenu($buf) {
		global $btnsbar;

		$pattern = array(
			"#action='admin.php\?fct=preferences'#",
			"#(<div class='content'>)#",
			);
		$replace = array(
			"action='preferences.php'",
			"$1 <br />".$btnsbar,
			);
		$html = preg_replace($pattern,$replace,$buf);
		return $html;

//		ereg("(.*)(<div class='content'>.*)",$buf,$regs);
//		return $regs[1].$btnsbar.$regs[2];
	}

	/*
	 * Display and capture preferences screen
	 */
	/** @todo sanitize and validate the HTTP vars */
	if (!isset($_POST['fct'])) $_GET['fct'] = 'preferences';
	if (!isset($_POST['op'])) $_GET['op' ] = 'showmod';
	if (!isset($_POST['mod'])) $_GET['mod'] = $xoopsModule->getVar('mid');
	chdir(XOOPS_ROOT_PATH.'/modules/system/');
	ob_start('addAdminMenu');
		include XOOPS_ROOT_PATH.'/modules/system/admin.php';
	ob_end_flush();

?>