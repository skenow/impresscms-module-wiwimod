<?php
/**
 * Revision class of SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

if (!defined('ICMS_ROOT_PATH')) exit();
// @todo is this only here to keep the class from being declared twice?
if (defined('_SWIKIPAGE')) exit();

define('_SWIKIPAGE', 1);

include_once 'wiwiProfile.class.php';

$wikiModDir = basename(dirname(__DIR__));
if (function_exists('icms_loadLanguageFile')) {
	icms_loadLanguageFile($wikiModDir, "main");
} else {
	global $icmsConfig;
	if (file_exists(ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/' . $icmsConfig['language'] . '/main.php')) {
		include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/' . $icmsConfig['language'] . '/main.php';
	} else {
		include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/english/main.php';
	}
}

/**
 *
 *
 * @category
 * @package
 * @subpackage
 */
class WiwiRevision {

	/** the CamelCase code of the page */
	public $keyword;
	/** title of the page */
	public $title;
	/** content of the page */
	public $body;
	/** date the page was last modified */
	public $lastmodified;
	/** user id of last author */
	public $u_id;
	/** CamelCase code of the parent page */
	public $parent;
	/** weight of the revision in TOC block */
	public $visible;
	/** CamelCase code of the page to be shown in the side block */
	public $contextBlock;
	/** id of the initial revision (necessary to keep comments visible) */
	public $pageid;
	/** the current revision profile (@link WiwiProfile) */
	public $profile;
	/** revision unique id. */
	public $id;

	/** reference to the database connection */
	private $db;
	/** reference to the text sanitizer */
	private $ts;
	/** used to get SimplyWiki configs, even when called from other modules */
	private $swikiConfig;
	/** revision summary */
	public $summary;
	/** number of times the page was viewed */
	public $views;
	/** creator of the page */
	public $creator;
	/** create datetime of the page */
	public $created;
	/** number of revisions of this page, also the latest revision of the page */
	public $revisions;
	/** last time the page was accessed */
	public $lastviewed;
	/** whether to allow comments or not for the page */
	public $allowComments;
	/** Base directory for the module */
	/* custom meta keywords */
	public $meta_keywords;
	/* custom meta_description */
	public $meta_description;
	
	private $_dir;
	/** Base URL for the module */
	private $_url;

	/**
	 * Constructor.
	 * Loads revision from database :
	 *    - loads requested revision if $id is provided ;
	 *    - loads latest revision of page if $id isn't provided
	 *		Note : in this case, $page can be either the page CamelCase keyword,
	 *             or the corresponding pageid field (which both are common to
	 *             all page revisions.
	 * @param	string $page page keyword
	 * @param	int $id revision number of the page
	 * @param	int $pageid id for the page
	 */
	public function __construct($page = NULL, $id = 0, $pageid = 0) {
		if ($page == '') $page = NULL;

		$this->db = icms_db_Factory::instance();
		$this->ts = icms_core_Textsanitizer::getInstance();
		$this->_dir = basename(dirname(__DIR__));
		$this->_url = ICMS_URL . '/modules/' . $this->_dir . '/';

		$modhandler =& icms::handler('icms_module');
		$config_handler =& icms::handler('icms_config');
		$SimplyWiki = $modhandler->getByDirname($this->_dir);
		$this->swikiConfig =& $config_handler->getConfigsByCat(0, $SimplyWiki->getVar('mid'));
		$this->keyword = $page;
		$this->title = '';
		$this->body = '';
		$this->lastmodified = null;
		$this->u_id = 0;
		$this->parent = '';
		$this->visible = 0;
		$this->contextBlock = '';
		$this->pageid = $pageid;
		$this->profile = new wiwiProfile(); // loads an empty profile
		$this->id = 0;
		$this->summary = '';
		$this->views = 0;
		$this->creator = 0;
		$this->created = null;
		$this->revisions = 0;
		$this->lastviewed = null;
		$this->allowComments = '1';
		$this->meta_keywords = '';
		$this->meta_description = '';
		
		/* new SQL, based on the new tables */
		$sql = 'SELECT * FROM '. $this->db->prefix('wiki_pages') . ' p INNER JOIN '
				. $this->db->prefix('wiki_revisions') .' r ON p.pageid = r.pageid';
		if ($id != 0) {
			$sql .= ' WHERE revid = '. $id;
		} elseif ($page !== NULL  ) {
			$sql .= ' WHERE p.lastmodified = r.modified AND keyword="' . icms_core_DataFilter::addSlashes($page) . '" ';
		} elseif ($pageid != 0) {
			$sql .= ' WHERE p.lastmodified = r.modified AND p.pageid=' . $pageid;
		} else {
			$sql = '';
		}
		/* end of the new SQL */

		if ($sql != '') {
			$result = $this->db->query($sql);
			if ($this->db->getRowsNum($result) == 0) return false;
			$row = $this->db->fetchArray($result);
			$this->keyword = $row['keyword'];
			$this->title = $row['title'];
			$this->body = $row['body'];
			$this->lastmodified = $row['lastmodified'];
			$this->u_id = $row['userid'];
			$this->parent = $row['parent'];
			$this->visible = $row['visible'];
			$this->contextBlock = $row['contextBlock'];
			$this->pageid = $row['pageid'];
			$this->id = $row['revid'];
			$this->profile = new wiwiProfile($row['prid'] != 0 ? $row['prid'] : WiwiProfile::getDefaultProfileId());
			$this->summary = $row['summary'];
			$this->views = $row['views'];
			$this->creator = $row['creator'];
			$this->created = $row['createdate'];
			$this->revisions = $row['revisions'];
			$this->lastviewed = $row['lastviewed'];
			$this->allowComments = $row['allowComments'];
			$this->meta_keywords = $row['meta_keywords'];
			$this->meta_description = $row['meta_description'];
		}
		
		return $this;
	}

