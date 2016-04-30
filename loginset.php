<?php
	session_start();
	unset($_SESSION['user']);	
	header('Location: index.php'); 

?>
<script type="text/javascript">
	document.getElementById("legek").className = "active";
</script>