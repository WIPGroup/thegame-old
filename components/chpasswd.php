<?php
if (isset($_POST['newpasswd']))
{
	if ($_POST['newpasswd'] == $_POST['newpasswd2'])
	{
		$dotaz = 'UPDATE hraci SET heslo="'.$_POST['newpasswd'].'" WHERE idhrace="'.$_SESSION['hrac'].'"';
		mysql_query($dotaz);
		echo "Heslo úspěšně změněno.";
	}
	else
		echo "Hesla se ti neshodují.";
}
?>
<form action="profile.php" method="POST">
	<label>Nové heslo: <input type="password" name="newpasswd" id="newpasswd" class="form-control" placeholder="Nové heslo"></label>
	<label>Nové heslo ešče raz: <input type="password" name="newpasswd2" id="newpasswd2" class="form-control" placeholder="Nové heslo ešče raz"></label>
	<button type="submit" class="btn btn-primary btn-block">Změnit heslo</button>
</form>
