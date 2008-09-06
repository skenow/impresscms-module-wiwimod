<?php

	include "listpages_hidden.inc.php";
	/*
	 * get history related variables
	 */
	$page = isset( $_GET['page'] ) ? $_GET['page'] : ""; 
	$id = isset( $_GET['id'] ) ? intval($_GET['id']) : 0; 
	$starthist = isset( $_GET['starthist'] ) ? intval( $_GET['starthist'] ) : 0; 
	$limit = 5;

	$page = stripslashes($page);

	if ($page == "") redirect_header("javascript:history.go(-1)", 2, _AM_WIWI_NOPAGESPECIFIED_MSG);

	$pageObj = new WiwiRevision(($id==0 ? $page : ""),$id);
	$hist = $pageObj->history($limit, $starthist);
	$maxcount = $pageObj->historyNum();

	echo '<br><br><input type=button onclick="javascript:submitaction(\'op=listpages&startlist='.$startlist.'\');" value="'._AM_WIWI_LISTPAGES_BTN.'"><br><br>';
	echo "<style>tr.highlitedrevision td {background-color: #FFCC66; padding: 5px;}</style>";
	echo '<table border="0" cellpadding="0" cellspacing="1" width="100%" class="outer">
		<tr class="head"><td></td><td><b>'._MD_WIWI_TITLE_COL.'</b></td><td width="20%"><b>'._MD_WIWI_MODIFIED_COL.'</b></td><td width="10%"><b>'._MD_WIWI_AUTHOR_COL.'</b></td><td width="30%"><b>'._MD_WIWI_ACTION_COL.'</b></td></tr>';

	foreach ($hist as $i=>$rev) {
		$encodedKeyword = $pageObj->encode($rev['keyword']);
		echo '<tr class="'.(($pageObj->id == $rev['id']) ? "highlitedrevision" : (($i % 2)?"even":"odd")).'">';
		echo '<td width=10>'.($pageObj->id == $rev['id'] ? '<img src="../images/hand.gif">' : '&nbsp;').'</td>';
		echo '<td><a href="#" onclick="javascript:submitaction(\'page='.$encodedKeyword.'&op=history&id='.$rev['id'].'\');">'.$myts->htmlSpecialChars($rev['title']).'</a></td>';
		echo '<td>'.$rev['lastmodified'].'</td>';
		echo '<td>'.getUserName($rev['u_id']).'</td>';
		
		echo '<td><a href="#" onclick="javascript:submitaction(\'page='.$encodedKeyword.'&op=history&id='.$rev['id'].'\');">'._MD_WIWI_VIEW_BTN.'</a> | <a href="#" onclick="javascript:submitaction(\'page='.$encodedKeyword.'&op=diff&id='.$rev['id'].'\');">'._MD_WIWI_COMPARE_BTN.'</a> | <a href="javascript:submitaction(\'op=restore&id='.$rev['id'].'\');">'._MD_WIWI_RESTORE_BTN.'</a> | <a href="javascript:submitaction(\'page='.urlencode($encodedKeyword).'&amp;op=fix&amp;id='.$rev['id'].'\');">'._MD_WIWI_FIX_BTN.'</a></td></tr>';
	}
	echo '</table>';

	$pagenav = new wiwiPageNav( $maxcount, $limit, $starthist, 'starthist', 'op='.$op.'&page='.$page.'&id='.$id, 'submitaction' ); 
	echo '<table width=100%><tr><td width=15%>('.$maxcount.' results)</td><td><center>' . $pagenav -> renderNav() . '</center></td></tr></table>'; 

	/*
	 * Page/diff view
	 */
	echo "<hr />";
	echo "<br><fieldset><legend style='font-weight: bold; color: #900;'>";
	if ($op == "history") {
		echo _MD_WIWI_BODY_TXT." :</legend><br>";
		echo $pageObj->render();
	} else {
		echo _MD_WIWI_DIFF_TXT." :</legend><br>";
		$bodyDiff = $titleDiff = "";
		$pageObj->diff($bodyDiff, $titleDiff);
		echo '<h4>'.$titleDiff.'</H4>';
		echo $bodyDiff;
	}
	echo '</fieldset>';

?>