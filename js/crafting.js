var timerExists = false;
function craft(idreceptu){
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
$(reloadVyroba());