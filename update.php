<?php
/**
 * update script from previous versions
 * 
 * @package SimplyWiki
 * @author Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

include_once "header.php";
global $xoopsDB;


function execQueryFile($sqlfile) {
	include_once XOOPS_ROOT_PATH.'/class/database/sqlutility.php';
	if ($sqlfile== "") return;
	$error = false;
	$db =& Database::getInstance();
	if (!file_exists($sqlfile)) {
		$errs[] = "SQL file not found at <b>$sql_file_path</b>";
		$error = true;
	} else {
		$sql_query = fread(fopen($sqlfile, 'r'), filesize($sqlfile));
		$sql_query = trim($sql_query);
		SqlUtility::splitMySqlFile($pieces, $sql_query);
		foreach ($pieces as $piece) {
			$prefixed_query = str_replace("%%", $db->prefix()."_", $piece);
			if (!$db->queryF($prefixed_query)) {
				$error = true;
				break;
			}
		}
	}
	return $error;
}

$errno = 0;	
$resultStr = "";
$errorstr = "";

/*
 * field parent (v0.6)
 */
$sql = "ALTER TABLE ".$xoopsDB->prefix("wiwimod")." ADD (parent varchar(255) default '')";
if (!$xoopsDB->queryF($sql)) {
	$errno = $xoopsDB->errno();
	if ($errno == 1060) $errno = 0;   //-- duplicate column : the column has already been created
	if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
} else {
	$resultStr .= "column 'parent' created.<BR />";
}

/*
 * field contextBlock (v0.6 , modified to varchar on v0.7 )
 */
$sql = "ALTER TABLE ".$xoopsDB->prefix("wiwimod")." DROP contextBlock";
if (!$xoopsDB->queryF($sql)) {
	$errno = $xoopsDB->errno();
	if ($errno == 1091) $errno = 0;   //-- contextBlock did'nt exist so could'nt be dropped
	if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
}

$sql = "ALTER TABLE ".$xoopsDB->prefix("wiwimod")." ADD (contextBlock varchar(255) default '')";
if (!$xoopsDB->queryF($sql)) {
	$errno = $xoopsDB->errno();
	if ($errno == 1060) $errno = 0;   //-- duplicate column : the column has already been created
	if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
} else {
	$resultStr .= "column 'contextBlock' created.<BR />";
}

/*
 * field pageid (v0.6.1)
 */
$sql = "ALTER TABLE ".$xoopsDB->prefix("wiwimod")." ADD (pageid integer default 0)";
if (!$xoopsDB->queryF($sql)) {
	$errno = $xoopsDB->errno();
	if ($errno == 1060) $errno = 0;   //-- duplicate column : the column has already been created
	if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
} else {
	$resultStr .= "column 'pageid' created.<BR />";
	$sql = "UPDATE ".$xoopsDB->prefix("wiwimod")." SET pageid = id";
	if (!$xoopsDB->queryF($sql)) {
		$errno = $xoopsDB->errno();
		if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
	} else {
		$resultStr .= "column 'pageid' updated.<BR />";
	}
}


/*
 * field prid (v0.7)
 */
$sql = "ALTER TABLE ".$xoopsDB->prefix("wiwimod")." ADD (prid integer default 0)";
if (!$xoopsDB->queryF($sql)) {
	$errno = $xoopsDB->errno();
	if ($errno == 1060) $errno = 0;   //-- duplicate column : the column has already been created
	if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
} else {
	$resultStr .= "column 'prid' created.<BR />";
}


/*
 *  Create table wiki_profiles (v0.7)
 */
if ($errno == 0) {
	$sql = "CREATE TABLE ".$xoopsDB->prefix("wiki_profiles")." (prid integer not null auto_increment, prname varchar(20) not null default '', commentslevel integer default 0, PRIMARY KEY (prid) ) TYPE=MyISAM";
	if (!$xoopsDB->queryF($sql)) {
		$errno = $xoopsDB->errno();
		if ($errno == 1050) $errno = 0;   //-- Table already exists 
		if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
	} else {
		$resultStr .= "table '".$xoopsDB->prefix("wiki_profiles")."' created.<BR />";
	}
}

/*
 *  Create table wiki_prof_groups (v0.7)
 */
if ($errno == 0) {
	$sql = "CREATE TABLE ".$xoopsDB->prefix("wiki_prof_groups")." (prid integer, gid integer, priv smallint )  TYPE=MyISAM";
	if (!$xoopsDB->queryF($sql)) {
		$errno = $xoopsDB->errno();
		if ($errno == 1050) $errno = 0;   //-- Table already exists 
		if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
	} else {
		$resultStr .= "table '".$xoopsDB->prefix("wiki_prof_groups")."' created.<BR />";
	}
}


/*
 * field historylevel (v0.7.1)
 */
if ($errno == 0) {
	$sql = "ALTER TABLE ".$xoopsDB->prefix("wiki_profiles")." ADD (historylevel integer default 0)";
	if (!$xoopsDB->queryF($sql)) {
		$errno = $xoopsDB->errno();
		if ($errno == 1060) $errno = 0;   //-- duplicate column : the column has already been created
		if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
	} else {
		$resultStr .= "column 'historylevel' created.<BR />";
	}
}

//$sql = "DROP TABLE ".$xoopsDB->prefix("wiki_profiles");
//$xoopsDB->queryF($sql);


/*
 * create sample profiles
 */

if ($errno == 0) {
	if (!execQueryFile("sql/update.sql")) {
		$errno = $xoopsDB->errno();
		if ($errno != 0) $errorstr .= $errno." : ".$xoopsDB->error()."<br>";
	} else {
		$resultStr .= "Sample profiles created.<BR />";
	}
}


/*
 * Print out results
 */
if ($errno != 0) {
	$resultStr .= "<h4>Update failed :</h4>";	
	$resultStr .= "Errors :<br>".$errorstr;

} else {
	$resultStr .= "<h4>Update success.</h4>Enjoy Wiwi";
} ?>

<table valign=middle align=center border 2 bgcolor=#FAFAFF>
	<tr><td align=center>
		<img src=images/wiwilogo.gif></br>
		<h4>WiwiMod v0.8.3<br>Database update from previous versions.</h4>
	</td></tr>
	<tr><td>
		<?php echo "$resultStr"; ?>
	</td></tr>
	<tr><td>
		For any information, please visit <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">Wiwi's home page</a> or send a mail to : <a href="mailto:xjimenez@zonatim.com">Xavier Jimenez</a>
	</td></tr>
</table>
