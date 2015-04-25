<?php
session_start();
include "../connectvlastnictvi.php";
include "../trade.php";
echo '<table style="background-color: #fff" class="table table-bordered table-responsive table-hover">';
echo '<tr><th>Hráč</th><th>Ponúka</th><th>Množstvo</th><th>Cena</th><th></th></tr>';
//nabídky
$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="p" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek)) {
  echo '<tr';
  if ($zaznam['cena'] > $vlastnictvi[0])
    echo ' class="danger"';
  echo '<tr><td>' . $zaznam['jmeno'] . '</td>';
  echo '<td>' . $zaznam['nazev'] . '</td>';
  echo '<td>' . $zaznam['mnozstvi'] . '</td>';
  echo '<td>' . $zaznam['cena'] . '</td>';
  echo '<td>';
  if ($zaznam['cena'] <= $vlastnictvi[0]) echo '<a href="#" onclick="obchodovanie(' . $zaznam['idnab'] . ');return false;">Kúpiť</a><a href="#" onclick="drop(' . $zaznam['idnab'] . ');return false;">Zrušiť</a>';
  echo "</td></tr>";
}
echo '</table>';
?>
