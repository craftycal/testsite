$(document).ready(function(){


	$('.message a').click(function(){
	   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});

	$('#new-project-button').click(function() { 
   		document.location = 'newProject.html';
    });

	$('#back-to-feed').click(function() { 
    	document.location = 'feed.html';
	});

});