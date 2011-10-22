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

 define('_MI_SWIKI_PROFILE1','محتوای آزاد');
 define('_MI_SWIKI_PROFILE2','محتوای عمومی');
 define('_MI_SWIKI_PROFILE3','محتوای خصوصی'); 
 define('_MI_SWIKI_HOME_TITLE','صفحه‌ی آغاز ویوی');

 define('_MI_SWIKI_HOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>خوش آمدید؛<br />این صفحه‌ی پیشفرض ویوی می‌باشد. شما می‌تانید با خیال راحت این را ویرایش کنید و تغییر دهید. 
     To create new pages, type in anywhere a page name and surround it with double square brackets ( [[ ). 
     When you save this page, the brackets will be replaced by a link to your new page.</p>
     <p>Check <a href=\'manual.html\' target=_blank>the manual</a> for an in depth view of editing features.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>فهرست صفحات</td>
          <td bgcolor=\'#e4e4e4\'>آخرین صفحات تغییر یافته</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[فهرست]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[آخرین تغییرات]&gt;</td></tr></tbody></table>
     </p>");
?>