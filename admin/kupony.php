<?php
//TODO: předělat na ajax
include 'admin/tvorbakuponu.php';
?>
<!-- form na tvorbu kuponů -->
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Tvorba kuponů/poukázek</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%; text-align:left;">
			<form action="admin.php" method="GET">
				<?php
				$dotaz = 'SELECT * FROM veci';
				$vysledek = mysql_query($dotaz) or die(mysql_error($db));
				while ($zaznam = mysql_fetch_array($vysledek))
				{
					echo '<div class="col-xs-12 col-sm-2"><div class="form-group"><label><img id="item-sm" src="icons/'.$zaznam['nazev'].'.png"></img> '.$zaznam['nazev'].'<input type="number" name="'.$zaznam['idveci'].'" id="'.$zaznam['idveci'].'" min="0" max="10000" value="0" class="form-control" placeholder="'.$zaznam['nazev'].'"></label></div></div>';
				}
				?>
				<button type="submit" class="btn btn-primary btn-block">Vytvořit</button>
			</form>
		</div>
	</div>
</div>
<!-- seznam kuponů -->
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Seznam kuponů/poukázek</h1>
		</div>
		<div class="panel-body">
			<div class="grid js-isotope" data-isotope-options='{ "itemSelector": ".grid-item2", "layoutMode": "packery" , "packery": {"gutter": 10}}'>
				<?php //TODO podle http://isotope.metafizzy.co/filtering.html Combination Filters pridat tlacitka na filtrovani itemu
				include 'vlastnictvi.php';

				//názvy věcí
				$dotaz = 'SELECT * FROM veci';
				$vysl = mysql_query($dotaz) or die(mysql_error($db));

				while ($zazn = mysql_fetch_array($vysl))
				{
					$veci[$zazn['idveci']] = $zazn['nazev'];
				}

				$dotaz = 'SELECT * FROM kupony';
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
					echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">'.$zaznam['kod'].'</h3></div><div class="panel-body"><p>Vytvořeno kdy a kým</p>			</div><ul class="list-group">';
					for ($i = 0; $i < $pocveci; $i++)
					if ($obsah[$i] > 0)
					echo '<li class="list-group-item"><img id="item-sm" src="icons/'.$veci[$i].'.png"></img>'.$veci[$i].' '.$obsah[$i].'</li>';

					echo '</ul></div></div>';
				}
				?>
			</div>
			<!--<script>
			$(document).ready( function () {
			$('.grid').isotope({
			itemSelector: '.grid-item2',
			layoutMode: 'packery',
			packery: {
			gutter: 10
		},
		itemSelector: '.grid-item',
	});
} );
</script>-->
</div>
</div>
</div>
