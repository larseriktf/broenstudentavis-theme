// mail graphic animation -> on hover -> play until end by adding and removing a class

jQuery(document).ready(function($) {
    $(".header-tips-oss").bind("webkitAnimationEnd mozAnimationEnd animationend", function(){ $("#tips-oss-img").removeClass("mail-animation") })  
    $(".header-tips-oss").hover(function(){ $("#tips-oss-img").addClass("mail-animation"); })
});

