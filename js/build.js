$(function(){
	reloadSestavy();
	disableRam();
	$("select").change(function(){
		console.log('selectchange');
		disableRam();
	});
});