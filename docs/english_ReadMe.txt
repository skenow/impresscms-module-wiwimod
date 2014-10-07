Wiwimod v0.8.3 (for Xoops2)
==========================

Wiwi is a wiki module for Xoops 2.x , offering smart editing features and a fine access control to the content. 
Use it as a "plain" wiki for collaborative documentation, or to build a web site with read_only and editable sections upon user privileges.

	Wiwi features :
	    * wysiwyg editing : see supported editors below
	    * Free links, CamelCase, Xoopscode support
	    * dynamic content : include any Xoops block within your content

	    * multiple page articles ( [pagebreak] feature )
	    * page hierarchy support
	    * Xoops comments
	    * Xoops notifications

	    * access privileges : based on content profiles and user group membership ;
	    * revisions history, with "diff" feature

	Wiwi adds 4 blocks to Xoops :
	    * TOC (Table Of Contents) : This block shows links to a subset of the available pages, filtered upon current visitor access privileges. 
	      This makes it easy to deliver custom access to different sections of your site.
	    * RECENT : shows quick links to the last modified documents ;
	    * SHOWPAGE : displays a wiwi page of your choice wherever you place this block (useful for home pages)
	    * SIDECONTENT : this is a smart block whom content depends on the Wiwi page that is currently displayed as "main content" of your Xoops Site. 
	      This is useful for example to display context sensitive advertisement, or "related links", or contextual help ...

	Wiwimod is derived from the Wikimod module code from Simon B�nzli (zeniko@gmx.ch) .

		================================
		NOTE ABOUT THE WYSIWYG EDITORS  :
		As from 0.8, the wysiwyg editors are external classes you have to install separately.
		The "enhanced" versions from earlier Wiwi packages are available at http://www.zonatim.com/downloads :
		They support direct upload of file attachments, images and flash animations (spaw and htmlarea editors).

		I have special expectation for the XoopsEditor project (http://dev.xoops.org/modules/xfmod/project/?htmlarea), 
		which provides a unified wysiwyg editors integration for Xoops. It currently interfaces spaw, htmlarea, fckeditor,
		koivi etc.
		================================

Upgrade from previous versions
==============================
* Copy this folder into Xoops' modules folder
* Update Wiwimod through the Module Administration
* if you're updating from a version earlier than 0.7, then display the "about" tab from wiwi administration panel, and click the [UPDATE] button.


New Installation
================
* Copy this folder into Xoops' modules folder
* Install Wiwimod through the Module Administration

* NOTE : if you'll be using default profile feature, you have to "initialize" the "default profile" list.
         This list is updated each time you save or delete a profile. So to initialize it the first time,
	 go to the "privileges" tab, select any profile and click "save".

	 DON'T FORGET TO INSTALL AN EDITOR PACKAGE if you want to use wysiwyg editing.


Usage
=====

>> see the file Manual.html, or the online help : http://www.zonatim.com/modules/wiwimod/index.php?page=WiwiManual


Revisions history :
===================

v0.8.3 :
--------
- enhancement : Added "change editor" feature in page edit form (right-click).
- enhancement : Added config option for Recent block : max number of items displayed.
- enhancement : Add config option to enable/disable CamelCase.
- enhancement : Added new tags to wiki syntax (thanks again to Gizmhail for his work) :
     1) [[PAGE page name]] inserts the content of a page within the current page (with privilege check);
     2) multi-level bulleted lists : starting a line with up to three stars (*) displays bulleted lists at the corresponding level
     3) added "._." tag that displays nothing : allows displaying reserved Wiki codes without them being interpreted (useful for online help on Wiwi for example)
- enhancement : Added Xoops notification support (on page updates).
- enhancement : the "cleanup db" button in Wiwi admin is back ; (thanks to Shine ;-) ).

- bugfix : slashes stripped in page links titles at display time (function wikilink() )
- bugfix : page name encoding issues in urls (thanks to Gizmhail) : "edit" buttons, history list, recent list, toc, redirections, etc.
- bugfix : lacking language constants ;


