<?php
/**
 * Main index page of wiwimod - displays all pages on the user side
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 * @author Gizmhail
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

/** Include the page header for the module */    
include_once 'header.php';
/** Include the class for the page objects (revisions) */
include_once 'class/wiwiRevision.class.php';

/*
 * extract all header variables to corresponding php variables ---
 * @todo : - $xoopsUser can be overriden by post variables >> security fix ?
 */      
$id = $pageid =$visible =  0;
$page = $contextBlock = $parent = $op = '';
$allowed_getvars = array (
     'op'=>'string',
     'back'=>'string',
     'pageid'=>'int',
     'startpage'=>'int',
     'com_order'=>'string',
     'page'=>'string',
     'id'=>'int');
$allowed_postvars = array (
     'op'=>'string',
     'page'=>'string',
     'pageid'=>'int',
     'id'=>'int',
     'uid'=>'int', 
     'lastmodified'=>'string', 
     'title'=>'string', 
     'editor'=>'string', 
     'editoptions'=>'string',
     'body'=>'string', 
     'parent'=>'string',
     'prid'=>'int',
     'visible'=>'int',
     'contextBlock'=>'string',
     'item_tag'=>'string');
$clean_GET = wiwi_cleanVars($_GET, $allowed_getvars);
extract($clean_GET);

// valid values for op: preview, insert, quietsave, edit, history, diff, restore
$valid_ops = array('preview', 'insert', 'quietsave', 'edit', 'history', 'diff', 'restore', NULL);
$op = (in_array($op, $valid_ops, true)) ? $op : '';
//$op = (isset($_GET['op']))? trim(($_GET['op'])):"";
if (!empty($_POST)) {
     $clean_POST = wiwi_cleanVars($_POST, $allowed_postvars);
     extract($clean_POST);
}

$page = stripslashes($page);  // if page name comes in url, decode it.

