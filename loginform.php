<div id="loginform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form">
		<td>
		Felhasználónév<br>
		<input type="text" class="form-control" name="felhnev"><br>
		Jelszó:*<br>
		<input type="password" class="form-control" name="jelszo"><br>
		Szaki-e?  <input type='checkbox' name='tipus' class="form-control" value='szaki'/>  
		Felhasználó-e? <input type='checkbox' name='tipus' class="form-control" value='felhasz'/>
		<br>
		<button type="submit" class="btn btn-success">Belépés</button>
	</form>
</div>