<?php
/**
 * Block admin for SimplyWiki
 *
 * @todo Get the core block admin form so it is always current
 * @package SimplyWiki
 * @author GIJOE <http://www.peak.ne.jp/>
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

/** include the control panel header */
include_once '../../../include/cp_header.php' ;

/** include the group permissions form */
include_once 'mygrouppermform.php';
/** include the blocks class */
include_once ICMS_ROOT_PATH . '/class/xoopsblock.php'; /* for backwards compatibility through ICMS 1.1.3 */
//include_once ICMS_ROOT_PATH.'/kernel/block.php';

$xoops_system_path = ICMS_ROOT_PATH . '/modules/system' ;

// language files
$language = $xoopsConfig['language'] ;
if( ! file_exists( $xoops_system_path.'/language/'.$language.'/admin/blocksadmin.php') ) $language = 'english' ;

// to prevent from notice that constants already defined
$error_reporting_level = error_reporting( 0 ) ;
include_once $xoops_system_path. '/constants.php';
include_once $xoops_system_path.'/language/'.$language.'/admin.php';
include_once $xoops_system_path.'/language/'.$language.'/admin/blocksadmin.php';
error_reporting( $error_reporting_level ) ;

$group_defs = file( $xoops_system_path.'/language/'.$language.'/admin/groups.php' ) ;
foreach( $group_defs as $def ) {
	if( strstr( $def , '_AM_ACCESSRIGHTS' ) || strstr( $def , '_AM_ACTIVERIGHTS' ) ) eval( $def ) ;
}

// check $xoopsModule
if( ! is_object( $xoopsModule ) ) redirect_header( ICMS_URL.'/user.php' , 1 , _NOPERM ) ;

// check access right (needs system_admin of BLOCK)
$sysperm_handler =& xoops_gethandler('groupperm');
if (!$sysperm_handler->checkRight('system_admin', XOOPS_SYSTEM_BLOCK, $xoopsUser->getGroups())) redirect_header( ICMS_URL.'/user.php' , 1 , _NOPERM ) ;

// get blocks owned by the module
if ( defined('ICMS_VERSION_BUILD') && ICMS_VERSION_BUILD > 27  ) { /* ImpressCMS 1.2+ */
	$block_handler =& xoops_gethandler ('block');
	$block_arr = $block_handler->getByModule ($xoopsModule->mid());
} else { /* legacy support */
	$block_arr = XoopsBlock::getByModule( $xoopsModule->mid() ) ; /* from class/xoopsblock.php */
}
/**
 * List and display the blocks and their options - this function is also found in system/admin/blocksadmin/blocksadmin.php
 *
 */
