<nav class="navbar navbar-inverse" id="myNavbar" role="navigation">
  <div class="container-fluid">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li id="index" class="last"><a href="index.php">Kezdőoldal</a></li>
        <li id="bongeszes" class="last"><a href="browse.php">Böngészés</a></li>
        <li id="legek" class="last"><a href="top.php">Legek</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	<?php
	if (isset($_SESSION['user'])){
		//echo $_SESSION['user'] . '!';
		echo  '<li><a href="logout.php"><span class="glyphicon glyphicon-remove"></span> Kilépés</a></li>';
		$user = $_SESSION['user'];
		$query = "SELECT COUNT(*) AS NUMBER_OF_ROWS FROM FELHASZNALO WHERE FELHASZNALONEV = '" . $user . "'"  ;
		$stid = oci_parse($conn, $query);
		oci_define_by_name($stid, 'NUMBER_OF_ROWS', $number_of_rows);
		oci_execute($stid);
		oci_fetch($stid);
		if ($number_of_rows == 0)
	{
		$a=1;

        $fejl_id_sql = "SELECT SZ_ID FROM SZAKI WHERE FELHASZNALONEV = '{$_SESSION['user']}'";
        $fejl_id_lekerdez = oci_parse($conn, $fejl_id_sql);
        oci_execute($fejl_id_lekerdez);
        while (oci_fetch($fejl_id_lekerdez)) {
          $fejl_id = oci_result($fejl_id_lekerdez, 'SZ_ID');
         }
          $munka_sql = 'SELECT COUNT(*) AS MUNKASZAM FROM IGENYLES WHERE MUNKAKAT= (SELECT MUNKANEV FROM SZAKI WHERE SZ_ID='.$fejl_id.")";
          $munka_szam = oci_parse($conn, $munka_sql);
          oci_define_by_name($munka_szam, 'MUNKASZAM', $munkaszam);
          oci_execute($munka_szam);
          oci_fetch($munka_szam);
      echo '<li id="munkak" class="last"><a href="munkat.php">Munkák <span class="badge">'.$munkaszam.'</span></a></li>';
      echo '<li id="elofizetes" class="last"><a href="elofizetes.php">Előfizetés</a></li>';
      echo '<li id="uzenet" class="last"><a href="uzenetek.php">Üzenetek</a></li>';

        oci_free_statement($munka_szam);

	} else { $a=0; 


  echo '<li id="kedvenceim" class="last"><a href="kedvenceim.php">Kedvenceim</a></li>';
  echo '<li id="uzenet" class="last"><a href="uzenetek.php">Üzenetek</a></li>'; 
	echo '<li id="panasz" class="last"><a href="panasz.php">Panasz</a></li>';
	echo '<li id="igenyles" class="last"><a href="hirdetesf.php">Igénylés</a></li>';
  echo '<li id="igenylesek" class="last"><a href="igenylesek.php">Hirdetéseim</a></li>';

	}
	} else {
		echo  '<li class="dropdown">';
        echo  '<a href="#" data-toggle="dropdown" class="dropdown-toggle">';
        echo  '<span class="glyphicon glyphicon-user"></span> Regisztráció <b class="caret"></b></a>';
        echo  '<ul class="dropdown-menu">';
        echo  '<li><a href="SZregister.php">Szaki</a></li>';
        echo  '<li><a href="register.php">Felhasználó</a></li>';
        echo  '</ul>';
       	echo  '</li>';
       	echo  '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Belépés</a></li>';
       }
     ?>
      </ul>
    </div>
  </div>
</nav>