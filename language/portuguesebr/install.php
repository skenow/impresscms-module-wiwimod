<?php
/**
 * Portuguese Language definitions used during installation of SimplyWiki
 * 
 * @package SimplyWiki
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 * Translation: GibaPhp - http://br.impresscms.org
 */
 /** include the modinfo constants, so we don't have to define them again (specifically, _MI_SWIKI_HOME) */
 include_once 'modinfo.php';
 
 define('_MI_SWIKI_PROFILE1','Conteúdo Aberto');
 define('_MI_SWIKI_PROFILE2','Conteúdo Público');
 define('_MI_SWIKI_PROFILE3','Conteúdo Privado');
 define('_MI_SWIKI_HOME_TITLE','Sua página principal no SimplyWiki');

 define('_MI_SWIKI_HOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Bemvindo;<br />Este é a página padrão deste Wiki. Sinta-se livre para editar e modificar esta página. 
     Para criar novas páginas, você precisa apenas incluir em qualquer lugar na sua página um colhete duplo ( [[ ). 
     Quando você salvar esta página, os parênteses ou colchetes serão substituídos por um link para sua nova página.</p>
     <p>Verificar <a href=\'manual.html\' target=_blank>o manual</a> para uma visão mais profunda sobre os recursos de edição neste Wiki.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Índice das Páginas</td>
          <td bgcolor=\'#e4e4e4\'>Páginas modificadas Recentemente</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>