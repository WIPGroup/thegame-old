<?php ob_start('ob_gzhandler'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>TheGame</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- jQuery -->
	<script  src="bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Rollbar JS -->
	<script  src="js/rollbar.js"></script>
	<!-- Pace v devu zakazan
	<link href="bower_components/pace/themes/green/pace-theme-corner-indicator.css" rel="stylesheet" />
	<script src="bower_components/pace/pace.min.js"></script>-->
	<!-- Offline -->
	<link href="bower_components/offline/themes/offline-theme-slide.css" rel="stylesheet" />
	<link href="bower_components/offline/themes/offline-language-english.css" rel="stylesheet" />
	<script  src="bower_components/offline/offline.min.js"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css"> bootstrap original theme-->
	<!-- Bootstrap spacelab theme -->
	<link rel="stylesheet" href="bower_components/bootswatch-dist/css/bootstrap.min.css">
	<script  src="bower_components/bootswatch-dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="bower_components/datatables/media/css/jquery.dataTables.min.css">
	<script  type="text/javascript" charset="utf8" src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<!-- SweetAlert -->
	<script  src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="bower_components/sweetalert/dist/sweetalert.css">
	<!-- Animate.css Zatim neni potreba FIX TODO
	<link rel="stylesheet" href="bower_components/animate.css/animate.min.css">-->
	<!-- The noUiSlider script and stylesheet -->
	<link href="bower_components/nouislider/distribute/jquery.nouislider.min.css" rel="stylesheet">
	<script  src="bower_components/nouislider/distribute/jquery.nouislider.all.min.js"></script>
	<!-- bootstrap-select -->
	<link href="bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<script  src="bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<!-- Isotope -->
	<script  src="bower_components\isotope\dist\isotope.pkgd.min.js"></script>
	<script  src="bower_components\isotope-packery\packery-mode.pkgd.min.js"></script>
	<!-- Nase veci -->
	<link rel="stylesheet" href="main.css">
	<link rel="shortcut icon" href="favicon.ico">
	<script  src="js/scripts.js"></script>
</head>
<body>
	<?php //Crash monitoring
	error_reporting(E_ALL);
	require_once 'rollbar.php';
	$config = array(
		'access_token' => '41a7de13241f499ab0849238a8b7b00e',
		'environment' => 'production',
		'root' => '/',
	);
	$config['environment'] = getcwd();
	Rollbar::init($config);
	?>

	<!-- Kdyby nahodou
	<script>
	$(function(){
	$( "li, td, button, input, select" ).mouseenter(function(){
	$(this).addClass("animated hinge");
}).mouseleave(function(){});
});
</script>
-->
