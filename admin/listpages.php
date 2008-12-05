<?php
/**
 * List of pages
 * 
 * @package SimplyWiki
 * @author Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();
	/*
	 * get history related variables
	 */
$post_selwhere = $post_text = $post_profile = $startlist = NULL;
$post_selorderby = 'keyword';
$post_selorderdir = 'ASC';

$allowed_postvars = array (
  'post_selwhere' => 'plaintext',
  'post_text' => 'plaintext',
  'post_profile' => 'int',
  'post_selorderby' => 'plaintext',
  'post_selorderdir' => 'plaintext');
$clean_POST = wiwi_cleanVars($_POST, $allowed_postvars);
extract($clean_POST);

$allowed_getvars = array (
  'startlist' => 'int');
$clean_GET = wiwi_cleanVars($_GET, $allowed_getvars);
extract($clean_GET);

	$pgitemsnum = 15;  // numbre of items per result page.
		
	/*
	 * Query form
	 */
	$selWhere = Array(
		''				=> array( 'desc'=> _AM_SWIKI_LISTPAGES_ALLPAGES_OPT,	'type' =>'none'),
		'keyword'		=> array( 'desc'=> _AM_SWIKI_LISTPAGES_KEYWORD_OPT ,	'type' =>'text'),
		'title'			=> array( 'desc'=> _AM_SWIKI_LISTPAGES_TITLE_OPT ,	'type' =>'text'),
		'body'			=> array( 'desc'=> _AM_SWIKI_LISTPAGES_BODY_OPT ,	'type' =>'text'),
//			'u_id'			=> array( 'desc'=> _AM_SWIKI_LISTPAGES_UID_OPT ,	'type' =>'user'),
		'parent'		=> array( 'desc'=> _AM_SWIKI_LISTPAGES_PARENT_OPT,	'type' =>'text'),
		'prid'			=> array( 'desc'=> _AM_SWIKI_LISTPAGES_PRID_OPT,		'type' =>'profile'),
//			'lastmodified'	=> array( 'desc'=> _AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT,	'type' =>'date'),
		);
	$selOrder = Array(
		Array ('desc' => _AM_SWIKI_LISTPAGES_KEYWORD_OPT,		'col' => 'keyword' ),
		Array ('desc' => _AM_SWIKI_LISTPAGES_TITLE_OPT,			'col' => 'title' ),
		Array ('desc' => _AM_SWIKI_LISTPAGES_PARENT_OPT,			'col' => 'parent' ),
		Array ('desc' => _AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT, 	'col' => 'lastmodified' ),
		);

	$selOrderDir = Array(
		Array ('desc' => _AM_SWIKI_LISTPAGES_ORDERASC_OPT,		'col' => 'ASC' ),
		Array ('desc' => _AM_SWIKI_LISTPAGES_ORDERDESC_OPT,		'col' => 'DESC' ),
		);

//	echo "<fieldset><legend style='font-weight: bold; color: #900;'>Wiwi Pages</legend>"; 

	echo '<script>function showSelectOperands(ele) {';
	echo 'var ctltype = "none";';
	echo 'var ctl_text = document.getElementById("post_text");';
	echo 'var ctl_profile = document.getElementById("post_profile");';
	foreach ($selWhere as $key=>$sel) {
		echo 'if (ele.value == "'.$key.'") ctltype = "'.$sel['type'].'";';
		}
	echo 'ctl_text.style.display = (ctltype == "text") ? "" : "none";';
	echo 'ctl_profile.style.display = (ctltype == "profile") ? "" : "none";';

	echo '}</script>';
	echo '<br /><br />'._AM_SWIKI_PAGESFILTER_TXT.'&nbsp;<select name="post_selwhere" onchange="showSelectOperands(this);">';
	foreach ($selWhere as $key=>$sel) {
		echo '<option value="'.$key.'" '.($key == $post_selwhere ? "selected " : "").'>'.$sel['desc'].'</option>';
	}
	echo '</select>&nbsp;';
	echo '<span id="post_text" style="display:'.($selWhere[$post_selwhere]['type']=="text" ? "" : "none").'">&nbsp;'._AM_SWIKI_LIKE_TXT.'&nbsp;<input name="post_text" type="text" value="'.$post_text.'" size="10" />&nbsp;</span>';
	echo '<span id="post_profile" style="display:'.($selWhere[$post_selwhere]['type']=="profile" ? "" : "none").'">&nbsp;'._AM_SWIKI_PROFILEIS_TXT.'&nbsp;<select name="post_profile">';
	$prf = new WiwiProfile();
	$prflist = $prf->getAllProfiles();
