<?php
//engine nakupování
include "trhvariables.php";
include "trade.php";
?>
<br>
<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<script src="scripts.js"></script>
<div id="vlastnictvi">
</div>
Predám:
<span id="predaj">
</span>
Kúpim:
<span id="kupit">
</span>
<br>
Vytvoriť požiadavku:
<form action="index.php" method="GET">
	<input type="radio" name="smer" value="p" checked>Predám
	<input type="radio" name="smer" value="k">Kúpim
	<br>
	<label for="predmet">čo </label>
	<select name="predmet" id="predmet">
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
	<label for="mnozstvi"> v množstve </label>
	<input type="number" name="mnozstvi" id="mnozstvi" min="1" max="1000" value="1">
	<br>
	<label for="cena"> za </label>
	<input type="number" name="cena" id="cena" min="0" max="100000" value="1"> peňazí
	<input type="submit" value="Odoslať">
</form>
<br>
<a href="logout.php" title="Odhlásiť">Odhlásiť</a>
