function reloadArray()
{
		$.ajax({
            url : "trhupdate/vlastnictvi.php",
            success : function (data) {
                $("#vlastnictvi").html(data);
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
 	$.get( "index.php", { trade: idnab } ).done(reloadEverything());
}
function reloadEverything(){
setTimeout(function(){
reloadKupovanie();
reloadPredavanie();
reloadArray();
},100);
}
$(reloadEverything);