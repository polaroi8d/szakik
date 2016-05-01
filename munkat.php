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
	document.getElementById("munkak").className = "active";
</script>
	<div class="index">
		<div class="container">
		<div ng-app="uzenetApp" ng-controller="uzenetcontroller">
		  <div class="row">
				<?php

                $felh_id_sql = "SELECT SZ_ID FROM SZAKI WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
                $felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
                oci_execute($felh_id_lekerdez);
                while (oci_fetch($felh_id_lekerdez)) {
                  $f_id = oci_result($felh_id_lekerdez, 'SZ_ID');
                 }
					$sql = 'SELECT * FROM IGENYLES WHERE MUNKAKAT= (SELECT MUNKANEV FROM SZAKI WHERE SZ_ID='.$f_id.")";
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
										<br>
										<!-- Trigger the modal with a button -->
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Üzenet küldése</button>

										<!-- Modal -->
										<div id="myModal" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <!-- Modal content-->
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Üzenet küldése</h4>
										      </div>
										      <div class="modal-body">
													<form class="form-group">
													 		<textarea 	class="form-control" 
													 					rows="3" 
													 					name="uzenet" 
													 					ng-model = "uzenet"></textarea>
													 		<br>

										      <div class="modal-footer">
										 		<input 	type="submit" 
										 				class="btn btn-success" 
										 				value="Küldés" 
										 				ng-click=
										 					"insertdata(
										 						<?php echo oci_result($igenylesek, 'H_ID'); ?>, 
										 						<?php echo $f_id; ?>,
										 						<?php echo oci_result($igenylesek, 'F_ID');?>  )
										 						"/>										        
										        <button type="button" class="btn btn-warning" data-dismiss="modal">Mégse</button>

										      </div>	
												 </form>
										      </div>

										    </div>

										  </div>
										</div>
										<!--END MODAL-->
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
	</div>
</body>
</html>