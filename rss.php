<?php
/**
 * Generating an RSS feed
 *
 * @copyright	http://smartfactory.ca The SmartFactory
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		SimplyWiki 1.2
 * @package		SimplyWiki
 * @version		$Id: rss.php 24663 2012-10-26 19:41:43Z skenow $
 */
/** Include the module's header for all pages */
include_once 'header.php';
/** Include the header for the site */
include_once ICMS_ROOT_PATH . '/header.php';

$clean_author = isset($_GET['author']) ? (int) $_GET['author'] : FALSE;
$clean_type = isset($_GET['type']) ? $_GET['type'] : FALSE;

$module_name = $icmsModule->name();

/** Include the core rss class and create a new feed instance */
include_once ICMS_ROOT_PATH . '/class/icmsfeed.php';
$wiki_feed = new IcmsFeed();

$wiki_feed->title = $module_name . ' - ' . $icmsConfig['sitename'];
$wiki_feed->url = ICMS_URL. '/modules/' . $wikiModDir . '/';
$wiki_feed->description = $icmsConfig['slogan'];
$wiki_feed->language = _LANGCODE;
$wiki_feed->charset = _CHARSET;
$wiki_feed->category = $module_name;

/** Include the SimplyWiki class and create a new instance */
include_once 'class/wiwiRevision.class.php';
$wiki_page_handler = new WiwiRevisionHandler();

/** Establish a handler for determining the page author */
$wiki_author_handler = new XoopsMemberHandler($xoopsDB);

$pages = $wiki_page_handler->getRevisions($clean_author, $clean_type);

foreach($pages as $page) {
	$wiki_feed->feeds[] = array (
		'title' => $page->title,
		'link' => str_replace('&', '&amp;', ICMS_URL . '/modules/' . $wikiModDir . '/index.php?page=' . $page->keyword),
		'description' => htmlspecialchars(str_replace('&', '&amp;', ICMS_URL . '/modules/' . $wikiModDir . '/index.php?page=' . $page->keyword), ENT_QUOTES),
		'pubdate' => $page->lastmodified,
		'guid' => str_replace('&', '&amp;', ICMS_URL . '/modules/' . $wikiModDir . '/index.php?page=' . $page->keyword),
		'category' => $module_name,
		'author' => $wiki_author_handler->getUser($page->creator)->uname()
	);
}

$wiki_feed->render();