//
//-- Retrieve page data
//
if ((($op == 'preview') || ($op == 'insert') || ($op == 'quietsave')) && isset($id)) {
	/*
	 * data comes from post variables
	 */
	$pageObj = new wiwiRevision();
	$pageObj->keyword = $page;
	$pageObj->title = $title;		
	$pageObj->body = $body;		
	$pageObj->lastmodified = $lastmodified;
	$pageObj->u_id = (int) $uid;
	$pageObj->parent = $pageObj->normalize($parent);		
	$pageObj->visible = (int) $visible;	
	$pageObj->contextBlock = $pageObj->normalize($contextBlock);
	$pageObj->pageid = (int) $pageid;
	$pageObj->profile = new wiwiProfile( (int) $prid);	
	$pageObj->id = (int) $id;

} else {
	/*
	 * data is read from database
	 */
	$pageObj = new wiwiRevision($page,0,$pageid);
	if ($pageObj->id == 0) {
		/*
		 * page doesn't exist >> edit new one, with default values for title and profile
		 */
		$op = 'edit';
		$pageObj->title = $pageObj->keyword;
		if (isset($_GET['back'])) {
			$pageObj->parent = stripslashes($_GET['back']);	// default value for parent field = initial caller.
			$parentObj = new wiwiRevision($pageObj->parent);
			$pageObj->profile =& $parentObj->profile;   // is reference assignment a good idea ?
		}
	}
}
if (!isset($_GET['pageid'])){$_GET['pageid'] = (int) $pageObj->pageid;} // this will help with notifications!
//
// process required action
//
switch ($op) {

	case 'insert' :
	case 'quietsave' :
		/*
		 *  save page modifications and redirect
		 */
		if ($pageObj->concurrentlySaved()) {
			redirect_header('index.php?page='.urlencode($pageObj->keyword), 2, _MD_WIWI_EDITCONFLICT_MSG);
		} elseif (!$pageObj->canWrite()) {
			redirect_header('index.php?page='.urlencode($pageObj->keyword), 2, _MD_WIWI_NOWRITEACCESS_MSG);
		} else {
			$success = ($op == 'insert') ? $pageObj->add() : $pageObj->save();

			if ($success) {
				/* Tag module support (Gizmhail) */
		                if(isTagModuleActivated())
				{
					$tag_handler = xoops_getmodulehandler('tag', 'tag');
					$tag_handler->updateByItem($_POST['item_tag'], $pageObj->pageid, $xoopsModule->getVar('dirname'), $catid =0);
				}
				/* Tag module support end*/
				// Define tags for notification message
				$tags = array();
				$tags['PAGE_NAME'] = $pageObj->title;
				$tags['PAGE_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/index.php?pageid=' . $pageObj->pageid;
				$notification_handler =& xoops_gethandler('notification');
				$notification_handler->triggerEvent('page', $pageObj->pageid, 'page_modified', $tags);
			}
			redirect_header('index.php?page='.urlencode($pageObj->keyword), 2, ($success)?_MD_WIWI_DBUPDATED_MSG:_MD_WIWI_ERRORINSERT_MSG);
			echo 'index.php?page='.$pageObj->keyword;
		}
		exit();
		break;

	case 'edit':
	case 'preview':
		//
		//  show page in editor (after privileges check)
		//
		if (!$pageObj->canWrite()) {
			include_once XOOPS_ROOT_PATH.'/header.php';
			echo "<br /><br /><center><table style='align:center; border: 1px solid gray; width:50%; background:#F0F0F0'; ><tr><td align='center'><br />"._MD_WIWI_PAGENOTFOUND_MSG."<br /><br /></td></tr></table><br /><br /><input type='button' value="._CANCEL." onclick='history.back();'></center>";
			include_once XOOPS_ROOT_PATH.'/footer.php';
			break;
		}
		/*
		 * privileges ok -> proceed.
		 */
		$xoopsOption['template_main'] = 'wiwimod_edit.html';
		include_once XOOPS_ROOT_PATH.'/header.php';
		
		if ($op == 'preview') {
			/*
			 * Note : content came through "post" >> Strip eventual slashes (depending on the magic_quotes_gpc() value)
			 */
			$pageObj->title = $myts->stripSlashesGPC($pageObj->title);
			$pageObj->body = $myts->stripSlashesGPC($pageObj->body);

			$xoopsTpl->assign('wiwimod', array(
				'keyword' => $pageObj->keyword, 
				'title' => $pageObj->title, 
				'body' => $pageObj->render()));
		}
		
		/*
		 * Build form
		 */
		$form = new XoopsThemeForm(_MD_WIWI_EDIT_TXT.': '.$page, 'wiwimodform', 'index.php');
		$btn_tray = new XoopsFormElementTray('', ' ');
	
		$form->addElement(new XoopsFormHidden('op', 'insert'));
		$form->addElement(new XoopsFormHidden('page', $myts->htmlSpecialChars($pageObj->keyword)));
		$form->addElement(new XoopsFormHidden('pageid', $pageObj->pageid));
		$form->addElement(new XoopsFormHidden('id', $pageObj->id));
		$form->addElement(new XoopsFormHidden('uid', ($xoopsUser)?$xoopsUser->getVar('uid'):0));
		$form->addElement(new XoopsFormHidden('lastmodified', $pageObj->lastmodified));

		$form->addElement(new XoopsFormText(_MD_WIWI_TITLE_FLD, 'title', 80, 250, $myts->htmlSpecialChars($pageObj->title)));

		$edArr = Array();
		foreach (getAvailableEditors() as $ed) {
			$edArr[] = array('value' => $ed[1], 'text' => $ed[0], 'options' => $ed[2]);
		}
		$xoopsTpl->assign('editorsArr',$edArr);
		$editor = isset($_POST['editor']) ? $_POST['editor'] : $xoopsModuleConfig['Editor'] ;
		$editOptions = isset($_POST['editoptions']) ? $_POST['editoptions'] : "" ;
		$form->addElement(new XoopsFormHidden('editor', $editor));
		$form->addElement(new XoopsFormHidden('editoptions', $editOptions));
		
		switch ($editor) {
			default:
			case 0 : // standard xoops
				$t_area = new XoopsFormDhtmlTextArea(_MD_WIWI_BODY_FLD, 'body', $pageObj->body, '30', '70');

				break;
			case 1 : // XoopsEditor
				include_once (XOOPS_ROOT_PATH.'/class/xoopseditor/xoopseditor.php');
				$editorhandler = new XoopsEditorHandler();
				$editor_name = ($editOptions != '') ? $editOptions : $xoopsModuleConfig['XoopsEditor'];

				$options['caption'] = _MD_WIWI_BODY_FLD;
				$options['name'] ='body';
				$options['value'] = $pageObj->body;
				$options['rows'] = 25;
				$options['cols'] = 60;
				$options['width'] = '100%';
				$options['height'] = '400px';
				$t_area = & $editorhandler->get($editor_name, $options, 'textarea');
				if($t_area){
					$editorhandler->setConfig(
						$t_area,
						array(
							'filepath' => XOOPS_UPLOAD_PATH.'/'.$xoopsModule->getVar('dirname'),
							'upload' => true,
							'extensions' => array('txt', 'jpg', 'zip')
						));
				}
				break;

			case 2 : // Spaw class
				include XOOPS_ROOT_PATH.'/class/spaw/formspaw.php';
				$t_area = new XoopsFormSpaw(_MD_WIWI_BODY_FLD, 'body', $pageObj->body, '100%', '400px');
				break;
			case 3 : // HTMLArea class
				include XOOPS_ROOT_PATH.'/class/htmlarea/formhtmlarea.php';
				$t_area = new XoopsFormHtmlarea(_MD_WIWI_BODY_FLD, 'body', $pageObj->body, '100%', '400px');
				break;
			case 4 : // Koivi
				include XOOPS_ROOT_PATH . '/class/wysiwyg/formwysiwygtextarea.php';
				$t_area  = new XoopsFormWysiwygTextArea( _MD_WIWI_BODY_FLD, 'body', $pageObj->body , '100%', '400px','');
				break;
			case 5 : // FCK class
				include XOOPS_ROOT_PATH.'/class/fckeditor/formfckeditor.php';
				$t_area = new XoopsFormFckeditor(_MD_WIWI_BODY_FLD, 'body', $pageObj->body, '100%', '400px');
				break;
		}
		$form->addElement($t_area);

		$form->addElement(new XoopsFormText(_MD_WIWI_PARENT_FLD, 'parent', 15, 100, $myts->htmlSpecialChars($pageObj->parent))); 

		if ($pageObj->canAdministrate()) {
			$prflst = $pageObj->profile->getAdminProfiles($xoopsUser);
			$prfsel = new XoopsFormSelect(_MD_WIWI_PROFILE_FLD, 'prid',$pageObj->profile->prid);
			$prfsel->addOptionArray($prflst);
			$form->addElement($prfsel);
		} else {
			$form->addElement(new XoopsFormLabel(_MD_WIWI_PROFILE_FLD,$pageObj->profile->name));
			$form->addElement(new XoopsFormHidden('prid', $pageObj->profile->prid));
		}
		
		$form->addElement(new XoopsFormText(_MD_WIWI_VISIBLE_FLD, 'visible', 3, 3, $pageObj->visible));
		$form->addElement( new XoopsFormText(_MD_WIWI_CONTEXTBLOCK_FLD,'contextBlock',15,100,$myts->htmlSpecialChars($pageObj->contextBlock)));
		/* Tag module support (Gizmhail) */
		if(isTagModuleActivated())
		{
			include_once XOOPS_ROOT_PATH.'/modules/tag/include/formtag.php';
			$form->addElement(new XoopsFormTag('item_tag', 60, 255, $value=($pageObj->pageid == 0)?$pageObj->keyword: $pageObj->pageid, $catid = 0));
		}
		/* Tag module support end*/

		$preview_btn = new XoopsFormButton('', 'preview', _PREVIEW, 'button');
        $preview_btn->setExtra("onclick='document.forms.wiwimodform.op.value=\"preview\"; document.forms.wiwimodform.submit.click();'");
        $btn_tray->addElement($preview_btn);

		$btn_tray->addElement(new XoopsFormButton('', 'submit', _MD_WIWI_SUBMITREVISION_BTN, 'submit'));

		if ($pageObj->id > 0) {
			$quietsave_btn = new XoopsFormButton('', 'quietsave', _MD_WIWI_QUIETSAVE_BTN, 'button');
			$quietsave_btn->setExtra("onclick='document.forms.wiwimodform.op.value=\"quietsave\"; document.forms.wiwimodform.submit.click();'");
			$btn_tray->addElement($quietsave_btn);
		}

		$cancel_btn = new XoopsFormButton('', 'cancel', _CANCEL, 'button');
		$cancel_btn->setExtra(($op == 'edit')?"onclick='history.back();'":"onclick='document.location.href=\"index.php".(($pageObj->id != 0)?"?page=".$pageObj->keyword : "")."\"'");
		$btn_tray->addElement($cancel_btn);
		$form->addElement($btn_tray);
		$form->assign($xoopsTpl);
		break;

	case 'history' :
	case 'diff' :
		/*
		 *  show page history
		 */
		$xoopsOption['template_main'] = 'wiwimod_history.html';
		include_once XOOPS_ROOT_PATH.'/header.php';

		$pageObj = new wiwiRevision($page, (isset($id) ? $id : 0));
		if ($op == 'history') {
			$xoopsTpl->assign('wiwimod', array(
				'keyword' => $pageObj->keyword, 
				'encodedurl' => $pageObj->encode($pageObj->keyword),
				'revid' => $pageObj->id,
				'title' => $pageObj->title, 
				'body' => $pageObj->render(), 
				));
		} else {
			$pageObj->diff($bodyDiff, $titleDiff);
			$xoopsTpl->assign('wiwimod', array(
				'keyword' => $pageObj->keyword, 
				'encodedurl' => $pageObj->encode($pageObj->keyword),
				'revid' => $pageObj->id,
				'title' => $titleDiff, 
				'body' => $bodyDiff
				));
		}

		$hist = $pageObj->history();
		foreach ($hist as $key=>$value) {
			$hist[$key]['username'] = getUserName($hist[$key]['u_id']);
			$hist[$key]['keyword'] = wiwiRevision::encode($hist[$key]['keyword']);
		}

		$xoopsTpl->assign('hist', $hist);
		$xoopsTpl->assign('allowRestore', $pageObj->canAdministrate());
		break;

	case 'restore' :
		//
		// Creates a new revision whom content is copied from the selected one, but with other data (parent, privileges etc..) untouched.
		//
		$restoredRevision = new wiwiRevision("",$id);
		$pageObj->title = addslashes($restoredRevision->title);
		$pageObj->body = addslashes($restoredRevision->body);
		$pageObj->contextBlock = $restoredRevision->contextBlock;
		$success = $pageObj->add();
		redirect_header('index.php?page='.$pageObj->keyword.'&amp;op=history', 2, ($success)?_MD_WIWI_DBUPDATED_MSG:_MD_WIWI_ERRORINSERT_MSG);
		break;

	default:
		//
		//  show page content (after privileges check)
		//
		$xoopsOption['template_main'] = 'wiwimod_view.html';
		include_once XOOPS_ROOT_PATH.'/header.php';
		
		if ($pageObj->canRead()) {
		    $pagecontent = $pageObj->render();
		} else {
		    $pagecontent = "<center><table style='align:center; border: 3px solid red; width:50%; background:#F0F0F0'; ><tr><td align='center'>"._MD_WIWI_NOREADACCESS_MSG."</td></tr></table></center><br /><br />";
		}

		//
		// Handle pagebreaks
		//
		$cpages = explode ("[pagebreak]", $pagecontent);
		if (isset($_GET['startpage'])) $startpage = (int) $_GET['startpage'] ; else $startpage = 0;
		if (count($cpages) > 0) {
			include_once XOOPS_ROOT_PATH . '/class/pagenav.php'; 
			$pagenav = new XoopsPageNav(count($cpages), 1, $startpage, 'startpage', 'page='.$pageObj->keyword); 
			$xoopsTpl->assign('nav' , array(
				'startpage' => $startpage,
				'html' => $pagenav->RenderNav()
				));
			$pagecontent = $cpages[$startpage];
		}

		/* Tag module support (Gizmhail) */
		if(isTagModuleActivated())
		{
			$xoopsTpl->assign('isTagModuleActivated', array('activated'=>'true'));
			include_once XOOPS_ROOT_PATH.'/modules/tag/include/tagbar.php';
			$itemid = $pageObj->pageid;
			$xoopsTpl->assign('tagbar', tagBar($itemid, $catid = 0));
		}	
		/* Tag module support end*/

		$xoopsTpl->assign('wiwimod', array(
			'keyword' => $pageObj->keyword, 
			'encodedurl' => $pageObj->encode($pageObj->keyword),
			'title' => $pageObj->title, 
			'body' => $pagecontent, 
			'lastmodified' => formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING), 
			'author' => getUserName($pageObj->u_id), 
			'mayEdit' => $pageObj->canWrite(), 
			'showComments' => $pageObj->canViewComments() && ($xoopsModuleConfig['com_rule'] != 0),
			'showHistory' => $pageObj->canViewHistory(),
			'allowPDF' => $xoopsModuleConfig['allowPDF']
			));

		$xoopsTpl->assign('parentlist',$pageObj->parentList());

		$edArr = Array();
		foreach (getAvailableEditors() as $ed) {
			$edArr[] = array('value' => $ed[1], 'text' => $ed[0], 'options' => $ed[2]);
		}
		$xoopsTpl->assign('editorsArr',$edArr);

		$pageid = $pageObj->pageid;
		if ($pageObj->canViewComments()) {
			//
			// patch to deal with a bug in the standard Xoops 2.05 comment_view file,
			// (generated a disgraceful "undefined index notice" in debug mode ;-)
			//
			if (!isset($_GET['com_order'])) {
				$_GET['com_order'] = (is_object($xoopsUser) ? $xoopsUser->getVar('uorder') : $xoopsConfig['com_order']) ;
				}
			include XOOPS_ROOT_PATH.'/include/comment_view.php';
		}
		break;

}

$xoopsTpl->assign('xoops_pagetitle',$myts->htmlSpecialChars($xoopsModule->name()) . ' - ' .$myts->htmlSpecialChars($pageObj->title));
include XOOPS_ROOT_PATH.'/footer.php';
?>