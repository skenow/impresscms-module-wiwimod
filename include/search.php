<?php
/**
 * Search function for wiwimod
 * 
 * @package modules::wiwimod
 * @author Xavier JIMENEZ
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id
 */ 
if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

$wiwidir = basename( dirname( dirname( __FILE__ ) ) );
include_once XOOPS_ROOT_PATH.'/modules/'. $wiwidir .'/class/wiwiProfile.class.php';

function wiwimod_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB;
    
    $sql = 'SELECT w1.* FROM '.$xoopsDB->prefix('wiwimod').' AS w1 LEFT JOIN '.$xoopsDB->prefix('wiwimod').' AS w2 ON w1.keyword=w2.keyword AND w1.id<w2.id WHERE w2.id IS NULL';
    if (is_array($queryarray) && ($count = count($queryarray))) {
        $sql .= ' AND (w1.title LIKE '.$queryarray[0].' OR w1.body LIKE '.$queryarray[0].')';
        for($i = 1; $i < $count; $i++) {
            $sql .= ' $andor (w1.title LIKE '.$queryarray[$i].' OR w1.body LIKE '.$queryarray[$i].')';
        }
    } else {
        $sql .= ' AND w1.u_id='.$userid.'';
    }
    $sql .= ' ORDER BY w1.lastmodified DESC';
    
    $items = array();
	$prf = new WiwiProfile();
    $result = $xoopsDB->query($sql, $limit, $offset);
     while($myrow = $xoopsDB->fetchArray($result)) {
		$prf->load($myrow['prid']); 
		if ($prf->canRead()) {
			$items[] = array(
				 'title' => $myrow['title'],
				 'link' => 'index.php?page='.$myrow['keyword'],
				 'time' => formatTimestamp(strtotime($myrow['lastmodified']), _SHORTDATESTRING),
				 'uid' => $myrow['u_id'],
				 'image' => '../../images/quote.gif'
			 );
		}
    }
    
    return $items;
}

?>