	/**
	 * Creates a new revision from current object.
	 * @todo	remove cached version of page after successfully updating a revision
	 */
	public function add() {
		//$this->created, in a format that MySQL can handle. In PHP 5.1.1+, this can be date(DATE_ATOM) or date(DATE_W3C)
		$add_date = date('Y/n/j G:i:s');
		// only insert into the pages table if it is the first revision
		if ($this->pageid == 0) {
			$sql = sprintf(
					"INSERT INTO %s (keyword, title, lastmodified, parent, visible, prid, creator, createdate, allowComments, contextBlock, meta_keywords, meta_description)
					VALUES('%s', '%s', '%s', %u, %u, %u, '%s', '%s', '%s', '%s', '%s', '%s')",
					$this->db->prefix('wiki_pages'),
					icms_core_DataFilter::addSlashes($this->keyword),
					icms_core_DataFilter::addSlashes($this->title),
					$add_date,						  //-- lastmodified is Now
					icms_core_DataFilter::addSlashes($this->parent),
					$this->visible,
					$this->profile->prid,
					icms::$user ? icms::$user->getVar('uid') : 0, //$this->creator,
					$add_date,
					$this->allowComments,
					icms_core_DataFilter::addSlashes($this->contextBlock),
					icms_core_DataFilter::addSlashes($this->meta_keywords),
					icms_core_DataFilter::addSlashes($this->meta_description)
			);
			$result = $this->db->query($sql);
			if (!$result) return false;
			$this->pageid = $this->db->getInsertId();
		}
		/* need to do this because of new input filtering in ImpressCMS 1.3.3 */
		if (ICMS_VERSION_BUILD > 63) {
			/* deliberate use of addslashes, here */
			$body = addslashes(icms_core_DataFilter::checkVar($this->body, 'html', 'input'));
		} else {
			$body = icms_core_DataFilter::addSlashes($this->body);
		}
		$sql = sprintf(
				"INSERT INTO %s (pageid, summary, body, userid, modified)
				VALUES (%u, '%s', '%s', %u, '%s')",
				$this->db->prefix('wiki_revisions'),
				$this->pageid,
				icms_core_DataFilter::addSlashes($this->summary),
				$body,
				icms::$user ? icms::$user->getVar('uid') : 0,
				$add_date
		);
		$result = $this->db->query($sql);
		if (!$result) return false;
		$sql = sprintf(
				"UPDATE %s SET revisions=revisions + 1, lastmodified='%s', parent='%s', prid=%u, visible=%u, allowComments='%s', title='%s', contextBlock='%s', meta_keywords='%s', meta_description='%s' WHERE pageid=%u",
				$this->db->prefix('wiki_pages'),
				$add_date,
				icms_core_DataFilter::addSlashes($this->parent),
				$this->profile->prid,
				$this->visible,
				$this->allowComments,
				icms_core_DataFilter::addSlashes($this->title),
				icms_core_DataFilter::addSlashes($this->contextBlock),
				icms_core_DataFilter::addSlashes($this->meta_keywords),
				icms_core_DataFilter::addSlashes($this->meta_description),
				$this->pageid
		);
		$result = $this->db->query($sql);
		return ($result ? true : false);
	}

	/**
	 * @todo	Remove the cached version of a page after saving
	 * Saves the current revision on the database.
	 * a new query to update a revision and page - mysql allows updating multiple tables in a single query
	 */
	public function save() {
		$save_date = date('Y/n/j G:i:s');
		/* need to do this because of new input filtering in ImpressCMS 1.3.3 */
		if (ICMS_VERSION_BUILD > 63) {
			/* deliberate use of addslashes, here */
			$body = addslashes(icms_core_DataFilter::checkVar($this->body, 'html', 'input'));
		} else {
			$body = icms_core_DataFilter::addSlashes($this->body);
		}
		$sql = sprintf(
				"UPDATE %s p, %s r SET body='%s', modified='%s', userid='%s', contextBlock='%s', summary='%s', title='%s', revisions=revisions + 1, lastmodified='%s', parent='%s', prid=%u, visible=%u, allowComments='%s', meta_keywords='%s', meta_description='%s'
				WHERE revid=%u AND p.pageid=%u",
				$this->db->prefix('wiki_pages'),
				$this->db->prefix('wiki_revisions'),
				$body,
				$save_date,
				icms::$user ? icms::$user->getVar('uid') : 0,   //-- author is always the current user
				icms_core_DataFilter::addSlashes($this->contextBlock),
				icms_core_DataFilter::addSlashes($this->summary),
				icms_core_DataFilter::addSlashes($this->title),
				$save_date,
				icms_core_DataFilter::addSlashes($this->parent),
				$this->profile->prid,
				$this->visible,
				$this->allowComments,
				icms_core_DataFilter::addSlashes($this->meta_keywords),
				icms_core_DataFilter::addSlashes($this->meta_description),
				$this->id,
				$this->pageid
		);
		$result = $this->db->query($sql);
		return ($result ? true : false);
	}

	/**
	 * function visited() - version 0.85
	 * Return True or False.
	 * Objective: Save visit and date visit
	 * (addition : GibaPhp - XoopsTotal )
	 * New - Function for new block top visit and block last visit
	 * Today:
	 * -> Saves the current visit on the database.
	 * -> Saves the current date on the database.
	 *
	 * In Future.
	 * Log system access registered user for analysing.
	 * Register access page in table for statistics and points.
	 * New block - last users visited on topic
	 * New admin section - statistic visit users and
	 * anonymous count and section interest.
	 */
	public function visited() {

		$sql = sprintf(
				"UPDATE %s SET views=%u, lastviewed='%s' WHERE pageid=%u",
				$this->db->prefix("wiki_pages"),
				$this->views +1,
				date('Y/n/j G:i:s'), // do not change this date format - it is valid for MySQL
				$this->pageid
		);
		$result = $this->db->queryF($sql);
		return ($result ? true : false);
	}