v0.8.2 :
--------
- enhancement : added free links support : page names no more are restricted to CamelCase ;
	Page names can include spaces, apostrophes, quotes, dots, etc... all except brackets indeed.
        Now, supported formats are :
	[[free link | title]] or [[free link]] ,
	[[CamelCase title]] or [[CamelCase]] or CamelCase
	[[www.externalsite.com title]] or [[www.externalsite.com]] or www.externalsite.com   
	
	The latter work because the editors do the replacement themselves, so the "real" parsed form is : [[<a ...> ... </a> | title]] 
	NOTICE : the former [[relative_url title]] tag does not work any more (usually used as [[?page=MyPage title]])
- enhancement : modified <[page index]> to show page titles instead of page names (shows page name if no title)
- enhancement : added portuguese (brazilian) locale (thanks to Rafael Sahb) ; updated nederlands locale (thanks to Shine)
- enhancement : creates a default HomePage page at install time, with some kick-start content.

- bugfix : while the "preferences" tab of wiwi admin was active, standard xoops admin menus were corrupted
- bugfix : added proper handling of &lt; and < in wiki parser (<PageIndex> didn't work on some configs)
- bugfix : solved issue with ' in page titles at edit time.
- bugfix : wiwiRecent block couldn't display if the only Wiwi block on a page
- bugfix : added lacking language locales and removed remaining "hardwired" constants

- cleanup : removed all constant assignments to smarty template variables ; used <{smarty.const.XXX}> instead.


v0.8.1 :
--------
- enhancement : added preference item for displaying CamelCase links with the page title instead of CamelCase page name.
- enhancement : added preference item for pdf button display in pages.
- enhancement : [pagebreak] feature ; this allows displaying long Wiwi pages in as many chunks as you like, with a navigation between them.
- enhancement : added slovenian locale (thanks to Sebastian Penko)
- enhancement : "Search engine friendly" : page title now in the html header "title"

- bugfix : multiple bugfixes on comment handling
- bugfix : language constants weren't defined within Wiwi blocks
- bugfix : XREF tag didn't work as from 0.8 ;
- bugfix : TOC block now shows pages ordered by "visible" value


v0.8 :
--------
- enhancement : PDF generation, grouping the current page and all other down-linked wiwi pages in a single pdf file.
                NOTE : PDF conversion isn't that good for now ... best results if you tie to "simple" pages without complex CSS .
- enhancement : "TOC" and "Recent" blocks content filtered according to user privileges (thanks to Lionel PERON for the hack) ;
		Search results filtered the same way.
- enhancement : default profile feature, in preferences panel
- enhancement : new administration panel, (more control on revisions, look'nfeel much alike that from the excellent SmartFAQ, integration 
		of the "myblockadmin" hack enabling centralized access to all blocks and group management)
- enhancement : added Dutch (nederland) locale (thanks to Marc de Mesel))
- enhancement : Editors externalized : Wiwi now uses XoopsWide editors classes, instead of supplying the editors within the module.
                check available editors and plugins here : www.zonatim.com/modules/mydownloads
- enhancement : "quiet save" button, to save "minor" changes without creating a new revision.
- enhancement : "diff" function within history page, to compare selected revision with the most uptodate page.
		This function is adapted from Wikimod 0.98 (courtesy of Simon B�nzli, and Raphael Kirschke as the original diff algorithm author) 
- enhancement : escape "tilde ~" character to prevent CamelCase being interpreted within pages.

- bugfix : fixed wrong initialization in load() method of wiwiProfile class that lead to wrong privileges on successive invocations.
- bugfix : page profile was lost when page updated by user with write privilege but no admin privilege
- bugfix : general check upon slashes, quotes or newlines processing (the latter lead to sort of unpredictible vertical spacing)

- cleanup : wiki functionnality wrapped in a class, general code review for language and headers includes, replacement of the "common" directory 
	    with a more standard "include", language files clean-up ...

