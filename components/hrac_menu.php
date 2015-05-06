<ul class="nav navbar-nav navbar-right" style="padding-right: 15px">
	<li>
		<?php include 'components/autorefresh.php'; ?>
	</li>
	<li>
		<a class="navbar-link" href='https://ci.gitlab.com/projects/2263?ref=master'>
			<img src='https://ci.gitlab.com/projects/2263/status.png?ref=master'/>
		</a>
	</li>
	<li><a href="https://gitlab.com/AntreTeam/TheGame">GitLab</a></li>
	<li>
		<p>
			<?php
			$dotaz = 'SELECT jmeno FROM hraci WHERE idhrace='.$_SESSION['hrac'];
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			$zaznam = mysql_fetch_array($vysledek);
			echo $zaznam['jmeno'];
			?>
		</p>
	</li>
</li>
</ul>