	/**
	 * Callback function to render content from another page within the current page
	 * Renders sub page content, using render method.
	 * (addition : Gizmhail)
	 * @param array $page array of matched elements within the searched text
	 */
	public function renderSubPage($page) {
		
		$result = '';
		if ($this->keyword != $page[1]) {
			$subPage =  new WiwiRevision($page[1]);
			$subPageBody = $subPage->body;
			//Check if this sub-page can be read by this user
			//Also check if the page is empty(if it was the case, the render function may try to render the main page, and would loop)
			if ($subPage->canRead() && $subPageBody != '') {
				$result = $this->render($subPageBody);
			} else {
				$result = '';
			}
		} else {
			$result = '';
		}
		return $result;
	}

	/**
	 * Renders revision content, interpreting wiki codes and XoopsCodes.
	 *
	 * @param	string	$body	text of page to be processed
	 * @return	string	processed text
	 */
	public function render(&$body = '') {
		if ($body == '') $body = $this->body;

		$lbr = "<p>|</p>|<hr />|<table>|</table>|<div>|</div>|<br />|<ul>|<li>|</li>|</ul>";
		$nl = "^|" . $lbr;
		$eol = $lbr . "|$";
		$lt = "(?:&lt;|<)";
		$gt = "(?:&gt;|>)";

		$search = array();
		$replace = array();

		/**
		 * @todo	Many of these are not necessary with a full WYSIWYG editor in use. Still left here for legacy support
		 */
		// is this one still useful ?
		$search[] = "#\r\n?#";
		$replace[] = "\n";
		
		// <<bold text>>
		$search[] = "#" . $lt . "{2}(.*?)" . $gt . "{2}#s";
		$replace[] = "<strong>\\1</strong>";
		
		// {{italic text}}
		$search[] = "#\{{2}(.*?)\}{2}#s";
		$replace[] = "<em>\\1</em>";
		
		// ---- : horizontal rule
		$search[] = "#(" . $nl . ")-{4,}(" . $eol . ")#m";
		$replace[] = "\\1<hr />\\2";

		// [[br]] : line break .. still useful?
		//Need to process before other [[ ]] page links, or it will be interpretted as a link to another page
		$search[] = "#\[\[BR\]\]#i";
		$replace[] = "<br />";
		
		// [[IMG url title]] : inline image.
		//Need to process before other [[ ]] page links, or it will be interpretted as a link to another page
		$search[] = "#\[\[IMG ([^\s\"\[>{}]+)( ([^\"<\n]+?))?\]\]#i";
		$replace[] = '<img src="\\1" alt="\\3" />';

		// [[www.mysite.org title]] and [[<a ... /a> title]]
		$search[] = "#\[\[(<a.*>)(.*)</a> (.+?)\]\]#i";
		$replace[] = '\\1\\3</a>';
		//        "#([\w.-]+@[\w.-]+)(?![\w.]*(\">|<))#";
		//        '<a href="mailto:\\1">\\1</a>';
		
		// =Title=
		$search[] = "#(" . $nl . ")=(.*)=(" . $eol . ")#m";
		$replace[] = "\n\\1<h2>\\2</h2>\\3\n";
		
		// * list item
		$search[] = "#(" . $nl . ")\* (.*)#m";
		$replace[] = "\\1<li>\\2</li>\\3";
		
		//detection des niv0li
		$search[] = "#(" . $nl . ")\* (.*)#m";
		$replace[] = "<niv0li>\\2</niv0li>";
		//detection des niv1li
		$search[] = "#(" . $nl . ")\*\* (.*)#m";
		$replace[] = "<niv1li style='margin-left: 8px;list-style: disc inside;'>\\2</niv1li>";
		//detection des niv2li
		$search[] = "#(" . $nl . ")\*\*\* (.*)#m";
		$replace[] = "<niv2li style='margin-left: 16px;list-style: square inside;'>\\2</niv2li>";
		//detection des niv3li
		$search[] = "#(" . $nl . ")   (?: )*\* (.*)#m";
		$replace[] = "<niv3li style='margin-left: 24px;list-style: circle inside;'>\\2</niv3li>";
		//groupage des niv0li
		$search[] = "#<niv0li>(?(?!\n\n)(?:.|\n))*</niv(0|1|2|3)li>#";
		$replace[] = "<niv0ul>\\0</niv0ul>";
		//groupage des niv1li
		$search[] = "#<niv1li>(?(?!niv0li)(?:.|\n))*</niv(1|2|3)li>#";
		$replace[] = "<niv1ul>\\0</niv1ul>";
		//groupage des niv1li
		$search[] = "#<niv2li>(?(?!niv0li|niv1li)(?:.|\n))*</niv(2|3)li>#";
		$replace[] = "<niv2ul>\\0</niv2ul>";
		//groupage des niv1li
		$search[] = "#<niv3li>(?(?!niv0li|niv1li|niv2li)(?:.|\n))*</niv(3)li>#";
		$replace[] = "<niv3ul>\\0</niv3ul>";
		//nettoyage des niv*li
		$search[] = "#niv([0-9]*)li#";
		$replace[] = "li";
		//nettoyage des niv*ul
		$search[] = "#niv([0-9]*)ul#";
		$replace[] = "ul";
		
		// surrounds with <p> and </p> some lines .. hum, still useful ?
		$search[] = "#^(?!\n|<h2>|<blockquote>|<hr />)(.*?)\n$#sm";
		$replace[] = "<p>\\1</p>";
		
		// removes multiple line ends .. still useful ?
		$search[] = "#\n+#";
		$replace[] = "\n";
		
		$body = $this->ts->displayTarea(preg_replace($search, $replace, $body), 1, 1, 1, 1, 0);
		
		$delayedsearch = array();
		$delayedreplace = array();
		
		// link with href ending with ?page=CamelCase
		$search_callback = "#(<a.+\?page=(([A-Z][a-z]+){2,}\d*))(\">.*)</a>#Ui";
		$body = preg_replace_callback($search_callback,
					function ($matches) {
						return $this->render_wiwiLink($matches[2], $matches[1], $matches[4]);
					},
					$body);

		// CamelCase
		if ($this->swikiConfig['ShowCamelCase']) {
			// [[CamelCase title]]
			$search_callback = "#\[\[(?:(?<!XBLK |PAGE )([A-Z][a-z]+){2,}\d*) (.+?)\]\]#";
			$body = preg_replace_callback($search_callback,
						function ($matches) {
							return $this->render_wikiLink($matches[1], $matches[2], $this->swikiConfig['ShowTitles']);
						},
						$body);
			
			// CamelCase
			$search_callback = "#(?<!XBLK|PAGE)(^|\s|>)(([A-Z][a-z]+){2,}\d*)\b#";
			$body = preg_replace_callback($search_callback,
						function ($matches) {
							return $matches[1] . $this->render_wikiLink($matches[2], '', $this->swikiConfig['ShowTitles']);
						},
						$body);

			// escaped ~CamelCase
			$delayedsearch[] = "#(^|\s|>)~(([A-Z][a-z]+){2,}\d*)\b#";
			$delayedreplace[] = '\\1\\2';
		}

		// [[free link | title]]
		$search_callback = "#\[\[((?!XBLK|PAGE)[^\[\]]+?)\s*\|\s*(.+?)\]\]#";
		$body = preg_replace_callback($search_callback,
					function ($matches) {
						return $this->render_wikiLink($matches[1], $matches[2], $this->swikiConfig['ShowTitles']);
					},
					$body);
		
		// [[free link]]
		$search_callback = "#\[\[((?!XBLK |PAGE ).+?)\]\]#";
		$body = preg_replace_callback($search_callback,
					function ($matches) {
						return $this->render_wikiLink($matches[1], '', $this->swikiConfig['ShowTitles']);
					},
					$body);
		
		// > quoted text
		$search_callback = "#(" . $nl . ")" . $gt . " .* (" . $eol . ")#m";
		$body = preg_replace_callback($search_callback,
					function ($matches) {
						 return "<blockquote>" . str_replace("\n", " ", preg_replace("#^> #m", "", $matches[0])) . "</blockquote>\n";
					},
					$body);
		
		// <[PageIndex]> and <[RecentChanges]>
		$search_callback = "#(?:<p>)*" . $lt . "\[(PageIndexI*|RecentChanges)\]" . $gt . "(?:</p>)*#i";
		$body = preg_replace_callback($search_callback, array($this, 'render_index'), $body);
		
		// ((subPage)) : page to include (addition : Gizmhail)
		$search_callback= "#\(\((.+?)\)\)#";
		$body = preg_replace_callback($search_callback, array($this, 'renderSubPage'), $body);

		// [[PAGE subPage]] : page to include (addition : Gizmhail) -
		$search_callback = "#\[\[PAGE (.+?)\]\]#";
		$body = preg_replace_callback($search_callback, array($this, 'renderSubPage'), $body);
		
		// [[XBLK 1]] or [[XBLK title]] Xoops block ($1 is the block id or title)
		$search_callback = "#\[\[XBLK (.+?)\]\]#i" ;
		$body = preg_replace_callback($search_callback, array($this, 'render_block'), $body);

		// <[Children]>
		$search_callback = "#(?:<p>)*" . $lt . "\[Children\]" . $gt . "(?:</p>)*#i";
		$body = preg_replace_callback($search_callback, array($this, 'render_children'), $body);
		
		// <[Siblings]>
		$search_callback = "#(?:<p>)*" . $lt . "\[Siblings\]" . $gt . "(?:</p>)*#i";
		$body = preg_replace_callback($search_callback, array($this, 'render_siblings'), $body);

		// dummy string, to prevent recognition of special sequences (addition : Gizmhail)
		$delayedsearch[] = "#\._\.#";
		$delayedreplace[] = "";
		$body = preg_replace($delayedsearch, $delayedreplace, $body);
		
		return $this->render_toc($body);
	}

