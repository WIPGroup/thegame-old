<?php
//TODO: předělat na ajax
include "admin/tvorbakuponu.php";
?>
<!-- form na tvorbu kuponů -->
<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Tvorba kuponů/poukázek</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%; text-align:left;">
			<form action="admin.php" method="GET">
				<?php
				$dotaz = 'SELECT * FROM veci';
				$vysledek = mysql_query($dotaz) or die(mysql_error($db));
				while ($zaznam = mysql_fetch_array($vysledek))
				{
					//TODO: html/css guru: mozna by to chtelo inline
					echo '<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"><div class="form-group"><label><img id="item-sm" src="icons/'.$zaznam['nazev'].'.png"></img> '.$zaznam['nazev'].'<input type="number" name="'.$zaznam['idveci'].'" id="'.$zaznam['idveci'].'" min="0" max="10000" value="0" class="form-control" placeholder="'.$zaznam['nazev'].'"></label></div></div>';
				}
				?>
				<button type="submit" class="btn btn-primary btn-block">Vytvořit</button>
			</form>
		</div>
	</div>
</div>
<!-- seznam kuponů -->
<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Seznam kuponů/poukázek</h1>
		</div>
		<div class="panel-body" style="width: 100%; heigth: 100%; text-align:left;">
			<?php
			include "vlastnictvi.php";
			$dotaz = 'SELECT * FROM kupony';
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			while ($zaznam = mysql_fetch_array($vysledek))
			{
				//TODO: hrml/css guru: nějak hezky to pozarovnávat (víc na 1 řádek)
				//TODO: php: mozna by nebylo na skodu davat to do tabulky, dej sem while ktery to projde
				echo $zaznam['kod'].': '.$zaznam['obsah'].'<br>';
			}
			?>
		</div>
	</div>
</div>
