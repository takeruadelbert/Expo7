<script src="<?php echo Router::url("/front_file/expo7/js/jquery-3.1.1.js", true) ?>"></script>
<script src="<?php echo Router::url("/front_file/expo7/js/bootstrap.js", true) ?>"></script>
<script src="<?php echo Router::url("/front_file/expo7/js/bootstrap.offcanvas.js", true) ?>"></script>
<script src="<?php echo Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
<script src="<?php echo Router::url("/front_file/expo7/js/material.js", true) ?>"></script>
<script src="<?php echo Router::url("/front_file/expo7/js/ripples.js", true) ?>"></script>
<script type="text/javascript" src="<?= Router::url("/front_file/expo7/js/jquery.onepage-scroll.js", true)?>"></script>
<script src="<?php echo Router::url("/js/jquery.growl.js", true) ?>"></script>
<script src="<?php echo Router::url("/js/app.js", true) ?>"></script>
<script src="<?php echo Router::url("/front_file/expo7/js/download/jquery.bxslider.js", true) ?>"></script>
<script src="<?= Router::url("/front_file/expo7/js/jquery.validate.js", true) ?>"></script>
<script>
    $(document).ready(function () {

        $(".navbar-edit-1 a").on("click", function () {
            $(".navbar-edit-1").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });

        $(".navbar-edit2 a").on("click", function () {
            $(".navbar-edit2").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });

        $('.a-login').on("click", function () {
            $('.login-popup').fadeToggle(300);
        });

        $(".body-offcanvas").mouseup(function (e)
        {
            var subject = $(".login-popup");

            if (e.target.id != subject.attr('class') && !subject.has(e.target).length)
            {
                subject.fadeOut();
            }
        });

        $('input,textarea').focus(function () {
            $(this).data('placeholder', $(this).attr('placeholder'))
                    .attr('placeholder', '');
        }).blur(function () {
            $(this).attr('placeholder', $(this).data('placeholder'));
        });
        $('#myCarousel').carousel({
            //interval: 2000,
            pause: "false"
        });
        var parallax = document.querySelectorAll(".parallax-item"),
                speed = 0.5;
        window.onscroll = function () {
            [].slice.call(parallax).forEach(function (el, i) {

                var windowYOffset = window.pageYOffset,
                        elBackgrounPos = "0 " + (windowYOffset * speed) + "px";

                el.style.backgroundPosition = elBackgrounPos;

            });
        };
        $('.slider1').bxSlider({
            minSlides: 1,
            maxSlides: 1,
            slideWidth: 220,
            moveSlides: 1,
            slideMargin: 10,
            infiniteLoop: false,
            hideControlOnEnd: true

        });
        $(window).scroll(function () {
            if ($(this).scrollTop() > 450)
            {
                $('.scrollPageDown').fadeIn();
            }
            else
            {
                $('.scrollPageDown').fadeOut();
            }
        });
        $('#nav-menu2').affix({
            offset: {
                top: $('#parallax').height()
            }
        });
        $('#sidebar').affix({
            offset: {
                top: 1000
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
		
        $(".navbar-edit-1 a").on("click", function () {
            $(".navbar-edit-1").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });

        $(".navbar-edit2 a").on("click", function () {
            $(".navbar-edit2").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });

        $('.a-login').on("click", function () {
            $('.login-popup').fadeToggle(300);
        });

        $(".body-offcanvas").mouseup(function (e)
        {
            var subject = $(".login-popup");

            if (e.target.id != subject.attr('class') && !subject.has(e.target).length)
            {
                subject.fadeOut();
            }
        });

        $('input,textarea').focus(function () {
            $(this).data('placeholder', $(this).attr('placeholder'))
                    .attr('placeholder', '');
        }).blur(function () {
            $(this).attr('placeholder', $(this).data('placeholder'));
        });

    });
</script>