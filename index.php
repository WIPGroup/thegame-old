<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<?php
		require "dblogin.php";
		require "login.php";
		if (isset($_GET['trade']) || isset($_GET[''])) {
				echo '<meta http-equiv="refresh" content="0; url=index.php">';
		}
		?>
		<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="scripts.js"></script>
	</head>
	<body style="background-color: #eee;padding-top: 70px">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="favicon.ico" style="display: inline"/>TheGame</a>
			</div>
			<div class="collapse navbar-collapse" id="main-nav">
				<ul class="nav navbar-nav">
					<li>
						<a class="navbar-link" href='https://ci.gitlab.com/projects/2263?ref=master'>
							<img src='https://ci.gitlab.com/projects/2263/status.png?ref=master'/>
						</a>
					</li>
					<li>
						<a class="navbar-link" href='https://ci.gitlab.com/projects/2263?ref=latest-working'>
							<img src='https://ci.gitlab.com/projects/2263/status.png?ref=latest-working' />
						</a>
					</li>
					<li>
						<li class="active"><a href="#">Trade</a></li>
					</li>
				</ul>
				<?php
				if ($prihlasen) {
						include "hrac_menu.php";
				}
				?>
			</div>
		</nav>
		<?php
		if ($prihlasen) {
				include "trh.php";
		} else {
				include "form.php";
		}
		?>
	</body>
</html>
