/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*---------- Header Top ----------*/
    $('.a-wishlist').on("click", function () {
        $('.wishlist-popup').fadeToggle(300);
    });

    $(".body-offcanvas").mouseup(function (e)
    {
        var subject = $(".wishlist-popup");

        if (e.target.id != subject.attr('class') && !subject.has(e.target).length)
        {
            subject.fadeOut();
        }
    });




    $('.a-bag').on("click", function () {
        $('.bag-popup').fadeToggle(300);
    });

    $(".body-offcanvas").mouseup(function (e)
    {
        var subject = $(".bag-popup");

        if (e.target.id != subject.attr('class') && !subject.has(e.target).length)
        {
            subject.fadeOut();
        }
    });




    (function ($) {
        $(window).load(function () {
            $(".content").mCustomScrollbar();
        });
    })(jQuery);


    $('#sidebar').affix({
        offset: {
            top: 1000
        }
    });
    
    
    
    /*---------- Material js ----------*/
    $.material.init();