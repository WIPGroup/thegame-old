<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen)
{
	include 'components/index/jumbotron.php';
	echo '<div id="inventar" class="col-xs-3"></div>'; //TODO: full_inv.php
	include "components/kupony.php";
}
else
{
	include "components/form.php";
}
?>
<script src="js/index.js"></script>
</body>
</html>
