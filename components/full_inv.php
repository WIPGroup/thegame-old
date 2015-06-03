<?php
session_start();
include "../vlastnictvi.php";
include "updatevyrob.php";
?>
<div class="panel panel-primary">
	<div class="panel-heading" data-toggle="collapse" href="#inv" style="cursor: pointer">
		<h1 class="panel-title">Inventář</h1>
	</div>
	<div id="inv" class="panel-body panel-collapse collapse in">
		<div class="col-xs-12 col-md-2">
			<p>
				<input type="text" class="quicksearch form-control" placeholder="Search" />
			</p>
			<div class="btn-group button-group sort-by-button-group">
				<label>Sort:</label>
				<button class="btn btn-block btn-info" data-sort-by="original-order">Původní (ID)</button>
				<button class="btn btn-block btn-info" data-sort-by="name">Jméno</button>
				<button class="btn btn-block btn-info" data-sort-by="power">Výkon</button>
				<button class="btn btn-block btn-info" data-sort-by="count">Počet</button>
				<button class="btn btn-block btn-info" data-sort-by="tier">Tier</button>
				<button class="btn btn-block btn-info" data-sort-by="type">Typ</button>
			</div>
			<div class="btn-group button-group filter-button-group">
				<label>Filter:</label>
				<button class="btn btn-block btn-info" data-filter="*">Show all</button>
				<button class="btn btn-block btn-info" data-filter=".cpu, .psu, .hdd, .gpu, .ram, .mb">Components</button>
				<button class="btn btn-block btn-info" data-filter=":not(.cpu, .psu, .hdd, .gpu, .ram, .mb)">No Components</button>
				<button class="btn btn-block btn-info" data-filter=".cpu">CPUs</button>
				<button class="btn btn-block btn-info" data-filter=".psu">PSUs</button>
				<button class="btn btn-block btn-info" data-filter=".hdd">HDDs</button>
				<button class="btn btn-block btn-info" data-filter=".gpu">GPUs</button>
				<button class="btn btn-block btn-info" data-filter=".ram">RAMs</button>
				<button class="btn btn-block btn-info" data-filter=".mb">Motherboards</button>
				<button class="btn btn-block btn-info" data-filter=".metal:not(.transition)">metal but not transition</button>
			</div>
		</div>
		<div class="grid col-xs-12 col-md-8">
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)) { //vymyslet http://isotope.metafizzy.co/filtering.html
				echo '<div data-tier="T0" data-type="'.$zaznam['typ'].'" class="grid-item '.$zaznam['typ'].'" style="';
				if ($vlastnictvi[$zaznam['idveci']] < 1)
					echo 'opacity: 0.4; ';
				echo 'background-image: url(\'icons/'.$zaznam['nazev'].'.png\'); background-size: 128px 128px;">';

				if ($zaznam['vykon'] <= 0)
					$skryt = " sr-only";
				else
					$skryt = "";
				echo '<span class="badge power'.$skryt.'">'.$zaznam['vykon'].'</span>';

				if ($vlastnictvi[$zaznam['idveci']] <= 0)
					$skryt = " sr-only";
				else
					$skryt = "";
				echo '<span class="badge count'.$skryt.'">'.$vlastnictvi[$zaznam['idveci']].'</span>';
				echo '<span class="label label-default name">'.$zaznam['nazev'].'</span>';
				echo '</div>';
				//TODO php veci podle kterych filtrovat dat do classy divu, veci na trideni do spanu pokud se maji zobrazit, pokud ne tak do data-neco
				//TODO do data-neco pridat ruzne veci podle kterych se to da tridit a filtrovat, pak apply Combination filters UI from http://isotope.metafizzy.co/filtering.html
				}
			?>
		</div>
		<div class="grid col-xs-12 col-md-2">
			tady bude info o itemu
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec orci metus. Fusce tincidunt lorem elit, quis efficitur lectus vehicula ut. Maecenas a justo purus. Nullam euismod odio felis, ac hendrerit risus suscipit placerat. Ut sit amet lacus volutpat, viverra elit blandit, gravida erat. Nulla facilisi. Aenean ex diam, fermentum at nunc quis, pulvinar dapibus eros. Morbi sit amet aliquam dolor. Proin gravida erat eget nibh ullamcorper, a sollicitudin sem vulputate. Morbi blandit libero vel ipsum porttitor rutrum. Donec varius nisl nibh, non congue purus suscipit et. Mauris at nulla condimentum, maximus nibh quis, consequat lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in orci fermentum dui lacinia posuere eu a erat. Donec ac lobortis ipsum.
		</div>
	</div>
</div>
