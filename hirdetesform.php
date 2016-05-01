<div id="hirdetesform">
	<form action=<?php echo $current_file; ?> method="POST" align="center" class="navbar-form" style="width:400px;">
		<td>
		<?php 
					$terulet_sql = 'SELECT DISTINCT MUNKATERULET FROM SZAKI';
					$munkanev_sql = 'SELECT DISTINCT MUNKANEV FROM SZAKI';
					$terulet = oci_parse($conn, $terulet_sql);
					$munkanev = oci_parse($conn, $munkanev_sql);
					oci_execute($terulet);
					oci_execute($munkanev);
				?>
		<?php echo(utf8_encode("Milyen munka kategóriában keres embert?")); ?><br>

					<select class="form-control" 
							name="munkakat">
							<option></option>
							<?php while (oci_fetch($munkanev)) { ?>
							<option 
									value= <?php echo oci_result($munkanev, 'MUNKANEV'); ?> 
									>
									<?php echo oci_result($munkanev, 'MUNKANEV'); ?>
							</option> 
							<?php } ?>
					</select>
					<br>
		<?php echo(utf8_encode("Hírdetésének szövege:")); ?><br>
		<input type="textarea" class="form-control" name="szoveg" style="margin: 10px; width: 300px; height: 200px;"><br>
		<button type="submit" class="btn btn-success"><?php echo(utf8_encode("Igénylés")); ?></button>
	</form>
</div>