<?php
//***************************************************************************//
// SnX-Weather:                                                              //
// 28/09/2004 FOR XOOPS v2                                           //
// by NGUYEN DINH Quoc-Huy (alias SnAKes) (support@qmel.com)                 //
// http://www.qmel.com                                                       //
/******************************************************************************
 ** Copyright (C) 2004 NGUYEN DINH Quoc-Huy (SnAKes)
 ** 
 ** This library is free software; you can redistribute it and/or
 ** modify it under the terms of the GNU Lesser General Public
 ** License as published by the Free Software Foundation; either
 ** version 2.1 of the License, or (at your option) any later version.
 ** 
 ** This library is distributed in the hope that it will be useful,
 ** but WITHOUT ANY WARRANTY; without even the implied warranty of
 ** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 ** Lesser General Public License for more details.
 ** 
 ** You should have received a copy of the GNU Lesser General Public
 ** License along with this library; if not, write to the Free Software
 ** Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **
 ****************************************************************************** 
 ** Copyright (C) 2004 NGUYEN DINH Quoc-Huy (SnAKes)
 ** Cette bibliothèque est libre, vous pouvez la redistribuer et/ou la modifier
 ** selon les termes de la Licence Publique Générale GNU Limitée publiée par la 
 ** Free Software Foundation (version 2 ou bien toute autre version ultérieure 
 ** choisie par vous).
 **
 ** Cette bibliothèque est distribuée car potentiellement utile, mais SANS
 ** AUCUNE GARANTIE, ni explicite ni implicite, y compris les garanties de 
 ** commercialisation ou d'adaptation dans un but spécifique. Reportez-vous 
 ** à la Licence Publique Générale GNU Limitée pour plus de détails.
 **
 ** Vous devez avoir reçu une copie de la Licence Publique Générale GNU Limitée
 ** en même temps que cette bibliothèque; si ce n'est pas le cas, écrivez à la 
 ** Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,
 ** MA 02111-1307, États-Unis.
 **
 ******************************************************************************/
include '../../../include/cp_header.php';

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} else {
	include "../language/english/modinfo.php";
}

function bgColor() {
	global $c;
	$c=1-$c;
	if($c) return "#cccccc";
	else return "#eeeeee";
}

function delmsg($myGet) {
	global $xoopsDB;
	$sql="delete from ".$xoopsDB->prefix("snx_guestbook")." where id='{$myGet['id']}';";
	$result=$xoopsDB->queryF($sql);
	header("Location: index.php?op={$myGet['return']}");
}

function acceptmsg($myGet) {
	global $xoopsDB;
	$sql="update ".$xoopsDB->prefix("snx_guestbook")." set accepted='1' where id='{$myGet['id']}';";
	$result=$xoopsDB->queryF($sql);
	header("Location: index.php?op={$myGet['return']}");
}

function msgmgr($myGet) {
	global $xoopsDB;
	xoops_cp_header();
	echo "<center><h2>"._SnX_GB_ADMENU1."</h2></center>\n";
	$nbEntries=$xoopsDB->getRowsNum($xoopsDB->query("select id from ".$xoopsDB->prefix("snx_guestbook").";"));
	$sql="select id,date,country,city,name,title,comment,homepage,email,icon,ip from ".$xoopsDB->prefix("snx_guestbook")." order by date desc LIMIT ".($myGet["from"]?$myGet["from"]:0).",5;";
	$result=$xoopsDB->query($sql);
	$count=0;
	echo "<center><table border=0 width=60%>";
	while(list($id,$date,$country,$city,$name,$title,$comment,$homepage,$email,$icon,$ip)=$xoopsDB->fetchRow($result)) {
		echo "<tr><td bgcolor=".bgColor().">$date - $title<br>\n";
		echo (($name!="")?"$name":_SnX_GB_ANONYMOUS)." - $ip<br>\n";
		echo "$city - $country<br>\n";
		echo "$homepage - $email<br>";
		echo ereg_replace("\n","<br>\n",$comment)."</td></tr>\n";
		echo "<tr><td align=right><form action=\"index.php\" method=get><input type=hidden name=\"op\" value=\"delmsg\"><input type=hidden name=\"return\" value=\"msgmgr\"><input type=hidden name=\"id\" value=\"$id\"><input type=submit value=\""._SnX_GB_DELETE."\"></form></td></tr>\n";
		echo "<tr><td>&nbsp;</td></tr>\n";
	}
	echo "</table></center>";
	if($nbEntries>5) {
		include_once(XOOPS_ROOT_PATH.'/class/pagenav.php');
		$pagenav=new XoopsPageNav($nbEntries, 5, $myGet["from"], 'from','op=msgmgr');
		echo "\t<p class=\"GB_nav\"><span>".$pagenav->renderNav()."</span></p>\n";
	}
}

