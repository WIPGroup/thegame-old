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
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">Test results for master</h1>
		</div>
		<div class="panel-body">
			<iframe style="width: 100%; height: 1000px" src="http://antre.417rct.org/master/report.html"></iframe>
		</div>
	</div>
</div>
<script src="js/index.js"></script>
</body>
</html>
