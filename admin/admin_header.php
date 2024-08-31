<?php
/**
 * Header file for admin area
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version
 */

include_once '../../../mainfile.php';

include_once '../include/functions.php';
if (!defined('WIWI_NOCPFUNC')) include_once ICMS_ROOT_PATH . '/include/cp_functions.php';
$wikiModDir = basename(dirname(__DIR__));

// language files
$langfiles = array('modinfo', 'admin', 'main');
foreach ($langfiles as $langfile) {
	icms_loadLanguageFile($wikiModDir, $langfile);
}

if (icms::$user) {
	$wikiModule = icms::handler('icms_module')->getByDirname($wikiModDir);
	if (!icms::$user->isAdmin($wikiModule->getVar('mid'))) {
		redirect_header(ICMS_URL . '/', 3, _NOPERM);
		exit();
	}
} else {
	redirect_header(ICMS_URL . '/', 3, _NOPERM);
	exit();
}

$myts = icms_core_Textsanitizer::getInstance();
