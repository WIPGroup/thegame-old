<?php
	session_start();
	include "../vlastnictvi.php";
	include "updatevyrob.php";
	echo '<div class="panel panel-default"><div class="panel-heading"><h2 class="panel-title">Inventář:</h2></div><div class="panel-body">';//<table style="background-color: #fff" class="table table-bordered table-responsive table-hover"><tr><td>Peniaze</td><td>'.$vlastnictvi[0].'</td></tr>';
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek)) {
		echo '<button class="btn btn-default col-lg-4" title="'.$zaznam['nazev'].'"><span class="badge">'.$vlastnictvi[$zaznam['idveci']].'</span> <img id="item" src="icons/'.$zaznam['nazev'].'.png"></img></button>'; //'<tr><td>'.$zaznam['nazev'].'</td><td>'.$vlastnictvi[$zaznam['idveci']].'</td></tr>';
	} //</table>
	echo '</div></div>';
?>
