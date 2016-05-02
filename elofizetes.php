<?php 
session_start(); 
require 'connect.inc.php';
?>
<html>
<head>
<style type="text/css">
@import url(http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,500,600);
figure.snip1224 {
  font-family: 'Raleway', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 400px;
  max-width: 480px;
  width: 100%;
  background: #1a1a1a;
  color: #ffffff;
  text-align: center;
  border-radius: 8px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
figure.snip1224 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
  transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
}
figure.snip1224 .image {
  background-color: #000000;
  width: 50%;
  overflow: hidden;
  float: right;
}
figure.snip1224 img {
  max-width: 100%;
  vertical-align: top;
}
figure.snip1224 figcaption {
  position: absolute;
  width: 50%;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  bottom: 0;
  padding: 10px 35px;
}
figure.snip1224 h4,
figure.snip1224 p,
figure.snip1224 .price {
  margin: 0 0 8px;
}
figure.snip1224 h4 {
  position: absolute;
  width: 50%;
  top: 10px;
  right: 0;
  text-transform: uppercase;
  font-weight: 400;
  color: #ffffff;
  letter-spacing: 1px;
  z-index: 1;
}
figure.snip1224 p {
  font-size: 0.7em;
  font-weight: 500;
  line-height: 1.6em;
}
figure.snip1224 .rating {
  position: absolute;
  width: 50%;
  line-height: 44px;
  color: #ffffff;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.3);
}
figure.snip1224 .price {
  color: #ffffff;
  font-size: 1.3em;
  opacity: 0.8;
}
figure.snip1224 .price s {
  display: inline-block;
  padding: 0 8px 0 0;
  font-size: 0.85em;
  color: #f39c12;
}
figure.snip1224 .add-to-cart {
  text-decoration: none;
  position: absolute;
  bottom: 0;
  left: 0;
  font-weight: 600;
  width: 50%;
  background-color: rgba(0, 0, 0, 0.2);
  line-height: 44px;
  font-size: 0.75em;
  text-transform: uppercase;
  color: #ffffff;
}
figure.snip1224:hover img,
figure.snip1224.hover img {
  opacity: 0.6;
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
figure.snip1224:hover .add-to-cart,
figure.snip1224.hover .add-to-cart {
  background-color: rgba(0, 0, 0, 0.5);
}
/* Demo purposes only */
body {
  background-color: #212121;
}

#elof {
		background-color: rgba(255,255,255,0.7);
		border-radius: 10px;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 6%;
		padding-left: 6%;
		line-height: 150%;
}

</style>
<?php include 'layout.php'; ?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
<script src="assets/js/elof.js"></script>
</head>
<body>
<?php include 'fejlec.php'; ?>
<script type="text/javascript">
	document.getElementById("elofizetes").className = "active";
</script>
	<div class"index">
		<div class="container">
		  <div id="elof" ng-app = "elofApp" ng-controller="elofcontroller">
		  <div class="row">

		  	<div class="col col-md-12">
<?php if (isset($_SESSION['user'])){  
		//Szaki adatainak emgszerzése
			$sz_id_sql = "SELECT SZ_ID FROM SZAKI WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
			$sz_id_lekerdez = oci_parse($conn, $sz_id_sql);
			
			oci_execute($sz_id_lekerdez);

				while (oci_fetch($sz_id_lekerdez)) {
				$sz_id = oci_result($sz_id_lekerdez, 'SZ_ID'); }
			
			$elof_vizsg_sql = "SELECT COUNT(*) AS SOROK FROM FIZETES WHERE SZ_ID= ".$sz_id;
			$elof_vizsg = oci_parse($conn , $elof_vizsg_sql);
			oci_define_by_name($elof_vizsg, 'SOROK', $sorok);
			oci_execute($elof_vizsg);
			oci_fetch($elof_vizsg);
			if($sorok == 0)		{	
?>		  	<h3> Csomagjaink: </h3>
		  	<!--SNIPET START -->
			<figure class="snip1224">
				  <h4>1 hét</h4>
				  <div class="image">
				    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg" alt="sq-sample17"/></div>
				  <div class="rating"></div>
				  <figcaption>
				    <p>Szerezzen több ügyfelet! Ha most előfizet egy hónapos csomagunkra Ön minden keresésnél előrébb sorolódik</p>
				    <div class="price">
				     1 000 Ft
				    </div>
				  </figcaption>
				  <a ng-click="insertdata(<?php echo $sz_id; ?> , 1000)"  class="add-to-cart">Megrendelem</a>
				</figure>
				<figure class="snip1224">
				  <h4>1 hónap</h4>
				  <div class="image">
				    <img style="width: 240px; height: 240px;"src="assets/img/elof1.jpg" alt="sq-sample15"/></div>
				  <div class="rating"></div>
				  <figcaption>
				    <p>Ha most előfizet egy hónapos csomagunkra Ön minden keresésnél előrébb sorolódik Most hihetetlenül kedvező áron!</p>
				    <div class="price">
				      <s>5 000 Ft</s><br>2 000 Ft
				    </div>
				  </figcaption>
				  <a ng-click="insertdata(<?php echo $sz_id; ?> , 2000)" class="add-to-cart">Megrendelem</a>
			</figure>
			<!--SNIPET END-->

			</div>
<?php }  else { 
			//Mivel elo van fizetve megnezzuk mennyi penze van
		$aktualis_sql = "SELECT * FROM FIZETES WHERE SZ_ID= ".$sz_id;
		$aktualis = oci_parse($conn, $aktualis_sql);
		oci_execute($aktualis);
		while (oci_fetch($aktualis)) {
			$osszeg = oci_result($aktualis, 'OSSZEG');
			$datum = oci_result($aktualis, 'DATUM');
		} 
	?>
	<h3>Az ön csomagja:</h3>
	<?php if ($osszeg > 1000 ) {?>
			<h4>1 hónapos</h4> <br>
	<?php } else { ?>
			<h4>1 hetes</h4> <br>
	<?php } ?>
	<h3>Megrendelés dátuma:</h3> <h4><?php echo $datum; ?></h4>
<?php			} 
	 } ?>

			</div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>