function reloadSestavy(){
	$.ajax({
		url : "components/sestavy.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#sestavy").html(data);  //data se hodi do neceho s id inventar, easy
			console.log('reloadSestavy');
		}
	});
}
function reloadSkladaniSestav(){
	$.ajax({
		url : "components/sestavyformular.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#build").html(data);  //data se hodi do neceho s id inventar, easy
			disableUnavailable();
			$("#build select").selectpicker('refresh');
			console.log('reloadSkladaniSestav');
		}
	});
}
function disableRam(){
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
	disableRam();
	disableHDD();
	disablePCI();
}
$(function(){
	reloadSestavy();
	reloadSkladaniSestav();
	$("select#mb").change(function(){
		console.log('selectchange');
		disableUnavailable();
	});
	$('#build').submit(function() {
		$.ajax({
			data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
			type: "GET",
			url: "components/sestavit.php",
			success: function(data) {
				if (data!==''){
					swal(data);
				} else {
				//	location.reload();
					reloadSestavy();
					reloadSkladaniSestav();
				}
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});