<?php
session_start();
include "../vlastnictvi.php";
include "updatevyrob.php";
?>
<div class="panel panel-primary">
	<div class="panel-heading" data-toggle="collapse" href="#inv" style="cursor: pointer">
		<h1 class="panel-title">Inventář</h1>
	</div>
	<div id="inv" class="panel-collapse collapse in" style="text-align: left">
		<div class="btn-group button-group filter-button-group">
			<button class="btn btn-info" data-filter="*">Show all</button>
			<button class="btn btn-info" data-filter=".Money">Money</button>
			<button class="btn btn-info" data-filter=".Gold, .Iron, .Silicon">Gold, Iron & Silicon</button>
			<button class="btn btn-info" data-filter=":not(.Money)">No Money</button>
			<button class="btn btn-info" data-filter=".metal:not(.transition)">metal but not transition</button>
		</div>
		<div class="btn-group button-group sort-by-button-group">
  		<button class="btn btn-info" data-sort-by="original-order">Původní (ID)</button>
  		<button class="btn btn-info" data-sort-by="name">Jméno</button>
  		<button class="btn btn-info" data-sort-by="count">Počet</button>
  		<button class="btn btn-info" data-sort-by="tier">Tier</button>
		</div>
		<p>
  		<input type="text" class="quicksearch form-control" placeholder="Search" />
		</p>
		<div class="grid okraj">
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)) { //vymyslet http://isotope.metafizzy.co/filtering.html
				echo '<div data-tier="T0" data-type="'.$zaznam['typ'].'" class="grid-item" style="background-image: url(\'icons/'.$zaznam['nazev'].'.png\'); background-size: 128px 128px;">';
				echo '<span class="badge count">'.$vlastnictvi[$zaznam['idveci']].'</span>';
				echo '<span class="badge power">'.$zaznam['vykon'].'</span>';
				echo '<span class="label label-default name">'.$zaznam['nazev'].'</span>';
				echo '</div>';
				//TODO do data-neco dat informace ktere neni potreba zobrazovat, do spanu s classou neco dat veci k zobrazeni
				//TODO do data-neco pridat ruzne veci podle kterych se to da tridit a filtrovat, pak apply Combination filters UI from http://isotope.metafizzy.co/filtering.html
			}
		?>
		</div>
	</div>
</div>
