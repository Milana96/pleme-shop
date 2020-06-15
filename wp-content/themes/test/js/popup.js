jQuery(document).ready(function($) {
    

    $('.open-popup').on('click', function(e) {
        let id = $(this).data('id');
        $(id).show();
    });
    $('.close').on('click', function(e) {
        $(this).parent().hide();
    })
    
});