jQuery(document).ready(function(){
    jQuery("#menu-toggle").click(function(e){
        e.preventDefault();
        jQuery("#wrapper").toggleClass("toggled");
        jQuery('.sider_bar_parent').removeClass('back_to_hide');
        jQuery('.zeynep').toggleClass('active_sidebar');
    });    

	jQuery('#menu-toggle').click(function(){
		jQuery(this).toggleClass('open');
	});    
    
    jQuery('body').on("click touchstart", function(e) {
        if (!(jQuery(e.target).closest('.hamburger_toggle, .zeynep ul').length > 0)) {
            jQuery('.sider_bar_parent').addClass('back_to_hide');
            jQuery('#menu-toggle').removeClass('open');
            jQuery('#wrapper').removeClass('toggled');
            jQuery('.zeynep').removeClass('active_sidebar');
        }
    });	

    jQuery(".zeynep > ul").css("height", $(window).height());

});

jQuery(window).resize(function(){
    jQuery('body').on("click touchstart", function(e) {
        if (!(jQuery(e.target).closest('.hamburger_toggle, .zeynep ul').length > 0)) {
            jQuery('.sider_bar_parent').addClass('back_to_hide');
            jQuery('#menu-toggle').removeClass('open');
            jQuery('#wrapper').removeClass('toggled');
            jQuery('.zeynep').removeClass('active_sidebar');
        }
    });	

    jQuery(".zeynep > ul").css("height", $(window).height()); 
});