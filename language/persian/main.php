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
 *
 */

define('_MD_WIWI_MODIFIED_TXT', 'تاریخ آخرین ویرایش:');		
define('_MD_WIWI_BY','توسط');								
define('_MD_WIWI_HISTORY_TXT','تاریخچه‌ی این صفحه');		
define('_MD_WIWI_EDIT_TXT','ویرایش صفحه‌ی ویوی');
define('_MD_WIWI_BODY_TXT','محتوای صفحه');
define('_MD_WIWI_DIFF_TXT','تفاوت‌های بین این نسخه و نسخه‌ی قبلی');
define('_MD_WIWI_THISPAGE','این صفحه');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_WIWI_SUBMITREVISION_BTN','نسخه‌ی جدید');
define('_MD_WIWI_QUIETSAVE_BTN','ذخیره شود');
define('_MD_WIWI_HISTORY_BTN','تاریخچه');				
define('_MD_WIWI_PAGEVIEW_BTN','Back to page view');	
define('_MD_WIWI_VIEW_BTN','نمایه');
define('_MD_WIWI_RESTORE_BTN','بازسازی');
define('_MD_WIWI_FIX_BTN','رفع ایرادها');
define('_MD_WIWI_COMPARE_BTN','مقایسه کن');
define('_MD_WIWI_SELEDITOR_BTN','(right-click to select another editor)');

define('_MD_WIWI_TITLE_FLD','عنوان');					
define('_MD_WIWI_BODY_FLD','متن');
define('_MD_WIWI_VISIBLE_FLD','نمایان');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Side content');
define('_MD_WIWI_PARENT_FLD','Parent page');
define('_MD_WIWI_PROFILE_FLD','Privileges profile');

define('_MD_WIWI_TITLE_COL','عنوان');					
define('_MD_WIWI_MODIFIED_COL','آخرین بازبینی');				
define('_MD_WIWI_AUTHOR_COL','نویسنده');
define('_MD_WIWI_ACTION_COL','اعمال');
define('_MD_WIWI_KEYWORD_COL','ش.ش صفحه');


define('_MD_WIWI_PAGENOTFOUND_MSG',"This page doesn't exist yet.");
define('_MD_WIWI_DBUPDATED_MSG','Database successfully updated!');
define('_MD_WIWI_ERRORINSERT_MSG','Error while updating database!');
define('_MD_WIWI_EDITCONFLICT_MSG','Conflicting modifications! - All changes have been rejected!');
define('_MD_WIWI_NOREADACCESS_MSG','<br /><h4>Sorry, restricted access page.</h4><br />');
define('_MD_WIWI_NOWRITEACCESS_MSG','<br /><h4>Sorry, you don\'t have write access on this page.</h4><br />');


// Wiwi special pages - DO NOT TRANSLATE -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
define('_MI_WIWIMOD_WIWIHOME','صفحه‌ی آغاز ویوی‌');
define('_MI_WIWIMOD_WIWI404','نام غیرمجاز می‌باشد');


?>