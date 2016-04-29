<head>
<meta charset="UTF-8">
</head>
<div id="hirdetesform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form">
		<td>
		Milyen munka kategóriában keres embert?<br>
		<input type="text" class="form-control" name="munkakat"><br>
		Hírdetésének szövege: <br>
		<input type="text" class="form-control" name="szoveg"><br>
		<br>
		<button type="submit" class="btn btn-success">Igénylés</button>
	</form>
</div>