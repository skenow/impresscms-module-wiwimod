<?php
/**
 * Main header file of SimplyWiki
 * 
 * @package SimplyWiki
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
$wikiModDir = basename(dirname(__FILE__));
$modversion['dirname'] = $wikiModDir;

include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $wikiModDir . '/include/functions.php';

?>