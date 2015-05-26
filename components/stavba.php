<?php
include "components/sestavit.php";
echo "<h1>stavba počítačů</h1>";
echo '<form class="form-inline" action="build.php" method="GET" id="build">';

$mbs = ""; $cpus = ""; $gpus = ""; $rams = ""; $psus = ""; $hdds = ""; 
$veci = null;
$dotaz = 'SELECT * FROM veci';// WHERE typ<>""';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];
	
	if ($vlastnictvi[$zaznam['idveci']] > 0)
	{
		if ($zaznam['typ'] == "mb")
			$mbs .= '<option value="'.$zaznam['idveci'].'" data-ram="'.explode(';', $zaznam['sloty'])[0].'" data-pci="'.explode(';', $zaznam['sloty'])[1].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == "cpu")
			$cpus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == "gpu")
			$gpus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == "ram")
			$rams .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == "psu")
			$psus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == "hdd")
			$hdds .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
	}
}
echo '<select class="form-control" name="mb" id="mb">'.$mbs.'</select>';
echo '<select class="form-control" name="cpu" id="cpu">'.$cpus.'</select>';
echo '<select class="form-control" name="gpu" id="gpu">'.$gpus.'</select>';
echo '<select class="form-control" name="ram1" id="ram1">'.$rams.'</select>';
echo '<select class="form-control" name="ram2" id="ram2">'.$rams.'</select>';
echo '<select class="form-control" name="ram3" id="ram3">'.$rams.'</select>';
echo '<select class="form-control" name="ram4" id="ram4">'.$rams.'</select>';
echo '<select class="form-control" name="psu" id="psu">'.$psus.'</select>';
echo '<select class="form-control" name="hdd" id="hdd">'.$hdds.'</select>';
echo '<button class="btn btn-primary" type="submit">Sestavit</button>';
echo '</form>';

echo '<h2>Moje sestavy</h2>'; //TODO: juro opět potřebuju aby byly sestavy ve zvláštním souboru který funguje sám o sobě (tj když dojdu na components/seznamsestav.php tak se mi ukážou ty sestavy) pro AJAX
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
