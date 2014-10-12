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
 * @version $Id: main.php 25074 2013-07-08 21:04:04Z skenow $
 */

define ( '_MD_SWIKI_MODIFIED_TXT', 'Ultima modifica il');
define ( '_MD_SWIKI_BY', 'da');
define ( '_MD_SWIKI_HISTORY_TXT', 'Storico pagina');
define ( '_MD_SWIKI_EDIT_TXT', 'Modifica pagina Wiki');
define ( '_MD_SWIKI_BODY_TXT', 'Contenuti della pagina');
define ( '_MD_SWIKI_DIFF_TXT', 'Le differenze tra l\'attuale revisione e le più recenti');
define ( '_MD_SWIKI_THISPAGE', 'Questa pagina');

define ( '_MD_SWIKI_SUBMITREVISION_BTN', 'Nuova revisione');
define ( '_MD_SWIKI_QUIETSAVE_BTN', 'Salva');
define ( '_MD_SWIKI_HISTORY_BTN', 'Storico');
define ( '_MD_SWIKI_PAGEVIEW_BTN', 'Torna alla pagina visualizzata');
define ( '_MD_SWIKI_VIEW_BTN', 'Visualizzazione');
define ( '_MD_SWIKI_RESTORE_BTN', 'Ripristina');
define ( '_MD_SWIKI_FIX_BTN', 'Fissa');
define ( '_MD_SWIKI_COMPARE_BTN', 'Confronta');
define ( '_MD_SWIKI_SELEDITOR_BTN', '(tasto destro del mouse per selezionare un altro editor)');

define ( '_MD_SWIKI_TITLE_FLD', 'Titolo');
define ( '_MD_SWIKI_BODY_FLD', 'Contenuto');
define ( '_MD_SWIKI_VISIBLE_FLD', 'Visibile');
define ( '_MD_SWIKI_CONTEXTBLOCK_FLD', 'contenuto Side');
define ( '_MD_SWIKI_PARENT_FLD', 'Pagina superiore');
define ( '_MD_SWIKI_PROFILE_FLD', 'Profilo di privilegi');

define ( '_MD_SWIKI_TITLE_COL', 'Titolo');
define ( '_MD_SWIKI_MODIFIED_COL', 'Modificati');
define ( '_MD_SWIKI_AUTHOR_COL', 'Autore');
define ( '_MD_SWIKI_ACTION_COL', 'Azione');
define ( '_MD_SWIKI_KEYWORD_COL', 'Pagina ID');

define ( '_MD_SWIKI_PAGENOTFOUND_MSG', "Questa pagina non esiste ancora.");
define ( '_MD_SWIKI_DBUPDATED_MSG', 'Database aggiornato con successo!');
define ( '_MD_SWIKI_ERRORINSERT_MSG', 'Errore durante l\'aggiornamento del database');
define ( '_MD_SWIKI_EDITCONFLICT_MSG', 'Modifiche conflittuali! - Tutte le modifiche sono state respinte!');
define ( '_MD_SWIKI_NOREADACCESS_MSG', '<br /> <h4> Spiacenti, la pagina ad accesso limitato. </ h4> <br />');
define ( '_MD_SWIKI_NOWRITEACCESS_MSG', '<br /> <h4> Siamo spiacenti, non hai accesso in scrittura su questa pagina. </ h4> <br /> ');
// Simply Wiki special pages -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}// Also need in modinfo.php
define('_MI_SWIKI_404','IllegalName');

// Added in version 1.1
define ( '_MI_SWIKI_REVISION_SUMMARY', 'Sintesi Revisione');
define ( '_MI_SWIKI_ALLOW_COMMENTS', 'Consenti commenti');
define ( '_MD_SWIKI_ADDPAGE_BTN', 'Aggiungi una pagina');
define ( '_MD_SWIKI_ADDPAGE', 'Crea una nuova pagina');
define ( '_MD_SWIKI_PDF_ERROR_MSG', 'Errore nella creazione del PDF');
define ( '_MD_SWIKI_NOPAGE_MSG', 'Impossibile creare PDF - almeno una delle pagine non esiste');
define ( '_MD_SWIKI_CREATED', 'Questa pagina è stata creata su %2$s da %1$s');
define ( 'u _MD_SWIKI_REVISIONS tempo', 'Questa pagina è stata modificata %u volte/a');
define ( '_MD_SWIKI_LASTVIEWED', 'Questa pagina è stata letta l\'ultima volta il %s');
define ( '_MD_SWIKI_VIEWED', 'Questa pagina è stata letta %u volte/a');

//Added in version 1.2
define('_MD_SWIKI_VIEWS', 'Views');

// Added in version 1.2.1
define('_MD_SWIKI_CREATE', 'Create this page');