	/**
	 * Utilities for page rendering ;
	 */
	public function render_wiwiLink($pg, $a, $txt) {
		return $a . $txt . ($this->pageExists($pg) ? "" : "<img src='" . $this->_url . "images/nopage.gif' alt='' />") . "</a>";
	}

	/**
	 * Generate the text or link for a wiki tag
	 *
	 * The tag will be a link only if the viewer has permission to read the page
	 * or has the ability to edit the page. If the page does not exist, only users with
	 * permissions to create the page will see the indicator icon
	 *
	 * @todo	reduce queries
	 *
	 * @param	string		$keyword
	 * @param	string		$customTitle	Override page title/page name
	 * @param	bool	$show_titles	Whether to show the page title or page name in the text
	 * @return	string		text or link, depending on existence and user permissions for target page
	 */
	public function render_wikiLink($keyword, $customTitle = '', $show_titles = FALSE )	{
		$normKeyword = icms_core_DataFilter::addSlashes($this->normalize($keyword));
		$page = $this->getPages("keyword='" . $normKeyword . "'");
		if (count($page) > 0) {
			$pageExists = TRUE;
			$targetPage = new WiwiRevision($normKeyword);
			$title = $targetPage->title;
			$txt = $customTitle == ''
					? (($title != '') && $show_titles)
						? $title
						: $normKeyword
					: $customTitle ;
			$privileges = $targetPage->profile->getUserPrivileges();
		} else {
			$pageExists = FALSE;
			$txt = ($customTitle != '' ? $customTitle : $normKeyword);
			$privileges = $this->profile->getUserPrivileges();
		}

		$userCanWrite = $privileges[_WI_WRITE];
		$userCanView = $privileges[_WI_READ];

		if ($pageExists && $userCanView) {
			$link = sprintf('<a href="%s" title="' . $title . '">%s</a>',
					$this->_url . 'index.php?page=' . $this->encode($normKeyword),
					stripslashes($txt));
		} elseif (!$pageExists && $userCanWrite) {
			$link = sprintf('<a href="%s" title="' . _MD_SWIKI_CREATE . '" >%s%s</a>',
					$this->_url . 'index.php?page=' . $this->encode($normKeyword),
					stripslashes($txt),
					'<img src="' . $this->_url . 'images/nopage.gif" alt="" title="' . _MD_SWIKI_PAGENOTFOUND_MSG . '" />');
		} else {
			$link = $txt;
		}

		return $link;
	}

