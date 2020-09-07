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
define('_AM_SWIKI_ADMIN_TXT', 'Module administration');
define('_AM_SWIKI_PAGESFILTER_TXT', 'Show pages where');
define('_AM_SWIKI_LIKE_TXT', 'contains');
define('_AM_SWIKI_PROFILEIS_TXT', 'is');
define('_AM_SWIKI_ORDERBY_TXT', ', ordered by');
define('_AM_SWIKI_LISTPAGES_RESULTS_TXT', 'results');

define('_AM_SWIKI_SELECTACL_BOX', '');
define('_AM_SWIKI_SELECTACL_TXT', 'modify a profile :');
define('_AM_SWIKI_CREATEACL_TXT', 'or create a new one :');
define('_AM_SWIKI_EDITACL_TXT', 'Profile info');
define('_AM_SWIKI_ACLHELP_TXT', '
	<p>Privileges are a set of named profiles describing groups that eventually have read/write/administer access to corresponding pages.</p>
	<ul>
		<li>Writers&nbsp;can modify the current page, and create new pages with the same profile.</li>
		<li>Administrators&nbsp;can change page profiles to whichever profiles they have "admin" privilege for.</li></ul>
	<p>New pages default to their parent\'s profile.</p>
	<p>Profiles also define who can read/post comments. This is useful to allow private comments on public pages ...</p>
	<p>Note : Webmasters always have full privileges to pages.</p>
	');
define('_AM_SWIKI_DELCONFIRMTITLE_TXT', 'DELETE PROFILE CONFIRMATION');
define('_AM_SWIKI_DELCONFIRM_TXT', 'You are about to delete a profile. Please confirm by checking the checkbox.');
define('_AM_SWIKI_DELREDIR_TXT', 'Choose a new profile for pages that were attached to this one.');

define('_AM_SWIKI_LISTPAGES_BTN', '<< Back to pages list');
define('_AM_SWIKI_CREATEACL_BTN', 'New');
define('_AM_SWIKI_EDITACL_SAVE_BTN', 'Save');
define('_AM_SWIKI_EDITACL_DELETE_BTN', 'Delete');
define('_AM_SWIKI_EDITACL_CANCEL_BTN', 'Cancel');
define('_AM_SWIKI_CLEANUPDB_BTN', 'Clean up the database');

define('_AM_SWIKI_ACLNAME_FLD', 'Profile name');
define('_AM_SWIKI_ACLDESC_FLD', 'Profile Description');
define('_AM_SWIKI_READERS_FLD', 'Groups with read access');
define('_AM_SWIKI_WRITERS_FLD', 'Groups with write access');
define('_AM_SWIKI_ADMINISTRATORS_FLD', 'Groups with admin access');
define('_AM_SWIKI_COMMENTS_FLD', 'Who can read/post comments :');
define('_AM_SWIKI_HISTORY_FLD', 'Who can access page revisions history :');
define('_AM_SWIKI_DELREDIR_FLD', 'Replacement profile :');

define('_AM_SWIKI_SELECTACL_OPT', '(select)');
define('_AM_SWIKI_READERS_OPT', 'Readers');
define('_AM_SWIKI_WRITERS_OPT', 'Writers');
define('_AM_SWIKI_ADMINISTRATORS_OPT', 'Administrators');
define('_AM_SWIKI_COMMENTS_NONE_OPT', '(no comments)');
define('_AM_SWIKI_HISTORY_NONE_OPT', '(no history)');
define('_AM_SWIKI_DELCONFIRM_OPT', 'YES, I want to delete this profile.');

define('_AM_SWIKI_LISTPAGES_ALLPAGES_OPT', 'all pages');
define('_AM_SWIKI_LISTPAGES_KEYWORD_OPT', 'name');
define('_AM_SWIKI_LISTPAGES_TITLE_OPT', 'title');
define('_AM_SWIKI_LISTPAGES_BODY_OPT', 'content');
define('_AM_SWIKI_LISTPAGES_UID_OPT', 'last author');
define('_AM_SWIKI_LISTPAGES_PARENT_OPT', 'parent');
define('_AM_SWIKI_LISTPAGES_PRID_OPT', 'profile');
define('_AM_SWIKI_LISTPAGES_LASTMODIFIED_OPT', 'last modified');
define('_AM_SWIKI_LISTPAGES_ORDERDESC_OPT', 'descending');
define('_AM_SWIKI_LISTPAGES_ORDERASC_OPT', 'ascending');

define('_AM_SWIKI_LISTPAGE_NAV', 'browse pages');
define('_AM_SWIKI_HISTORY_NAV', 'history');
define('_AM_SWIKI_ACLADMIN_NAV', 'privileges (ACL)');
define("_AM_SWIKI_BLOCKSNGROUPS_NAV", "blocks and groups");

define('_AM_SWIKI_NOPAGESPECIFIED_MSG', 'Please select a page');
define('_AM_SWIKI_CONFIRMDEL_MSG', 'Do you really want to delete this page?');
define('_AM_SWIKI_CONFIRMFIX_MSG', 'Do you really want to fix this page?');
define('_AM_SWIKI_CONFIRMCLEAN_MSG', 'Do you really want to clean up the database?');
define('_AM_SWIKI_PRFSAVESUCCESS_MSG', 'Profile successfully saved on database');
define('_AM_SWIKI_PRFSAVEFAILED_MSG', 'Error while storing profile. Database NOT updated');
define('_AM_SWIKI_ERRDELETE_MSG', 'Error : unable to delete profile');
define('_AM_SWIKI_PRFDELSUCCESS_MSG', 'Profile deleted from the database.');
define('_AM_SWIKI_PRFDELFAILED_MSG', 'Error while deleting profile. Database NOT updated');
define('_AM_SWIKI_SYS_CFG', 'System Configuration');

// added in version 1.2
define('_AM_SWIKI_GOTO_MODULE', 'Go to module');
define('_AM_SWIKI_UPDATE_MODULE', 'Update module');

// added in version 2.0
define('_AM_SWIKI_HELP', 'Visit the community support page at <a href="https://www.impresscms.org/" target="_blank">ImpressCMS Community Forums</a> for support or to get help. You can read the <a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=\'_blank\'>manual</a> online.');

