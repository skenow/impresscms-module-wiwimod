<?php

include("../../mainfile.php");
include(ICMS_ROOT_PATH."/header.php");

$meta_keywords = "simplywiki,manual,español";
$meta_description = "Manual en castellano de SimplyWiki - Módulo de wiki para ImpressCMS";
$pagetitle = "Manual de SimplyWiki";

if(isset($xoTheme) && is_object($xoTheme)) {
    $xoTheme->addMeta( 'meta', 'keywords', $meta_keywords);
    $xoTheme->addMeta( 'meta', 'description', $meta_description);
} else {   
    $icmsTpl->assign('xoops_meta_keywords', $meta_keywords);
    $icmsTpl->assign('xoops_meta_description', $meta_description);
}

$xoopsTpl->assign('xoops_pagetitle', $pagetitle);

//this will only work if your theme is using this smarty variables
$icmsTpl->assign( 'xoops_showlblock', 0); //set to 0 to hide left blocks
$icmsTpl->assign( 'xoops_showrblock', 0); //set to 0 to hide right blocks
$icmsTpl->assign( 'xoops_showcblock', 0); //set to 0 to hide center blocks
?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#tabs").tabs({ fx: [{opacity:'toggle', duration:'normal'},   // hide option
                        {opacity:'toggle', duration:'normal'}] }); // show option 
  });
</script>
<style type="text/css">
/*
 * jQuery UI CSS Framework 1.8.7
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Theming/API
 */


