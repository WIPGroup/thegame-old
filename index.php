<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen)
{
	include 'components/index/jumbotron.php';
	echo '<div class="col-xs-3" id="fullinv">';
//	include "components/full_inv.php";
	echo '</div>';
	include "components/kupony.php";
}
else
{
	include "components/form.php";
}
?>
<iframe src="http://antre.417rct.org/master/report.html"></iframe>
<script src="js/index.js"></script>
</body>
</html>
