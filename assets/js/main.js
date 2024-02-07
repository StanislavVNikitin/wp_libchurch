/*
jQuery(document).ready(function ($) {
    console.log('test')

    $(window).on('load', function () {
        /!*------------------
            Preloder
        --------------------*!/

        $(".loader").fadeOut();
        $("#preloder").delay(2000).fadeOut("slow");
    });
});
*/

jQuery(document).ready(function ($) {


    /*------------------
        Navigation
    --------------------*/
    $('.nav-switch').on('click', function (event) {
        $('.main-menu').slideToggle(400);
        event.preventDefault();
    });


    /*------------------
        Background set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });


    /*------------------
        Counter
    --------------------*/
    $(".counter").countdown("2018/07/01", function (event) {
        $(this).html(event.strftime("<div class='counter-item'><h4>%D</h4>Days</div>" + "<div class='counter-item'><h4>%H</h4>hours</div>" + "<div class='counter-item'><h4>%M</h4>Mins</div>" + "<div class='counter-item'><h4>%S</h4>secs</div>"));
    });

});

