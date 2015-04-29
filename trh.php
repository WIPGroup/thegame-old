<?php
//engine nakupování
include "connectvlastnictvi.php";
include "trade.php";
?>
<div class="col-md-2">
	<div id="vlastnictvi"></div>
		<form id="nabidka">
			<div class="form-group">
				<div class="checkbox">
					<label><input type="radio" name="smer" value="p" checked>Predám</label>
					<label><input type="radio" name="smer" value="k">Kúpim</label>
				</div>
				<div class="input-group">
					<select name="predmet" id="predmet" class="form-control">
						<?php
						$dotaz = 'SELECT * FROM veci';
						$vysledek = mysql_query($dotaz) or die(mysql_error($db));
						while ($zaznam = mysql_fetch_array($vysledek))
						{
							echo '<option value="';
							echo $zaznam['idveci'];
							echo '">';
							echo $zaznam['nazev'];
							echo '</option>';
						}
						?>
					</select>
					<?php
					//TODO: generovat select z databáze
					?>
					<input type="number" name="mnozstvi" id="mnozstvi" min="1" max="1000" class="form-control" placeholder="Množstvo">
					<input type="number" class="form-control" name="cena" id="cena" 	min="0" max="100000" placeholder="Cena">
					<button type="submit" class="btn btn-primary">Odoslať</button>
				</div>
			</div>
		</form>
	</div>
	<span id="predavanie" class="col-md-5"></span>
	<span id="kupovanie" class="col-md-5"></span>
