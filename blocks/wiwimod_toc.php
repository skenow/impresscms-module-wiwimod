<?php
/**
 * This block displays the Wiwi index.
 * 
 * @package SimplyWiki
 * @author Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

$wikiModDir = basename( dirname( dirname( __FILE__ ) ) );
include_once XOOPS_ROOT_PATH.'/modules/' . $wikiModDir . '/header.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function wiwimod_toc () {
	global $xoopsDB, $xoopsUser;
	$wikiModDir = basename( dirname(  dirname( __FILE__ ) ) ) ;
	$block = array();
	$myts =& MyTextSanitizer::getInstance();

/*
	$sql = "SELECT w1.keyword, w1.title, w1.visible FROM ".$xoopsDB->prefix("wiwimod")." AS w1 LEFT JOIN ".$xoopsDB->prefix("wiwimod")." AS w2 ON w1.keyword=w2.keyword AND w1.id<w2.id WHERE w2.id IS NULL AND w1.visible>0 ORDER BY w1.visible";
	$result = $xoopsDB->query($sql);
*/

	// Select also the "prid" (privilege Id) 
	//$sql = 'SELECT w1.keyword, w1.title, w1.visible, w1.prid FROM '.$xoopsDB->prefix('wiwimod').' AS w1 LEFT JOIN '.$xoopsDB->prefix('wiwimod').' AS w2 ON w1.keyword=w2.keyword AND w1.id<w2.id WHERE w2.id IS NULL AND w1.visible>0 ORDER BY w1.visible ';
	$sql = 'SELECT keyword, title, visible, prid FROM '.$xoopsDB->prefix('wiki_pages').' p, '.$xoopsDB->prefix('wiki_revisions').' r WHERE p.pageid=r.pageid AND lastmodified=modified AND visible>0 ORDER BY visible, title ';
	$result = $xoopsDB->query($sql);
	
	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while($tcontent = $xoopsDB->fetchArray($result)) {
		$prf->load($tcontent['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($tcontent['keyword']);
			$link['title'] = $myts->htmlSpecialChars($tcontent['title']);
			$block['links'][] = $link;
		}
	}

//	$result = $xoopsDB->query("SELECT DISTINCT keyword, title, visible FROM ".$xoopsDB->prefix("wiwimod")." WHERE visible>0 ORDER BY visible");

/*
	while($tcontent = $xoopsDB->fetchArray($result)) {
	  $link = array();
	  $link['page'] = $tcontent['keyword'];
	  $link['title'] = $myts->makeTboxData4Show($tcontent['title']);
	  $block['links'][] = $link;
	}

*/
	$block['dirname'] = $wikiModDir;
	return $block;

}

?>