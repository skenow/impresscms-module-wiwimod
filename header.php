<?php

/*
 * Guess the path of Xoops, to include mainfile.
 */
if (!defined('XOOPS_URL')) {
	$scriptfilename = __FILE__;
	eregi("(.*)modules",$scriptfilename,$regs);
	include $regs[1].'mainfile.php';
}
$myts =& MyTextSanitizer::getInstance();
$wiwidir = basename(dirname(__FILE__));
$modversion['dirname'] = $wiwidir;

include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH.'/modules/' . $wiwidir . '/include/functions.php';


?>