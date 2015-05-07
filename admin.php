<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen && $_SESSION['hrac'] == 1)
{
	include "admin/log.php";
	include "admin/kupony.php";
}
else
{
	echo "Tady nemáš co dělat.";
}
?>
</body>
</html>
