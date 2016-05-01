<?php 
session_start(); 
require 'connect.inc.php';
?>
<html>
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
<script type="text/javascript">
	function back() {
		window.history.back();
	}
</script>
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
								<button class="btn btn-success" onclick="back()">Vissza</button>
						</div>
					</div>
								<?php }  ?>



						 
						</div>
						
						<?php  } 
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