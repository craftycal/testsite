$(document).ready(function(){


	$('.message a').click(function(){
	   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});


	$('#back-to-feed').click(function() { 
    	document.location = 'feed.html';
	});


	$('#new-project-button').click(function() {
		$('.popup-form').toggle();
	});	


});