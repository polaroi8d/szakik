<div id="hirdetesform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form" style="width:400px;">
		<td>
		<?php echo(utf8_encode("Milyen munka kateg�ri�ban keres embert?")); ?>
		<input type="text" class="form-control" name="munkakat" style="margin: 10px;"><br>
		<?php echo(utf8_encode("H�rdet�s�nek sz�vege:")); ?><br>
		<input type="textarea" class="form-control" name="szoveg" style="margin: 10px; width: 300px; height: 50px;"><br>
		<button type="submit" class="btn btn-success"><?php echo(utf8_encode("Ig�nyl�s")); ?></button>
	</form>
</div>