<?php
/**
 * About SimplyWiki, the wysiwyg wiki
 * 
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
/** Include the admin header for SimplyWiki */   
include 'admin_header.php';

xoops_cp_header();
echo getAdminMenu (4,'about');
echo _MI_SWIKI_AUTHOR_WORD;

xoops_cp_footer();
