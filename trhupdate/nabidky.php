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

echo '<table id="main" class="table table-striped table-bordered table-hover"><thead><tr><th>Hráč</th><th>Nabízí</th><th>V množstvu</th><th>A chce</th><th>V množstvu</th><th></th></tr></thead><tbody>'; //POZOR, pouziva https://datatables.net/manual/

$dotaz = 'SELECT * FROM obchod, hraci WHERE hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>' . $zaznam['jmeno'] . '</td>';

	if ($zaznam['nabizi'] == 0)
		echo '<td>Peníze</td>';
	else
		echo '<td><img id="item" src="icons/' . $veci[$zaznam['nabizi']] . '.png"></img> ' . $veci[$zaznam['nabizi']] . '</td>';

	echo '<td>' . $zaznam['mnoznabizi'] . '</td>';

	if ($zaznam['chce'] == 0)
		echo '<td>Peníze</td>';
	else
		echo '<td><img id="item" src="icons/' . $veci[$zaznam['chce']] . '.png"></img> ' . $veci[$zaznam['chce']] . '</td>';

	echo '<td>' . $zaznam['mnozchce'] . '</td>';
	echo '<td>';
	if ($zaznam['hrac'] == $_SESSION['hrac']) {
		echo '<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#zrus">Zrušiť</button>';
	}
	else if ($zaznam['mnozchce'] <= $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#kup">Kúpiť</button>';
	}
	else if ($zaznam['idhrace'] != $_SESSION['hrac'] && $zaznam['mnozchce'] > $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block" disabled>Kúpiť</button>';
	}
	echo "</td></tr>";
}
echo '</tbody></table>';
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
				<button type="button" class="btn btn-warning btn-block" href="#" onclick="cancel(' . $zaznam['idnab'] . ');return false;">Zrušiť položku</button>
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
				<button type="button" class="btn btn-success btn-block" href="#" onclick="obchodovanie(' . $zaznam['idnab'] . ');return false;">Kúpiť</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready( function () {
		$('#main').DataTable();
} );
</script>
