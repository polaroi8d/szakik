<?php
session_start(); 
require 'connect.inc.php';
	
?>

						<?php 
							//felhasználói adatok megszerzése
								$felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
								$felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
								oci_execute($felh_id_lekerdez);
								while (oci_fetch($felh_id_lekerdez)) {
									$fi_id = oci_result($felh_id_lekerdez, 'F_ID');
								}
							if(isset($_POST['szoveg']) and isset($_POST['pont'])) {
									$sz_id = $_GET['sz_id'];
									$pont = $_POST['pont'];
									$szoveg = $_POST['szoveg'];

								if(!empty($_POST['szoveg']) && !empty($_POST['pont'])){
									$beilleszt_sql = "INSERT INTO ERTEKELES(SZ_ID, F_ID, DATUM, PONT, SZOVEG ) VALUES(:sz_id, :f_id, sysdate, :pont, :szoveg)";
									$beilleszt = oci_parse($conn, $beilleszt_sql);
									oci_bind_by_name($beilleszt, ':sz_id', $sz_id);
									oci_bind_by_name($beilleszt, ':f_id', $fi_id);
									oci_bind_by_name($beilleszt, ':pont', $pont);
									oci_bind_by_name($beilleszt, ':szoveg', $szoveg);
									oci_execute($beilleszt);


								} else {
									echo "SIKERTELEN LEKÉRDEZÉS";

							} 

						}
						?>
						<script type="text/javascript">
							window.history.back();
						</script>