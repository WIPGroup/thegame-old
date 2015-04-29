<ul class="nav navbar-nav navbar-right" style="padding-right: 15px">
        <li><a href="https://gitlab.com/AntreTeam/TheGame">GitLab</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <?php
             $dotaz = 'SELECT jmeno FROM hraci WHERE idhrace='.$_SESSION['hrac'];
             $vysledek = mysql_query($dotaz) or die(mysql_error($db));
             $zaznam = mysql_fetch_array($vysledek);
             echo $zaznam['jmeno'];
          ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Profil</a></li>
            <li><a href="#">Trade History</a></li>
            <li><a href="#">Statistics</a></li>
            <li class="divider"></li>
            <li><a href="#"><form action="logout.php" class="navbar-form navbar-right"><button type="submit" class="btn btn-lg btn-danger btn-block">Odhlásiť</button></form></a></li>
          </ul>
        </li>
      </ul>
