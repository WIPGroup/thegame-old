<?php
$dotaz = 'SELECT * FROM hraci WHERE idhrace='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$hrac = mysql_fetch_array($vysledek);
$vlastnictvi = explode(';', $hrac['vlastnictvi']);

//engine nakupování
include "trade.php";

print_r($vlastnictvi);
?>
<br>
Prodám:
<table border="1">
<tr><td>Hráč</td><td>nabízí</td><td>v množství</td><td>za tolik peňez</td><td>Akce</td></tr>
<?php
//nabídky
$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="p" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['jmeno'].'</td>';
	echo '<td>'.$zaznam['nazev'].'</td>';
	echo '<td>'.$zaznam['mnozstvi'].'</td>';
	echo '<td>'.$zaznam['cena'].'</td>';
	echo '<td>';
	
	if ($zaznam['cena'] <= $vlastnictvi[0])
		echo '<a href="index.php?trade='.$zaznam['idnab'].'">Koupit</a>';
	echo "</td></tr>";

}
?>
</table>

Koupím:
<table border="1">
<tr><td>Hráč</td><td>shání</td><td>v množství</td><td>za tolik peňez</td><td>Akce</td></tr>
<?php
//poptávky
$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="k" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['jmeno'].'</td>';
	echo '<td>'.$zaznam['nazev'].'</td>';
	echo '<td>'.$zaznam['mnozstvi'].'</td>';
	echo '<td>'.$zaznam['cena'].'</td>';
	echo '<td>';
	
	if ($zaznam['mnozstvi'] <= $vlastnictvi[$zaznam['predmet']])
		echo '<a href="index.php?trade='.$zaznam['idnab'].'">Prodat</a>';
	echo "</td></tr>";

}
?>
</table>
<br>
Vytvořit nabídku:
<form action="index.php" method="GET">
	<input type="radio" name="smer" value="p" checked>Prodám
	<input type="radio" name="smer" value="k">Koupím
	<br>
	<label for="predmet">Co </label>
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
	<label for="mnozstvi"> v množství </label>
	<input type="number" name="mnozstvi" id="mnozstvi" min="1" max="1000" value="1">
	<br>
	<label for="cena"> za </label>
	<input type="number" name="cena" id="cena" min="0" max="100000" value="1"> peněz
	<input type="submit" value="Nabídnout">
</form>
<br>
<a href="logout.php" title="Odhlásit">Odhlásit</a>
