<?php
session_start();
include "../connectvlastnictvi.php";
echo '<table border="1">';
echo '<tr><td>Peniaze</td><td>'.$vlastnictvi[0].'</td></tr>';
$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek)){
	echo '<tr><td>'.$zaznam['nazev'].'</td><td>'.$vlastnictvi[$zaznam['idveci']].'</td></tr>';
}
echo '</table>';
?>