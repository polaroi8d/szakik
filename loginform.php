<div id="loginform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form">
		<td>
		Felhasználónév<font color=red>*</font>:<br>
		<input type="text" class="form-control" name="felhnev"><br>
		Jelszó<font color=red>*</font>:<br>
		<input type="password" class="form-control" name="jelszo"><br>
		Szaki-e?  <input type='checkbox' name='tipus' class="form-control" value='szaki' style="margin-bottom: 5px;"></input>  
		Felhasználó-e? <input type='checkbox' name='tipus' class="form-control" value='felhasz' style="margin-bottom: 5px;"></input>  
		<br>
		<button type="submit" class="btn btn-success">Belépés</button>
	</form>
</div>