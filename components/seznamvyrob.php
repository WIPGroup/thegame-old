<?php
session_start();
include '../vlastnictvi.php';
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
			echo '<li class="list-group-item"><span class="label label-default">'.$veci[$zaznam['vyrobek']].'</span> hotovo v <span class="casvyroby badge">'.($zaznam['hotovo']-time()).'</span>'.date('G:i:s j.n.Y', $zaznam['hotovo']);
		} //Nasleduje priklad
		?>
		<li class="list-group-item">
			<table style="width: 100%">
				<tr>
					<td style="width: 250px; text-align: left">
						<span class="label label-default">RAM</span> hotovo v 4:31:12 16.5.2015
					</td>
					<td>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 45%"></div>
						</div>
					</td>
					<td style="width: 75px; text-align: right">
						<span class="casvyroby badge">632785</span>
					</td>
				</tr>
			</table>
		</li>
	</ul>
</div>
