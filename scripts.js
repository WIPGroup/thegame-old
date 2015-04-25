function reloadArray()                //obnoveni tabulky vlastnictvi
{
		$.ajax({
            url : "trhupdate/vlastnictvi.php", //vykona se to co je v url
            success : function (data) {  //prijdou zpatky nejake data
                $("#vlastnictvi").html(data);  //data se hodi do neceho s id vlastnictvi, easy
            }
        });
}
function reloadPredavanie()
{
        $.ajax({
            url : "trhupdate/predavanie.php",
            success : function (data) {
                $("#predavanie").html(data);
            }
        });
}
function reloadKupovanie()
{
        $.ajax({
            url : "trhupdate/kupovanie.php",
            success : function (data) {
                $("#kupovanie").html(data);
            }
        });
}
function obchodovanie(idnab){
 	$.get( "index.php", { trade: idnab } ).done(reloadEverything());  //pri kliknuti na cudlik koupit nebo prodat se posle get request na index.php s parametry trade=idnab, potom se reloadne interface
}
function drop(idnab){
 	$.get( "index.php", { drop: idnab } ).done(reloadEverything()); //to same jen cudlik Zrušiť
}
function reloadEverything(){  //reloadnuti interface s delayem 100ms kvuli rychlosti zpracovani pozadavku
setTimeout(function(){
reloadKupovanie();
reloadPredavanie();
reloadArray();
},100);
}
$(function() { //odeslani formulare s nabidkou
        $('#nabidka').submit(function() { 
            $.ajax({ 
                data: $(this).serialize(), //odesle se to co je vybrane jako klasicka get metoda, vybrane hodnoty se prevedou na tentyz string, jako kdyby to byl normalni submit
                type: "GET", 
                url: "index.php", 
                success: function(data) { 
					reloadEverything(); //po odeslani se znovu nacte interface
                }
            });
        return false;  //zastavi normalni submit, tj. zadny refresh
    });
});
$(reloadEverything); //po nacteni stranky se nacte interface, easy enough