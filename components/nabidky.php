<?php
session_start();
//TODO: vypsat vse co se da pridat v klientovi aby se to nemuselo posilat
include "../vlastnictvi.php";
//include "../trade.php";

$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];
}

//pouzivaji se datatables (https://datatables.net/manual/)
//nabídky ostatních
echo '<div id="maincontainer"><table id="main" class="table table-striped table-bordered table-hover"><thead><tr><th>Hráč</th><th>Nabízí</th><th>A chce</th><th></th></tr></thead><tbody>';

$dotaz = 'SELECT * FROM obchod, hraci WHERE hrac=idhrace AND hrac<>'.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>' . $zaznam['jmeno'] . '</td>';

	echo '<td class="tableimage" style="background-image:url(icons/' . $veci[$zaznam['nabizi']] . '.png)" data-toggle="tooltip" data-placement="left" data-container="body" title data-original-title="' . $veci[$zaznam['nabizi']] . '"><span class="badge">' . $zaznam['mnoznabizi'] . '</span><span class="sr-only">' . $veci[$zaznam['nabizi']] . '</span></td>';

	echo '<td class="tableimage" style="background-image:url(icons/' . $veci[$zaznam['chce']] . '.png)" data-toggle="tooltip" data-placement="left" data-container="body" title data-original-title="' . $veci[$zaznam['chce']] . '"><span class="badge">' . $zaznam['mnozchce'] . '</span><span class="sr-only">' . $veci[$zaznam['chce']] . '</span></td>';

	echo '<td>';
	if ($zaznam['mnozchce'] <= $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block oteviranikoupeni" data-idnab="'.$zaznam['idnab'].'">Kúpiť</button>';
	}
	else if ($zaznam['idhrace'] != $_SESSION['hrac'] && $zaznam['mnozchce'] > $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block" disabled>Kúpiť</button>';
	}
	echo "</td></tr>";
}
echo '</tbody></table></div>';

//nabídky hráče
echo '<div id="mojecontainer"><table id="moje" class="table table-striped table-bordered table-hover"><thead><tr><th>Nabízím</th><th>A chci</th><th></th></tr></thead><tbody>';

$dotaz = 'SELECT * FROM obchod, hraci WHERE hrac=idhrace AND hrac='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr>';

	echo '<td id="tableimage" style="background-image:url(icons/' . $veci[$zaznam['nabizi']] . '.png)" data-toggle="tooltip" data-placement="top" data-container="body" title="' . $veci[$zaznam['nabizi']] . '"><span class="badge">' . $zaznam['mnoznabizi'] . '</span><span class="sr-only">' . $veci[$zaznam['nabizi']] . '</span></td>';

	echo '<td id="tableimage" style="background-image:url(icons/' . $veci[$zaznam['chce']] . '.png)" data-toggle="tooltip" data-placement="top" data-container="body" title="' . $veci[$zaznam['chce']] . '"><span class="badge">' . $zaznam['mnozchce'] . '</span><span class="sr-only">' . $veci[$zaznam['chce']] . '</span></td>';

	echo '<td>';
	echo '<button type="button" class="btn btn-warning btn-block oteviranizruseni" data-idnab="'.$zaznam['idnab'].'">Zrušiť</button>';
	echo "</td></tr>";
}
echo '</tbody></table></div>';
?>
