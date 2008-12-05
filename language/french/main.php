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

define('_MD_SWIKI_MODIFIED_TXT', 'mis � jour le :');		
define('_MD_SWIKI_BY','par');								
define('_MD_SWIKI_HISTORY_TXT','Historique de la page');		
define('_MD_SWIKI_EDIT_TXT','Editer la page');
define('_MD_SWIKI_BODY_TXT','Contenu');
define('_MD_SWIKI_DIFF_TXT','Differences entre cette version et la plus r�cente');
define('_MD_SWIKI_THISPAGE','Cette page');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_SWIKI_SUBMITREVISION_BTN','Nouvelle r�vision');
define('_MD_SWIKI_QUIETSAVE_BTN','Enregistrer');
define('_MD_SWIKI_HISTORY_BTN','Historique');				
define('_MD_SWIKI_PAGEVIEW_BTN','Retour � la page');	
define('_MD_SWIKI_VIEW_BTN','Afficher');
define('_MD_SWIKI_RESTORE_BTN','Restituer');
define('_MD_SWIKI_FIX_BTN','Fix');
define('_MD_SWIKI_COMPARE_BTN','Comparer');
define('_MD_SWIKI_SELEDITOR_BTN','(clic-droit pour changer d\'�diteur)');

define('_MD_SWIKI_TITLE_FLD','Titre');					
define('_MD_SWIKI_BODY_FLD','Contenu');
define('_MD_SWIKI_VISIBLE_FLD','Visible');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Contenu du bloc lat�ral');
define('_MD_SWIKI_PARENT_FLD','Page "m�re"');
define('_MD_SWIKI_PROFILE_FLD','Droits d\'acc�s');

define('_MD_SWIKI_TITLE_COL','Titre');					
define('_MD_SWIKI_MODIFIED_COL','Mise � jour');				
define('_MD_SWIKI_AUTHOR_COL','Auteur');
define('_MD_SWIKI_ACTION_COL','Action');
define('_MD_SWIKI_KEYWORD_COL','Nom');


define('_MD_SWIKI_PAGENOTFOUND_MSG',"Cette page n'existe pas dans la base documentaire.");
define('_MD_SWIKI_DBUPDATED_MSG','Mise � jour r�ussie !');
define('_MD_SWIKI_ERRORINSERT_MSG','Echec de la mise � jour!');
define('_MD_SWIKI_EDITCONFLICT_MSG','Conflit de versions! - Vos modifications ont �t� ignor�es!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br><h4>D�sol�, page en acc�s restreint.</h4><br>');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br><h4>D�sol�, vous n\'avez pas les droits pour modifier cette page.</h4><br>');


// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');} // Also need in modinfo.php
define('_MI_SWIKI_404','IllegalName');

// Added in version 1.0
define('_MI_SWIKI_REVISION_SUMMARY', 'Revision Summary');
define('_MI_SWIKI_ALLOW_COMMENTS','Allow Comments');
define('_MD_SWIKI_ADDPAGE_BTN','Add Page');
define('_MD_SWIKI_ADDPAGE','Create a New Page');
?>