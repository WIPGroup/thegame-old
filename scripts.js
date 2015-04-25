function reloadArray()
{
		$.ajax({
            url : "vlastnictvi.php",
            success : function (data) {
                $("#vlastnictvi").html(data);
            }
        });
}
function reloadPredaj()
{
        $.ajax({
            url : "predajcontent.php",
            success : function (data) {
                $("#predaj").html(data);
            }
        });
}
function reloadKupit()
{
        $.ajax({
            url : "kupitcontent.php",
            success : function (data) {
                $("#kupit").html(data);
            }
        });
}
function kupit(idnab){
 	$.get( "index.php", { trade: idnab } );
	reloadKupit();
	reloadPredaj();
	reloadArray();
}
function predaj(idnab){
 	$.get( "index.php", { trade: idnab } );
	reloadKupit();
	reloadPredaj();
	reloadArray();
}
$(reloadArray());
$(reloadPredaj());
$(reloadKupit());