//		echo '<option value=0'.(0 == $post_profile ? " SELECTED" : "").'>(no profile)</option>';
	foreach ($prflist as $key => $value) {
		echo '<option value='.$key.($key == $post_profile ? " SELECTED" : "").'>'.$value.'</option>';
	};
	echo '</select>&nbsp;</span>';
	
	echo '&nbsp;'._AM_SWIKI_ORDERBY_TXT.'&nbsp;<select name="post_selorderby">';
	foreach ($selOrder as $sel) {
		echo '<option value="'.$sel['col'].'" '.($sel['col'] == $post_selorderby ? "selected " : "").'>'.$sel['desc'].'</option>';
	}
	echo '</select>&nbsp;';

	echo '<select name="post_selorderdir">';
	foreach ($selOrderDir as $sel) {
		echo '<option value="'.$sel['col'].'" '.($sel['col'] == $post_selorderdir ? "selected " : "").'>'.$sel['desc'].'</option>';
	}
	echo '</select>&nbsp;';

	echo '&nbsp;<input type=button value="go" onclick="javascript:submitaction(\'op=listpages\');" /><br />';

	/*
	 * Results
	 */

	switch ($selWhere[$post_selwhere]['type']) {
		case 'text' :
			$wherexpr = " lower(".$post_selwhere.") LIKE '%".$post_text."%' ";
			break;
		case 'profile' :
			$wherexpr = $post_selwhere.' = '.$post_profile.' ';
			break;
		default :
			$wherexpr = '';
			break;
	}
	$pageObj = new WiwiRevision();
	$pageArr =& $pageObj->getPages($wherexpr,$post_selorderby.' '.$post_selorderdir,$pgitemsnum,$startlist);
	$maxcount = $pageObj->getPagesNum($wherexpr/*,$post_selorderby.' '.$post_selorderdir*/);
	
	echo '<table border="0" cellpadding="0" cellspacing="1" width="100%" class="outer">';
	echo '<tr class="head"><td width="20%"><b>'._MD_SWIKI_KEYWORD_COL.'</b></td><td><b>'._MD_SWIKI_TITLE_COL.'</b></td><td width="10%"><b>'._MD_SWIKI_MODIFIED_COL.'</b></td><td width="30%"><b>'._MD_SWIKI_ACTION_COL.'</b></td></tr>';

	for ($i=0; $i<count($pageArr); $i++) {
		$encodedKeyword = $pageObj->encode($pageArr[$i]->keyword);
		echo '<tr class="'.(($i % 2)?"even":"odd").'"><td><a href="#" onclick="submitaction(\'op=history&amp;page='.$encodedKeyword.'\');">'.$pageArr[$i]->keyword.'</a></td>
		<td>'.$myts->htmlSpecialChars($pageArr[$i]->title).'</td>
		<td>'.formatTimestamp( @strtotime($pageArr[$i]->lastmodified), _SHORTDATESTRING ).'</td>
		<td><a href="#" onclick="submitaction(\'op=history&amp;page='.$encodedKeyword.'\');">'._MD_SWIKI_HISTORY_BTN.'</a> | <a href="javascript:submitaction(\'op=delete&amp;page='.urlencode($encodedKeyword).'\');">'._DELETE.'</a></td></tr>';
	}
	echo '</table></br>';
	echo '<input type="hidden" name="startlist" value="'.$startlist.'" />';
	$pagenav = new wiwiPageNav( $maxcount, $pgitemsnum, $startlist, 'startlist', '', 'submitaction'); 
	echo '<table width=100%><tr><td width="15%">('.$maxcount.' '._AM_SWIKI_LISTPAGES_RESULTS_TXT.')</td><td><center>' . $pagenav -> renderNav() . '</center></td></tr></table>'; 
	echo '<br /><input type=button value="'._AM_SWIKI_CLEANUPDB_BTN.'" onclick="javascript:submitaction(\'op=cleanupdb\');" /><br />';
	echo '<hr />';

//	echo "</fieldset>";

?>