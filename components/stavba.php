<?php
include "components/sestavit.php";
//TODO Napsat @j2ghz az to bude pripravene na graficke vylepseni
echo "<h1>Stavba počítačů</h1>";
echo '<form action="build.php" method="GET">';

$veci = null;
$dotaz = 'SELECT * FROM veci';// WHERE typ<>""';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	if ($vlastnictvi[$zaznam['idveci']] > 0)
	{
		if ($zaznam['typ'] == "mb")
			$mbs .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].')</option>'."\n";
		if ($zaznam['typ'] == "cpu")
			$cpus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].')</option>'."\n";
		if ($zaznam['typ'] == "gpu")
			$gpus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].')</option>'."\n";
		if ($zaznam['typ'] == "ram")
			$rams .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].')</option>'."\n";
		if ($zaznam['typ'] == "psu")
			$psus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].')</option>'."\n";
		if ($zaznam['typ'] == "hdd")
			$hdds .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].')</option>'."\n";
		
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
	}
}
echo '<select name="mb" id="mb">'.$mbs.'</select>';
echo '<select name="cpu" id="cpu">'.$cpus.'</select>';
echo '<select name="gpu" id="gpu">'.$gpus.'</select>';
echo '<select name="ram1" id="ram1">'.$rams.'</select>';
echo '<select name="ram2" id="ram2">'.$rams.'</select>';
echo '<select name="ram3" id="ram3">'.$rams.'</select>';
echo '<select name="ram4" id="ram4">'.$rams.'</select>';
echo '<select name="psu" id="psu">'.$psus.'</select>';
echo '<select name="hdd" id="hdd">'.$hdds.'</select>';
echo '<button type="submit">Sestavit</button>';
echo '</form>';

echo '<h2>Moje sestavy</h2>';
$pocveci = count($veci);
$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$obsah = explode(';', $zaznam['obsah']);
	for ($i = 0; $i < $pocveci; $i++)
		if ($obsah[$i] > 0)
		{
			echo $veci[$i];
			if ($obsah[$i] > 1)
				echo ' ('.$obsah[$i].')';
			echo ', ';
		}
	echo 'Výkon: '.$zaznam['vykon'].'<br>';
}
?>
