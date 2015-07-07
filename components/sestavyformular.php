<?php

session_start();
include '../vlastnictvi.php';
$mbs = null; $cpus = null; $gpus = null; $rams = null; $hdds = null; $psus = null;
$veci = null;
$dotaz = 'SELECT * FROM veci WHERE typ<>""';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];

	if ($vlastnictvi[$zaznam['idveci']] > 0)
	{
		if ($zaznam['typ'] == 'mb')
			$mbs .= '<option value="'.$zaznam['idveci'].'" data-ram="'.explode(';', $zaznam['sloty'])[0].'" data-pci="'.explode(';', $zaznam['sloty'])[1].'" data-hdd="'.explode(';', $zaznam['sloty'])[2].'" data-socket="'.$zaznam['socket'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == 'cpu')
			$cpus .= '<option value="'.$zaznam['idveci'].'" data-socket="'.$zaznam['socket'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == 'gpu')
			$gpus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == 'ram')
			$rams .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == 'psu')
			$psus .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == 'hdd')
			$hdds .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
	}
} //https://select2.github.io/examples.html mozna

$rams .= '<option value="-1">Nic</option>'."\n";
$gpus .= '<option value="-1">Nic</option>'."\n";
$hdds .= '<option value="-1">Nic</option>'."\n";

echo 'Základná doska:';
echo '<select class="form-control selectpicker" name="mb" id="mb">'.$mbs.'</select>';
echo '<br>Procesor:';
echo '<select class="form-control selectpicker" name="cpu" id="cpu">'.$cpus.'</select>';
echo '<br>Ramky:'; //TODO: http://silviomoreto.github.io/bootstrap-select/
for ($i = 1; $i <= 8; $i++)
	echo '<select class="form-control selectpicker" name="ram'.$i.'" id="ram'.$i.'">'.$rams.'</select>';
echo '<br>Grafárny:';
for ($i = 1; $i <= 4; $i++)
	echo '<select class="form-control selectpicker" name="gpu'.$i.'" id="gpu'.$i.'">'.$gpus.'</select>';
echo '<br>Harddisk:';
for ($i = 1; $i <= 4; $i++)
	echo '<select class="form-control selectpicker" name="hdd'.$i.'" id="hdd'.$i.'">'.$hdds.'</select>';
echo '<br>Zdroj:';
echo '<select class="form-control selectpicker" name="psu" id="psu">'.$psus.'</select>';
echo '<br><button class="btn btn-primary btn-block" type="submit">Sestavit</button>';
