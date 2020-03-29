<?php
/**
 * This block displays the Wiwi index.
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

$wikiModDir = basename(dirname(__DIR__));
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_toc() {
	$wikiModDir = basename(dirname(__DIR__));
	$block = array();
	$myts = icms_core_Textsanitizer::getInstance();

	$sql = 'SELECT keyword, title, visible, prid FROM ' . icms::$xoopsDB->prefix('wiki_pages') . ' p, '
		. icms::$xoopsDB->prefix('wiki_revisions') . ' r WHERE p.pageid=r.pageid AND lastmodified=modified AND visible>0 ORDER BY visible, title ';
	$result = icms::$xoopsDB->query($sql);
	
	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while($tcontent = icms::$xoopsDB->fetchArray($result)) {
		$prf->load($tcontent['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($tcontent['keyword']);
			$link['title'] = $myts->htmlSpecialChars($tcontent['title']);
			$block['links'][] = $link;
		}
	}

	$block['dirname'] = $wikiModDir;
	return $block;
}