function list_blocks()
{
	global $block_arr, $block_handler;

	// cachetime options
	$cachetimes = array('0' => _NOCACHE, '30' => sprintf(_SECONDS, 30), '60' => _MINUTE, '300' => sprintf(_MINUTES, 5), '1800' => sprintf(_MINUTES, 30), '3600' => _HOUR, '18000' => sprintf(_HOURS, 5), '86400' => _DAY, '259200' => sprintf(_DAYS, 3), '604800' => _WEEK, '2592000' => _MONTH);

	// displaying TH
	echo "
	<form action='admin.php' name='blockadmin' method='post'>
		<table width='90%' class='outer' cellpadding='4' cellspacing='1'>
		<tr valign='middle'>
			<th>"._AM_TITLE."</th>
			<th align='center' nowrap='nowrap'>"._AM_SIDE."</th>
			<th align='center'>"._AM_WEIGHT."</th>
			<th align='center'>"._AM_VISIBLEIN."</th>
			<th align='center'>"._AM_BCACHETIME."</th>
			<th align='center'>"._AM_VISIBLE."</th>
			<th align='right'>"._AM_ACTION."</th>
		</tr>\n" ;
	//  if (method_exists('XoopsBlock','getBlockPositions')) {echo 'You are using ImpressCMS and can have custom block positions<br />';}
	//	if (file_exists(ICMS_ROOT_PATH.'/kernel/page.php')) {echo 'You are using ImpressCMS 1.1 and can have custom page links <br />';}
	$adv_blocks = method_exists('XoopsBlock','getBlockPositions');
	$adv_pages = @file_exists(ICMS_ROOT_PATH.'/kernel/page.php');
	// blocks displaying loop
	$class = 'even' ;
	foreach( array_keys( $block_arr ) as $i ) {
		$weight = $block_arr[$i]->getVar('weight') ;
		$title = $block_arr[$i]->getVar('title') ;
		$name = $block_arr[$i]->getVar('name') ;
		$bcachetime = $block_arr[$i]->getVar('bcachetime') ;
		$bid = $block_arr[$i]->getVar('bid') ;
		$yvisible = $nvisible = $ystyle = $nstyle = '';
		$yvisible = ($block_arr[$i]->getVar('visible') == 1 ? "checked='checked'" : '' );
		$nvisible = ($block_arr[$i]->getVar('visible') == 1 ? '' : "checked='checked'" );
		if ( $yvisible ) { $ystyle = 'style="background-color: #00FF00;"';
		$class = 'style="background-color: #E3F5E3; color:inherit; border: 1px solid #CCCCCC; padding: 2px;"'; }
		if ( $nvisible ) { $nstyle = 'style="background-color: #FF0000;"';
		$class = 'style="background-color: #F5E3E3; color:inherit; border: 1px solid #CCCCCC; padding: 2px;"';}
		$side_options = '';
		$editLink = ICMS_URL . '/modules/system/admin.php?fct=blocksadmin&amp;op=edit&amp;bid=' ;
		// Block positions - XOOPS 2.0.x, 2.3.x, 2.4.x
		if (!$adv_blocks){
			$new_sides = array (
			XOOPS_SIDEBLOCK_LEFT => _AM_SBLEFT,
			XOOPS_SIDEBLOCK_RIGHT => _AM_SBRIGHT,
			XOOPS_CENTERBLOCK_LEFT => _AM_CBLEFT,
			XOOPS_CENTERBLOCK_RIGHT => _AM_CBRIGHT,
			XOOPS_CENTERBLOCK_CENTER => _AM_CBCENTER,
			XOOPS_CENTERBLOCK_BOTTOMLEFT => _AM_CBBOTTOMLEFT,
			XOOPS_CENTERBLOCK_BOTTOMRIGHT => _AM_CBBOTTOMRIGHT,
			XOOPS_CENTERBLOCK_BOTTOM => _AM_CBBOTTOM );
		} else {
			/* Block positions and edit link - ImpressCMS 1.0+ */
			if ( defined('ICMS_VERSION_BUILD') && ICMS_VERSION_BUILD > 27  ) { /* ImpressCMS 1.2+ */
				$posarr = $block_handler->getBlockPositions (true);
				$editLink = ICMS_URL . '/modules/system/admin.php?fct=blocksadmin&amp;op=mod&amp;bid=' ;
			} else {
				$posarr = XoopsBlock::getBlockPositions ( true );
			}
			$new_sides = array ( );
			foreach ( $posarr as $k => $v ) {
				$titl = (defined ( $posarr [$k] ['title'] )) ? constant ( $posarr [$k] ['title'] ) : $posarr [$k] ['title'];
				$new_sides [$k] = $titl;
			}
		}

		foreach ( $new_sides as $sidenum => $sidename ) {
			if ($block_arr[$i]->getVar('side') == $sidenum){
				$side_options .= "<option value='$sidenum' selected='selected'>$sidename</option>";
			} else {
				$side_options .= "<option value='$sidenum' >$sidename</option>";
			}
		}

		// bcachetime
		$cachetime_options = '' ;
		foreach( $cachetimes as $cachetime => $cachetime_name ) {
			if( $bcachetime == $cachetime ) {
				$cachetime_options .= "<option value='$cachetime' selected='selected'>$cachetime_name</option>" ;
			} else {
				$cachetime_options .= "<option value='$cachetime'>$cachetime_name</option>" ;
			}
		}

		$db =& Database::getInstance();
		if (!$adv_pages){
			// target modules - XOOPS 2.0.x, 2.3.x, 2.4.x and ImpressCMS 1.0.x
			$result = $db->query( 'SELECT module_id FROM '.$db->prefix('block_module_link').' WHERE block_id="'.$bid.'"' ) ;
			$selected_mids = array();
			while ( list( $selected_mid ) = $db->fetchRow( $result ) ) {
				$selected_mids[] = (int) $selected_mid ;
			}
			$module_handler =& xoops_gethandler('module');
			$criteria = new CriteriaCompo(new Criteria('hasmain', 1));
			$criteria->add(new Criteria('isactive', 1));
			$module_list =& $module_handler->getList($criteria);
			$module_list[-1] = _AM_TOPPAGE;
			$module_list[0] = _AM_ALLPAGES;
			ksort($module_list);
			$module_options = '' ;
			foreach( $module_list as $mid => $mname ) {
				if( in_array( $mid , $selected_mids ) ) {
					$module_options .= "<option value='$mid' selected='selected'>$mname</option>" ;
				} else {
					$module_options .= "<option value='$mid'>$mname</option>" ;
				}
			}
		} else {
			/* target modules/pages - ImpressCMS 1.1+ */
			$result = $db->query( 'SELECT module_id, page_id FROM '.$db->prefix('block_module_link').' WHERE block_id="'.$bid.'"' ) ;
			$selected_mids = array();
			while ( $row = $db->fetchArray( $result ) ) {
				$selected_mids[] = (int)$row['module_id'].'-'.(int)$row['page_id'];
			}
			$page_handler = & xoops_gethandler ( 'page' );
			$module_options = $page_handler->getPageSelOptions ( $selected_mids );
		}

		// displaying part
		echo "
		<tr valign='middle'>
			<td $class align='center'>
				<strong>$name</strong>
				<br />
				<input type='text' name='title[$bid]' value='$title' size='20' />
			</td>
			<td $class align='center' nowrap='nowrap'>
				<select name='side[$bid]' size='5' >
				$side_options
				</select>
			</td>
			<td $class align='center'>
				<input type='text' name='weight[$bid]' value='$weight' size='5' maxlength='5' style='text-align:right;' />
			</td>
			<td $class align='center'>
				<select name='bmodule[$bid][]' size='5' multiple='multiple'>
				$module_options
				</select>
			</td>
			<td $class align='center'>
				<select name='bcachetime[$bid]' size='1'>
				$cachetime_options
				</select>
			</td>
			<td $class align='center'>
			  <input type='radio' name='visible[$bid]' $ystyle value='1' $yvisible />" . _YES . "&nbsp;
                 <input type='radio' name='visible[$bid]' $nstyle value='0' $nvisible />" . _NO . "
                 <input type='hidden' name='oldvisible[$bid]' value='" . $block_arr[$i] -> getVar( 'visible' ) . "' />
               </td>
			<td $class align='center'>
				<a href = '" . $editLink . $bid . "'>" . _EDIT . "</a>
				<input type='hidden' name='bid[$bid]' value='$bid' />
			</td>
		</tr>\n";

				$class = ( $class == 'even' ) ? 'odd' : 'even' ;
	}

	echo "
		<tr>
			<td class='foot' align='center' colspan='7'>
				<input type='hidden' name='fct' value='blocksadmin' />
				<input type='hidden' name='op' value='order' />
				<input type='submit' name='submit' value='"._SUBMIT."' />
			</td>
		</tr>
		</table>
	</form>\n" ;
}