	/**
	 * Callback function to render an index or list of recent changes embedded in the page
	 *
	 * @param array $type array of matched elements in the searched text
	 */
	public function render_index($type) {
		$settings = array(
				"pageindex" => array(
						"ORDER BY title ASC",
						"title",
						1,
						'"<br/><span class=\'wiwi_titre\' style=\"font-size:large;\">[$counter]</span><br/>"',
						'"&nbsp;&nbsp;<a href=\"' . $this->_url . 'index.php?page=" . $this->encode($content["keyword"]) . "\">" . ($content["title"] == "" ? $content["keyword"] : $content["title"]) . "</a><br/>"',
				""),
				"pageindexi" => array(
						"ORDER BY keyword ASC",
						"keyword",
						1,
						'"<br/><span class=\'wiwi_titre\'>$counter</span><br />"',
						'"&nbsp;&nbsp;<a href=\"' . $this->_url . 'index.php?page=" . $content["keyword"] . "\">" . $content["keyword"] . "</a> : " . $content["title"] . "<br />"',
				""),
				"recentchanges" => array(
						"ORDER BY lastmodified DESC LIMIT 20",
						"lastmodified",
						10,
						'"<tr><td colspan=3><strong>" . formatTimestamp(strtotime($counter), _SHORTDATESTRING) . "</strong></td></tr>"',
						'"<tr><td>&nbsp;" . formatTimestamp(strtotime($content["lastmodified"]), "H:i") . "</td><td><a href=\"' . $this->_url . 'index.php?page=" . $this->encode($content["keyword"]) . "\">" . ($content["title"] == "" ? $content["keyword"] : $content["title"]) . "</a></td><td>" . $content["summary"] . "</td><td><span class=\"itemPoster\">" . icms_member_user_Handler::getUserLink($content["u_id"]) . "</span></td></tr>"',
				"")
		);
		$cfg = $settings[strtolower($type[1])];

		$sql = 'SELECT keyword, title, lastmodified, r.userid as u_id, summary FROM '
				. $this->db->prefix('wiki_pages') . ' p, ' . $this->db->prefix('wiki_revisions')
				. ' r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified ' . $cfg[0];
		$result = $this->db->query($sql);

		$body = '' ; $counter = '[';
		while ($content = $this->db->fetcharray($result)) {
			mb_internal_encoding('UTF-8');
			if ($counter != mb_strtoupper(mb_substr($content[$cfg[1]], 0, $cfg[2]))) {
				$counter = mb_strtoupper(mb_substr($content[$cfg[1]], 0, $cfg[2]));
				eval('$body .= (($body)?"' . $cfg[5] . '":"") . "" . ' . $cfg[3] . ';');
			}
			eval('$body .= ' . $cfg[4] . ' . "\n";');
		}

		return "<table>" . $body . (($body)?$cfg[5]:"") . "</table>\n\n";
	}

	/**
	 * Callback function to render a system block within the body
	 *
	 * @param array $matches array of matched elements in the searched text
	 */
	public function render_block($matches) {
		
		include_once ICMS_ROOT_PATH . '/modules/' . $this->_dir . '/include/functions.php';
		$blk = swiki_getBlock($matches[1]);
		return "<table><tr><td>" . $blk['content'] . "</td></tr></table>";
	}

	/**
	 * private function , used by parentList method.
	 * Note : this was formerly an inline function, but php5 doesn't seem to accept it recursively.
	 */
	private function parentList_recurr($child, &$parlist, &$db) {
		$sql = 'SELECT parent FROM ' . $db->prefix('wiki_pages') . ' WHERE keyword="' . icms_core_DataFilter::addSlashes($child) . '"';
		$result = $db->query($sql);
		list($parent) = $db->fetchRow($result);
		if (($parent != '') && (!in_array($parent, $parlist))) {
			$parlist[] = $parent;
			$this->parentList_recurr($parent, $parlist, $db);
		}
	}
	/**
	 * Creates breadcrumb of all parent pages to current page
	 * @return array List of parent pages linked to the page
	 */
	public function parentList() {

		$parlist = array();
		if ($this->keyword != '') {
			$this->parentList_recurr($this->keyword, $parlist, $this->db);
		}
		foreach($parlist as $key=>$parent) {
			$parlist[$key] = $this->render_wikiLink($parent, '', $this->swikiConfig['ShowTitles']);
		}
		return array_reverse($parlist);
	}

