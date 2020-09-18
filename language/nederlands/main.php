<?php
/*
 * Module and admin language definition
 *
 * _BTN : text within buttons or action links
 * _COL : column headers
 * _TXT : "verbose" text (probably within content)
 * _FLD : title of form elements
 * _DESC : description under the title for form elements
 * _MSG : messages, alerts ...
 *
 */
// Translated by Shine
define('_MD_SWIKI_MODIFIED_TXT', 'Laatst bewerkt op:');
define('_MD_SWIKI_BY', 'door');
define('_MD_SWIKI_HISTORY_TXT', 'Geschiedenis van de pagina');
define('_MD_SWIKI_EDIT_TXT', 'Bewerk Wiwi Pagina');
define('_MD_SWIKI_BODY_TXT', 'Pagina content');
define('_MD_SWIKI_DIFF_TXT', 'Verschillen tussen de huidige en laatst gereviseerde pagina');
define('_MD_SWIKI_THISPAGE', 'Deze pagina');

define('_MD_SWIKI_SUBMITREVISION_BTN', 'Nieuwe revisie');
define('_MD_SWIKI_QUIETSAVE_BTN', 'Opslaan');
define('_MD_SWIKI_HISTORY_BTN', 'Geschiedenis');
define('_MD_SWIKI_PAGEVIEW_BTN', 'Terug naar pagina bekijken');
define('_MD_SWIKI_VIEW_BTN', 'Bekijk');
define('_MD_SWIKI_RESTORE_BTN', 'Herstel');
define('_MD_SWIKI_FIX_BTN', 'Repareer');
define('_MD_SWIKI_COMPARE_BTN', 'Vergelijk');
define('_MD_SWIKI_SELEDITOR_BTN', '(right-click to select another editor)');

define('_MD_SWIKI_TITLE_FLD', 'Titel');
define('_MD_SWIKI_BODY_FLD', 'Content');
define('_MD_SWIKI_VISIBLE_FLD', 'Zichtbaar');
define('_MD_SWIKI_CONTEXTBLOCK_FLD', 'Side content');
define('_MD_SWIKI_PARENT_FLD', 'Ouder pagina');
define('_MD_SWIKI_PROFILE_FLD', 'PROFIEL Toegangsrechten');

define('_MD_SWIKI_TITLE_COL', 'Titel');
define('_MD_SWIKI_MODIFIED_COL', 'gewijzigd');
define('_MD_SWIKI_AUTHOR_COL', 'Auteur');
define('_MD_SWIKI_ACTION_COL', 'Actie');
define('_MD_SWIKI_KEYWORD_COL', 'Pagina ID');

define('_MD_SWIKI_PAGENOTFOUND_MSG', "Deze pagina bestaat nog niet.");
define('_MD_SWIKI_DBUPDATED_MSG', 'De Database is successvol bijgewerkt!');
define('_MD_SWIKI_ERRORINSERT_MSG', 'FOUT: Er is een fout opgetreden tijdens het bijwerken van de database!');
define('_MD_SWIKI_EDITCONFLICT_MSG', 'Er zijn tegenstrijdige/conflicterende aanpassingen! - Alle veranderingen zijn derhalve geannuleerd.');
define('_MD_SWIKI_NOREADACCESS_MSG', '<br><h4>Helaas..., u hebt geen toegang tot deze pagina.</h4><br>');

// Added for Wiwi 0.8.2
define('_MD_SWIKI_NOWRITEACCESS_MSG', '<br><h4>Helaas, u hebt geen schrijf-/bewerkrechten voor deze pagina.</h4><br>');

define('_MD_SWIKI_TITLE_COL', 'Title');
define('_MD_SWIKI_MODIFIED_COL', 'Modified');
define('_MD_SWIKI_AUTHOR_COL', 'Author');
define('_MD_SWIKI_ACTION_COL', 'Action');
define('_MD_SWIKI_KEYWORD_COL', 'Page ID');

define('_MD_SWIKI_PAGENOTFOUND_MSG', "This page doesn't exist yet.");
define('_MD_SWIKI_DBUPDATED_MSG', 'Database successfully updated!');
define('_MD_SWIKI_ERRORINSERT_MSG', 'Error while updating database!');
define('_MD_SWIKI_EDITCONFLICT_MSG', 'Conflicting modifications! - All changes have been rejected!');
define('_MD_SWIKI_NOREADACCESS_MSG', '<br /><h4>Sorry, restricted access page.</h4><br />');
define('_MD_SWIKI_NOWRITEACCESS_MSG', '<br /><h4>Sorry, you don\'t have write access on this page.</h4><br />');

// Wiwi special pages -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')) {
	define('_MI_SWIKI_HOME', 'HomePage');
} // Also need in modinfo.php
define('_MI_SWIKI_404', 'IllegalName');

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Revision Summary');
define('_MI_SWIKI_ALLOW_COMMENTS', 'Allow Comments');
define('_MD_SWIKI_ADDPAGE_BTN', 'Add Page');
define('_MD_SWIKI_ADDPAGE', 'Create a New Page');
define('_MD_SWIKI_PDF_ERROR_MSG', 'Error creating PDF');
define('_MD_SWIKI_NOPAGE_MSG', 'Could not create PDF - at least one of the pages did not exist');
define('_MD_SWIKI_CREATED', 'This page was created on %2$s by %1$s');
define('_MD_SWIKI_REVISIONS', 'This page has been revised %u time(s)');
define('_MD_SWIKI_LASTVIEWED', 'This page was last viewed on %s');
define('_MD_SWIKI_VIEWED', 'This page has been viewed %u time(s)');

// Added in version 1.2
define('_MD_SWIKI_VIEWS', 'Views');

// Added in version 1.2.1
define('_MD_SWIKI_CREATE', 'Create this page');

// Added in version 2.0
define('_MD_SWIKI_META_KEYWORDS', 'META Keywords');
define('_MD_SWIKI_META_DESCRIPTION', 'META Description');

