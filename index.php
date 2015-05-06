<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen)
{
	include 'components/Index/jumbotron.php';
	echo '<div id="inventar"></div>';
	include "components/redeem.php";
}
else
{
	include "components/form.php";
}
?>
<script src="js/index.js"></script>
</body>
</html>
