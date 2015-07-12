<ul class="nav navbar-nav navbar-right" style="padding-right: 15px">
	<li>
		<?php include 'components/autorefresh.php'; ?>
	</li>
<!--	<li>
		<a class="navbar-link" id="gitlaba" href='https://ci.gitlab.com/projects/2263?ref=master'>
			<img id="gitlabimg" src='https://ci.gitlab.com/projects/2263/status.png?ref=master'/>
		</a>
		<a href="http://94.125.220.136:8111/viewType.html?buildTypeId=TheGame_Build&guest=1">
			<img src="http://94.125.220.136:8111/app/rest/builds/buildType:(id:TheGame_Build)/statusIcon"/>
		</a>
	</li>
	<li><a href="https://gitlab.com/AntreTeam/TheGame">GitLab</a></li>-->
	<li>
		<a href="profile.php" >
			<?php
			$dotaz = 'SELECT jmeno FROM hraci WHERE idhrace='.$_SESSION['hrac'];
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			$zaznam = mysql_fetch_array($vysledek);
			echo 'Používatel: '.$zaznam['jmeno'];
			?>
		</a>
	</li>
	<li>
		<form action="logout.php" class="navbar-form">
			<div style="text-align: center">
				<button type="submit" class="btn btn-warninig"><span class="glyphicon glyphicon-off"></span>Odhlásiť</button>
			</div>
		</form>
	</ul>
</li>
</ul>
<script>/*
$(function(){
	var pathurl = $(location).attr('pathname').split('/');
	var branch = pathurl[pathurl.length-2];
	$('#gitlaba').attr("href","https://ci.gitlab.com/projects/2263?ref="+branch);
	$('#gitlabimg').attr("src","https://ci.gitlab.com/projects/2263/status.png?ref="+branch+"&timestamp="+new Date().getTime());
	setInterval(function(){
		$('#gitlabimg').attr("src","https://ci.gitlab.com/projects/2263/status.png?ref="+branch+"&timestamp="+new Date().getTime());
	},10000);
});*/
</script>