function list_groups()
{
	global $xoopsModule , $block_arr ;

	foreach( array_keys( $block_arr ) as $i ) {
		$item_list[ $block_arr[$i]->getVar("bid") ] = $block_arr[$i]->getVar("title") ;
	}

	$form = new MyXoopsGroupPermForm( _MD_AM_ADGS , 1 , 'block_read' , '' ) ;
	$form->addAppendix('module_admin',$xoopsModule->mid(),$xoopsModule->name().' '._AM_ACTIVERIGHTS);
	$form->addAppendix('module_read',$xoopsModule->mid(),$xoopsModule->name().' '._AM_ACCESSRIGHTS);
	foreach( $item_list as $item_id => $item_name) {
		$form->addItem( $item_id , $item_name ) ;
	}
	echo $form->render() ;
}

if( ! empty( $_POST['submit'] ) ) {
	include 'mygroupperm.php';
	redirect_header( ICMS_URL.'/modules/'.$xoopsModule->dirname().'/admin/myblocksadmin.php' , 1 , _MD_AM_DBUPDATED );
}

include '../include/functions.php';
icms_cp_header() ;
if (method_exists($xoopsModule, 'displayAdminMenu')) {
	echo $xoopsModule->displayAdminMenu (3,_AM_SWIKI_BLOCKSNGROUPS_NAV);
} else {
	echo getAdminMenu (3,_AM_SWIKI_BLOCKSNGROUPS_NAV);
}
if( file_exists( './mymenu.php' ) ) include( './mymenu.php' ) ;

xoops_error("This feature is being deprecated and will soon be unavailable", "");
echo "<h3 style='text-align:left;'>".$xoopsModule->name()."</h3>\n" ;
echo "<h4 style='text-align:left;'>"._AM_BADMIN."</h4>\n" ;
list_blocks() ;
list_groups() ;
icms_cp_footer() ;
