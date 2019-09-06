<?php
/**
 * Notification function for SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 */

if (!defined('ICMS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

function swiki_notify_iteminfo($category, $item_id) {
	$wikiModDir = basename(dirname(dirname(__FILE__)));

	if ($category == 'page' || $category == 'global') {
		// 	Assume we have a valid category id
		$sql = 'SELECT title, keyword FROM ' . icms::$xoopsDB->prefix('wiki_pages') . ' WHERE pageid = ' . $item_id;
		$result = icms::$xoopsDB->query($sql); // TODO: error check
		$result_array = icms::$xoopsDB->fetchArray($result);
		$item['name'] = $result_array['title'];
		$item['url'] = ICMS_URL . '/modules/' . $wikiModDir . '/index.php?page=' . $result_array['keyword'];
		return $item;
	}
}
