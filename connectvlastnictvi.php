<?php
include "dblogin.php";
include "login.php";
$dotaz = 'SELECT * FROM hraci WHERE idhrace='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$hrac = mysql_fetch_array($vysledek);
$vlastnictvi = explode(';', $hrac['vlastnictvi']); //tento soubor slouzi k pripojeni k databazi a vytvoreni pole vlastnictvi
?>