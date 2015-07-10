/*
function getCookie(name){ //funkce pro ziskavani cookies podle nazvu
	var value = "; " + document.cookie;
	var parts = value.split("; " + name + "=");
	if (parts.length == 2) {
		return parts.pop().split(";").shift();
	} else {
		return 60000;
	}
}*/
function reloadInv(){                //obnoveni inventare
	$.ajax({
		url : "components/inventar.php", //vykona se to co je v url
		success : function (data) {  //prijdou zpatky nejake data
			$("#inventar").html(data);  //data se hodi do neceho s id inventar, easy
			console.log('reloadInv');
		}
	});
}
/*
function getRefreshes(){ //tato funkce na zaklade URL ziska funkci, kterou ma pro danou stranku vykonat AUTOREFRESH, tj reload Vsechno
	var pathurl = $(location).attr('pathname').split('/');
	switch(pathurl[pathurl.length-1]){
		case '': //Fallthrough
		case 'index.php':
			return reloadFullInv;
		case 'trh.php':
			return reloadTrh;
		case 'crafting.php':
			return reloadInv;
		case 'build.php':
			return reloadSestavy;
	}
}
function enableRefresh(){ //k funkcnosti autorefreshe
	console.log('enableRefresh');
	var automaticRefresh;  //promenna k setInterval
	$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','bold'); //prepnuti na spravny li od zacatku
	var currentRefreshes=getRefreshes(); //ziskani funkce pro danou stranku
	if (getCookie("aktualniInterval")>=1000){
		automaticRefresh=setInterval(currentRefreshes,getCookie("aktualniInterval")); //kdyz neni off, tak se nastavi interval
	}
	$('#refreshMenu li').click(function(){ //pri prepnuti intervalu
		$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','normal');
		document.cookie="aktualniInterval="+$(this).data('interval'); //nova susenka s intervalem
		$('li[data-interval="'+getCookie("aktualniInterval")+'"] a').css('font-weight','bold');
		clearInterval(automaticRefresh); //vypnuti puvodniho intervalu
		console.log('Klik na vyber '+getCookie("aktualniInterval"));
		if (getCookie("aktualniInterval")>0){
			automaticRefresh=setInterval(currentRefreshes,getCookie("aktualniInterval")); //pokud neni off, nastavi se interval
		}
	});
	$('#refreshButton').click(function(){
		console.log('klik na refreshButton');
		(currentRefreshes)(); //refresh tlacitko
	});
} */
function navbarActive(){
	var pathurl = $(location).attr('pathname').split('/');
	if (pathurl[pathurl.length-1] === ''){
		pathurl[pathurl.length-1] = 'index.php';
	}
	$('#main-nav li a[href="'+pathurl[pathurl.length-1]+'"]').closest("li").addClass("active");
}
//funkce ktere se maji spustit na kazde strance
$(function(){
	navbarActive();
//	enableRefresh();
	var infoitemu = $("#infoitemu");
	infoitemu.parents(':eq(2)').css('position','relative');
	$(window).scroll(function(){ 
		infoitemu.css('top', $(window).scrollTop());
	}).trigger('scroll');
});
