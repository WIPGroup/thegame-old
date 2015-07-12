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
	include 'components/footer.php';
}
else
	include 'components/form.php';
?>
<script src="js/build.js"></script>
</body>
</html>
