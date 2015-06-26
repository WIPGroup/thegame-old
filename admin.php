<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen && $_SESSION['hrac'] == 1)
{
	include 'admin/kupony.php';
	include 'admin/log.php';
}
else
	include 'components/form.php';
?>
</body>
</html>
