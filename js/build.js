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
});