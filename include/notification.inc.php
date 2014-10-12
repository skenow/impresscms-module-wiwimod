<?php
/**
 * Notification function for SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id: notification.inc.php 21035 2011-03-12 22:45:39Z skenow $
 */
if (!defined('ICMS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

function swiki_notify_iteminfo($category, $item_id) {
	global $xoopsModule, $xoopsModuleConfig, $xoopsConfig;
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	if (empty($xoopsModule) || $xoopsModule->getVar('dirname') !== $wikiModDir) {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($wikiModDir);
		$config_handler =& xoops_gethandler('config');
		$config =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	} else {
		$module =& $xoopsModule;
		$config =& $xoopsModuleConfig;
	}

	if ($category == 'page' || $category == 'global') {
		// 	Assume we have a valid category id
		global $xoopsDB;
		$sql = 'SELECT title, keyword FROM ' . $xoopsDB->prefix('wiki_pages') . ' WHERE pageid = ' . $item_id;
		$result = $xoopsDB->query($sql); // TODO: error check
		$result_array = $xoopsDB->fetchArray($result);
		$item['name'] = $result_array['title'];
		$item['url'] = ICMS_URL . '/modules/' . $wikiModDir . '/index.php?page=' . $result_array['keyword'];
		return $item;
	}
}
