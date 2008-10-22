<?php
/*
 * Module and admin language definition
 * 
 *	_BTN	: text within buttons or action links
 *  _COL	: column headers
 *  _TXT	: "verbose" text (probably within content)
 *  _FLD	: title of form elements
 *  _DESC	: description under the title for form elements
 *  _MSG	: messages, alerts ...
 * @package Wiwimod 
 * @version $Id$ 
 */

define('_MD_WIWI_MODIFIED_TXT', 'Last modified:');		
define('_MD_WIWI_BY','by');								
define('_MD_WIWI_HISTORY_TXT','History of page');		
define('_MD_WIWI_EDIT_TXT','Edit Wiwi Page');
define('_MD_WIWI_BODY_TXT','Page content');
define('_MD_WIWI_DIFF_TXT','Differences between current and latest revisions');
define('_MD_WIWI_THISPAGE','This page');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_WIWI_SUBMITREVISION_BTN','New revision');
define('_MD_WIWI_QUIETSAVE_BTN','Save');
define('_MD_WIWI_HISTORY_BTN','History');				
define('_MD_WIWI_PAGEVIEW_BTN','Back to page view');	
define('_MD_WIWI_VIEW_BTN','View');
define('_MD_WIWI_RESTORE_BTN','Restore');
define('_MD_WIWI_FIX_BTN','Fix');
define('_MD_WIWI_COMPARE_BTN','Compare');
define('_MD_WIWI_SELEDITOR_BTN','(right-click to select another editor)');

define('_MD_WIWI_TITLE_FLD','Title');					
define('_MD_WIWI_BODY_FLD','Content');
define('_MD_WIWI_VISIBLE_FLD','Visible');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Side content');
define('_MD_WIWI_PARENT_FLD','Parent page');
define('_MD_WIWI_PROFILE_FLD','Privileges profile');

define('_MD_WIWI_TITLE_COL','Title');					
define('_MD_WIWI_MODIFIED_COL','Modified');				
define('_MD_WIWI_AUTHOR_COL','Author');
define('_MD_WIWI_ACTION_COL','Action');
define('_MD_WIWI_KEYWORD_COL','Page ID');


define('_MD_WIWI_PAGENOTFOUND_MSG',"This page doesn't exist yet.");
define('_MD_WIWI_DBUPDATED_MSG','Database successfully updated!');
define('_MD_WIWI_ERRORINSERT_MSG','Error while updating database!');
define('_MD_WIWI_EDITCONFLICT_MSG','Conflicting modifications! - All changes have been rejected!');
define('_MD_WIWI_NOREADACCESS_MSG','<br /><h4>Sorry, restricted access page.</h4><br />');
define('_MD_WIWI_NOWRITEACCESS_MSG','<br /><h4>Sorry, you don\'t have write access on this page.</h4><br />');

// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_WIWIMOD_WIWIHOME')){define('_MI_WIWIMOD_WIWIHOME','WiwiHome');}// Also need in modinfo.php
define('_MI_WIWIMOD_WIWI404','IllegalName');

?>