v0.7.1 :
--------
- enhancement : history button, visible if page profile allows it for the current user. The restore option is open to people with admin rights on the current page.
- enhancement : xoopsCodes support, and possibility to select standart xoops editor instead of a Wysiwyg one. (;-) YES, this is an enhancement)
- bugfix : the preview button is back, and operates correctly with all editors.
- bugfix : quotes within pages caused database errors (bug was introduced in 0.7 version);
- bugfix : wouldn't update nor create profiles

v0.7 :
------
- enhancement : added "wiwi profile" feature, to control page access privileges :
                Profiles list groups allowed to read/write/administrate wiwi pages, and enables/disables comments for related pages.
		WARNING : older related preferences items were removed.
- enhancement : added ((XBLK xxx] tag, to insert any Xoops Block in a Wiwi page. (xxx can be either the block title or id)
- enhancement : default value for "parent" field at page creation.
- enhancement : new block "WiwiShowPage" displays a selected wiwi page.

- bugfix : updated language files
- bugfix : updated "update.php" script (no more warnings if run twice ..)
- bugfix : comments no more disappear when modifying a page (now attached to the page name, not a particular revision)
- bugfix : no more "notices" in php debug mode.


v0.6 :
------
- enhancement : MOZILLA, Firefox, etc. wysiwyg edit support, through HTMLArea editor integration
- enhancement : added "insert flash" button in the editor (.swf files)
- enhancement : added a "Parent" field to pages in edit mode ; in view mode, display links to parent pages ("navigation" bar).
- enhancement : added a "context sensitive block". Specify, within each Wiwi page, which existing xoops block should be displayed in the context sensitive block.

- bugfix : wiwi blocks wouldn't display in top page (except whith main menu visible)
- bugfix : corrected "cannot redeclare ..." when Wiwimod was the default Xoops module and 'wiwi_recent' block was displayed.
- bugfix : images upload did'nt work properly if no Xoops image library had been initialized.
- bugfix : security gap correction
- bugfix : pages wouldn't display in edit mode with SPAW and non IE browsers (plain old Xoops DHTMLArea)

v0.5 :
------
- enhancement : Camelcase text converted to Wiwi links automatically, and other wiki-code implementation
	(bold, italic, header, link, horiz line, line break, img urls)
- enhancement : Preferences : edit permissions (anonymous users or a specific group).
- enhancement : spanish localization

- bugfix : (?) appeared only once if more than one link to Wiwi pages on the same line.
- bugfix : the spaw editor now works with non root ("www.mydomain.com/") Xoops location.

v0.4
------
- added file upload functionnality.

v0.3
------
- added two blocks : "TOC" (links to selected pages) and "Recent" (recently modified pages)

v0.2
------
- Corrected bug (comments were lost after page modification)

v0.1
------
* Initial release, based on wikiMod rev 0.96




Limitations, bugs and todos :
=============================

Bugs and limitations :
- cancel edit button doesn't work on Firefox, except after page preview (!!!)

Future or studied features :
- save without publish + personal "unpublished pages" block (registered users only) + delete unpublished.
- referrers list
- "recently modified" sign on links.
- multilingual pages
- enhancement of TOC block : treeview
- admin : change multiple pages from their current profile to a new one
- printer friendly view

Other :
- enhance the manual



License Notes
-------------
Wiwimod is FREE SOFTWARE; you can redistribute it and/or modify it under
the terms of the GNU General Public License (version 2) as published by the
Free Software Foundation.

This module is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of merchantability or
fitness for a particular purpose. See the GNU General Public License for
more details.


Contact
-------
For comments, bug reports and suggestions, visit Wiwi's home page at www.zonatim.com, 
or write to: Xavier JIMENEZ <xjimenez@zonatim.com>.


Contributors
------------
Thanks to :
   Simon B�nzli, original wikimod module author, for his continuous support ;
   Locales : Andreas Thewes (german), Shine and Marc de Mesel (nederlands), Sebastjan Penko (slovenian), Rafael Sahb (portuguese)
   and all Wiwi contributors that bring their hacks and suggestions in the forums.

