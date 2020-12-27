<?php
/**
 * Permissions manager for SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version
 */
/** Include the administration header */
include 'admin_header.php';
/** Include the profile class */
include '../class/wiwiProfile.class.php';

$op = $prid = $newprf = $profile = null;

$allowed_get = array(
	'profile' => 'int',
	'newprf' => 'int');
$clean_GET = swiki_cleanVars ($_GET, $allowed_get);
extract($clean_GET);

$allowed_postvars = array(
	'prid' => 'int',
	'prf_name' => 'plaintext',
	'prf_readers' => 'array',
	'prf_writers' => 'array',
	'prf_administrators' => 'array',
	'prf_commentslevel' => 'int',
	'prf_historylevel' => 'int',
	'op' => 'string');
if (!empty($_POST)) {
	$clean_POST = swiki_cleanVars($_POST, $allowed_postvars);
	extract($clean_POST);
}

$valid_ops = array('edit', 'save', 'confirmdelete', 'delete', null);
if (in_array($op, $valid_ops, true)) {
	switch ($op) {

		case 'edit':
		default:
			icms_cp_header();
			if (method_exists(icms::$module, 'displayAdminMenu')) {
				icms::$module->displayAdminMenu (2, _AM_SWIKI_ACLADMIN_NAV);
			} else {
				echo getAdminMenu (1, _AM_SWIKI_ACLADMIN_NAV);
			}

			//--- list profiles ---
			$prf = new WiwiProfile();
			$prflst = $prf->getAllProfiles();
			$prid = $profile;
			$prf->load($prid);

			echo '<script>function loadPrf(ele) { '
				. '		var prf= ele.value;  '
				. '		if (prf != 0) location.href="acladmin.php?op=edit&profile="+prf;'
				. '}</script>'
				. '<table><tr><td>'
				. "<table cellpadding='4' cellspacing='1'><tr><th colspan='2'>" . _AM_SWIKI_SELECTACL_BOX . "</th></tr>"
				. '<tr><td >' . _AM_SWIKI_SELECTACL_TXT . '</td>'
				. '<td ><select name=profile onchange="loadPrf(this);">'
				. '<option value="0">' . _AM_SWIKI_SELECTACL_OPT . '</option>';
			foreach ($prflst as $key=>$value) {
				echo '<option value="' . $key . ($prid != $key ? '">' : '" selected>') . $value . '</option>';
			}
			echo '</select></td></tr>'
				. '<tr><td >' . _AM_SWIKI_CREATEACL_TXT . '</td>'
				. '<td ><input type=button value="' . _AM_SWIKI_CREATEACL_BTN . '" onclick="location.href=\'acladmin.php\'"/>'
				. '</td></tr></table><br>';

			//--- profile form ---
			$aclName = new icms_form_elements_Text(_AM_SWIKI_ACLNAME_FLD, 'prf_name', 20, 20, $prf->name);
			$aclReaders = new icms_form_elements_select_Group(_AM_SWIKI_READERS_FLD, 'prf_readers', true, null, 5, true);
			$aclReaders->setValue(array_keys($prf->readers));
			$aclWriters = new icms_form_elements_select_Group(_AM_SWIKI_WRITERS_FLD, 'prf_writers', true, null, 5, true);
			$aclWriters->setValue(array_keys($prf->writers));
			$aclAdministrators = new icms_form_elements_select_Group(_AM_SWIKI_ADMINISTRATORS_FLD, 'prf_administrators', true, null, 5, true);
			$aclAdministrators->setValue(array_keys($prf->administrators));
			$aclComments = new icms_form_elements_Select(_AM_SWIKI_COMMENTS_FLD, 'prf_commentslevel', $prf->commentslevel);
			$aclComments->addOptionArray(array(
				0 => _AM_SWIKI_COMMENTS_NONE_OPT ,
				_WI_READ => _AM_SWIKI_READERS_OPT ,
				_WI_WRITE => _AM_SWIKI_WRITERS_OPT,
				_WI_ADMIN => _AM_SWIKI_ADMINISTRATORS_OPT
				)
			);
			$aclHistory = new icms_form_elements_Select(_AM_SWIKI_HISTORY_FLD, 'prf_historylevel', $prf->historylevel);
			$aclHistory->addOptionArray(array(
				0 => _AM_SWIKI_HISTORY_NONE_OPT ,
				_WI_READ => _AM_SWIKI_READERS_OPT ,
				_WI_WRITE => _AM_SWIKI_WRITERS_OPT,
				_WI_ADMIN => _AM_SWIKI_ADMINISTRATORS_OPT
				)
			);
			$aclSubmit = new icms_form_elements_Button('', 'savebtn', _AM_SWIKI_EDITACL_SAVE_BTN, 'submit');
			if ($prid !== null) {
				$aclDelete = new icms_form_elements_Button('', 'delbtn', _AM_SWIKI_EDITACL_DELETE_BTN, 'submit');
				$aclDelete->setExtra('onclick="document.forms.aclform.op.value=\'confirmdelete\'"');

			}
			$form = new icms_form_Theme(_AM_SWIKI_EDITACL_TXT, 'aclform', 'acladmin.php');
			$form->addElement($aclName);
			$form->addElement($aclReaders);
			$form->addElement($aclWriters);
			$form->addElement($aclAdministrators);
			$form->addElement($aclComments);
			$form->addElement($aclHistory);

			$btnTray = new icms_form_elements_Tray('');
			$btnTray->addElement($aclSubmit);
			if ($prid !== null) $btnTray->addElement($aclDelete);
			$form->addElement($btnTray);

			$form->addElement(new icms_form_elements_Hidden('op', 'save'));
			$form->addElement(new icms_form_elements_Hidden('prid', $prid));

			$form->display();

			echo '</td><td valign="top" width="40%">' . _AM_SWIKI_ACLHELP_TXT . '</td></tr></table>';

			icms_cp_footer();
			break;

		case 'save' :
			if ( isset($_POST) ) {
				$prf = new WiwiProfile();
				$prf->name = $prf_name;
				$prf->prid = (int) $prid;
				if (isset($prf_readers)) $prf->readers = $prf_readers; else $prf->readers = array();
				if (isset($prf_writers)) $prf->writers = $prf_writers; else $prf->writers = array();
				if (isset($prf_administrators)) $prf->administrators = $prf_administrators; else $prf->administrators = array();
				$prf->commentslevel = $prf_commentslevel;
				$prf->historylevel = $prf_historylevel;

				$success = $prf->store();
				redirect_header ('acladmin.php?op=edit&amp;profile=' . $prid, 2,
					($success ? _AM_SWIKI_PRFSAVESUCCESS_MSG : _AM_SWIKI_PRFSAVEFAILED_MSG));
				break;
			}

		case 'confirmdelete' :
			if (isset($profile)) {
				$prid = (int) $profile;
			} elseif (isset($prid)) {
				$prid = (int) $prid;
			} else redirect_header ('acladmin.php', 2, _AM_SWIKI_ERRDELETE_MSG);

			$prf = new WiwiProfile();
			$prf->load($prid);
			$tmplst = $prf->getAllProfiles();
			$prflst = array();
			foreach ($tmplst as $k=>$v) if ($k != $prid) $prflst[$k] = $v;

			icms_cp_header();
			echo getAdminMenu (1, '_AM_SWIKI_ACLADMIN_TXT');

			$aclConfirmDelete = new icms_form_elements_Checkbox(_AM_SWIKI_ACLNAME_FLD . ': ' . $prf->name, 'confirmchk');
			$aclConfirmDelete->addOption(1, _AM_SWIKI_DELCONFIRM_OPT);
			$aclConfirmDelete->setDescription(_AM_SWIKI_DELCONFIRM_TXT);
			$aclConfirmDelete->setExtra('onclick="document.forms.aclform.delbtn.style.display=(this.checked ? \'inline\' : \'none\')"');

			$aclRedir = new icms_form_elements_Select(_AM_SWIKI_DELREDIR_FLD, 'newprf');
			$aclRedir->addOptionArray($prflst);
			$aclRedir->setDescription(_AM_SWIKI_DELREDIR_TXT);

			$aclDelete = new icms_form_elements_Button('', 'delbtn', _AM_SWIKI_EDITACL_DELETE_BTN, 'submit');
			$aclDelete->setExtra ('style="display:none" onclick="document.forms.aclform.op.value=\'delete\'"');
			$aclCancel = new icms_form_elements_Button('', 'cancelbtn', _AM_SWIKI_EDITACL_CANCEL_BTN, 'submit');
			$btnTray = new icms_form_elements_Tray('');
			$btnTray->addElement($aclDelete);
			$btnTray->addElement($aclCancel);

			$form = new icms_form_Theme(_AM_SWIKI_DELCONFIRM_TXT, 'aclform', 'acladmin.php');
			$form->addElement($aclConfirmDelete);
			$form->addElement($aclRedir);
			$form->addElement($btnTray);
			$form->addElement(new icms_form_elements_Hidden('op', 'edit'));
			$form->addElement(new icms_form_elements_Hidden('prid', $prid));
			$form->display();

			icms_cp_footer();
			break;

		case 'delete' :
			if (isset($profile)) {
				$prid = (int) $profile;
			} elseif (isset($prid)) {
				$prid = (int) $prid;
			} else redirect_header ('acladmin.php', 2, _AM_SWIKI_ERRDELETE_MSG);

			$prf = new WiwiProfile();
			$prf->load($prid);
			$success = $prf->delete($newprf);

			redirect_header ('acladmin.php', 2, ($success ? _AM_SWIKI_PRFDELSUCCESS_MSG : _AM_SWIKI_PRFDELFAILED_MSG));
			break;

	}
}
