<?php
$dotaz = 'SELECT * FROM hraci WHERE id='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$hrac = mysql_fetch_array($vysledek);
$vlastnictvi = explode(';', $hrac['vlastnictvi']);

//pokud se nakupuje
if ($_GET['trade'] != '')
{
	//uskutečnit obchod
	$dotaz = 'SELECT * FROM obchod WHERE id='.$_GET['trade'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		//hrac kupuje
		if ($zaznam['smer'] == 'p' && $vlastnictvi[0] >= $zaznam['penize'])
		{
			$vlastnictvi[$zaznam['predmet']] += $zaznam['mnozstvi'];
			$vlastnictvi[0] -= $zaznam['penize'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE id="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			//TODO: odstranit nabídku (po zprovoznění tvorby nabídek)
		}
		//hráč prodává
		else if ($zaznam['smer'] == 'k' && $vlastnictvi[$zaznam['predmet']] >= $zaznam['mnozstvi'])
		{
			$vlastnictvi[$zaznam['predmet']] -= $zaznam['mnozstvi'];
			$vlastnictvi[0] += $zaznam['penize'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE id="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			//TODO: odstranit nabídku (po zprovoznění tvorby nabídek)
		}
		else
			echo "Obchod se nepovedl.";
	}
	else
		echo "Obchod se nepovedl.";
}

//TODO: začlenění nabídky do databáze
if ($_GET['smer'] == 'p' || if ($_GET['smer'] == 'k')
{
	
})
{
	
}

print_r($vlastnictvi);
?>
<br>
Prodám:
<table border="1">
<tr><td>Předmět</td><td>Množství</td><td>Cena</td><td>Hráč</td><td>Akce</td></tr>
<?php
//nabídky
$dotaz = 'SELECT * FROM obchod WHERE smer="p"';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['predmet'].'</td>';
	echo '<td>'.$zaznam['mnozstvi'].'</td>';
	echo '<td>'.$zaznam['penize'].'</td>';
	echo '<td>'.$zaznam['hrac'].'</td>';
	echo '<td>';
	
	if ($zaznam['penize'] <= $vlastnictvi[0])
		echo '<a href="index.php?trade='.$zaznam['id'].'">Koupit</a>';
	echo "</td></tr>";

}
?>
</table>

Koupím:
<table border="1">
<tr><td>Předmět</td><td>Množství</td><td>Cena</td><td>Hráč</td><td>Akce</td></tr>
<?php
//poptávky
$dotaz = 'SELECT * FROM obchod WHERE smer="k"';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['predmet'].'</td>';
	echo '<td>'.$zaznam['mnozstvi'].'</td>';
	echo '<td>'.$zaznam['penize'].'</td>';
	echo '<td>'.$zaznam['hrac'].'</td>';
	echo '<td>';
	
	if ($zaznam['mnozstvi'] <= $vlastnictvi[$zaznam['predmet']])
		echo '<a href="index.php?trade='.$zaznam['id'].'">Prodat</a>';
	echo "</td></tr>";

}
?>
</table>
<br>
Vytvořit nabídku:
<form action="index.php" method="POST">
	<input type="radio" name="smer" value="p" checked>Prodám
	<input type="radio" name="smer" value="k">Koupím
	<br>
	<label for="predmet">Co </label>
	<input type="text" name="predmet" id="predmet">
	<?php
	//TODO: udělat select s názvy výrobků
	?>
	<label for="mnozstvi"> v množství </label>
	<input type="number" name="mnozstvi" id="mnozstvi" min="1" max="100" value="1">
	<br>
	<label for="penize"> za </label>
	<input type="number" name="penize" id="penize" min="0" max="10000" value="1"> peněz
	<input type="submit" value="Nabídnout">
</form>
<br>
<a href="logout.php" title="Odhlásit">Odhlásit</a>
