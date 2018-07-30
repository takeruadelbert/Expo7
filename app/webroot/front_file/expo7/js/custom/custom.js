/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

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





    /*---------- Nav-side (Halaman profilPengguna, kebijakanPrivasi, rincianPesanan) ----------*/
    $('#nav-side').affix({
        offset: {
            top: $('#side-menu-jarakAtas').height()
        }
    });




    /*---------- Page (Halaman rincianPengguna, detailProduk) ----------*/

    $("#replace").html(jQuery($("#page-" + 1).html()));
    $('#page').bootpag({
        total: 5
    }).on("page", function (event, num) {
        $("#replace").html(jQuery($("#page-" + num).html()));


        $(this).bootpag({total: 5, maxVisible: 5});

    });




    /*---------- Page (Halaman pencarianProduk) ----------*/
    $("#replace-menu-1").html(jQuery($("#menu1-" + 1).html()));
    $('#menu-1').bootpag({
        total: 5
    }).on("page", function (event, num) {
        $("#replace-menu-1").html(jQuery($("#menu1-" + num).html()));


        $(this).bootpag({total: 5, maxVisible: 5});

        $('.popupHover').mouseenter(function (e) {
            e.preventDefault();
            $(this).siblings().fadeIn(100).addClass('active');
            $(this).siblings().mouseleave(function (e) {
                $(this).fadeOut(100).removeClass('active');
            });

        });

    });


    $("#replace-menu-2").html(jQuery($("#menu2-" + 1).html()));
    $('#menu-2').bootpag({
        total: 5
    }).on("page", function (event, num) {
        $("#replace-menu-2").html(jQuery($("#menu2-" + num).html()));


        $(this).bootpag({total: 5, maxVisible: 5});

        $('.popupHover').mouseenter(function (e) {
            e.preventDefault();
            $(this).siblings().fadeIn(100).addClass('active');
            $(this).siblings().mouseleave(function (e) {
                $(this).fadeOut(100).removeClass('active');
            });

        });

    });



    /*---------- Pop-up produk (Halaman pencarianProduk, detailProduk) ----------*/
    $('.popupHover').mouseenter(function (e) {
        e.preventDefault();
        $(this).siblings().fadeIn(100).addClass('active');
        $(this).siblings().mouseleave(function (e) {
            $(this).fadeOut(100).removeClass('active');
        });
    });


});