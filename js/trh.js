var aktualniTab = 'main';
$(function() { //odeslani formulare s nabidkou
	$('#nabidka').submit(function() {
		$.ajax({
			data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
			type: "GET",
			url: "trade.php",
			success: function(data) {
				reloadTrh(); //po odeslani se nacte interface
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});
$((getRefreshes())()); //po nacteni stranky se nacte interface, easy 
$(enableRefresh());