<?php 
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
		margin-left: 40%;
		margin-right: 40%;

	}

</style>
<?php include 'layout.php'; ?>
</head>
<body>
<?php include 'fejlec.php'; ?>
	<div class"index">
		<div class="container">
		  <div class="row">
				<?php 
					$sql = 'SELECT * FROM SZAKI';
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
				<h3>Szaki Kereső</h3>
				<div class="form-group">
					<form>

					<label for="terulet">Település:</label>
					<select class="form-control" 
							name="terulet">
							<option></option>
							<?php while (oci_fetch($terulet)) {	 ?>

							<option 
									value= <?php echo oci_result($terulet, 'MUNKATERULET'); ?> 
									>
										<?php echo oci_result($terulet, 'MUNKATERULET'); ?>
							</option> 
							<?php } ?>
					</select>

					</br>
					
					<label for="munkanev">Szakterületet:</label>
					<select class="form-control" 
							name="munkanev">
							<option></option>
							<?php while (oci_fetch($munkanev)) {	 ?>

							<option 
									value= <?php echo oci_result($munkanev, 'MUNKANEV'); ?> 
									>
										<?php echo oci_result($munkanev, 'MUNKANEV'); ?>
							</option> 
							<?php } ?>
					</select>
					
					</br>
					
					<input type="submit" class="btn btn-success" value="Keresés"></input>
					</form>
				
				</div>
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
									<button class="btn btn-info">Megtekint</button>
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