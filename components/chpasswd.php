<?php
if (isset($_POST['newpasswd']))
{
//jirvoz na tom pracuje
}
?>
<form action="profile.php" method="POST">
	<label>Nové heslo: <input type="password" name="newpasswd" id="newpasswd" class="form-control" placeholder="Nové heslo"></label>
	<label>Nové heslo ešče raz: <input type="password" name="newpasswd2" id="newpasswd2" class="form-control" placeholder="Nové heslo ešče raz"></label>
	<button type="submit" class="btn btn-primary btn-block">Změnit heslo</button>
</form>
