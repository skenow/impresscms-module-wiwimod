<?php
/**
 * Custom upgrade script
 *
 * This file is loaded and executed at the end of the update module process
 *
 * @package SimplyWiki
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */
if (!defined("ICMS_ROOT_PATH") && !defined('ICMS_ROOT_PATH')) exit("Root path not defined");

function icms_module_update_simplywiki($module = NULL, $prev_version = NULL) {
	$wikiInstallDir = dirname(dirname(__FILE__));
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	global $icmsConfig;

	if (@file_exists($wikiInstallDir . '/language/' . $icmsConfig['language'] . '/update.php')){
		include $wikiInstallDir . '/language/' . $icmsConfig['language'] . '/update.php';
	} else {
		include $wikiInstallDir . '/language/english/update.php';
	}

	$db = icms_db_Factory::Instance();
	$modhandler =& icms::handler('icms_module');
	$config_handler =& icms::handler('icms_config');
	$SimplyWiki = $modhandler->getByDirname($wikiModDir);

	/* Get current module version before proceeding */

	/* Changes in 1.0
	 * wiwimod table split into 2 tables - wiki_pages and wiki_revisions
	 * How can I do this without having the SQL here - just pulling from sql/mysql.sql?
	 */

	/* Check for new table - wiki_pages - and add it if it doesn't exist */
	$sql = "CREATE TABLE IF NOT EXISTS ". $db->prefix('wiki_pages') ." (
       pageid int unsigned NOT NULL auto_increment COMMENT 'Unique integer ID for the page',
       keyword varchar(255) NOT NULL DEFAULT '' COMMENT 'Keyword/page name',
       title varchar(255) NOT NULL DEFAULT '' COMMENT 'Title of the page',
       creator mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Userid for the user that created the page, from users.uid',
       createdate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Datetime the page was created',
       prid int NOT NULL DEFAULT 0 COMMENT 'Profile id to control page access, defined in wiki_profiles.prid',
       parent varchar(255) DEFAULT '' COMMENT 'Keyword/page name of the parent page for the page',
       views int UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Number of times this page has been viewed',
       visible int DEFAULT 0 COMMENT 'Determines if the page is visible in the index and its sort order (weight)',
       revisions int DEFAULT 0 COMMENT 'The number of times the page has been revised',
       lastmodified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Last time this page was revised',
       lastviewed datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Last time this page was viewed by someone other than the last author',
       allowComments ENUM('0','1') DEFAULT '1' COMMENT 'Allow or restrict (additional) comments for the page',
       contextBlock varchar(255) DEFAULT '' COMMENT 'Keyword/page name for the related content block',
       PRIMARY KEY (pageid),
       UNIQUE KEY (keyword)
     ) ENGINE=MyISAM COMMENT 'Holds the list of pages and their properties';
     ";
	$db->query($sql);

	/* Copy existing data to the new table, if it is empty */
	$sql = 'SELECT pageid FROM '. $db->prefix('wiki_pages');
	$result = $db->query($sql);
	if ($db->getRowsNum($result) < 1) {
		$sql = 'INSERT INTO '. $db->prefix('wiki_pages') .' (pageid, keyword, creator, createdate, revisions, lastmodified, lastviewed)
               SELECT w.pageid, w.keyword, w.u_id, min(w.lastmodified), count(w.id), max(w.lastmodified), max(w.lastmodified)
               FROM '. $db->prefix('wiwimod') .' w GROUP BY pageid';
		$db->query($sql);

		/* The initial insert of data pulls the first record and for some columns we want the last record. This will accomplish that */
		$sql = 'UPDATE ' . $db->prefix('wiki_pages') .' p, '. $db->prefix('wiwimod') .' w
       SET p.visible = w.visible, p.prid = w.prid, p.parent = w.parent, p.title = w.title, p.contextBlock = w.contextBlock
       WHERE p.pageid = w.pageid AND p.lastmodified = w.lastmodified';
		$db->query($sql);
	}

	/* Check for new table - wiki_revisions - and add it if it doesn't exist */
	$sql = "CREATE TABLE IF NOT EXISTS ". $db->prefix('wiki_revisions') ." (
       revid int UNSIGNED NOT NULL AUTO_INCREMENT,
       pageid int UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Link to wiki_pages.pageid',
       body mediumtext NOT NULL COMMENT 'Text for this revision',
       summary tinytext COMMENT 'Summary of the revision by the author',
       modified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp for the revision',
       userid mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Userid for the user that modified the page, from users.uid',
       PRIMARY KEY page (revid)
     ) ENGINE=MyISAM COMMENT 'Holds details of the individual revisions to each page';
     ";
	$db->query($sql);

	/* Copy existing data into new table, if the table is empty */
	$sql = 'SELECT pageid FROM '. $db->prefix('wiki_revisions');
	$result = $db->query($sql);
	if ($db->getRowsNum($result) < 1) {
		$sql = 'INSERT INTO '. $db->prefix('wiki_revisions') . ' (pageid, body, modified, userid)
               SELECT pageid, body, lastmodified, u_id
               FROM '. $db->prefix('wiwimod');
		$db->query($sql);
	}

	$sql = 'CREATE TABLE IF NOT EXISTS '. $db->prefix('wiki_profiles') .' (
		   prid integer not null auto_increment,
		   prname varchar(20) not null default "",
		   commentslevel integer default 0,
		   historylevel integer default 1,
		   PRIMARY KEY (prid)
		) ENGINE=MyISAM;';
	$db->query($sql);

	$sql = 'SELECT prid FROM '. $db->prefix('wiki_profiles');
	$result = $db->query($sql);
	if ($db->getRowsNum($result) < 1) {
		$sql = 'INSERT INTO '. $db->prefix('wiki_profiles') . '
			SELECT * FROM '. $db->prefix('wiwimod_profiles') ;
		$db->query($sql);
	}

	$sql = 'CREATE TABLE IF NOT EXISTS '. $db->prefix('wiki_prof_groups') .'(
		prid int(11) default NULL ,
		gid int(11) default NULL ,
		priv smallint(6) default NULL
		) ENGINE = MYISAM ';
	$db->query($sql);

	$sql = 'SELECT prid FROM '. $db->prefix('wiki_prof_groups');
	$result = $db->query($sql);
	if ($db->getRowsNum($result) < 1) {
		$sql = 'INSERT INTO '. $db->prefix('wiki_prof_groups') . '
			SELECT * FROM '. $db->prefix('wiwimod_prof_groups') ;
		$db->query($sql);
	}

	/* Remove old tables */
	$sql = 'DROP TABLE IF EXISTS '. $db->prefix('wiwimod') . ', ' . $db->prefix('wiwimod_profiles') . ', ' . $db->prefix('wiwimod_prof_groups');
	$db->query($sql);

	/* Because of the way profiles are generated, the config options need to be updated */
	include_once $wikiInstallDir . '/class/wiwiProfile.class.php';
	$prof = new WiwiProfile();
	$prof->updateModuleConfig();

	if ($prev_version = 120) {
		/* get revisions value from page and count of revisions for the page
		 * update the revisions field with the count of revisions
		 * this is only valid if all the revisions are still in the table
		 */
		$sql = "UPDATE `" . $db->prefix('wiki_pages') . "` p,
				(SELECT count(*) AS c, pageid
				FROM `" . $db->prefix('wiki_revisions') . "` r
				GROUP BY pageid) AS r
			SET p.revisions = r.c
			WHERE p.pageid = r.pageid AND r.c > p.revisions";
		$db->query($sql);
	}
	
	/*
	 * check for the datetime fields default values '0000-00-00 00:00:00' is no longer valid in SQL strict mode
	 *
	 */
	$sql = "SHOW COLUMNS FROM `" . $db->prefix('wiki_pages') ."` WHERE type = 'datetime' AND `Default` = '0000-00-00 00:00:00';";
	$result = $db->query($sql);
	
	if ($db->getRowsNum($result) > 0) {
		$table = new icms_db_legacy_updater_Table('wiki_pages');
		$table->addAlteredField('createdate', "DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$table->addAlteredField('lastmodified', "DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$table->addAlteredField('lastviewed', "DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$table->alterTable();
		unset($table);
	}
	
	$sql = "SHOW COLUMNS FROM `" . $db->prefix('wiki_revisions') ."` WHERE type = 'datetime' AND `Default` = '0000-00-00 00:00:00';";
	$result = $db->query($sql);
	
	if ($db->getRowsNum($result) > 0) {
		$table = new icms_db_legacy_updater_Table('wiki_revisions');
		$table->addAlteredField('modified', "DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$table->alterTable();
		unset($table);
	}
	
	return TRUE;
}

/* This will create a function with a name based on the installation directory, if it is not in simplywiki */
$wikiModDir = basename(dirname(dirname(__FILE__)));
if (!function_exists('icms_module_update_' . $wikiModDir)) {
	$myfunc = "function icms_module_update_" . $wikiModDir . '($module = NULL, $prev_version = NULL) { return icms_module_update_simplywiki($module, $prev_version);}';
	eval($myfunc);
}
