<?php
if ($_POST['hrac'] != '')
	echo "Špatné přihlašovací jmého/heslo.";
?>
<form action="index.php" method="POST">
	<label for="hrac">Tým:</label>
	<input type="text" name="hrac" id ="hrac"><br>
	<label for="heslo">Heslo:</label>
<<<<<<< HEAD
	<input type="password" name="heslo" id="heslo">
	<input type="submit" value="Přihlásit">
=======
	<input type="password" name="heslo">
	<input type="submit" value="Prihlásiť">
>>>>>>> c12eee2ef3bdd238031686f3a8674ca2ad84f91f
</form>
