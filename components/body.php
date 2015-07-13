<?php
//TODO odkomentovat pro ajax
//session_start();
//include '../vlastnictvi.php';

$dotaz = 'SELECT * FROM hraci WHERE idhrace='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$hrac = mysql_fetch_array($vysledek);

$bodys = 0; $vyzkums = 0;
$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$hrac['idhrace'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	if ($zaznam['vyzkum'] == 0)
		$bodys += $zaznam['vykon'];
	else
		$vyzkums += $zaznam['vykon'];
}
?>
<div class="col-xs-12 col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Body</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%">
			<?php
			echo '<p>Výskumné body: '.number_format($hrac['vyzkum'], 0, '', ' ').' ('.$vyzkums.' za sekundu)</p>';
			echo '<p><strong>Výherné body:</strong> '.number_format($hrac['body'], 0, '', ' ').' ('.$bodys.' za sekundu)</p>';
			?>
		</div>
	</div>
</div>
