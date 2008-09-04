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


define('_AM_WIWI_ADMIN_TXT','Administration du module');
define('_AM_WIWI_PAGESFILTER_TXT','Afficher les pages où ');
define('_AM_WIWI_LIKE_TXT','contient');
define('_AM_WIWI_PROFILEIS_TXT','est');
define('_AM_WIWI_ORDERBY_TXT',', classé par');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','pages trouvées');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','Modifiez un profil :');
define('_AM_WIWI_CREATEACL_TXT','ou créez-en un nouveau :');
define('_AM_WIWI_EDITACL_TXT','Informations sur le profil');
define('_AM_WIWI_ACLHELP_TXT','
	<P>Le système de contrôle d\'accès s\'appuie sur des "profils" nommés, qui énumèrent les groupes Xoops ayant le droit de lire/éditer/administrer les pages correspondantes.</P>
	<UL>
		<LI>Les&nbspéditeurs&nbsp;peuvent modifier la page affichée, et créer de nouvelles pages avec le même profil.</LI>
		<LI>Les administrateurs peuvent changer le profil de la page affichée, et lui affecter un autre profil pour lequel ils disposent également de droits d\'administration.</LI></UL>
	<P>Le profil par défaut des nouvelles pages est celui de la page à partir de laquelle elles ont été créées.</P>
	<P>Les profils déterminent également l\'accès aux commentaires. Cela est utile notamment pour permettre des commentaires privés sur des pages publiques.</P>
	<P>Note : Les webmasters Xoops ont un accès complet à toutes les pages.</P>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','CONFIRMATION DE SUPPRESSION');
define('_AM_WIWI_DELCONFIRM_TXT','Vous allez supprimer un profil. Veuillez confirmer ce choix en cochant la case ci-contre.');
define('_AM_WIWI_DELREDIR_TXT','Choisissez un nouveau profil pour les pages actuellement liées à celui-ci.');

define('_AM_WIWI_LISTPAGES_BTN','<< Retour à la liste de pages');
define('_AM_WIWI_CREATEACL_BTN','Nouveau');
define('_AM_WIWI_EDITACL_SAVE_BTN','Enregistrer');
define('_AM_WIWI_EDITACL_DELETE_BTN','Supprimer');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Annuler');
define('_AM_WIWI_CLEANUPDB_BTN','Purger la base documentaire');


define('_AM_WIWI_ACLNAME_FLD','Nom du profil');
define('_AM_WIWI_ACLDESC_FLD','Description');
define('_AM_WIWI_READERS_FLD','Groupes "simples lecteurs"');
define('_AM_WIWI_WRITERS_FLD','Groupes "éditeurs"');
define('_AM_WIWI_ADMINISTRATORS_FLD','Groupes "administrateurs"');
define('_AM_WIWI_COMMENTS_FLD','Qui peut lire/poster des commentaires :');
define('_AM_WIWI_HISTORY_FLD','Qui peut voir l\'historique des pages :');
define('_AM_WIWI_DELREDIR_FLD','Profil de remplacement :');

define('_AM_WIWI_SELECTACL_OPT','(choisissez)');
define('_AM_WIWI_READERS_OPT','Lecteurs');
define('_AM_WIWI_WRITERS_OPT','Editeurs');
define('_AM_WIWI_ADMINISTRATORS_OPT','Administrateurs');
define('_AM_WIWI_COMMENTS_NONE_OPT','(pas de commentaires)');
define('_AM_WIWI_HISTORY_NONE_OPT','(pas d\'historique)');
define('_AM_WIWI_DELCONFIRM_OPT','OUI, je veux effacer ce profil.');

define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','toutes les pages');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','nom');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','titre');
define('_AM_WIWI_LISTPAGES_BODY_OPT','contenu');
define('_AM_WIWI_LISTPAGES_UID_OPT','dernier auteur');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','parent');
define('_AM_WIWI_LISTPAGES_PRID_OPT','profil');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','modifiée');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','décroissant');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','croissant');

define('_AM_WIWI_LISTPAGE_NAV','pages');
define('_AM_WIWI_HISTORY_NAV','historique');
define('_AM_WIWI_ACLADMIN_NAV','privilèges (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "blocs et groupes");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Veuillez choisir une page');
define('_AM_WIWI_CONFIRMDEL_MSG','Souhaitez-vous vraiment supprimer cette page ?');
define('_AM_WIWI_CONFIRMFIX_MSG','Souhaitez-vous vraiment effacer les révisions antérieures à celle-ci ?');
define('_AM_WIWI_CONFIRMCLEAN_MSG','Souhaite-vous vraiment purger la base documentaire des anciennes révisions ?');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Profil enregistré avec succès');
define('_AM_WIWI_PRFSAVEFAILED_MSG','Echec lors de l\'enregistrement du profil');
define('_AM_WIWI_ERRDELETE_MSG','Erreur : impossible de supprimer le profil');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Profile effacé de la base de données.');
define('_AM_WIWI_PRFDELFAILED_MSG','Erreur lors de l\'effacement du profil.');

?>
