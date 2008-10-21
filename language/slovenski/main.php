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

define('_MD_WIWI_MODIFIED_TXT', 'Zadnje urejano:');		
define('_MD_WIWI_BY','od');								
define('_MD_WIWI_HISTORY_TXT','Zgodovina Strani');		
define('_MD_WIWI_EDIT_TXT','Uredi Stran');
define('_MD_WIWI_BODY_TXT','Vsebina Strani');
define('_MD_WIWI_DIFF_TXT','Razlike med trenutno in najnovejšo razlièico');
define('_MD_WIWI_THISPAGE','This page');

//define('_MD_WIWI_EDIT_BTN','Uredi');						
//define('_MD_WIWI_PREVIEW_BTN','Predogled');
define('_MD_WIWI_SUBMITREVISION_BTN','Nova Izdaja');
define('_MD_WIWI_QUIETSAVE_BTN','Shrani');
define('_MD_WIWI_HISTORY_BTN','Zgodovina');				
define('_MD_WIWI_PAGEVIEW_BTN','Nazaj na ogled Strani');	
define('_MD_WIWI_VIEW_BTN','Poglej');
define('_MD_WIWI_RESTORE_BTN','Obnovi');
define('_MD_WIWI_FIX_BTN','Popravi');
define('_MD_WIWI_COMPARE_BTN','Primerjaj');
define('_MD_WIWI_SELEDITOR_BTN','(right-click to select another editor)');

define('_MD_WIWI_TITLE_FLD','Naslov');					
define('_MD_WIWI_BODY_FLD','Vsebina');
define('_MD_WIWI_VISIBLE_FLD','Vidno');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Side content');
define('_MD_WIWI_PARENT_FLD','Nadrejena Stran');
define('_MD_WIWI_PROFILE_FLD','Profil privilegijev');

define('_MD_WIWI_TITLE_COL','Naslov');					
define('_MD_WIWI_MODIFIED_COL','Spremenjeno');				
define('_MD_WIWI_AUTHOR_COL','Avtor');
define('_MD_WIWI_ACTION_COL','Dejavnost');
define('_MD_WIWI_KEYWORD_COL','ID Strani');


define('_MD_WIWI_PAGENOTFOUND_MSG',"Ta stran še ne obstaja.");
define('_MD_WIWI_DBUPDATED_MSG','Podatkovna baza uspešno posodobljena!');
define('_MD_WIWI_ERRORINSERT_MSG','Pri posodabljanju podatkovne baze je prišlo do napak!');
define('_MD_WIWI_EDITCONFLICT_MSG','Spremembe v sporu! - Vse spremembe so zavrnjene!');
define('_MD_WIWI_NOREADACCESS_MSG','<br><h4>Oprosti, ta stran ima omejen dostop.</h4><br>');
define('_MD_WIWI_NOWRITEACCESS_MSG','<br><h4>Oprostite a za to stran nimate dovoljenja pisanja.</h4><br>');


// Wiwi special pages - DO NOT TRANSLATE -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if(!defined('_MI_WIWIMOD_WIWIHOME'){define('_MI_WIWIMOD_WIWIHOME','GlavnaStran');} // Also need in modinfo.php
define('_MI_WIWIMOD_WIWI404','IllegalName');

?>