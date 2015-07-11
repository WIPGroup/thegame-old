var aktualniTab = 'main';
var cestina = {
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
};
function toggleTable(n){ //prepinani mezi Vse a Moje nabidky
	aktualniTab=n; //v trh.js puvodne 'main'
	$("#nabidky>div").hide(); //schovani vsech divu
	$("#nabidky #"+aktualniTab+"container").show(); //ukaze se ten, ktery ma v nazvu parametr
	$("#trzistetabs>li").removeClass('active'); //spravny aktivni tab v navbaru
	$("#"+aktualniTab+"tab").addClass('active');
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
function reloadNabidky(){ //reload nabidek v trhu
	$.ajax({
		url : "components/nabidky.php",
		success : function (data) {
			$("#nabidky").html(data); //da se to do id nabidky
			toggleTable(aktualniTab); //prepne se na spravny tab
			trziste();                //opravi se celkove trziste (datatables,tooltipy,sweetalerts)
		}
	});
}
function reloadTrh(){
	reloadInv();
	reloadNabidky();
}
function trziste(){
	$('[data-toggle="tooltip"]').tooltip();
	$('.oteviranikoupeni').click(function(){ //sweetalerts
		var aktualniID = $(this).data('idnab');
		swal({
			title: "Si si istý?",
			text: "Pokračovaním kúpiš ponuku!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Nie, zavrieť",
			confirmButtonText: "Ano, potvrdzujem",
			closeOnConfirm: true
		},
		function(){
			obchodovanie(aktualniID);
		});
	});
	$('.oteviranizruseni').click(function(){
		var aktualniID = $(this).data('idnab');
		swal({
			title: "Si si istý?",
			text: "Pokračovaním bude ponuka zrušená!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Nie, zavrieť",
			confirmButtonText: "Ano, chcem zrušiť ponuku",
			closeOnConfirm: true
		},
		function(){
			cancel(aktualniID);
		});
	});
	$('#main').DataTable({language:cestina}); //todo Preklad
	$('#moje').DataTable({language:cestina}); //todo pagination pri reloadu
}
$(function() { //odeslani formulare s nabidkou
	$('#nabidka').submit(function() {
		$.ajax({
			data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
			type: "GET",
			url: "trade.php",
			success: function(data) {
				reloadTrh(); //po odeslani se nacte interface
				if (data!==''){
					swal(data);
				}
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});
$(reloadTrh()); //po nacteni stranky se nacte interface, easy
