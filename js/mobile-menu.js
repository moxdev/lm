var show_mobile_menu = function() {
    if(jQuery('.mobile-menu').hasClass('toggled') ) {
        jQuery('.mobile-menu').removeClass('toggled');
    }else {
        jQuery('.mobile-menu').addClass('toggled');
    }
};

jQuery('.menu-toggle').on('click', show_mobile_menu);