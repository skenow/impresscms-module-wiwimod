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

defined('ICMS_URL') || define('ICMS_URL', XOOPS_URL);
defined('ICMS_ROOT_PATH') || define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);

$wikiModDir = basename(dirname(dirname(__FILE__))) ;
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_recent ($options) {
	global $xoopsDB;
	$wikiModDir = basename(dirname(dirname(__FILE__))) ;
	$limit = (int) $options[0];
	$block = array();
	$myts =& MyTextSanitizer::getInstance();
	$sql = 'SELECT keyword, title, lastmodified, r.userid as u_id, prid, summary FROM ' 
		. $xoopsDB->prefix('wiki_pages') . ' p, ' . $xoopsDB->prefix('wiki_revisions') 
		. ' r WHERE p.pageid=r.pageid AND lastmodified=modified ORDER BY lastmodified DESC LIMIT ' 
		. $limit;
	$result = $xoopsDB->query($sql);

	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while ($content = $xoopsDB->fetcharray($result)) {
		$prf->load($content['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($content['keyword']);
			$link['title'] = $content['title'];
			if ($link['title'] == "") $link['title'] = $content['keyword'];
			$link['lastmodified'] = formatTimestamp(strtotime($content['lastmodified']), _SHORTDATESTRING);
			$link['user'] = xoops_getLinkedUnameFromId($content['u_id']);
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
