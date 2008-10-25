<?php
/**
 * Notification function for wiwimod
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
*
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id
 */ 
if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

function wiwimod_notify_iteminfo($category, $item_id)
{
	global $xoopsModule, $xoopsModuleConfig, $xoopsConfig;
  $wiwidir = basename(dirname(dirname(__FILE__)));
	if (empty($xoopsModule) || $xoopsModule->getVar('dirname') !== $wiwidir) {	
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($wiwidir);
		$config_handler =& xoops_gethandler('config');
		$config =& $config_handler->getConfigsByCat(0,$module->getVar('mid'));
	} else {
		$module =& $xoopsModule;
		$config =& $xoopsModuleConfig;
	}

	global $xoopsDB;
	if ($category=='page') {
		// Assume we have a valid category id
		$sql = 'SELECT title, keyword FROM ' . $xoopsDB->prefix('wiwimod') . ' WHERE pageid = '.$item_id;
		$result = $xoopsDB->query($sql); // TODO: error check
		$result_array = $xoopsDB->fetchArray($result);
		$item['name'] = $result_array['title'];
		$item['url'] = XOOPS_URL . '/modules/'.$wiwidir.'/index.php?page=' . $result_array['keyword'];
		return $item;
	}
	}

?>