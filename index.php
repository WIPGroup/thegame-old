<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen)
{
	include 'components/index/jumbotron.php';
	include 'components/poradie.php';
	include 'components/kupony.php';
	include 'components/body.php';
	echo '<div class="col-xs-12" id="fullinv">';
//	include "components/full_inv.php";
	echo '</div>';
	include 'components/loghrace.php';
	include 'components/footer.php';
}
else
{
	include 'components/form.php';
}
?>
<script src="js/index.js"></script>
</body>
</html>
