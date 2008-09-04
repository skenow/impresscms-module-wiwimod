<?php
// $Id$
// Module Info

// The name of this module
define('_MI_WIWIMOD_NAME','Wiwi');

// A brief description of this module
define('_MI_WIWIMOD_DESC','Un wiki wysiwyg.');

// Admin menu
define('_MI_WIWIMOD_ADMENU1','Pages');
define('_MI_WIWIMOD_ADMENU2','Privilèges');
define('_MI_WIWIMOD_ADMENU3','Blocs et Groupes');
define('_MI_WIWIMOD_ADMENU4','A Propos...');

// Admin options
define('_MI_WIWIMOD_EDITOR','Quel éditeur utiliser');
define('_MI_WIWIMOD_EDITOR_DESC','');
define('_MI_WIWIMOD_DEFAULTPROFILE','Profil par défaut');

define('_MI_WIWIMOD_ALLOWPDF','Afficher le bouton PDF ?');
define('_MI_WIWIMOD_ALLOWPDF_DESC','La génération de fichiers PDF à partir de wiwi est encore au stade experimental.');

define('_MI_WIWIMOD_SHOWTITLES','Afficher le titre des pages au lieu de leur nom ');
define('_MI_WIWIMOD_SHOWTITLES_DESC','Concerne les liens automatiques créés en CamelCase dans le corps des pages');

define('_MI_WIWIMOD_USECAMELCASE','Activer la syntaxe CamelCase');
define('_MI_WIWIMOD_USECAMELCASE_DESC','Interprète les mots en syntaxe CamelCase comme des liens vers d\'autres pages du wiki.');

define('_MI_WIWIMOD_XOOPSEDITOR','Choisissez un éditeur (package "XoopsEditor") ');
define('_MI_WIWIMOD_XOOPSEDITOR_DESC','Cette option est utile si vous choisissez le package XoopsEditor');

// Notification options
define('_MI_WIWIMOD_PAGENOTIFYCAT_TITLE','Page');
define('_MI_WIWIMOD_PAGENOTIFYCAT_DESC','Notifications concernant la page courante');
define('_MI_WIWIMOD_PAGENOTIFY_TITLE','Page mise à jour');
define('_MI_WIWIMOD_PAGENOTIFY_CAPTION','Notifiez-moi quand la page courante est mise à jour');
define('_MI_WIWIMOD_PAGENOTIFY_DESC','Recevez une notification chaque fois qu\'un utilisateur met à jour cette page.');
define('_MI_WIWIMOD_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} - page mise à jour (notification automatique) ');

?>