	/**
	 *
	 * @param $limit
	 * @param $start
	 */
	public function history($limit = 0, $start = 0) {
		$sql = 'SELECT keyword, revid as id, title, body, modified as lastmodified, userid as u_id, summary FROM '
				. $this->db->prefix('wiki_revisions') . ' r, '. $this->db->prefix('wiki_pages')
				. ' p WHERE p.keyword="' . icms_core_DataFilter::addSlashes($this->keyword) . '" AND p.pageid=r.pageid ORDER BY id DESC';
		$result = $this->db->query($sql, $limit, $start);

		$hist = array();
		for ($i = 0; $i < $this->db->getRowsNum($result); $i++) {
			$hist[] = $this->db->fetchArray($result);
		}
		return $hist;
	}

	/**
	 * @deprecated	Use the revisions property, instead
	 */
	public function historyNum() {
		$sql = 'SELECT revisions FROM ' . $this->db->prefix('wiki_pages') . ' WHERE keyword="' . icms_core_DataFilter::addSlashes($this->keyword) . '"';
		$result = $this->db->query($sql);
		list($maxcount) = $this->db->fetchRow($result);
		return $maxcount;
	}

	/**
	 *
	 * @param $bodyDiff
	 * @param $titleDiff
	 */
	public function diff(&$bodyDiff, &$titleDiff) {
		include_once ICMS_ROOT_PATH . '/modules/' . $this->_dir . '/include/diff.php';
		// Get the latest revision contents
		$sql = 'SELECT title, body FROM ' . $this->db->prefix('wiki_revisions') . ' r, ' . $this->db->prefix('wiki_pages') . ' p WHERE p.pageid="' . $this->pageid . '" AND r.pageid="' . $this->pageid . '" ORDER BY revid DESC LIMIT 1';
		$result = $this->db->query($sql);
		list($title, $body) = $this->db->fetchRow($result);

		// remove formatting tags, replace tags generating a line break with a "\n".
		$search = array(
				"#<(/?TABLE|TD|P|HR|DIV|UL|LI|PRE|BR)>#i",
				"#<(?!/?A|IMG)[/!]*?[^<>]*?>#si"
		);

		$replace = array(
				"<$1>\n",
				""
		);

		$body = preg_replace($search, $replace, $body);
		$body2 = preg_replace($search, $replace, $this->body);
		$bodyDiff = $this->render(diffDisplay($body2, $body));
		$titleDiff = ($title == $this->title)
		? '<h2>' . icms_core_DataFilter::htmlSpecialchars($title) . '</h2>'
				: '<h2><span style="color: red;">' . icms_core_DataFilter::htmlSpecialchars($this->title) . '</span> &rarr; <span style="color: green;">' . icms_core_DataFilter::htmlSpecialchars($title) . '</span></h2>';
	}

	/**
	 *
	 */
	public function canRead() {
		return ($this->profile->canRead());
	}

	/**
	 *
	 */
	public function canWrite() {
		return ($this->profile->canWrite());
	}

	/**
	 *
	 */
	public function canAdministrate() {
		return ($this->profile->canAdministrate());
	}

	/**
	 *
	 */
	public function canViewComments() {
		return ($this->profile->canViewComments());
	}

	/**
	 *
	 */
	public function canViewHistory() {
		return ($this->profile->canViewHistory());
	}

	/**
	 * checks if current revision has been saved concurrently by another user
	 * Note : even if this "was" a new page when first edited the doc, another
	 *        user may have created a doc with the same "keyword" meanwhile ..
	 */
	public function concurrentlySaved() {
		/** @todo returning false, because the logic is not working correctly */
		return false;
		$sql = "SELECT lastmodified FROM " . $this->db->prefix("wiki_pages") . " WHERE keyword='" . icms_core_DataFilter::addSlashes($this->keyword) . "'";
		$result = $this->db->query($sql);
		$rowsnum = $this->db->getRowsNum($result);

		if ($this->id == 0) {

			return ($rowsnum > 0) ;  // this was a page creation : somebody did it before ...
		} else {
			list($db_lastmodified) = $this->db->fetchRow($result);
			return ($this->lastmodified != $db_lastmodified);
		}

	}

	/**
	 *
	 * @param $page
	 * @param $id
	 */
	public function pageExists($page = "", $id = 0) {
		$page = icms_core_DataFilter::addSlashes($this->normalize($page));
		if ($id > 0) {
			$sql = "SELECT keyword FROM " . $this->db->prefix("wiki_pages") . " WHERE pageid = $id";
		} elseif (($page != "") && ((int) $page == 0)) {
			$sql = "SELECT keyword FROM " . $this->db->prefix("wiki_pages") . " WHERE keyword='$page'";
		} elseif ($page != "") {
			$sql = "SELECT keyword FROM " . $this->db->prefix("wiki_pages") . " WHERE pageid=$page";
		} else {
			return false;
		}
		return ($this->db->getRowsNum($this->db->query($sql)) > 0);
	}

