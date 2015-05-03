<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen){
	include "components/log.php";
} else {
	include "components/form.php";
}
?>
<script src="js/scripts.js"></script>

</body>
</html>

