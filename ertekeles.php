<?php
session_start(); 
require 'connect.inc.php';
	

							//felhasználói adatok megszerzése
								$felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
								$felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
								oci_execute($felh_id_lekerdez);
								while (oci_fetch($felh_id_lekerdez)) {
									$fi_id = oci_result($felh_id_lekerdez, 'F_ID');
									}

									$data = json_decode(file_get_contents("php://input"));

									$sz_id = $data->f_id;
									$pont = $data->pont;
									$szoveg = $data->szoveg;

									$beilleszt_sql = "INSERT INTO ERTEKELES(SZ_ID, F_ID, DATUM, PONT, SZOVEG ) VALUES(:sz_id, :f_id, sysdate, :pont, :szoveg)";
									$beilleszt = oci_parse($conn, $beilleszt_sql);
									oci_bind_by_name($beilleszt, ':sz_id', $sz_id);
									oci_bind_by_name($beilleszt, ':f_id', $fi_id);
									oci_bind_by_name($beilleszt, ':pont', $pont);
									oci_bind_by_name($beilleszt, ':szoveg', $szoveg);
									oci_execute($beilleszt);

?>