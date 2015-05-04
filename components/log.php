<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Log</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%">
			<?php
			$logfile = fopen("log.txt", "r") or die("Nepodařilo se přečíst log.");
			while(!feof($logfile))
			{
				$line = fgets($logfile);
				echo $line."<br>";
			}
			fclose($logfile);
			?>
		</div>
	</div>
</div>
