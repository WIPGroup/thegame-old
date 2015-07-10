<div class="col-xs-12">
  <div class="col-xs-12 col-sm-4 col-md-6">
    <input type="text" class="quicksearch form-control" placeholder="Search" />
  </div>
  <div class="col-xs-12 col-sm-4 col-md-3 btn-group button-group sort-by-button-group">
    <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Poradie <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a data-sort-by="original-order">Pôvodný (ID)</a></li>
      <li><a data-sort-by="name">Meno</a></li>
<!--  <li><a data-sort-by="tier">Tier</a></li>-->
      <li><a data-sort-by="type">Typ</a></li>
    </ul>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-3 btn-group button-group filter-button-group">
    <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="glyphicon glyphicon-filter"></span> Filter <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a data-filter="*">Zobraziť všetko</a></li>
      <li><a data-filter=".cpu, .psu, .hdd, .gpu, .ram, .mb">Komponenty</a></li>
      <li><a data-filter=":not(.cpu, .psu, .hdd, .gpu, .ram, .mb)">Bez komponent(ov)</a></li>
      <li><a data-filter=".cpu">CPUs</a></li>
      <li><a data-filter=".psu">PSUs</a></li>
      <li><a data-filter=".hdd">HDDs</a></li>
      <li><a data-filter=".gpu">GPUs</a></li>
      <li><a data-filter=".ram">RAMs</a></li>
      <li><a data-filter=".mb">Motherboards</a></li>
      <!--li><a data-filter=".metal:not(.transition)">metal but not transition</a></li-->
    </ul>
  </div>
</div>
