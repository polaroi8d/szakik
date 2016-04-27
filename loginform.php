<div id="loginform">
	<form action=<?php echo $current_file; ?> method="POST" align="center">
		<td>
	<select name="tipus" size=”2”>
      <option value="fel">Felhasználó</option>
      <option value="szak">Szaki</option><br>
			</select>
			<br>
		Felhasználónév<br>
		<input type="text" name="felhnev"><br>
		Jelszó:*<br>
		<input type="password" name="jelszo"><br>
		
		<input type="submit" value="Belépes"><br>
	</form>
</div>