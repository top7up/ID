<?php
// ----------------------------------------------------------------------
// Copyright (C) 2007 by Abdul-Aziz Al-Oraij.
// http://aziz.oraij.com/
// ----------------------------------------------------------------------
// LICENSE

// This program is open source product; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Class Name:
// Filename:   example.php
// Original    Author(s): Abdul-Aziz Al-Oraij <aziz.oraij.com>
// Purpose:
// ----------------------------------------------------------------------
// Bismillah..
include "src/validateSAID.php";

use top7up\validateSAID;

echo "<html><title>Validate Saudi ID التحقق من رقم الهوية السعودية</title><head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /></head><body>";
if($_POST){
	$validate = new validateSAID('en');
	echo "The number <b>{$_POST['ID']}</b> is <b><font color=". ($validate->check($_POST['ID'])>0?"green> a valid ":"red>an invalid"). "</font></b> Saudi identification number. ".($validate->check($_POST['ID'])>0?"<br />It returns to <b>" . $validate->scheck($_POST['ID']) . "</b> AK in Arabic as: <b>":"");
	$validate->hl = 'ar';
	echo $validate->scheck($_POST['ID'])."</b>";
}
echo "<form method=post>Try a number (as an National ID or Iqama ID): <input type=text name=ID /><input type=submit value=TRY! /></form>";



?></body></html>
