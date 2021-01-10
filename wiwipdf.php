<?php
/**
 * Create PDF for a page
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 */
include_once 'header.php';
require_once 'class/wiwiRevision.class.php';

/*
 * extract all header variables to corresponding php variables ---
 */
$page = '';
$allowed_getvars = array('page' => 'string');

$clean_GET = swiki_cleanVars($_GET, $allowed_getvars);
extract($clean_GET);

/**
 *
 * @param unknown $pageObj
 * @param unknown $pdf
 * @return boolean
 */
function printPage(&$pageObj, &$pdf) {
	global $icmsConfig;
	/*
	 * initialize template system (copied from /header.php)
	 */
	$wiwiTpl = new icms_view_Tpl();
	$wiwiTpl->caching = 0;
	if ($icmsConfig['debug_mode'] == 3) {
		$wiwiTpl->debugging = true;
	}
	$wiwiTpl->assign(array(
			'xoops_theme' => $icmsConfig['theme_set'],
			'xoops_imageurl' => ICMS_THEME_URL . '/' . $icmsConfig['theme_set'] . '/',
			'xoops_themecss' => xoops_getcss($icmsConfig['theme_set']),
			'xoops_requesturi' => htmlspecialchars($GLOBALS['xoopsRequestUri'], ENT_QUOTES),
			'xoops_sitename' => htmlspecialchars($icmsConfig['sitename'], ENT_QUOTES),
			'xoops_slogan' => htmlspecialchars($icmsConfig['slogan'], ENT_QUOTES)));
	// Meta tags
	$config_handler = &icms::handler('icms_config');
	$criteria = new icms_db_criteria_Compo(new icms_db_criteria_Item('conf_modid', 0));
	$criteria->add(new icms_db_criteria_Compo('conf_catid', ICMS_CONF_METAFOOTER));
	$config = &$config_handler->getConfigs($criteria, true);
	foreach (array_keys($config) as $i) {
		// prefix each tag with 'xoops_'
		$wiwiTpl->assign('xoops_' . $config[$i]->getVar('conf_name'), $config[$i]->getConfValueForOutput());
	}
	// unset($config);
	/*
	 * get content
	 */
	$pagecontent = $pageObj->render();
	$wiwiTpl->assign('swiki', array('keyword' => $pageObj->keyword, 'title' => $pageObj->title, 'body' => $pagecontent, 'lastmodified' => formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING), 'author' => xoops_getLinkedUnameFromId($pageObj->u_id),));
	ob_start();
	$wiwiTpl->caching = 0;
	$wiwiTpl->display('db:wiwimod_pdf.html');
	$html = ob_get_contents();
	ob_end_clean();
	error_reporting(E_ALL & ~E_NOTICE); // brrr, don't like that ..
	$pdf->AddPage();
	$pdf->WriteHTML($html);
	return true;
}

/**
 *
 * @param unknown $page
 * @param unknown $pdf
 * @param unknown $followLinks
 * @param unknown $retcode
 * @param unknown $printedPages
 * @return boolean
 */
function printPagesRecurr($page, &$pdf, $followLinks, &$retcode, &$printedPages) {
	if (in_array($page, $printedPages)) {
		return true; // -- prevent infinite loops ...
	} else {
		$printedPages[] = $page;
	}
	$pageObj = new wiwiRevision($page);
	if ($pageObj->id == 0) {
		$retcode = _MD_SWIKI_NOPAGE_MSG;
		return true; // at least one page didn't exist
	}
	if (!$pageObj->canRead()) {
		$retcode = _MD_SWIKI_NOREADACCESS_MSG;
		return true; // at least one page had restricted access
	}
	if (!printPage($pageObj, $pdf)) {
		$retcode = _MD_SWIKI_PDF_ERROR_MSG;
		return false;
	}
	$links = $pageObj->getLinks();
	foreach ($links as $lnk) {
		if ($lnk['isWiwiPage']) {
			printPagesRecurr($lnk['url'], $pdf, $followlinks, $retcode, $printedPages);
		}
		;
	}
	return true;
}
/**
 *
 * @param unknown $page
 * @param unknown $pdf
 * @param boolean $followLinks
 * @param unknown $retcode
 * @return boolean
 */
function printPages($page, &$pdf, $followLinks = true, &$retcode) {
	$printedPages = Array();
	$retcode = "";
	return printPagesRecurr($page, $pdf, $followLinks, $retcode, $printedPages);
}

/* from the core file include/pdf.php */
/**
 * Generates a pdf file
 *
 * @param string $content	The content to put in the PDF file
 * @param string $doc_title	The title for the PDF file
 * @param string $doc_keywords	The keywords to put in the PDF file
 * @return string Generated output by the pdf (@link TCPDF) class
 */
function swiki_Generate_PDF ($content, $doc_title, $doc_keywords) {
	global $icmsConfig;
	require_once ICMS_PDF_LIB_PATH.'/tcpdf.php';
	icms_loadLanguageFile('core', 'pdf');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'Letter', true); // hardcoded the format
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor(PDF_AUTHOR);
	$pdf->SetTitle($doc_title);
	$pdf->SetSubject($doc_title);
	$pdf->SetKeywords($doc_keywords);
	$sitename = $icmsConfig['sitename'];
	$siteslogan = $icmsConfig['slogan'];
	$pdfheader = icms_core_DataFilter::undoHtmlSpecialChars($sitename.' - '.$siteslogan);
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $pdfheader, ICMS_URL);

	//set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	$pdf->setLanguageArray($l); //set language items
	// set font - hardcoding for testing. ImpressCMS core has a config file that loads when the class is instantiated
	$TextFont = 'dejavusans';
	$pdf -> SetFont($TextFont);

	//initialize document
	$pdf->AddPage();
	$pdf->writeHTML($content, true, 0);
	return $pdf->Output($doc_title . '.pdf', 'D');
}

/* for now, hardcoding some constants that could vary by locale */

$pageObj = new wiwiRevision($page);
$content = $pageObj->body;
$renderedContent = $pageObj->render($content);
$doc_title = $pageObj->title;
$doc_keywords = $pageObj->meta_keywords;

/* using the core function
if (!Generate_PDF($renderedContent, $doc_title, $doc_keywords)) {
	redirect_header('index.php?page=' . $page, 2, $msg);
	exit();
}

*/
if (!swiki_Generate_PDF($renderedContent, $doc_title, $doc_keywords)) {
	redirect_header('index.php?page=' . $page, 2, $msg);
	exit();
}
