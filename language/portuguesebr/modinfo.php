<?php
// $Id: modinfo.php 5810 2008-10-19 03:35:40Z skenow $
// Module Info
// Translation: GibaPhp - http://br.impresscms.org
 
// The name of this module
define('_MI_SWIKI_NAME','Wiwi');

// A brief description of this module
define('_MI_SWIKI_DESC','Uma Ferramenta Visual de Wiki.');

// Admin menu
define('_MI_SWIKI_ADMENU1','Páginas');
define('_MI_SWIKI_ADMENU2','Privilégios');
define('_MI_SWIKI_ADMENU3','Blocos/Grupos');
define('_MI_SWIKI_ADMENU4','Sobre...');
define('_MI_SWIKI_ADMENU5','Help');

// Admin options
define('_MI_SWIKI_EDITOR','Editor, que deve utilizar no Wiki');
define('_MI_SWIKI_EDITOR_DESC','');
define('_MI_SWIKI_DEFAULTPROFILE','Perfil Padrão');
// Default profile description was added in re-release, see below

define('_MI_SWIKI_ALLOWPDF','Mostrar o botão para gerar páginas em PDF ?');
define('_MI_SWIKI_ALLOWPDF_DESC','Gerar PDF baseado no conteúdo HTML das páginas ainda está em um nível experimental.');

define('_MI_SWIKI_SHOWTITLES','Mostrar títulos da página em vez do nome página');
define('_MI_SWIKI_SHOWTITLES_DESC','Mostrar títulos da página, em vez de nomes na página tipo wikilinks');

define('_MI_SWIKI_USECAMELCASE','Usar sintaxe CamelCase'); // Exemplo MostrarEstaPagina (veja que tem 3 letras maíusculas para representar o CamelCase) Isto faz a geração de um link automático para criar uma nova página.
define('_MI_SWIKI_USECAMELCASE_DESC','Interpreta palavras CamelCase como links para outras páginas wiki.');

define('_MI_SWIKI_XOOPSEDITOR','Escolha um "Editor" suportado');
define('_MI_SWIKI_XOOPSEDITOR_DESC','Válido somente se o Editor for escolhido acima');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE','Página');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC','Notificações que serão aplicas à página atual');
define('_MI_SWIKI_PAGENOTIFY_TITLE','Página atualizada');
define('_MI_SWIKI_PAGENOTIFY_CAPTION','Avise-me quando a página atual for modificada');
define('_MI_SWIKI_PAGENOTIFY_DESC','Deseja Receber uma notificação quando um usuário atualizar a página atual.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} Notificação Automática: Página atualizada');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC','Notificações que se aplicam a todas as páginas');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE','Página atualizada');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION','Avise-me quando uma página for modificada');
define('_MI_SWIKI_GLOBALNOTIFY_DESC','Receberá uma notificação quando um usuário atualizar uma página.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} Notificação Automática : página atualizada');
define('_MI_SWIKI_TEMPLATE_VIEW_DESC','Ver Página do Wiki');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC','Editar Página do Wiki');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC','Ver página do Histórico');
define('_MI_SWIKI_TEMPLATE_PDF_DESC','Wiki - pdf');
define('_MI_SWIKI_BLOCK_TOC_NAME','Wiki TOC');
define('_MI_SWIKI_BLOCK_TOC_DESC','Páginas escolhidas para iniciar o Wiki');
define('_MI_SWIKI_BLOCK_RECENT_NAME','Wiki Recentes');
define('_MI_SWIKI_BLOCK_RECENT_DESC','Modificações Recentes no Wiki');
define('_MI_SWIKI_BLOCK_RELATED_NAME','WiwiSideContent');
define('_MI_SWIKI_BLOCK_RELATED_DESC','bloquear o conteúdo lateral extra sobre as páginas do Wiki');
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME','WiwiShowPage');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC','Mostrar uma página do Wiki');
define('_MI_SWIKI_AUTHOR_WORD','<h4>Sobre o SimplyWiki</h4><br />SimplyWiki é um software GPL ; visite a página inicial do Wiwi no <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> para suporte ou conseguir ajuda.<br /><br />Se você estiver migrando da versão (0.7.1 ou menor), favor clicar aqui : <input type="button" value="UPGRADE" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>Leia o Manual</a> e <a href=\'../ReadMe.txt\' target=\'_blank\'>notas sobre a atualização</a> para começar.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC','Perfil predefinido e atribuído para novas páginas');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}

// Added in SimplyWiki 1.1
define('_MI_SWIKI_BLOCK_LISTPAGES_NAME','List Pages');
define('_MI_SWIKI_BLOCK_LISTPAGES_DESC','Display a list of pages');
define('_MI_SWIKI_BLOCK_ADDPAGE_NAME','Add Page');
define('_MI_SWIKI_BLOCK_ADDPAGE_DESC','Add a wiki page from anywhere on your site');
define('_MI_SWIKI_BLOCK_TAGCLOUD_NAME','Wiki Tag Cloud');
define('_MI_SWIKI_BLOCK_TAGCLOUD_DESC','A tag cloud for SimplyWiki');
define('_MI_SWIKI_BLOCK_TAG_NAME','Wiki Top Tags');
define('_MI_SWIKI_BLOCK_TAG_DESC','A list of top tags for SimplyWiki');
define('_MI_SWIKI_PAGEINFO','Show Page Information');
define('_MI_SWIKI_PAGEINFO_DESC', 'Select which page details to display with the page');
define('_MI_SWIKI_SHOWREVISIONS','Show number of revisions');
define('_MI_SWIKI_SHOWVIEWS','Show number of views');
define('_MI_SWIKI_SHOWCREATED','Show date created and creator');
define('_MI_SWIKI_SHOWLASTREVISED','Show date of last revision');
define('_MI_SWIKI_LASTVIEWED','Show date last viewed');
define('_MI_SWIKI_USECAPTCHA','Enable CAPTCHA');
define('_MI_SWIKI_USECAPTCHA_DESC', 'Display CAPTCHA on edit form');
define('_MI_SWIKI_SHOWQUICKADD','Enable the Quick Add feature');
define('_MI_SWIKI_SHOWQUICKADD_DESC', 'Setting to <em>Yes</em> displays the Quick Add field, allowing the editors to type a page name and go directly to editing the page');
define('_MI_SWIKI_TOPPAGE', 'Index Page');
define('_MI_SWIKI_TOPPAGE_DESC', 'Page to be shown on the main page of the module');
?>