/* Component containers
----------------------------------*/
.ui-widget { font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif; font-size: 1.1em; }
.ui-widget .ui-widget { font-size: 1em; }
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif; font-size: 1em; }
.ui-widget-content { border: 1px solid #dddddd; background: #eeeeee url(images/ui-bg_highlight-soft_100_eeeeee_1x100.png) 50% top repeat-x; color: #333333; }
.ui-widget-content a { color: #333333; }
.ui-widget-header { border: 1px solid #e78f08; background: #f6a828 url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x; color: #ffffff; font-weight: bold; }
.ui-widget-header a { color: #ffffff; }

/* Interaction states
----------------------------------*/
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default { border: 1px solid #cccccc; background: #f6f6f6 url(images/ui-bg_glass_100_f6f6f6_1x400.png) 50% 50% repeat-x; font-weight: bold; color: #1c94c4; }
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { color: #1c94c4; text-decoration: none; }
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus { border: 1px solid #fbcb09; background: #fdf5ce url(images/ui-bg_glass_100_fdf5ce_1x400.png) 50% 50% repeat-x; font-weight: bold; color: #c77405; }
.ui-state-hover a, .ui-state-hover a:hover { color: #c77405; text-decoration: none; }
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active { border: 1px solid #fbd850; background: #ffffff url(images/ui-bg_glass_65_ffffff_1x400.png) 50% 50% repeat-x; font-weight: bold; color: #eb8f00; }
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { color: #eb8f00; text-decoration: none; }
.ui-widget :active { outline: none; }

/* Corner radius */
.ui-corner-tl { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; }
.ui-corner-tr { -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px; }
.ui-corner-bl { -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px; }
.ui-corner-br { -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px; }
.ui-corner-top { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px; }
.ui-corner-bottom { -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px; }
.ui-corner-right {  -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px; }
.ui-corner-left { -moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; -moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px; }
.ui-corner-all { -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; }

 * jQuery UI Tabs 1.8.7
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Tabs#theming
 */
.ui-tabs { position: relative; padding: .2em; zoom: 1; } /* position: relative prevents IE scroll bug (element with position: relative inside container with overflow: auto appear as "fixed") */
.ui-tabs .ui-tabs-nav { margin: 0; padding: .2em .2em 0; }
.ui-tabs .ui-tabs-nav li { list-style: none; float: left; position: relative; top: 1px; margin: 0 .2em 1px 0; border-bottom: 0 !important; padding: 0; white-space: nowrap; }
.ui-tabs .ui-tabs-nav li a { float: left; padding: .5em 1em; text-decoration: none; }
.ui-tabs .ui-tabs-nav li.ui-tabs-selected { margin-bottom: 0; padding-bottom: 1px; }
.ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a { cursor: text; }
.ui-tabs .ui-tabs-nav li a, .ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a { cursor: pointer; } /* first selector in group seems obsolete, but required to overcome bug in Opera applying cursor: text overall if defined elsewhere... */
.ui-tabs .ui-tabs-panel { display: block; border-width: 0; padding: 1em 1.4em; background: none; }
.ui-tabs .ui-tabs-hide { display: none !important; }

#Container {
                        width: 780px;
                        margin-left: auto;
                        margin-right: auto; 
                        margin-top:22px;
                }
                p, li {font-size:13px;line-height:150%;}
.ui-tabs .ui-tabs-nav li a {font-weight:bold;}
.ui-tabs .ui-tabs-nav {padding-left:13px;}
.box-table-a{font-family:"Lucida Sans Unicode", "Lucida Grande",
Sans-Serif;font-size:12px;width:95%;text-align:left;border-collapse:collapse;
margin:20px;}
.box-table-a th{font-weight:normal;background:#DADADA;border-top:4px solid
#C8C8C8;border-bottom:1px solid #fff;color:#4B4B4B;padding:8px;}
.box-table-a td{background:#F2F2F2;border-bottom:1px solid #fff;color:#4F4F4F;border-top:1px
solid transparent;padding:8px;}
.box-table-a tr:hover td{background:#EEEDED;color:#313131;}
 span.c8 {font-weight: bold; font-style: italic;}
 span.c7 {font-style:italic;}
 span.c6 {font-style: italic; font-weight: bold;}
 div.c5 {margin-left: 40px; text-align: center}
 td.c4 {vertical-align: top;}
 div.c3 {text-align: center}
 span.c2 {font-style: italic;}
 span.c1 {font-weight: bold;}
 #Title {
			font-family: Verdana, Arial;
			font-size: 22px;
			font-weight: bold;
			color: #ff9900;
			margin-bottom: 10px;
			text-shadow: 2px 2px 3px #aaa;
}
</style>
</head>
<body>
<div id="Container">
<div id="Title">Manual de SimplyWiki</div>
<div id="tabs">
<ul>
<li><a href="#presenta"><span>Presentación</span></a></li>
<li><a href="#pag"><span>Crear y organizar páginas</span></a></li>
<li><a href="#perfiles"><span>Perfiles y permisos</span></a></li>
<li><a href="#bloques"><span>Bloques</span></a></li>
<li><a href="#admin"><span>Administración</span></a></li>
</ul>
<div id="presenta">
<p>SimplyWiki es un módulo para ImpressCMS que proporciona un wiki para poder ser usado en tu sitio y admite el uso de editores HTML <a href="http://es.wikipedia.org/wiki/WYSIWYG" target="_blank">WISIWYG</a> (actualmente TinyMCE y FCKeditor). Asimismo permite personalizar los perfiles para acceder a cada página utilizando para ello los privilegios de los grupos de usuarios que se hayan creado.</p>
<p>Otras características que proporciona son:</p>
<ul>
<li>Jerarquía entre las páginas.</li>
<li>Historial de las revisiones y cambios, permitiendo comparar las distintas versiones de cada página e introducir un resumen explicativo de los cambios hechos.</li>
<li>Integración con el sistema de comentarios.</li>
<li>Sistema de notificaciones de cambios: se puede elegir recibir un mensaje privado o correo electrónico cuando una página sea modificada, cuando se escriba un comentario sobre la misma, para tener seguimiento de un contenido determinado o incluso cuando se modifique cualquier página.</li>
<li>Admite códigos de ImpressCMS.</li>
<li>Creación rápida de páginas, mediante un campo especial que se puede añadir en cualquier página o mediante un bloque específico</li>
<li>Integración con el módulo <em>Tags</em>, permitiendo usar etiquetas y mostrarlas en dos bloques especiales para ello. Nota: si se instala dicho módulo después que SimplyWiki, es necesario actualizar éste para que se muestren los bloques especiales de etiquetas.</li>
<li>Admite el uso de CAPTCHA.</li>
<li>Total flexibilidad a la hora de configurar los permisos de los usuarios, pudiéndose crear los perfiles que se deseen.</li>
<li>Contenido dinámico: se puede incluir cualquier bloque en cualquiera de las páginas creadas.</li>
<li>Personalización del nombre del módulo: renombrando la carpeta simplywiki con el nombre que quieras se mostrará el mismo en la barra de direcciones. Ejemplo: /tusitio/modules/wiki.</li>
</ul>
<p>Los <span class="c1">bloques</span> del módulo son también muy interesantes: <span class="c2">Tabla de contenido</span> muestra enlaces a un conjunto de subpáginas (puede usarse para relacionar capítulos o secciones); <span class="c2">Páginas recientes</span> contiene enlaces a las cinco que se hayan modificado más recientemente; <span class="c2">Contenido relacionado</span> proporciona enlaces a todas aquellas páginas que se haya elegido incluir en el mismo y <span class="c2">Mostrar página</span> permite incluir alguna de ellas como contenido de un bloque. Aparte de ellos hay dos bloques especiales para las etiquetas y otro para crear páginas con rapidez.<br>
Tienes información más amplia sobre todos ellos en la sección correspondiente de este manual.<br></p>
<p>El módulo se proporciona bajo la licencia <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GPL</a>,de forma que puede ser usado y modificado libremente mientras no se integre en productos comerciales.</p>
<p>El soporte del módulo está en la <a href="http://community.impresscms.org/modules/newbb/viewforum.php?forum=9" target="_blank">página de la Comunidad</a>.<br></p>
</div>
<div id="pag">
<h5>Crear una nueva página</h5>
<p>La forma básica es que cuando se intenta abrir una página que no existe, automáticamente aparece el formulario para la creación de páginas con el contenido en blanco. Basta con introducir el que se desee y guardar la página para que ya esté creada. Veámoslo detalladamente:<br></p>
<ul>
<li>Crea un enlace a la futura página. Todas se identifican con su nombre, que puede ser cualquier texto aunque se recomienda no usar nombres demasiado largos. Posteriormente se puede establecer un título para la página que sea más explícito. Por ejemplo: [[Nombre de la página]] o [[Nombre de la página | Texto del enlace]]<br>
Alternativamente puedes usar para ello <a href="http://es.wikipedia.org/wiki/CamelCase" target="_blank">CamelCase</a>: son dos o más palabras concatenadas que comienzan cada una de ellas con mayúscula; un ejemplo sería NuevaPágina. En tal caso basta con poner dicho texto sin corchetes para que al hacer clic en él aparezca el formulario de creación de páginas. De todas formas, es una opción un tanto anticuada que se usaba en los primeros tiempos de los wikis por las limitaciones de sus características; es recomendable no usarla.</li>
<li>Guarda la página en la que has introducido los enlaces para crear otras en la forma que hemos indicado y luego haz clic en ellos para crear las páginas.</li>
<li>Cuando se crea un enlace a una página no existente para poder crearla, aparece un icono para que se visualice rápidamente tal circunstancia.</li>
<li>Una forma muy interesante y fácil de crear nuevas páginas es usar una de las opciones existentes en las <em>Preferencias</em> del módulo; se trata de <em>Activar la característica de Añadir página</em>, en cuyo caso aparece un campo para poner el nombre de la página y un botón para crearla directamente.</li>
</ul>
<h5>Organización de las páginas</h5>
<p>Una de las materias más laboriosas al usar un wiki es mantener la jerarquía entre las páginas, su organización entre páginas principales y subpáginas de las mismas e introducir la información necesaria en cada una de ellas. Sin embargo, es algo necesario para que los usuarios puedan navegar fácilmente por el contenido.<br>
La solución del módulo a esta cuestión es añadir un campo especial en el formulario de creación o modificación de páginas; se trata de <span class="c2">Página superior (ésta será subpágina de la que indique)</span>. Usando dicha característica, cuando se navegue por el contenido se mostrará un enlace con la jerarquía o niveles de las diversas páginas que son superiores a la que se esté visualizando, permitiendo retroceder a cualquiera de ellas hasta que el enlace aparezca vacío, lo que significa que no hay páginas superiores a la que se esté visualizando. En caso de que no se indique nada en dicho campo, la página creada se considerará como principal (no confundir con la de inicio del módulo).<br></p>
<h5>Creación y modificación del contenido. Códigos especiales</h5>
<p>Cuando se crea o modifica una página se pueden usar los editores de texto que se hayan establecido como permitidos en la administración de cada uno de los grupos de usuarios y es posible, si son varios los disponibles, elegir cualquiera de ellos como indica el texto <span class="c2">clic derecho para cambiar de editor.</span><br>
En cuanto a la estructura o diseño de una página, las recomendaciones son las generales: usar formatos en los encabezados para diferenciar las secciones y subsecciones, no usar varios tipos de fuentes en la misma página ni demasiados colores, estructurar bien el contenido, etc.<br>
Lo que sí conviene tener muy en cuenta son los códigos especiales, bien sean para usar características especiales del módulo o para el formato del texto. Sí, yo también odio el formato wiki, pero la buena noticia es que no es imprescindible usar los códigos para la sintaxis con TynyMCE o FCKeditor, mientras que sí podemos servirnos de los útiles códigos especiales.<br></p>
<div class="c3">
<table class="box-table-a">
<thead>
<tr>
<th scope="col"><span class="c1">Códigos especiales</span></th>
<th scope="col"><span class="c1">Proporciona</span></th>
</tr>
</thead>
<tr valign="top">
<td width="30%">[[XBLK blockref]]</td>
<td width="70%">Esta etiqueta es reemplazada en el bloque con el correspondiente título o id del bloque.<br>
Importante: falta aún comprobar los permisos del usuario antes de mostrar el bloque, de modo que hay que tener cuidado.</td>
</tr>
<tr valign="top">
<td width="30%">[pagebreak]<br></td>
<td width="70%">Divide el contenido de una página al mostrarlo y aparecen los enlaces de paginación para poder visualizar las páginas anteriores y las posteriores.<br>
Para usar dicha característica con TinyMCE y ahorrarnos usar este código, hay un buen manual <a href="http://community.impresscms.org/modules/smartsection/item.php?itemid=498&amp;keywords=pagebreak+tinymce" target="_blank">aquí</a>.<br></td>
</tr>
<tbody>
<tr valign="top">
<td width="30%">&lt;[PageIndex]&gt;</td>
<td width="70%">Permite mostrar una lista alfabética de todas las páginas existentes.</td>
</tr>
<tr valign="top">
<td width="30%">&lt;[RecentChanges]&gt;</td>
<td width="70%">Muestra las veinte páginas que se hayan modificado recientemente.</td>
</tr>
<tr valign="top">
<td width="30%">Imágenes, archivos adjuntos, archivos de medios, etc.<br></td>
<td width="70%">Dependiendo del editor que se use,se pueden insertar contenidos de ese tipo en las páginas. Por ejemplo, TinyMCE tiene integración con el gestor de imágenes de ImpressCMS.<br></td>
</tr>
</tbody>
</table>
</div>
<div class="c3">
<table class="box-table-a">
<thead>
<tr>
<th scope="col"><span class="c1">Códigos para la sintaxis</span></th>
<th scope="col"><span class="c1">Proporciona</span></th>
</tr>
</thead>
<tbody>
<tr valign="top">
<td width="30%">&lt;&lt;text&gt;&gt;</td>
<td width="70%"><strong>Negrita</strong></td>
</tr>
<tr valign="top">
<td width="30%">{{text}}</td>
<td width="70%"><span class="c2">Cursiva</span><br></td>
</tr>
<tr valign="top">
<td width="30%">----</td>
<td width="70%">Regla horizontal</td>
</tr>
<tr valign="top">
<td width="30%">[[BR]]</td>
<td width="70%">Salto de línea</td>
</tr>
<tr valign="top">
<td width="30%">[[IMG url alt]]</td>
<td width="70%">Etiqueta para usar imágenes</td>
</tr>
<tr valign="top">
<td width="30%">[[url]] o [[url título]]<br></td>
<td width="70%">Enlace</td>
</tr>
<tr valign="top">
<td width="30%">[[título de la página]]<br></td>
<td width="70%">Enlace a otra página del wiki<br></td>
</tr>
<tr>
<td class="c4">[[título de la página | nombre del enlace]]<br></td>
<td class="c4">Enlace a otra página del wiki con un título especial para el nombre del enlace<br></td>
</tr>
<tr valign="top">
<td width="30%">Xxx@domain.ext</td>
<td width="70%">Enlace para enviar correo « mailto »</td>
</tr>
<tr valign="top">
<td width="30%">CamelCaseNombre</td>
<td width="70%">Enlace a la página creada usando dicha característica</td>
</tr>
<tr>
<td class="c4">~CamelCaseNombre<br></td>
<td class="c4">Escape para CamelCase: usando dicho código no se creará la página<br></td>
</tr>
<tr valign="top">
<td width="30%">=text=</td>
<td width="70%">Encabezado 2</td>
</tr>
<tr valign="top">
<td width="30%">&gt;text</td>
<td width="70%">Cita</td>
</tr>
<tr valign="top">
<td width="30%">*text</td>
<td width="70%">Listas</td>
</tr>
</tbody>
</table>
</div>
<div class="c5"></div>
</div>
<div id="perfiles">
<p>La administración de permisos del módulo está integrada con la de los grupos de usuarios, de modo que para que los miembros de unos de ellos puedan acceder al módulo hay que establecerlo así en el <span class="c2">Panel de control/Sistema/Grupos</span>.Lo mismo sucede con relación a los editores de texto que podrán usar los usuarios de cada grupo<br>
Una vez hecho se puede establecer en la sección de <span class="c2">Permisos</span> del módulo los correspondientes a cada una de las categorías de usuarios. Dicho de otra forma, cada grupo de usuarios de ImpressCMS que exista puede tener un tipo de permisos especial con relación al wiki, lo que es sencillamente genial.<br>
Son tres los perfiles existentes en el módulo<br></p>
<ul>
<li>Grupos con acceso de lectura: únicamente pueden visualizar las páginas.</li>
<li>Grupos con acceso de edición: pueden modificar la página que tenga un perfil que lo permita o crear nuevas páginas con dicho perfil de acceso.</li>
<li>Grupos administradores: tienen todos los privilegios. Evidentemente los tienen todos los usuarios del grupo de administradores de ImpressCMs; el añadido importante es que se puede establecer un perfil en el cual sean también administradores los usuarios de cualquier otro grupo con relación a las páginas creadas con dicho perfil. Los administradores pueden cambiar el perfil de una página por otro de su elección del que también tengan derechos de administrador.</li>
</ul>
<p>Cada perfil de acceso del módulo también permite determinar si se permiten comentarios a las páginas y el acceso al índice de revisiones de las mismas.<br>
El perfil inicial de una página es el de su página superior en la jerarquía.<br>
Ejemplo: podemos crear un perfil denominado <span class="c2">Acceso general</span>, en el cual el grupo de <span class="c2">Usuarios Anónimos</span> pueda visualizar las páginas creadas con el mismo, los registrados tengan acceso de creación y modificación de páginas y sólo el grupo Administradores tenga tales privilegios en el wiki. En el formulario de creación o modificación de una página aparece un campo desplegable que permite elegir el perfil de acceso que tendrá la misma.<br></p>
</div>
<div id="bloques">
<p>Los bloques existentes en el módulo son los siguientes:<br></p>
<ul>
<li><span class="c6">Tabla de contenido</span> muestra enlaces a un conjunto de subpáginas, de forma puede usarse para relacionar capítulos o secciones al modo de índice de una categoría de contenido. En el formulario de creación de cualquier página aparece <span class="c7">Visibilidad (0 para no mostrar en el bloque Tabla de contenido; otros números determinan su orden de presentación)</span>. Por ejemplo: si se fija un valor 1 para todas las páginas que no son subpáginas de otras (y a estos efectos serían <span class="c2">principales</span>) en el bloque se mostrarán todas ellas.</li>
<li><span class="c8">Páginas recientes</span> contiene enlaces a las cinco que se hayan modificado más recientemente.</li>
<li><span class="c8">Contenido relacionado</span> proporciona enlaces a todas aquellas páginas que se haya elegido incluir en el mismo introduciendo su nombre en el campo que se muestra en el formulario de creación de páginas; no es necesario que la misma exista en ese momento, puede crearse con posterioridad. El contenido del bloque depende de la página que se esté mostrando en cada momento, de forma que se parece a la característica de <span class="c2">Enlaces relacionados</span>.</li>
<li><span class="c6">Mostrar página</span> permite incluir alguna de ellas como contenido de un bloque. Sirve, por ejemplo, para incluir la misma como página de inicio de la web.</li>
<li><span class="c6">Añadir página</span> permite crear rápidamente una página mediante la introducción en el campo que se muestra del nombre de la misma.</li>
<li><span class="c6">Etiquetas</span> permite mostrar las etiquetas usadas en las páginas, permitiendo personalizar el número de las que se mostrarán, el tiempo a tener en cuenta para las estadísticas y el tamaño de la fuente.</li>
<li><span class="c6">Etiquetas del wiki</span> permite personalizar el número de las etiquetas a mostrar, el tiempo a tener en cuenta para las estadísticas y ordenar la forma de presentación (orden alfabético, clics hechos, fecha).</li>
</ul>
</div>
<div id="admin">
<p>El contenido de la administración del módulo es el siguiente:</p>
<div class="c3">
<table class="box-table-a">
<thead>
<tr>
<th scope="col"><span class="c1">Solapa</span></th>
<th scope="col"><span class="c1">Proporciona</span></th>
</tr>
</thead>
<tbody>
<tr valign="top">
<td width="10%">Página</td>
<td width="80%">Como administrador puedes ver el historial de cada página y restaurar la misma a una versión anterior o fijar un estado de forma que no se puede retroceder a otro anterior; para ello basta con borrar las revisiones anteriores.<br>
También es posible buscar entre todas las páginas existentes en función de varios criterios (nombre, título, importancia, perfil, etc.) o borrar cualquiera de ellas.<br>
Es una buena idea limpiar la base de datos de vez en cuando utilizando el botón existente: suprimirá todas las revisiones con más de dos meses de antiguedad; en función del número de revisiones o del contenido de la página es posible que se ocupe demasiado espacio innecesario en la base de datos, de hay la conveniencia de hacer limpieza.</td>
</tr>
<tr valign="top">
<td width="20%">Permisos</td>
<td width="80%">En esta sección se gestionan todos los permisos para la visualización, creación o modificación de las páginas. Se pueden crear todos los perfiles que sean necesarios y establecer los permisos que se deseen con relación a cualquier grupo de usuarios.<br>
De forma predeterminada el módulo contiene tres perfiles cuando se instala, los cuales se pueden modificar.</td>
</tr>
<tr valign="top">
<td width="30%">Preferencias</td>
<td width="70%">No es necesario detallar todas las opciones posibles porque hay un texto de ayuda disponible para cada una de ellas; tan sólo diremos que con relación a la característica <em>Mostrar el icono de creación de archivos PDF</em> es mejor no activarla hasta que se integre la librería TCPDF del núcleo en el módulo, puesto que no se muestran correctamente los acentos o los caracteres especiales del castellano.</td>
</tr>
<tr valign="top">
<td width="30%">Bloques y grupos</td>
<td width="70%">Permite cambiar el nombre de los bloques, determinar su posición en la página, su importancia, el cache y los permisos de visualización de los mismos.</td>
</tr>
<tr valign="top">
<td width="30%">Acerca de...<br></td>
<td width="70%">Contiene información general sobre el módulo, permite actualizar desde versiones anteriores y los enlaces a este manual y a las notas de la versión del módulo.<br></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>

<?php
include(XOOPS_ROOT_PATH."/footer.php");
?>