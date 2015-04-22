<?php
if ($_POST['hrac'] != '')
	echo "Špatné přihlašovací jmého/heslo.";
?>
<form action="index.php" method="POST">
	<label for="hrac">Tým:</label>
	<input type="text" name="hrac" id ="hrac"><br>
	<label for="heslo">Heslo:</label>
	<input type="password" name="heslo" id="heslo">
	<input type="submit" value="Prihlásiť">
</form>
