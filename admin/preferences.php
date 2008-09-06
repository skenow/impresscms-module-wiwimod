<?php
define("WIWI_NOCPFUNC",1);  // cp_functions will be loaded by /system/admin.php, so prevent initial load
include "admin_header.php";

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
	
	if (!isset($_POST['fct'])) $_GET['fct'] = $_GET['fct'] = "preferences";
	if (!isset($_POST['op'])) $_GET['op' ] = $_GET['op' ] = "showmod";
	if (!isset($_POST['mod'])) $_GET['mod'] = $_GET['mod'] = $xoopsModule->getVar('mid');
	chdir(XOOPS_ROOT_PATH."/modules/system/");
	ob_start("addAdminMenu");
		include XOOPS_ROOT_PATH."/modules/system/admin.php";
	ob_end_flush();



?>