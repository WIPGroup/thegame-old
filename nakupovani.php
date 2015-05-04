<?php
//engine nakupování
include "vlastnictvi.php";
include "trade.php";
$selectitems = '';
$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$selectitems .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].'</option>'."\n";
}
?>
<div class="col-lg-4 col-md-6 col-sm-8 col-xs-12" id="inventar">
</div>
<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
	<form id="nabidka">
		<div class="form-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Zadat objednávku:</h2>
				</div>
				<div class="panel-body">
					<div class="input-group panel panel-primary col-lg-6 col-md-6 col-sm-12 col-xs-12" style="float: left">
						<div class="panel-heading">Nabízím:</div>
						<div class="panel-body">
							<select name="nabizi" id="nabizi" class="form-control">
								<?php
								echo $selectitems;
								?>
							</select>
							<input type="number" name="mnoznabizi" id="mnoznabizi" min="1" max="1000" value="1" class="form-control" placeholder="Množstvo">
						</div>
					</div>
					<div class="input-group panel panel-primary col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="panel-heading">Hledám:</div>
						<div class="panel-body">
							<select name="chce" id="chce" class="form-control">
								<?php
								echo $selectitems;
								?>
							</select>
							<input type="number" name="mnozchce" id="mnozchce" min="1" max="1000" value="1" class="form-control" placeholder="Množstvo">
						</div>
					</div>
					<button type="submit" class="btn btn-default btn-block">Odoslať</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-default" id="trziste">
		<div class="panel-heading">
			<h2 class="panel-title">Tržiště:</h2>
		</div>
		<ul class="nav nav-tabs">
			<li role="presentation" onClick="reloadEverything();" class="active"><a href="#">Vše</a></li> <!--TODO: kazdemu tabu funkci JS prepnuti divu uvnitr spanu nabidky -->
			<li role="presentation" onClick="reloadEverything();" ><a href="#">T1-Suroviny</a></li>
			<li role="presentation" onClick="reloadEverything();" ><a href="#">T2-Součástky</a></li>
			<li role="presentation" onClick="reloadEverything();" ><a href="#">T3-Komponenty</a></li>
			<li role="presentation" onClick="reloadEverything();" ><a href="#">Moje nabídky</a></li>
		</ul>
		<div class="panel-body">
			<span id="nabidky"></span>
		</div>
	</div>
</div>
