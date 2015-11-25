<?php
/**
 * Main index page of SimplyWiki - displays all pages on the user side
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 * @author Wiwimod: Gizmhail
 *
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
$id = $pageid = $visible = $editor = $allowComments = $uid = 0;
$contextBlock = $parent = $op = $summary = $item_tag = $page = '';
$allowed_getvars = array(
	'op'=>'plaintext',
	'back'=>'string',
	'pageid'=>'int',
	'startpage'=>'int',
	'com_order'=>'plaintext',
	'page'=>'string',
	'id'=>'int',
);
$allowed_postvars = array(
	'op'=>'plaintext',
	'page'=>'string',
	'pageid'=>'int',
	'id'=>'int',
	'uid'=>'int',
	'lastmodified'=>'plaintext',
	'title'=>'plaintext',
	'editor'=>'int',
	'editoptions'=>'plaintext',
	'body'=>'string',
	'parent'=>'plaintext',
	'prid'=>'int',
	'visible'=>'int',
	'contextBlock'=>'plaintext',
	'item_tag'=>'plaintext',
	'summary' => 'plaintext',
	'allowComments' => 'plaintext',
);
$clean_GET = swiki_cleanVars($_GET, $allowed_getvars);
extract($clean_GET);

// valid values for op: preview, insert, quietsave, edit, history, diff, restore
$valid_ops = array('preview', 'insert', 'quietsave', 'edit', 'history', 'diff', 'restore', NULL);
$op = (in_array($op, $valid_ops, true)) ? $op : '';

if (!empty($_POST)) {
	$clean_POST = swiki_cleanVars($_POST, $allowed_postvars);
	extract($clean_POST);
}

$page = stripslashes($page);  // if page name comes in url, decode it.

/* Read data from database */

