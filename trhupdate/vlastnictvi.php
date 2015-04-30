<?php
session_start();
include "../vlastnictvi.php";
echo '<div><table style="background-color: #fff" class="table table-bordered table-responsive table-hover">';
echo '<tr><td>Peniaze</td><td>'.$vlastnictvi[0].'</td></tr>';
$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek)) {
  echo '<tr><td>'.$zaznam['nazev'].'</td><td>'.$vlastnictvi[$zaznam['idveci']].'</td></tr>';
}
echo '</table></div>';
?>
