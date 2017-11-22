<?php include_once('components/analyticstracking.php') ?>
<nav class="navbar navbar-default navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php"><img src="favicon.ico" style="display: inline" alt=""/>PC Building Simulator</a>
	</div>
	<div class="collapse navbar-collapse" id="main-nav">
		<ul class="nav navbar-nav">
			<li>
				<a href="index.php"><span class="glyphicon glyphicon-home"></span> Úvod</a>
			</li>
			<?php
			if ($prihlasen)
				{
					echo '
						<li>
							<a href="trh.php"><span class="glyphicon glyphicon-transfer"></span> Trh</a>
						</li>
						<li>
							<a href="crafting.php"><span class="fa fa-wrench"></span> Výroba</a>
						</li>
						<li>
							<a href="build.php"><span class="fa fa-cog fa-spin"></span> Stavba PC</a>
						</li>
						<li>
							<a href="research.php"><span class="glyphicon glyphicon-education"></span> Výskum</a>
						</li>
					';
				}
			?>
			<?php
			if ($prihlasen && $_SESSION['hrac'] == 1)
			{
				echo '<li>';
				echo '<a href="admin.php">ADMIN</a>';
				echo '</li>';
			}
			?>
		</ul>
		<?php
		if ($prihlasen) {
				include 'components/hrac_menu.php';
		}
		?>
	</div>
</nav>
