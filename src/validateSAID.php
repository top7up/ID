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
// Class Name: EdMySite Executable File
// Filename:   validateSAID.class.php
// Original    Author(s): Abdul-Aziz Al-Oraij <aziz.oraij.com>
// Purpose:    Run the website with full functionality
// ----------------------------------------------------------------------
// Bismillah..

class validateSAID {
	var $stype = array(
		'ar'=>array (1=>"هوية وطنية سعودية", "رقم إقامة لغير السعوديين"),
		'en'=>array (1=>"Saudi National ID", "Non-Saudi Resident ID (Iqama)"));
	var $hl = "ar";
	function validateSAID($hl = "ar"){
		$this->hl = $hl;
	}
	function scheck($id){
		return $this->stype[$this->hl][$this->check($id)];
	}
	function check($id){
		$id = trim($id);
		if(!is_numeric($id)) return false;
		if(strlen($id) !== 10) return false;
		$type = substr ( $id, 0, 1 );
		if($type != 2 && $type != 1 ) return false;

		for( $i = 0 ; $i<10 ; $i++ ) {
			//echo "  $id <b>"."</b> -";
			if ( $i % 2 == 0){
				$ZFOdd = str_pad ( ( substr($id, $i, 1) * 2 ), 2, "0", STR_PAD_LEFT );
				$sum += substr ( $ZFOdd, 0, 1 ) + substr ( $ZFOdd, 1, 1 );
			}else{
				$sum += substr ( $id, $i, 1 );
			}
		}
		//echo $sum;
		return $sum%10 ? false : $type;
	}
}
