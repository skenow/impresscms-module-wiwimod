<?php

/*	=========================================

		Class wiwiProfile

	TODO :  remove any $xoopsModule or $xoopsModuleConfig references, to 
			enable the class being used from within any other module.
	=========================================
 */
if (!defined('_WI_READ')) {

define ("_WI_READ", 1);
define ("_WI_WRITE", 2);
define ("_WI_ADMIN",3);
define ("_WI_COMMENTS",4);
define ("_WI_HISTORY",5);

class WiwiProfile {

	var $name;
	var $prid;					// this attribute is naturally read-only...

	//
	//  arrays below have group ids as keys, and group names as values.
	//
	var $readers;
	var $writers;
	var $administrators;

	var $commentslevel;			// 0 if no comments allowed, otherwise _WI_READ, _WI_WRITE or _WI_ADMIN
	var $historylevel;			// 0 if no history allowed, otherwise _WI_READ, _WI_WRITE or _WI_ADMIN

	var $db;					// private usage;

	//
	// Constructor
	//
	function WiwiProfile($prid = 0) {
		$this->db =& Database::getInstance();

		$this->name = "";
		$this->readers = Array();
		$this->writers = Array();
		$this->administrators = Array();
		$this->prid = $prid;
		$this->commentslevel = 0;
		$this->historylevel = _WI_WRITE;

		if ($prid != 0) $this->load($prid);
	}

	//
	// sets object with db data
	//
	function load ($prid=0) {

		if ($prid == 0) return;  // 0 isn't a valid profile id.

		//
		// retrieve profile info
		//
		$sql = "SELECT prname, commentslevel, historylevel FROM ".$this->db->prefix("wiwimod_profiles")." WHERE prid=".$prid;

		$res = $this->db->query($sql);
		if ($this->db->getRowsNum($res) == 0) return false;
		list($this->name, $this->commentslevel, $this->historylevel) = $this->db->fetchRow($res);
		$this->prid = $prid;

		//
		// retrieve groups info
		//
		$this->readers = Array();
		$this->writers = Array();
		$this->administrators = Array();

		$member_handler =& xoops_gethandler('member');
		$grps =& $member_handler->getGroupList();

		$sql = "SELECT gid, priv FROM ".$this->db->prefix("wiwimod_prof_groups")." WHERE prid=".$prid." ORDER BY priv";
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


	function getDefaultProfileId () {
		/*
		 * cannot use globals xoopsModule or xoopsModuleConfig, if called from within another module ;
		 * so must guess wiwimod module id from its folder ...
		 */
		$modhandler =& xoops_gethandler('module');				
		$config_handler =& xoops_gethandler('config');
        $wiwiModule = $modhandler->getByDirname("wiwimod");  
		$wiwiConfig =& $config_handler->getConfigsByCat(0, $wiwiModule->getVar('mid'));
		
		$prid = $wiwiConfig['DefaultProfile'];
		return $prid;
	}

	//
	// Saves object data to the database
	//
	function store() {

		if ($this->name == "") return false;
		if ($this->prid == 0) {
			//
			// Create new profile
			//
			$sql = sprintf ("INSERT INTO %s ( prname, commentslevel, historylevel ) VALUES ( %s , %s , %s)",$this->db->prefix("wiwimod_profiles"),$this->db->quoteString($this->name), $this->commentslevel, $this->historylevel);
			$success = $this->db->query($sql);
			if ($success) {
				$this->prid = $this->db->getInsertId();  // gets new profile id
			}

		} else {
			//
			// Update profile
			//
			$sql = sprintf ("UPDATE %s SET prname = %s , commentslevel = %s, historylevel = %s WHERE prid = %u",$this->db->prefix("wiwimod_profiles"),$this->db->quoteString($this->name), $this->commentslevel, $this->historylevel, $this->prid);
			$success = $this->db->query($sql);
			if ($success) {
				//
				// delete old groups info
				//
				$sql = sprintf ("DELETE FROM %s WHERE prid = %u",$this->db->prefix("wiwimod_prof_groups"),$this->prid);
				$success = $this->db->query($sql);
			}
		}
		if ($success) {
			//
			// Insert groups info
			//
			foreach ($this->readers as $key) {
				$sql = sprintf ("INSERT INTO %s ( prid, gid, priv ) VALUES ( %u, %u, %u )", 
							$this->db->prefix("wiwimod_prof_groups"),$this->prid,$key,_WI_READ);
				$success = $this->db->query($sql);

			}
			foreach ($this->writers as $key) {
				$sql = sprintf ("INSERT INTO %s ( prid, gid, priv ) VALUES ( %u, %u, %u )", 
							$this->db->prefix("wiwimod_prof_groups"),$this->prid,$key,_WI_WRITE);
				$success = $success && $this->db->query($sql);
			}
			foreach ($this->administrators as $key) {
				$sql = sprintf ("INSERT INTO %s ( prid, gid, priv ) VALUES ( %u, %u, %u )", 
							$this->db->prefix("wiwimod_prof_groups"),$this->prid,$key,_WI_ADMIN);
				$success = $success && $this->db->query($sql);
			}
		}

		if ($success) {	//-- update possible values for default profile
			$this->updateModuleConfig();
		}

	return ($success ? $this->prid : false);
	}

	//
	// Delete a profile, and modifies impacted Wiwi pages profile
	// 
	function delete ($newprf = 0) {
		if ($this->prid == null) return true;
		
		$sql = sprintf ("DELETE FROM %s WHERE prid = %u",$this->db->prefix("wiwimod_prof_groups"),$this->prid);
		$success = $this->db->query($sql);
		$sql = sprintf("DELETE FROM %s WHERE prid=%u", $this->db->prefix("wiwimod_profiles"),$this->prid);
		$success = $this->db->query($sql);
		$sql = sprintf("UPDATE %s SET prid=%u WHERE prid=%u", $this->db->prefix("wiwimod"),$newprf, $this->prid);
		$success = $this->db->query($sql);

		if ($success) {	//-- update possible values for default profile
			$this->updateModuleConfig();
		}

		return $success;
	}

	//
	// Retrieves an array with all profiles name and id.
	//
	function getAllProfiles() {

		$sql = "SELECT prname, prid FROM ".$this->db->prefix("wiwimod_profiles");
		$res = $this->db->query($sql);
		$prlist = Array();
		while ($rows = $this->db->fetchArray($res)) {
			$prlist[$rows['prid']] = $rows['prname'];
		}
		return $prlist;
	}

	//
	// Retrieves an array with all profile name and id where the selected user has admin privilege
	// Xoops Webmasters have admin access to all profiles of course.
	//
	function getAdminProfiles($user) {
		$member_handler =& xoops_gethandler('member');
		$usergroups = $user ? $member_handler->getGroupsByUser($user->getVar("uid")) : Array(XOOPS_GROUP_ANONYMOUS);

		if (in_array(XOOPS_GROUP_ADMIN , $usergroups)) {
			$prlist = $this->getAllProfiles();
		} else {
			$t1 = $this->db->prefix("wiwimod_profiles");
			$t2 = $this->db->prefix("wiwimod_prof_groups");
			$sql = sprintf("SELECT DISTINCT %s.prid, prname FROM %s LEFT JOIN %s ON %s.prid = %s.prid WHERE gid IN (%s) AND priv = %s",
				$t1, $t2, $t1, $t2, $t1, implode("," , $usergroups), _WI_ADMIN);
			$res = $this->db->query($sql);
			$prlist=Array();
			while ($rows = $this->db->fetchArray($res)) {
				$prlist[$rows['prid']] = $rows['prname'];
			}
		}
		return $prlist;
	
	}


	//
	// Retrieves selected user read, write and administrator privileges on the current profile,
	// depending on all groups he is member of.
	// Xoops webmasters have full access of course.
	// Returns an three items array with keys _WI_READ, _WI_WRITE, _WI_ADMIN, _WI_COMMENTS
	//
	function getUserPrivileges ($user="") {
		global $xoopsUser;

		$member_handler =& xoops_gethandler('member');
		if ($user == "") $user = $xoopsUser;
		$usergroups = $user ? $member_handler->getGroupsByUser($user->getVar("uid")) : Array(XOOPS_GROUP_ANONYMOUS);
		$priv = Array();
		$priv[_WI_ADMIN] = in_array(XOOPS_GROUP_ADMIN , $usergroups) || ( count(array_intersect ($usergroups, array_keys($this->administrators))) > 0 );
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

	function canRead() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_READ]);
	}

	function canWrite() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_WRITE]);
	}

	function canAdministrate() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_ADMIN]);
	}

	function canViewComments() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_COMMENTS]);
	}

	function canViewHistory() {
		$priv = $this->getUserPrivileges();
		return ($priv[_WI_HISTORY]);
	}


	/*
	 * Updates wiwimod's module options with the uptodate list of profiles
	 * (to enable selecting the "default" profile within module's preferences.
	 */
	function updateModuleConfig() {
		
		/*
		 * cannot use the global xoopsModule, if called from within another module ;
		 * so must guess wiwimod module id from its folder ...
		 */
		$modhandler =& xoops_gethandler('module');				
        $myXoopsModule = $modhandler->getByDirname("wiwimod");  

		//-- get the config item options from the database
		$criteria = new CriteriaCompo (new Criteria('conf_modid', $myXoopsModule->getVar('mid')));
		$criteria->add(new Criteria('conf_name', 'DefaultProfile'));
		$config_handler =& xoops_gethandler('config');
		$configs =& $config_handler->getConfigs($criteria,false);
		$confid = $configs[0]->getVar('conf_id');
		$old_options =& $config_handler->getConfigOptions(new Criteria('conf_id',$confid),false);

		//-- create the new options
		$optionshandler = xoops_gethandler('configoption');
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



}  // end class wiwiProfile

}  // end "ifdefined"











?>