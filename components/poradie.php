<?php
$cas = time();
$dotaz = 'SELECT * FROM sestavy';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	if ($zaznam['vyzkum'] == 0)
	{
		$dotaz = 'UPDATE hraci SET body=body+'.$zaznam['vykon'] * ($cas - $zaznam['sbercas']).' WHERE idhrace='.$zaznam['hrac'];
		mysql_query($dotaz);
	}
	else
	{
		$dotaz = 'UPDATE hraci SET vyzkum=vyzkum+'.$zaznam['vykon'] * ($cas - $zaznam['sbercas']).' WHERE idhrace='.$zaznam['hrac'];
		mysql_query($dotaz);
	}

	$dotaz = 'UPDATE sestavy SET sbercas='.$cas.' WHERE idsestavy='.$zaznam['idsestavy'];
	mysql_query($dotaz);
}
?>
<div class="col-xs-12 col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading" data-toggle="collapse" href="#poradie" style="cursor: pointer">
			<h1 class="panel-title">Poradie</h1>
		</div>
		<table id="poradie" class="table table-condensed table-hover table-bordered panel-collapse collapse in">
			<?php
			$dotaz = 'SELECT jmeno,body,vyzkum FROM hraci';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek)){
				if(($zaznam['jmeno']!='root') and ($zaznam['jmeno']!='Debug'))
					echo'<tr data-body="'.$zaznam['body'].'"><td class="cislo"></td><td class="por-cis">'.number_format($zaznam['body'], 0, '', ' ').'</td><td class="por-name">'.$zaznam['jmeno'].'</td>';
					if ($_SESSION['hrac'] == 1)
						echo '<td class="por-cis">'.number_format($zaznam['vyzkum'], 0, '', ' ').'</td>';
					echo '</tr>';
			}
			?>
		</table>
	</div>
</div>
