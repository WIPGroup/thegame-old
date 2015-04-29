<?php
if (isset($_GET['trade'])) {
	//uskutečnit obchod
	$dotaz = 'SELECT * FROM obchod WHERE idnab=' . $_GET['trade'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1) {
		//hrac kupuje
		if ($zaznam['smer'] == 'p' && $vlastnictvi[0] >= $zaznam['cena']) {
			$vlastnictvi[$zaznam['predmet']]+= $zaznam['mnozstvi'];
			$vlastnictvi[0]-= $zaznam['cena'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="' . join(';', $vlastnictvi) . '" WHERE idhrace="' . $_SESSION['hrac'] . '"';
			mysql_query($dotaz);
			//TODO:připsat získané vlastnictví autoru nabídky
			//$dotaz = 'DELETE FROM obchod WHERE idnab='.$_GET['trade'];
			//mysql_query($dotaz);

		}
		//hráč prodává
		else if ($zaznam['smer'] == 'k' && $vlastnictvi[$zaznam['predmet']] >= $zaznam['mnozstvi']) {
			$vlastnictvi[$zaznam['predmet']]-= $zaznam['mnozstvi'];
			$vlastnictvi[0]+= $zaznam['cena'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="' . join(';', $vlastnictvi) . '" WHERE idhrace="' . $_SESSION['hrac'] . '"';
			mysql_query($dotaz);
			//TODO:připsat získané vlastnictví autoru nabídky
			//$dotaz = 'DELETE FROM obchod WHERE idnab='.$_GET['trade'];
			//mysql_query($dotaz);

		} else echo "Obchod se nepovedl.";
	} else echo "Obchod se nepovedl.";
}
//TODO: začlenění nabídky do databáze
else if (isset($_GET['smer'])) {
	if ($_GET['smer'] == 'p') //prodej
	{
		if ($vlastnictvi[$_GET['predmet']] >= $_GET['mnozstvi']) {
			$vlastnictvi[$_GET['predmet']]-= $_GET['mnozstvi'];
			$dotaz = 'INSERT INTO obchod (hrac, predmet, mnozstvi, cena, smer) VALUES (' . $_SESSION['hrac'] . ', ' . $_GET['predmet'] . ', ' . $_GET['mnozstvi'] . ', ' . $_GET['cena'] . ', "p")';
			mysql_query($dotaz);
			$dotaz = 'UPDATE hraci SET vlastnictvi="' . join(';', $vlastnictvi) . '" WHERE idhrace="' . $_SESSION['hrac'] . '"';
			mysql_query($dotaz);
		}
	} else if ($_GET['smer'] == 'k') //pohledávka
	{
		if ($vlastnictvi[0] >= $_GET['cena']) {
			$vlastnictvi[0]-= $_GET['cena'];
			$dotaz = 'INSERT INTO obchod (hrac, predmet, mnozstvi, cena, smer) VALUES (' . $_SESSION['hrac'] . ', ' . $_GET['predmet'] . ', ' . $_GET['mnozstvi'] . ', ' . $_GET['cena'] . ', "k")';
			mysql_query($dotaz);
			$dotaz = 'UPDATE hraci SET vlastnictvi="' . join(';', $vlastnictvi) . '" WHERE idhrace="' . $_SESSION['hrac'] . '"';
			mysql_query($dotaz);
		}
	}
}
if (isset($_GET['drop'])) { //tlacitko zrušiť
	$dotaz = 'DELETE FROM obchod WHERE idnab=' . $_GET['drop'];
	mysql_query($dotaz);
}
?>
