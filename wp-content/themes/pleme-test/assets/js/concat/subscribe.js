(function ($) {
    setTimeout(function() {
        $("#subscribe").css("display","block");
    }, 3000);

    $('#subscribe').before().click(function () {
        $("#subscribe").css("display","none");
    });
})(jQuery);
