// HEADER (do not use on App Sites)
window.onscroll = function() {stickyFunction()};
function stickyFunction() {
	if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
		document.getElementById("main-nav").className = "sticky";
	} else {
		document.getElementById("main-nav").className = " ";
	}
}

// MENU
jQuery( function ( $ ) {
  // Focus styles for menus when using keyboard navigation

  // Properly update the ARIA states on focus (keyboard) and mouse over events
  $( '[role="menubar"]' ).on( 'keypress mouseenter.aria', '[aria-haspopup="true"]', function ( ev ) {
    $( ev.currentTarget ).attr( 'aria-expanded', true );
  } );

  // Properly update the ARIA states on blur (keyboard) and mouse out events
  $( '[role="menubar"]' ).on( 'mouseleave.aria', '[aria-haspopup="true"]', function ( ev ) {
    $( ev.currentTarget ).attr( 'aria-expanded', false );
  } );

  // Properly update the ARIA states on blur (keyboard) and mouse out events
  $( '[role="menubar"]' ).on( 'click', '[aria-haspopup="true"]', function ( ev ) {
    $( ev.currentTarget ).toggleClass( "opened" );
  } );

} );



// HAMBURBER MENU 
function menuFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
}

// Close Alert
function closeAlert() {
document.getElementById("alert").style.display = "none";
}

////////////////// OPTIONAL CODE //////////////////

// On Scroll
jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
$( document ).ready(function() {
	new WOW().init();
});
});

