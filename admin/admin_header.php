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
	if (function_exists('icms_loadLanguageFile')) {
		icms_loadLanguageFile($wikiModDir, $langfile);
	} else {
		$langfile = $langfile . '.php';
		if (file_exists('../language/' . $icmsConfig['language'] . '/' . $langfile)) {
			include_once '../language/' . $icmsConfig['language'] . '/' . $langfile;
		} else {
			include_once '../language/english/' . $langfile;
		}
	}
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
