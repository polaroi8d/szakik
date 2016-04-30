<nav class="navbar navbar-inverse" id="myNavbar" role="navigation">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
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
	} else { $a=0; 
  echo '<li id="kedvenceim" class="last"><a href="kedvenceim.php">Kedvenceim</a></li>';
	echo '<li id="panasz" class="last"><a href="panasz.php">Panasz</a></li>';
	echo '<li id="igenyles" class="last"><a href="hirdetesf.php">Igénylés</a></li>';
	}
	}else{
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
