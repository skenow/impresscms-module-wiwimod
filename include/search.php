<?php
/**
 * Search function for SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */
if (!defined('ICMS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

$wikiModDir = basename(dirname(dirname(__FILE__)));
include_once ICMS_ROOT_PATH . '/modules/'. $wikiModDir .'/class/wiwiProfile.class.php';

function swiki_search($queryarray, $andor, $limit, $offset, $userid) {

    $sql = 'SELECT * FROM ' . icms::$xoopsDB->prefix('wiki_pages') . ' p, ' . icms::$xoopsDB->prefix('wiki_revisions') . ' r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified';
    if (is_array($queryarray) && ($count = count($queryarray))) {
        $sql .= ' AND (p.title LIKE "%' . $queryarray[0] . '%" OR r.body LIKE "%' . $queryarray[0] . '%")';
        for($i = 1; $i < $count; $i++) {
            $sql .= ' $andor (p.title LIKE "%' . $queryarray[$i] . '%" OR r.body LIKE "%' . $queryarray[$i] . '%")';
        }
    } else {
        $sql .= ' AND r.userid=' . $userid . '';
    }
    $sql .= ' ORDER BY r.modified DESC';

    $items = array();
	$prf = new WiwiProfile();
    $result = icms::$xoopsDB->query($sql, $limit, $offset);
     while($myrow = icms::$xoopsDB->fetchArray($result)) {
		$prf->load($myrow['prid']);
		if ($prf->canRead()) {
			$items[] = array(
				 'title' => $myrow['title'],
				 'link' => 'index.php?page=' . $myrow['keyword'],
				 'time' => strtotime($myrow['modified']),
				 'uid' => $myrow['userid'],
				 'image' => '../../images/quote.gif'
			);
		}
    }

    return $items;
}

