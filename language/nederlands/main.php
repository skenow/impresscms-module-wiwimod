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
 //Translated by Shine

define('_MD_WIWI_MODIFIED_TXT', 'Laatst bewerkt op:');		
define('_MD_WIWI_BY','door');								
define('_MD_WIWI_HISTORY_TXT','Geschiedenis van de pagina');		
define('_MD_WIWI_EDIT_TXT','Bewerk Wiwi Pagina');
define('_MD_WIWI_BODY_TXT','Pagina content');
define('_MD_WIWI_DIFF_TXT','Verschillen tussen de huidige en laatst gereviseerde pagina');
define('_MD_WIWI_THISPAGE','Deze pagina');

//define('_MD_WIWI_EDIT_BTN','Bewerk');						
//define('_MD_WIWI_PREVIEW_BTN','Voorbeeld');
define('_MD_WIWI_SUBMITREVISION_BTN','Nieuwe revisie');
define('_MD_WIWI_QUIETSAVE_BTN','Opslaan');
define('_MD_WIWI_HISTORY_BTN','Geschiedenis');				
define('_MD_WIWI_PAGEVIEW_BTN','Terug naar pagina bekijken');	
define('_MD_WIWI_VIEW_BTN','Bekijk');
define('_MD_WIWI_RESTORE_BTN','Herstel');
define('_MD_WIWI_FIX_BTN','Repareer');
define('_MD_WIWI_COMPARE_BTN','Vergelijk');
define('_MD_WIWI_SELEDITOR_BTN','(right-click to select another editor)');

define('_MD_WIWI_TITLE_FLD','Titel');					
define('_MD_WIWI_BODY_FLD','Content');
define('_MD_WIWI_VISIBLE_FLD','Zichtbaar');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Side content');
define('_MD_WIWI_PARENT_FLD','Ouder pagina');
define('_MD_WIWI_PROFILE_FLD','PROFIEL Toegangsrechten');

define('_MD_WIWI_TITLE_COL','Titel');					
define('_MD_WIWI_MODIFIED_COL','gewijzigd');				
define('_MD_WIWI_AUTHOR_COL','Auteur');
define('_MD_WIWI_ACTION_COL','Actie');
define('_MD_WIWI_KEYWORD_COL','Pagina ID');


define('_MD_WIWI_PAGENOTFOUND_MSG',"Deze pagina bestaat nog niet.");
define('_MD_WIWI_DBUPDATED_MSG','De Database is successvol bijgewerkt!');
define('_MD_WIWI_ERRORINSERT_MSG','FOUT: Er is een fout opgetreden tijdens het bijwerken van de database!');
define('_MD_WIWI_EDITCONFLICT_MSG','Er zijn tegenstrijdige/conflicterende aanpassingen! - Alle veranderingen zijn derhalve geannuleerd.');
define('_MD_WIWI_NOREADACCESS_MSG','<br><h4>Helaas..., u hebt geen toegang tot deze pagina.</h4><br>');

// Added for Wiwi 0.8.2
define('_MD_WIWI_NOWRITEACCESS_MSG','<br><h4>Helaas, u hebt geen schrijf-/bewerkrechten voor deze pagina.</h4><br>');


// Wiwi special pages - DO NOT TRANSLATE -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
define('_MI_WIWIMOD_WIWIHOME','WiwiHome'); 
define('_MI_WIWIMOD_WIWI404','IllegalName');
?>