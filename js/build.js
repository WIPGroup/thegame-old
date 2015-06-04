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
$(function(){
	reloadSestavy();
	disableRam();
	$("select").change(function(){
		console.log('selectchange');
		disableRam();
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
					location.reload();
				}
			}
		});
		return false;  //zastavi normalni submit, tj. zadny refresh
	});
});