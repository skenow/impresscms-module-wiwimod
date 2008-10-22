<?php
// $Id: modinfo.php 5810 2008-10-19 03:35:40Z skenow $
// Module Info
// Translation: GibaPhp - http://br.impresscms.org
 
// The name of this module
define('_MI_WIWIMOD_NAME','Wiwi');

// A brief description of this module
define('_MI_WIWIMOD_DESC','Uma Ferramenta Visual de Wiki.');

// Admin menu
define('_MI_WIWIMOD_ADMENU1','Páginas');
define('_MI_WIWIMOD_ADMENU2','Privilégios');
define('_MI_WIWIMOD_ADMENU3','Blocos/Grupos');
define('_MI_WIWIMOD_ADMENU4','Sobre...');
define('_MI_WIWIMOD_ADMENU5','Help');

// Admin options
define('_MI_WIWIMOD_EDITOR','Editor, que deve utilizar no Wiki');
define('_MI_WIWIMOD_EDITOR_DESC','');
define('_MI_WIWIMOD_DEFAULTPROFILE','Perfil Padrão');
// Default profile description was added in re-release, see below

define('_MI_WIWIMOD_ALLOWPDF','Mostrar o botão para gerar páginas em PDF ?');
define('_MI_WIWIMOD_ALLOWPDF_DESC','Gerar PDF baseado no conteúdo HTML das páginas ainda está em um nível experimental.');

define('_MI_WIWIMOD_SHOWTITLES','Mostrar títulos da página em vez do nome página');
define('_MI_WIWIMOD_SHOWTITLES_DESC','Mostrar títulos da página, em vez de nomes na página tipo wikilinks');

define('_MI_WIWIMOD_USECAMELCASE','Usar sintaxe CamelCase'); // Exemplo MostrarEstaPagina (veja que tem 3 letras maíusculas para representar o CamelCase) Isto faz a geração de um link automático para criar uma nova página.
define('_MI_WIWIMOD_USECAMELCASE_DESC','Interpreta palavras CamelCase como links para outras páginas wiki.');

define('_MI_WIWIMOD_XOOPSEDITOR','Escolha um "Editor" suportado');
define('_MI_WIWIMOD_XOOPSEDITOR_DESC','Válido somente se o Editor for escolhido acima');

// Notification options
define('_MI_WIWIMOD_PAGENOTIFYCAT_TITLE','Página');
define('_MI_WIWIMOD_PAGENOTIFYCAT_DESC','Notificações que serão aplicas à página atual');
define('_MI_WIWIMOD_PAGENOTIFY_TITLE','Página atualizada');
define('_MI_WIWIMOD_PAGENOTIFY_CAPTION','Avise-me quando a página atual for modificada');
define('_MI_WIWIMOD_PAGENOTIFY_DESC','Deseja Receber uma notificação quando um usuário atualizar a página atual.');
define('_MI_WIWIMOD_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} Notificação Automática: Página atualizada');
/* Added in version 0.83 Re-release */
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_WIWIMOD_GLOBALNOTIFYCAT_DESC','Notificações que se aplicam a todas as páginas');
define('_MI_WIWIMOD_GLOBALNOTIFY_TITLE','Página atualizada');
define('_MI_WIWIMOD_GLOBALNOTIFY_CAPTION','Avise-me quando uma página for modificada');
define('_MI_WIWIMOD_GLOBALNOTIFY_DESC','Receberá uma notificação quando um usuário atualizar uma página.');
define('_MI_WIWIMOD_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} Notificação Automática : página atualizada');
define('_MI_WIWIMOD_TEMPLATE_VIEW_DESC','Ver Página do Wiki');
define('_MI_WIWIMOD_TEMPLATE_EDIT_DESC','Editar Página do Wiki');
define('_MI_WIWIMOD_TEMPLATE_HISTORY_DESC','Ver página do Histórico');
define('_MI_WIWIMOD_TEMPLATE_PDF_DESC','Wiki - pdf');
define('_MI_WIWIMOD_BLOCK_TOC_NAME','Wiki TOC');
define('_MI_WIWIMOD_BLOCK_TOC_DESC','Páginas escolhidas para iniciar o Wiki');
define('_MI_WIWIMOD_BLOCK_RECENT_NAME','Wiki Recentes');
define('_MI_WIWIMOD_BLOCK_RECENT_DESC','Modificações Recentes no Wiki');
define('_MI_WIWIMOD_BLOCK_RELATED_NAME','WiwiSideContent');
define('_MI_WIWIMOD_BLOCK_RELATED_DESC','bloquear o conteúdo lateral extra sobre as páginas do Wiki');
define('_MI_WIWIMOD_BLOCK_SHOWPAGE_NAME','WiwiShowPage');
define('_MI_WIWIMOD_BLOCK_SHOWPAGE_DESC','Mostrar uma página do Wiki');
define('_MI_WIWIMOD_AUTHOR_WORD','<h4>Sobre o Wiwi 0.8.3</h4><br />Wiwi é um software GPL ; visite a página inicial do Wiwi no <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">www.zonatim.com</a> para suporte ou conseguir ajuda.<br /><br />Se você estiver migrando da versão (0.7.1 ou menor), favor clicar aqui : <input type="button" value="UPGRADE" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'../manual.html\' target=\'_blank\'>Leia o Manual</a> e <a href=\'../ReadMe.txt\' target=\'_blank\'>notas sobre a atualização</a> para começar.');
define('_MI_WIWIMOD_DEFAULTPROFILE_DESC','Perfil predefinido e atribuído para novas páginas');
if (!defined('_MI_WIWIMOD_WIWIHOME'){define('_MI_WIWIMOD_WIWIHOME','WiwiHome');}
?>