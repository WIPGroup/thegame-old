<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen){
	include 'nakupovani.php';
} else {
	include 'components/form.php';
}
?>
<script src="js/trh.js"></script>
</body>
</html>
