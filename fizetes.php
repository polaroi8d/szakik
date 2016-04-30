<?php
session_start(); 
require 'connect.inc.php';
	
	$data = json_decode(file_get_contents("php://input"));
	
	$sz_id = $data->sz_id;
	$osszeg = $data->osszeg;
	
	$beilleszt_sql = "INSERT INTO FIZETES(SZ_ID, OSSZEG, DATUM) VALUES(:sz_id, :osszeg, sysdate)";
	$beilleszt = oci_parse($conn, $beilleszt_sql);
	oci_bind_by_name($beilleszt, ':osszeg', $osszeg);
	oci_bind_by_name($beilleszt, ':sz_id', $sz_id);
	oci_execute($beilleszt);
	
?>