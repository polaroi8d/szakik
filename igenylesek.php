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
	    text-align: left;
	    width: auto;
	    padding-left: 8%;
	    padding-bottom: 5%;
	    padding-right: 5%;

	    line-height: 200%;
	}
	.panel li {
		display: block;

	}



</style>
<?php include 'layout.php'; ?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="assets/js/uzenet.js"></script>
</head>
<body>
<?php include 'fejlec.php'; ?>
<script type="text/javascript">
	document.getElementById("kedvenceim").className = "active";
</script>
	<div class="index">

		<div class="container">
		  <div class="row">
				<?php

                $felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
                $felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
                oci_execute($felh_id_lekerdez);
                while (oci_fetch($felh_id_lekerdez)) {
                  $f_id = oci_result($felh_id_lekerdez, 'F_ID');
                 }
					$sql = 'SELECT * FROM IGENYLES WHERE F_ID= '.$f_id;
					$igenylesek = oci_parse($conn, $sql);
					oci_execute($igenylesek);
				?>
				
				<?php

						while (oci_fetch($igenylesek)) {
		
				?>
			        		<div class="col-md-4 col-xs-4">
								<div class="panel panel-default">
									<ul>
										<h3><li><?php echo oci_result($igenylesek, 'MUNKAKAT'); ?></li></h3>
										<i><li><?php echo oci_result($igenylesek, 'SZOVEG'); ?></li></i>
										<li><?php echo oci_result($igenylesek, 'DATUM'); ?></li>
										<a 	role="button" 
											class="btn btn-info" 
											href="ticket.php?h_id=<?php echo oci_result($igenylesek, 'H_ID'); ?>"
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