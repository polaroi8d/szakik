<div id="fejlec">
	<div class="udvozlo">
	Üdvözöljük
	<?php
	if (isset($_SESSION['user'])){
		echo $_SESSION['user'] . '!<br>';
		echo '<a href="logout.php">Kilépés</a><br>';
	}else{
		echo 'Vendég!<br>';
		echo '<a href="register.php">Regisztráció</a><br>';
		echo '<a href="login.php">Bejelentkezés</a><br>';
	}

	?>
	</div>
	<div class="menusor">
		<ul>
		<li><a href="index.php">Kezdőlap</a></li>

		</ul>
	</div>
</div>

