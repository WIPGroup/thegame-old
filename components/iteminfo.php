<?php
session_start();
include "../vlastnictvi.php";
if (isset($_GET['item'])){
  $dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['item'];
  $vysledek = mysql_query($dotaz) or die(mysql_error($db));
  $zaznam = mysql_fetch_array($vysledek);
  echo $zaznam['nazev'];
}
