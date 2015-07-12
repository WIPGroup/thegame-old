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
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading" >
			<h1 class="panel-title">Zmena hesla</h1>
		</div>
		<div class="panel-body">
			<form class="form-inline" action="profile.php" method="POST">
				<input type="password" name="newpasswd" id="newpasswd" class="form-control" placeholder="Nové heslo">
				<input type="password" name="newpasswd2" id="newpasswd2" class="form-control" placeholder="Nové heslo ešče raz">
				<button type="submit" class="btn btn-primary">Zmeniť heslo</button>
			</form>
		</div>
	</div>
</div>
