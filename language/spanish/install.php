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

 define('_MI_SWIKI_PROFILE1','Contenido público');
 define('_MI_SWIKI_PROFILE2','Contenido público2');
 define('_MI_SWIKI_PROFILE3','Contenido privado');
 define('_MI_SWIKI_HOME_TITLE','Inicio');

 define('_MI_SWIKI_HOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Bienvenido;<br />Esta es la página predeterminada de inicio de SimplyWiki; puede modificarla como desee. Para crear nuevas páginas seleccione un nombre y colóquelo dentro de paréntesis de esta forma: [[nombre de la página]]. Cuando guarde la página, los paréntesis serán cambiados por un enlace a su nueva página.</p>
     <p>Compruebe el <a href=\'languages/spanish/http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=_blank>manual</a> para obtener más información sobre las caracerísticas de edición, creación o modificación de páginas.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Índice</td>
          <td bgcolor=\'#e4e4e4\'>Páginas recientemente modificadas</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>