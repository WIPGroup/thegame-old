<?php
session_start();
include '../vlastnictvi.php';
include 'updatevyrob.php';
include 'updatesestav.php';
?>
<!--inventář-->
<div class="col-xs-12">
	<div class="col-xs-12 col-sm-4 col-md-6">
		<input type="text" class="quicksearch form-control" placeholder="Search" />
	</div>
	<div class="col-xs-12 col-sm-4 col-md-3 btn-group button-group sort-by-button-group">
		<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			Třídění <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a data-sort-by="original-order">Původní (ID)</a></li>
			<li><a data-sort-by="name">Jméno</a></li>
			<li><a data-sort-by="power">Výkon</a></li>
			<li><a data-sort-by="count">Počet</a></li>
			<li><a data-sort-by="tier">Tier</a></li>
			<li><a data-sort-by="type">Typ</a></li>
		</ul>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-3 btn-group button-group filter-button-group">
		<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			Filter <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a data-filter="*">Zobrazit vše</a></li>
			<li><a data-filter=".cpu, .psu, .hdd, .gpu, .ram, .mb">Components</a></li>
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
<div class="grid col-xs-12 col-md-10">
	<?php
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{ //vymyslet http://isotope.metafizzy.co/filtering.html
		if (($vlastnictvi[$zaznam['idveci']] > 0) && ($zaznam['vykon'] > 0) && ($zaznam['typ'] != ''))
		{
			echo '<div data-tier="'.$zaznam['socket'].'" data-type="'.$zaznam['typ'].'" data-idveci="'.$zaznam['idveci'].'" class="grid-item '.$zaznam['typ'].'" style="background-image: url(\'icons/'.$zaznam['idveci'].'.png\');" ';

			if ($zaznam['typ'] == 'mb')
				$mbs .= 'data-ram="'.explode(';', $zaznam['sloty'])[0].'" data-pci="'.explode(';', $zaznam['sloty'])[1].'" data-hdd="'.explode(';', $zaznam['sloty'])[2].'" data-socket="'.$zaznam['socket'].'"';
			if ($zaznam['typ'] == 'cpu')
				$cpus .= 'data-socket="'.$zaznam['socket'].'"';
			echo '>';

			echo '<span class="badge power">'.$zaznam['vykon'].'</span>';

			echo '<span class="badge count"><input type="checkbox"><input type="number" min="1" max="'.$vlastnictvi[$zaznam['idveci']].'"> z '.$vlastnictvi[$zaznam['idveci']].'</span>';

			echo '<span class="label label-default name"><abbr title="'.$zaznam['nazev'].'">'.$zaznam['nazev'].'</abbr></span>'; //TODO <abbr title="nazev">zkratka nebo cast nazvu</abbr>

			echo '<span class="label label-default category">'.strtoupper($zaznam['typ']).'</span>';

			echo '</div>';
			//IDEA php veci podle kterych filtrovat dat do classy divu, veci na trideni do spanu pokud se maji zobrazit, pokud ne tak do data-neco
			//IDEA do data-neco pridat ruzne veci podle kterych se to da tridit a filtrovat, pak apply Combination filters UI from http://isotope.metafizzy.co/filtering.html
		}
	}
	?>
</div>
<div class="col-xs-12 col-md-2" id="infoitemu">
	Názov:	<a href="http://ark.intel.com/products/82930/Intel-Core-i7-5960X-Processor-Extreme-Edition-20M-Cache-up-to-3_50-GHz">5960X</a><br/>
	Core (Threads):	8(16)<br/>
	L3 Cache:	20<br/>
	Graphics:	0<br/>
	Controller:	2<br/>
	Brand:	Core i7-E<br/>
	MicroArchitecture Code-name:	Haswell-E<br/>
	Vykon:	23 711 280 000 000<br/>
	<button class="btn btn-primary btn-block">More...</button> <!-- TODO info text z databaze, sloupec extrapopis -->
</div>
