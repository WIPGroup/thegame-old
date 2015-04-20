<?php
$dotaz = "SELECT * FROM hraci";
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$hrac = mysql_fetch_array($vysledek);
$vlastnictvi = explode(';', $hrac['vlastnictvi']);

if ($_GET['buy'] != '')
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
}

echo $vlastnictvi[0];
?>

<table border="1">
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
		echo '<a href="index.php?buy='.$zaznam['id'].'">Koupit</a>';
	echo "</td><td>";
	if ($vlastnictvi[$zaznam['id']] > 0)
		echo '<a href="index.php?sell='.$zaznam['id'].'">Prodat</a>';
	echo "</td></tr>";
}
?>
</table>
