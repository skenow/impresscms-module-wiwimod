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

define('_MD_SWIKI_MODIFIED_TXT', 'Zadnje urejano:');
define('_MD_SWIKI_BY','od');
define('_MD_SWIKI_HISTORY_TXT','Zgodovina Strani');
define('_MD_SWIKI_EDIT_TXT','Uredi Stran');
define('_MD_SWIKI_BODY_TXT','Vsebina Strani');
define('_MD_SWIKI_DIFF_TXT','Razlike med trenutno in najnovej�o razli�ico');
define('_MD_SWIKI_THISPAGE','This page');

//define('_MD_WIWI_EDIT_BTN','Uredi');
//define('_MD_WIWI_PREVIEW_BTN','Predogled');
define('_MD_SWIKI_SUBMITREVISION_BTN','Nova Izdaja');
define('_MD_SWIKI_QUIETSAVE_BTN','Shrani');
define('_MD_SWIKI_HISTORY_BTN','Zgodovina');
define('_MD_SWIKI_PAGEVIEW_BTN','Nazaj na ogled Strani');
define('_MD_SWIKI_VIEW_BTN','Poglej');
define('_MD_SWIKI_RESTORE_BTN','Obnovi');
define('_MD_SWIKI_FIX_BTN','Popravi');
define('_MD_SWIKI_COMPARE_BTN','Primerjaj');
define('_MD_SWIKI_SELEDITOR_BTN','(right-click to select another editor)');

define('_MD_SWIKI_TITLE_FLD','Naslov');
define('_MD_SWIKI_BODY_FLD','Vsebina');
define('_MD_SWIKI_VISIBLE_FLD','Vidno');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Side content');
define('_MD_SWIKI_PARENT_FLD','Nadrejena Stran');
define('_MD_SWIKI_PROFILE_FLD','Profil privilegijev');

define('_MD_SWIKI_TITLE_COL','Naslov');
define('_MD_SWIKI_MODIFIED_COL','Spremenjeno');
define('_MD_SWIKI_AUTHOR_COL','Avtor');
define('_MD_SWIKI_ACTION_COL','Dejavnost');
define('_MD_SWIKI_KEYWORD_COL','ID Strani');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"Ta stran �e ne obstaja.");
define('_MD_SWIKI_DBUPDATED_MSG','Podatkovna baza uspe�no posodobljena!');
define('_MD_SWIKI_ERRORINSERT_MSG','Pri posodabljanju podatkovne baze je pri�lo do napak!');
define('_MD_SWIKI_EDITCONFLICT_MSG','Spremembe v sporu! - Vse spremembe so zavrnjene!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br><h4>Oprosti, ta stran ima omejen dostop.</h4><br>');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br><h4>Oprostite a za to stran nimate dovoljenja pisanja.</h4><br>');


// Wiwi special pages - DO NOT TRANSLATE -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if(!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','GlavnaStran');} // Also need in modinfo.php
define('_MI_SWIKI_404','IllegalName');

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Revision Summary');
define('_MI_SWIKI_ALLOW_COMMENTS','Allow Comments');
define('_MD_SWIKI_ADDPAGE_BTN','Add Page');
define('_MD_SWIKI_ADDPAGE','Create a New Page');
define('_MD_SWIKI_PDF_ERROR_MSG','Error creating PDF');
define('_MD_SWIKI_NOPAGE_MSG','Could not create PDF - at least one of the pages did not exist');
define('_MI_SWIKI_TOPPAGE', 'Index Page');
define('_MI_SWIKI_TOPPAGE_DESC', 'Page to be shown on the main page of the module');
define('_MD_SWIKI_CREATED','This page was created on %2$s by %1$s');
define('_MD_SWIKI_REVISIONS','This page has been revised %u time(s)');
define('_MD_SWIKI_LASTVIEWED','This page was last viewed on %s');
define('_MD_SWIKI_VIEWS','This page has been viewed %u time(s)');
define('_MI_SWIKI_SHOWREVISIONS','Show number of revisions');
define('_MI_SWIKI_SHOWVIEWS','Show number of views');
define('_MI_SWIKI_SHOWCREATED','Show date created and creator');
define('_MI_SWIKI_SHOWLASTREVISED','Show date of last revision');
define('_MI_SWIKI_LASTVIEWED','Show date last viewed');
?>