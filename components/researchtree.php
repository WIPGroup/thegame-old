<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Strom výzkumu</h1>
		</div>
		<div class="panel-body">
			Nejake kecy
			bla
			bla
			bla
			co je vyzkum a tak mozna?
			<?php
				include "vlastnictvi.php";
				include "updatesestav.php";
				$vyzkum = $hrac['vyzkum'];
				echo 'Máš '.$vyzkum.' research bodů.';
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
				echo '<div class="col-xs-3"><div class="panel panel-primary"><div class="panel-heading"><h1 class="panel-title">'.$zaznam['nazev'].' ('.$zaznam['body'].' research bodů)		</div><div class="panel-body">'.$zaznam['popis'].'<br>';

				if ($vyzkum > $zaznam['body'])
					echo "Výzkum hotový.";
				if ($vyzkum < $zaznam['body'])
					if ($zkoumany)
					{
						echo 'Zbývá '.($zaznam['body'] - $vyzkum).' bodů<div class="progress"><div class="progress-bar" role="progressbar" style="width:'.(($vyzkum / $zaznam['body']) * 100).'%"></div></div>';
						$zkoumany = false;
					}
					else
						echo "Čeká se na předchozí výzkum."; //"Do vyzkoumání zbývá ".($zaznam['body'] - $vyzkum)." research bodů.";

				echo "</div></div></div>";
			}
		?>
