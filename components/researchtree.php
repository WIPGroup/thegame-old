<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Strom výzkumu</h1>
		</div>
		<div class="panel-body">
		<?php
			include "vlastnictvi.php";
			$vyzkum = $hrac['vyzkum'];
			echo 'Máš '.$vyzkum.' research bodů.<br>';

			if ($vyzkum >= 1000)
				echo 'Výzkumy hotové.';
			else if ($vyzkum >= 500)
				echo 'Do nej výzkumu ti zbývá '.(1000 - $vyzkum).' bodů.';
			else if ($vyzkum >= 100)
				echo 'Do třetího výzkumu ti zbývá '.(500 - $vyzkum).' bodů.';
			else if ($vyzkum >= 50)
				echo 'Do druhého výzkumu ti zbývá '.(100 - $vyzkum).' bodů.';
			else
				echo 'Do prvního výzkumu ti zbývá '.(50 - $vyzkum).' bodů.';
		?>
		<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php echo $vyzkum/10; ?>%;">
		<?php echo $vyzkum .' z 1000'; ?>
  </div>
	Rozdeleni vykonu:</br>
	<script>
$('#slider-range').noUiSlider({
	start: [ 50 ],
	range: {
		'min': [  0 ],
		'max': [ 100 ]
	}
});
</script>
</div>
		</div>
	</div>
</div>
