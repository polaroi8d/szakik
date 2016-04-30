in<?php 
session_start(); 
require 'connect.inc.php';
?>
<html>
<head>
<?php include 'layout.php'; ?>
</head>
<body>

<?php include 'fejlec.php'; ?>
<script type="text/javascript">
	document.getElementById("index").className = "active";
</script>
	<div class"index">
		<div class="container">
		  <div class="row">
		    <div class="col-sm-3">
		    	<div id="leftbar"><center><img src="assets/img/szakik.png" style="width: 200px; height: 200px;"></center>
		    	</div>
		    	<div id="leftbar" style="padding:5px;">
		    		<p>A <strong>szakma</strong> fogalma bizonyos tevékenységi kör betöltéséhez szükséges ismeretek, készségek, képességek, tapasztalatok 
		    			együttesét jelenti. A munka világában egy meghatározott feladatcsoport elvégzéséhez szükséges szaktudás. Szakmája 
		    			lehet valakinek rendszeres gyakorlás nélkül is (pl. frissen végzett szakember, más foglalkozást űző stb.), ennélfogva 
		    			a szakma több, mint a foglalkozás.</p></div>
		    	</div>
		    <div class="col-sm-8" id="main">
		    	<h3><center> Üdvözlünk a Szaki kereső oldalon!</h3><br>
		    	<iframe width="560" height="315" src="https://www.youtube.com/embed/rR3FMO_Qjqk" frameborder="0" allowfullscreen></iframe>
		    	</center>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>