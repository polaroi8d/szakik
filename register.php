<?php session_start(); ?>
<html>
<head>
<?php include 'layout.php'; ?>
</head>
<body>

<?php
require 'connect.inc.php';
require 'core.inc.php';

include 'fejlec.php';
?>
<div id="regform" align="center">
<?php

require 'regform.php';


if(isset($_POST['teljesnev'])&&isset($_POST['jelszo'])){
	$name = $_POST['teljesnev'];
	$username = $_POST['felhnev'];
	$password = $_POST['jelszo'];
	$email = $_POST['email'];
	$foto = $_POST['foto'];
	$phonenumber = $_POST['telsz'];
	$cim = $_POST['cim'];
	$varos = $_POST['telepules'];
	$iranyito = $_POST['irsz'];

	if(!empty($name) && !empty($username)&& !empty ($password) && !empty ($email) && !empty ($phonenumber) && !empty ($cim)){
		$sql = 'INSERT INTO FELHASZNALO (NEV, FELHASZNALONEV, JELSZO, CIM, "VAROS_CIM", "IRANYITO_CIM", FOTO, TELEFONSZAM, EMAIL) '.
		   'VALUES( :name, :username, :pwd, :szallcim, :telepules, :irsz, :foto, :phonenumber, :email)';

		$compiled = oci_parse($conn, $sql);

		oci_bind_by_name($compiled, ':name', $name);
		oci_bind_by_name($compiled, ':username', $username);
		oci_bind_by_name($compiled, ':pwd', $password);
		oci_bind_by_name($compiled, ':szallcim', $cim);
		oci_bind_by_name($compiled, ':telepules', $varos);
		oci_bind_by_name($compiled, ':irsz', $iranyito);
		oci_bind_by_name($compiled, ':phonenumber', $phonenumber);
		oci_bind_by_name($compiled, ':email', $email);
		oci_bind_by_name($compiled, ':foto', $foto);
		
		oci_execute($compiled);
		echo '<div class="alert alert-success" align="center" style="width: 300px;">Sikeres regisztráció</div>';
	}else{
		echo '<div class="alert alert-danger" align="center" style="width:300px;">Kérjük töltse ki a mezőket!<div>';
	}
	


	
}

?>
</div>

</body>
</html>