<?php
$dotaz = 'SELECT * FROM hraci WHERE id='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$hrac = mysql_fetch_array($vysledek);
$vlastnictvi = explode(';', $hrac['vlastnictvi']);

/*if ($_GET['buy'] != '')
{
	$vlastnictvi[$_GET['buy']]++;
	$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE jmeno="'.$_SESSION['hrac'].'"';
	mysql_query($dotaz);
}
if ($_GET['sell'] != '')
{
	$vlastnictvi[$_GET['sell']]--;
	$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE jmeno="'.$_SESSION['hrac'].'"';
	mysql_query($dotaz);
}*/

if ($_GET['trade'] != '')
{
	//uskutečnit obchod
}
print_r($vlastnictvi);
?>

<!--table border="1">
<tr><td>Název</td><td>Cena</td><td>Množství</td><td>Koupit</td><td>Prodat</td></tr>
<?php
$dotaz = "SELECT * FROM polozky";
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['nazev'].'</td>';
	echo '<td>'.$zaznam['cena'].'</td><td>';
	echo $vlastnictvi[$zaznam['id']];
	echo '</td><td>';
	if ($zaznam['cena'] <= $vlastnictvi[0])
		echo '<a href="index.php?buy='.$zaznam['id'].'">Kúpiť</a>';
	echo "</td><td>";
	if ($vlastnictvi[$zaznam['id']] > 0)
		echo '<a href="index.php?sell='.$zaznam['id'].'">Predať</a>';
	echo "</td></tr>";
}
?>
</table-->

<table border="1">
<tr><td>Předmět</td><td>Množství</td><td>Cena</td><td>Hráč</td><td>Akce</td></tr>
<?php
//nabídky a poptávky
$dotaz = "SELECT * FROM obchod";
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['predmet'].'<stvi/td>';
	echo '<td>'.$zaznam['mnozstvi'].'</td>';
	echo '<td>'.$zaznam['penize'].'</td>';
	echo '<td>'.$zaznam['hrac'].'</td>';
	echo '<td>';
	if ($zaznam['smer'] == 'p')
		if ($zaznam['penize'] <= $vlastnictvi[0])
			echo '<a href="index.php?trade='.$zaznam['id'].'">Koupit</a>';
	else if ($zaznam['smer'] == 'k')
		if ($zaznam['mnozstvi'] <= $vlastnictvi[$zaznam['predmet']])
			echo '<a href="index.php?trade='.$zaznam['id'].'">Koupit</a>';
	echo "</td></tr>";

}
?>
</table>
<a href="logout.php" title="Odhlásit">Odhlásit</a>
