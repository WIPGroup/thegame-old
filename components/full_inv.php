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
		<div class="button-group filter-button-group">
			<button data-filter="*">show all</button>
			<button data-filter=".money">Money</button>
			<button data-filter=".transition">transition</button>
			<button data-filter=".alkali, .alkaline-earth">alkali & alkaline-earth</button>
			<button data-filter=":not(.transition)">not transition</button>
			<button data-filter=".metal:not(.transition)">metal but not transition</button>
		</div>
		<div class="grid js-isotope" data-isotope-options='{ "itemSelector": ".item", "layoutMode": "packery" }'>
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)) {
				//if ($vlastnictvi[$zaznam['idveci']] > 0)
				echo '<div class="grid-item '.$zaznam['nazev'].'"><img id="item-sm" src="icons/'.$zaznam['nazev'].'.png"></img><span class="badge">'.$vlastnictvi[$zaznam['idveci']].'</span> '.$zaznam['nazev'].'</div>';
			}
		?>
		</div>
	</div>
</div>
