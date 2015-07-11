<?php
session_start();
include '../vlastnictvi.php';
include 'updatevyrob.php';
include 'updatesestav.php';
include 'body.php';    //TODO: hodit na ajax
?>
<div class="panel panel-primary">
	<div class="panel-heading" data-toggle="collapse" href="#inv" style="cursor: pointer">
		<h1 class="panel-title">Inventář</h1>
	</div>
	<div id="inv" class="panel-body panel-collapse collapse in" style="position:relative;">
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-4 col-md-6">
				<input type="text" class="quicksearch form-control" placeholder="Search" />
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 btn-group button-group sort-by-button-group">
				<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Poradie <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a data-sort-by="original-order">Pôvodné (ID)</a></li>
					<li><a data-sort-by="name">Meno</a></li>
					<li><a data-sort-by="power">Výkon</a></li>
					<li><a data-sort-by="count">Počet</a></li>
					<li><a data-sort-by="tier">Tier</a></li>
					<li><a data-sort-by="type">Typ</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 btn-group button-group filter-button-group">
				<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<span class="glyphicon glyphicon-filter"></span> Filter <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a data-filter="*">Zobraziť všetko</a></li>
					<li><a data-filter=".cpu, .psu, .hdd, .gpu, .ram, .mb">Komponenty</a></li>
					<li><a data-filter=":not(.cpu, .psu, .hdd, .gpu, .ram, .mb)">Bez komponent(ov)</a></li>
					<li><a data-filter=".cpu">CPUs</a></li>
					<li><a data-filter=".psu">PSUs</a></li>
					<li><a data-filter=".hdd">HDDs</a></li>
					<li><a data-filter=".gpu">GPUs</a></li>
					<li><a data-filter=".ram">RAMs</a></li>
					<li><a data-filter=".mb">Motherboards</a></li>
					<!--li><a data-filter=".metal:not(.transition)">metal but not transition</a></li-->
				</ul>
			</div>
		</div>
		<div class="grid col-xs-12 col-md-9">
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek))
			{ //vymyslet http://isotope.metafizzy.co/filtering.html
				echo '<div data-tier="'.$zaznam['socket'].'" data-type="'.$zaznam['typ'].'" data-idveci="'.$zaznam['idveci'].'" class="grid-item '.$zaznam['typ'].'" style="';
				if ($vlastnictvi[$zaznam['idveci']] < 1)
				echo 'opacity: 0.4; ';
				echo 'background-image: url(\'icons/'.$zaznam['idveci'].'.png\'); background-size: 128px auto;">';

				if ($zaznam['vykon'] <= 0)
						$skryt = ' sr-only';
				else
						$skryt = '';
				echo '<span class="badge power'.$skryt.'">'.$zaznam['vykon'].'</span>';

				if ($zaznam['spotreba'] <= 0)
						$skryt = ' sr-only';
				else
						$skryt = '';

				echo '<span class="badge wattage'.$skryt.'">'.$zaznam['spotreba'].'W</span>';    //TODO: nějak hezky si to upravte

				if ($vlastnictvi[$zaznam['idveci']] <= 0)
						$skryt = ' sr-only';
				else
						$skryt = '';
				echo '<span class="badge count'.$skryt.'">'.$vlastnictvi[$zaznam['idveci']].'</span>';
				echo '<span class="label label-default name"><abbr title="'.$zaznam['nazev'].'">'.$zaznam['nazev'].'</abbr></span>'; //TODO <abbr title="nazev">zkratka nebo cast nazvu</abbr>
				if ($zaznam['typ'] == '')
						echo '<span class="label label-default category">Surovina</span>'; //TODO soucastky
				else
						echo '<span class="label label-default category">'.strtoupper($zaznam['typ']).'</span>';
				echo '</div>';
				//IDEA php veci podle kterych filtrovat dat do classy divu, veci na trideni do spanu pokud se maji zobrazit, pokud ne tak do data-neco
				//IDEA do data-neco pridat ruzne veci podle kterych se to da tridit a filtrovat, pak apply Combination filters UI from http://isotope.metafizzy.co/filtering.html
			}
			?>
		</div>
		<div class="col-xs-12 col-md-3" style="padding-top: 5px;" id="infoitemucontainer">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title">Info o itemu</h1>
				</div>
				<div class="panel-body" id="infoitemu">
				</div>
			</div>
		</div>
	</div>
</div>