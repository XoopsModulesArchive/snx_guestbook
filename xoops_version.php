<?php
//***************************************************************************//
// SnX-Guestbook:                                                              //
// 05/10/2004 FOR XOOPS v2                                           //
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
 ** Cette biblioth�que est libre, vous pouvez la redistribuer et/ou la modifier
 ** selon les termes de la Licence Publique G�n�rale GNU Limit�e publi�e par la 
 ** Free Software Foundation (version 2 ou bien toute autre version ult�rieure 
 ** choisie par vous).
 **
 ** Cette biblioth�que est distribu�e car potentiellement utile, mais SANS
 ** AUCUNE GARANTIE, ni explicite ni implicite, y compris les garanties de 
 ** commercialisation ou d'adaptation dans un but sp�cifique. Reportez-vous 
 ** � la Licence Publique G�n�rale GNU Limit�e pour plus de d�tails.
 **
 ** Vous devez avoir re�u une copie de la Licence Publique G�n�rale GNU Limit�e
 ** en m�me temps que cette biblioth�que; si ce n'est pas le cas, �crivez � la 
 ** Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,
 ** MA 02111-1307, �tats-Unis.
 **
 ******************************************************************************/

$modversion['name'] = "SnX-Guestbook";
$modversion['version'] = "0.1.9";
$modversion['description'] = _SnX_GB_DESC;
$modversion['author'] = "by NGUYEN DINH Quoc-Huy (SnAKes)<br />support@qmel.com<br />http://www.qmel.com/ <br />http://www.ntica.com/";
$modversion['license'] = "GNU/GPL";
$modversion['official'] = 0;
$modversion['image'] = "images/snxguestbook.png";
$modversion['dirname'] = "snx_guestbook";

$modversion['hasMain'] = 1;

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['blocks'][1]['file'] = "block.php";
$modversion['blocks'][1]['name'] = "SnX Guestbook";
$modversion['blocks'][1]['show_func'] = "disp_block";
$modversion['blocks'][1]['description'] = "Display block";

// Search
// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
//$modversion['sqlfile']['postgresql'] = "sql/pgsql.sql";
// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "snx_guestbook";

?>