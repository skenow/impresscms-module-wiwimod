<?php
/**
 * This block displays recent changes to Wiwi pages
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

$wikiModDir = basename(dirname(dirname(__FILE__))) ;
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_recent ($options) {
	$wikiModDir = basename(dirname(dirname(__FILE__))) ;
	$limit = (int) $options[0];
	$block = array();
	$myts = icms_core_Textsanitizer::getInstance();
	$sql = 'SELECT keyword, title, lastmodified, r.userid as u_id, prid, summary FROM '
		. icms::$xoopsDB->prefix('wiki_pages') . ' p, ' . icms::$xoopsDB->prefix('wiki_revisions')
		. ' r WHERE p.pageid=r.pageid AND lastmodified=modified ORDER BY lastmodified DESC LIMIT '
		. $limit;
	$result = icms::$xoopsDB->query($sql);

	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while ($content = icms::$xoopsDB->fetcharray($result)) {
		$prf->load($content['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($content['keyword']);
			$link['title'] = $content['title'];
			if ($link['title'] == "") $link['title'] = $content['keyword'];
			$link['lastmodified'] = formatTimestamp(strtotime($content['lastmodified']), _SHORTDATESTRING);
			$link['user'] = icms_member_user_Handler::getUserLink($content['u_id']);
			$link['summary'] = $content['summary'];
				
			$block['links'][] = $link;
		}
	}

	$block['dirname'] = $wikiModDir;
	return $block;
}

function swiki_recent_blockedit ($options) {
	$form = _MB_SWIKI_NUM_DISP_DESC . "&nbsp;:&nbsp;<input type='text' name='options[0]' value='" . $options[0] . "' />";
	return $form;
}
