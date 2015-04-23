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
			//TODO:odstranit nabídku
		}
		//hráč prodává
		else if ($zaznam['smer'] == 'k' && $vlastnictvi[$zaznam['predmet']] >= $zaznam['mnozstvi'])
		{
			$vlastnictvi[$zaznam['predmet']] -= $zaznam['mnozstvi'];
			$vlastnictvi[0] += $zaznam['penize'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE id="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			//TODO:odstranit nabídku
		}
		else
			echo "Obchod se nepovedl.";
	}
	else
		echo "Obchod se nepovedl.";
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
<a href="logout.php" title="Odhlásit">Odhlásit</a>
