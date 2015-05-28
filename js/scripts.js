function toggleTable(n){ //prepinani mezi Vse a Moje nabidky
	aktualniTab=n; //v trh.js puvodne 'main'
	console.log('toggleTable na '+aktualniTab);
	$("#nabidky>div").hide(); //schovani vsech divu
	$("#nabidky #"+aktualniTab+"container").show(); //ukaze se ten, ktery ma v nazvu parametr
	$("#trzistetabs>li").removeClass('active'); //spravny aktivni tab v navbaru
	$("#"+aktualniTab+"tab").addClass('active');
}/*
function getCookie(name){ //funkce pro ziskavani cookies podle nazvu
	var value = "; " + document.cookie;
	var parts = value.split("; " + name + "=");
	if (parts.length == 2) {
		return parts.pop().split(";").shift();
	} else {
		return 60000;
	}
}*/
function initIsotope(){
	// init Isotope
	var $grid = $('.grid').isotope({
		itemSelector: '.grid-item',
	  layoutMode: 'packery',
		getSortData: {
			name: '.name',
	    count: '.count parseInt',
    	tier: '[data-tier]',
  	}
	});
	// filter items on button click
	$('.filter-button-group').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});
	$('.sort-by-button-group').on( 'click', 'button', function() {
  	var sortByValue = $(this).attr('data-sort-by');
  	$grid.isotope({ sortBy: sortByValue });
	});
	console.log('initIsotope');
}
function reloadInv(){                //obnoveni inventare
	$.ajax({
		url : "components/inventar.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#inventar").html(data);  //data se hodi do neceho s id inventar, easy
			console.log('reloadInv');
		}
	});
}
function reloadNabidky(){ //reload nabidek v trhu
	$.ajax({
		url : "components/nabidky.php",
		success : function (data) {
			$("#nabidky").html(data); //da se to do id nabidky
			toggleTable(aktualniTab); //prepne se na spravny tab
			trziste();                //opravi se celkove trziste (datatables,tooltipy,sweetalerts)
			console.log('reloadNabidky');
		}
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
					console.log('oprava ze zaporne hodnoty na 0');
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
function obchodovanie(idnab){//pri kliknuti na cudlik koupit nebo prodat se posle get request na index.php s parametry trade=idnab, potom se reloadne interface
	$.ajax({
		url : "trade.php",
		type : "GET",
		data : {trade:idnab},
		success : function (data) {
			reloadTrh();
			if (data!==''){
				swal(data);
			}
		}
	});
}
function cancel(idnab){//to same jen cudlik Zrušiť
	$.ajax({
		url : "trade.php",
		type : "GET",
		data : {cancel:idnab},
		success : function (data) {
			reloadTrh();
			if (data!==''){
				swal(data);
			}
		}
	});
}
function craft(idreceptu){//TODO tlacitko by melo refreshovat i inventar na crafting.php
	var kolikrat = $('input[data-idreceptu='+idreceptu+']').val();
	console.log(kolikrat);
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
function reloadTrh(){
	reloadInv();
	reloadNabidky();
	console.log('reloadTrh');
}
function trziste(){
	$('[data-toggle="tooltip"]').tooltip();
	$('.oteviranikoupeni').click(function(){ //sweetalerts
		var aktualniID = $(this).data('idnab');
		console.log('ID tohoto trade je '+aktualniID);
		swal({
			title: "Jsi si jistý?",
			text: "Pokračováním koupíš tuto nabídku! ("+aktualniID+")",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Ne, zavřít",
			confirmButtonText: "Ano, chci koupit nabídku",
			closeOnConfirm: true
		},
		function(){
			obchodovanie(aktualniID);
		});
	});
	$('.oteviranizruseni').click(function(){
		var aktualniID = $(this).data('idnab');
		console.log('ID tohoto trade je '+aktualniID);
		swal({
			title: "Jsi si jistý?",
			text: "Pokračováním bude tvoje nabídka zrušena! ("+aktualniID+")",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Ne, zavřít",
			confirmButtonText: "Ano, chci zrušit nabídku",
			closeOnConfirm: true
		},
		function(){
			cancel(aktualniID);
		});
	});
	$('#main').DataTable(); //todo Preklad
	$('#moje').DataTable(); //todo pagination pri reloadu
	console.log('trziste');
}/*
function getRefreshes(){ //tato funkce na zaklade URL ziska funkci, kterou ma pro danou stranku vykonat AUTOREFRESH, tj reload Vsechno
	var pathurl = $(location).attr('pathname').split('/');
	switch(pathurl[pathurl.length-1]){
		case '': //Fallthrough
		case 'index.php':
			return reloadFullInv;
		case 'trh.php':
			return reloadTrh;
		case 'crafting.php':
			return reloadInv;
		case 'build.php':
			return reloadSestavy;
	}
}
function enableRefresh(){ //k funkcnosti autorefreshe
	console.log('enableRefresh');
	var automaticRefresh;  //promenna k setInterval
	$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','bold'); //prepnuti na spravny li od zacatku
	var currentRefreshes=getRefreshes(); //ziskani funkce pro danou stranku
	if (getCookie("aktualniInterval")>=1000){
		automaticRefresh=setInterval(currentRefreshes,getCookie("aktualniInterval")); //kdyz neni off, tak se nastavi interval
	}
	$('#refreshMenu li').click(function(){ //pri prepnuti intervalu
		$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','normal');
		document.cookie="aktualniInterval="+$(this).data('interval'); //nova susenka s intervalem
		$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','bold');
		clearInterval(automaticRefresh); //vypnuti puvodniho intervalu
		console.log('Klik na vyber '+getCookie("aktualniInterval"));
		if (getCookie("aktualniInterval")>0){
			automaticRefresh=setInterval(currentRefreshes,getCookie("aktualniInterval")); //pokud neni off, nastavi se interval
		}
	});
	$('#refreshButton').click(function(){
		console.log('klik na refreshButton');
		(currentRefreshes)(); //refresh tlacitko
	});
} */
function navbarActive(){
	var pathurl = $(location).attr('pathname').split('/');
	if (pathurl[pathurl.length-1] === ''){
		pathurl[pathurl.length-1] = 'index.php';
	}
	$('#main-nav li a[href="'+pathurl[pathurl.length-1]+'"]').closest("li").addClass("active");
}
function reloadSestavy(){
	$.ajax({
		url : "components/sestavy.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#sestavy").html(data);  //data se hodi do neceho s id inventar, easy
			console.log('reloadSestavy');
		}
	});
}
function disableRam(){
	var pocetram = $("#build #mb option:selected").data('ram');
	console.log(pocetram);
	$("select[id*=ram]").each(function(){
		$(this).prop("disabled",true);
	});
	for(i=1;i<=pocetram;i++){
		$("#ram"+i).prop("disabled",false);
	}
}
//funkce ktere se maji spustit na kazde strance
$(function(){
	navbarActive();
//	enableRefresh();
});
