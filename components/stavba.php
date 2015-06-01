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
} //https://select2.github.io/examples.html mozna
echo "Základní deska:";
echo '<select class="form-control selectpicker" name="mb" id="mb">'.$mbs.'</select>';
echo "<br>Procesor:";
echo '<select class="form-control selectpicker" name="cpu" id="cpu">'.$cpus.'</select>';
echo "<br>Ramky:"; //TODO: http://silviomoreto.github.io/bootstrap-select/
for ($i = 1; $i <= 8; $i++)
	echo '<select class="form-control selectpicker" name="ram'.$i.'" id="ram'.$i.'">'.$rams.'</select>';
echo "<br>Grafárny:";
for ($i = 1; $i <= 4; $i++)
	echo '<select class="form-control selectpicker" name="gpu'.$i.'" id="gpu'.$i.'">'.$gpus.'</select>';
echo "<br>Harddisk:";
for ($i = 1; $i <= 4; $i++)
	echo '<select class="form-control selectpicker" name="hdd'.$i.'" id="hdd'.$i.'">'.$hdds.'</select>';
echo "<br>Zdroj:";
echo '<select class="form-control selectpicker" name="psu" id="psu">'.$psus.'</select>';
echo '<br><button class="btn btn-primary btn-block" type="submit">Sestavit</button>';
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
