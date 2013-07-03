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
 * @package SimplyWiki
 * @version $Id: main.php 5810 2008-10-19 03:35:40Z skenow $
* Translation: GibaPhp - http://br.impresscms.org
  */

define('_MD_SWIKI_MODIFIED_TXT', 'Última modificação:');
define('_MD_SWIKI_BY','by');
define('_MD_SWIKI_HISTORY_TXT','Página do Histórico');
define('_MD_SWIKI_EDIT_TXT','Editar Página');
define('_MD_SWIKI_BODY_TXT','Conteúdo da Página');
define('_MD_SWIKI_DIFF_TXT','Diferenças entre a página atual e as revisões recentes');
define('_MD_SWIKI_THISPAGE','Esta página');

define('_MD_SWIKI_SUBMITREVISION_BTN','Nova revisão');
define('_MD_SWIKI_QUIETSAVE_BTN','Salvar');
define('_MD_SWIKI_HISTORY_BTN','Histórico');
define('_MD_SWIKI_PAGEVIEW_BTN','Voltar para a página');
define('_MD_SWIKI_VIEW_BTN','Visualizar');
define('_MD_SWIKI_RESTORE_BTN','Restauração');
define('_MD_SWIKI_FIX_BTN','Consertar');
define('_MD_SWIKI_COMPARE_BTN','Comparar');
define('_MD_SWIKI_SELEDITOR_BTN','(clique com o botão direito do mouse para selecionar outro editor)');

define('_MD_SWIKI_TITLE_FLD','Título');
define('_MD_SWIKI_BODY_FLD','Conteúdo');
define('_MD_SWIKI_VISIBLE_FLD','Visível');
define('_MD_SWIKI_CONTEXTBLOCK_FLD','Conteúdo Lateral');
define('_MD_SWIKI_PARENT_FLD','Página Principal');
define('_MD_SWIKI_PROFILE_FLD','Privilégios do perfil');

define('_MD_SWIKI_TITLE_COL','Título');
define('_MD_SWIKI_MODIFIED_COL','Modificado');
define('_MD_SWIKI_AUTHOR_COL','Autor');
define('_MD_SWIKI_ACTION_COL','Ação');
define('_MD_SWIKI_KEYWORD_COL','ID');

define('_MD_SWIKI_PAGENOTFOUND_MSG',"Esta página não existe ainda.");
define('_MD_SWIKI_DBUPDATED_MSG','Banco de dados atualizado com sucesso!');
define('_MD_SWIKI_ERRORINSERT_MSG','Erro durante a atualização do banco de dados!');
define('_MD_SWIKI_EDITCONFLICT_MSG','Modificações em Conflito! - Todas as alterações feitas até o momento serão rejeitadas!');
define('_MD_SWIKI_NOREADACCESS_MSG','<br /><h4>Lamento, o acesso a esta página é restrito.</h4><br />');
define('_MD_SWIKI_NOWRITEACCESS_MSG','<br /><h4>Lamento, você não tem permissões para escrever/acessar esta página.</h4><br />');

// Wiwi special pages -
// Change these names, if you want a different homepage and error page
// for this language - just make sure that they are legal WiwiLink names.
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');} // Also need in modinfo.php
define('_MI_SWIKI_404','Nome Ilegal');

// Added in version 1.1
define('_MI_SWIKI_REVISION_SUMMARY', 'Revision Summary');
define('_MI_SWIKI_ALLOW_COMMENTS','Allow Comments');
define('_MD_SWIKI_ADDPAGE_BTN','Add Page');
define('_MD_SWIKI_ADDPAGE','Create a New Page');
define('_MD_SWIKI_PDF_ERROR_MSG','Error creating PDF');
define('_MD_SWIKI_NOPAGE_MSG','Could not create PDF - at least one of the pages did not exist');
define('_MD_SWIKI_CREATED','This page was created on %2$s by %1$s');
define('_MD_SWIKI_REVISIONS','This page has been revised %u time(s)');
define('_MD_SWIKI_LASTVIEWED','This page was last viewed on %s');
define('_MD_SWIKI_VIEWED','This page has been viewed %u time(s)');

//Added in version 1.2
define('_MD_SWIKI_VIEWS', 'Views');
