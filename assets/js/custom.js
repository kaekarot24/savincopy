jQuery(document).ready(function (){
    jQuery('.sorting_filter_icon a').on('click', function(){
        jQuery('.sorting_filter_inputbox').toggleClass('active_sidebar');      
        jQuery('.sorting_filter').toggleClass('box_slide');      
    });  

    jQuery('body').on("click touchstart", function(e) {
        if (!(jQuery(e.target).closest('.sorting_filter_inputbox, .sorting_filter_icon').length > 0)) {
            jQuery('.sorting_filter_inputbox').removeClass('active_sidebar');
            jQuery('.sorting_filter').removeClass('box_slide');  
        }
    });	
})