
<?php
session_start();
include '../vlastnictvi.php';
?>
<div class="col-xs-9">
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
				echo '<li class="list-group-item"><span class="label label-default">'.$veci[$zaznam['vyrobek']].'</span> hotovo za <span class="casvyroby badge">'.($zaznam['hotovo']-time()).'</span> s ('.date('G:i:s j.n.Y', $zaznam['hotovo']).')';
			}
			?>
		</ul>
	</div>
</div>
