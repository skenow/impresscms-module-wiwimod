<?php
/**
 * Admin area index page
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
/**
 * Load the header file for the wiwimod administration area
 */ 
include 'admin_header.php';
include '../class/wiwiRevision.class.php';
include '../class/wiwiPageNav.class.php';

global $myts;
/* Valid $_GET variables and types:  (string) op, (integer) id, (integer) starthist, (string) page 
 * Define all variables and set a default value
*/
$op = $id = $starthist = $page = NULL;
$valid_getvars = array('op' => 'string', 'id' => 'int', 'starthist' => 'int', 'page' => 'string');
/* This will provide a cleaned variable array to use instead of the $_GET variable */
$clean_GET = wiwi_cleanVars($_GET, $valid_getvars);
/* This will explode the valid variables for use everywhere */
extract($clean_GET);
$page = stripslashes($page);
xoops_cp_header();
/* Valid op values: listpages, history, diff, restore, fixit, deleteit, fix, delete, cleanupdb, cleanit */
$valid_op = array ('listpages', 'history', 'diff', 'restore', 'fixit', 'deleteit', 'fix', 'delete', 'cleanupdb', 'cleanit', '', NULL);
if (in_array($op, $valid_op, true)){
echo '<script>function submitaction(extra_args) {';
echo 'var frm = document.getElementById("thisform"); ';
echo 'frm.action = "'.basename(__FILE__).'"+(extra_args == "" ? "" : "?"+extra_args);';
echo 'frm.submit();';
echo '}</script>';
echo '<form id="thisform" action='.basename(__FILE__).' method="post">';

switch ($op) {
	default :
	case 'listpages' :
		echo getAdminMenu (0,_AM_WIWI_LISTPAGE_NAV);
		include 'listpages.php';
		break;
	case 'history' :
	case 'diff' :
		echo getAdminMenu (0,_AM_WIWI_LISTPAGE_NAV.':'._AM_WIWI_HISTORY_NAV);
		include 'history.php';
		break;

	case 'restore' :
		include 'listpages_hidden.inc.php';
//		$id = isset( $_GET['id'] ) ? intval($_GET['id']) : 0; 
		$rev = new wiwiRevision('',$id);
		$success = $rev->restore();
		redirect_header("javascript:submitaction('page=".urlencode($rev->encode($rev->keyword))."&amp;op=history');", 2, ($success)?_MD_WIWI_DBUPDATED_MSG:_MD_WIWI_ERRORINSERT_MSG);
		break;

	case 'fixit' :
		include 'listpages_hidden.inc.php';
//		$id = isset( $_GET['id'] ) ? intval($_GET['id']) : 0; 
//		$starthist = isset( $_GET['starthist'] ) ? intval( $_GET['starthist'] ) : 0; 
		$rev = new wiwiRevision('',$id);
		$success = $rev->fix();
		redirect_header("javascript:submitaction('page=".urlencode($rev->encode($rev->keyword))."&amp;=history&amp;starthist=".$starthist."');", 2, ($success)?_MD_WIWI_DBUPDATED_MSG:_MD_WIWI_ERRORINSERT_MSG);
		break;

	case 'deleteit' :
		include 'listpages_hidden.inc.php';
//		$page = stripslashes(isset( $_GET['page'] ) ? $_GET['page'] : 0); 
		$rev = new wiwiRevision($page);
		$success = $rev->deletePage();
		redirect_header("javascript:submitaction('page=".urlencode($rev->encode($rev->keyword))."&amp;=listpages');", 2, ($success)?_MD_WIWI_DBUPDATED_MSG:_MD_WIWI_ERRORINSERT_MSG);
		break;

	case 'fix' :
		include 'listpages_hidden.inc.php';
//		$id = isset( $_GET['id'] ) ? intval($_GET['id']) : 0; 
//		$page = stripslashes(isset( $_GET['page'] ) ? $_GET['page'] : 0); 
//		$starthist = isset( $_GET['starthist'] ) ? intval( $_GET['starthist'] ) : 0; 
		echo "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align='center'>"._AM_WIWI_CONFIRMFIX_MSG."<br /><br />";
		echo '<input type=\'button\' value='._YES.' onclick="javascript:submitaction(\'op=fixit&amp;id='.$id.'&amp;starthist='.$starthist.'\')" />&nbsp;&nbsp;<input type=\'button\' value='._NO.' onclick="javascript:submitaction(\'op=history&amp;starthist='.$starthist.'&amp;page='.wiwiRevision::encode($page).'\')" />';
		echo '</td></tr></table></center><br /><br />';
		break;

	case 'delete' :
		include 'listpages_hidden.inc.php';
//		$page = stripslashes(isset( $_GET['page'] ) ? $_GET['page'] : 0); 
		echo "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align='center'>"._AM_WIWI_CONFIRMDEL_MSG."<br /><br />";
		echo '<input type=\'button\' value='._YES.' onclick="javascript:submitaction(\'op=deleteit&amp;page='.wiwiRevision::encode($page).'\')" />&nbsp;&nbsp;<input type=\'button\' value='._NO.' onclick="javascript:submitaction(\'op=listpages&amp;startlist='.$startlist.'\')" />';
		echo '</td></tr></table></center><br /><br />';
		break;

	case 'cleanupdb' :
		echo "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align=center>"._AM_WIWI_CONFIRMCLEAN_MSG."<br /><br />";
		echo '<input type=\'button\' value='._YES.' onclick="javascript:submitaction(\'op=cleanit\')" />&nbsp;&nbsp;<input type=\'button\' value='._NO.' onclick="javascript:submitaction(\'op=listpages\')" />';
		echo '</td></tr></table></center><br /><br />';
		break;

	case 'cleanit' :
		$success = wiwiRevision::cleanPagesHistory();
		redirect_header("javascript:submitaction('op=listpages');", 2, ($success)?_MD_WIWI_DBUPDATED_MSG:_MD_WIWI_ERRORINSERT_MSG);
		break;

}

echo '</form><br />';
} else {
// put something here if you want to inform users of a bad op value
// echo "you made a bad choice!";
}
xoops_cp_footer();

?>