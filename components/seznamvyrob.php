<?php
session_start();
include "../vlastnictvi.php";
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="panel-title">Moje výroba</h1>
	</div>
	<ul class="list-group" style="text-align: left">
		<?php
		$dotaz = 'SELECT * FROM veci';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		while ($zaznam = mysql_fetch_array($vysledek))
		{
			$veci[$zaznam['idveci']] = $zaznam['nazev'];
		}

		$dotaz = 'SELECT * FROM vyroba, recepty WHERE recept=idreceptu AND hrac='.$_SESSION['hrac'];
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		while ($zaznam = mysql_fetch_array($vysledek))
		{
			echo '<li class="list-group-item"><table style="width: 100%"><tr>';
			echo '<td style="width: 250px; text-align: left">'.$zaznam['pocet'].'x ';
			echo '<span class="label label-default">'.$veci[$zaznam['vyrobek']].'</span> hotovo v '.date('G:i:s j.n.Y', $zaznam['hotovo']);
			echo '</td><td>';
			echo '<div class="progress" style="margin-top:auto; margin-bottom:auto">';
			echo '<div class="progress-bar" data-zbyva="'.($zaznam['hotovo'] - time ()).'" data-celkem="'.$zaznam['doba'].'" role="progressbar" style="width: '.(100 - 100 * ($zaznam['hotovo'] - time()) / $zaznam['doba']).'%"></div>';
			echo '</div></td><td style="width: 150px; text-align: right">';
			echo '<span class="badge">zbývá <span class="casvyroby">'.($zaznam['hotovo'] - time ()).'</span> sekund</span>';
			echo '</td></tr></table></li>';
		}
		?>
	</ul>
	<br>
</div>
