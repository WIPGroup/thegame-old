<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="panel-title">Sestava X</h1>
	</div>
	<div class="panel-body">
		<?php
		$pocveci = count($veci);
		$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_SESSION['hrac'];
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		while ($zaznam = mysql_fetch_array($vysledek))
		{
			$obsah = explode(';', $zaznam['obsah']);
			for ($i = 0; $i < $pocveci; $i++)
				if ($obsah[$i] > 0)
				{
					echo $veci[$i];
					if ($obsah[$i] > 1)
						echo ' ('.$obsah[$i].')';
					echo ', ';
				}
			echo 'Výkon: '.$zaznam['vykon'].'<br>';
		}
		?>
	</div>
</div>
