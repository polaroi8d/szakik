<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type"content="text/html; charset=utf-8" /> 
</head>
<body>
<div id="content">
<?php
require 'connect.inc.php';
require 'core.inc.php';

include 'fejlec.php';
require 'loginform.php';

?>

<?php
if(isset($_POST['felhnev'])&&isset($_POST['jelszo'])){
	$username = $_POST['felhnev'];
	$password = $_POST['jelszo'];
	$query = "SELECT F_ID, JELSZO FROM FELHASZNALO WHERE FELHASZNALONEV = '" . $username . "'";

	$stid = oci_parse($conn, $query);
	oci_execute($stid);
	
	while (oci_fetch($stid)) {
		if($password != oci_result($stid, 'JELSZO')){
			echo 'Hibás felhasználónév vagy jelszó';
		}else{
			$_SESSION['user'] = $username;
			header('Location: index.php'); 
		}
	}
	
}
?>
</div>
</body>
</html>