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
		echo '<td>' . $veci[$zaznam['nabizi']] . '</td>';

	echo '<td>' . $zaznam['mnoznabizi'] . '</td>';

	if ($zaznam['chce'] == 0)
		echo '<td>Peníze</td>';
	else
		echo '<td>' . $veci[$zaznam['chce']] . '</td>';

	echo '<td>' . $zaznam['mnozchce'] . '</td>';
	echo '<td>';
	if ($zaznam['hrac'] == $_SESSION['hrac']) {
		echo '<button type="button" class="btn btn-warning btn-block" href="#" onclick="cancel(' . $zaznam['idnab'] . ');return false;">Zrušiť</button>';
	}
	else if ($zaznam['mnozchce'] <= $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block" href="#" onclick="obchodovanie(' . $zaznam['idnab'] . ');return false;">Kúpiť</button>';
	}
	else if ($zaznam['idhrace'] != $_SESSION['hrac'] && $zaznam['mnozchce'] > $vlastnictvi[$zaznam['chce']]) {
		echo '<button type="button" class="btn btn-success btn-block" disabled>Kúpiť</button>';
	}
	echo "</td></tr>";
}
echo '</tbody></table>';
?>
<script>
$(document).ready( function () {
		$('#main').DataTable();
} );
</script>