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
 * @package SimplyWiki 
 * @version $Id$ 
 */

define('_MD_SWIKI_MODIFIED_TXT', 'Last modified:');		
define('_MD_SWIKI_BY','by');								
define('_MD_SWIKI_HISTORY_TXT','History of page');		
define('_MD_SWIKI_EDIT_TXT','Edit Wiwi Page');
define('_MD_SWIKI_BODY_TXT','Page content');
define('_MD_SWIKI_DIFF_TXT','Differences between current and latest revisions');
define('_MD_SWIKI_THISPAGE','This page');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_SWIKI_SUBMITREVISION_BTN','New revision');
define('_MD_SWIKI_QUIETSAVE_BTN','Save');
define('_MD_SWIKI_HISTORY_BTN','History');				
define('_MD_SWIKI_PAGEVIEW_BTN','Back to page view');	
define('_MD_SWIKI_VIEW_BTN','View');
define('_MD_SWIKI_RESTORE_BTN','Restore');
define('_MD_SWIKI_FIX_BTN','Fix');
define('_MD_SWIKI_COMPARE_BTN','Compare');
define('_MD_SWIKI_SELEDITOR_BTN','(right-click to select another editor)');

define('_MD_SWIKI_TITLE_FLD','Title');					
define('_MD_SWIKI_BODY_FLD','Content');
define('_MD_SWIKI_VISIBLE_FLD','Visible');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Side content');
define('_MD_SWIKI_PARENT_FLD','Parent page');
define('_MD_SWIKI_PROFILE_FLD','Privileges profile');

define('_MD_SWIKI_TITLE_COL','Title');					
define('_MD_SWIKI_MODIFIED_COL','Modified');				
define('_MD_SWIKI_AUTHOR_COL','Author');
define('_MD_SWIKI_ACTION_COL','Action');
define('_MD_SWIKI_KEYWORD_COL','Page ID');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"This page doesn't exist yet.");
define('_MD_SWIKI_DBUPDATED_MSG','Database successfully updated!');
define('_MD_SWIKI_ERRORINSERT_MSG','Error while updating database!');
define('_MD_SWIKI_EDITCONFLICT_MSG','Conflicting modifications! - All changes have been rejected!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br /><h4>Sorry, restricted access page.</h4><br />');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br /><h4>Sorry, you don\'t have write access on this page.</h4><br />');

// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}// Also need in modinfo.php
define('_MI_SWIKI_404','IllegalName');

// Added in version 1.0
define('_MI_SWIKI_REVISION_SUMMARY', 'Revision Summary');
define('_MI_SWIKI_ALLOW_COMMENTS','Allow Comments');
define('_MD_SWIKI_ADDPAGE_BTN','Add Page');
define('_MD_SWIKI_ADDPAGE','Create a New Page');
define('_MD_SWIKI_PDF_ERROR_MSG','Error creating PDF');
define('_MD_SWIKI_NOPAGE_MSG','Could not create PDF - at least one of the pages did not exist');
?>