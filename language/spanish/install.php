<?php
/**
 * Language definitions used during installation of Wiwimod
 * 
 * @package Wiwimod
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
 /** include the modinfo constants, so we don't have to define them again (specifically, _MI_WIWIMOD_WIWIHOME) */
 include_once 'modinfo.php';

 define('_MI_WIWIMOD_PROFILE1','Contenido público');
 define('_MI_WIWIMOD_PROFILE2','Contenido público');
 define('_MI_WIWIMOD_PROFILE3','Contenido privado'); 
 define('_MI_WIWIMOD_WIWIHOME_TITLE','Pá?ina de inicio');

 define('_MI_WIWIMOD_WIWIHOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Bienvenido;<br />Esta es la página predeterminada de inicio de Wiwimod. Puede modificarla como desee. Para crear nuevas páginas, seleccione un nombre y colóquelo dentro de paréntesis de esta forma: ( [[ ). cuando guarda la página, los paréntesis serán cambiados por un enlace a su nueva página.</p>
     <p>Compruebe <a href=\'manual.html\' target=_blank>el manual</a> para obtener más información sobre las caracerísticas de edición, creación o modificación de páginas.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Pages index</td>
          <td bgcolor=\'#e4e4e4\'>Recently modified pages</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>