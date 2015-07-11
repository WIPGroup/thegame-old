<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen)
{
	include 'components/index/jumbotron.php';
	include 'components/kupony.php';
	echo '<div class="col-xs-12" id="fullinv">';
//	include "components/full_inv.php";
	echo '</div>';
}
else
{
	include 'components/form.php';
}
include 'components/poradie.php';
?>
<script src="js/index.js"></script>
</body>
</html>
