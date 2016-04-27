<?php
$DB_HOST = "localhost";
$DB_PORT = 1521;
$DB_SID = "XE";
$DB_USER = "system";
$DB_PASSWORD = "admin";
$db = "
(DESCRIPTION=
(ADDRESS_LIST = 
(ADDRESS = 
(PROTOCOL = TCP)
(HOST = " . $DB_HOST . ")
(PORT = " . $DB_PORT . ")
)
)
(CONNECT_DATA=
(SID=" . $DB_SID . ")
)
)";
$con = oci_connect($DB_USER, $DB_PASSWORD, $db);
?>