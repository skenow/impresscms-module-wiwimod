<?php
/**
 * Main header file of wiwimod
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

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

include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $wiwidir . '/include/functions.php';

?>