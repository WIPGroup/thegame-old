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
			Radenie <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a data-sort-by="original-order">Pvodné (ID)</a></li>
			<li><a data-sort-by="name">Meno</a></li>
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
			<li><a data-filter="*">Zobraziť všetko</a></li>
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
<div class="grid col-xs-12 col-md-9">
	<?php
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{ //vymyslet http://isotope.metafizzy.co/filtering.html
		if (($vlastnictvi[$zaznam['idveci']] > 0) && ($zaznam['vykon'] > 0) && ($zaznam['typ'] != ''))
		{
			echo '<div data-tier="'.$zaznam['socket'].'" data-type="'.$zaznam['typ'].'" data-idveci="'.$zaznam['idveci'].'" class="grid-item '.$zaznam['typ'].'" style="background-image: url(\'icons/'.$zaznam['idveci'].'.png\');" '; //TODO JS .grid-item-selected pro vybrane

			if ($zaznam['typ'] == 'mb')
				echo 'data-ram="'.explode(';', $zaznam['sloty'])[0].'" data-pci="'.explode(';', $zaznam['sloty'])[1].'" data-hdd="'.explode(';', $zaznam['sloty'])[2].'" data-socket="'.$zaznam['socket'].'"';
			if ($zaznam['typ'] == 'cpu')
				echo 'data-socket="'.$zaznam['socket'].'"';
			echo '>';

			echo '<span class="badge power">'.$zaznam['vykon'].'</span>';

			echo '<span class="count"><span class="badge">'.$vlastnictvi[$zaznam['idveci']].'</span><button class="btn btn-xs btn-primary">Pridať</button></span>';

			echo '<span class="label label-default name"><abbr title="'.$zaznam['nazev'].'">'.$zaznam['nazev'].'</abbr></span>'; //TODO <abbr title="nazev">zkratka nebo cast nazvu</abbr>, pokud je dlouhy tak se urizne

			echo '<span class="label label-default category">'.strtoupper($zaznam['typ']).'</span>';

			echo '</div>';
			//IDEA php veci podle kterych filtrovat dat do classy divu, veci na trideni do spanu pokud se maji zobrazit, pokud ne tak do data-neco
			//IDEA do data-neco pridat ruzne veci podle kterych se to da tridit a filtrovat, pak apply Combination filters UI from http://isotope.metafizzy.co/filtering.html
		}
	}
	?>
</div>
<div class="col-xs-12 col-sm-6 col-md-3" style="padding-top: 15px;">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Vybrané komponenty</h1>
		</div>
		<div class="panel-body">
			<div id="currentbuild">
				<span class="label label-default">Motherboard</span>
				<ul id="mb">
				</ul>
				<span class="label label-default">CPU</span>
				<ul id="cpu">
				</ul>
				<span class="label label-default">RAM</span>
				<ul id="ram">
				</ul>
				<span class="label label-default">GPU</span>
				<ul id="gpu">
				</ul>
				<span class="label label-default">Storage</span>
				<ul id="hdd">
				</ul>
				<span class="label label-default">PSU</span>
				<ul id="psu">
				</ul>
			</div>
		</div>
		<button class="btn btn-primaty btn-block" id="sestavit">SESTAVIT</button>
	</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-3" style="padding-top: 15px;">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Info o itemu</h1>
		</div>
		<div class="panel-body" id="infoitemu">
		</div>
	</div>
</div>