function moderation($myGet) {
	global $xoopsDB;
	xoops_cp_header();
	echo "<center><h2>"._SnX_GB_ADMENU3."</h2></center>\n";
	
	$sql="select id,date,country,city,name,title,comment,homepage,email,icon,ip from ".$xoopsDB->prefix("snx_guestbook")." where accepted='0' order by date desc LIMIT ".($myGet["from"]?$myGet["from"]:0).",5;";
	$result=$xoopsDB->query($sql);
	$nbEntries=$xoopsDB->getRowsNum($result);
	if(!$nbEntries) echo "<center><h3>"._SnX_GB_NO_MSG."</h3></center>\n";
	$count=0;
	echo "<center><table border=0 width=60%>";
	while(list($id,$date,$country,$city,$name,$title,$comment,$homepage,$email,$icon,$ip)=$xoopsDB->fetchRow($result)) {
		echo "<tr><td bgcolor=".bgColor().">$date - $title<br>\n";
		echo (($name!="")?"$name":_SnX_GB_ANONYMOUS)." - $ip<br>\n";
		echo "$city - $country<br>\n";
		echo "$homepage - $email<br>";
		echo ereg_replace("\n","<br>\n",$comment)."</td></tr>\n";
		echo "<tr><td align=right>";
		echo "<form action=\"index.php\" method=get><input type=hidden name=\"op\" value=\"delmsg\"><input type=hidden name=\"return\" value=\"moderation\"><input type=hidden name=\"id\" value=\"$id\"><input type=submit value=\""._SnX_GB_DELETE."\"></form>";
		echo "<form action=\"index.php\" method=get><input type=hidden name=\"op\" value=\"acceptmsg\"><input type=hidden name=\"return\" value=\"moderation\"><input type=hidden name=\"id\" value=\"$id\"><input type=submit value=\""._SnX_GB_ACCEPT."\"></form>";
		echo "</td></tr>\n";
		echo "<tr><td>&nbsp;</td></tr>\n";
	}
	echo "</table></center>";
	if($nbEntries>5) {
		include_once(XOOPS_ROOT_PATH.'/class/pagenav.php');
		$pagenav=new XoopsPageNav($nbEntries, 5, $myGet["from"], 'from','op=msgmgr');
		echo "\t<p class=\"GB_nav\"><span>".$pagenav->renderNav()."</span></p>\n";
	}
}

function options($myGet) {
	global $xoopsDB;
	xoops_cp_header();
	echo "<center><h2>"._SnX_GB_ADMENU2."</h2></center>\n";

	$sql="select * from ".$xoopsDB->prefix("snx_guestbook_config") . ";";
	$result=$xoopsDB->query($sql);
	echo "<center><table border=0>";
	echo "<form action=\"index.php\">";
	echo "<input type=\"hidden\" name=\"op\" value=\"saveoptions\">";
	if(list($id, $epp, $notifyEmail, $moderate, $dateFormat) = $xoopsDB->fetchRow($result)) {
		echo "<tr valign=\"top\"><td>"._SnX_GB_ENTRIES_PER_PAGE."</td><td><input name=\"epp\" value=\"$epp\"></td></tr>\n";
		echo "<tr valign=\"top\"><td>"._SnX_GB_NOTIFY_BY_EMAIL."</td><td><input name=\"notify_email\" value=\"$notifyEmail\"</td></tr>\n";
		echo "<tr valign=\"top\"><td>"._SnX_GB_MODERATE."</td><td><input type=radio name=\"moderate\" value=\"1\" ".($moderate?"CHECKED":"").">"._SnX_YES." <input type=radio name=\"moderate\" value=\"0\" ".(!$moderate?"CHECKED":"").">"._SnX_NO."</td></tr>\n";
		echo "<tr valign=\"top\"><td>"._SnX_GB_DATE_FORMAT."</td><td><input name=\"date_format\" value=\"$dateFormat\"></td></tr>\n";
		echo "<tr valign=\"top\"><td></td><td><input type=\"submit\" name=\"submit\" value=\"OK\"></td></tr>\n";
	}
	echo "</form>";
	echo "</table></center>";
}

function saveoptions($myGet) {
	global $xoopsDB;
	$sql="update ".$xoopsDB->prefix("snx_guestbook_config")." set epp='{$myGet['epp']}', notify_email='{$myGet['notify_email']}', moderate='{$myGet['moderate']}', date_format='{$myGet['date_format']}' where id='1';";
	$result=$xoopsDB->queryF($sql);
	header("Location: index.php?op=options");
}

if(!isset($_POST['op'])) {
	$op = isset($_GET['op']) ? $_GET['op'] : 'main';
} else {
	$op = $_POST['op'];
}
switch ($op) {
	case "options":
		options($_GET);
	break;
	
	case "saveoptions":
		saveoptions($_GET);
	break;

	case "msgmgr":
		msgmgr($_GET);
	break;
	
	case "delmsg":
		delmsg($_GET);
	break;
	
	case "moderation":
		moderation($_GET);
	break;
	
	case "acceptmsg":
		acceptmsg($_GET);
	break;
	
	default:
		xoops_cp_header();
		echo "<h4>SnX-Guestbook</h4><table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
		echo "<a href='index.php?op=msgmgr'>"._SnX_GB_ADMENU1."</a></b><br /><br />\n";
		echo "<a href='index.php?op=options'>"._SnX_GB_ADMENU2."</a></b><br /><br />\n";
		echo "<a href='index.php?op=moderation'>"._SnX_GB_ADMENU3."</a></b><br /><br />\n";
		echo "</td></tr></table>\n";
	break;
}
echo "<br><br><a href='index.php'>Menu</a>\n";
xoops_cp_footer();
?>
