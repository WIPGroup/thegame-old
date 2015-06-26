<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen){
	include 'components/researchtree.php';
} else {
	include 'components/form.php';
}
?>
</body>
</html>
