<?php
/**************************************************************************************
* Class: Pager
* Methods:
* findStart
* findPages
* pageList
* nextPrev
* Redistribute as you see fit.
**************************************************************************************/
class Pager {
	/***********************************************************************************
	* int findStart (int limit)
	* Returns the start offset based on $_GET['page'] and $limit
	***********************************************************************************/
	function findStart($limit) {
		if((!isset($_REQUEST['page'])) || ($_REQUEST['page'] == "1")) {
			$start = 0;
			$_REQUEST['page'] = 1;
		} else {
			$start = ($_REQUEST['page']-1) * $limit;
		}
		return $start;
	}
	/***********************************************************************************
	* int findPages (int count, int limit)
	* Returns the number of pages needed based on a count and a limit
	***********************************************************************************/
	function findPages($count, $limit) {
		$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
		return $pages;
	}
	/***********************************************************************************
	* string pageList (int curpage, int pages)
	* Returns a list of pages in the format of "� < [pages] > �"
	***********************************************************************************/
	function pageList($curpage, $pages, $str="") {
		if(trim($str)=="") $str="";
		$page_list = " ";
		
		/* Print the first and previous page links if necessary */
		if(($curpage != 1) && ($curpage)) {
			$page_list .= " <a href=\"".$_SERVER['PHP_SELF']."?page=1$str\" title=\"First Page\">First</a> &nbsp;";
		}
		if(($curpage-1) > 0) {
			$page_list .= " &nbsp;<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."$str\" title=\"Previous Page\"><</a> &nbsp;";
		}		
		
		/* Print the numeric page list; make the current page unlinked and bold */
		if(trim($page_list)) $page_list .= " | ";
		if($pages) {
			for($i=1; $i<=$pages; $i++) {
				if ($i == $curpage) {
					$page_list .= " <b>".$i."</b> | ";
				} else {
					$page_list .= " <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."$str\" title=\"Page ".$i."\">".$i."</a> | ";
				} 
				//$page_list .= " ";
			}
		}
		/* Print the Next and Last page links if necessary */
		if(($curpage+1) <= $pages) {
			$page_list .= " &nbsp;<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."$str\" title=\"Next Page\">></a>&nbsp; ";
		}
		if(($curpage != $pages) && ($pages != 0)) {
			$page_list .= " &nbsp;<a href=\"".$_SERVER['PHP_SELF']."?page=".$pages."$str\" title=\"Last Page\">Last</a> ";
		}
			//$page_list .= "</td>\n";
			return $page_list;
	}
	/***********************************************************************************
	* string nextPrev (int curpage, int pages)
	* Returns "Previous | Next" string for individual pagination (it's a word!)
	***********************************************************************************/
	function nextPrev($curpage, $pages) {
		$next_prev = "";
		if(($curpage-1) <= 0) 	{
			$next_prev .= "Previous";
		} else {
			$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."$str\">Previous</a> ";
		}
		$next_prev .= " | ";

		if(($curpage+1) > $pages) {
			$next_prev .= "Next";
		} else {
			$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."$str\">Next</a> ";
		}
		return $next_prev;
	}
}
?>
