<?php
/**
 * Revision class of wiwimod
 *
 * @package Wiwimod
 * @author Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')&& !defined('ICMS_ROOT_PATH')) exit();
if (!defined('_WIWIPAGE')) {
define ('_WIWIPAGE', 1);
$wiwidir = basename(dirname( dirname(__FILE__)));
$modversion['dirname'] = $wiwidir;

include_once 'wiwiProfile.class.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $wiwidir . '/include/functions.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $wiwidir . '/include/diff.php';

class WiwiRevision {

  var $keyword;			// the CamelCase code of the page
  var $title;
  var $body;
  var $lastmodified;
  var $u_id;			// user id of last author
  var $parent;			// CamelCase code of the parent page
  var $visible;			// weight of the reviison in TOC block
  var $contextBlock;		// CamelCase code of the page to be shwon in the side block
  var $pageid;			// id of the initial revision (necessary to keep comments visible)
  var $profile;			// the current revision profile (@link WiwiProfile)
  var $id;				// revision unique id.
  
  var $db;				// private usage;
  var $ts;				// private usage;
  var $wiwiConfig;		// private usage : used to get Wiwimod configs, even when called from other modules
  var $summary;           // revision summary
  var $views;                // number of times the page was viewed
  var $creator;  // creator of the page
  var $created; // create datetime of the page
  var $revisions; // number of revisions of this page, also the latest revision of the page
  var $lastviewed; // last time the page was accessed
  var $allowComments;

	/*
	 * Constructor.
	 * Loads revision from database :
	 *    - loads requested revision if $id is provided ;
	 *    - loads latest revision of page if $id isn't provided
	 *		Note : in this case, $page can be either the page CamelCase keyword,
	 *             or the corresponding pageid field (which both are common to
	 *             all page revisions.
	 */
	function WiwiRevision($page='', $id=0, $pageid=0) {

		$this->db =& Database::getInstance();
		$this->ts =& MyTextSanitizer::getInstance();

		$modhandler =& xoops_gethandler('module');
		$config_handler =& xoops_gethandler('config');
		$wiwiMod = $modhandler->getByDirname(basename(dirname(dirname(__FILE__))));
		$this->wiwiConfig =& $config_handler->getConfigsByCat(0, $wiwiMod->getVar('mid'));

		if (($page == '') && ($id == 0) && ($pageid == 0)) $page = _MI_WIWIMOD_WIWIHOME;

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
/* new SQL, based on the new tables */
   $sql = 'SELECT * FROM '.$this->db->prefix('wiwimod_pages').' p,' .$this->db->prefix('wiwimod_revisions') .' r';
		if ($id != 0) {
			$sql .= ' WHERE revid = '.$id.' AND p.pageid = r.pageid';
		} elseif ($page != ''){
			$sql .= ' WHERE p.lastmodified = r.modified AND keyword="'.addslashes($page).'" ';
		} elseif ($pageid != '') {
		    $sql .= ' WHERE p.lastmodified = r.modified AND p.pageid='.$pageid.'';
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
		}
		return $this;
	}

	/*
	 * Creates a new revision from current object.
	 */
	function add() {
		global $xoopsUser;
		$add_date = date('Y/n/j G:i:s'); //$this->created, in a format that MySQL can handle. In PHP 5.1.1+, this can be date(DATE_ATOM) or date(DATE_W3C)
		if ($this->pageid == 0) { // only insert into the pages table if it is the first revision
		$sql = sprintf(
			"INSERT INTO %s (keyword, title, lastmodified, parent, visible, prid, creator, createdate, allowComments, contextBlock)
                VALUES('%s', '%s', '%s', %u, %u, %u, '%s', '%s', '%s', '%s')",
			$this->db->prefix('wiwimod_pages'),
			addslashes($this->keyword),
			$this->ts->addSlashes($this->title),
			$add_date,						  //-- lastmodified is Now
			addslashes($this->parent),
			$this->visible,
			$this->profile->prid,
			$xoopsUser ? $xoopsUser->getVar('uid') : 0, //$this->creator,
			$add_date,
			$this->allowComments,
			addslashes($this->contextBlock)
      		);
		$result = $this->db->query($sql);
		if (!$result) return false;
		$this->pageid = $this->db->getInsertId();
		}
			$sql = sprintf(
               "INSERT INTO %s (pageid, summary, body, userid, modified)
	               VALUES (%u, '%s', '%s', %u, '%s')",
				$this->db->prefix('wiwimod_revisions'),
				$this->pageid,
				$this->ts->addSlashes($this->summary),
				$this->ts->addSlashes($this->body),
				$xoopsUser ? $xoopsUser->getVar('uid') : 0,
				$add_date
               );
			$result = $this->db->query($sql);
			if (!$result) return false;
		$sql = sprintf(
               "UPDATE %s SET revisions=%u, lastmodified='%s', parent='%s', prid=%u, visible=%u, allowComments='%s', title='%s', contextBlock='%s' WHERE pageid=%u",
				$this->db->prefix('wiwimod_pages'),
				$this->revisions + 1,
				$add_date,
				addslashes($this->parent),
				$this->profile->prid,
				$this->visible,
				$this->allowComments,
				$this->ts->addSlashes($this->title),
				addslashes($this->contextBlock),
				$this->pageid
          );
          $result = $this->db->query($sql);
		return ($result ? true : false);
		
		return true;
	}

	/*
	 * Saves the current revision on the database.
	* a new query to update a revision and page - mysql allows updating multiple tables in a single query */
	function save() {
		global $xoopsUser;
          $save_date = date('Y/n/j G:i:s');
		$sql = sprintf(
			"UPDATE %s p, %s r SET body='%s', modified='%s', userid='%s', contextBlock='%s', summary='%s', title='%s', revisions=%u, lastmodified='%s', parent='%s', prid=%u, visible=%u, allowComments='%s'
               WHERE revid=%u AND p.pageid=%u",
				$this->db->prefix('wiwimod_pages'),
				$this->db->prefix('wiwimod_revisions'),
				$this->ts->addSlashes($this->body),
				$save_date,
				$xoopsUser ? $xoopsUser->getVar('uid') : 0,   //-- author is always the current user
				addslashes($this->contextBlock),
				$this->summary,
				$this->ts->addSlashes($this->title),
				$this->revisions + 1,
				$save_date,
				addslashes($this->parent),
				$this->profile->prid,
				$this->visible,
				$this->allowComments,
				$this->id,
				$this->pageid
			);
		$result = $this->db->query($sql);
		return ($result ? true : false);
	}

