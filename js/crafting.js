var timerExists = false;
function itemInfo(){
	$(".grid-craft-item").click(function(){ 
			var idveci = $(this).attr("data-idveci");
			$.ajax({
			data: {id:idveci},
			type: "GET",
			url: "components/getinfo.php",
			success: function(data) {
				$("#infoitemu").html(data);
			}
		});
	});
}
function craft(idreceptu){
	var kolikrat = $('input[data-idreceptu='+idreceptu+']').val();
	$.ajax({
		url : "components/craft.php",
		type : "GET",
		data : {craft:idreceptu,pocet:kolikrat},
		success : function (data) {
			reloadVyroba();
			if (data!==''){
				swal(data);
			}
		}
	});
}
function snizeniTimeru(){
	var aktualniCas; //deklarovani lokalni promenne aktualniCas, do ktere se uklada hodnota kazdeho timeru
	$('.casvyroby').each(function(){
		aktualniCas = $(this).html();
		if (aktualniCas > 0){
			$(this).html(parseInt(aktualniCas)-1); //snizeni hodnoty o 1
		} else {
			reloadVyroba();
			return false;
		}
	});
	$("div[role='progressbar']").each(function(){
		var zbyvajici = $(this).parents("tr").find(".casvyroby").html();
		var celkove = $(this).data('celkem');
		var sirka = (1-(zbyvajici/celkove))*100;
		$(this).css("width",sirka+"%");
	});
}
function reloadVyroba(){
	if (timerExists === true){ //ocharna pri prvnim loadnuti stranky
		clearInterval(seznamVyrobyReload); //nejdriv se zrusi puvodni interval aby to nedelalo problemy
		timerExists = false;
	}
	reloadInv();
	$.ajax({
		url : "components/seznamvyrob.php",
		success : function (data) {
			$("#seznamvyrob").html(data);        //da se to do seznamuvyrob
			console.log('reloadVyroba');
			$('.casvyroby').each(function(){
				if (parseInt($(this).html())<0){
					$(this).html('0');
				}
			});
			if (timerExists === true){ //ochrana kdyz uzivatel moc rychle klika
				clearInterval(seznamVyrobyReload);
				timerExists = false;
			}
			seznamVyrobyReload = setInterval(function(){snizeniTimeru();},1000);  //po nacteni se da timer
			timerExists = true;
		}
	});
}
$(function(){
	reloadVyroba();
	var $grid = $(".grid").isotope({
		itemSelector:".grid-craft-item",
		layoutMode:"packery",
		packery:{
			gutter:10
		},
		filter: function() {
			return qsRegex ? $(this).text().match( qsRegex ) : true;
		},
		getSortData: {
			name: '.craft-name',
			type: '[data-type]',
			tier: '[data-tier]'
		}
	});
	$('.filter-button-group').on( 'click', 'a', function() {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});
	$('.sort-by-button-group').on( 'click', 'a', function() {
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
});