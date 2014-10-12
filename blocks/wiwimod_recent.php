<?php
/**
 * This block displays recent changes to Wiwi pages
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id: wiwimod_recent.php 23007 2011-11-22 17:20:33Z skenow $
 */

defined('ICMS_URL') || define('ICMS_URL', XOOPS_URL);
defined('ICMS_ROOT_PATH') || define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);

$wikiModDir = basename(dirname(dirname(__FILE__))) ;
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_recent ($options) {
	global $xoopsDB;
	$wikiModDir = basename(dirname(dirname(__FILE__))) ;
	$limit = (int) $options[0];
	$block = array();
	$myts =& MyTextSanitizer::getInstance();
	$sql = 'SELECT keyword, title, lastmodified, r.userid as u_id, prid, body, summary FROM ' //add body
		. $xoopsDB->prefix('wiki_pages') . ' p, ' . $xoopsDB->prefix('wiki_revisions') 
		. ' r WHERE p.pageid=r.pageid AND lastmodified=modified ORDER BY lastmodified DESC LIMIT ' 
		. $limit;
	$result = $xoopsDB->query($sql);

	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while ($content = $xoopsDB->fetcharray($result)) {
		$prf->load($content['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($content['keyword']);
			$link['title'] = $content['title'];
			if ($link['title'] == "") $link['title'] = $content['keyword'];
			if ($options[1] == TRUE)
			{
				$content['body'] = str_replace("[PageIndex]","",$content['body']);
				$content['body'] = str_replace("[recentchanges]","",$content['body']);
				$link['body'] = $content['body'];
			}
			if ($options[3] == TRUE)
			{
				$link['summary'] = $content['summary'];
			}	
			if ($options[4] == TRUE)
			{
				$link['lastmodified'] = formatTimestamp(strtotime($content['lastmodified']), _SHORTDATESTRING);
				$link['user'] = xoops_getLinkedUnameFromId($content['u_id']);
			}
			$block['links'][] = $link;
		}
	}
	$block['charnum'] = $options[2];	
	$block['dirname'] = $wikiModDir;
	return $block;
}
/**
 * Creates form for editing the block options
 * @param array $options Block options -
 * - $options[0] = number of pages to return
 * - $options[1] = show pages
 * - $options[2] = height of each page content
 * - $options[3] = show summary
 * - $options[4] = show author and date
 * @return string $form HTML for input options on the form
 */
function swiki_recent_blockedit ($options) {
	$form = _MB_SWIKI_NUM_DISP_DESC . "&nbsp;:&nbsp;<input type='text' name='options[0]' value='" . $options[0] . "' /><br />";
	//añadisos
	$form .=   _MD_SWIKI_BODY_FLD  ;
	$form .= '&nbsp;:&nbsp; <input type="radio" name="options[1]" value="1"';
	if ($options[1] == 1) 
	{
		$form .= ' checked="checked"';
	}
	$form .= '/> ' . _YES;
	$form .= ' <input type="radio" name="options[1]" value="0"';
	if ($options[1] == 0) 
	{
		$form .= 'checked="checked"';
	}
	$form .= '/> ' . _NO . '<br />';	
	
	$form .=   _MB_SWIKI_SHOW_CHARNUM;
	
	$form .=  	"&nbsp;:&nbsp; <input type='text' name='options[2]' value='" . $options[2] . "' /><br />";
	
	$form .=   _MI_SWIKI_REVISION_SUMMARY;
	$form .= '&nbsp;:&nbsp; <input type="radio" name="options[3]" value="1"';
	if ($options[3] == 1) 
	{
		$form .= ' checked="checked"';
	}
	$form .= '/> ' . _YES;
	$form .= ' <input type="radio" name="options[3]" value="0"';
	if ($options[3] == 0) 
	{
		$form .= 'checked="checked"';
	}
	$form .= '/> ' . _NO . '<br />';	
	$form .=   _MB_SWIKI_SHOW_AUTHOR ;
	$form .= '&nbsp;:&nbsp; <input type="radio" name="options[4]" value="1"';
	if ($options[4] == 1) 
	{
		$form .= ' checked="checked"';
	}
	$form .= '/> ' . _YES;
	$form .= ' <input type="radio" name="options[4]" value="0"';
	if ($options[4] == 0) 
	{
		$form .= 'checked="checked"';
	}
	$form .= '/> ' . _NO . '<br />';	
	return $form;
}
/*
$modversion['blocks'][] = array(
    'file' => 'quotes_rotator_quotes.php',
    'name' => _MI_QUOTES_ROTATION_QUOTES,
    'description' => _MI_QUOTES_ROTATION_QUOTESDSC,
    'show_func' => 'quotes_rotator_quotes_show',
    'edit_func' => 'quotes_rotator_quotes_edit',
    'options' => '5|0|300|6000|fade',
    'template' => 'quotes_rotator_quotes.html');
	*/