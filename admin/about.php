<?php
/**
 * About SimplyWiki, the wysiwyg wiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version
 */
/**
 * Include the admin header for SimplyWiki
 */
include 'admin_header.php';

icms_cp_header();
if (is_object(icms::$module) && method_exists(icms::$module, 'displayAdminMenu')) {
	echo icms::$module->displayAdminMenu(4, 'about');
} else {
	echo getAdminMenu(4, 'about');
}
echo _MI_SWIKI_AUTHOR_WORD;
echo '<br>' . _VERSION . ': ' . $wikiModule->getVar('version') . ' ' . $wikiModule->getInfo('status');
icms_cp_footer();
