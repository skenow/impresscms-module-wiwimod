<?php

//
//  This block displays a Wiwi page.
//  Page selection is done within block administration (TODO)
//	if the reader has modification privilege, shows the "edit" button (TODO) >> see bug
//   
//  Bugs :	- language constants aren't initialized...
//

include_once (XOOPS_ROOT_PATH."/modules/wiwimod/header.php");
include_once (XOOPS_ROOT_PATH."/modules/wiwimod/class/wiwiRevision.class.php");


function wiwimod_showpage ($options) {
	global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $myts;
   
	$block = array();
	$pageObj = new wiwiRevision($options[0]);
	if ($pageObj->id == 0) {
		$block['notfound'] = true;
		$block['_MD_WIWIMOD_PAGENOTFOUND'] = _MB_WIWI_PAGENOTFOUND_MSG;
	} else {
		$block['notfound'] = false;
		if ($pageObj->canRead()) {
			$pagecontent = $pageObj->render();
		} else {
			$pagecontent = "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align=center>"._MB_WIWI_NOREADACCESS_MSG."</td></tr></table></center><br><br>";
		}

		//
		// Handle pagebreaks
		//
		$cpages = explode ("[pagebreak]", $pagecontent);
		if (isset($_GET['wiwistartpage'])) $startpage = intval($_GET['wiwistartpage']) ; else $startpage = 0;
		if (count($cpages) > 0) {
			include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
			$pagenav = new XoopsPageNav(count($cpages), 1, $startpage, 'wiwistartpage', ''); 
			$block['nav'] = $pagenav->RenderNav();
			$pagecontent = $cpages[$startpage];
		}
		
		$block['keyword'] = $pageObj->keyword;
		$block['encodedurl'] = $pageObj->encode($pageObj->keyword);
		$block['title'] = $pageObj->title;
		$block['body'] = $pagecontent;
		$block['lastmodified'] = date(_SHORTDATESTRING, strtotime($pageObj->lastmodified));
		$block['author'] = getUserName($pageObj->u_id);

		$block['mayEdit'] = $pageObj->canWrite();
		$block['EDIT'] = _EDIT;
	}
	return $block;
}


function wiwimod_contextshow($options) {
	global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $myts;
	//
	// Get content to display
	//
	$preg_res = array();
	$sidePage = "";
	$block = array();
	if (preg_match("#\?page=([^&]+)#ie", htmlspecialchars($GLOBALS['xoopsRequestUri'], ENT_QUOTES),  $preg_res)) {
		$page = urldecode($preg_res[1]);
	} else $page=_MB_WIWI_WIWIHOME;

	$sql = "SELECT contextBlock FROM ".$xoopsDB->prefix("wiwimod")." WHERE keyword='$page' ORDER BY id DESC LIMIT 1";
	$result = $xoopsDB->query($sql);
	list($sidePage) = $xoopsDB->fetchRow($result);
	if ($sidePage != "") {
		$pageObj = new wiwiRevision($sidePage);
		if ($pageObj->id != 0) {
			if ($pageObj->canRead()) {
				$block['keyword'] = $pageObj->keyword;
				$block['encodedurl'] = $pageObj->encode($pageObj->keyword);
				$block['title'] = $pageObj->title;
				$block['body'] = $pageObj->render();
				$block['lastmodified'] = date(_SHORTDATESTRING, strtotime($pageObj->lastmodified));
				$block['author'] = getUserName($pageObj->u_id);
				$block['mayEdit'] = $pageObj->canWrite();
				$block['EDIT'] = _EDIT;
			} else {
				$block['keyword'] = $sidePage;
				$block['title'] = "";
				$block['body'] = "<br />Restricted content<br />";
				$block['lastmodified'] = "";
				$block['author'] = "";
				$block['mayEdit'] = false;
				$block['EDIT'] = _EDIT;
			}

		}
	}
	return $block;
}



function wiwimod_showpage_blockedit ($options) {
    $form = "Displayed page&nbsp;:&nbsp;<input type='text' name='options[0]' value='".$options[0]."' />";
	return $form;

}



?>
