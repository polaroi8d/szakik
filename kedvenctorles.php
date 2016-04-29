<?php
session_start(); 
require 'connect.inc.php';
	
?>

						<?php 
							//felhasználói adatok megszerzése

							if (isset($_SESSION['user'])){
                                   $username=$_SESSION['user'];
                                   $query = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '" . $username . "'";
                                   $compiled2 = oci_parse($conn, $query);
                                   oci_execute($compiled2);
                                   while (oci_fetch($compiled2)) {
                                   $f_id = oci_result($compiled2, 'F_ID');}                
               
                               $insert = "DELETE FROM KEDVENCEK WHERE F_ID=:f_id AND SZ_ID=:sz_id";
                               $add = oci_parse($conn, $insert);
                               oci_bind_by_name($add, ':f_id', $f_id);
                               oci_bind_by_name($add, ':sz_id', $_GET['sz_id']);
                               if (oci_execute($add)){
                              ?>
                              	<script type="text/javascript">
                              		window.history.back();
                              	</script>
                               <?php
                               } else {
                               	?>
                               		<script type="text/javascript">
                               		window.history.back();
                               		</script>
                        <?php       
                               }
                               }
						?>
						<script type="text/javascript">
						</script>