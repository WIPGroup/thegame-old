<ul class="nav navbar-nav navbar-right">
  <li class="dropdown">
    <ul class="dropdown-menu" role="menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <?php
          echo 'Username'; //TODO: PHP magick
        ?>
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Profil</a></li>
        <li><a href="#">Recent trades</a></li>
        <li><a href="#">Something other</a></li>
        <li class="divider"></li>
        <li><form action="logout.php" class="navbar-form navbar-right"><button type="submit" class="btn btn-lg btn-danger btn-block">Odhlásiť</button></form></li>
  </ul>
    </ul>
  </li>
</ul>
