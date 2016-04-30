<div id="hirdetesform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form">
		<td>
		<?php echo(utf8_encode("Milyen munka kategóriában keres embert?")); ?>
		<br>
		<input type="text" class="form-control" name="munkakat"><br>
		<?php echo(utf8_encode("Hírdetésének szövege:")); ?><br>
		<input type="text" class="form-control" name="szoveg"><br>
		<br>
		<button type="submit" class="btn btn-success"><?php echo(utf8_encode("Igénylés")); ?></button>
	</form>
</div>