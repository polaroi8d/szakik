<?php
session_start(); 
require 'connect.inc.php';

	//$ertekelt_f_id = oci_result($ertekeles, 'F_ID');

	$ert = "SELECT * FROM ERTEKELES WHERE SZ_ID = ".$_GET['sz_id'];

	$ertekeles = oci_parse($conn, $ert);
	oci_execute($ertekeles);

	$outp= "";
	while (oci_fetch($ertekeles)) {
	
	$ertekelt_f_id = oci_result($ertekeles, 'F_ID');
	$ertekelo_nev_sql = "SELECT * FROM FELHASZNALO WHERE F_ID = $ertekelt_f_id";

	$ertekelo_nev = oci_parse($conn, $ertekelo_nev_sql);
	oci_execute($ertekelo_nev);

		while (oci_fetch($ertekelo_nev)) {
			if ($outp != "") {$outp .= ",";}
			$outp .='{"ertekelo":"'.oci_result($ertekelo_nev, 'NEV').'",';
			$outp .='"pont":"'.oci_result($ertekeles, 'PONT') . '",';
			$outp .='"ertekelo_f_id":"'.oci_result($ertekeles, 'F_ID') . '",';
			$outp .='"szoveg":"'.oci_result($ertekeles, 'SZOVEG') . '"}'; 
		}
	}

	$outp ='{"records":['.$outp.']}';
	echo($outp);
?>