<?php
/**
 * remember listpage filters
 * 
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id: listpages_hidden.inc.php 21010 2011-03-11 00:57:44Z skenow $  
 */
if (!defined('ICMS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

$post_selwhere = $post_text = $post_profile = $startlist = NULL;
$post_selorderby = 'keyword';
$post_selorderdir = 'ASC';

$allowed_postvars = array (
  'post_selwhere' => 'plaintext',
  'post_text' => 'plaintext',
  'post_profile' => 'int',
  'post_selorderby' => 'plaintext',
  'post_selorderdir' => 'plaintext');
$clean_POST = swiki_cleanVars($_POST, $allowed_postvars);
extract($clean_POST);

$allowed_getvars = array (
  'startlist' => 'int');
$clean_GET = swiki_cleanVars($_GET, $allowed_getvars);
extract($clean_GET);

	echo '<input type="hidden" name = "post_selwhere" value="' . $post_selwhere . '">'
	. '<input type="hidden" name = "post_text" value="' . $post_text . '">'
	. '<input type="hidden" name = "post_profile" value="' . $post_profile . '">'
	. '<input type="hidden" name = "post_selorderby" value="' . $post_selorderby . '">'
	. '<input type="hidden" name = "post_selorderdir" value="' . $post_selorderdir . '">'
	. '<input type="hidden" name="startlist" value="' . $startlist . '">';
