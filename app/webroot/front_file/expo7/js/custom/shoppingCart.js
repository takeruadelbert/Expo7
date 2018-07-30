$(document).ready(function () {

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


    $('input[type="radio"]').click(function () {
        if ($(this).attr('class') == 'radio-metode-1') {
            $('.show-metode-1').fadeIn(300);
        }

        else {
            $('.show-metode-1').hide();
        }
    });

    $('input[type="radio"]').click(function () {
        if ($(this).attr('class') == 'radio-metode-2') {
            $('.show-metode-2').fadeIn(300);
        }

        else {
            $('.show-metode-2').hide();
        }
    });

    $('input[type="radio"]').click(function () {
        if ($(this).attr('class') == 'radio-metode-3') {
            $('.show-metode-3').fadeIn(300);
        }

        else {
            $('.show-metode-3').hide();
        }
    });

    var $unique = $('input.unique');
    $unique.click(function () {
        $unique.filter(':checked').not(this).removeAttr('checked');
    });



    $('.checkbox1').change(function () {
        if (this.checked)
            $('.show-checkbox1').fadeIn(300);
        else
            $('.show-checkbox1').hide();

    });

    $('.checkbox1').change(function () {
        if (this.checked)
            $('.show-checkbox2').hide();
        else
            $('.show-checkbox1').hide();

    });

    $('.checkbox2').change(function () {
        if (this.checked)
            $('.show-checkbox2').fadeIn(300);
        else
            $('.show-checkbox2').hide();

    });

    $('.checkbox2').change(function () {
        if (this.checked)
            $('.show-checkbox1').hide();
        else
            $('.show-checkbox2').hide();

    });

    var $jasa = $('input.jasa');
    $jasa.click(function () {
        $jasa.filter(':checked').not(this).removeAttr('checked');
    });
    
    $(".text-kodeVoucher").click(function () {
        $jasa.filter(':checked').not(this).removeAttr('checked');
    });
    
    $('.row-voucher').find('.text-kodeVoucher').on('click', function (e) {
        $(this).parents('.row-voucher').find('.boxOut-voucher').hide();
        $(this).parents('.row-voucher').find('.boxVoucher').show();
    });


    /*---------- Material js ----------*/
    $.material.init();


});