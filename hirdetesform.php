<div id="hirdetesform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form">
		<td>
		<?php echo(utf8_encode("Milyen munka kateg�ri�ban keres embert?")); ?>
		<br>
		<input type="text" class="form-control" name="munkakat"><br>
		<?php echo(utf8_encode("H�rdet�s�nek sz�vege:")); ?><br>
		<input type="text" class="form-control" name="szoveg"><br>
		<br>
		<button type="submit" class="btn btn-success"><?php echo(utf8_encode("Ig�nyl�s")); ?></button>
	</form>
</div>