<style>
    .bx-wrapper .bx-controls-direction > .bx-prev {
        width: 37px;
        height: 34px;
        margin-left: -11px;
        margin-top: 145px;
        background-size: cover;
        z-index: 0;
        top: 0;
        right: 0;
        background: url(<?= Router::url("/front_file/expo7/img/icon/bx-left.png", true) ?>) no-repeat;
    }

    .bx-wrapper .bx-controls-direction > .bx-next {
        width: 37px;
        height: 34px;
        margin-right: 0px;
        margin-top: 145px;
        background-size:cover;
        z-index: 0;
        top: 0;
        right: 0;
        background: url(<?= Router::url("/front_file/expo7/img/icon/bx-right.png", true) ?>) no-repeat;
    }

    .stn-table th{
        text-align:center;
        background-color:#00bff3;
        color: white;
        font-weight: bold;
    }

    .scoreboard {
        padding-left: 30px;
        padding-right: 30px;
    }
</style>
<section id="content">
    <div class="row backgroundContent container-padding">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 parallax-item boxOut-banner">
                <img class="box-banner" src="<?= Router::url($detailGame['Game']['cover_path'], true) ?>">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <img class="box-gameImg hidden-sm hidden-xs" src="<?= Router::url($detailGame['Game']['thumbnail_path'], true) ?>">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentGame">
                                <div class="box-contentGame center-block">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentTop">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 boxOut-gameTitle font-RobotoCondensed-Bold">
                                                        <?= $detailGame['Game']['name'] ?>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12 boxOut-gameCategory font-RobotoCondensed-Light">
                                                        <?= __("Category") ?> : 
                                                        <?php
                                                        foreach ($detailGame['CategoryGameDetail'] as $index => $category) {
                                                            if ($index != count($detailGame['CategoryGameDetail']) - 1) {
                                                                echo $category['CategoryGame']['name'] . ", ";
                                                            } else {
                                                                echo $category['CategoryGame']['name'];
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 bxslider-index">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="slider1">
                                                                <?php
                                                                foreach ($detailGame['GameDetail'] as $preview) {
                                                                    ?>
                                                                    <div class="slide bxSlide-edit" style="background-image: url('<?= str_replace('\\', '/', Router::url($preview['image_path'], true)) ?>');">

                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganGame font-RobotoCondensed-Light">
                                                    <?= $this->MultiLang->readLangClassic($detailGame['Game'], "description") ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="boxOut-playStore center-block">
                                                        <div class="boxAvailable-left font-RobotoCondensed-Light">
                                                            <?= __("Available on") ?>
                                                        </div>
                                                        <div class="boxAvailable-middle">
                                                            <a href="<?= Router::url($detailGame['Game']['google_play_url'], true) ?>" target="_blank">
                                                                <img class="google-play" src="<?= Router::url("/front_file/expo7/img/icon/googlePlay.png", true) ?>">
                                                            </a>
                                                            <a href="<?= Router::url($detailGame['Game']['app_store_url'], true) ?>" target="_blank">
                                                                <img class="apple-store" src="<?= Router::url("/front_file/expo7/img/icon/appleStore.png", true) ?>">
                                                            </a>
                                                        </div>
                                                        <div class="boxAvailable-right font-RobotoCondensed-Light">
                                                            <div class="or-div hidden-xs">
                                                                <?= __("Or") ?> 
                                                            </div>
                                                            <?php
                                                            $title = seoUrl($detailGame['Game']['name']);
                                                            ?>
                                                            <button type="button" class="btn button-play font-RobotoCondensed-Bold" id="" onclick='window.open("<?= Router::url("/play-game/{$detailGame['Game']['id']}/{$title}") ?>")'><?= __("Play Now") ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-morePadding">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-morePadding">
                                                        <?= __("It’s more fun on your phone") ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Scoreboard Table -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 scoreboard">
                                            <div class="table-responsive stn-table">
                                                <table width="100%" class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width="50"><?= __("No") ?></th>
                                                            <th><?= __("Player Name") ?></th>
                                                            <th><?= __("Score") ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (empty($detailGame['Scoreboard'])) {
                                                            ?>
                                                            <tr>
                                                                <td class="text-center" colspan="3">No Score yet</td>
                                                            </tr>
                                                            <?php
                                                        } else {
                                                            $i = 1;
                                                            foreach ($detailGame['Scoreboard'] as $scoreboard) {
                                                                ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $i ?></td>
                                                                    <td class="text-center"><?= $scoreboard['Member']['Account']['Biodata']['full_name'] ?></td>
                                                                    <td class="text-center"><?= $scoreboard['score'] ?></td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-similarGame">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleSimilar font-RobotoCondensed-Bold">
                                                    <?= __("SIMILAR GAMES") ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingSimilar">
                                                    <div id="owl-demo" class="owl-carousel owl-theme">
                                                        <?php
                                                        foreach ($dataSimilarGame as $similar) {
                                                            $similar_game_title = seoUrl($similar['Game']['name']);
                                                            ?>
                                                            <div class="item">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-similar">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-imgSimilar">
                                                                                <img class="" src="<?= Router::url($similar['Game']['thumbnail_path'], true) ?>">
                                                                            </div>
                                                                            <div class="col-md-7 col-sm-7 col-xs-7">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-gameTitleSimilar font-RobotoCondensed-Bold">
                                                                                        <?= $similar['Game']['name'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-gameTextSimilar font-RobotoCondensed-Light">
                                                                                        <?php
                                                                                        $limit = 110;
                                                                                        $sinopsys = strip_tags($this->MultiLang->readLangClassic($similar['Game'], "description"));
                                                                                        if (strlen($sinopsys) <= $limit) {
                                                                                            echo $sinopsys;
                                                                                        } else {
                                                                                            echo substr($sinopsys, 0, $limit) . "...";
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-gameButtonSimilar">
                                                                                        <button type="button" class="btn button-play font-RobotoCondensed-Bold"  onclick='window.open("<?= Router::url("/play-game/{$similar['Game']['id']}/{$similar_game_title}") ?>")'><?= __("Play Now") ?></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
            </div>
        </div>
    </div>
</section>
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
<script>
    $(document).ready(function () {
        $('.slider1').bxSlider({
            minSlides: 1,
            maxSlides: 1,
            slideWidth: 220,
            moveSlides: 1,
            slideMargin: 10,
            infiniteLoop: true,
            hideControlOnEnd: true

        });
    });
</script>
<script>
    $(document).ready(function () {
        var owl = $("#owl-demo");
        owl.owlCarousel({
            items: 2,
            loop: true,
            nav: true,
            autoPlay: false,
            autoPlayTimeout: 500,
            autoPlayHoverPause: true,
            navigation: true,
            stopOnHover: true,
            navText: ["<img src='<?= Router::url("/front_file/expo7/img/icon/similar-left.png", true) ?>'>", "<img src='<?= Router::url("/front_file/expo7/img/icon/similar-right.png", true) ?>'>"],
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                600: {
                    items: 1
                },
                767: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1400: {
                    items: 2
                },
                1600: {
                    items: 2
                }
            }
        });
    });
</script>