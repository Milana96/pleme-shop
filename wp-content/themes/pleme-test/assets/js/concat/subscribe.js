(function ($) {
    setTimeout(function() {
        $("#subscribe").css("display","block");
        $(".close-subscribe").css("display","block");
    }, 3000);

    $('.close-subscribe').click(function () {
        $("#subscribe").css("display","none");
        $(".close-subscribe").css("display","none");
    });
})(jQuery);
