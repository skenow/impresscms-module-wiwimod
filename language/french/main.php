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

define('_MD_WIWI_MODIFIED_TXT', 'mis à jour le :');		
define('_MD_WIWI_BY','par');								
define('_MD_WIWI_HISTORY_TXT','Historique de la page');		
define('_MD_WIWI_EDIT_TXT','Editer la page');
define('_MD_WIWI_BODY_TXT','Contenu');
define('_MD_WIWI_DIFF_TXT','Differences entre cette version et la plus récente');
define('_MD_WIWI_THISPAGE','Cette page');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_WIWI_SUBMITREVISION_BTN','Nouvelle révision');
define('_MD_WIWI_QUIETSAVE_BTN','Enregistrer');
define('_MD_WIWI_HISTORY_BTN','Historique');				
define('_MD_WIWI_PAGEVIEW_BTN','Retour à la page');	
define('_MD_WIWI_VIEW_BTN','Afficher');
define('_MD_WIWI_RESTORE_BTN','Restituer');
define('_MD_WIWI_FIX_BTN','Fix');
define('_MD_WIWI_COMPARE_BTN','Comparer');
define('_MD_WIWI_SELEDITOR_BTN','(clic-droit pour changer d\'éditeur)');

define('_MD_WIWI_TITLE_FLD','Titre');					
define('_MD_WIWI_BODY_FLD','Contenu');
define('_MD_WIWI_VISIBLE_FLD','Visible');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Contenu du bloc latéral');
define('_MD_WIWI_PARENT_FLD','Page "mère"');
define('_MD_WIWI_PROFILE_FLD','Droits d\'accès');

define('_MD_WIWI_TITLE_COL','Titre');					
define('_MD_WIWI_MODIFIED_COL','Mise à jour');				
define('_MD_WIWI_AUTHOR_COL','Auteur');
define('_MD_WIWI_ACTION_COL','Action');
define('_MD_WIWI_KEYWORD_COL','Nom');


define('_MD_WIWI_PAGENOTFOUND_MSG',"Cette page n'existe pas dans la base documentaire.");
define('_MD_WIWI_DBUPDATED_MSG','Mise à jour réussie !');
define('_MD_WIWI_ERRORINSERT_MSG','Echec de la mise à jour!');
define('_MD_WIWI_EDITCONFLICT_MSG','Conflit de versions! - Vos modifications ont été ignorées!');
define('_MD_WIWI_NOREADACCESS_MSG','<br><h4>Désolé, page en accès restreint.</h4><br>');
define('_MD_WIWI_NOWRITEACCESS_MSG','<br><h4>Désolé, vous n\'avez pas les droits pour modifier cette page.</h4><br>');


// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_WIWIMOD_WIWIHOME'){define('_MI_WIWIMOD_WIWIHOME','WiwiHome');} // Also need in modinfo.php
define('_MI_WIWIMOD_WIWI404','IllegalName');

?>