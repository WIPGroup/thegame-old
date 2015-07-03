<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen)
{
	include 'vlastnictvi.php';
	include 'components/stavba2.php';
}
else
	include 'components/form.php';
?>
<script src="js/build2.js"></script>
</body>
</html>
