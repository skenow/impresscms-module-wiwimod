<?php
/**
 * About wiwimod, the wysiwyg wiki
 * 
 * @package modules::wiwimod
 * @author Xavier JIMENEZ
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
/** Include the admin header for wiwimod */   
include 'admin_header.php';

$op = (isset($_GET['op']))?$_GET['op']:'';

xoops_cp_header();
echo getAdminMenu (4,'about');

switch ($op) {
	default :
		echo '<h4>About Wiwi 0.8.3</h4><br />';
		echo 'Wiwi is GPL software ; visit Wiwi home page at <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">www.zonatim.com</a> to support or get help.<br /><br />';
		echo 'If you\'ve just migrated from an older Wiwi version (0.7.1 or less), please click here : <input type="button" value="UPGRADE" onclick="document.location.href=\''.XOOPS_URL.'/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/update.php\';">';
		echo "<br /><br /><a href='../manual.html' target='_blank'>Read the Manual</a> and <a href='../ReadMe.txt' target='_blank'>release notes</a> to get started.";
		break;

}
xoops_cp_footer();

?>