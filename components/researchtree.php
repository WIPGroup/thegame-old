<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Výzkum</h1>
		</div>
		<div class="panel-body">
Výskum je dôležitý, bez výskumu sa nikam nedostaneš.
			<?php
				include 'vlastnictvi.php';
				include 'updatesestav.php';
				$vyzkum = $hrac['vyzkum'];
				echo 'Máš '.number_format($vyzkum, 0, '', ' ').' research bodů.';
				?>
		</div>
	</div>
</div>
<?php
			$zkoumany = true;
			$dotaz = 'SELECT * FROM vyzkumy ORDER BY body';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek))
			{
				echo '<div class="col-md-3 col-sm-6 col-xs-12"><div class="panel panel-primary"><div class="panel-heading"><h1 class="panel-title">'.$zaznam['nazev'].' ('.number_format($zaznam['body'], 0, '', ' ').' research bodů)</div><div class="panel-body">'.$zaznam['popis'].'<br>';

				if ($vyzkum > $zaznam['body'])
					echo 'Výzkum hotový.';
				if ($vyzkum < $zaznam['body'])
					if ($zkoumany)
					{
						echo 'Ostáva '.number_format($zaznam['body'] - $vyzkum, 0, '', ' ').' bodov<div class="progress"><div class="progress-bar" role="progressbar" style="width:'.(($vyzkum / $zaznam['body']) * 100).'%"></div></div>';
						$zkoumany = false;
					}
					else
						echo 'Čaká se na predchádzajúci výzkum.'; //"Do vyzkoumání zbývá ".($zaznam['body'] - $vyzkum)." research bodů.";

				echo '</div></div></div>';
			}
		?>
