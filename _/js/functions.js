
	
 //PRELOADER
$(window).load(function() { // makes sure the whole site is loaded
	$('#status').fadeOut(); // will first fade out the loading animation
	$('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
	$('body').delay(350).css({'overflow':'visible'});
})



//SMOOTH SCROLLING
smoothScroll.init({	speed:500, // Integer. How fast to complete the scroll in milliseconds
easing: 'easeIn' // Easing pattern to use
});

//COUNTDOWN TIMER
$('#countdown').countdown({until: new Date(2015, 12-1, 1) , format: 'dHM'} ); // enter event day

//PHARALAX SCROLLING
$.stellar( {});
	
  