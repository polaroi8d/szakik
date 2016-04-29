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
								<button class="btn btn-info">
									Kedvencekhez
								</button>								
							</p>
						</div>
					</div>
					
					<div class="col-md-6">
						<img src="assets/img/szakik.png" style="width: 250px; height: 250px; float: right; ">
					</div>

					<div class="col-md-12">
					
						<h3>Értékelések:</h3>

					</div>

				<?php
						}

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