	/**
	 * Returns an array of wiwiRevisions, selected upon given criteria
	 * $where :
	 * $order :
	 * $items_perpage :		if 0, returns all the results
	 * $current_start :		position of the first returned element within the results
	 */
	public function getPages($where = "", $order = "", $items_perpage = 0, $current_start = 0) {
		if ($order == "") $order = "keyword ASC";

		$sql_a =  "SELECT p.*, body, summary, contextBlock, r.userid as u_id, revid as id FROM " . $this->db->prefix("wiki_pages") . " AS p, " . $this->db->prefix("wiki_revisions") . " AS r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified";

		if ($where != "") {
			$sql_a .= " AND " . $where;
		}
		if ($order != "") {
			$sql_a .= " ORDER BY " . $order;
		}
		$result_a = $this->db->query($sql_a, $items_perpage, $current_start);

		$pageArr = array();
		for ($i = 0; $i < $this->db->getRowsNum($result_a); $i++) {
			$row = $this->db->fetchArray($result_a);
			$pageObj = new WiwiRevision();
			$pageObj->keyword = $row['keyword'];
			$pageObj->title = $row['title'];
			$pageObj->body = $row['body'];
			$pageObj->lastmodified = $row['lastmodified'];
			$pageObj->u_id = $row['u_id'];
			$pageObj->parent = $row['parent'];
			$pageObj->visible = $row['visible'];
			$pageObj->contextBlock = $row['contextBlock'];
			$pageObj->pageid = $row['pageid'];
			$pageObj->id = $row['id'];
			//$pageObj->profile = new wiwiProfile($row['prid']);
			$pageObj->creator = $row['creator'];
			$pageObj->created = $row['createdate'];
			$pageObj->views = $row['views'];
			$pageObj->revisions = $row['revisions'];
			$pageObj->lastviewed = $row['lastviewed'];
			$pageObj->allowComments = $row['allowComments'];
			$pageObj->summary = $row['summary'];
			$pageArr[$i] = $pageObj;
			unset($pageObj);
		}
		return $pageArr;
	}

	/**
	 *
	 * @param $where
	 */
	public function getPagesNum($where = "") {
		$sql_a =  "SELECT count(p.pageid) as count FROM " . $this->db->prefix("wiki_pages") . ' p, ' . $this->db->prefix("wiki_revisions") . ' r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified';

		if ($where != "") {
			$sql_a .= " AND " . $where;
		}

		$result = $this->db->query($sql_a);
		list($maxcount) = $this->db->fetchRow($result);

		return $maxcount;
	}

	/**
	 * Creates a new revision whose content is copied from the selected one, but with other data (parent, privileges etc..) untouched.
	 */
	public function restore() {
		$latestRev->title = $this->ts->stripSlashesGPC($this->title);
		$latestRev->body = $this->ts->stripSlashesGPC($this->body);
		$latestRev->contextBlock = $this->contextBlock;
		return $latestRev->add();
	}

	/**
	 * Deletes all revisions of current page, anterior to current revision.
	 */
	public function fix() {
		$sql = 'DELETE FROM ' . $this->db->prefix('wiki_revisions') . ' WHERE pageid="' . icms_core_DataFilter::addSlashes($this->pageid) . '" AND modified < "' . $this->lastmodified . '"';
		$success = $this->db->query($sql);
		return $success;
	}

	/**
	 *
	 */
	public function cleanPagesHistory() {
		$success = true;
		$sql = "SELECT pageid, MAX(revid) AS id FROM " . $this->db->prefix("wiki_revisions") . " WHERE modified<'" . formatTimestamp(time() - 61 * 24 * 3600, 'Y/n/j G:i:s') . "' GROUP BY pageid"; // do not change this date format - it is valide for MySQL
		$result = $this->db->query($sql);
		while ($content = $this->db->fetcharray($result)) {
			$rev = new wiwiRevision("", $content['id']);
			$success &= $rev->fix();
		}
		return $success;
	}

	/**
	 *
	 */
	public function deletePage() {
		$sql = 'DELETE r.*, p.* FROM ' . $this->db->prefix('wiki_revisions') . ' r, ' . $this->db->prefix('wiki_pages') . ' p WHERE r.pageid="' . $this->pageid . '" AND p.pageid="' . $this->pageid . '"';
		$success = $this->db->query($sql);
		if ($success) {
			$this->id = 0;
			$this->pageid = 0;
		}
		return $success;
	}

	/**
	 * Returns an array with all links on the current page.
	 *
	 * used in creating the PDF version of a page
	 * @param	bool	$allowExternals not used?
	 * @return	array	$links	an array of links found in the page
	 */
	public function getLinks($allowExternals = false) {
		$links = array();
		$search = array(
				"#(^|\s|>)(([A-Z][a-z]+){2,}\d*)\b#",						// CamelCase
				"#\[\[(([A-Z][a-z]+){2,}\d*) (.+?)\]\]#",					// [[CamelCase title]]
				"#\[\[<a href=\"([^\"]*)\"(?:[^>]*)>(.*)</a> (.+?)\]\]#i",	// [[www.mysite.org title]] and [[<a ... /a> title]]
				"#\[\[([^\[\]]+?)\s*\|\s*(.+?)\]\]#",						// [[free link | title]]
				"#\[\[(.+?)\]\]#",											// [[free link]]
				"#(<a.+\?page=(([A-Z][a-z]+){2,}\d*))\">(.*)</a>#Ui",		// link with href ending with ?page=
		);
		$replace = array(
				array(2, 2, true),
				array(1, 3, true),
				array(1, 2, false),
				array(1, 2, true),
				array(1, 1, true),
				array(2, 2, true),
		);
		foreach ($search as $key => $pattern) {
			if (preg_match_all($pattern, $this->body, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					$links[] = array(
							"url" => $match[$replace[$key][0]],
							"txt" => $match[$replace[$key][1]],
							"isWiwiPage" => $match[$replace[$key][2]]);
				}
			}
		}
		return $links;

	}

	/**
	 *
	 * @param $keyword
	 */
	public function normalize($keyword) {
		$search = array(	"\'",	'\"',	'&quot;',	'&nbsp;'	);
		$replace = array(	"'",	'"',	'"',		' ',		);
		return str_replace($search, $replace, $keyword);
	}

	/**
	 *
	 * @param $keyword
	 */
	static public function encode($keyword) {
		$search = array(	"\'",	"'",	'\"',	'"',	'&quot;',	' ',	'&nbsp;',	);
		$replace = array(	'%27',	'%27',	'%22',	'%22',	'%22',		'+',	'+',		);
		return str_replace($search, $replace, $keyword);
	}

