<div class="col-xs-12"> //TODO: collapse
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Log</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%; text-align:left;">
			<ul class="list-group">
				<?php
				$dotaz = 'SELECT * FROM log, hraci WHERE hrac=idhrace ORDER BY cas DESC LIMIT 100';
				$vysledek = mysql_query($dotaz) or die(mysql_error($db));
				while ($zaznam = mysql_fetch_array($vysledek))
				{
					echo '<li class="list-group-item">['.date("Y.m.d H:i:s",$zaznam['cas'])."][".$zaznam['jmeno']."]: ".$zaznam['text'];
					echo "</li>";
				}
				?>
			</ul>
		</div>
	</div>
</div>
