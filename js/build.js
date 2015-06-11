function reloadSestavy(){
	$.ajax({
		url : "components/sestavy.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#sestavy").html(data);  //data se hodi do neceho s id inventar, easy
			console.log('reloadSestavy');
			$('.disass').click(function(){ 
				var idsestavy = $(this).data('idsestavy');
				disass(idsestavy);
				return false; 
			});
			$('.switch').click(function(){ 
				var idsestavy = $(this).data('idsestavy');
				zmenit(idsestavy);
				return false; 
			});
		}
	});
}
function reloadSkladaniSestav(){
	$.ajax({
		url : "components/sestavyformular.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#build").html(data);  //data se hodi do neceho s id inventar, easy
			disableUnavailable();
			console.log('reloadSkladaniSestav');
			$("select#mb").change(function(){
		        console.log('selectchange');
	    	    disableUnavailable();
	        });
		}
	});
}
function disass(idsestavy){
	console.log('ID sestavy, ktera se bude rusit, je '+idsestavy); //TODO potvrzovaci tlacitko
	$.ajax({
		url : "components/sestavit.php",
		type : "GET",
		data : {disass:idsestavy},
		success : function (data) {
			reloadSestavy();
			reloadSkladaniSestav();
			if (data!==''){
				swal(data);
			}
		}
	});
}
function zmenit(idsestavy){
	$.ajax({
		url : "components/sestavit.php",
		type : "GET",
		data : {switch:idsestavy},
		success : function (data) {
			reloadSestavy();
			if (data!==''){
				swal(data);
			}
		}
	});
}
function disableRAM(){
	var pocetram = $("#build #mb option:selected").data('ram');
	console.log('RAM k dispozici '+pocetram);
	$("select[id*=ram]").each(function(){
		$(this).prop("disabled",true);
	});
	for(i=1;i<=pocetram;i++){
		$("#ram"+i).prop("disabled",false);
	}
}
function disableHDD(){
	var pocethdd = $("#build #mb option:selected").data('hdd');
	console.log('HDD k dispozici '+pocethdd);
	$("select[id*=hdd]").each(function(){
		$(this).prop("disabled",true);
	});
	for(i=1;i<=pocethdd;i++){
		$("#hdd"+i).prop("disabled",false);
	}
}
function disablePCI(){
	var pocetpci = $("#build #mb option:selected").data('pci');
	console.log('PCI k dispozici '+pocetpci);
	$("select[id*=gpu]").each(function(){
		$(this).prop("disabled",true);
	});
	for(i=1;i<=pocetpci;i++){
		$("#gpu"+i).prop("disabled",false);
	}
}
function disableUnavailable(){
	disableRAM();
	disableHDD();
	disablePCI();
	$("#build select").selectpicker('refresh');
}
$(function(){
	reloadSestavy();
	reloadSkladaniSestav();
	$('#build').submit(function() {
		$.ajax({
			data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
			type: "GET",
			url: "components/sestavit.php",
			success: function(data) {
				var contains = data.indexOf('Složena sestava');
				if (contains==-1){
					swal(data);
				} else {
				//	location.reload();
					reloadSestavy();
					reloadSkladaniSestav();
					//TODO MAGICKY SWEETALERT WOOO POSTAVILS KOMP WOOOOOOOOOOOOOOOOOO 420 BLAZE IT
				}
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});