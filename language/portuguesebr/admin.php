<?php
/*
 * Module and admin language portuguese definition
 *
 * _BTN : text within buttons or action links
 * _COL : column headers
 * _TXT : "verbose" text (probably within content)
 * _FLD : title of form elements
 * _DESC : description under the title for form elements
 * _MSG : messages, alerts ...
 * Translation: GibaPhp - http://br.impresscms.org
 *
 */
define('_AM_SWIKI_ADMIN_TXT', 'Administração');
define('_AM_SWIKI_PAGESFILTER_TXT', 'Onde Mostrar páginas');
define('_AM_SWIKI_LIKE_TXT', 'contém');
define('_AM_SWIKI_PROFILEIS_TXT', 'é');
define('_AM_SWIKI_ORDERBY_TXT', ', ordenado por');
define('_AM_SWIKI_LISTPAGES_RESULTS_TXT', 'resultados');

define('_AM_SWIKI_SELECTACL_BOX', '');
define('_AM_SWIKI_SELECTACL_TXT', 'modificar perfil :');
define('_AM_SWIKI_CREATEACL_TXT', 'ou criar um novo :');
define('_AM_SWIKI_EDITACL_TXT', 'Perfil info');
define('_AM_SWIKI_ACLHELP_TXT', '
	<p>Os privilégios do Wiki é um conjunto de perfis que descrevem os grupos que têm enventualmente permissões para ler/gravar/administrar o acesso às páginas correspondentes.</p>
	<ul>
		<li>Escritores&nbsp;podem modificar a página atual, e criar novas páginas com o mesmo perfil.</li>
		<li>Administradores&nbsp;podem modificar todas as páginas que desejam e também  qualquer perfil existente neste módulo.</li></ul>
	<p>Definir padrão de Novas páginas para o perfil principal.</p>
	<p>Os perfis também definem quem pode ler/enviar comentários. Isso é útil para permitir conteúdo privado e comentários em páginas públicas...</p>
	<p>Nota : O Webmaster do site sempre têm todos privilégios nas páginas do Wiki.</p>
	');
define('_AM_SWIKI_DELCONFIRMTITLE_TXT', 'CONFIRMAÇÃO PARA APAGAR O PERFIL');
define('_AM_SWIKI_DELCONFIRM_TXT', 'Você está prestes a apagar um perfil. Por favor, confirme marcando a caixa de seleção.');
define('_AM_SWIKI_DELREDIR_TXT', 'Escolha um novo perfil para AS páginas que foram anexadas a esta.');

define('_AM_SWIKI_LISTPAGES_BTN', '<< Voltar à lista de páginas');
define('_AM_SWIKI_CREATEACL_BTN', 'Novo');
define('_AM_SWIKI_EDITACL_SAVE_BTN', 'Salvar');
define('_AM_SWIKI_EDITACL_DELETE_BTN', 'Apagar');
define('_AM_SWIKI_EDITACL_CANCEL_BTN', 'Cancelar');
define('_AM_SWIKI_CLEANUPDB_BTN', 'Limpar o banco de dados'); // Esta operação precisa ser verificada...

define('_AM_SWIKI_ACLNAME_FLD', 'Nome do Perfil');
define('_AM_SWIKI_ACLDESC_FLD', 'Descrição do Perfil');
define('_AM_SWIKI_READERS_FLD', 'Grupos com acesso de <strong>leitura</strong>');
define('_AM_SWIKI_WRITERS_FLD', 'Grupos com acesso de <strong>escrita</strong>');
define('_AM_SWIKI_ADMINISTRATORS_FLD', 'Grupos com acesso <strong>Administrativo</strong>');
define('_AM_SWIKI_COMMENTS_FLD', 'Quem poderá ler e enviar comentários :');
define('_AM_SWIKI_HISTORY_FLD', 'Quem tem acesso nas páginas do histórico de revisões :');
define('_AM_SWIKI_DELREDIR_FLD', 'Substituição de perfil :');

define('_AM_SWIKI_SELECTACL_OPT', '(selecione)');
define('_AM_SWIKI_READERS_OPT', 'Leitores');
define('_AM_SWIKI_WRITERS_OPT', 'Escritores');
define('_AM_SWIKI_ADMINISTRATORS_OPT', 'Administradores');
define('_AM_SWIKI_COMMENTS_NONE_OPT', '(sem comentários)');
define('_AM_SWIKI_HISTORY_NONE_OPT', '(sem histórico)');
define('_AM_SWIKI_DELCONFIRM_OPT', 'SIM, Quero apagar esse perfil.');

define('_AM_SWIKI_LISTPAGES_ALLPAGES_OPT', 'todas páginas');
define('_AM_SWIKI_LISTPAGES_KEYWORD_OPT', 'nome');
define('_AM_SWIKI_LISTPAGES_TITLE_OPT', 'título');
define('_AM_SWIKI_LISTPAGES_BODY_OPT', 'conteúdo');
define('_AM_SWIKI_LISTPAGES_UID_OPT', 'último autor');
define('_AM_SWIKI_LISTPAGES_PARENT_OPT', 'principal');
define('_AM_SWIKI_LISTPAGES_PRID_OPT', 'perfil');
define('_AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT', 'última modificação');
define('_AM_SWIKI_LISTPAGES_ORDERDESC_OPT', 'descendente');
define('_AM_SWIKI_LISTPAGES_ORDERASC_OPT', 'ascendente');

define('_AM_SWIKI_LISTPAGE_NAV', 'navegar nas páginas');
define('_AM_SWIKI_HISTORY_NAV', 'histórico');
define('_AM_SWIKI_ACLADMIN_NAV', 'privilégios (ACL)');
define("_AM_SWIKI_BLOCKSNGROUPS_NAV", "blocos e grupos");

define('_AM_SWIKI_NOPAGESPECIFIED_MSG', 'Escolha uma página');
define('_AM_SWIKI_CONFIRMDEL_MSG', 'Você realmente deseja excluir esta página do Wiki?');
define('_AM_SWIKI_CONFIRMFIX_MSG', 'Você realmente deseja corrigir esta página do Wiki?');
define('_AM_SWIKI_CONFIRMCLEAN_MSG', 'Você realmente deseja limpar o banco de dados? (CUIDADO)');
define('_AM_SWIKI_PRFSAVESUCCESS_MSG', 'Perfil gravado no banco com sucesso');
define('_AM_SWIKI_PRFSAVEFAILED_MSG', 'Erro ao armazenar o perfil. Base de dados não foi atualizada');
define('_AM_SWIKI_ERRDELETE_MSG', 'Erro: não foi possível apagar o perfil');
define('_AM_SWIKI_PRFDELSUCCESS_MSG', 'Perfil excluído do banco de dados.');
define('_AM_SWIKI_PRFDELFAILED_MSG', 'Erro ao excluir o perfil. Base de dados não foi atualizada');
define('_AM_SWIKI_SYS_CFG', 'Configuração do sistema');

// added in version 1.2
define('_AM_SWIKI_GOTO_MODULE', 'Go to module');
define('_AM_SWIKI_UPDATE_MODULE', 'Update module');

// added in version 2.0
define('_AM_SWIKI_HELP', 'Visit the community support page at <a href="https://www.impresscms.org/" target="_blank">ImpressCMS Community Forums</a> for support or to get help. You can read the <a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>manual</a> online.');
