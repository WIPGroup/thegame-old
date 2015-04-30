<?php
//engine nakupování
include "vlastnictvi.php";
include "trade.php";
	$selectitems = '<option value="0">Peníze</option>'."\n";
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$selectitems .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].'</option>'."\n";
	}
?>
<div class="col-md-2">
	<form id="nabidka">
		<div class="form-group">
			<div class="input-group">
				<label>Nabízím:
					<select name="nabizi" id="nabizi" class="form-control">
						<?php
							echo $selectitems;
							?>
					</select>
				</label>
				<input type="number" name="mnoznabizi" id="mnoznabizi" min="1" max="1000" value="1" class="form-control" placeholder="Množstvo">
				<label>Chci:
					<select name="chce" id="chce" class="form-control">
						<?php
						echo $selectitems;
						?>
					</select>
				</label>
				<input type="number" name="mnozchce" id="mnozchce" min="1" max="1000" value="1" class="form-control" placeholder="Množstvo">
				<button type="submit" class="btn btn-primary">Odoslať</button>
			</div>
		</div>
	</form>
	<div id="vlastnictvi">
	</div>
</div>
<span id="nabidky" class="col-md-10"></span>
