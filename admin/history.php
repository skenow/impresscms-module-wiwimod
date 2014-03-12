<?php
/**
 * List of revisions for a page
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */
if (!defined('ICMS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();
/** get list filters */
include 'listpages_hidden.inc.php';
/*
 * get history related variables
 */
$page = isset($_GET['page']) ? filter_input(INPUT_GET, 'page') : '';
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$starthist = isset($_GET['starthist']) ? (int) $_GET['starthist'] : 0;
$limit = 5;

$page = stripslashes($page);

if ($page == '') redirect_header('javascript:history.go(-1)', 2, _AM_SWIKI_NOPAGESPECIFIED_MSG);

$pageObj = new WiwiRevision(($id==0 ? $page : ''), $id);
$hist = $pageObj->history($limit, $starthist);
$maxcount = $pageObj->historyNum();

echo '<br /><br /><input type=button onclick="javascript:submitaction(\'op=listpages&startlist=' 
	. $startlist . '\');" value="' . _AM_SWIKI_LISTPAGES_BTN . '"><br /><br />'
	. '<style>tr.highlitedrevision td {background-color: #FFCC66; padding: 5px;}</style>'
	. '<table border="0" cellpadding="0" cellspacing="1" width="100%" class="outer"><tr class="head"><td></td><td><strong>'
	. _MD_SWIKI_TITLE_COL . '</strong></td><td width="20%"><strong>' 
	. _MD_SWIKI_MODIFIED_COL . '</strong></td><td width="10%"><strong>' 
	. _MD_SWIKI_AUTHOR_COL . '</strong></td><td width="30%"><strong>' 
	. _MD_SWIKI_ACTION_COL . '</strong></td></tr>';

foreach ($hist as $i=>$rev) {
	$encodedKeyword = $pageObj->encode($rev['keyword']);
	echo '<tr class="' . (($pageObj->id == $rev['id']) ? "highlitedrevision" : (($i % 2)?"even":"odd")) . '">'
		. '<td width="10">' . ($pageObj->id == $rev['id'] ? '<img src="../images/hand.gif">' : '&nbsp;') . '</td>'
		. '<td><a href="#" onclick="javascript:submitaction(\'page=' . $encodedKeyword . '&op=history&id=' . $rev['id'] . '\');">' . $myts->htmlSpecialChars($rev['title']) . '</a></td>'
		. '<td>' . formatTimestamp(strtotime($rev['lastmodified']), _MEDIUMDATESTRING) . '</td>'
		. '<td>' . xoops_getLinkedUnameFromId($rev['u_id']) . '</td>'
		. '<td><a href="#" onclick="javascript:submitaction(\'page=' . $encodedKeyword 
		. '&op=history&id=' . $rev['id'] . '\');">' . _MD_SWIKI_VIEW_BTN 
		. '</a> | <a href="#" onclick="javascript:submitaction(\'page=' . $encodedKeyword 
		. '&op=diff&id=' . $rev['id'] . '\');">' . _MD_SWIKI_COMPARE_BTN 
		. '</a> | <a href="javascript:submitaction(\'op=restore&id=' . $rev['id'] . '\');">' 
		. _MD_SWIKI_RESTORE_BTN . '</a> | <a href="javascript:submitaction(\'page=' 
		. urlencode($encodedKeyword) . '&amp;op=fix&amp;id=' . $rev['id'] . '\');">' 
		. _MD_SWIKI_FIX_BTN . '</a></td></tr>';
}
echo '</table>';

$pagenav = new wiwiPageNav($maxcount, $limit, $starthist, 'starthist', 'op=' . $op . '&page=' . $page . '&id=' . $id, 'submitaction');
echo '<table width=100%><tr><td width=15%>(' . $maxcount . ' results)</td><td><center>' . $pagenav -> renderNav() . '</center></td></tr></table>';

/*
 * Page/diff view
 */
echo "<hr /><br /><fieldset><legend style='font-weight: bold; color: #900;'>";
if ($op == 'history') {
	echo _MD_SWIKI_BODY_TXT . ' :</legend><br />'
	. $pageObj->render();
} else {
	echo _MD_SWIKI_DIFF_TXT . ' :</legend><br />';
	$bodyDiff = $titleDiff = '';
	$pageObj->diff($bodyDiff, $titleDiff);
	echo '<h4>' . $titleDiff . '</h4>'
	. $bodyDiff;
}
echo '</fieldset>';

