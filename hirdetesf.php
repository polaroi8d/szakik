<?php session_start(); ?>
<html>
<head>
<?php include 'layout.php'; ?>
</head>
<body>

<?php
require 'connect.inc.php';
require 'core.inc.php';
require 'hirdetesform.php';

include 'fejlec.php';
?>
<div id="hirdetesf" align="center">
<?php
// megnézem, hogy felhasználó van-e bejelentkezve, ha igen my_infoba beleírom annak F_IDját
	if (isset($_SESSION['user'])){
	$username = $_SESSION['user'];
	$query = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '" . $username . "'";
	$compiled2 = oci_parse($conn, $query);
	oci_execute($compiled2);
	while (oci_fetch($compiled2)) {
			$my_info = oci_result($compiled2, 'F_ID');
	}
	//Ledeklaráljuk az értékeket, ha vannak ilyenek.
	if (isset($_POST['szoveg'])&&isset($_POST['munkakat'])) {
	$szoveg = $_POST['szoveg'];
	$munkakat = $_POST['munkakat'];
	// Ha nem üresek akkor lefut az SQL kód
	if (!empty($szoveg) && !empty($munkakat)) {
	$sql = 'INSERT INTO IGENYLES (F_ID, DATUM , SZOVEG, MUNKAKAT) '.
		   'VALUES( :id, sysdate, :szoveg , :munkakat)';

	$compiled = oci_parse($conn, $sql);
	//SQL kód alapján deklarálom az értékeket
	oci_bind_by_name($compiled, ':szoveg', $szoveg);
	oci_bind_by_name($compiled, ':id', $my_info);
	oci_bind_by_name($compiled, ':munkakat', $munkakat);
	//SQL kódot futatt az adatnázisba
	oci_execute($compiled);
	echo $sql;
		echo 'Sikeres igénylés!';
	} else {echo '<div class="alert alert-danger" align="center" style="width:300px;">Kérjük töltse ki a mezőket!<div>';} }
	
	}
?>
</div>
</body>
</html>