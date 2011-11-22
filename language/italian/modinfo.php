<?php
// $Id$
// Module Info

// The name of this module
define('_MI_SWIKI_NAME','SimplyWiki');

// Una breve descrizione di questo modulo
define ( '_MI_SWIKI_DESC', 'uno strumento wiki WYSIWYG.');

// Menu Admin
define ( '_MI_SWIKI_ADMENU1', 'Pagine');
define ( '_MI_SWIKI_ADMENU2', 'Privilegi');
define('_MI_SWIKI_ADMENU3','Blocchi/Grouppi');
define ( '_MI_SWIKI_ADMENU4', 'Info');
define ( '_MI_SWIKI_ADMENU5', 'Aiuto');

// Opzioni Admin
define ( '_MI_SWIKI_EDITOR', 'Quale editor dovrebbe usare SimplyWiki');
define ( '_MI_SWIKI_EDITOR_DESC','');
define ( '_MI_SWIKI_DEFAULTPROFILE', 'Il profilo di default');
// Descrizione del profilo di default è stato aggiunto a re-release, vedi sotto

define ( '_MI_SWIKI_ALLOWPDF', 'Mostra pulsante PDF sulle pagine?');
define ( '_MI_SWIKI_ALLOWPDF_DESC', 'La generazione di PDF da pagine HTML è ancora a livello sperimentale.');

define ( '_MI_SWIKI_SHOWTITLES', 'Visualizza i titoli della pagina al posto del nome pagina');
define ( '_MI_SWIKI_SHOWTITLES_DESC', 'Visualizza i titoli della pagina, invece dei nomi pagina in wikilinks');

define ( '_MI_SWIKI_USECAMELCASE', 'Usa sintassi CamelCase');
define ( '_MI_SWIKI_USECAMELCASE_DESC', 'Interpreta parole CamelCase come link ad altre pagine del wiki.');

define ( '_MI_SWIKI_XOOPSEDITOR', 'Scegli un editor supportato da "xoopseditor"');
define ( '_MI_SWIKI_XOOPSEDITOR_DESC', 'Valido se XoopsEditor è stato scelto in precedenza');

// Opzioni di comunicazione
define ( '_MI_SWIKI_PAGENOTIFYCAT_TITLE', 'Pagina');
define ( '_MI_SWIKI_PAGENOTIFYCAT_DESC', 'Le notifiche che si applicano alla pagina corrente');
define ( '_MI_SWIKI_PAGENOTIFY_TITLE', 'Pagina aggiornata');
define ( '_MI_SWIKI_PAGENOTIFY_CAPTION', 'Avvisami quando la pagina corrente viene modificata');
define ( '_MI_SWIKI_PAGENOTIFY_DESC', 'Per ricevere la notifica quando qualsiasi utente aggiorna la pagina corrente.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notifica : pagina aggiornata');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE','Globale');
define ( '_MI_SWIKI_GLOBALNOTIFYCAT_DESC', 'Le notifiche che si applicano a tutte le pagine');
define ( '_MI_SWIKI_GLOBALNOTIFY_TITLE', 'Pagina aggiornata');
define ( '_MI_SWIKI_GLOBALNOTIFY_CAPTION', 'Avvisami quando una pagina viene modificata');
define ( '_MI_SWIKI_GLOBALNOTIFY_DESC', 'Per ricevere la notifica quando un utente aggiorna una pagina.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} auto-notifica : pagina aggiornata');
define ( '_MI_SWIKI_TEMPLATE_VIEW_DESC', 'Visualizza Wiki Page');
define ( '_MI_SWIKI_TEMPLATE_EDIT_DESC', 'Modifica Wiki Page');
define ( '_MI_SWIKI_TEMPLATE_HISTORY_DESC', 'Visualizza storico della pagina');
define ( '_MI_SWIKI_TEMPLATE_PDF_DESC', 'SimplyWiki - pdf');
define ( '_MI_SWIKI_BLOCK_TOC_NAME', 'Wiki TOC');
define ( '_MI_SWIKI_BLOCK_TOC_DESC', 'Wiki selezionati pagine di ingresso');
define ( '_MI_SWIKI_BLOCK_RECENT_NAME', 'Wiki recenti');
define ( '_MI_SWIKI_BLOCK_RECENT_DESC', 'Wiki recentemente modificato');
define ( '_MI_SWIKI_BLOCK_RELATED_NAME', 'WikiSideContent');
define ( '_MI_SWIKI_BLOCK_RELATED_DESC', 'Blocco laterale per i contenuti extra su pagine Wiki');
define ( '_MI_SWIKI_BLOCK_SHOWPAGE_NAME', 'WikiShowPage');
define ( '_MI_SWIKI_BLOCK_SHOWPAGE_DESC', 'Mostra una pagina wiki');
define('_MI_SWIKI_AUTHOR_WORD','<h4>Aiuto su SimpyWiki</h4><br />SimplyWiki &egrave; GPL software; visita la pagina di supporto su <a href="http://community.impresscms.org/" target="_blank">community.impresscms.org</a> per dare o ricevere supporto.<br /><br /><a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>Leggi il Manuale</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>note release</a> per iniziare.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC','Profilo di default assegnato alle nuove pagine');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','HomePage');}

