<!doctype html>
<html>
    <head>
        <?php
        $dataMeta = ClassRegistry::init("EntityConfiguration")->findById(1);
        $meta_description = !empty($dataMeta) ? $dataMeta['EntityConfiguration']['meta_description'] : "";
        ?>
        <meta name="description" content="<?= $meta_description ?>">
        <title>
            <?php
            $default_title = "Expo 7 - ";
            switch ($page) {
                case "about_us" :
                    $default_title .= "About";
                    break;
                case "activation" :
                    $default_title .= "Activation";
                    break;
                case "contact_us" :
                    $default_title .= "Contact";
                    break;
                case "detail_event" :
                    $default_title .= $dataEvent['Event']['title'];
                    break;
                case "detail_game" :
                    $default_title .= $detailGame['Game']['name'];
                    break;
                case "detail_news" :
                    $default_title .= $dataNews['News']['title'];
                    break;
                case "events" :
                    $default_title .= "Event";
                    break;
                case "gallery" :
                    $default_title .= "Gallery";
                    break;
                case "game" :
                    $default_title .= "Game";
                    break;
                case "how_to" :
                    $default_title .= "Guide";
                    break;
                case "index" :
                    $default_title .= "Home";
                    break;
                case "instruction" :
                    $default_title .= "Instruction";
                    break;
                case "login" :
                    $default_title .= "Login";
                    break;
                case "forget_password" :
                    $default_title .= "Forget Password";
                    break;
                case "reset_password" :
                    $default_title .= "Reset Password";
                    break;
                case "member_dashboard" :
                    $default_title .= "Dashboard";
                    break;
                case "member_edit_profile" :
                    $default_title .= "Edit Profile";
                    break;
                case "member_ewallet_history" :
                    $default_title .= "eWallet History";
                    break;
                case "member_ewallet_withdraw";
                    $default_title .= "eWallet Withdraw";
                    break;
                case "member_genealogylist" :
                    $default_title .= "Genealogy List";
                    break;
                case "member_genealogytree" :
                    $default_title .= "Genealogy Tree";
                    break;
                case "member_knowledge_base" :
                    $default_title .= "Knowledge Base For Member";
                    break;
                case "member_payment" :
                    $default_title .= "Payment";
                    break;
                case "member_testimonial" :
                    $default_title .= "Testimonial";
                    break;
                case "member_upload_game" :
                    $default_title .= "Upload Game";
                    break;
                case "news" :
                    $default_title .= "News";
                    break;
                case "our_testimonies" :
                    $default_title .= "Testimonies";
                    break;
                case "payment_guide" :
                    $default_title .= "Payment Guide";
                    break;
                case "privacy_policy" :
                    $default_title .= "Privacy Policy";
                    break;
                case "snap_payment" :
                    $default_title .= "Snap Payment";
                    break;
                case "term_and_condition" :
                    $default_title .= "Term and Condition";
                    break;
                case "play_game" :
                    $default_title .= $detailGame['Game']['name'];
                    break;
            }
            echo $default_title;
            ?>
        </title>        
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_css") ?>
        <?php
        switch ($page) {
            case "index":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/jquery.bxslider.css") ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/bxsliderIndex.css") ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom/index.css") ?>">
                <?php
                break;
            case "activation":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom/paymentConfirmation.css") ?>">
                <?php
                break;
            case "snap_payment":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom/paymentConfirmation.css") ?>">
                <?php
                break;
            case "login" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/login.css", true) ?>">
                <?php
                break;
            case "forget_password" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/login.css", true) ?>">
                <?php
                break;
            case "reset_password" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/login.css", true) ?>">
                <?php
                break;
            case "our_testimonies" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/ourTestimonies.css", true) ?>">
                <?php
                break;
            case "events" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/download/dncalendar-skin.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/event.css", true) ?>">
                <?php
                break;
            case "detail_event" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/detailEvent.css", true) ?>">
                <?php
                break;
            case "news" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/berita.css", true) ?>">
                <?php
                break;
            case "detail_news" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/detailBerita.css", true) ?>">
                <?php
                break;
            case "contact_us" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/contact.css", true) ?>">
                <?php
                break;
            case "gallery" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "about_us" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/aboutUs.css", true) ?>">
                <?php
                break;
            case "how_to" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/howTo.css", true) ?>">
                <!--<link rel="stylesheet" href="<? Router::url("/front_file/expo7/css/custom/detailHowTo.css", true) ?>">-->
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/balloon.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/balloon.min.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/w3.css", true) ?>">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
                <?php
                break;
            case "instruction" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/instruction.css", true) ?>">
                <?php
                break;
            case "payment_guide" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/panduanPembayaran.css", true) ?>">
                <?php
                break;
            case "term_and_condition" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/syaratKetentuan.css", true) ?>">
                <?php
                break;
            case "privacy_policy" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/kebijakanPrivasi.css", true) ?>">
                <?php
                break;
            case "game" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/games.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gamess.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/style4.css", true) ?>">
                <?php
                break;
            case "detail_game" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/download/owl.carousel.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/download/jquery.bxslider.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/detailGames.css", true) ?>">
                <?php
                break;
            case "play_game" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/download/owl.carousel.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/detailGames.css", true) ?>">
                <?php
                break;
        }
        ?>
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_js") ?>
        <?php
        switch ($page) {
            case "events" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/dncalendar.js", true) ?>"></script>
                <?php
                break;
            case "contact_us" :
                ?>
                <script src='https://www.google.com/recaptcha/api.js?hl=id'></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNI9DqfA0Hdaycx7k7yzbXwnqju1rYut0&type=geocode&libraries=places"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/gmaps.js", true) ?>"></script>
                <?php
                break;
            case "gallery" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.ez-plus.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/web.js?m=20100203", true) ?>"></script>
                <?php
                break;
            case "detail_game" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/nprogress.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/bootstrap-progressbar.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/owl.carousel.js", true) ?>"></script>
                <?php
                break;
            case "play_game" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/game/UnityLoader.js", true) ?>"></script>
                <?php
                break;
            case "how_to" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/sectionScroller.min.js", true) ?>"></script>
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js"></script>
                <?php
                break;
        }
        ?>
        <script>
            var BASE_URL = '<?php echo Router::url("/", true) ?>';
        </script>

        <?php
        echo $this->Html->script("app");
        echo $this->Html->script("wonolib");
        ?>
    </head>
    <body class="body-offcanvas">
        <div id="show-scroll" class="scrollPageDown">

        </div>
        <header>
            <?php
            $excluded_page = ['login', 'forget_password', 'reset_password'];
            if (!in_array($page, $excluded_page)) {
                echo $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_header");
            }
            ?>
        </header>
        <?php
        echo $this->fetch("content");
        ?>      
        <footer>
            <?php
            if (!in_array($page, $excluded_page)) {
                echo $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_footer");
            }
            ?>
        </footer>
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/flash/flash-message"); ?>
        <script>
            var meta_description = '<?= $meta_description ?>';
            $(document).ready(function () {
                $("meta[name=description]").attr("content", meta_description);
            });
        </script>
    </body>
    <?php
    switch ($page) {
        case "how_to" :
            ?>
            <script>
                $(document).ready(function () {
                    // Add smooth scrolling to all links
                    $(function () { // dom ready

                        $(".section-scroll").sectionScroller({
                            scrollerButton: "#section-scroller-button",
                            scrollType: "swing",
                            scrollDuration: 300,
                        });

                    });
                    $("a").on('click', function (event) {

                        // Make sure this.hash has a value before overriding default behavior
                        if (this.hash !== "") {
                            // Prevent default anchor click behavior
                            event.preventDefault();

                            // Store hash
                            var hash = this.hash;

                            // Using jQuery's animate() method to add smooth page scroll
                            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                            $('html, body').animate({
                                scrollTop: $(hash).offset().top
                            }, 800, function () {

                                // Add hash (#) to URL when done scrolling (default click behavior)
                                window.location.hash = hash;
                            });
                        } // End if
                    });
                });
            </script>
            <?php
            break;
    }
    ?>
</html>
