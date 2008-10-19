<?php
/**
 * Language definitions used during installation of Wiwimod
 * 
 * @package Wiwimod
 * @author skenow <skenow@impresscms.org>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
 /** include the modinfo constants, so we don't have to define them again (specifically, _MI_WIWIMOD_WIWIHOME) */
 include_once 'modinfo.php';

 define('_MI_WIWIMOD_PROFILE1','Open Content');
 define('_MI_WIWIMOD_PROFILE2','Public Content');
 define('_MI_WIWIMOD_PROFILE3','Private Content'); 
 define('_MI_WIWIMOD_WIWIHOME_TITLE','Your Wiwi home page');

 define('_MI_WIWIMOD_WIWIHOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Welcome;<br />This is Wiwi\'s default home page. Feel free to edit and modify it. 
     To create new pages, type in anywhere a page name and surround it with double square brackets ( [[ ). 
     When you save this page, the brackets will be replaced by a link to your new page.</p>
     <p>Check <a href=\'manual.html\' target=_blank>the manual</a> for an in depth view of editing features.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Pages index</td>
          <td bgcolor=\'#e4e4e4\'>Recently modified pages</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>