<?php
if (isset($_POST['hrac'])) echo '<div class="alert alert-danger alert-dismissable col-lg-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Nesprávne meno alebo heslo!</div>';
?>
<div class="login-panel panel panel-default col-lg-3 col-md-4 col-sm-6 col-xs-12 center">
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
