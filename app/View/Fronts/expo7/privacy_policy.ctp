<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiContent">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxFlex">
                                <div class="col-md-1 col-sm-1 col-xs-2 boxOut-sideMenu">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <section id="side-menu-jarakAtas">
                                        </section>
                                        <div id="nav-side">
                                            <div class="navbar navbar-default navbar-static navbar-edit-profil" style="margin-bottom: 0px;">
                                                <div class="navbar-header page-scroll center">
                                                    <button type="button" class="navbar-toggle offcanvas-toggle profil-toggle-edit sidebar-z" data-toggle="offcanvas" data-target="#sideMenu-profil" style="float:left;">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span>
                                                            <span class="icon-bar" style="color: white !important;"></span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="navbar-offcanvas navbar-offcanvas-touch sidebar-canvas" id="sideMenu-profil">
                                                    <div class="row">
                                                        <div class="hidden-lg hidden-md hidden-sm col-xs-12 boxOut-sideMenu flex">
                                                            <div class="hidden-lg hidden-md hidden-sm col-xs-12 box-sideMenu flex">
                                                                <img src="<?= Router::url("/front_file/expo7/img/icon/header-logo.png", true) ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="hidden-lg hidden-md hidden-sm col-xs-12 boxOut-titleMenu">
                                                            <div class="col-xs-12 box-titleMenu font-oswald">
                                                                PENDAHULUAN
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav navbar-nav nav-profil navbar-edit-menuLeft font-openSans">
                                                        <?php
                                                        $add_class = "";
                                                        foreach ($privacyPolicies as $index => $list) {
                                                            if ($index == 0) {
                                                                $add_class = "active li-1";
                                                            } else {
                                                                $add_class = "";
                                                            }
                                                            ?>
                                                            <li class="profil-navbar-li col-md-12 col-sm-12 col-xs-12 font-AvenirLtStd-Book <?= $add_class ?>">
                                                                <a href="#kebijakan-<?= $index ?>">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 border-text">
                                                                            <?= $list['PrivacyPolicy']['short_title_eng'] ?>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11 col-sm-11 col-xs-10">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <?php
                                            foreach ($privacyPolicies as $index => $list) {
                                                ?>
                                                <div class="row">
                                                    <div id="kebijakan-<?= $index ?>" class="col-md-12 col-sm-12 col-xs-12 titleKebijakanPrivasi font-PoppinsSemiBold">
                                                        <?= $list['PrivacyPolicy']['ordering_number'] . " . " . $list['PrivacyPolicy']['title_eng'] ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 textKebijakan font-LatoLight">
                                                        <?= $list['PrivacyPolicy']['content_eng'] ?> 
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {

        $('#nav-side').affix({
            offset: {
                top: $('.navbar-fixed-top').height()
            }
        });
        $('#sideMenu-profil').find('a').on('click', function (e) {
            var href = $(this).attr('href');

            $('html,body').animate({scrollTop: $(href).offset().top - 180}, 500);
            $(this).find('img').show().parents('.profil-navbar-li').siblings().find('a').find('img').hide();

            e.preventDefault();

        });

        $(".navbar-edit-menuLeft a").on("click", function () {
            $(".navbar-edit-menuLeft").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });



    });
</script>