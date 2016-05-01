<?php 
session_start(); 
require 'connect.inc.php';
?>
<html>
<head>
<style type="text/css">
	#uzenetek{
		margin-left: 10%;
		margin-right: 10%;
		background-color: rgba(255,255,255,0.7);
		border-radius: 10px;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 30px;
		padding-left: 30px;
		line-height: 150%;
	}

	#uzenetek li {
		display: block;
	}

	#uzenetek ul {
		list-style-type: none;
	    width: auto;
	    padding-left: 0;
	}

	col col-md-3 {
		color: red;
	}
</style>
<?php include 'layout.php'; ?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="assets/js/uzenet.js"></script>
</head>
<body>
<?php include 'fejlec.php'; ?>
	<div class="container">
		<div id="uzenetek" ng-app="uzenetApp" ng-controller="uzenetcontroller">
	  		<div class="row">
	  		<h1>Üzenetek</h1>
<?php
	//Most kiderul szaki-e
	$id_ker_sql = "SELECT SZ_ID FROM SZAKI WHERE FELHASZNALONEV = '".$_SESSION['user']."'";
	$id_ker = oci_parse($conn, $id_ker_sql);
	oci_execute($id_ker);

	if (oci_fetch($id_ker)) {
		$f_id = oci_result($id_ker, 'SZ_ID');
		//HA SZAKI
		$id_ker_sql = "SELECT SZ_ID FROM SZAKI WHERE FELHASZNALONEV = '".$_SESSION['user']."'";
		$id_ker = oci_parse($conn, $id_ker_sql);
		oci_execute($id_ker);
		while (oci_fetch($id_ker)) {
			$f_id = oci_result($id_ker, 'SZ_ID');
		}?>
			 <div class="col col-md-3">
	  				<h3>Összes</h3>
	  				<?php

	  					//üzenetek lekérdezése
	  				//	$osszes_u_sql = "SELECT DISTINCT FROM_ID FROM UZENET WHERE TO_ID= ".$f_id;
	  				//	$osszes_u = oci_parse($conn, $osszes_u_sql);
	  					//oci_execute($osszes_u);


	  					//while (oci_fetch($osszes_u)) {
	  						//$from_id = oci_result($osszes_u, 'FROM_ID');
	  						$adatok_u_sql = "SELECT DISTINCT FELHASZNALO.NEV, FELHASZNALO.F_ID FROM FELHASZNALO, UZENET WHERE UZENET.FROM_ID = FELHASZNALO.F_ID ";
	  						$adatok_u = oci_parse($conn, $adatok_u_sql);
	  						oci_execute($adatok_u);
	  							while(oci_fetch($adatok_u)) {

	  						?>
	  						<ul class="list-group">
	  							<li class="list-group-item"><b>Feladó:</b><?php ?>  <br> 
	  							<a href="?from_id=<?php echo oci_result($adatok_u, 'F_ID'); ?>">
	  							<?php echo oci_result($adatok_u, 'NEV'); ?></a>
	  							</li>
	  						</ul>

	  						<?php } //}
	  						
	  				?>
	  			</div>

	  			<div class="col col-md-9">
<?php
	  			if(!empty($_GET['from_id'])) {
	  				$kuldo_sql = "SELECT * FROM FELHASZNALO WHERE F_ID= ".$_GET['from_id'];
	  				$kuldo = oci_parse($conn, $kuldo_sql);
	  				oci_execute($kuldo);

	  				while (oci_fetch($kuldo)) {
	  				
?>
	  			<h3><?php echo oci_result($kuldo, 'NEV'); ?> üzenete:</h3>
	  			<?php 
	  				$uzenetek_sql =" SELECT * FROM UZENET ".
	  									"WHERE (FROM_ID=".$_GET['from_id']." AND TO_ID=".$f_id.") ".
	  									"OR (TO_ID=".$_GET['from_id']." AND FROM_ID=".$f_id.") ORDER BY DATUM";
	  				$uzenetek = oci_parse($conn, $uzenetek_sql);
	  				oci_execute($uzenetek);

	  				while (oci_fetch($uzenetek)) {
	  					$h_id_u = oci_result($uzenetek, 'H_ID');

	  					$h_nev_sql = "SELECT MUNKAKAT FROM IGENYLES WHERE H_ID=".$h_id_u;
	  					$h_nev = oci_parse($conn, $h_nev_sql);
	  					oci_execute($h_nev);
	  					while (oci_fetch($h_nev)) {
	  						$h_nev_u = oci_result($h_nev, 'MUNKAKAT');
	  					}
	  				/*	echo oci_result($uzenetek, 'FROM_ID')." to ". oci_result($uzenetek, 'TO_ID');*/
	  				if($f_id == oci_result($uzenetek, 'FROM_ID')) {
?>
					<div class="panel panel-success">
					  <div class="panel-heading"> Ön válasza 
					  <br>Ezen kapcsán: <a href="ticket.php?h_id=<?php echo $h_id_u; ?>"> <?php echo $h_nev_u; ?></a></div>
					  <div class="panel-body"><?php echo oci_result($uzenetek, 'SZOVEG'); ?></div>
					</div>
<?php
	  				} else {
?>
					<div class="panel panel-default">
					  <div class="panel-heading"> <?php echo oci_result($kuldo, 'NEV'); ?> üzenete 
					  <br>Ezen kapcsán: <a href="ticket.php?h_id=<?php echo $h_id_u; ?>"> <?php echo $h_nev_u; ?></a></div>
					  <div class="panel-body"><?php echo oci_result($uzenetek, 'SZOVEG'); ?></div>
					</div>
<?php
					} 
	  				}

	  			 ?>
					<form class="form-group">
			 		<textarea 	class="form-control" 
			 					rows="3" 
			 					name="uzenet" 
			 					ng-model = "uzenet"></textarea>
			 		<br>

			 		<input 	type="submit" 
			 				class="btn btn-success" 
			 				value="Válasz" 
			 				ng-click=
			 					"insertdata(
			 						<?php echo $h_id_u; ?>, 
			 						<?php echo $f_id; ?>,
			 						<?php echo $_GET['from_id'];?>  )
			 						"/>										        
					 </form>
	  			<?php } } else { ?>
	  				<h4>Kérlek válassz üzenetet a bal oldali listából</h4>
	  			<?php } 		
