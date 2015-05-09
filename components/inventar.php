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
		<ul id="items" class="list-group" style="text-align: left">
			<?php
			$dotaz = 'SELECT * FROM veci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)) {
				echo '<li class="list-group-item"><img id="item-sm" src="icons/'.$zaznam['nazev'].'.png"></img><span class="badge">'.$vlastnictvi[$zaznam['idveci']].'</span> '.$zaznam['nazev'].'</li>';
			}
			?>
		</ul>
	</div>
</div>
