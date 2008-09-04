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
 //Dutch translation by Shine


define('_AM_WIWI_ADMIN_TXT','Module Administratie');
define('_AM_WIWI_PAGESFILTER_TXT','Toon pagina\'s op');
define('_AM_WIWI_LIKE_TXT','met het woord');
define('_AM_WIWI_PROFILEIS_TXT','is');
define('_AM_WIWI_ORDERBY_TXT',' en sorteer ze op');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','resultaten');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','bewerk een Wiwi profiel:');
define('_AM_WIWI_CREATEACL_TXT','of creër een nieuw profiel:');
define('_AM_WIWI_EDITACL_TXT','Profiel info');
define('_AM_WIWI_ACLHELP_TXT','
	<P>Wiwi profielen zijn standaard wiwi pagina keuze instellingen waarmee je aangeeft welke pagina toegangs-/lees-/schrijf- en bewerk privileges toegekend krijgt. Je XOOPS-groep(en) ken je lees-/schrijf-/administratie rechten toe mbt de betreffende wiwi pagina\'s.</P>
	<UL>
	<LI> LEZERS toegang: kunnen de pagina alleen lezen.
		<LI>SCHRIJVERS toegang: kunnen de pagina\'s bewerken en een nieuwe pagina met datzelfde profiel aanmaken.</LI>
		<LI>ADMINISTRATORS toegang: kunnen profielen veranderen/aanpassen naar ieder ander gewenst profiel waarvoor ze "admin" rechten.</LI></UL>
	<P>Nieuwe pagina\'s behoren standaard tot de "ouders" hun profiel.</P>
	<P>Het profiel bepaalt ook wie commenta(a)r(en) mag lezen en schrijven. Dit kan handig zijn indien je privé-commenta(a)r(e)n wilt toe laten op publieke pagina\'s...</P>
	<P>ATTENTIE: Xoops WEBMASTERS hebben altijd àlle privileges op iedere wiwi pagina.</P>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','BEVESTIG VERWIJDEREN VAN PROFIEL');
define('_AM_WIWI_DELCONFIRM_TXT','U gaat een profiel verwijderen. Bevestig dit verzoek door de checkbox aan te vinken.');
define('_AM_WIWI_DELREDIR_TXT','Kies een nieuw profiel voor de pagina\'s die aan dit profiel gelinkt waren.');

define('_AM_WIWI_LISTPAGES_BTN','<< Terug naar pagina\'s lijst');
define('_AM_WIWI_CREATEACL_BTN','Nieuw');
define('_AM_WIWI_EDITACL_SAVE_BTN','Opslaan');
define('_AM_WIWI_EDITACL_DELETE_BTN','Verwijderen');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Annuleer');
define('_AM_WIWI_CLEANUPDB_BTN','Schoon de database op');


define('_AM_WIWI_ACLNAME_FLD','Naam Profiel');
define('_AM_WIWI_ACLDESC_FLD','Profiel beschrijving');
define('_AM_WIWI_READERS_FLD','Groepen met Lees-toegang (LEZERS)');
define('_AM_WIWI_WRITERS_FLD','Groepen met Schrijf-toegang (SCHRIJVERS)');
define('_AM_WIWI_ADMINISTRATORS_FLD','Groepen met Administratie toegang (ADMINISTRATORS)');
define('_AM_WIWI_COMMENTS_FLD','Wie mogen commenta(a)r(en) lezen/schrijven:');
define('_AM_WIWI_HISTORY_FLD','Wie heeft toegang tot de geschiedenis van de pagina revisies:');
define('_AM_WIWI_DELREDIR_FLD','Profiel vervangen:');

define('_AM_WIWI_SELECTACL_OPT','(selecteer)');
define('_AM_WIWI_READERS_OPT','Lezers');
define('_AM_WIWI_WRITERS_OPT','Schrijvers');
define('_AM_WIWI_ADMINISTRATORS_OPT','Administrators');
define('_AM_WIWI_COMMENTS_NONE_OPT','(geen commenta(a)r(en)');
define('_AM_WIWI_HISTORY_NONE_OPT','(geen geschiedenis)');
define('_AM_WIWI_DELCONFIRM_OPT','JA, ik wil dit profiel verwijderen.');

define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','alle pagina\'s');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','naam');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','titel');
define('_AM_WIWI_LISTPAGES_BODY_OPT','content');
define('_AM_WIWI_LISTPAGES_UID_OPT','laatste auteur');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','ouder');
define('_AM_WIWI_LISTPAGES_PRID_OPT','profiel');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','laatste bewerking');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','aflopend');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','oplopend');

define('_AM_WIWI_LISTPAGE_NAV','navigeer door pagina\'s ');
define('_AM_WIWI_HISTORY_NAV','geschiedenis');
define('_AM_WIWI_ACLADMIN_NAV','Toegangsprivileges (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "blocks en groepen");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Selecteer aub een pagina');
define('_AM_WIWI_CONFIRMDEL_MSG','Weet u zeker dat u deze wiwi pagina wilt verwijderen?');
define('_AM_WIWI_CONFIRMFIX_MSG','Weet u zeker dat u deze wiwi pagina wilt repareren?');
define('_AM_WIWI_CONFIRMCLEAN_MSG','Weet u zeker dat u de wiwi database wilt opschonen?');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Het profiel is succesvol in de database opgeslagen ');
define('_AM_WIWI_PRFSAVEFAILED_MSG','FOUT: Het is niet gelukt om dit profiel op te slaan ');
define('_AM_WIWI_ERRDELETE_MSG','FOUT: het is niet mogelijk om dit profiel te verwijderen');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Het profiel is succesvol uit de database verwijderd');
define('_AM_WIWI_PRFDELFAILED_MSG','FOUT: Er is een fout opgetreden tijdens het opslaan van dit profiel. Het opslaan van dit profiel is niet gelukt!');

?>