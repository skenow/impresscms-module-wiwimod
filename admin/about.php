<?php
include "admin_header.php";

$op = (isset($HTTP_GET_VARS['op']))?$HTTP_GET_VARS['op']:"";

xoops_cp_header();
echo getAdminMenu (4,'about');


switch ($op) {
	default :
		echo '<h4>About Wiwi 0.8.3</H4><br />';
		echo 'Wiwi is GPL software ; visit Wiwi home page at <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">www.zonatim.com</a> to support or get help.<br /><br />';
		echo 'If you\'ve just migrated from an older Wiwi version (0.7.1 or less), please click here : <input type=button value="UPGRADE" onclick="document.location.href=\''.XOOPS_URL.'/modules/wiwimod/update.php\';">';
		echo "<br /><br /><a href='../manual.html' target='_blank'>Read the Manual</a> and <a href='../ReadMe.txt' target='_blank'>release notes</a> to get started.";
		break;

}
xoops_cp_footer();



?>