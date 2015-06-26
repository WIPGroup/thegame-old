<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen)
{
	include 'vlastnictvi.php';
	include 'components/stavba.php';
}
else
	include 'components/form.php';
?>
<script src="js/build.js"></script>
</body>
</html>
