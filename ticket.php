<?php 
session_start(); 
require 'connect.inc.php';
?>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="assets/js/uzenet.js"></script>
<head>
<style type="text/css">

	#profil {
		margin-left: 20%;
		margin-right: 20%;
		background-color: rgba(255,255,255,0.7);
		border-radius: 10px;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 30px;
		padding-left: 30px;
		line-height: 150%;
	}

	#profil ul {
		list-style-type: none;
	    width: auto;
	    padding-left: 0;
	}

	#profil li {
		display: block;
	}

	#adatok {
	}

	a {
		text-decoration: none;
	}
	a:hover {
		font-weight: bold;
	}

</style>
<?php include 'layout.php'; ?>
</head>
<body>
<?php include 'fejlec.php'; ?>
	<div class"index">
		<div class="container">
		<div id="profil">
		  <div class="row">

				<?php 
					//Ha nincs get
					if (empty($_GET['h_id'])) {
				 ?>
				 	<div class="alert alert-danger">
						<strong>Hiba:</strong>				 		
							Nem létező ticket!
				 	</div>
				<?php 

					//szaki id bekérése url-ből
				 	} elseif(!empty($_GET['h_id'])) {

				 		//egy kis felhasználói adat
				 		if (isset($_SESSION['user'])){
				 			$felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
							$felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
							oci_execute($felh_id_lekerdez);
							while (oci_fetch($felh_id_lekerdez)) {
								$fi_id = oci_result($felh_id_lekerdez, 'F_ID');
							}
						}

						$igeny_sql = "SELECT * FROM IGENYLES WHERE H_ID = '{$_GET['h_id']}'";
						$igeny = oci_parse($conn, $igeny_sql);
						oci_execute($igeny);

						$hirdeto_adatok_sql = "SELECT NEV FROM FELHASZNALO LEFT JOIN IGENYLES ON FELHASZNALO.F_ID = IGENYLES.F_ID WHERE IGENYLES.H_ID = '{$_GET['h_id']}'";
						$hirdeto_adatok = oci_parse($conn, $hirdeto_adatok_sql);
						oci_execute($hirdeto_adatok);

					/*	$ert_atlag_sql = "SELECT AVG(PONT) AS ATLAG FROM ERTEKELES WHERE SZ_ID='{$_GET['sz_id']}'";
						$ert_atlag = oci_parse($conn, $ert_atlag_sql);
						oci_define_by_name($ert_atlag, 'ATLAG', $atlag);
						oci_execute($ert_atlag);
						oci_fetch($ert_atlag);*/
						while (oci_fetch($igeny)) {
						while (oci_fetch($hirdeto_adatok)) {
				?>
					<div class="col-md-12">
						<div id="adatok">
							<h2><?php echo oci_result($igeny, 'MUNKAKAT'); ?> kerestetik</h2>
							<p>
							<h3>Leírás:</h3>
								<ul>
								<li><i> <h4><?php echo oci_result($igeny, 'SZOVEG'); ?> </h4></i></li>
								<li><b>Hirdető:</b> <?php echo oci_result($hirdeto_adatok, 'NEV'); ?></li>
								</ul>
						</div>
					</div>
	
								<?php

			if (isset($_SESSION['user'])){
						?>
					

					<?php } }  ?>

					<div class="col-md-12">
						<h3>Üzenetek:</h3>

		<div ng-app="uzenetApp" ng-controller="uzenetcontroller">
<?php 						//Értékeléshez összegűjtöm az adatokat
							$uzenet_sql = "SELECT * FROM UZENET WHERE H_ID = ".$_GET['h_id'];
							$uzenet = oci_parse($conn, $uzenet_sql);
							oci_execute($uzenet);


							while (oci_fetch($uzenet)) {

								$lekerdez_sql = "SELECT * FROM FELHASZNALO WHERE F_ID= ".oci_result($uzenet, 'F_ID');
								$lekerdez = oci_parse($conn, $lekerdez_sql);
								oci_execute($lekerdez);

								if(oci_fetch($lekerdez)){
									?> 

									<div class="panel-group">
									  <div class="panel panel-success">
									    <div class="panel-heading">
									    <?php
									    $ertekelt_f_id = oci_result($uzenet, 'F_ID');
									    $ertekelo_nev_sql = "SELECT * FROM FELHASZNALO WHERE F_ID = $ertekelt_f_id";
										$ertekelo_nev = oci_parse($conn, $ertekelo_nev_sql);
										oci_execute($ertekelo_nev);
										while (oci_fetch($ertekelo_nev)) {
									    ?>
									    <b><?php echo oci_result($ertekelo_nev, 'NEV'); } ?></b> szerint
									    <b style="text-align: right;"><?php echo oci_result($uzenet, 'DATUM'); ?> </b>
									    </div>
									    <div class="panel-body"><?php echo oci_result($uzenet, 'SZOVEG'); ?></div>
									  </div>
									</div>


<?php 						} else {  //Ha szaki
							?>
									<div class="panel-group">
									  <div class="panel panel-default">
									    <div class="panel-heading">
									    <?php
									    $uzenet_f_id = oci_result($uzenet, 'F_ID');
									    $uzenet_nev_sql = "SELECT * FROM SZAKI WHERE SZ_ID = $uzenet_f_id";
										$uzenet_nev = oci_parse($conn, $uzenet_nev_sql);
										oci_execute($uzenet_nev);
										while (oci_fetch($uzenet_nev)) {
									    ?>
									    <b><?php echo oci_result($uzenet_nev, 'NEVE'); } ?></b> szerint
									    <b style="text-align: right;"><?php echo oci_result($uzenet, 'DATUM'); ?> </b>
									    </div>
									    <div class="panel-body"><?php echo oci_result($uzenet, 'SZOVEG'); ?></div>
									  </div>
									</div>
<?php
								
							}
							 }
							//EDDIG TART AZ ÉRTÉKELÉS
		
						if(isset($_SESSION['user'])){
						 	$sz_id_post_sql = "SELECT SZ_ID FROM SZAKI WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
						 	$sz_id_post = oci_parse($conn, $sz_id_post_sql);
						 	echo $sz_id_post_sql;
						 	oci_execute($sz_id_post);							


						 	if(oci_fetch($sz_id_post)){
						 ?>
						 <h4>Válasz:</h4>
							<form class="form-group">
							 		<textarea class="form-control" rows="3" name="uzenet" ng-model = "uzenet"></textarea>
							 		<br>
							 		<input 	type="submit" 
							 				class="btn btn-success" 
							 				value="Küldés" 
							 				ng-click="insertdata(<?php echo $_GET['h_id']; ?>, <?php echo oci_result($sz_id_post, 'SZ_ID');?> , <?php echo oci_result($igeny, 'F_ID') ?>)"/>
						 </form>
						 <?php } else {
						 	$f_id_post_sql = "SELECT SZ_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
						 	$f_id_post = oci_parse($conn, $sz_id_post_sql);
						 	echo $f_id_post_sql;
						 	oci_execute($f_id_post);
						 	while (oci_fetch($f_id_post)) {
						 		$f_id_ka = oci_result($f_id_post, 'F_ID');	
						 	}

						 	if ($f_id_ka == oci_result($igeny, 'F_ID')) {
						 		# code...
						 	}

						 	} ?>
						</div>

						 
						</div>
						
						<?php  } }
						 	?>
						 	</div>
				<?php
					//felhasználó id bekérése url-ből, 	
				 	} elseif(!empty($_GET['sz_id'])){
				 		//TODO: felhasználó profil megjelenítés
				 ?>
				 		<div class="alert alert-warning">
							<strong>Figyelem:</strong>
							Nem létező ticket				 		
				 		</div>	
				 <?php	
				 	}
				 ?>
				 </div>
		    </div>
		  </div>
		</div>
</body>


</html>