<?php
$prihlasen = false;

if ($_SESSION['hrac'] != '')
{
	//heslo se bude možná později hashovat
	$dotaz = 'SELECT * FROM hraci WHERE jmeno="'.$_SESSION['hrac'].'" AND heslo="'.$_SESSION['heslo'].'"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	
	if (count($zaznam))
		$prihlasen = true;
}
else if (isset($_POST['hrac']))
{
	$dotaz = 'SELECT * FROM hraci WHERE jmeno="'.$_POST['hrac'].'" AND heslo="'.$_POST['heslo'].'"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	
	if (count($zaznam) > 1)
	{
		$_SESSION['hrac'] = $zaznam['idhrace'];
		$_SESSION['heslo'] = $zaznam['heslo'];
		$prihlasen = true;
	}
}
?>
