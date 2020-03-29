<?php
/**
 * Admin menu
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

$adminmenu[1] = array(
     'title' => _MI_SWIKI_ADMENU1,
     'link'  => 'admin/index.php',
     'icon' => 'images/pages.png', /* 32x32 px for options bar (tabs) */
     'small' => 'images/pages_small.png'); /* 16x16 px for drop down */
$adminmenu[] = array (
     'title' => _MI_SWIKI_ADMENU2,
     'link'  => 'admin/acladmin.php',
     'icon' => 'images/password2.png',
     'small' => 'images/password2_small.png');
$adminmenu[] = array(
     'title' => _MI_SWIKI_ADMENU4,
     'link'  => 'admin/about.php',
     'icon' => 'images/about.png',
     'small' => 'images/about_small.png');
$adminmenu[] = array(
     'title' => _MI_SWIKI_ADMENU5,
     'link'  => 'admin/help.php',
     'icon' => 'images/help.png',
     'small' => 'images/help_small.png');

$wikiModDir = basename(dirname(__DIR__));
if (isset(icms::$module)) {
	$headermenu[0] = array(
	     'title' => _PREFERENCES,
	     'link'  => ICMS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . icms::$module->getVar('mid'),
	);
	
/* cross platform issues on the latest version; not addressing the language translations here */
defined('_AM_SWIKI_GOTO_MODULE')
	|| include_once ICMS_ROOT_PATH . "/modules/" . $wikiModDir . "/language/english/admin.php";
	$headermenu[] = array(
		'title' => _AM_SWIKI_GOTO_MODULE,
		'link'  => ICMS_URL . "/modules/" . $wikiModDir,
	);
	$headermenu[] = array(
		'title' => _AM_SWIKI_UPDATE_MODULE,
		'link'  => ICMS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $wikiModDir,
	);
}