<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen){
	echo "Trade history setting a tak";
} else {
	include "components/form.php";
}
?>
</body>
</html>
