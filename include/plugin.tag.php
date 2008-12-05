<?php
/**
 * Tag info
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Sebastien Poivre (Gizmhail) <gizmhail@wanadoo.fr>, based on Taiwen Jiang (phppp or D.J.) work
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */
if (!defined('XOOPS_ROOT_PATH')){ exit(); }
 // the name of the function must match the folder name!
/**
 * Get item fields:
 * title
 * content
 * time
 * link
 * uid
 * uname
 * tags
 *
 * @var		array	$items	associative array of items: [modid][catid][itemid]
 *
 * @return	boolean
 * 
 */

function wiki_tag_iteminfo(&$items)
{
	if(empty($items) || !is_array($items)){
		return false;
	}
	$myts =& MyTextSanitizer::getInstance();
  //TODO : when the wiwimod database upgrade will be done, we'll be able to handle 
	// page directly in the database, so we won't need this inclusion anymore, and
	// we'll be able to use getObjects as normally, thus the request will be faster.
  include_once dirname(dirname(__FILE__)).'/class/wiwiRevision.class.php';	
	$items_id = array();
	foreach(array_keys($items) as $cat_id){
		// Some handling here to build the link upon catid
			// catid is not used in SimplyWiki, so just skip it
		foreach(array_keys($items[$cat_id]) as $item_id){
			// In SimplyWiki, the item_id is "pageid"
			$taggedPage =  new WiwiRevision('',0,$item_id);
                        $items[$cat_id][$item_id] = array(
                                'title'         => $myts->htmlSpecialChars( $taggedPage->title ) ,
                                'uid'           => $taggedPage->u_id,
                                'link'          => 'index.php?page='.urlencode($taggedPage->keyword),
                                'time'          => formatTimestamp(strtotime($taggedPage->lastmodified), _SHORTDATESTRING),
                                'content'       => '',
                                );
                }
	}
}
/* This will create a function with a name based on the installation directory, if it is not wiwimod */
$myInstallDir = basename(dirname(dirname(__FILE__)));
if (!function_exists($myInstallDir.'_tag_iteminfo')){
 $myfunc = 'function '.$myInstallDir.'_tag_iteminfo () { return wiki_tag_iteminfo();}';
 eval($myfunc);
}
/**
 * Remove orphan tag-item links
 *
 * @return	boolean
 * 
 */
function wiki_tag_synchronization($mid)
{
   //Optional	
}
?>