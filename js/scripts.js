function toggleTable(n){
	console.log('toggleTable na '+n);
	$("#nabidky>div").hide();
	$("#nabidky #"+n+"container").show();
	aktualniTab=n;
	$("#trzistetabs>li").removeClass('active');
	$("#"+aktualniTab+"tab").addClass('active');
}
function reloadInv(){                //obnoveni tabulky vlastnictvi
	$.ajax({
		url : "components/inventar.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#inventar").html(data);  //data se hodi do neceho s id vlastnictvi, easy
			console.log('reloadInv');
		}
	});
}
function reloadNabidky(){
	$.ajax({
		url : "components/nabidky.php",
		success : function (data) {
			$("#nabidky").html(data);
			toggleTable(aktualniTab);
			trziste();
			console.log('reloadNabidky');
		}
	});
}
function reloadVyroba(){
	reloadInv();
	$.ajax({
		url : "components/seznamvyrob.php",
		success : function (data) {
			$("#seznamvyrob").html(data);
			console.log('reloadVyroba');
		}
	});
}
function reloadTimer(){
	var aktualniCas;
	$('.casvyroby').each(function(){
		aktualniCas = $(this).html();
		if (aktualniCas > 0){
			$(this).html(parseInt(aktualniCas)-1);
		} else {
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
	$('.modal-backdrop.fade.in').hide();
	console.log('reloadTrh');
}
function trziste(){
    $('[data-toggle="tooltip"]').tooltip();
	$('#main').DataTable(); //todo Preklad
	$('#moje').DataTable();
	$('.oteviranikoupeni').click(function(){
		var aktualniID = $(this).data('idnab');
		console.log('ID tohoto trade je '+aktualniID);
		swal({   
			title: "Jsi si jistý?",
			text: "Pokračováním koupíš tuto nabídku!",
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
			text: "Pokračováním bude tvoje nabídka zrušena!",
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