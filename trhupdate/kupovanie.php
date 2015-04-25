<?php
session_start();
include "../connectvlastnictvi.php";
include "../trade.php";
echo '<table style="background-color: #fff" class="table table-bordered table-responsive table-hover">';
echo '<tr><th>Hráč</th><th>Hľadá</th><th>Množstvo</th><th>Cena</th><th></th>';
$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="k" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek)) {
  echo '<tr';
  if ($zaznam['mnozstvi'] > $vlastnictvi[$zaznam['predmet']])
    echo ' class="danger"';
  echo '<tr><td>' . $zaznam['jmeno'] . '</td>';
  echo '<td>' . $zaznam['nazev'] . '</td>';
  echo '<td>' . $zaznam['mnozstvi'] . '</td>';
  echo '<td>' . $zaznam['cena'] . '</td>';
  echo '<td>';
  if ($zaznam['mnozstvi'] <= $vlastnictvi[$zaznam['predmet']]) echo '<a href="#" onclick="obchodovanie(' . $zaznam['idnab'] . ');return false;">Predať</a><a href="#" onclick="drop(' . $zaznam['idnab'] . ');return false;">Zrušiť</a>'; //TODO: misto a chceme button
  echo "</td></tr>";
}
echo '</table>';
?>
