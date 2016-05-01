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
<div id="regform2" align="center">
			<div class="container">
		  <div class="row">
		    <div class="col-sm-5" id="miertreg"><h2>Miért regisztrálj?</h2>
		    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
		    		aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		    		 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur 
		    		 sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> </div>
		    <div class="col-sm-5"><?php require 'regform2.php'; ?></div>
		  </div>
		</div>

<?php
if(isset($_POST['teljesnev'])&&isset($_POST['jelszo'])){
	$name = $_POST['teljesnev'];
	$username = $_POST['felhnev'];
	$password = $_POST['jelszo'];
	$email = $_POST['email'];
	$foto = $_POST['foto'];
	$phonenumber = $_POST['telsz'];
	$munka = $_POST['munka'];
	$cim = $_POST['cim'];
	$tipus = 'normal';

	if(!empty($name) && !empty($munka) && !empty($username)&& !empty ($password) && !empty ($email) && !empty ($phonenumber) && !empty ($cim)){
		$sql = "INSERT INTO SZAKI (MUNKANEV,NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS )
		   VALUES(:munka,:name, :username,:pwd, :phonenumber,:email,:foto, :cim, 'normal')";

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
		echo '<div class="alert alert-danger" align="center" style="width: 300px;">Kérjük töltse ki a mezőket!</div>';
	}
}
?>
</div>
</body>
</html>