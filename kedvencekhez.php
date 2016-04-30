<?php
session_start(); 
require 'connect.inc.php';

							//felhasználói adatok megszerzése


                $felh_id_sql = "SELECT F_ID FROM FELHASZNALO WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
                $felh_id_lekerdez = oci_parse($conn, $felh_id_sql);
                oci_execute($felh_id_lekerdez);
                while (oci_fetch($felh_id_lekerdez)) {
                  $f_id = oci_result($felh_id_lekerdez, 'F_ID');
                  }

            /*    $data = json_decode(file_get_contents("php://input"));
                $sz_id = $data->sz_id;*/

                               $insert = "INSERT INTO KEDVENCEK(F_ID, SZ_ID) VALUES(:f_id, :sz_id)";
                               $add = oci_parse($conn, $insert);
                               oci_bind_by_name($add, ':f_id', $f_id);
                               oci_bind_by_name($add, ':sz_id', $_GET['sz_id']);
                               oci_execute($add);
?>
                              <script type="text/javascript">
                                  window.history.back();
                              </script>
