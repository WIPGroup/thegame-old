<?php include_once("components/analyticstracking.php") ?>
<nav class="navbar navbar-default navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="http://antre.417rct.org/"><img src="favicon.ico" style="display: inline" alt=""/>TheGame</a>
	</div>
	<div class="collapse navbar-collapse" id="main-nav"><!--TODO: Dat classu active te zalozce, na ktere si, at uz pomoci php (asi slozite) nebo JS (asi jednodussi)-->
		<ul class="nav navbar-nav">
			<li>
				<a href="index.php">Úvod</a>
			</li>
			<li>
				<a href="trh.php">Trh</a>
			</li>
			<li>
				<a href="crafting.php">Výroba</a>
			</li>
			<li>
				<a href="build.php">Stavba PC</a>
			</li>
			<li>
				<a href="research.php">Výzkum</a>
			</li>
			<?php
			if ($prihlasen && $_SESSION['hrac'] == 1)
			{
				echo "<li>";
				echo '<a href="admin.php">ADMIN</a>';
				echo "</li>";
			}
			?>
		</ul>
		<?php
		if ($prihlasen) {
				include "components/hrac_menu.php";
		}
		?>
	</div>
</nav>