/*
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

	function visited() {
		global $xoopsUser;

		$sql = sprintf(
			"UPDATE %s SET views=%u, lastviewed='%s' WHERE pageid=%u",
			$this->db->prefix("wiwimod_pages"),
			$this->views +1,
			date('Y/n/j G:i:s'),
			$this->pageid
			);
		   $result = $this->db->queryF($sql);
		return ($result ? true : false);
	}

	/*
	 * Renders sub page content, using render method.
	 * (addition : Gizmhail)
	 */
    function renderSubPage($page='')
    {
        $result = '';
        if($this->keyword!=$page)
        {
            $subPage =  new WiwiRevision($page);
            $subPageBody = $subPage->body;
            //Check if this sub-page can be read by this user
            //Also check if the page is empty(if it was the case, the render function may try to render the main page, and would loop)
            if($subPage->canRead()&&$subPageBody!='')
            {
                $result = $this->render($subPageBody);
            }
            else
            {
                $result = '';
            }
        }
        else
        {
            $result = '';
        }
        return $result;
    }

	/*
	 * Renders revision content, interpreting wiki codes and XoopsCodes.
	 */
	function render($body='') {

		$lbr = "<p>|</p>|<hr />|<table>|</table>|<div>|</div>|<br />|<ul>|<li>|</li>|</ul>";
		$nl = "^|".$lbr;
		$eol =$lbr."|$";
		$lt = "(?:&lt;|<)";
		$gt = "(?:&gt;|>)";

		$search = array();
		$replace = array();
      // [[PAGE subPage free link]] : we first save it(otherwise it might be recognise as a free link) (addition : Gizmhail)
     		$search[] = "#\[\[PAGE (.+?)\]\]#";
            $replace[] = "<wiwisubpage>~\\1</wiwisubpage>";
      // is this one still useful ?
			$search[] = "#\r\n?#";
            $replace[] = "\n";
      // <<bold text>>
			$search[] = "#".$lt."{2}(.*?)".$gt."{2}#s";
            $replace[] = "<strong>\\1</strong>";
      // {{italic text}}
			$search[] = "#\{{2}(.*?)\}{2}#s";
            $replace[] = "<em>\\1</em>";
      // ---- : horizontal rule
			$search[] = "#(".$nl.")-{4,}(".$eol.")#m";
            $replace[] = "\\1<hr />\\2";
      // [br] : line break .. still useful ?
			$search[] = "#\[\[BR\]\]#i";
            $replace[] = "<br />";
      // Xoops block ($1 is the block id or title)
			$search[] = "#\[\[XBLK (.+?)\]\]#ie" ;
            $replace[] = '$this->render_block("$1")';
      // [[IMG url title]] : inline image ...
			$search[] = "#\[\[IMG ([^\s\"\[>{}]+)( ([^\"<\n]+?))?\]\]#i";
            $replace[] = '<img src="\\1" alt="\\3" />';
      // CamelCase
			$search[] = "#(^|\s|>)(([A-Z][a-z]+){2,}\d*)\b#e";
            $replace[] = '"$1".$this->render_wikiLink("$2" , "",'.$this->wiwiConfig['ShowTitles'].')';
      // escaped CamelCase
			$search[] = "#(^|\s|>)~(([A-Z][a-z]+){2,}\d*)\b#";
            $replace[] = '\\1\\2';
      // [[CamelCase title]]
			$search[] = "#\[\[(([A-Z][a-z]+){2,}\d*) (.+?)\]\]#e";
            $replace[] = '$this->render_wikiLink("$1" ,"$3", '.$this->wiwiConfig['ShowTitles'].')';
      // [[www.mysite.org title]] and [[<a ... /a> title]]
			$search[] = "#\[\[(<a.*>)(.*)</a> (.+?)\]\]#i";
            $replace[] = '$1$3</a>';
      // [[free link | title]]
			$search[] = "#\[\[([^\[\]]+?)\s*\|\s*(.+?)\]\]#e";
            $replace[] = '$this->render_wikiLink("$1" ,"$2", '.$this->wiwiConfig['ShowTitles'].')';
      // [[free link]]
			$search[] = "#\[\[(.+?)\]\]#e";
            $replace[] = '$this->render_wikiLink("$1" ,"", '.$this->wiwiConfig['ShowTitles'].')';
		//        "#([\w.-]+@[\w.-]+)(?![\w.]*(\">|<))#";
		//        '<a href="mailto:\\1">\\1</a>';
		// link with href ending with ?page=
			$search[] = "#(<a.+\?page=(([A-Z][a-z]+){2,}\d*))(\">.*)</a>#Uie";
            $replace[] = '$this->render_wiwiLink("$2","$1","$4");';
      // =Title=
			$search[] = "#(".$nl.")=(.*)=(".$eol.")#m";
            $replace[] = "\n\\1<h2>\\2</h2>\\3\n";
      // > quoted text
			$search[] = "#(".$nl.")".$gt." .* (".$eol.")#me";
            $replace[] = '"<blockquote>".str_replace("\n", " ", preg_replace("#^> #m", "", "$0"))."</blockquote>\n"';
      // * list item
			$search[] = "#(".$nl.")\* (.*)#m";
            $replace[] = "\\1<li>\\2</li>\\3";
	/*En test : Gizmhail */
      //detection des niv0li
			$search[] = "#(".$nl.")\* (.*)#m";
            $replace[] = "<niv0li>\\2</niv0li>";
      //detection des niv1li
			$search[] = "#(".$nl.")\*\* (.*)#m";
            $replace[] = "<niv1li style='margin-left: 8px;list-style: disc inside;'>\\2</niv1li>";
      //detection des niv2li
			$search[] = "#(".$nl.")\*\*\* (.*)#m";
            $replace[] = "<niv2li style='margin-left: 16px;list-style: square inside;'>\\2</niv2li>";
      //detection des niv3li
			$search[] = "#(".$nl.")   (?: )*\* (.*)#m";
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
     /*Fin de test : Gizmhail */

          //		"#^(<li>.*</li>\n)+#m";
          //		"<ul>\n\\0</ul>\n";
          // <[PageIndex]> and <[RecentChanges]>
			$search[] = "#".$lt."\[(PageIndex|RecentChanges)\]".$gt."#ie";
            $replace[] = '$this->render_index("$1")';
          // surrounds with <p> and </p> some lines .. hum, still useful ?
			$search[] = "#^(?!\n|<h2>|<blockquote>|<hr />)(.*?)\n$#sm";
            $replace[] = "<p>\\1</p>";
          // removes multiple line ends .. still useful ?
			$search[] = "#\n+#";
            $replace[] = "\n";
          // ((subPage title)) : page to include (addition : Gizmhail)
       		$search[] = "#\(\((.+?)\)\)#e";
            $replace[] = '$this->renderSubPage("$1")';
          // [[PAGE subPage title]] : page to include (addition : Gizmhail)
     		$search[] = "#<wiwisubpage>[~]?(.+?)</wiwisubpage>#e";
            $replace[] = '$this->renderSubPage("$1")';
          // dummy string, to prevent recognition of special senquences(addition : Gizmhail)
			$search[] = "#\._\.#ie";
            $replace[] = "";

		if ($body == '') $body = $this->body;
		if ($this->wiwiConfig['ShowCamelCase'] == 0) {  // remove CamelCase parsing.
			array_splice($search,8,3);
			array_splice($replace,8,3);
		}
		return preg_replace($search, $replace, $this->ts->displayTarea($body, 1, 1, 1, 1, 0));
	}

	/*
	 * Utilities for page rendering ;
	 */
	function render_wiwiLink($pg,$a,$txt) {
    $wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
		return $a."&amp;back=".$this->keyword.$txt.($this->pageExists($pg)?"":"<img src='".XOOPS_URL."/modules/' . $wiwidir . '/images/nopage.gif' alt='' />")."</a>";
	}

	function render_wikiLink($keyword, $customTitle = '', $show_titles = false )	{
		$wiwidir = basename( dirname(  dirname( __FILE__ ) ) ) ;
		$normKeyword = $this->normalize($keyword);
		$sql = 'SELECT title FROM '.$this->db->prefix('wiwimod_pages') .' WHERE keyword="'.addslashes($normKeyword).'"';
		$dbresult = $this->db->query($sql);
		if ($this->db->getRowsNum($dbresult) > 0) {
			$pageExists = true;
			list($title) = $this->db->fetchRow($dbresult);
			$txt = $customTitle == '' ? (($title != '') && $show_titles) ? $title : $normKeyword : $customTitle ;
		} else {
			$pageExists = false;
			$txt = ($customTitle != '' ? $customTitle : $normKeyword);
		}

		return sprintf('<a href="%s">%s%s</a>',XOOPS_URL.'/modules/' . $wiwidir . '/index.php?page='.$this->encode($normKeyword).'&amp;back='.$this->encode($this->keyword), stripslashes($txt), ($pageExists ? "" : '<img src="'.XOOPS_URL.'/modules/' . $wiwidir . '/images/nopage.gif" alt="" />'));

	}

	function render_index($type)
	{
		$settings = array(
			"PageIndex" => array(
				"ORDER BY title ASC",
				"title",
				1,
				'"<span class=\'wiwi_titre\' style=\"font-size:large;\">[$counter]</span><br/>"',
				'"&nbsp;&nbsp;<a href=\"index.php?page=".$this->encode($content["keyword"])."\">".($content["title"] == "" ? $content["keyword"] : $content["title"])."</a><br/>"',
				""),
			"PageIndexI" => array(
				"ORDER BY keyword ASC",
				"keyword",
				1,
				'"<span class=\'wiwi_titre\'>$counter</span><br />"',
				'"&nbsp;&nbsp;<a href=\"index.php?page=".$content["keyword"]."\">".$content["keyword"]."</a> : ".$content["title"]."<br />"',
				""),
			"RecentChanges" => array(
				"ORDER BY lastmodified DESC LIMIT 20",
				"lastmodified",
				10,
				'"<tr><td colspan=3><strong>".formatTimestamp(strtotime($counter), _SHORTDATESTRING)."</strong></td></tr>"',
				'"<tr><td>&nbsp;".formatTimestamp(strtotime($content["lastmodified"]), "H:i")."</td><td><a href=\"index.php?page=".$this->encode($content["keyword"])."\">".($content["title"] == "" ? $content["keyword"] : $content["title"])."</a></td><td>".$content["summary"]."</td><td><span class=\"itemPoster\">".getUserName($content["u_id"])."</span></td></tr>"',
				"")
		);
		$cfg = $settings[$type];

		$sql = 'SELECT keyword, title, lastmodified, r.userid as u_id, summary FROM '.$this->db->prefix('wiwimod_pages').' p, ' . $this->db->prefix('wiwimod_revisions') . ' r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified '.$cfg[0];
		$result = $this->db->query($sql);

		$body = '' ; $counter = '[';
		while ($content = $this->db->fetcharray($result)) {
			if ($counter != strtoupper(substr($content[$cfg[1]], 0, $cfg[2]))) {
				$counter = strtoupper(substr($content[$cfg[1]], 0, $cfg[2]));
				eval('$body .= (($body)?"'.$cfg[5].'":"")."\n\n".'.$cfg[3].';');
			}
			eval('$body .= '.$cfg[4].'."\n";');
		}

		return "<table>".$body.(($body)?$cfg[5]:"")."</table>\n\n";
	}

	function render_block($blkname) {
		$blk = wiwimod_getXoopsBlock($blkname);
		return "<table><tr><td>".$blk['content']."</td></tr></table>";
	}

	/*
	 * private function , used by parentList method.
	 * Note : this was formerly an inline function, but php5 doesn't seem to accept it recursively.
	 */
	function parentList_recurr($child, &$parlist, &$db) {
		$sql = 'SELECT parent FROM '.$db->prefix('wiwimod_pages').' WHERE keyword="'.addslashes($child).'"';
		$result = $db->query($sql);
		list($parent) = $db->fetchRow($result);
		if (($parent != '')&&(!in_array($parent, $parlist))) {
			$parlist[] = $parent;
			$this->parentList_recurr($parent, $parlist, $db);
		}
	}
  /**
   * Creates breadcrumb of all parent pages to current page
   * @return array List of parent pages linked to the page
   */
	function parentList() {

		$parlist = array();
		if ($this->keyword != '') {
			$this->parentList_recurr($this->keyword, $parlist, $this->db);
		}
		foreach($parlist as $key=>$parent) $parlist[$key] = $this->render_wikiLink($parent, '', $this->wiwiConfig['ShowTitles']);
		return array_reverse($parlist);
	}

	function history($limit = 0, $start = 0)
	{
		$sql = 'SELECT keyword, revid as id, title, body, modified as lastmodified, userid as u_id, summary FROM '.$this->db->prefix('wiwimod_revisions').' r, '. $this->db->prefix('wiwimod_pages') .' p WHERE p.keyword="'.addslashes($this->keyword).'" AND p.pageid=r.pageid ORDER BY id DESC';
		$result = $this->db->query($sql, $limit, $start);

		$hist = array();
		for ($i = 0; $i < $this->db->getRowsNum($result); $i++) {
			$hist[] = $this->db->fetchArray($result);
		}
		return $hist;
	}

	function historyNum()
	{
		$sql = 'SELECT revisions FROM '.$this->db->prefix('wiwimod_pages').' WHERE keyword="'.addslashes($this->keyword).'"';
		$result = $this->db->query($sql);
		list($maxcount) = $this->db->fetchRow($result);
		return $maxcount;
	}

	function diff(&$bodyDiff, &$titleDiff)
	{
		//
		// Get the latest revision contents
		//
		$sql = 'SELECT title, body FROM '.$this->db->prefix('wiwimod_revisions').' r, '.$this->db->prefix('wiwimod_pages').' p WHERE p.pageid="'.$this->pageid.'" AND r.pageid="'.$this->pageid.'" ORDER BY revid DESC LIMIT 1';
		$result = $this->db->query($sql);
		list ($title, $body) = $this->db->fetchRow($result);

		//
		// remove formatting tags, replace tags generating a line break with a "\n".
		//
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
		$titleDiff = ($title == $this->title) ?
			'<h2>'.$this->ts->htmlSpecialChars($title).'</h2>' :
			'<h2><span style="color: red;">'.$this->ts->htmlSpecialChars($this->title).'</span> &rarr; <span style="color: green;">'.$this->ts->htmlSpecialChars($title).'</span></h2>';
	}

	function canRead() {
		return ($this->profile->canRead());
	}

	function canWrite() {
		return ($this->profile->canWrite());
	}

	function canAdministrate() {
		return ($this->profile->canAdministrate());
	}

	function canViewComments() {
		return ($this->profile->canViewComments());
	}

	function canViewHistory() {
		return ($this->profile->canViewHistory());
	}

	/*
	 * checks if current revision has been saved concurrently by another user
	 * Note : even if this "was" a new page when first edited the doc, another
	 *        user may have created a doc with the same "keyword" meanwhile ..
	 */
	function concurrentlySaved () {
 return false;
		$sql = "SELECT lastmodified FROM ".$this->db->prefix("wiwimod_pages")." WHERE keyword='".addslashes($this->keyword)."'";
		$result = $this->db->query($sql);
		$rowsnum = $this->db->getRowsNum($result);

		if ($this->id == 0) {

			return ($rowsnum > 0) ;  // this was a page creation : somebody did it before ...
		} else {
			list($db_lastmodified) = $this->db->fetchRow($result);
			return ($this->lastmodified != $db_lastmodified);
		}

	}

	function pageExists ($page="", $id = 0) {
		$page = addslashes($this->normalize($page));
		if ($id > 0) {
			$sql = "SELECT keyword FROM ".$this->db->prefix("wiwimod_pages")." WHERE pageid = $id";
		} elseif (($page != "") && (intval($page == 0))){
			$sql = "SELECT keyword FROM ".$this->db->prefix("wiwimod_pages")." WHERE keyword='$page'";
		} elseif ($page != "") {
		    $sql = "SELECT keyword FROM ".$this->db->prefix("wiwimod_pages")." WHERE pageid=$page";
		} else {
			return false;
		}
		return ($this->db->getRowsNum($this->db->query($sql)) > 0);
	}

	/*
	 * Returns an array of wiwiRevisions, selected upon given criteria
	 * $where :
	 * $order :
	 * $items_perpage :		if 0, returns all the results
	 * $current_start :		position of the first returned element within the results
	 */
	function getPages($where = "", $order = "", $items_perpage = 0, $current_start = 0)
	{
		if ($order == "") $order = "keyword ASC";
		$fieldlist = "keyword|title|body|lastmodified|u_id|parent|visible|contextBlock|prid|id";

		$sql_a =  "SELECT p.*, body, summary, contextBlock, r.userid as u_id, revid as id FROM ".$this->db->prefix("wiwimod_pages")." AS p, ".$this->db->prefix("wiwimod_revisions")." AS r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified";

		/*
		 * the passed "where" clause has to be adapted because of he jointure : fields must be prefixed with "w1."
		 *
		 */
		if ($where != "") {
			$sql_a .= " AND ".$where;
		}
		if ($order != "") {
			$sql_a .= " ORDER BY ".$order;
		}
		$result_a = $this->db->query($sql_a, $items_perpage, $current_start);

		$pageArr = Array();
		for ($i = 0; $i < $this->db->getRowsNum($result_a); $i++) {
			$row = $this->db->fetchArray($result_a);
			$pageObj = new WiwiRevision();
			$pageObj->keyword = $row['keyword'];
			$pageObj->title = $row['title'];
			$pageObj->body = $row['body'];
			$pageObj->lastmodified = formatTimestamp( strtotime($row['lastmodified']), _MEDIUMDATESTRING );
			$pageObj->u_id = $row['u_id'];
			$pageObj->parent = $row['parent'];
			$pageObj->visible = $row['visible'];
			$pageObj->contextBlock = $row['contextBlock'];
			$pageObj->pageid = $row['pageid'];
			$pageObj->id = $row['id'];
			$pageObj->profile = new wiwiProfile($row['prid']);
			$pageObj->creator = $row['creator'];
			$pageObj->created = $row['createdate'];
			$pageObj->views = $row['views'];
			$pageObj->revisions = $row['revisions'];
			$pageObj->lastviewed = $row['lastviewed'];
			$pageObj->allowComments = $row['allowComments'];
			$pageObj->summary = $row['summary'];
			$pageArr[$i] = $pageObj;
			unset ($pageObj);
		}
		return $pageArr;
	}

	function getPagesNum($where = "")/*, $order = "" - the order by is unnecessary for obtaining a count and sorting is just extra overhead */
	{
		$fieldlist = "keyword|title|body|lastmodified|u_id|parent|visible|contextBlock|prid|id";

		$sql_a =  "SELECT count(p.pageid) as count FROM ".$this->db->prefix("wiwimod_pages").' p, '.$this->db->prefix("wiwimod_revisions").' r WHERE p.pageid=r.pageid AND p.lastmodified=r.modified';

		if ($where != "") {
			$sql_a .= " AND ".$where;
		}

		$result = $this->db->query($sql_a);
		list($maxcount) = $this->db->fetchRow($result);

		return $maxcount;
	}

	//
	// Creates a new revision whom content is copied from the selected one, but with other data (parent, privileges etc..) untouched.
	//
	function restore() {
		$latestRev = new wiwiRevision($this->keyword);

		$latestRev->title = addslashes($this->title);
		$latestRev->body = addslashes($this->body);
		$latestRev->contextBlock = $this->contextBlock;
		return $latestRev->add();
	}

	/*
	 * Deletes all revisions of current page, anterior to current revision.
	 */
	function fix()
	{
		$sql = 'DELETE FROM '.$this->db->prefix('wiwimod_revisions').' WHERE pageid="'.addslashes($this->pageid).'" AND modified < "'.$this->lastmodified.'"';
		$success = $this->db->query($sql);
		return $success;
	}

	function cleanPagesHistory() {
		global $xoopsDB;
		$success = true;
		$sql = "SELECT pageid, MAX(revid) AS id FROM ".$xoopsDB->prefix("wiwimod_revisions")." WHERE modified<'".formatTimestamp(time() - 61 * 24 * 3600, _DATESTRING)."' GROUP BY pageid";
		$result = $xoopsDB->query($sql);
		while ($content = $xoopsDB->fetcharray($result)) {
			$rev = new wiwiRevision("",$content['id']);
			$success &= $rev->fix();
		}
		return $success;
	}

	function deletePage() {
	    $sql = 'DELETE r.*, p.* FROM '.$this->db->prefix('wiwimod_revisions').' r, '.$this->db->prefix('wiwimod_pages').' p WHERE r.pageid="'.$this->pageid.'" AND p.pageid="'.$this->pageid.'"';
	    $success = $this->db->query($sql);
		if ($success) {
      $this->id = 0;
      $this->pageid=0;
		}
		return $success;
	}

	/*
	 * Returns an array with all links on the current page.
	 */
	function getLinks($allowExternals = false) {
		$links = Array();
		$search = array(
			"#(^|\s|>)(([A-Z][a-z]+){2,}\d*)\b#",					// CamelCase
			"#\[\[(([A-Z][a-z]+){2,}\d*) (.+?)\]\]#",				// [[CamelCase title]]
			"#\[\[<a href=\"([^\"]*)\"(?:[^>]*)>(.*)</a> (.+?)\]\]#i",						// [[www.mysite.org title]] and [[<a ... /a> title]]
			"#\[\[([^\[\]]+?)\s*\|\s*(.+?)\]\]#",					// [[free link | title]]
			"#\[\[(.+?)\]\]#",										// [[free link]]
			"#(<a.+\?page=(([A-Z][a-z]+){2,}\d*))\">(.*)</a>#Ui",	// link with href ending with ?page=
		);
		$replace = array(
			array(2,2,true),
			array(1,3,true),
			array(1,2,false),
			array(1,2,true),
			array(1,1,true),
			array(2,2,true),
			);
		foreach ($search as $key => $pattern) {
			if (preg_match_all($pattern, $this->body, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					$links[] = array("url" => $match[$replace[$key][0]], "txt" => $match[$replace[$key][1]], "isWiwiPage" => $match[$replace[$key][2]]);
				}
			}
		}
		return $links;

	}

	function normalize($keyword) {
		$search = array(	"\'",	'\"',	'&quot;',	'&nbsp;'	);
		$replace = array(	"'",	'"',	'"',		' ',		);
		return str_replace($search,$replace,$keyword);
	}
	function encode($keyword) {
		$search = array(	"\'",	"'",	'\"',	'"',	'&quot;',	' ',	'&nbsp;',	);
		$replace = array(	'%27',	'%27',	'%22',	'%22',	'%22',		'+',	'+',		);
		return str_replace($search,$replace,$keyword);
	}

	function decode($keyword) {
		$replace = array(	"'",	'"',	' ',	);
		$search = array(	'%27',	'%22',	'+',	);
		return str_replace($search,$replace,$keyword);
	}

}  // end class wiwiRevision

class WiwiPage extends WiwiRevision {

	function WiwiPage($keyword = "", $pageid = 0) {
		return WiwiRevision::WiwiRevision ($keyword, 0, $pageid);
	}

}

}  // end "ifdefined"

?>