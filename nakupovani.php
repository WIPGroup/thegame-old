<?php
//engine nakupování
include "vlastnictvi.php";
include "trade.php";
	$selectitems = '<option value="0">Peníze</option>'."\n";
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$selectitems .= '<option value="'.$zaznam['idveci'].'">'.$zaznam['nazev'].'</option>'."\n";
	}
?>
<div class="col-lg-3 hidden-xs hidden-sm hidden-md" style="position: fixed">
	<form id="nabidka">
		<div class="form-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Zadat objednávku:</h2>
				</div>
				<div class="panel-body">
					<table>
						<tr>
							<td>
								<div class="input-group panel panel-primary">
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
							</td>
							<td>
								<div class="input-group panel panel-primary">
									<div class="panel-heading">Prodam:</div>
									<div class="panel-body">
										<select name="chce" id="chce" class="form-control">
											<?php
												echo $selectitems;
											?>
										</select>
										<input type="number" name="mnozchce" id="mnozchce" min="1" max="1000" value="1" class="form-control" placeholder="Množstvo">
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<button type="submit" class="btn btn-primary btn-block">Odoslať</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</form>
	<div id="vlastnictvi">
	</div>
</div>
<span id="nabidky" class="col-lg-9 col-lg-offset-3"></span>
