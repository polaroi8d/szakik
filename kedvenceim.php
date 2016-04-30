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



</style>
<?php include 'layout.php'; ?>
</head>
<body>
<?php include 'fejlec.php'; ?>
<script type="text/javascript">
	document.getElementById("kedvenceim").className = "active";
</script>
	<div class"index">
		<div class="container">
		  <div class="row">
				<?php

                $felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
                $felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
                oci_execute($felh_id_lekerdez);
                while (oci_fetch($felh_id_lekerdez)) {
                  $f_id = oci_result($felh_id_lekerdez, 'F_ID');
                 }

					$sql = 'SELECT * FROM SZAKI LEFT OUTER JOIN KEDVENCEK ON SZAKI.SZ_ID=KEDVENCEK.SZ_ID WHERE KEDVENCEK.F_ID ='.$f_id;
					$szakik = oci_parse($conn, $sql);
					oci_execute($szakik);
				?>
				
				<?php

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
					?>

		    </div>
		  </div>
		</div>
	</div>
</body>
</html>