<?php
/**
 * Used to create comparisons between revisions
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id: diff.php 21035 2011-03-12 22:45:39Z skenow $
 */

if (!defined('XOOPS_ROOT_PATH') && !defined('ICMS_ROOT_PATH')) exit();

/* arr_diff 2003 by Raphael Kirschke (see http://www.php.net/array_diff) */

function arr_diff(&$a1, &$a2) {
	$c1 = count($a1);
	$c2 = count($a2);
	$v[1] = 0;

	for ($D = 0; /* $D <= 70 */; $D++) {
		for ($k = -$D; $k <= $D; $k = $k+2) {
			if (($k == -$D) || ($k != $D && $v[$k-1] < $v[$k+1])) {
				$x = $v[$k+1];
			} else {
				$x = $v[$k-1] + 1;
			}
			$y=$x-$k;

			while (($x < $c1) && ($y < $c2) && ($a1[$x] == $a2[$y])) {
				$x++;
				$y++;
			}
			$v[$k] = $x;

			if (($x >= $c1) && ($y >= $c2)) {
				$vbck[$D] = $v;

				return diff_rek($a1, $a2, $D, $c1 - $c2, $vbck);
			}
		}
		$vbck[$D] = $v;
	}

	return -1;
}

function diff_rek(&$a1, &$a2, $D, $k, &$vbck) {
	$x = $vbck[$D][$k];
	$y = $x - $k;

	if ($D == 0) {
		if ($x == 0) {
			return array(array(), array());
		} else {
			return array(array_slice($a1, 0, $x), array_fill(0, $x, '='));
		}
	}

	$x2 = (isset($vbck[$D-1][$k+1])) ? $vbck[$D-1][$k+1] : 0;
	$y2 = ((isset($vbck[$D-1][$k-1])) ? $vbck[$D-1][$k-1] : 0) - ($k - 1);
	$xdif = $x - $x2;
	$ydif = $y - $y2;
	$l = min($x - $x2, $y - $y2);
	$x = $x - $l;
	$y = $y - $l;

	if ($x == $x2) {
		$res = diff_rek($a1, $a2, $D - 1, $k + 1, $vbck);
		array_push($res[0], $a2[$y-1]);
		array_push($res[1], '+');

		if ($l > 0) {
			$res[0] = array_merge($res[0], array_slice($a2, $y, $l));
			$res[1] = array_merge($res[1], array_fill(0, $l, '='));
		}
	} else {
		$res=diff_rek($a1, $a2, $D - 1, $k - 1, $vbck);
		array_push($res[0], $a1[$x-1]);
		array_push($res[1], '-');

		if ($l > 0) {
			$res[0] = array_merge($res[0], array_slice($a1, $x, $l));
			$res[1] = array_merge($res[1], array_fill(0, $l, '='));
		}
	}

	return $res;
}

function diffDisplay($source1, $source2) {
	//    $a1 = explode("\n", preg_replace("/\r\n?/", "\n", str_replace("<", "&lt;", $source1)));
	//    $a2 = explode("\n", preg_replace("/\r\n?/", "\n", str_replace("<", "&lt;", $source2)));

	$a1 = explode('\n', preg_replace('/\r\n?/', '\n', $source1));
	$a2 = explode('\n', preg_replace('/\r\n?/', '\n', $source2));

	$table = '<table border="1" cellspacing="0" cellpadding="3">';
	$result = arr_diff($a1, $a2);

	foreach ($result[0] as $nr => $line) {
		$sign = $result[1][$nr];
		$color = '';
		if (trim($line) != '') {
			if ($sign != '=') {
				$color = ($sign == '-') ? '#CC0000' : '#669933';
			} else {
				$sign = '&nbsp;';
			}
				
			$table .= '<tr><td align="center" style="background-color:' . $color . '">' 
				. $sign . '</td><td>&nbsp;</td><td>' 
				. (($color != "") ? '<strong style="color: ' . $color . ';">' : '') 
				. $line . (($color != "") ? '</strong>' : '') . '</td></tr>';
		}
	}

	return $table . '</table>';
}
