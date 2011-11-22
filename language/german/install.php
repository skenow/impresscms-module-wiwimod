<?php
/**
 * Language definitions used during installation of SimplyWiki
 * 
 * @package SimplyWiki
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
 /** include the modinfo constants, so we don't have to define them again (specifically, _MI_SWIKI_HOME) */
 include_once 'modinfo.php';

 define('_MI_SWIKI_PROFILE1','Offener Inhalt');
 define('_MI_SWIKI_PROFILE2','Öffentlicher Inhalt');
 define('_MI_SWIKI_PROFILE3','Privater Inhalt'); 
 define('_MI_SWIKI_HOME_TITLE','Ihre SimplyWiki Startseite');

 define('_MI_SWIKI_HOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Willkommen;<br />Das ist die Wiwi-Standard-Startseite. Fühlen Sie sich frei zu bearbeiten und zu verändern. 
     So erstellen Sie neue Seiten, geben Sie in jedem Ort einer Seite einem Name und setzen es mit doppelten eckigen Klammern ( [[ ). 
     Wenn Sie diese Seite speichern, die Klammern werden durch einen Link zu Ihrer neuen Seite ersetzt.</p>
     <p>Check <a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=_blank>the manual</a> for an in depth view of editing features.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Pages index</td>
          <td bgcolor=\'#e4e4e4\'>Recently modified pages</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>