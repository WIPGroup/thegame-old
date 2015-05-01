<?php
if (isset($_POST['hrac'])) echo '<div class="alert alert-danger alert-dismissable col-lg-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Nesprávne meno alebo heslo!</div>';
?>
<!--
<div style="width:300px;margin-left: auto;margin-right: auto;">
<form action="index.php" method="POST" class="form-signin">
	<h2 class="form-signin-heading">Prosím, prihlásťe sa</h2>
	<label for="hrac" class="sr-only">Hráč:</label>
	<input type="text" name="hrac" id="hrac" class="form-control" placeholder="Hráč" required autofocus><br>
	<label for="heslo" class="sr-only">Heslo:</label>
	<input type="password" name="heslo" id="heslo" class="form-control" placeholder="Heslo" required>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Prihlásiť</button>
</form>
</div>
-->
<div class="login-panel panel panel-default col-lg-2 col-lg-offset-5">
	<div class="panel-heading">
		<h2 class="panel-title">Prosím, prihlásťe sa</h2>
	</div>
	<div class="panel-body">
		<form role="form" action="index.php" method="POST" class="form-signin">
			<fieldset>
				<div class="form-group">
					<input class="form-control" placeholder="Hráč" name="hrac" id="hrac" type="text" autofocus required>
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Heslo" name="heslo" id="heslo" type="password" required>
				</div>
				<button type="submit" class="btn btn-lg btn-success btn-block">Prihlásiť</button>
			</fieldset>
		</form>
	</div>
</div>
