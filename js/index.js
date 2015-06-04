function itemInfo(){
	$(".grid-item").click(function(){ //nefunguje, ani to nevi ze se klika, nutno asi prepsat pomoci nejake posrane isotope metoddy
	    var idveci = $(this).attr("data-idveci");
	    console.log('Id veci je '+idveci);
	    $.ajax({
			data: {item:idveci},
			type: "GET",
			url: "components/iteminfo.php",
			success: function(data) {
				$("#infoitemu").html(data);
			}
		});
	});
}
function initIsotope(){
	// init Isotope
	var $grid = $('.grid').isotope({
		itemSelector: '.grid-item',
	  layoutMode: 'packery',
		filter: function() {
			return qsRegex ? $(this).text().match( qsRegex ) : true;
		},
		getSortData: {
			name: '.name',
			power: '.power parseInt',
	    count: '.count parseInt',
    	tier: '[data-tier]',
			type: '[data-type]',
  	},
		sortAscending: {
    	name: true,
			power: false,
			count: false,
			tier: true,
			type: true
		},
		packery: {
  		gutter: 10
		}
	});
	// filter items on button click TODO vymazat vyhledavaci policko
	$('.filter-button-group').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});
	$('.sort-by-button-group').on( 'click', 'button', function() {
  	var sortByValue = $(this).attr('data-sort-by');
  	$grid.isotope({ sortBy: sortByValue });
	});
	var qsRegex;
	// use value of search field to filter
	var $quicksearch = $('.quicksearch').keyup( debounce( function() {
		qsRegex = new RegExp( $quicksearch.val(), 'gi' );
		$grid.isotope({filter: function() {return qsRegex ? $(this).text().match( qsRegex ) : true;},});}, 200 ) );

	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	var timeout;
	return function debounced() {
		if ( timeout ) {
			clearTimeout( timeout );
		}
		function delayed() {
			fn();
			timeout = null;
		}
		timeout = setTimeout( delayed, threshold || 100 );
	};
	}
	itemInfo();
		console.log('initIsotope');
}
function reloadFullInv(){
	$.ajax({
		url : "components/full_inv.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#fullinv").html(data);  //data se hodi do neceho s id inventar, easy
			initIsotope();
			console.log('reloadFullInv');
		}
	});
}
$(function() { //odeslani formulare s nabidkou
	$('#kuponyform').submit(function() {
		$.ajax({
			data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
			type: "GET",
			url: "components/redeem.php",
			success: function(data) {
				reloadFullInv(); //po odeslani se nacte interface
				swal(data);
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});
$(reloadFullInv());