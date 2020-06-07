// more or less stolen from the internet
jQuery(document).ready(function($) {
    $(window).scroll(function(e) { 
        // remember to use correct class names for this to work
        var height = $('.site-header-top').height(); // dynamic height
        var navbar = $('.site-header-bottom');
        var isFixed = (navbar.css('position') == 'fixed');

        if ($(this).scrollTop() > height && !isFixed) {
            navbar.css({'position': 'fixed', 'top': '0px'}); 
        }
        if ($(this).scrollTop() < height && isFixed) {
            navbar.css({'position': 'static', 'top': '0px'}); 
        }
    });
});