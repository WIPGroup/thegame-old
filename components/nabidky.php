<?php
session_start();

include "../vlastnictvi.php";
include "../trade.php";

$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];
}

echo '<table id="main" class="table table-striped table-bordered table-hover"><thead><tr><th>Hráč</th><th>Nabízí</th><th>A chce</th><th></th></tr></thead><tbody>'; //POZOR, pouziva https://datatables.net/manual/

$dotaz = 'SELECT * FROM obchod, hraci WHERE hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>' . $zaznam['jmeno'] . '</td>';

	echo '<td id="tableimage" style="background-image:url(icons/' . $veci[$zaznam['nabizi']] . '.png)" data-toggle="tooltip" data-placement="top" data-container="body" title="' . $veci[$zaznam['nabizi']] . '"><span class="badge">' . $zaznam['mnoznabizi'] . '</span><span class="sr-only">' . $veci[$zaznam['nabizi']] . '</span></td>';

	echo '<td id="tableimage" style="background-image:url(icons/' . $veci[$zaznam['chce']] . '.png)" data-toggle="tooltip" data-placement="top" data-container="body" title="' . $veci[$zaznam['chce']] . '"><span class="badge">' . $zaznam['mnozchce'] . '</span><span class="sr-only">' . $veci[$zaznam['chce']] . '</span></td>';

	echo '<td>';
	if ($zaznam['hrac'] == $_SESSION['hrac']) {
		echo '<button type="button" class="btn btn-warning btn-block oteviranizruseni" data-toggle="modal" data-target="#zrus" data-idnab="'.$zaznam['idnab'].'">Zrušiť</button>';
	}
	else if ($zaznam['mnozchce'] <= $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block oteviranikoupeni" data-toggle="modal" data-target="#kup"  data-idnab="'.$zaznam['idnab'].'">Kúpiť</button>';
	}
	else if ($zaznam['idhrace'] != $_SESSION['hrac'] && $zaznam['mnozchce'] > $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block" disabled>Kúpiť</button>';
	}
	echo "</td></tr>";
}
echo '</tbody></table>';
//TODO pridelat tabulky na zaklade TABu v nakupovani.php, kazda se specifickym ID

?>
<div id="zrus" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Opravdu chcete zrušit nabídku?</h4>
			</div>
			<div class="modal-body">
				<p>Časem sem dáme i úpravy</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning btn-block potvrzenizruseni" data-toggle="modal" data-target="#zrus" href="#">Zrušiť položku</button>
			</div>
		</div>
	</div>
</div>
<div id="kup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Kúpiť</h4>
			</div>
			<div class="modal-body">
				<p>Nejaké nastavenia</p>
				<p>Info o tom čo kupuješ a tak</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-block potvrzenikoupeni" data-toggle="modal" data-target="#kup" href="#">Kúpiť položku</button>
			</div>
		</div>
	</div>
</div>
