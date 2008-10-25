<?php
/**
 * remember listpage filters
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();
/** @todo properly validate and sanitize HTTP vars */
$post_selwhere = $post_text = $post_profile = $startlist = NULL;
$post_selorderby = 'keyword';
$post_selorderdir = 'ASC';

$allowed_postvars = array (
  'post_selwhere' => 'string',
  'post_text' => 'string',
  'post_profile' => 'int',
  'post_selorderby' => 'string',
  'post_selorderdir' => 'string');
$clean_POST = wiwi_cleanVars($_POST, $allowed_postvars);
extract($clean_POST);

$allowed_getvars = array (
  'startlist' => 'int');
$clean_GET = wiwi_cleanVars($_GET, $allowed_getvars);
extract($clean_GET);

	echo '<input type="hidden" name = "post_selwhere" value="'.$post_selwhere.'">';
	echo '<input type="hidden" name = "post_text" value="'.$post_text.'">';
	echo '<input type="hidden" name = "post_profile" value="'.$post_profile.'">';
	echo '<input type="hidden" name = "post_selorderby" value="'.$post_selorderby.'">';
	echo '<input type="hidden" name = "post_selorderdir" value="'.$post_selorderdir.'">';
	echo '<input type="hidden" name="startlist" value="'.$startlist.'">';
?>