<?php
/**
 * Header file for admin area
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

include_once '../../../mainfile.php';
if (!defined('ICMS_URL')) {
	/* These are here for cross-platform compatibility */
	define('ICMS_URL', XOOPS_URL);
	define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);
}
include_once ICMS_ROOT_PATH . '/kernel/module.php';
include_once '../include/functions.php';
if (!defined('WIWI_NOCPFUNC')) include_once ICMS_ROOT_PATH . '/include/cp_functions.php';
$wikiModDir = basename(dirname(dirname(__FILE__)));

// language files
if (file_exists('../language/' . $xoopsConfig['language'] . '/modinfo.php')) {
    include_once '../language/' . $xoopsConfig['language'] . '/modinfo.php';
} else {
    include_once '../language/english/modinfo.php';
}

if (file_exists('../language/' . $xoopsConfig['language'] . '/admin.php')) {
    include_once '../language/' . $xoopsConfig['language'] . '/admin.php';
} else {
    include_once '../language/english/admin.php';
}

if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include_once '../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include_once '../language/english/main.php';
}

if ($xoopsUser) {
    $icmsModule = XoopsModule::getByDirname($wikiModDir);
    $xoopsModule =& $icmsModule;
    if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
        redirect_header(ICMS_URL . '/', 3, _NOPERM);
        exit();
    }
} else {
    redirect_header(ICMS_URL . '/', 3, _NOPERM);
    exit();
}

$myts = myTextSanitizer::getInstance();
