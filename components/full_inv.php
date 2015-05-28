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
			<button class="btn" data-filter="*">Show all</button>
			<button class="btn" data-filter=".money">Money</button>
			<button class="btn" data-filter=".gold, .iron, .silicon">Gold, Iron & Silicon</button>
			<button class="btn" data-filter=":not(.money)">No Money</button>
			<button class="btn" data-filter=".metal:not(.transition)">metal but not transition</button>
		</div>
		<div class="grid">
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)) {
				//if ($vlastnictvi[$zaznam['idveci']] > 0)
				echo '<div class="grid-item '.$zaznam['nazev'].'" style="background-image: url(\'icons/'.$zaznam['nazev'].'.png\'); background-size: 128px 128px;">';
				echo '<span class="badge count">'.$vlastnictvi[$zaznam['idveci']].'</span>';
				echo '<span class="label label-default name">'.$zaznam['nazev'].'</span>';
				echo '</div>';
				//TODO do classy pridat ruzne veci podle kterych se to da tridit a filtrovat
			}
		?>
		</div>
	</div>
</div>
<script>
// init Isotope
var $grid = $('.grid').isotope({
	itemSelector: '.grid-item',
  layoutMode: 'packery'
});
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $container.isotope({ filter: filterValue });
});
</script>
