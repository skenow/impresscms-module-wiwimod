<?php
/**
 * Admin area index page
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */
/**
 * Load the header file for the SimplyWiki administration area
 */
include 'admin_header.php';
include '../class/wiwiRevision.class.php';
include '../class/wiwiPageNav.class.php';

/* Valid $_GET variables and types:  (string) op, (integer) id, (integer) starthist, (string) page
 * Define all variables and set a default value
 */
$op = $id = $starthist = $page = null;
$valid_getvars = array(
	'op' => 'string',
	'id' => 'int',
	'starthist' => 'int',
	'page' => 'string'
);
/* This will provide a cleaned variable array to use instead of the $_GET variable */
$clean_GET = swiki_cleanVars($_GET, $valid_getvars);
/* This will explode the valid variables for use everywhere */
extract($clean_GET);
$page = stripslashes($page);
icms_cp_header();
/* Valid op values: listpages, history, diff, restore, fixit, deleteit, fix, delete, cleanupdb, cleanit */
$valid_op = array(
	'listpages',
	'history',
	'diff',
	'restore',
	'fixit',
	'deleteit',
	'fix',
	'delete',
	'cleanupdb',
	'cleanit',
	'',
	null,
);
if (in_array($op, $valid_op, true)) {
	echo '<script>function submitaction(extra_args) {'
			. 'var frm = document.getElementById("thisform"); '
			. 'frm.action = "' . basename(__FILE__) . '"+(extra_args == "" ? "" : "?"+extra_args);'
			. 'frm.submit();'
		. '}</script>'
		. '<form id="thisform" action=' . basename(__FILE__) . ' method="post">';

	switch ($op) {
		default :
		case 'listpages' :
			if (method_exists(icms::$module, 'displayAdminMenu')) {
				echo icms::$module->displayAdminMenu (1, _AM_SWIKI_LISTPAGE_NAV);
			} else {
				echo getAdminMenu (0, _AM_SWIKI_LISTPAGE_NAV);
			}
			include 'listpages.php';
			break;
			
		case 'history' :
		case 'diff' :
			if (method_exists(icms::$module, 'displayAdminMenu')) {
				echo icms::$module->displayAdminMenu (1, _AM_SWIKI_LISTPAGE_NAV . ':' . _AM_SWIKI_HISTORY_NAV);
			} else {
				echo getAdminMenu (0, _AM_SWIKI_LISTPAGE_NAV . ':' . _AM_SWIKI_HISTORY_NAV);
			}
			include 'history.php';
			break;

		case 'restore' :
			include 'listpages_hidden.inc.php';
			$restoredRevision = new wiwiRevision('', $id);
			$pageObj->title = icms_core_DataFilter::stripSlashesGPC($restoredRevision->title);
			$pageObj->body = icms_core_DataFilter::stripSlashesGPC($restoredRevision->body);
			$pageObj->contextBlock = $restoredRevision->contextBlock;
			$success = $pageObj->add();
				redirect_header("javascript:submitaction('page="
				. urlencode($rev->encode($rev->keyword)) . "&amp;op=history');", 2,
				($success) ? _MD_SWIKI_DBUPDATED_MSG : _MD_SWIKI_ERRORINSERT_MSG
			);
			break;

		case 'fixit' :
			include 'listpages_hidden.inc.php';
			$rev = new wiwiRevision('', $id);
			$success = $rev->fix();
			redirect_header("javascript:submitaction('page="
				. urlencode($rev->encode($rev->keyword)) . "&amp;op=history&amp;starthist=" . $starthist . "');", 2,
				($success) ? _MD_SWIKI_DBUPDATED_MSG : _MD_SWIKI_ERRORINSERT_MSG
			);
			break;

		case 'deleteit' :
			include 'listpages_hidden.inc.php';
			$rev = new wiwiRevision($page);
			$success = $rev->deletePage();
			redirect_header("javascript:submitaction('page="
				. urlencode($rev->encode($rev->keyword)) . "&amp;op=listpages');", 2,
				($success) ? _MD_SWIKI_DBUPDATED_MSG : _MD_SWIKI_ERRORINSERT_MSG
			);
			break;

		case 'fix' :
			include 'listpages_hidden.inc.php';
			echo "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align='center'>"
				. _AM_SWIKI_CONFIRMFIX_MSG . "<br /><br />"
				. '<input type=\'button\' value=' . _YES
				. ' onclick="javascript:submitaction(\'op=fixit&amp;id=' . $id
				. '&amp;starthist=' . $starthist . '\')" />&nbsp;&nbsp;<input type=\'button\' value=' . _NO
				. ' onclick="javascript:submitaction(\'op=history&amp;starthist=' . $starthist
				. '&amp;page=' . wiwiRevision::encode($page) . '\')" />'
				. '</td></tr></table></center><br /><br />';
			break;

		case 'delete' :
			include 'listpages_hidden.inc.php';
			echo "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align='center'>"
				._AM_SWIKI_CONFIRMDEL_MSG . "<br /><br />"
				. '<input type=\'button\' value=' . _YES
				. ' onclick="javascript:submitaction(\'op=deleteit&amp;page=' . wiwiRevision::encode($page)
				. '\')" />&nbsp;&nbsp;<input type=\'button\' value=' . _NO
				. ' onclick="javascript:submitaction(\'op=listpages&amp;startlist=' . $startlist . '\')" />'
				. '</td></tr></table></center><br /><br />';
			break;

		case 'cleanupdb' :
			echo "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align=center>"
				. _AM_SWIKI_CONFIRMCLEAN_MSG . "<br /><br />"
				. '<input type=\'button\' value=' . _YES
				. ' onclick="javascript:submitaction(\'op=cleanit\')" />&nbsp;&nbsp;<input type=\'button\' value=' . _NO
				. ' onclick="javascript:submitaction(\'op=listpages\')" />'
				. '</td></tr></table></center><br /><br />';
			break;

		case 'cleanit' :
			$rev = new wiwiRevision($page);
			$success = $rev->cleanPagesHistory();
			redirect_header("javascript:submitaction('op=listpages');", 2,
				($success) ? _MD_SWIKI_DBUPDATED_MSG : _MD_SWIKI_ERRORINSERT_MSG
			);
			break;
	}

	echo '</form><br />';
} else {
	// put something here if you want to inform users of a bad op value
	// echo "you made a bad choice!";
}
icms_cp_footer();

