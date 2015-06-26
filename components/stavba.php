<?php
require 'vlastnictvi.php';
?>
<div class="col-md-3 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Sestavit</h1>
		</div>
		<div class="panel-body">
			<form class="form-inline" action="build.php" method="GET" id="build"></form>
		</div>
	</div>
</div>
<div class="col-md-9 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Moje sestavy</h1> <!-- předělat misto druheho divu na list -->
		</div>
		<div class="panel-body">
			<div id="sestavy"></div>
		</div>
	</div>
</div>
