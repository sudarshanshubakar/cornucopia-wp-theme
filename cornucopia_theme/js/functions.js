$(document).ready(function(){
	$("#main").on('click',function() {
		$(".nav-menu").css('display','none');
	});	
	$("#my-navigation").on('click',function() {
		$(".nav-menu").attr('style','');
	});	
});