// Added in SimplyWiki 1.1
define ( '_MI_SWIKI_BLOCK_LISTPAGES_NAME', 'Lista Pages');
define ( '_MI_SWIKI_BLOCK_LISTPAGES_DESC', 'Mostra un elenco di pagine');
define ( '_MI_SWIKI_BLOCK_ADDPAGE_NAME', 'Aggiungi una pagina');
define ( '_MI_SWIKI_BLOCK_ADDPAGE_DESC', 'Aggiungi una pagina wiki da qualsiasi punto del tuo sito');
define ( '_MI_SWIKI_BLOCK_TAGCLOUD_NAME', 'Wiki Tag Cloud');
define ( '_MI_SWIKI_BLOCK_TAGCLOUD_DESC', 'Una nuvola di tag per SimplyWiki');
define ( '_MI_SWIKI_BLOCK_TAG_NAME', 'Wiki Top Tag');
define ( '_MI_SWIKI_BLOCK_TAG_DESC', 'Un elenco di tag top per SimplyWiki');
define ( '_MI_SWIKI_PAGEINFO', 'Mostra Pagina Informazione');
define ( '_MI_SWIKI_PAGEINFO_DESC', 'Seleziona i dettagli della pagina da visualizzare');
define ( '_MI_SWIKI_SHOWREVISIONS', 'Mostra il numero di revisioni');
define ( '_MI_SWIKI_SHOWVIEWS', 'Mostra il numero di visualizzazioni');
define ( '_MI_SWIKI_SHOWCREATED', 'Mostra data creazione e creatore');
define ( '_MI_SWIKI_SHOWLASTREVISED', 'Mostra data dell\'ultima revisione');
define ( '_MI_SWIKI_LASTVIEWED', 'Mostra data ultima visita');
define ( '_MI_SWIKI_USECAPTCHA', 'Abilita CAPTCHA');
define ( '_MI_SWIKI_USECAPTCHA_DESC', 'Mostra CAPTCHA sul form di modifica');
define ( '_MI_SWIKI_SHOWQUICKADD', 'Attiva la funzione Quick Add');
define ( '_MI_SWIKI_SHOWQUICKADD_DESC', 'Imposta <em> S&igrave; </ em> visualizza il campo Quick Add, permettendo agli editori di digitare un nome della pagina e andare direttamente alla modifica della pagina');
define ( '_MI_SWIKI_TOPPAGE', 'Pagina indice');
define ( '_MI_SWIKI_TOPPAGE_DESC', 'Pagina da visualizzare come pagina principale del modulo');
?>