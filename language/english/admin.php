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


define('_AM_WIWI_ADMIN_TXT','Module administration');
define('_AM_WIWI_PAGESFILTER_TXT','Show pages where');
define('_AM_WIWI_LIKE_TXT','contains');
define('_AM_WIWI_PROFILEIS_TXT','is');
define('_AM_WIWI_ORDERBY_TXT',', ordered by');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','results');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','modify a profile :');
define('_AM_WIWI_CREATEACL_TXT','or create a new one :');
define('_AM_WIWI_EDITACL_TXT','Profile info');
define('_AM_WIWI_ACLHELP_TXT','
	<p>Wiwi privileges are a set of named profiles describing xoops groups that enventually have read/write/administrate access to corresponding pages.</p>
	<ul>
		<li>Writers&nbsp;can modify the current page, and create new pages with the same profile.</li>
		<li>Administrators&nbsp;can change page profiles to whichever profiles they have "admin" privilege for.</li></ul>
	<p>New pages default to their parent\'s profile.</p>
	<p>Profile also define who can read/post comments. This is useful to allow private comments on public pages ...</p>
	<p>Note : Xoops webmasters allways have full privileges to Wiwi pages.</p>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','DELETE PROFILE CONFIRMATION');
define('_AM_WIWI_DELCONFIRM_TXT','You are about to delete a profile. Please confirm checking the checkbox.');
define('_AM_WIWI_DELREDIR_TXT','Choose a new profile for pages that were attached to this one.');

define('_AM_WIWI_LISTPAGES_BTN','<< Back to pages list');
define('_AM_WIWI_CREATEACL_BTN','New');
define('_AM_WIWI_EDITACL_SAVE_BTN','Save');
define('_AM_WIWI_EDITACL_DELETE_BTN','Delete');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Cancel');
define('_AM_WIWI_CLEANUPDB_BTN','Clean up the database');


define('_AM_WIWI_ACLNAME_FLD','Profile name');
define('_AM_WIWI_ACLDESC_FLD','Profile Description');
define('_AM_WIWI_READERS_FLD','Groups with read access');
define('_AM_WIWI_WRITERS_FLD','Groups with write access');
define('_AM_WIWI_ADMINISTRATORS_FLD','Groups with admin access');
define('_AM_WIWI_COMMENTS_FLD','Who can read/post comments :');
define('_AM_WIWI_HISTORY_FLD','Who can access page revisions history :');
define('_AM_WIWI_DELREDIR_FLD','Replacement profile :');

define('_AM_WIWI_SELECTACL_OPT','(select)');
define('_AM_WIWI_READERS_OPT','Readers');
define('_AM_WIWI_WRITERS_OPT','Writers');
define('_AM_WIWI_ADMINISTRATORS_OPT','Administrators');
define('_AM_WIWI_COMMENTS_NONE_OPT','(no comments)');
define('_AM_WIWI_HISTORY_NONE_OPT','(no history)');
define('_AM_WIWI_DELCONFIRM_OPT','YES, i want to delete this profile.');

define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','all pages');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','name');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','title');
define('_AM_WIWI_LISTPAGES_BODY_OPT','content');
define('_AM_WIWI_LISTPAGES_UID_OPT','last author');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','parent');
define('_AM_WIWI_LISTPAGES_PRID_OPT','profile');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','last modified');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','descending');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','ascending');

define('_AM_WIWI_LISTPAGE_NAV','browse pages');
define('_AM_WIWI_HISTORY_NAV','history');
define('_AM_WIWI_ACLADMIN_NAV','privileges (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "blocks and groups");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Please select a page');
define('_AM_WIWI_CONFIRMDEL_MSG','Do you really want to delete this Wiwi page');
define('_AM_WIWI_CONFIRMFIX_MSG','Do you really want to fix this Wiwi page');
define('_AM_WIWI_CONFIRMCLEAN_MSG','Do you really want to clean up the database');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Profile successfully saved on database');
define('_AM_WIWI_PRFSAVEFAILED_MSG','Error while storing profile. Database NOT updated');
define('_AM_WIWI_ERRDELETE_MSG','Error : unable to delete profile');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Profile deleted from the database.');
define('_AM_WIWI_PRFDELFAILED_MSG','Error while deleting profile. Database NOT updated');




?>
