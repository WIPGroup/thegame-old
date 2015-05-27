<?php
include "components/sestavit.php";
echo "<h1>stavba počítačů</h1>";
?>
<div class="col-md-6 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Sestavit</h1>
		</div>
		<div class="panel-body">
			<form class="form-inline" action="build.php" method="GET" id="build">
<?php
$mbs = ""; $cpus = ""; $gpus = ""; $rams = ""; $psus = ""; $hdds = "";
$veci = null;
$dotaz = 'SELECT * FROM veci WHERE typ<>""';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];

	if ($vlastnictvi[$zaznam['idveci']] > 0)
	{
		if ($zaznam['typ'] == "mb")
			$mbs .= '<option value="'.$zaznam['idveci'].'" data-ram="'.explode(';', $zaznam['sloty'])[0].'" data-pci="'.explode(';', $zaznam['sloty'])[1].'" data-socket="'.$zaznam['socket'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
		if ($zaznam['typ'] == "cpu")
			$cpus .= '<option value="'.$zaznam['idveci'].'" data-socket="'.$zaznam['socket'].'">'.$zaznam['nazev'].' ('.$vlastnictvi[$zaznam['idveci']].'x)</option>'."\n";
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
echo "Základní deska:";
echo '<select class="form-control" name="mb" id="mb">'.$mbs.'</select>';
echo "<br>Procesor:";
echo '<select class="form-control" name="cpu" id="cpu">'.$cpus.'</select>';
echo "<br>Ramky:"; //TODO: nesmi jit vybrat jedna vec dvakrat, nevim jak to takhle chces resit, bylo by mozne dat do optionu disable, ale bootstrap to nijak nezvyrazni, pak to vypada divne
echo '<select class="form-control" name="ram1" id="ram1">'.$rams.'</select>';
echo '<select class="form-control" name="ram2" id="ram2">'.$rams.'</select>';
echo '<select class="form-control" name="ram3" id="ram3">'.$rams.'</select>';
echo '<select class="form-control" name="ram4" id="ram4">'.$rams.'</select>';
echo '<select class="form-control" name="ram5" id="ram5">'.$rams.'</select>';
echo '<select class="form-control" name="ram6" id="ram6">'.$rams.'</select>';
echo '<select class="form-control" name="ram7" id="ram7">'.$rams.'</select>';
echo '<select class="form-control" name="ram8" id="ram8">'.$rams.'</select>';
echo "<br>Grafárny:";
echo '<select class="form-control" name="gpu1" id="gpu1">'.$gpus.'</select>';
echo '<select class="form-control" name="gpu2" id="gpu2">'.$gpus.'</select>';
echo '<select class="form-control" name="gpu3" id="gpu3">'.$gpus.'</select>';
echo '<select class="form-control" name="gpu4" id="gpu4">'.$gpus.'</select>';
echo "<br>Harddisk:";
echo '<select class="form-control" name="hdd" id="hdd">'.$hdds.'</select>';
echo "<br>Zdroj:";
echo '<select class="form-control" name="psu" id="psu">'.$psus.'</select>';
echo '<br><button class="btn btn-primary" type="submit">Sestavit</button>';
echo '</form>';
?>
		</div>
	</div>
</div>
<div class="col-md-6 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Moje sestavy</h1>
		</div>
		<div class="panel-body">
			<div id="sestavy"></div>
		</div>
	</div>
</div>
