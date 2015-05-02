<?php include_once("components/analyticstracking.php") ?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><img src="favicon.ico" style="display: inline" alt=""/>TheGame</a>
	</div>
	<div class="collapse navbar-collapse" id="main-nav">
		<ul class="nav navbar-nav">
			<li>
				<a href="index.php">Úvod</a>
			</li>
			<li>
				<a href="trh.php">Trh</a> <!-- PHP magic: at ma classu active to 'li', ktera ma byt aktivni-->
			</li>
			<li>
				<a href="crafting.php">Výroba</a>
			</li>
			<li>
				<a href="research.php">Výzkum</a>
			</li>
			<li>
				<a href="admin.php">ADMIN</a>
			</li>
		</ul>
		<?php
		if ($prihlasen) {
				include "components/hrac_menu.php";
		}
		?>
	</div>
</nav>
