<?php
/*
 * Module and admin language portuguese definition
 * 
 *	_BTN	: text within buttons or action links
 *  _COL	: column headers
 *  _TXT	: "verbose" text (probably within content)
 *  _FLD	: title of form elements
 *  _DESC	: description under the title for form elements
 *  _MSG	: messages, alerts ...
 * @package Wiwimod 
 * @version $Id: main.php 5810 2008-10-19 03:35:40Z skenow $ 
* Translation: GibaPhp - http://br.impresscms.org
  */

define('_MD_WIWI_MODIFIED_TXT', 'Última modificação:');		
define('_MD_WIWI_BY','by');								
define('_MD_WIWI_HISTORY_TXT','Página do Histórico');		
define('_MD_WIWI_EDIT_TXT','Editar Página');
define('_MD_WIWI_BODY_TXT','Conteúdo da Página');
define('_MD_WIWI_DIFF_TXT','Diferenças entre a página atual e as revisões recentes');
define('_MD_WIWI_THISPAGE','Esta página');

//define('_MD_WIWI_EDIT_BTN','Edit');						
//define('_MD_WIWI_PREVIEW_BTN','Preview');
define('_MD_WIWI_SUBMITREVISION_BTN','Nova revisão');
define('_MD_WIWI_QUIETSAVE_BTN','Salvar');
define('_MD_WIWI_HISTORY_BTN','Histórico');				
define('_MD_WIWI_PAGEVIEW_BTN','Voltar para a página');	
define('_MD_WIWI_VIEW_BTN','Visualizar');
define('_MD_WIWI_RESTORE_BTN','Restauração');
define('_MD_WIWI_FIX_BTN','Consertar');
define('_MD_WIWI_COMPARE_BTN','Comparar');
define('_MD_WIWI_SELEDITOR_BTN','(clique com o botão direito do mouse para selecionar outro editor)');

define('_MD_WIWI_TITLE_FLD','Título');					
define('_MD_WIWI_BODY_FLD','Conteúdo');
define('_MD_WIWI_VISIBLE_FLD','Visível');
define('_MD_WIWI_CONTEXTBLOCK_FLD','Conteúdo Lateral');
define('_MD_WIWI_PARENT_FLD','Página Principal');
define('_MD_WIWI_PROFILE_FLD','Privilégios do perfil');

define('_MD_WIWI_TITLE_COL','Título');					
define('_MD_WIWI_MODIFIED_COL','Modificado');				
define('_MD_WIWI_AUTHOR_COL','Autor');
define('_MD_WIWI_ACTION_COL','Ação');
define('_MD_WIWI_KEYWORD_COL','ID');


define('_MD_WIWI_PAGENOTFOUND_MSG',"Esta página não existe ainda.");
define('_MD_WIWI_DBUPDATED_MSG','Banco de dados atualizado com sucesso!');
define('_MD_WIWI_ERRORINSERT_MSG','Erro durante a atualização do banco de dados!');
define('_MD_WIWI_EDITCONFLICT_MSG','Modificações em Conflito! - Todas as alterações feitas até o momento serão rejeitadas!');
define('_MD_WIWI_NOREADACCESS_MSG','<br /><h4>Lamento, o acesso a esta página é restrito.</h4><br />');
define('_MD_WIWI_NOWRITEACCESS_MSG','<br /><h4>Lamento, você não tem permissões para escrever/acessar esta página.</h4><br />');

// Wiwi special pages - 
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_WIWIMOD_WIWIHOME')){define('_MI_WIWIMOD_WIWIHOME','WiwiHome');} // Also need in modinfo.php
define('_MI_WIWIMOD_WIWI404','Nome Ilegal');

// Added in version 1.0
define('_MI_WIWIMOD_REVISION_SUMMARY', 'Revision Summary');
define('_MI_WIWIMOD_ALLOW_COMMENTS','Allow Comments');
define('_MD_WIWI_ADDPAGE_BTN','Add Page');
define('_MD_WIWI_ADDPAGE','Create a New Page');
?>