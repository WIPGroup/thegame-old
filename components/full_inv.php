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
			<button class="btn btn-info" data-filter=".cpu, .psu, .hdd, .gpu, .ram, .mb">Components</button>
			<button class="btn btn-info" data-filter=":not(.cpu, .psu, .hdd, .gpu, .ram, .mb)">No Components</button>
			<button class="btn btn-info" data-filter=".cpu">CPUs</button>
			<button class="btn btn-info" data-filter=".psu">PSUs</button>
			<button class="btn btn-info" data-filter=".hdd">HDDs</button>
			<button class="btn btn-info" data-filter=".gpu">GPUs</button>
			<button class="btn btn-info" data-filter=".ram">RAMs</button>
			<button class="btn btn-info" data-filter=".mb">Motherboards</button>
			<button class="btn btn-info" data-filter=".metal:not(.transition)">metal but not transition</button>
		</div>
		<div class="btn-group button-group sort-by-button-group">
  		<button class="btn btn-info" data-sort-by="original-order">Původní (ID)</button>
  		<button class="btn btn-info" data-sort-by="name">Jméno</button>
			<button class="btn btn-info" data-sort-by="power">Výkon</button>
  		<button class="btn btn-info" data-sort-by="count">Počet</button>
  		<button class="btn btn-info" data-sort-by="tier">Tier</button>
			<button class="btn btn-info" data-sort-by="type">Typ</button>
		</div>
		<p>
  		<input type="text" class="quicksearch form-control" placeholder="Search" />
		</p>
		<div class="grid okraj">
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)) { //vymyslet http://isotope.metafizzy.co/filtering.html
				echo '<div data-tier="T0" data-type="'.$zaznam['typ'].'" class="grid-item '.$zaznam['typ'].'" style="background-image: url(\'icons/'.$zaznam['nazev'].'.png\'); background-size: 128px 128px;">';
				echo '<span class="badge count">'.$vlastnictvi[$zaznam['idveci']].'</span>';
				echo '<span class="badge power">'.$zaznam['vykon'].'</span>';
				echo '<span class="label label-default name">'.$zaznam['nazev'].'</span>';
				echo '</div>';
				//TODO php veci podle kterych filtrovat dat do classy divu, veci na trideni do spanu pokud se maji zobrazit, pokud ne tak do data-neco
				//TODO do data-neco pridat ruzne veci podle kterych se to da tridit a filtrovat, pak apply Combination filters UI from http://isotope.metafizzy.co/filtering.html
			}
		?>
		</div>
	</div>
</div>
