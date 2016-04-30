<?php
session_start(); 
require 'connect.inc.php';
	

							//felhasználói adatok megszerzése
	$data = json_decode(file_get_contents("php://input"));

	$e_id = $data->e_id;


	$torol_sql = "DELETE FROM ERTEKELES WHERE E_ID = :e_id";
	$torol = oci_parse($conn, $torol_sql);
	oci_bind_by_name($torol, ':e_id', $e_id);
	oci_execute($torol);
?>