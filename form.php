<?php
if (isset($_POST['hrac'])) echo "Špatné přihlašovací jmého/heslo.";
?>
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
