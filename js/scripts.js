function toggleTable(n){ //prepinani mezi Vse a Moje nabidky
	aktualniTab=n; //v trh.js puvodne 'main'
	console.log('toggleTable na '+aktualniTab);
	$("#nabidky>div").hide(); //schovani vsech divu
	$("#nabidky #"+aktualniTab+"container").show(); //ukaze se ten, ktery ma v nazvu parametr
	$("#trzistetabs>li").removeClass('active'); //spravny aktivni tab v navbaru
	$("#"+aktualniTab+"tab").addClass('active');
}
function getCookie(name){ //funkce pro ziskavani cookies podle nazvu
	var value = "; " + document.cookie;
	var parts = value.split("; " + name + "=");
	if (parts.length == 2) {
		return parts.pop().split(";").shift();
	} else {
		return 0;
	};
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
	reloadInv();
	clearInterval(seznamVyrobyRefresh);
	$.ajax({
		url : "components/seznamvyrob.php",
		success : function (data) {
			$("#seznamvyrob").html(data);        //da se to do seznamuvyrob
			console.log('reloadVyroba');
			seznamVyrobyRefresh = setInterval(function(){snizeniTimeru()},1000);  //po nacteni se da timer
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
			clearInterval(seznamVyrobyRefresh); 
			console.log('clearIntervalusnizeniTimeru');
			reloadVyroba();
			return false;
		}
	});
}
function obchodovanie(idnab){
	$.get( "trh.php", { trade: idnab } ).done(reloadTrh());  //pri kliknuti na cudlik koupit nebo prodat se posle get request na index.php s parametry trade=idnab, potom se reloadne interface
}
function cancel(idnab){
	$.get( "trh.php", { cancel: idnab } ).done(reloadTrh()); //to same jen cudlik Zrušiť
}
function craft(idreceptu){
	$.get( "components/craft.php", { craft: idreceptu } ).done(reloadVyroba()); //TODO tlacitko by melo refreshovat i inventar na crafting.php
}
function reloadTrh(){ 
	reloadNabidky();
	reloadInv();
	console.log('reloadTrh');
}
function trziste(){
    $('[data-toggle="tooltip"]').tooltip();
	$('#main').DataTable(); //todo Preklad
	$('#moje').DataTable();
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
			closeOnConfirm: false 
			},
			function(){
				swal("Koupeno!", "Úspěšně jsi koupil něco.", "success"); 
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
			closeOnConfirm: false 
			},
			function(){
				swal("Smazáno!", "Vaše nabídka byla úspěšně zrušena.", "success"); 
				cancel(aktualniID);
			});
	});
	console.log('trziste');
}
function getRefreshes(){ //tato funkce na zaklade URL ziska funkci, kterou ma pro danou stranku vykonat, tj reload Vsechno
	switch($(location).attr('pathname').split('/')[2]){
		case 'index.php':
			return reloadInv;
			break;
		case '':
			return reloadInv;
			break;
		case 'trh.php':
			return reloadTrh;
			break;
		case 'crafting.php':
			return reloadVyroba;
			break;
	};
}
function enableRefresh(){ //k funkcnosti autorefreshe
	console.log('enableRefresh');
	var automaticRefresh;  //promenna k setInterval
	$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','bold'); //prepnuti na spravny li od zacatku
	var currentRefreshes=getRefreshes(); //ziskani funkce pro danou stranku
	if (getCookie("aktualniInterval")>0){
		automaticRefresh=setInterval(currentRefreshes,getCookie("aktualniInterval")); //kdyz neni off, tak se nastavi interval
	};
	$('#refreshMenu li').click(function(){ //pri prepnuti intervalu
		$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','normal');
		document.cookie="aktualniInterval="+$(this).data('interval'); //nova susenka s intervalem
		$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','bold');
		clearInterval(automaticRefresh); //vypnuti puvodniho intervalu
		console.log('Klik na vyber '+getCookie("aktualniInterval"));
		if (getCookie("aktualniInterval")>0){
			automaticRefresh=setInterval(currentRefreshes,getCookie("aktualniInterval")); //pokud neni off, nastavi se interval
		};
	});
	$('#refreshButton').click(function(){
		console.log('klik na refreshButton');
		(currentRefreshes)(); //refresh tlacitko
	});
}