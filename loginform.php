<div id="loginform">
	<form action=<?php echo $current_file; ?> method="POST" align="center">
		<td>
		Felhasználónév<br>
		<input type="text" name="felhnev"><br>
		Jelszó:*<br>
		<input type="password" name="jelszo"><br>
		Szaki-e?<input type='checkbox' name='tipus' value='szaki'/>
		<br>
		Felhasználó-e?<input type='checkbox' name='tipus' value='felhasz'/>
		<br>
		<input type="submit" value="Belépes"><br>
	</form>
</div>