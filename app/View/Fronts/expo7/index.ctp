<div class="parallax">
    <div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel">
        <ol class="carousel-indicators indicators-edit">
            <?php
            foreach ($dataSlideshow as $index => $slideshows) {
                if($index == 0) {
                    $is_active = "active";
                } else {
                    $is_active = "";
                }
            ?>
            <li data-target="#myCarousel" data-slide-to="<?= $index ?>" class=<?= $is_active ?>></li>
            <?php
            }
            ?>
            
        </ol>

        <div class="carousel-inner edit-carousel" role="listbox">
            <?php
            foreach ($dataSlideshow as $index => $slideshows) {
                if($index == 0) {
                    $is_active = "active";
                } else {
                    $is_active = "";
                }
            ?>
            <div id="parallax" class="parallax-item item <?= $is_active ?>" style="background-image: url('<?= str_replace('\\', '/', Router::url($slideshows['IndexSlideshow']['image_path'], true))?>');">
                <div class="container">
                    <div class="col-md-8 col-sm-10 col-xs-12 boxOut-textSlider">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleSlider font-Montserrat">
                                <?= $this->MultiLang->readLangClassic($slideshows['IndexSlideshow'],"title");  ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 box-textSlider font-PoppinsLight">
                                <?= $this->MultiLang->readLangClassic($slideshows['IndexSlideshow'], "content") ?>
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
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-referralCode">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-referralCode-container">
                <div class="col-md-4 col-sm-3 col-xs-12 box-referralCode">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                        if($this->Session->read("lang") == "eng") {
                            $text_home1 = "Already have a";
                            $text_home2 = "REFERRAL CODE ?";
                        } else {
                            $text_home1 = "Sudah Punya";
                            $text_home2 = "Kode Rujukan ?";
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 font-MyriadProRegular">
                                <?= __($text_home1) ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 font-MyriadProRegular">
                                <?= __($text_home2) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                echo $this->Form->create("Account", ['type' => 'post', 'id' => "registration", 'action' => "register"]);
                ?>
                <div class="col-md-8 col-sm-9 col-xs-12 box-referralField">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12 boxPadding-agree">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control field-agree font-MyriadProRegular" placeholder="USERNAME" name="data[User][username]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" placeholder="EMAIL" class="form-control field-agree font-MyriadProRegular" name="data[User][email]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 boxPadding-agree">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" placeholder="PASSWORD" class="form-control field-agree font-MyriadProRegular" name="data[User][password]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" placeholder="<?= __("CONFIRM PASSWORD") ?>" class="form-control field-agree font-MyriadProRegular confirmPassword" name="confirmPassword">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 boxPadding-agree">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="<?= __("REFERRAL CODE") ?>" class="form-control field-agree font-MyriadProRegular" name="data[Member][id_referral]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn button-continue font-MyriadProRegular"><?= __("REGISTER") ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxPadding-agree">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxAgree font-MyriadProRegular">
                                    <div class="checkbox edit-boxAgree">
                                        <input id="agree" type="checkbox" name="data[Dummy][is_agree]" value="1">
                                        <label for="agree">
                                            <?= __("I agree to the Terms of Service and have acknowledged all parts of the Privacy Policy.")?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs"></div>
                            <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs boxPadding-agree">

                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 backgroundContent">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeVideo-bottom">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeVideo">
                                    <div class="box-homeVideo">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <iframe src="<?= $dataHomeContent['HomeContent']['video_url'] ?>" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="boxOut-homeVideoKeterangan">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-homeVideoKeterangan">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleVideo font-AvenirLtStd-Roman">
                                                        <?= $this->MultiLang->readLangClassic($dataHomeContent['HomeContent'], "title") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textVideo font-AvenirLtStd-Roman">
                                                        <?= $this->MultiLang->readLangClassic($dataHomeContent['HomeContent'], "content") ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-videoSlider">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-videoSlider bxslider2-index">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div id="myCarousel-indexBottom" class="carousel carousel-fade edit-carousel-indexBottom slide" data-ride="carousel">
                                                    <ol class="carousel-indicators indicators-edit-indexBottom">
                                                        <?php
                                                        foreach($dataHomeContent['HomeContentDetail'] as $index => $detail) {
                                                            if($index == 0) {
                                                                $is_active = "active";
                                                            } else {
                                                                $is_active = "";
                                                            }
                                                        ?>
                                                        <li data-target="#myCarousel-indexBottom" data-slide-to="<?= $index ?>" class="<?= $is_active ?>"></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ol>
                                                    <div class="carousel-inner edit-carousel-indexBottom" role="listbox">
                                                        <?php
                                                        foreach ($dataHomeContent['HomeContentDetail'] as $index => $detail) {
                                                            $is_active = $index == 0 ? "active" : "";
                                                        ?>
                                                        <div class="item <?= $is_active ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-sliderTitle font-MyriadProRegular center">
                                                                        <?= $this->MultiLang->readLangClassic($detail,"title") ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-sliderText font-AvenirLtStd-Roman center">
                                                                        <?= $this->MultiLang->readLangClassic($detail, "content") ?>
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
</div>

<script>
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 50) {
            $(".header-rowBackgroundIndex").addClass("active");
            $("#login").attr("style", 'color: #808080;');
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".header-rowBackgroundIndex").removeClass("active");
            $("#login").attr("style", "color:white;");
        }
    });
</script>
<script>
    (function () {
        $('#myCarousel').carousel({
            interval: 6000,
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
    })();
</script>
<script>
    $(document).ready(function() {
        $("#registration").validate({
            rules: {
                "data[User][username]": {
                    required: true,
                    minlength: 5,
                },
                "data[User][email]": {
                    required: true,
                    email: true
                },
                "data[User][password]": {
                    required: true,
                    minlength: 6
                },
                "confirmPassword": {
                    required: true,
                    minlength: 6,
                    equalTo: ".confirmPassword"
                },
                "data[Member][referral_id]": {
                    required: true,
                }
            }
        });
    });
</script>