if (in_array($op, array('preview','insert', 'quietsave')) && isset($id)) {
	/* Data coming from post variables  (and possibly the database) */
	$pageObj = new wiwiRevision();
	$pageObj->keyword = $page;
	$pageObj->title = $title;
	$pageObj->body = $body;
	//$pageObj->lastmodified = $lastmodified;
	$pageObj->u_id = (int) $uid;
	$pageObj->parent = $pageObj->normalize($parent);
	$pageObj->visible = (int) $visible;
	$pageObj->contextBlock = $pageObj->normalize($contextBlock);
	$pageObj->pageid = (int) $pageid;
	$pageObj->profile = new wiwiProfile((int) $prid);
	$pageObj->id = (int) $id;
	$pageObj->summary = $summary;
	$pageObj->allowComments = $allowComments;

} else {

	if (($page == '') && ($id == 0) && ($pageid == 0)) {
		$modhandler =& xoops_gethandler('module');
		$config_handler =& xoops_gethandler('config');
		$SimplyWiki = $modhandler->getByDirname(basename(dirname(__FILE__)));
		$swikiConfig =& $config_handler->getConfigsByCat(0, $SimplyWiki->getVar('mid'));
		$page = $swikiConfig['TopPage'] == NULL ? _MI_SWIKI_HOME : $swikiConfig['TopPage'];
	}

	$pageObj = new wiwiRevision($page, 0, $pageid);
	if ($pageObj->id == 0) {
		/* page doesn't exist >> edit new one, with default values for title and profile */
		$op = 'edit';
		$pageObj->title = $pageObj->keyword;
		if (isset($clean_GET['back'])) {
			$pageObj->parent = stripslashes($clean_GET['back']);	// default value for parent field = initial caller.
			$parentObj = new wiwiRevision($pageObj->parent);
			$pageObj->profile =& $parentObj->profile;   // is reference assignment a good idea ?
		} else {
			$pageObj->profile = new WiwiProfile(WiwiProfile::getDefaultProfileId());
		}
	}
}
if (!isset($_GET['pageid'])) {$_GET['pageid'] = (int) $pageObj->pageid;} // this will help with notifications!
// process required action
switch ($op) {

	case 'insert' :
	case 'quietsave' :
		/* save page modifications and redirect	 */
		if ($pageObj->concurrentlySaved()) {
			redirect_header('index.php?page=' . urlencode($pageObj->keyword), 2, _MD_SWIKI_EDITCONFLICT_MSG);
		} elseif (!$pageObj->canWrite()) {
			redirect_header('index.php?page=' . urlencode($pageObj->keyword), 2, _MD_SWIKI_NOWRITEACCESS_MSG);
		} else {

			if ($xoopsModuleConfig['Captcha']) {
				// Captcha Hack
				// Verify entered code
				if (class_exists('XoopsFormCaptcha')) {
					if (@include_once ICMS_ROOT_PATH . '/class/captcha/captcha.php') {
						$xoopsCaptcha = XoopsCaptcha::instance();
						if (! $xoopsCaptcha -> verify(true)) {
							redirect_header('index.php', 2, $xoopsCaptcha->getMessage());
						}
					}
				} elseif (class_exists('IcmsFormCaptcha')) {
					if (@include_once ICMS_ROOT_PATH . '/class/captcha/captcha.php') {
						$icmsCaptcha = IcmsCaptcha::instance();
						if (! $icmsCaptcha->verify(true)) {
							redirect_header('index.php', 2, $icmsCaptcha->getMessage());
						}
					}
				}
				// Captcha Hack
			}
			$success = ($op == 'insert') ? $pageObj->add() : $pageObj->save();

			if ($success) {
				/* @todo	remove cached versions, if any */

				/* Tag module support (Gizmhail) */
				if(isTagModuleActivated()) {
					$tag_handler = xoops_getmodulehandler('tag', 'tag');
					$tag_handler->updateByItem($item_tag, $pageObj->pageid, $xoopsModule->getVar('dirname'), $catid =0);
				}
				/* Tag module support end */
				// Define tags for notification message
				$tags = array();
				$tags['PAGE_NAME'] = $pageObj->title;
				$tags['PAGE_URL'] = ICMS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php?page=' . $pageObj->keyword;
				$notification_handler =& xoops_gethandler('notification');
				$notification_handler->triggerEvent('page', $pageObj->pageid, 'page_modified', $tags);
				$notification_handler->triggerEvent('global', 0, 'page_modified', $tags);
			}
			redirect_header('index.php?page=' . urlencode($pageObj->keyword), 2, ($success)?_MD_SWIKI_DBUPDATED_MSG:_MD_SWIKI_ERRORINSERT_MSG);
			echo 'index.php?page=' . $pageObj->keyword;
		}
		exit();

	case 'edit':
	case 'preview':
		//  show page in editor (after privileges check)
		if (!$pageObj->canWrite()) {
			include_once ICMS_ROOT_PATH . '/header.php';
			xoops_error(_MD_SWIKI_PAGENOTFOUND_MSG);
			include_once ICMS_ROOT_PATH . '/footer.php';
			break;
		}
		/* privileges ok -> proceed. */
		$xoopsOption['template_main'] = 'wiwimod_edit.html';
		include_once ICMS_ROOT_PATH . '/header.php';
		/* @todo	turn off page caching for previewing and editing */
		if ($op == 'preview') {
			/* Note : content came through "post" >> Strip eventual slashes (depending on the magic_quotes_gpc() value)	 */
			$pageObj->title = $myts->stripSlashesGPC($pageObj->title);
			$pageObj->body = $myts->stripSlashesGPC($pageObj->body);

			$xoopsTpl->assign('swiki', array(
				'keyword' => $pageObj->keyword,
				'title' => $pageObj->title,
				'body' => $pageObj->render()));
		}

		/* Build form */
		$form = new XoopsThemeForm(_MD_SWIKI_EDIT_TXT . ': ' . $page, 'swikiform', 'index.php');
		$btn_tray = new XoopsFormElementTray('', ' ');

		$form->addElement(new XoopsFormHidden('op', 'insert'));
		$form->addElement(new XoopsFormHidden('page', $myts->htmlSpecialChars($pageObj->keyword)));
		$form->addElement(new XoopsFormHidden('pageid', $pageObj->pageid));
		$form->addElement(new XoopsFormHidden('id', $pageObj->id));
		$form->addElement(new XoopsFormHidden('uid', ($xoopsUser) ? $xoopsUser->getVar('uid') : 0));
		$form->addElement(new XoopsFormHidden('lastmodified', $pageObj->lastmodified));

		$form->addElement(new XoopsFormText(_MD_SWIKI_TITLE_FLD, 'title', 50, 250, $myts->htmlSpecialChars($pageObj->title)));

		$edArr = array();
		foreach (getAvailableEditors() as $ed) {
			$edArr[] = array('value' => $ed[1], 'text' => $ed[0], 'options' => $ed[2]);
		}
		$xoopsTpl->assign('editorsArr', $edArr);
		$editor = isset($clean_POST['editor']) ? $clean_POST['editor'] : $xoopsModuleConfig['Editor'] ;
		$editOptions = isset($clean_POST['editoptions']) ? $clean_POST['editoptions'] : "" ;
		$form->addElement(new XoopsFormHidden('editor', $editor));
		$form->addElement(new XoopsFormHidden('editoptions', $editOptions));

		switch ($editor) {
			default:
			case 0 : // standard xoops
				$t_area = new XoopsFormDhtmlTextArea(_MD_SWIKI_BODY_FLD, 'body', htmlspecialchars($pageObj->body, ENT_QUOTES, _CHARSET, FALSE), '30', '70');
				break;

			case 1 : // XoopsEditor
				include_once (ICMS_ROOT_PATH . '/class/xoopseditor/xoopseditor.php');
				$editorhandler = new XoopsEditorHandler();
				$editor_name = ($editOptions != '') ? $editOptions : $xoopsModuleConfig['XoopsEditor'];

				$options['caption'] = _MD_SWIKI_BODY_FLD;
				$options['name'] ='body';
				$options['value'] = htmlspecialchars($pageObj->body, ENT_QUOTES, _CHARSET, FALSE);
				$options['rows'] = 25;
				$options['cols'] = 60;
				$options['width'] = '100%';
				$options['height'] = '400px';
				$t_area = & $editorhandler->get($editor_name, $options, FALSE, 'textarea');
				if ($t_area){
					$editorhandler->setConfig(
					$t_area,
					array(
							'filepath' => ICMS_UPLOAD_PATH . '/' . $xoopsModule->getVar('dirname'),
							'upload' => true,
							'extensions' => array('txt', 'jpg', 'zip')
					));
				}
				break;

			case 2 : // Spaw class
				include ICMS_ROOT_PATH . '/class/spaw/formspaw.php';
				$t_area = new XoopsFormSpaw(_MD_SWIKI_BODY_FLD, 'body', htmlspecialchars($pageObj->body, ENT_QUOTES, _CHARSET, FALSE), '100%', '400px');
				break;

			case 3 : // HTMLArea class
				include ICMS_ROOT_PATH . '/class/htmlarea/formhtmlarea.php';
				$t_area = new XoopsFormHtmlarea(_MD_SWIKI_BODY_FLD, 'body', htmlspecialchars($pageObj->body, ENT_QUOTES, _CHARSET, FALSE), '100%', '400px');
				break;

			case 4 : // Koivi
				include ICMS_ROOT_PATH . '/class/wysiwyg/formwysiwygtextarea.php';
				$t_area  = new XoopsFormWysiwygTextArea(_MD_SWIKI_BODY_FLD, 'body', htmlspecialchars($pageObj->body, ENT_QUOTES, _CHARSET, FALSE), '100%', '400px', '');
				break;

			case 5 : // FCK class
				include ICMS_ROOT_PATH . '/class/fckeditor/formfckeditor.php';
				$t_area = new XoopsFormFckeditor(_MD_SWIKI_BODY_FLD, 'body', htmlspecialchars($pageObj->body, ENT_QUOTES, _CHARSET, FALSE), '100%', '400px');
				break;
		}
		$form->addElement($t_area);

		$form->addElement(new XoopsFormText(_MD_SWIKI_PARENT_FLD, 'parent', 15, 100, $myts->htmlSpecialChars($pageObj->parent)));

		if ($pageObj->canAdministrate()) {
			$prflst = $pageObj->profile->getAdminProfiles($xoopsUser);
			$prfsel = new XoopsFormSelect(_MD_SWIKI_PROFILE_FLD, 'prid', $pageObj->profile->prid);
			$prfsel->addOptionArray($prflst);
			$form->addElement($prfsel);
		} else {
			$form->addElement(new XoopsFormLabel(_MD_SWIKI_PROFILE_FLD, $pageObj->profile->name));
			$form->addElement(new XoopsFormHidden('prid', $pageObj->profile->prid));
		}

		$form->addElement(new XoopsFormText(_MD_SWIKI_VISIBLE_FLD, 'visible', 3, 3, $pageObj->visible));
		$form->addElement(new XoopsFormText(_MD_SWIKI_CONTEXTBLOCK_FLD, 'contextBlock', 15, 100, $myts->htmlSpecialChars($pageObj->contextBlock)));
		/* Tag module support (Gizmhail) */
		if (isTagModuleActivated()) {
			include_once ICMS_ROOT_PATH . '/modules/tag/include/formtag.php';
			if (!$item_tag) {
				$value = ($pageObj->pageid == 0) ? $pageObj->keyword : $pageObj->pageid;
			} else {
				$value = $item_tag;
			}
			$form->addElement(new XoopsFormTag('item_tag', 60, 255, $value, $catid = 0));
		}
		/* Tag module support end*/
		$rev_summary = $summary ? $summary : '';
		$form->addElement(new XoopsFormText(_MI_SWIKI_REVISION_SUMMARY, 'summary', 50, 255, $rev_summary));
		/*		$allowComments_checkbox =	 new XoopsFormCheckBox(_MI_SWIKI_ALLOW_COMMENTS, 'allowComments',);
		 $allowComments_checkbox->addOption ($allowComments, $pageObj->allowComments);
		 $option_tray = new XoopsFormElementTray('Options','<br />');
		 $option_tray->addElement($allowComments_checkbox);
		 $form->addElement($allowComments_checkbox);*/

		$preview_btn = new XoopsFormButton('', 'preview', _PREVIEW, 'button');
		$preview_btn->setExtra("onclick='document.forms.swikiform.op.value=\"preview\"; document.forms.swikiform.submit.click();'");
		$btn_tray->addElement($preview_btn);

		$btn_tray->addElement(new XoopsFormButton('', 'submit', _MD_SWIKI_SUBMITREVISION_BTN, 'submit'));

		/* only show the Save button if the user is an administrator for the page.
		 * Otherwise, they can only let them create a new revision
		 */
		if ($pageObj->id > 0 && $pageObj->canAdministrate() === TRUE) {
			$quietsave_btn = new XoopsFormButton('', 'quietsave', _MD_SWIKI_QUIETSAVE_BTN, 'button');
			$quietsave_btn->setExtra("onclick='document.forms.swikiform.op.value=\"quietsave\"; document.forms.swikiform.submit.click();'");
			$btn_tray->addElement($quietsave_btn);
		}

		if ($xoopsModuleConfig['Captcha']) {
			// Captcha Hack
			if (class_exists('XoopsFormCaptcha')) {
				$form -> addElement(new XoopsFormCaptcha());
			} elseif (class_exists('IcmsFormCaptcha')) {
				$form -> addElement(new IcmsFormCaptcha());
			}
			// Captcha Hack
		}

		$cancel_btn = new XoopsFormButton('', 'cancel', _CANCEL, 'button');
		$cancel_btn->setExtra(($op == 'edit') ? "onclick='history.back();'" : "onclick='document.location.href=\"index.php" . (($pageObj->id != 0) ? "?page=" . $pageObj->keyword : "") . "\"'");
		$btn_tray->addElement($cancel_btn);
		$form->addElement($btn_tray);
		$form->assign($xoopsTpl);
		break;

	case 'history' :
	case 'diff' :
		$xoopsOption['template_main'] = 'wiwimod_history.html';
		include_once ICMS_ROOT_PATH . '/header.php';

		$pageObj = new wiwiRevision($page, (isset($id) ? $id : 0));
		if ($op == 'history') {
			$xoopsTpl->assign('swiki', array(
				'keyword' => $pageObj->keyword,
				'encodedurl' => $pageObj->encode($pageObj->keyword),
				'revid' => $pageObj->id,
				'title' => $pageObj->title,
				'body' => $pageObj->render(),
			));
		} else {
			$pageObj->diff($bodyDiff, $titleDiff);
			$xoopsTpl->assign('swiki', array(
				'keyword' => $pageObj->keyword,
				'encodedurl' => $pageObj->encode($pageObj->keyword),
				'revid' => $pageObj->id,
				'title' => $titleDiff,
				'body' => $bodyDiff,
			));
		}

		$hist = $pageObj->history();
		foreach ($hist as $key=>$value) {
			$hist[$key]['username'] = xoops_getLinkedUnameFromId($hist[$key]['u_id']);
			$hist[$key]['keyword'] = $pageObj->encode($hist[$key]['keyword']);
		}

		$xoopsTpl->assign('hist', $hist);
		$xoopsTpl->assign('allowRestore', $pageObj->canAdministrate());
		break;

	case 'restore' :
		// Creates a new revision whom content is copied from the selected one, but with other data (parent, privileges etc..) untouched.
		$restoredRevision = new wiwiRevision("", $id);
		$pageObj->title = $myts->stripSlashesGPC($restoredRevision->title);
		$pageObj->body = $myts->stripSlashesGPC($restoredRevision->body);
		$pageObj->contextBlock = $restoredRevision->contextBlock;
		$success = $pageObj->add();
		if ($success){
			$tags = array();
			$tags['PAGE_NAME'] = $pageObj->title;
			$tags['PAGE_URL'] = ICMS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php?page=' . $pageObj->keyword;
			$notification_handler =& xoops_gethandler('notification');
			$notification_handler->triggerEvent('page', $pageObj->pageid, 'page_restored', $tags);
			$notification_handler->triggerEvent('global', 0, 'page_restored', $tags);
		}
		redirect_header('index.php?page=' . $pageObj->keyword . '&amp;op=history', 2, ($success)?_MD_SWIKI_DBUPDATED_MSG:_MD_SWIKI_ERRORINSERT_MSG);
		break;

	default:
		//  show page content (after privileges check)
		$xoopsOption['template_main'] = 'wiwimod_view.html';
		include_once ICMS_ROOT_PATH . '/header.php';
		if (!$pageObj->canRead()) {
			$pagecontent = xoops_warning(_MD_SWIKI_NOREADACCESS_MSG);
		} else {
			// Handle pagebreaks
			$pagecontent = $pageObj->body;
			$cpages = explode ("[pagebreak]", $pagecontent);
			if (isset($clean_GET['startpage'])) $startpage = (int) $clean_GET['startpage'] ; else $startpage = 0;
			if (count($cpages) > 0) {
				include_once ICMS_ROOT_PATH . '/class/pagenav.php';
				$pagenav = new XoopsPageNav(count($cpages), 1, $startpage, 'startpage', 'page=' . $pageObj->keyword);
				$xoopsTpl->assign('nav' , array(
					'startpage' => $startpage,
					'html' => $pagenav->RenderNav(),
				));
				$pagecontent = $cpages[$startpage];
			}
			$pagecontent = $pageObj->render($pagecontent);
			/*
			 * Start count visit - GibaPhp
			 * No count visit for some user last modified
			 * In future, count for relevant ip, cookies and more.
			 * if logout or no, verify it.
			 */
			if (($xoopsUser) ? $xoopsUser->getVar('uid') : 0) {
				if (($xoopsUser->getVar("uid")) == ($pageObj->u_id)) {
					//-- author is equal the current user not count visit
				} else {
					$pageObj->visited(); // no is user last modified
				}
			} else {
				$pageObj->visited(); // no user registered - count visit
			}
			/* End modification to count visits */
		}

		/* Tag module support (Gizmhail) */
		if (isTagModuleActivated()) {
			$xoopsTpl->assign('isTagModuleActivated', array('activated'=>'true'));
			include_once ICMS_ROOT_PATH . '/modules/tag/include/tagbar.php';
			$itemid = $pageObj->pageid;
			$xoopsTpl->assign('tagbar', tagBar($itemid, $catid = 0));
		}
		/* Tag module support end*/
		$user = $xoopsUser ? $xoopsUser : NULL;
		$writeProfiles = new WiwiProfile();
		$WritePrivileges = count($writeProfiles->getWriteProfiles($user));

		$xoopsTpl->assign('swiki', array(
			'keyword' => $pageObj->keyword,
			'encodedurl' => $pageObj->encode($pageObj->keyword),
			'title' => $pageObj->title,
			'body' => $pagecontent,
			'lastmodified' => formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING),
			'author' => xoops_getLinkedUnameFromId($pageObj->u_id),
			'mayEdit' => $pageObj->canWrite(),
			'showComments' => $pageObj->canViewComments() && ($xoopsModuleConfig['com_rule'] != 0),
			'showHistory' => $pageObj->canViewHistory(),
			'allowPDF' => $xoopsModuleConfig['allowPDF'],
			'created' => sprintf(_MD_SWIKI_CREATED, xoops_getLinkedUnameFromId($pageObj->creator), formatTimestamp(strtotime($pageObj->created), _SHORTDATESTRING)),
			'views' => sprintf(_MD_SWIKI_VIEWED, $pageObj->views),
			'lastviewed' => sprintf(_MD_SWIKI_LASTVIEWED, formatTimestamp(strtotime($pageObj->lastviewed), _SHORTDATESTRING)),
			'revisions' => sprintf(_MD_SWIKI_REVISIONS, $pageObj->revisions),
			'ShowPageInfo' => array_flip($xoopsModuleConfig['ShowPageInfo']),
			'ShowQuickAdd' => $xoopsModuleConfig['ShowQuickAdd'],
			'WritePrivileges' => $WritePrivileges,
		));

		$xoopsTpl->assign('parentlist', $pageObj->parentList());

		$edArr = array();
		foreach (getAvailableEditors() as $ed) {
			$edArr[] = array('value' => $ed[1], 'text' => $ed[0], 'options' => $ed[2]);
		}
		$xoopsTpl->assign('editorsArr', $edArr);

		$pageid = $pageObj->pageid;
		if ($pageObj->canViewComments()) {
			// patch to deal with a bug in the standard Xoops 2.05 comment_view file,
			// (generated a disgraceful "undefined index notice" in debug mode ;-)
			if (!isset($clean_GET['com_order'])) {
				$_GET['com_order'] = (is_object($xoopsUser) ? $xoopsUser->getVar('uorder') : $xoopsConfig['com_order']) ;
			}
			include ICMS_ROOT_PATH . '/include/comment_view.php';
		}
		break;

}

$xoopsTpl->assign('icms_pagetitle', $myts->htmlSpecialChars($myts->htmlSpecialChars($pageObj->title) . ' - ' .$xoopsModule->name()));
// @todo	remove after version 1.2
$xoopsTpl->assign('xoops_pagetitle', $myts->htmlSpecialChars($myts->htmlSpecialChars($pageObj->title) . ' - ' .$xoopsModule->name()));
include ICMS_ROOT_PATH . '/footer.php';
