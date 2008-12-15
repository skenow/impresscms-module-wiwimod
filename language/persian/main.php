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
 * @version $Id: main.php 5734 2008-10-17 01:25:01Z skenow $ 
 */

define('_MD_SWIKI_MODIFIED_TXT', 'تاریخ آخرین ویرایش:');		
define('_MD_SWIKI_BY','توسط');								
define('_MD_SWIKI_HISTORY_TXT','تاریخچه‌ی این صفحه');		
define('_MD_SWIKI_EDIT_TXT','ویرایش صفحه‌ی ویوی');
define('_MD_SWIKI_BODY_TXT','محتوای صفحه');
define('_MD_SWIKI_DIFF_TXT','تفاوت‌های بین این نسخه و نسخه‌ی قبلی');
define('_MD_SWIKI_THISPAGE','این صفحه');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_SWIKI_SUBMITREVISION_BTN','نسخه‌ی جدید');
define('_MD_SWIKI_QUIETSAVE_BTN','ذخیره شود');
define('_MD_SWIKI_HISTORY_BTN','تاریخچه');				
define('_MD_SWIKI_PAGEVIEW_BTN','بازگشت به نمایه‌ی صفحه');	
define('_MD_SWIKI_VIEW_BTN','نمایه');
define('_MD_SWIKI_RESTORE_BTN','بازسازی');
define('_MD_SWIKI_FIX_BTN','رفع ایرادها');
define('_MD_SWIKI_COMPARE_BTN','مقایسه کن');
define('_MD_SWIKI_SELEDITOR_BTN','(برای انتخاب ویراستار، کلیک راست کنید)');

define('_MD_SWIKI_TITLE_FLD','عنوان');					
define('_MD_SWIKI_BODY_FLD','متن');
define('_MD_SWIKI_VISIBLE_FLD','نمایان');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Side content');
define('_MD_SWIKI_PARENT_FLD','صفحه‌ی اصلی');
define('_MD_SWIKI_PROFILE_FLD','Privileges profile');

define('_MD_SWIKI_TITLE_COL','عنوان');					
define('_MD_SWIKI_MODIFIED_COL','آخرین بازبینی');				
define('_MD_SWIKI_AUTHOR_COL','نویسنده');
define('_MD_SWIKI_ACTION_COL','اعمال');
define('_MD_SWIKI_KEYWORD_COL','ش.ش صفحه');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"This page doesn't exist yet.");
define('_MD_SWIKI_DBUPDATED_MSG','Database successfully updated!');
define('_MD_SWIKI_ERRORINSERT_MSG','Error while updating database!');
define('_MD_SWIKI_EDITCONFLICT_MSG','Conflicting modifications! - All changes have been rejected!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br /><h4>Sorry, restricted access page.</h4><br />');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br /><h4>Sorry, you don\'t have write access on this page.</h4><br />');


// Wiwi special pages - DO NOT TRANSLATE -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}
define('_MI_SWIKI_404','نام غیرمجاز می‌باشد');

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Revision Summary');
define('_MI_SWIKI_ALLOW_COMMENTS','Allow Comments');
define('_MD_SWIKI_ADDPAGE_BTN','Add Page');
define('_MD_SWIKI_ADDPAGE','Create a New Page');
define('_MD_SWIKI_PDF_ERROR_MSG','Error creating PDF');
define('_MD_SWIKI_NOPAGE_MSG','Could not create PDF - at least one of the pages did not exist');
?>