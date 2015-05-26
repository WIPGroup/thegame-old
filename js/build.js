$(function(){
	$("select").change(function(){
		console.log('selectchange');
		disableRam();
	});
});