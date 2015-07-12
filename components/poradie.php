<div class="col-xs-12 col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading" data-toggle="collapse" href="#poradi" style="cursor: pointer">
			<h1 class="panel-title">Poradie</h1>
		</div>
		<table id="poradie" class="table table-condensed table-hover table-bordered panel-collapse collapse in">
			<?php
			$dotaz = 'SELECT jmeno,body FROM hraci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)){
				echo'<tr data-body="'.$zaznam['body'].'"><td>'.$zaznam['body']."</td> <td>".$zaznam['jmeno'].'</td></tr>';
			}
			?>
		</table>
	</div>
</div>
