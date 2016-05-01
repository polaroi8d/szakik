?php 
session_start(); 
require 'connect.inc.php';
?>
<html>
<head>
<style type="text/css">

	.panel {
		background-color: rgba(255,255,255,0.7);

	}
	.panel ul{
		
		list-style-type: none;
	    text-align: center;
	    width: auto;
	    padding-left: 0;

	    line-height: 200%;
	}
	.panel li {
		display: block;

	}

	#kereses {
		border-radius: 10px;
		background-color: rgba(255,255,255,0.7);
		text-align: center;
		line-height: 120%;
		padding: 20px;
		padding-top: 10px;
		padding-bottom: 10px;
		margin-bottom: 2%;
		margin-left: 30%;
		margin-right: 30%;

	}

</style>
<?php include 'layout.php'; ?>
</head>
<body>
<?php include 'fejlec.php'; ?>
<script type="text/javascript">
	document.getElementById("bongeszes").className = "active";
</script>
	<div class"index">
		<div class="container">
		  <div class="row">
				<?php 
					$sql ='SELECT DISTINCT SZAKI.SZ_ID, SZAKI.MUNKANEV, SZAKI.MUNKATERULET,SZAKI.NEVE FROM SZAKI, ERTEKELES WHERE ((SELECT SUM(ERTEKELES.PONT) FROM ERTEKELES WHERE ERTEKELES.SZ_ID= SZAKI.SZ_ID) / (SELECT COUNT(*) FROM ERTEKELES WHERE ERTEKELES.SZ_ID=SZAKI.SZ_ID ))=5 AND  ERTEKELES.SZ_ID= SZAKI.SZ_ID' ;
					$terulet_sql = 'SELECT DISTINCT MUNKATERULET FROM SZAKI';
					$munkanev_sql = 'SELECT DISTINCT MUNKANEV FROM SZAKI';
					$szakik = oci_parse($conn, $sql);
					$terulet = oci_parse($conn, $terulet_sql);
					$munkanev = oci_parse($conn, $munkanev_sql);
					oci_execute($terulet);
					oci_execute($szakik);
					oci_execute($munkanev);
				?>
				<div id="kereses">
				<h3>Maximális pontra értékelt Szakik!</h3>
				</div>
				<?php
					if(empty($_GET) || (empty($_GET['terulet']) and empty($_GET['munkanev']) ) ) {
						while (oci_fetch($szakik)) {
				?>
			        		<div class="col-md-3 col-xs-3">
								<div class="panel panel-default">
									<ul>
									<img src="assets/img/szakik.png" style="width: 150px; height: 150px;">
										<b><li><?php echo oci_result($szakik, 'NEVE'); ?></li></b>
										<i><li><?php echo oci_result($szakik, 'MUNKANEV'); ?></li></i>
										<li><?php echo oci_result($szakik, 'MUNKATERULET'); ?></li>
										<a 	role="button" 
											class="btn btn-info" 
											href="profile.php?sz_id=<?php echo oci_result($szakik, 'SZ_ID'); ?>"
											>
											Megtekint
										</a>
									</ul>
								</div>
							</div>
				<?php 
						}

					} elseif (!empty($_GET['terulet']) || !empty($_GET['munkanev'])) {

						$kereses_lekerdez = "SELECT * FROM SZAKI WHERE ";

												if(!empty($_GET['terulet'])) { 
													$kereses_lekerdez .= "MUNKATERULET = '{$_GET['terulet']}' ";
												}

												if(!empty($_GET['terulet']) and !empty($_GET['munkanev'])) {
													$kereses_lekerdez .= " AND ";
												}
												if (!empty($_GET['munkanev'])) {
													$kereses_lekerdez .= "MUNKANEV = '{$_GET['munkanev']}'";
												}


						$kereses = oci_parse($conn, $kereses_lekerdez);
						oci_execute($kereses);


					while (oci_fetch($kereses)) {
		
				?>
		        		<div class="col-md-3 col-xs-3">
							<div class="panel panel-default">
								<ul>
								<img src="assets/img/szakik.png" style="width: 150px; height: 150px;">
									<b><li><?php echo oci_result($kereses, 'NEVE'); ?></li></b>
									<i><li><?php echo oci_result($kereses, 'MUNKANEV'); ?></li></i>
									<li><?php echo oci_result($kereses, 'MUNKATERULET'); ?></li>
									<a 	role="button" 
										class="btn btn-info" 
										href="profile.php?sz_id=<?php echo oci_result($kereses, 'SZ_ID'); ?>"
										>
										Megtekint
									</a>
								</ul>
							</div>
						</div>
				<?php
					} 
				}

				?>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>