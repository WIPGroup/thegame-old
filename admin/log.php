<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading" data-toggle="collapse" href="#log" style="cursor: pointer">
			<h1 class="panel-title">Log</h1>
		</div>
		<!--<div class="panel-body">
			<p>
				Měli bychom použít Labely:
				<span class="label label-default">Default</span>
				<span class="label label-primary">Primary</span>
				<span class="label label-success">Success</span>
				<span class="label label-info">Info</span>
				<span class="label label-warning">Warning</span>
				<span class="label label-danger">Danger</span>
			</p>
		</div>-->
		<div id="log" class="panel-collapse collapse" style="text-align: left">
			<ul class="list-group">
				<?php
				$dotaz = 'SELECT * FROM log, hraci WHERE hrac=idhrace ORDER BY cas DESC LIMIT 100';
				$vysledek = mysql_query($dotaz) or die(mysql_error($db));
				while ($zaznam = mysql_fetch_array($vysledek))  //TODO: Log by mozna taky stalo za to dat do tabulky |cas|jmeno|text|
				{
					echo '<li class="list-group-item"><span class="label label-default">'.date('Y.m.d H:i:s', $zaznam['cas']).'</span><span class="label label-info">'.$zaznam['jmeno'].'</span> '.$zaznam['text'];
					echo '</li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>