?>
<?php	} else {
		$id_ker_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '".$_SESSION['user']."'";
		$id_ker = oci_parse($conn, $id_ker_sql);
		oci_execute($id_ker);
		while (oci_fetch($id_ker)) {
			$f_id = oci_result($id_ker, 'F_ID');
		}?>
			 <div class="col col-md-3">
	  				<h3>Összes</h3>
	  				<?php

	  					//üzenetek lekérdezése
	  				//	$osszes_u_sql = "SELECT DISTINCT FROM_ID FROM UZENET WHERE TO_ID= ".$f_id;
	  				//	$osszes_u = oci_parse($conn, $osszes_u_sql);
	  					//oci_execute($osszes_u);


	  					//while (oci_fetch($osszes_u)) {
	  						//$from_id = oci_result($osszes_u, 'FROM_ID');
	  						$adatok_u_sql = "SELECT DISTINCT SZAKI.NEVE, SZAKI.SZ_ID FROM SZAKI, UZENET WHERE UZENET.FROM_ID = SZAKI.SZ_ID ";
	  						$adatok_u = oci_parse($conn, $adatok_u_sql);
	  						oci_execute($adatok_u);
	  							while(oci_fetch($adatok_u)) {

	  						?>
	  						<ul class="list-group">
	  							<li class="list-group-item"><b>Feladó:</b><?php ?>  <br> 
	  							<a href="?from_id=<?php echo oci_result($adatok_u, 'SZ_ID'); ?>">
	  							<?php echo oci_result($adatok_u, 'NEVE'); ?></a>
	  							</li>
	  						</ul>

	  						<?php } //}
	  						
	  				?>
	  			</div>

	  			<div class="col col-md-9">
<?php
	  			if(!empty($_GET['from_id'])) {
	  				$kuldo_sql = "SELECT * FROM SZAKI WHERE SZ_ID= ".$_GET['from_id'];
	  				$kuldo = oci_parse($conn, $kuldo_sql);
	  				oci_execute($kuldo);

	  				while (oci_fetch($kuldo)) {
	  				
?>
	  			<h3><?php echo oci_result($kuldo, 'NEVE'); ?> üzenete:</h3>
	  			<?php 
	  				$uzenetek_sql =" SELECT * FROM UZENET ".
	  									"WHERE (FROM_ID=".$_GET['from_id']." AND TO_ID=".$f_id.") ".
	  									"OR (TO_ID=".$_GET['from_id']." AND FROM_ID=".$f_id.")";
	  				$uzenetek = oci_parse($conn, $uzenetek_sql);
	  				oci_execute($uzenetek);

	  				while (oci_fetch($uzenetek)) {
	  					$h_id_u = oci_result($uzenetek, 'H_ID');

	  					$h_nev_sql = "SELECT MUNKAKAT FROM IGENYLES WHERE H_ID=".$h_id_u;
	  					$h_nev = oci_parse($conn, $h_nev_sql);
	  					oci_execute($h_nev);
	  					while (oci_fetch($h_nev)) {
	  						$h_nev_u = oci_result($h_nev, 'MUNKAKAT');
	  					}
	  				/*	echo oci_result($uzenetek, 'FROM_ID')." to ". oci_result($uzenetek, 'TO_ID');*/
	  				if($f_id == oci_result($uzenetek, 'FROM_ID')) {
?>
					<div class="panel panel-success">
					  <div class="panel-heading"> Ön válasza 
					  <br>Ezen kapcsán: <a href="ticket.php?h_id=<?php echo $h_id_u; ?>"> <?php echo $h_nev_u; ?></a></div>
					  <div class="panel-body"><?php echo oci_result($uzenetek, 'SZOVEG'); ?></div>
					</div>
<?php
	  				} else {
?>
					<div class="panel panel-default">
					  <div class="panel-heading"> <?php echo oci_result($kuldo, 'NEVE'); ?> üzenete 
					  <br>Ezen kapcsán: <a href="ticket.php?h_id=<?php echo $h_id_u; ?>"> <?php echo $h_nev_u; ?></a></div>
					  <div class="panel-body"><?php echo oci_result($uzenetek, 'SZOVEG'); ?></div>
					</div>
<?php
					} 
	  				}

	  			 ?>
					<form class="form-group">
			 		<textarea 	class="form-control" 
			 					rows="3" 
			 					name="uzenet" 
			 					ng-model = "uzenet"></textarea>
			 		<br>

			 		<input 	type="submit" 
			 				class="btn btn-success" 
			 				value="Válasz" 
			 				ng-click=
			 					"insertdata(
			 						<?php echo $h_id_u; ?>, 
			 						<?php echo $f_id; ?>,
			 						<?php echo $_GET['from_id'];?>  )
			 						"/>										        
					 </form>
	  			<?php } } else { ?>
	  				<h4>Kérlek válassz üzenetet a bal oldali listából</h4>
	  			<?php } }?>
	  			</div>
<?		
	
?>

	  		</div>
	  	</div>
	</div>

</body>
</html>