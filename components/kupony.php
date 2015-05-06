<?php
//TODO: nacpat do ajaxu
include "components/redeem.php";
?>
<div class="col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">Uplatnění surovinného kupónu</h1>
    </div>
    <div class="panel-body" style="width: 100%; heigth: 100%">
      <form class="form-inline">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Kód kupónu:</div>
            <input type="text" name="kupon" id="kupon" class="form-control" id="exampleInputAmount" placeholder="XXXXXXXX" maxlength="8">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Uplatnit kupón</button>
      </form>
    </div>
  </div>
</div>
