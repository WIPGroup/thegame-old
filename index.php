<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen){
	echo "Souhrn, vlastnictví, oznámení a jiné kraviny...";
	echo "<div id=\"inventar\"></div>";
	//include "trh.php";
} else {
	include "components/form.php";
}
?>
<script src="js/index.js"></script>
</body>
</html>


