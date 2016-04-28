<?php session_start(); ?>
<html>
<head>
<?php include 'layout.php'; ?>
</head>
<body>
<div id="ellen" align="center">
<?php
require 'connect.inc.php';
require 'core.inc.php';
include 'fejlec.php';
if (isset($_SESSION['user'])){
$user = $_SESSION['user'];
$query = "SELECT COUNT(*) AS NUMBER_OF_ROWS FROM FELHASZNALO WHERE FELHASZNALONEV = '" . $user . "'"  ;
$stid = oci_parse($conn, $query);
oci_define_by_name($stid, 'NUMBER_OF_ROWS', $number_of_rows);
oci_execute($stid);
oci_fetch($stid);
if ($number_of_rows == 0)
	{
		echo 'Szaki van bejelentkezve!';
	} else {echo 'Felhasznalo van bejelentkezve!';}

	/*$ellen = oci_result($stid, 'FELHASZNALONEV');
	if($ellen == $user) {
		echo 'FELHASZNALO van bejelentkezve';
	}*/
  /*if($ellen != $user){
	  echo 'Felhasználó';
}	else echo 'Szaki van bejelentkezve'; */ }

?>
</div>
</body>
</html>
