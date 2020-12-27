<?php
/**
 * This block displays a Wiwi page.
 *
 * Page selection is done within block administration (TODO)
 * if the reader has modification privilege, shows the "edit" button (TODO) >> see bug
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version 
 */
$wikiModDir = basename(dirname(__DIR__));
include_once ICMS_MODULES_PATH . '/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_showpage($options) {
	$wikiModDir = basename(dirname(__DIR__));

	$block = array ();
	$pageObj = new wiwiRevision($options[0]);
	if ($pageObj->id == 0) {
		$block['notfound'] = true;
		$block['_MD_SWIKI_PAGENOTFOUND'] = _MB_SWIKI_PAGENOTFOUND_MSG;
	} else {
		$block['notfound'] = false;
		if (!$pageObj->canRead()) {
			$pagecontent = icms_core_Message::warning(_MD_SWIKI_NOREADACCESS_MSG);
		} else {
			// Handle pagebreaks
			$pagecontent = $pageObj->body;
			$cpages = explode("[pagebreak]", $pagecontent);
			if (isset($_GET['wiwistartpage']))
				$startpage = (int) $_GET['wiwistartpage'];
			else
				$startpage = 0;
			if (count($cpages) > 0) {
				$pagenav = new icms_view_PageNav(count($cpages), 1, $startpage, 'wiwistartpage', '');
				$block['nav'] = $pagenav->RenderNav();
				$pagecontent = $cpages[$startpage];
			}
			$pagecontent = $pageObj->render($pagecontent);
		}
		$block['keyword'] = $pageObj->keyword;
		$block['encodedurl'] = $pageObj->encode($pageObj->keyword);
		$block['title'] = $pageObj->title;
		$block['body'] = $pagecontent;
		$block['lastmodified'] = formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING);
		$block['author'] = icms_member_user_Handler::getUserLink($pageObj->u_id);

		$block['mayEdit'] = $pageObj->canWrite();
		$block['EDIT'] = _EDIT;
		$block['dirname'] = $wikiModDir;
		$block['showTitle'] = isset($options[1]);
		$block['showAuthor'] = isset($options[2]);
	}
	return $block;
}

function swiki_contextshow($options) {
	$wikiModDir = basename(dirname(__DIR__));

	// Get content to display
	$preg_res = array ();
	$sidePage = '';
	$block = array ();

	if (preg_match("#\?page=([^&]+)#i", htmlspecialchars($GLOBALS['xoopsRequestUri'], ENT_QUOTES), $preg_res)) {
		$page = urldecode($preg_res[1]);
	} else {
		$page = _MB_SWIKI_HOME;
	}

	$sql = 'SELECT contextBlock FROM ' . icms::$xoopsDB->prefix('wiki_pages') . ' WHERE keyword="' . $page . '" ORDER BY pageid DESC LIMIT 1';
	$result = icms::$xoopsDB->query($sql);
	list ( $sidePage ) = icms::$xoopsDB->fetchRow($result);
	if ($sidePage != '') {
		$pageObj = new wiwiRevision($sidePage);
		if ($pageObj->id != 0) {
			if ($pageObj->canRead()) {
				$block['keyword'] = $pageObj->keyword;
				$block['encodedurl'] = $pageObj->encode($pageObj->keyword);
				$block['title'] = $pageObj->title;
				$block['body'] = $pageObj->render();
				$block['lastmodified'] = formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING);
				$block['author'] = icms_member_user_Handler::getUserLink($pageObj->u_id);
				$block['mayEdit'] = $pageObj->canWrite();
				$block['EDIT'] = _EDIT;
			} else {
				$block['keyword'] = $sidePage;
				$block['title'] = '';
				$block['body'] = _MB_SWIKI_NOREADACCESS_MSG;
				$block['lastmodified'] = '';
				$block['author'] = '';
				$block['mayEdit'] = false;
				$block['EDIT'] = _EDIT;
			}
		}
		$block['dirname'] = $wikiModDir;
	}
	return $block;
}

function swiki_showpage_blockedit($options) {
	$form = _MB_SWIKI_SHOWPAGE_DESC . "&nbsp;:&nbsp;<input type='text' name='options[0]' value='" . $options[0] . "' /><br />";
	$form .= _MB_SWIKI_SHOW_TITLE . "&nbsp;:&nbsp;<input type='checkbox' name='options[1]' value='1'" . (isset($options[1]) ? " checked='checked'" : "") . " /><br />";
	$form .= _MB_SWIKI_SHOW_AUTHOR . "&nbsp;:&nbsp;<input type='checkbox' name='options[2]' value='1'" . (isset($options[2]) ? " checked='checked'" : "") . " />";

	return $form;
}
