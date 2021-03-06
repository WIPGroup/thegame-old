<?php
include 'admin/tvorbakuponu.php';
?>
<!-- form na tvorbu kuponů -->
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Tvorba kuponů/poukázek</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%; text-align:left;">
			<form class="form-inline" action="admin.php" method="GET">
				<?php
				$dotaz = 'SELECT * FROM veci';
				$vysledek = mysql_query($dotaz) or die(mysql_error($db));
				while ($zaznam = mysql_fetch_array($vysledek))
				{
					echo '<label><abbr title="'.$zaznam['nazev'].'"><img id="item-sm" src="icons/'.$zaznam['idveci'].'.png"></img></abbr><input type="number" name="'.$zaznam['idveci'].'" id="'.$zaznam['idveci'].'" min="0" max="1000000000" class="form-control" placeholder="'.$zaznam['nazev'].'"></label>';
				}
				?>
				<button type="submit" class="btn btn-primary">Vytvořit</button>
			</form>
		</div>
	</div>
</div>
<!-- přerozdělění kuponů -->
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Přerozdělení surovinných kuponů/poukázek</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%; text-align:left;">
			<form action="admin.php" method="GET" class="form-inline">
				<label>Počet nových kuponů: <input type="number" name="prerozdelit" id="prerozdelit" min="1" max="10000" class="form-control" placeholder="Počet kuponů"></label>
				<button type="submit" class="btn btn-primary">Přerozdělit surovinné kupony</button>
			</form>
			<?php
				$dotaz = 'SELECT COUNT(*) FROM hraci WHERE idhrace>1';
				$vysledek = mysql_query($dotaz) or die(mysql_error($db));
				$zaznam = mysql_fetch_array($vysledek);

				echo '<a class="btn btn-primary" href="admin.php?prerozdelit='.$zaznam['COUNT(*)'].'&pridelit=1">Přerozdělit surovinné kupony zrovna mezi hráče</a>';
			?>
			<a href="admin/tisk.php" target="_blank">Verze kuponů na tisk</a>
		</div>
	</div>
</div>
<!--zobrazení kuponů-->
<div class="col-xs-12">
	<div class="grid js-isotope" data-isotope-options='{ "itemSelector": ".grid-item2", "layoutMode": "packery" , "packery": {"gutter": 10}}'>
		<?php //IDEA podle http://isotope.metafizzy.co/filtering.html Combination Filters pridat tlacitka na filtrovani itemu
		include 'vlastnictvi.php';

		//názvy věcí
		$dotaz = 'SELECT * FROM veci';
		$vysl = mysql_query($dotaz) or die(mysql_error($db));

		while ($zazn = mysql_fetch_array($vysl))
		{
			$veci[$zazn['idveci']] = $zazn['nazev'];
		}

		$dotaz = 'SELECT * FROM kupony ORDER BY cas';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));

		while ($zaznam = mysql_fetch_array($vysledek))
		{
			$obsah = explode(';', $zaznam['obsah']);
			$pocveci = count($obsah);

			echo '<div class="grid-item2';
			for ($i = 0; $i < $pocveci; $i++)
				if ($obsah[$i] > 0)
					echo ' '.$veci[$i];
			echo '">'; // style="float: left; width: 64px; heigth '.(13+24*$pocveci).'px">';
			echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">'.$zaznam['kod'].'</h3></div><div class="panel-body">Vytvorené '.date('j.n.Y G:i:s', $zaznam['cas']).'<br><a href="admin.php?rm='.$zaznam['kod'].'">Zmazať</a></div><ul class="list-group">';
			for ($i = 0; $i < $pocveci; $i++)
				if ($obsah[$i] > 0)
					echo '<li class="list-group-item"><img id="item-sm" src="icons/'.$i.'.png"></img>'.$veci[$i].' '.$obsah[$i].'</li>';

			echo '</ul></div></div>';
		}
		?>
	</div>
</div>