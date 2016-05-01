<?php
session_start(); 
require 'connect.inc.php';
	

							//felhasználói adatok megszerzése
	$data = json_decode(file_get_contents("php://input"));

	$e_id = $data->e_id;
	$pont = $data->pont;
	$szoveg = $data->szoveg;


	$e_szerk_sql = "UPDATE ERTEKELES SET PONT=:pont,SZOVEG=:szoveg WHERE E_ID= :e_id";
	$e_szerk = oci_parse($conn, $e_szerk_sql);
	oci_bind_by_name($e_szerk, ':e_id', $e_id);
	oci_bind_by_name($e_szerk, ':szoveg', $szoveg);
	oci_bind_by_name($e_szerk, ':pont', $pont);
		echo $e_szerk_sq;
	oci_execute($e_szerk);
?>