<?php
$oracle_host = '//localhost/XE';
$oracle_user = 'system';
$oracle_pass = 'admin';


$conn = oci_connect($oracle_user, $oracle_pass, $oracle_host,'AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}


?>

