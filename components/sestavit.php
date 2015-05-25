<?php
if (isset($_GET['mb']))
{
	require "vlastnictvi.php";
	//TODO: získat údaje o desce
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['mb'].' AND typ="mb"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		$sloty = explode(';', $zaznam['sloty']);
		//TODO: ověřit kompatibilitu komponent
		//TODO: poskládat hráči sestavu
		//TODO: odebrat hráči majetek
	}
	else
		echo 'Neexistující základní deska.';
}
?>
