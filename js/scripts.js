function toggleTable(n){
	console.log(n);
	$("#nabidky>div").hide();
	$("#nabidky #"+n+"container").show();
	aktualniTab=n;
	$("#trzistetabs li").removeClass('active');
	$(#+"aktualniTab"+"tab")
}
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
			toggleTable(aktualniTab);
			fixTrziste();
			console.log('reloadNabidky');
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
		console.log('reloadEverything');
	},100);
}
function fixTrziste(){
	$('#main').DataTable({
		"language": slovencina
	});
	$('#t1').DataTable({
		"language": slovencina
	});
	$('#t2').DataTable({
		"language": slovencina
	});
	$('#t3').DataTable({
		"language": slovencina
	});
	$('#moje').DataTable({
		"language": slovencina
	});
	$('.oteviranikoupeni').click(function(){
		var aktualniid = $(this).data('idnab');
		console.log(aktualniid);
		console.log('kliknuti');
		$('.potvrzenikoupeni').click(function(){
			obchodovanie(aktualniid);
		});
	});
	$('.oteviranizruseni').click(function(){
		var aktualniid = $(this).data('idnab');
		console.log(aktualniid);
		console.log('kliknuti');
		$('.potvrzenizruseni').click(function(){
			cancel(aktualniid);
		});
	});
	$('[data-toggle="tooltip"]').tooltip();
	console.log('fixTrziste');
}