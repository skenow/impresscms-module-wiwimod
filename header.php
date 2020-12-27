<?php
/**
 * Main header file of SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version 
 */

/*
 * Be sure mainfile has been included
 */
include_once '../../mainfile.php';

$myts = icms_core_Textsanitizer::getInstance();

global $wikiModDir;
$wikiModDir = basename(__DIR__);
$modversion['dirname'] = $wikiModDir;

include_once ICMS_MODULES_PATH . '/' . $wikiModDir . '/include/functions.php';
