$(document).ready(function(){

// toggle login and regeister 
	// $('.message a').click(function(){
	//    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	// });

// close new project popup form
	$('#back-to-feed').click(function() { 
    	$('.popup-form').toggle();
	});

// open new project popup form
	$('#new-project-button').click(function() {
		$('.popup-form').toggle();
	});	

// show comment box
	$('#comment-form-controler').click(function() {
		$('#comment-form').slideToggle();
	});

});