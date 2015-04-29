<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <?php
    require "dblogin.php";
    require "login.php";
    if (isset($_GET['trade']) || isset($_GET[''])) {
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    }
    ?>
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
  </head>
  <body style="background-color: #eee;padding-top: 70px">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <img src="favicon.ico">
          TheGame
        </a>
      </div>
      <ul class="nav navbar-nav">
      <li><a class="navbar-link" href='https://ci.gitlab.com/projects/2263?ref=master'><img src='https://ci.gitlab.com/projects/2263/status.png?ref=master' /></a></li>
      <li><a class="navbar-link" href='https://ci.gitlab.com/projects/2263?ref=latest-working'><img src='https://ci.gitlab.com/projects/2263/status.png?ref=latest-working' /></a></li></ul>
        <?php
        if ($prihlasen) {
            echo '<ul class="nav navbar-nav navbar-right"><li><form action="logout.php" class="navbar-form navbar-right"><button type="submit" class="btn btn-lg btn-danger btn-block">Odhlásiť</button></form></li>';
        }
        ?>
      <li><p class="navbar-text navbar-right">Prihlásený ako (user)</p></li></ul><!--TODO: PHP magic-->
    </nav>
    <?php
    if ($prihlasen) {
        include "trh.php";
    } else {
        include "form.php";
    }
    ?>
  </body>
</html>
