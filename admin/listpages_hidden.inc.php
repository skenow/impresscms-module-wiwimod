<?php
/**
 * remember listpage filters
 * 
 * @package modules::wiwimod
 * @author Xavier JIMENEZ
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

/** @todo properly validate and sanitize HTTP vars */
	$post_selwhere = (isset($_POST['post_selwhere']))?$_POST['post_selwhere']:"";
	$post_text = (isset($_POST['post_text']))?$_POST['post_text']:"";
	$post_profile = (isset($_POST['post_profile']))?intval($_POST['post_profile']):0;
	$post_selorderby = (isset($_POST['post_selorderby']))?$_POST['post_selorderby']:"keyword";
	$post_selorderdir = (isset($_POST['post_selorderdir']))?$_POST['post_selorderdir']:"ASC";
	$startlist = isset( $_POST['startlist'] ) ? intval( $_POST['startlist'] ) : 0; 
	echo '<input type="hidden" name = "post_selwhere" value="'.$post_selwhere.'">';
	echo '<input type="hidden" name = "post_text" value="'.$post_text.'">';
	echo '<input type="hidden" name = "post_profile" value="'.$post_profile.'">';
	echo '<input type="hidden" name = "post_selorderby" value="'.$post_selorderby.'">';
	echo '<input type="hidden" name = "post_selorderdir" value="'.$post_selorderdir.'">';
	echo '<input type="hidden" name="startlist" value="'.$startlist.'">';
?>