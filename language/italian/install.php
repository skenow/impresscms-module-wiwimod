<?php
/**
 * Language definitions used during installation of SimplyWiki
 * 
 * @package SimplyWiki
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version   
 */
 /** include the modinfo constants, so we don't have to define them again (specifically, _MI_SWIKI_HOME) */
 include_once 'modinfo.php';

define ( '_MI_SWIKI_PROFILE1', 'Contenuto aperto');
 define ( '_MI_SWIKI_PROFILE2', 'Contenuto pubblico');
 define ( '_MI_SWIKI_PROFILE3', 'Contenuto privato');
 define ( '_MI_SWIKI_HOME_TITLE', 'La tua home page SimplyWiki');

 define ( '_MI_SWIKI_HOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Benvenuti;<br />Questa è la tua home page predefinita. Sentitevi liberi di modificarla.
     Per creare nuove pagine, digita dovunque in una pagina e racchiudi il testo con doppie parentesi quadre ( [[ ).
     Quando si salva questa pagina, le parentesi saranno sostituite da un link alla tua nuova pagina. </ P>
     <p> Controlla <a href=\'http://www.simplywiki.org/modules/wiki/index.php?page=Wiki+Help\' target=_blank>il manuale</a> per un approfondimento della caratteristica.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Pagina indice</td>
          <td bgcolor=\'#e4e4e4\'>Pagine recentemente modificate</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>