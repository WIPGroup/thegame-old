function reloadInv()                //obnoveni tabulky vlastnictvi
{
	$.ajax({
		url : "components/inventar.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#inventar").html(data);  //data se hodi do neceho s id vlastnictvi, easy
		}
	});
}
function reloadNabidky()
{
	$.ajax({
		url : "components/nabidky.php",
		success : function (data) {
			$("#nabidky").html(data);
			fixTrziste();
			toggleTable(aktualniTab);
		}
	});
}
function obchodovanie(idnab){
	$.get( "trh.php", { trade: idnab } ).done(reloadEverything());  //pri kliknuti na cudlik koupit nebo prodat se posle get request na index.php s parametry trade=idnab, potom se reloadne interface
}
function cancel(idnab){
	$.get( "trh.php", { cancel: idnab } ).done(reloadEverything()); //to same jen cudlik Zrušiť
}
function reloadEverything(){  //reloadnuti interface s delayem 100ms kvuli rychlosti zpracovani pozadavku
	setTimeout(function(){
		reloadNabidky();
		reloadInv();
	},100);
}
function fixTrziste(){
	$('#main').DataTable({
		"language": {
			"sEmptyTable":     "Nie sú k dispozícii žiadne dáta",
			"sInfo":           "Záznamy _START_ až _END_ z celkom _TOTAL_",
			"sInfoEmpty":      "Záznamy 0 až 0 z celkom 0 ",
			"sInfoFiltered":   "(vyfiltrované spomedzi _MAX_ záznamov)",
			"sInfoPostFix":    "",
			"sInfoThousands":  ",",
			"sLengthMenu":     "Zobraz _MENU_ záznamov",
			"sLoadingRecords": "Načítavam...",
			"sProcessing":     "Spracúvam...",
			"sSearch":         "Hľadať:",
			"sZeroRecords":    "Nenašli sa žiadne vyhovujúce záznamy",
			"oPaginate": {
				"sFirst":    "Prvá",
				"sLast":     "Posledná",
				"sNext":     "Nasledujúca",
				"sPrevious": "Predchádzajúca"
			},
			"oAria": {
				"sSortAscending":  ": aktivujte na zoradenie stĺpca vzostupne",
				"sSortDescending": ": aktivujte na zoradenie stĺpca zostupne"
			}
		}
	});
	$('.oteviranikoupeni').click(function(){
		var aktualniid = $(this).data('idnab');
		console.log(aktualniid);
		$('.potvrzenikoupeni').click(function(){
			obchodovanie(aktualniid);
		});
	});
	$('.oteviranizruseni').click(function(){
		var aktualniid = $(this).data('idnab');
		console.log(aktualniid);
		$('.potvrzenizruseni').click(function(){
			cancel(aktualniid);
		});
	});
	$('[data-toggle="tooltip"]').tooltip();
}
function toggleTable(n){
	$("#nabidky table").hide();
	$("#nabidky #"+n).show();
	aktualniTab=n;
}