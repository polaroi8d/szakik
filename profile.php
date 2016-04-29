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
					if (empty($_GET['sz_id']) and empty($_GET['f_id'])) {
				 ?>
				 	<div class="alert alert-danger">
						<strong>Hiba:</strong>				 		
							Nem jeleníthető meg a felhasználó!
				 	</div>
				<?php 

					//szaki id bekáráse url-ből
				 	} elseif(!empty($_GET['sz_id'])) {

				 		//egy kis felhasználói adat
				 		if (isset($_SESSION['user'])){
				 			$felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
							$felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
							oci_execute($felh_id_lekerdez);
							while (oci_fetch($felh_id_lekerdez)) {
								$fi_id = oci_result($felh_id_lekerdez, 'F_ID');
							}
						}

						$szaki_sql = "SELECT * FROM SZAKI WHERE SZ_ID = '{$_GET['sz_id']}'";
						$szaki = oci_parse($conn, $szaki_sql);
						oci_execute($szaki);


						while (oci_fetch($szaki)) {
				?>
					<div class="col-md-6">
						<div id="adatok">
							<h2><?php echo oci_result($szaki, 'NEVE'); ?></h2>
							<p>
								<ul>
								<li><b>Szakterület:</b> <?php echo oci_result($szaki, 'MUNKANEV'); ?></li>
								<li><b>Település:</b> <?php echo oci_result($szaki, 'MUNKATERULET'); ?></li>
								</ul>
								<?php
									$szaki_id = oci_result($szaki, 'SZ_ID');
								
								if (isset($_SESSION['user'])){
									$kedvenc_sql = "SELECT * FROM KEDVENCEK WHERE SZ_ID= {$_GET['sz_id']} AND F_ID=$fi_id";
									$kedvenc = oci_parse($conn, $kedvenc_sql);
									oci_execute($kedvenc);
									$count = oci_fetch_all($kedvenc, $res);

									if ($count < 1 ) {									
								?>
								<button class="btn btn-info"
										onclick="location.href='kedvencekhez.php?sz_id=<?php echo $_GET['sz_id'];?>'">
									Kedvencekhez
								</button>
								<?php } else { ?>
								<button class="btn btn-warning"
										onclick="location.href='kedvenctorles.php?sz_id=<?php echo $_GET['sz_id'];?>'"
									>Eltávolítás a kedvencekből</button>

								<?php }} ?>								
							</p>
						</div>
					</div>
					
					<div class="col-md-6">
						<img src="assets/img/szakik.png" style="width: 250px; height: 250px; float: right; ">
					</div>

					<div class="col-md-12">
					<?php } ?>
						<h3>Értékelések:</h3>
						<div id="app">

						</div>
<?php 
							oci_free_statement($szaki);
							$ert = "SELECT * FROM ERTEKELES WHERE SZ_ID = ".$_GET['sz_id'];
							$ertekeles = oci_parse($conn, $ert);
							oci_execute($ertekeles);




							while (oci_fetch($ertekeles)) {
								?> 

								<div class="panel-group">
								  <div class="panel panel-default">
								    <div class="panel-heading">
								    <?php
								    $ertekelt_f_id = oci_result($ertekeles, 'F_ID');
								    $ertekelo_nev_sql = "SELECT * FROM FELHASZNALO WHERE F_ID = $ertekelt_f_id";
									$ertekelo_nev = oci_parse($conn, $ertekelo_nev_sql);
									oci_execute($ertekelo_nev);
									while (oci_fetch($ertekelo_nev)) {
								    ?>
								    <b><?php echo oci_result($ertekelo_nev, 'NEV'); } ?></b> szerint
								    <b><?php echo oci_result($ertekeles, 'PONT'); ?> </b> pontos
								    </div>
								    <div class="panel-body"><?php echo oci_result($ertekeles, 'SZOVEG'); ?></div>
								  </div>
								</div>

								
							<?php

							}

							$err = oci_error($ertekeles);

							print_r($err);		
								

						if(isset($_SESSION['user'])){



						 ?>
						 <form 	action="ertekeles.php?sz_id=<?php echo $szaki_id;?>"
						 		method="POST"
						 		class="form-group"
						 		>
							 		<label for="pont">Pont:</label>

										<input 	type="radio" 
												name="pont" 
												value="1">
												1

										<input 	type="radio" 
												name="pont" 
												value="2">
												2

										<input 	type="radio" 
												name="pont" 
												value="3">
												3
	
										<input 	type="radio" 
												name="pont" 
												value="4">
												4

										<input 	type="radio" 
												name="pont" 
												value="5">
												5
									<br>
							 		<label for="szoveg">Értékelés szövege:</label>
							 		<textarea class="form-control" rows="5" name="szoveg"></textarea>
							 		<br>
							 		<input type="submit" class="btn btn-success" value="Küldés"></input>
						 </form>						
						<?php }
						 	?>
					</div>

				<?php
						
					//felhasználó id bekérése url-ből, 	
				 	} elseif(!empty($_GET['f_id'])){
				 		//TODO: felhasználó profil megjelenítés
				 ?>
				 		<div class="alert alert-warning">
							<strong>Figyelem:</strong>				 		
								Fejlesztés alatt!
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