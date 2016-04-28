<?php session_start(); ?>
<html>
<head>
<?php include 'layout.php'; ?>
</head>
<body>

<?php
require 'connect.inc.php';
require 'core.inc.php';
require 'panaszform.php';

include 'fejlec.php';
?>
<div id="panasz" align="center">
<?php
	if (isset($_SESSION['user'])){
	$username = $_SESSION['user'];
	$query = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '" . $username . "'";
	$compiled2 = oci_parse($conn, $query);
	oci_execute($compiled2);
	while (oci_fetch($compiled2)) {
			$my_info = oci_result($compiled2, 'F_ID');
	}
	if (isset($_POST['panasz'])) {
	$panasz = $_POST['panasz'];
	if (!empty($panasz)) {
	$sql = 'INSERT INTO PANASZ (F_ID, PANASZ) '.
		   'VALUES( :id, :panasz)';

	$compiled = oci_parse($conn, $sql);
	oci_bind_by_name($compiled, ':panasz', $panasz);
	oci_bind_by_name($compiled, ':id', $my_info);
	oci_execute($compiled);
	echo $sql;
		echo 'Sikeres panasz küldés!';
	} else {echo '<div class="alert alert-danger" align="center" style="width:300px;">Kérjük töltse ki a mezőket!<div>';} }
	
	}
?>