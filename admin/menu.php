<?php
/**
 * Admin menu
 * 
 * @package modules::wiwimod
 * @author Xavier JIMENEZ
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

$adminmenu[1] = array(
     'title' => _MI_WIWIMOD_ADMENU1,
     'link'  => 'admin/index.php',
     'icon' => '', /* 32x32 px for options bar*/
     'small' => ''); /* 16x16 px for drop down */
$adminmenu[] = array (
     'title' => _MI_WIWIMOD_ADMENU2,
     'link'  => 'admin/acladmin.php',
     'icon' => '',
     'small' => '');
$adminmenu[] = array(
     'title' => _MI_WIWIMOD_ADMENU3,
     'link'  => 'admin/myblocksadmin.php',
     'icon' => '',
     'small' => '');
?>