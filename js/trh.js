var aktualniTab = 'main';
var slovencina = {
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
$(function() { //odeslani formulare s nabidkou
	$('#nabidka').submit(function() {
		$.ajax({
			data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
			type: "GET",
			url: "trh.php",
			success: function(data) {
				reloadEverything(); //po odeslani se znovu nacte interface
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});
$(reloadEverything()); //po nacteni stranky se nacte interface, easy enough
$(toggleTable(aktualniTab));