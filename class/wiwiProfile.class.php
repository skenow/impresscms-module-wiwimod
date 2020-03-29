<?php
/**
 * Permissions profile
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */
if (!defined('_WI_READ')) { // @todo move these defines and remove the conditonal
define ('_WI_READ', 1);
define ('_WI_WRITE', 2);
define ('_WI_ADMIN',3);
define ('_WI_COMMENTS',4);
define ('_WI_HISTORY',5);
/**
 * Determines permissions for a page
 *
 * @author Xavier
 *
 */
class WiwiProfile {
	var $name;
	/** this attribute is naturally read-only... */
	var $prid;
	/** arrays below have group ids as keys, and group names as values. */
	var $readers;
	var $writers;
	var $administrators;
    /** 0 if no comments allowed, otherwise _WI_READ, _WI_WRITE or _WI_ADMIN */
	var $commentslevel;
	/** 0 if no history allowed, otherwise _WI_READ, _WI_WRITE or _WI_ADMIN */
	var $historylevel;
	/** private usage */
	var $db;
	/**
	 * Constructor
	 */
	function __construct($prid = 0) {
		$this->db = icms_db_Factory::instance();
		$this->name = '';
		$this->readers = array();
		$this->writers = array();
		$this->administrators = array();
		$this->prid = $prid;
		$this->commentslevel = 0;
		$this->historylevel = _WI_WRITE;
		if ($prid != 0) $this->load($prid);
	}
	/**
	 * sets object with db data
	 */
	function load ($prid=0) {
		if ($prid == 0) return;  // 0 isn't a valid profile id.
		// retrieve profile info
		$sql = 'SELECT prname, commentslevel, historylevel FROM '.$this->db->prefix('wiki_profiles').' WHERE prid='. (int) $prid;
		$res = $this->db->query($sql);
		if ($this->db->getRowsNum($res) == 0) return false;
		list($this->name, $this->commentslevel, $this->historylevel) = $this->db->fetchRow($res);
		$this->prid = $prid;
		// retrieve groups info
		$this->readers = array();
		$this->writers = array();
		$this->administrators = array();
		$member_handler =& icms::handler('icms_member');
		$grps = $member_handler->getGroupList();
		$sql = 'SELECT gid, priv FROM '.$this->db->prefix('wiki_prof_groups').' WHERE prid='. (int) $prid.' ORDER BY priv';
		$res = $this->db->query($sql);
		while ($rows = $this->db->fetchArray($res)) {
			switch ($rows['priv']) {
				case _WI_WRITE :
					$dst =& $this->writers;
					break;
				case _WI_ADMIN :
					$dst =& $this->administrators;
					break;
				case _WI_READ :
				default :
					$dst =& $this->readers;
					break;
			}
			$dst[$rows['gid']] = $grps[$rows['gid']];
		}
	}
	/**
	 * Gets default profile from the module preferences
	 * @return int profile id
	 */
	function getDefaultProfileId () {
		/*
		 * must guess SimplyWiki module id from its folder ...
		 * @return int Integer representing the profile id of the default profile defined in the module's preferences
		 */
		$modhandler =& icms::handler('icms_module');
		$config_handler =& icms::handler('icms_config');
        $wiwiModule = $modhandler->getByDirname(basename(dirname(__DIR__)));
		$swikiConfig =& $config_handler->getConfigsByCat(0, $wiwiModule->getVar('mid'));
		$prid = $swikiConfig['DefaultProfile'];
		return $prid;
	}
	/**
	 * Saves object data to the database
	 * @return int|boolean profile id if successful, boolean false if not
	 */
	function store() {
		if ($this->name == '') return false;
		if ($this->prid == 0) {
			// Create new profile
			$sql = sprintf ('INSERT INTO %s ( prname, commentslevel, historylevel ) VALUES ( %s , %u , %u)',$this->db->prefix('wiki_profiles'),$this->db->quoteString($this->name), $this->commentslevel, $this->historylevel);
			$success = $this->db->query($sql);
			if ($success) {
				$this->prid = $this->db->getInsertId();  // gets new profile id
			}
		} else {
			// Update profile
			$sql = sprintf ('UPDATE %s SET prname = %s , commentslevel = %u, historylevel = %u WHERE prid = %u',$this->db->prefix('wiki_profiles'),$this->db->quoteString($this->name), $this->commentslevel, $this->historylevel, $this->prid);
			$success = $this->db->query($sql);
			if ($success) {
				// delete old groups info
				$sql = sprintf ('DELETE FROM %s WHERE prid = %u',$this->db->prefix('wiki_prof_groups'),$this->prid);
				$success = $this->db->query($sql);
			}
		}
		if ($success) {
			// Insert groups info
			foreach ($this->readers as $key) {
				$sql = sprintf ('INSERT INTO %s ( prid, gid, priv ) VALUES ( %u, %u, %u )',
							$this->db->prefix('wiki_prof_groups'),$this->prid,$key,_WI_READ);
				$success = $this->db->query($sql);
			}
			foreach ($this->writers as $key) {
				$sql = sprintf ('INSERT INTO %s ( prid, gid, priv ) VALUES ( %u, %u, %u )',
							$this->db->prefix('wiki_prof_groups'),$this->prid,$key,_WI_WRITE);
				$success = $success && $this->db->query($sql);
			}
			foreach ($this->administrators as $key) {
				$sql = sprintf ('INSERT INTO %s ( prid, gid, priv ) VALUES ( %u, %u, %u )',
							$this->db->prefix('wiki_prof_groups'),$this->prid,$key,_WI_ADMIN);
				$success = $success && $this->db->query($sql);
			}
		}
		if ($success) {	//-- update possible values for default profile
			$this->updateModuleConfig();
		}
	return ($success ? $this->prid : false);
	}
	/**
	 * Delete a profile, and modifies impacted Wiwi pages profile
	 */
	function delete ($newprf = 0) {
		if ($this->prid == null) return true;
		$sql = sprintf ('DELETE FROM %s WHERE prid = %u',$this->db->prefix('wiki_prof_groups'),$this->prid);
		$success = $this->db->query($sql);
		$sql = sprintf('DELETE FROM %s WHERE prid=%u', $this->db->prefix('wiki_profiles'),$this->prid);
		$success = $this->db->query($sql);
		$sql = sprintf('UPDATE %s SET prid=%u WHERE prid=%u', $this->db->prefix('wiki_pages'),$newprf, $this->prid);
		$success = $this->db->query($sql);
		if ($success) {	//-- update possible values for default profile
			$this->updateModuleConfig();
		}
		return $success;
	}
	/**
	 * Retrieves an array with all profiles name and id.
	 */
	function getAllProfiles() {
		$sql = 'SELECT prname, prid FROM '.$this->db->prefix('wiki_profiles');
		$res = $this->db->query($sql);
		$prlist = array();
		while ($rows = $this->db->fetchArray($res)) {
			$prlist[$rows['prid']] = $rows['prname'];
		}
		return $prlist;
	}
	/**
	 * Retrieves an array with all profile name and id where the selected user has admin privilege
	 * Webmasters have admin access to all profiles of course.
	 */
	function getAdminProfiles($user) {
		$member_handler =& icms::handler('icms_member');
		$usergroups = $user ? $member_handler->getGroupsByUser($user->getVar('uid')) : array(ICMS_GROUP_ANONYMOUS);
		if (in_array(ICMS_GROUP_ADMIN , $usergroups)) {
			$prlist = $this->getAllProfiles();
		} else {
			$t1 = $this->db->prefix('wiki_profiles');
			$t2 = $this->db->prefix('wiki_prof_groups');
			$sql = sprintf('SELECT DISTINCT %s.prid, prname FROM %s LEFT JOIN %s ON %s.prid = %s.prid WHERE gid IN (%s) AND priv = %u',
				$t1, $t2, $t1, $t2, $t1, implode(',' , $usergroups), _WI_ADMIN);
			$res = $this->db->query($sql);
			$prlist=array();
			while ($rows = $this->db->fetchArray($res)) {
				$prlist[$rows['prid']] = $rows['prname'];
			}
		}
		return $prlist;
	}
	/*
	 * Retrieves selected user read, write and administrator privileges on the current profile,
	 * depending on all groups he is member of.
	 * webmasters have full access of course.
	 * Returns an three items array with keys _WI_READ, _WI_WRITE, _WI_ADMIN, _WI_COMMENTS
	 */
	function getUserPrivileges ($user='') {
		$member_handler =& icms::handler('icms_member');
		if ($user == '') $user = icms::$user;
		//$usergroups = $user ? $member_handler->getGroupsByUser($user->getVar('uid')) : array(ICMS_GROUP_ANONYMOUS);
		$usergroups = icms::$user ? icms::$user->getGroups() : array(ICMS_GROUP_ANONYMOUS);
		$priv = array();
		$priv[_WI_ADMIN] = in_array(ICMS_GROUP_ADMIN , $usergroups) || ( count(array_intersect ($usergroups, array_keys($this->administrators))) > 0 );
		$priv[_WI_WRITE] = $priv[_WI_ADMIN] || ( count(array_intersect ($usergroups, array_keys($this->writers))) > 0 );
		$priv[_WI_READ] = $priv[_WI_WRITE]  || ( count(array_intersect ($usergroups, array_keys($this->readers))) > 0 );
		$priv[_WI_COMMENTS] = (
			($priv[_WI_READ] && ($this->commentslevel == _WI_READ)) ||
			($priv[_WI_WRITE] && (($this->commentslevel == _WI_READ) || ($this->commentslevel == _WI_WRITE))) ||
			($priv[_WI_ADMIN] && (($this->commentslevel == _WI_READ) || ($this->commentslevel == _WI_WRITE) || ($this->commentslevel == _WI_ADMIN)))
			);
		$priv[_WI_HISTORY] = (
			($priv[_WI_READ] && ($this->historylevel == _WI_READ)) ||
			($priv[_WI_WRITE] && (($this->historylevel == _WI_READ) || ($this->historylevel == _WI_WRITE))) ||
			($priv[_WI_ADMIN] && (($this->historylevel == _WI_READ) || ($this->historylevel == _WI_WRITE) || ($this->historylevel == _WI_ADMIN)))
			);
    	return $priv;
	}
	/**
	 *
	 * @return array
	 */
	function canRead() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_READ]);
	}
	/**
	 *
	 * @return array
	 */
	function canWrite() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_WRITE]);
	}
	/**
	 *
	 * @return array
	 */
	function canAdministrate() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_ADMIN]);
	}
	/**
	 *
	 * @return array
	 */
	function canViewComments() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_COMMENTS]);
	}
	/**
	 *
	 * @return array
	 */
	function canViewHistory() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_HISTORY]);
	}
	/*
	 * Updates SimplyWiki's module options with the uptodate list of profiles
	 * to enable selecting the "default" profile within module's preferences.
	 */
	function updateModuleConfig() {
		/*
		 * must guess SimplyWiki module id from its folder ...
		 */
		$modhandler =& icms::handler('icms_module');
        $myModule = $modhandler->getByDirname(basename(dirname(__DIR__)));
		//-- get the config item options from the database
		$criteria = new icms_db_criteria_Compo(new icms_db_criteria_Item('conf_modid', $myModule->getVar('mid')));
		$criteria->add(new icms_db_criteria_Item('conf_name', 'DefaultProfile'));
		$config_handler =& icms::handler('icms_config');
		$configs = $config_handler->getConfigs($criteria,false);
		$confid = $configs[0]->getVar('conf_id');
		$old_options = $config_handler->getConfigOptions(new icms_db_criteria_Item('conf_id',$confid),false);
		//-- create the new options
		$optionshandler = icms::handler('icms_config_option');
		$prlist = $this->getAllProfiles();
		foreach ($prlist as $prid=>$prname) {
			$opt = $optionshandler->create();
			$opt->setVar('conf_id', $confid);
			$opt->setVar('confop_name', $prname);
			$opt->setVar('confop_value', $prid);
			$optionshandler->insert($opt);
			unset ($opt);
		   }
		//-- delete old ones;
		foreach ($old_options as $opt) {
			$optionshandler->delete($opt);
		}
		//-- clear cache
/*		$cnf =& $configs[0];
		if (!empty($config_handler->_cachedConfigs[$cnf->getVar('conf_modid')][$cnfg->getVar('conf_catid')])) {
			unset ($config_handler->_cachedConfigs[$cnf->getVar('conf_modid')][$cnfg->getVar('conf_catid')]);
		} */
	}

	/**
	* Retrieves an array with all profile names and ids where the selected user has admin privilege
	* Webmasters have write access to all profiles
	* @return array
	*/
	function getWriteProfiles($user) {
		$member_handler =& icms::handler('icms_member');
		$usergroups = $user ? $member_handler->getGroupsByUser($user->getVar('uid')) : array(ICMS_GROUP_ANONYMOUS);
		if (in_array(ICMS_GROUP_ADMIN , $usergroups)) {
			$prlist = $this->getAllProfiles();
		} else {
			$t1 = $this->db->prefix('wiki_profiles');
			$t2 = $this->db->prefix('wiki_prof_groups');
			$sql = sprintf('SELECT DISTINCT %s.prid, prname FROM %s LEFT JOIN %s ON %s.prid = %s.prid WHERE gid IN (%s) AND priv = %u',
				$t1, $t2, $t1, $t2, $t1, implode(',' , $usergroups), _WI_WRITE);
			$res = $this->db->query($sql);
			$prlist=array();
			while ($rows = $this->db->fetchArray($res)) {
				$prlist[$rows['prid']] = $rows['prname'];
			}
		}
		return $prlist;
	}

}  // end class wiwiProfile
}  // end "ifdefined"
