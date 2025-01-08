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
define('_AM_SWIKI_ADMIN_TXT', 'Amministrazione Modulo');
define('_AM_SWIKI_PAGESFILTER_TXT', 'Mostra pagine dove');
define('_AM_SWIKI_LIKE_TXT', 'contiene');
define('_AM_SWIKI_PROFILEIS_TXT', '&egrave;');
define('_AM_SWIKI_ORDERBY_TXT', ' classificate in ordine di');
define('_AM_SWIKI_LISTPAGES_RESULTS_TXT', 'risultati');

define('_AM_SWIKI_SELECTACL_BOX', '');
define('_AM_SWIKI_SELECTACL_TXT', 'modificare un profilo:');
define('_AM_SWIKI_CREATEACL_TXT', 'o crearne uno nuovo:');
define('_AM_SWIKI_EDITACL_TXT', 'Info profilo');
define('_AM_SWIKI_ACLHELP_TXT', '
<p> I privilegi sono una serie di nomi di profilo che descrivono gruppi che hanno enventualmente lettura/scrittura/accesso amministrativo alle pagine corrispondenti. </ p>
<ul>
<li>Gli scrittori possono modificare la pagina corrente e creare nuove pagine con lo stesso profilo. </ li>
<li>Gli amministratori possono modificare i profili pagina a qualsiasi livello sono "admin" con privilegi. </ li> </ UL>
<p> Nuove pagine di default per i profili superiori. </ p>
<p> I profili possono anche definire chi può leggere/commentare i posts. Questo è utile per consentire osservazioni private sulle pagine pubbliche ...</ p>
<p>Nota: i Webmasters hanno sempre i privilegi totali delle pagine Wiki. </ p>
');
define('_AM_SWIKI_DELCONFIRMTITLE_TXT', 'CONFERMA CANCELLAZIONE PROFILO');
define('_AM_SWIKI_DELCONFIRM_TXT', 'Stai per eliminare un profilo. Si prega di confermare selezionando la casella di controllo.');
define('_AM_SWIKI_DELREDIR_TXT', 'Scegli un nuovo profilo per le pagine che sono state collegate a questo.');

define('_AM_SWIKI_LISTPAGES_BTN', '<< Torna alle pagine della lista');
define('_AM_SWIKI_CREATEACL_BTN', 'Nuovo');
define('_AM_SWIKI_EDITACL_SAVE_BTN', 'Salva');
define('_AM_SWIKI_EDITACL_DELETE_BTN', 'Cancella');
define('_AM_SWIKI_EDITACL_CANCEL_BTN', 'Elimina');
define('_AM_SWIKI_CLEANUPDB_BTN', 'Pulizia database');

define('_AM_SWIKI_ACLNAME_FLD', 'Nome del profilo');
define('_AM_SWIKI_ACLDESC_FLD', 'Profilo Descrizione');
define('_AM_SWIKI_READERS_FLD', 'Gruppi con accesso in lettura');
define('_AM_SWIKI_WRITERS_FLD', 'Gruppi con accesso in scrittura');
define('_AM_SWIKI_ADMINISTRATORS_FLD', 'Gruppi con accesso amministrativo');
define('_AM_SWIKI_COMMENTS_FLD', 'Chi pu&ograve; leggere/commentare post:');
define('_AM_SWIKI_HISTORY_FLD', 'Chi pu&ograve; accedere allo storico delle revisioni di pagina:');
define('profilo di sostituzione _AM_SWIKI_DELREDIR_FLD', ':');

define('_AM_SWIKI_SELECTACL_OPT', '(Seleziona)');
define('_AM_SWIKI_READERS_OPT', 'Lettori');
define('_AM_SWIKI_WRITERS_OPT', 'Scrittori');
define('_AM_SWIKI_ADMINISTRATORS_OPT', 'Amministratori');
define('_AM_SWIKI_COMMENTS_NONE_OPT', '(senza commenti)');
define('_AM_SWIKI_HISTORY_NONE_OPT', '(senza storia)');
define('_AM_SWIKI_DELCONFIRM_OPT', 'S&igrave;, voglio cancellare questo profilo.');

define('_AM_SWIKI_LISTPAGES_ALLPAGES_OPT', 'tutte le pagine');
define('_AM_SWIKI_LISTPAGES_KEYWORD_OPT', 'nome');
define('_AM_SWIKI_LISTPAGES_TITLE_OPT', 'titolo');
define('_AM_SWIKI_LISTPAGES_BODY_OPT', 'contenuto');
define('_AM_SWIKI_LISTPAGES_UID_OPT', 'ultimo autore');
define('_AM_SWIKI_LISTPAGES_PARENT_OPT', 'genitore');
define('_AM_SWIKI_LISTPAGES_PRID_OPT', 'profilo');
define('_AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT', 'ultima modifica');
define('_AM_SWIKI_LISTPAGES_ORDERDESC_OPT', 'discendente');
define('_AM_SWIKI_LISTPAGES_ORDERASC_OPT', 'ascendente');

define('_AM_SWIKI_LISTPAGE_NAV', 'consultare le pagine');
define('_AM_SWIKI_HISTORY_NAV', 'Storico');
define('_AM_SWIKI_ACLADMIN_NAV', 'privilegi (ACL)');
define("_AM_SWIKI_BLOCKSNGROUPS_NAV", "blocchi e gruppi");

define('_AM_SWIKI_NOPAGESPECIFIED_MSG', 'Si prega di selezionare una pagina');
define('_AM_SWIKI_CONFIRMDEL_MSG', 'Sei sicuro di voler cancellare questa pagina Wiki?');
define('_AM_SWIKI_CONFIRMFIX_MSG', 'Sei sicuro di voler fissare questa pagina Wiki?');
define('_AM_SWIKI_CONFIRMCLEAN_MSG', 'Vuoi davvero ripulire il database?');
define('_AM_SWIKI_PRFSAVESUCCESS_MSG', 'Profilo salvato con successo il database');
define('_AM_SWIKI_PRFSAVEFAILED_MSG', 'Errore durante la memorizzazione del profilo. Database NON aggiornato');
define('_AM_SWIKI_ERRDELETE_MSG', 'Errore: Impossibile eliminare il profilo');
define('_AM_SWIKI_PRFDELSUCCESS_MSG', 'Profilo cancellato dal database.');
define('_AM_SWIKI_PRFDELFAILED_MSG', 'Errore durante l\'eliminazione del profilo. Database NON aggiornato');
define('_AM_SWIKI_SYS_CFG', 'Configurazione di sistema');

// added in version 1.2
define('_AM_SWIKI_GOTO_MODULE', 'Go to module');
define('_AM_SWIKI_UPDATE_MODULE', 'Update module');

// added in version 2.0
define('_AM_SWIKI_HELP', 'Visit the community support page at <a href="https://www.impresscms.org/" target="_blank">ImpressCMS Community Forums</a> for support or to get help. You can read the <a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>manual</a> online.');
