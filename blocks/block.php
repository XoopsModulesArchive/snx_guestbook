<?php
// ***************************************************************************//
// 09/05/2005 FOR XOOPS v2                                           //
// by NGUYEN DINH Quoc-Huy (alias SnAKes) (support@qmel.com)                 //
// http://www.qmel.com                                                       //
/**
 * Copyright (C) 2004 NGUYEN DINH Quoc-Huy (SnAKes)
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * 
 * 
 * Copyright (C) 2004 NGUYEN DINH Quoc-Huy (SnAKes)
 * Cette bibliothèque est libre, vous pouvez la redistribuer et/ou la modifier
 * selon les termes de la Licence Publique Générale GNU Limitée publiée par la 
 * Free Software Foundation (version 2 ou bien toute autre version ultérieure 
 * choisie par vous).
 * 
 * Cette bibliothèque est distribuée car potentiellement utile, mais SANS
 * AUCUNE GARANTIE, ni explicite ni implicite, y compris les garanties de 
 * commercialisation ou d'adaptation dans un but spécifique. Reportez-vous 
 * à la Licence Publique Générale GNU Limitée pour plus de détails.
 * 
 * Vous devez avoir reçu une copie de la Licence Publique Générale GNU Limitée
 * en même temps que cette bibliothèque; si ce n'est pas le cas, écrivez à la 
 * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,
 * MA 02111-1307, États-Unis.
 */

function initRand () {
	static $randCalled = false;
	if (!$randCalled) {
		srand((double) microtime() * 1000000);
		$randCalled = true;
	} 
} 

function randNum ($low, $high) {
	initRand();
	$rNum = rand($low, $high);
	return $rNum;
} 

function disp_block() {
	global $xoopsDB;
	global $_SESSION;
	global $HTTP_REFERER;

	if(empty($_SESSION["qmelReferer"])) $_SESSION["qmelReferer"] = $HTTP_REFERER;



	$sql = "select * from " . $xoopsDB->prefix("snx_guestbook") . ";";
	$queryID = $xoopsDB->query($sql);
	$nbEntries = $xoopsDB->getRowsNum($queryID);
	$results = array();
	while($entry=$xoopsDB->fetchArray($queryID)) {
		$results[] = $entry;
	}

	initRand();
	$index = randNum(0, $nbEntries-1);
	
	$block = array();
	$block['title'] = "SnX Guestbook";
	$block['content'] = "<style type=\"text/css\" title=\"currentStyle\">@import \"".XOOPS_URL."/modules/snx_guestbook/style.php\";</style>";
	$block['content'] .= "<div id=\"SnX_GB_block\">\n";
	$block['content'] .= "\t<h3 class=\"SnX_GB_title\">"._SnX_GB_RANDOM_POST.":</h3>\n";
	$block['content'] .= "\t<p class=\"SnX_GB_comment\">\"" . substr($results[$index]["comment"],0,100) . (strlen($results[$index]["comment"])>100?"...":"") . "\"</p>\n";
	$block['content'] .= "\t<p class=\"SnX_GB_from\">" . $results[$index]["name"] . "</p>\n";
	$block['content'] .= "</div>\n";
	$block['content'] .= "<center><a href=\"".XOOPS_URL."/modules/snx_guestbook/\">"._SnX_GB_VIEW."</a></center>\n";

	return $block;
} 

?>