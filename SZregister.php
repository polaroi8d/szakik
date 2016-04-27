<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type"content="text/html; charset=utf-8" /> 
</head>
<body>

<?php
require 'connect.inc.php';
require 'core.inc.php';

include 'fejlec.php';
?>
<div id="regform2">
<?php

require 'regform2.php';


if(isset($_POST['teljesnev'])&&isset($_POST['jelszo'])){
	$name = $_POST['teljesnev'];
	$username = $_POST['felhnev'];
	$password = $_POST['jelszo'];
	$email = $_POST['email'];
	$foto = $_POST['foto'];
	$phonenumber = $_POST['telsz'];
	$munka = $_POST['munka'];
	$cim = $_POST['cim'];

	if(!empty($name) && !empty($munka) && !empty($username)&& !empty ($password) && !empty ($email) && !empty ($phonenumber) && !empty ($cim)){
		$sql = 'INSERT INTO SZAKI (MUNKANEV,NEVE, FELHASZNALONEV,JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) '.
		   'VALUES( :munka,:name, :username,:pwd, :phonenumber,:email,:foto, :cim, normal)';

		$compiled = oci_parse($conn, $sql);

		oci_bind_by_name($compiled, ':name', $name);
		oci_bind_by_name($compiled, ':username', $username);
		oci_bind_by_name($compiled, ':pwd', $password);
		oci_bind_by_name($compiled, ':cim', $cim);
		oci_bind_by_name($compiled, ':munka', $munka);
		oci_bind_by_name($compiled, ':phonenumber', $phonenumber);
		oci_bind_by_name($compiled, ':email', $email);
		oci_bind_by_name($compiled, ':foto', $foto);
		
		oci_execute($compiled);
		echo 'Sikeres regisztráció';
	}else{
		echo 'Kérjük töltse ki a mezőket!';
	}
	


	
}

?>
</div>

</body>
</html>