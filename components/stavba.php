<?php
include "components/sestavit.php";
//TODO Napsat @j2ghz az to bude pripravene na graficke vylepseni
echo "<h1>stavba počítačů</h1>";

echo '<form class="form-inline" action="build.php" method="GET">';

$dotaz = 'SELECT * FROM veci WHERE typ<>""';
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
	}
}
echo '<select class="form-control" name="mb" id="mb">'.$mbs.'</select>';
echo '<select class="form-control" name="cpu" id="cpu">'.$cpus.'</select>';
echo '<select class="form-control" name="gpu" id="gpu">'.$gpus.'</select>';
echo '<select class="form-control" name="ram1" id="ram1">'.$rams.'</select>';
echo '<select class="form-control" name="ram2" id="ram2">'.$rams.'</select>';
echo '<select class="form-control" name="ram3" id="ram3">'.$rams.'</select>';
echo '<select class="form-control" name="ram4" id="ram4" disabled>'.$rams.'</select>'; //TODO priklad zakazaneho vyberu: dat k prazdnym vyberum a k tlacitku, kdyz neni zvoleny funkcni komp
echo '<select class="form-control" name="psu" id="psu">'.$psus.'</select>';
echo '<select class="form-control" name="hdd" id="hdd">'.$hdds.'</select>';
echo '<button class="btn btn-primary" type="submit">Sestavit</button>';
echo '</form>';
?>
