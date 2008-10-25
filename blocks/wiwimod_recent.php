<?php
/**
 * This block displays recent changes to Wiwi pages
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
*
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

$wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
include_once XOOPS_ROOT_PATH.'/modules/' . $wiwidir . '/header.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $wiwidir . '/class/wiwiRevision.class.php';

function wiwimod_recent ($options) {
	global $xoopsDB;
	$wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
	$limit = intval($options[0]);
	$block = array();
	$myts =& MyTextSanitizer::getInstance();
    $sql = 'SELECT w1.keyword, w1.title, w1.lastmodified, w1.u_id, w1.prid FROM '.$xoopsDB->prefix('wiwimod').' AS w1 LEFT JOIN '.$xoopsDB->prefix('wiwimod').' AS w2 ON w1.keyword=w2.keyword AND w1.id<w2.id WHERE w2.id IS NULL ORDER BY w1.lastmodified DESC LIMIT '.$limit;
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
			$link['user'] = getUserName($content['u_id']);
	//		$link['user'] = $content["u_id"];
			
			$block['links'][] = $link;
		}
	}
	
	$block['dirname'] = $wiwidir;
	return $block;
}


function wiwimod_recent_blockedit ($options) {
    $form = _MB_WIWI_NUM_DISP_DESC."&nbsp;:&nbsp;<input type='text' name='options[0]' value='".$options[0]."' />";
	return $form;
}

?>