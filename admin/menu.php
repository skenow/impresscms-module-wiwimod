<?php
/**
 * Admin menu
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

$adminmenu[1] = array(
     'title' => _MI_WIWIMOD_ADMENU1,
     'link'  => 'admin/index.php',
     'icon' => 'images/pages.png', /* 32x32 px for options bar (tabs) */
     'small' => 'images/pages_small.png'); /* 16x16 px for drop down */
$adminmenu[] = array (
     'title' => _MI_WIWIMOD_ADMENU2,
     'link'  => 'admin/acladmin.php',
     'icon' => 'images/password2.png',
     'small' => 'images/password2_small.png');
$adminmenu[] = array(
     'title' => _MI_WIWIMOD_ADMENU3,
     'link'  => 'admin/myblocksadmin.php',
     'icon' => 'images/blocksgroups.png',
     'small' => 'images/blocksgroups_small.png');
?>