jQuery(document).ready(function($) {
    
    
    let btn = $('#nav-toggle-waffle');

    btn.click(function() {
        // toggle class
        let className = "nav-clicked";

        if (btn.hasClass(className)) {
            btn.removeClass(className);
        } else {
            btn.addClass(className);
        }

        // toggle nav-bar
        $('#header-nav-tablet').toggle();
    });
});
