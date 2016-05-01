<?php
session_start(); 
require 'connect.inc.php';

	$data = json_decode(file_get_contents("php://input"));

	$h_id = $data->h_id;
	$from_id = $data->from_id;
	$to_id = $data->to_id;
	$uzenet = $data->uzenet;

	$insert_uzenet_sql = "INSERT INTO UZENET(H_ID, FROM_ID, TO_ID, DATUM, SZOVEG) VALUES(:h_id, :from_id, :to_id, sysdate, :uzenet)";

	$insert_uzenet = oci_parse($conn, $insert_uzenet_sql);
	oci_bind_by_name($insert_uzenet, ':h_id', $h_id);
	oci_bind_by_name($insert_uzenet, ':from_id', $from_id);
	oci_bind_by_name($insert_uzenet, ':to_id', $to_id);
	oci_bind_by_name($insert_uzenet, ':uzenet', $uzenet);
	oci_execute($insert_uzenet);
?>