	/**
	 *
	 * @param $keyword
	 */
	public function decode($keyword) {
		$replace = array(	"'",	'"',	' ',	);
		$search = array(	'%27',	'%22',	'+',	);
		return str_replace($search, $replace, $keyword);
	}

	/**
	 * Retrieves a list of pages with the same parent page
	 * @param string $parent name of the parent page, defaults to the parent of the current page
	 * @param int $limit number of pages to return
	 * @param string $order field to sort
	 * @return array
	 */
	private function getSiblings($parent = '', $order = '', $limit = 0) {
		if ($parent == '' ) $parent = $this->parent;
		$siblings = array();
		$where = ' parent = "'. $parent .'" AND keyword !="'. $this->keyword . '"';
		$siblings = $this->getPages($where, $order, $limit);
		return $siblings;
	}

	/**
	 * Retrieves a list of pages that have the specified parent page
	 * @param string $page name of the parent page, defaults to the current page
	 * @param int $limit number of pages to return
	 * @param string $order field used to sort the list, defaults to all
	 * @return array
	 */
	private function getChildren($page = '', $order= '', $limit = 0) {
		if ($page == '' ) $page = $this->keyword;
		$children = array();
		$where = ' parent = "'. $page .'"';
		$children = $this->getPages($where, $order, $limit);
		return $children;
	}

	/**
	 * Render an unordered list of pages that have the same parent
	 * @todo the function allows for arguments, but the current implementation does not use them all
	 *
	 * @param	string $parent	The parent to use to find the sibling, will default to the current page
	 * @param	string $order	The field used to sort the list
	 * @param	string $limit	The number of pages to return in the list, defaults to all
	 * @return	string	HTML for the unordered list
	 */
	private function render_children($page = '', $order = '', $limit = 0) {
		if (is_array($page)) $page = '';
		$pages = self::getChildren($page, $order, $limit);
		$body = '';
		foreach ($pages as $page) {
			$body .= "<li><a href='" . $this->_url . "index.php?page=" . $this->encode($page->keyword) . "'>"
	 			. ($page->title == "" ? $page->keyword : $page->title) . "</a></li>";
		}
		return "<ul>" . $body . "</ul>";
	}

	/**
	 * Render an unordered list of pages that have the same parent
	 * @todo the function allows for arguments, but the current implementation does not use them all
	 *
	 * @param	string $parent	The parent to use to find the sibling, will default to the parent of the current page
	 * @param	string $order	The field used to sort the list
	 * @param	string $limit	The number of pages to return in the list, defaults to all
	 * @return	string	HTML for the unordered list
	 */
	private function render_siblings($parent = '', $order = '', $limit = 0) {
		if (is_array($parent)) $parent = '';
		$pages = self::getSiblings($parent, $order, $limit);
		$body = '';
		foreach ($pages as $page) {
			$body .= "<li><a href='" . $this->_url . "index.php?page=" . $this->encode($page->keyword) . "'>"
	 			. ($page->title == "" ? $page->keyword : $page->title) . "</a></li>";
		}
		return "<ul>" . $body . "</ul>";
	}

	/**
	 * Create a linked table of contents for a page
	 * This function locates all the heading tags and creates a linked list to assist with
	 * navigation and organiztion. The list will only be created if there are 3 or more headings
	 * You must insert <[Headings]> in the page for your TOC to display
	 *
	 * @return	string Unaltered body text if there are less than 3 headings, HTML inserted for the linked list otherwise
	 */
	private function render_toc(&$body) {
		$lt = "(?:&lt;|<)";
		$gt = "(?:&gt;|>)";

		$search = '/<(h\d)>(.+?)<\/\1>/';
		if (preg_match_all($search, $body, $matches, PREG_SET_ORDER) < 3) {
			return $body;
		} else {
			$headings = array();
			foreach ($matches as $key=>$match) {
				$body = str_replace(
		 			$match[0],
		 			'<a name="heading' . $key . '"></a>' . $match[0],
		 			$body
				);
				$headings[] = "<a href='#heading" . $key . "'>". $match[2] . "</a>";
			}
		}
		// <[Headings]>
		$search = "#(<p>)*" . $lt . "\[Headings\]" . $gt . "(</p>)*#i";
		$replace = "<div class='wiki_toc'>" . implode("<br />", $headings) . "</div>";

		return preg_replace($search, $replace, $body);
	}

	/**
	 * Determine the link title
	 *
	 * @param	string	$link
	 * @return	string	Text to use for the title attribute of the link
	 */
	public function getTitle($link) {

	}
	
	/*
	 * Return the module configs
	 *
	 * @return	array Module configuration settings
	 */
	public function getConfigs() {
		return $this->swikiConfig;
	}
}  // end class wiwiRevision

/**
 * Handler for the revision class
 *
 * @package	Simplywiki
 * @author	Steve Kenow (skenow@impresscms.org)
 * @license
 * @since	SimplyWiki 1.2
 */
class WiwiRevisionHandler {

	public function __construct() {
	}

	/**
	 *
	 * @param	int	$author
	 * @param	string $type
	 * @param	string $order
	 * @param	int $limit
	 * @param	int $start
	 * @return	array
	 */
	public function getRevisions($author = false, $type = false, $order = 'DESC', $limit = 10, $start = 0  ) {
		$revObj = new WiwiRevision();
		$where = $sort = '';
		if( $type && $type == 'new' ) {
			$sort = 'createdate ' . $order;
			if( $author ) {
				$where = 'creator = ' . $author;
			}
		} else {
			$sort = 'lastmodified ' . $order;
			if( $author ) {
				$where = 'userid = ' . $author;
			}
		}
		$revisions = $revObj->getPages($where, $sort, $limit, $start);
		return $revisions;
	}
}
