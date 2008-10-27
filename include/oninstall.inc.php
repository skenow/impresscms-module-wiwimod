<?php
/**
 * Custom installation functions
 *  
 * This file is loaded and executed at the end of the module install process. You can use it to insert data, for example,
 * and  use language constants for internationalization (i18n) and localization (l10n)
 *  
 * @package Wiwimod
*
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
 if (!defined("XOOPS_ROOT_PATH") && !defined('ICMS_ROOT_PATH')) die('Root path not defined');
 
function xoops_module_install_wiwimod (){ 
 $mydir = dirname(dirname(__FILE__));
 global $xoopsConfig;

 if (@file_exists($mydir.'/language/'.$xoopsConfig['language'].'/install.php')){
      include $mydir.'/language/'.$xoopsConfig['language'].'/install.php';
 } else {
      include $mydir.'/language/english/install.php';
 }

/* Add default profiles */ 
 include_once $mydir.'/class/wiwiProfile.class.php';
 $prof = new WiwiProfile();
 $prof->name = _MI_WIWIMOD_PROFILE1;
 $prof->prid = 0;
 $prof->readers = array('1','2','3');
 $prof->writers = array('1','2','3');
 $prof->administrators = array('1','2','3');
 $prof->commentslevel = 1;
 $prof->historylevel = 1;
 $prof->store();
  
 $prof->name = _MI_WIWIMOD_PROFILE2;
 $prof->prid = 0;
 $prof->readers = array('1','2','3');
 $prof->writers = array('1','2');
 $prof->administrators = array('1');
 $prof->commentslevel = 1;
 $prof->historylevel = 1;
 $prof->store();

 $prof->name = _MI_WIWIMOD_PROFILE3;
 $prof->prid = 0;
 $prof->readers = array('1','2');
 $prof->writers = array('1','2');
 $prof->administrators = array(1);
 $prof->commentslevel = 1;
 $prof->historylevel = 1;
 $prof->store();
/* Update the Preferences option with default profiles */
 $prof->updateModuleConfig();
 
/* add the default home page here */
  include_once $mydir.'/class/wiwiRevision.class.php';
  $page = new WiwiRevision();
  $page->keyword = _MI_WIWIMOD_WIWIHOME;
  $page->title = _MI_WIWIMOD_WIWIHOME_TITLE;
  $page->body = _MI_WIWIMOD_WIWIHOME_TEXT;
  //$page->lastmodified is determined by the current date/time, no need to set here
  //$page->u_id is determined by the logged in user, no need to set here
  $page->parent = '';		
  $page->visible = '';		
  $page->contextBlock = '';	
  $page->pageid = '1';		
  $page->profile->prid = '1';		
	
  $page->add();
  
  return true;
 } 
/* This will create a function with a name based on the installation directory, if it is not in wiwimod */
$myInstallDir = basename(dirname(dirname(__FILE__)));
if (!function_exists('xoops_module_install_'.$myInstallDir)) {
 $myfunc = "function xoops_module_install_".$myInstallDir."() { return xoops_module_install_wiwimod();}";
 eval($myfunc);
}
?>
