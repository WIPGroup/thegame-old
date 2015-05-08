<?php
	session_start();
	include "../phplogic/vlastnictvi.php";
	include "updatevyrob.php";
	echo '<div class="panel panel-default"><div class="panel-heading"><h2 class="panel-title">Inventář:</h2></div><div class="panel-body"><ul class="list-group">';//<table style="background-color: #fff" class="table table-bordered table-responsive table-hover"><tr><td>Peniaze</td><td>'.$vlastnictvi[0].'</td></tr>';
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek)) {
		echo '<li class="list-group-item"><img id="item" src="icons/'.$zaznam['nazev'].'.png"></img><span class="badge">'.$vlastnictvi[$zaznam['idveci']].'</span>'.$zaznam['nazev'].'</li>';
		//'<button class="btn btn-link col-lg-4" title="'.$zaznam['nazev'].'"><span class="badge">'.$vlastnictvi[$zaznam['idveci']].'</span> <img id="item" src="icons/'.$zaznam['nazev'].'.png"></img></button>';
	}
	echo '</ul></div></div>';
?>
