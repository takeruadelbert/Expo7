<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-topText font-MyriadProRegular">
                        <?= $this->MultiLang->readLangClassic($dataTestimonialPage['TestimonialPage'], "label") ?>
                    </div>
                </div>
                <?php
                if (!empty($dataHighlightTestimonies)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-carouselBackground">
                            <div id="carousel-testimonial" class="carousel carousel-fade edit-carousel-indexBottom slide" data-ride="carousel">
                                <ol class="carousel-indicators indicators-edit-indexBottom">
                                    <?php
                                    $is_active = "";
                                    foreach ($dataHighlightTestimonies as $index => $highlights) {
                                        if ($index == 0) {
                                            $is_active = "active";
                                        } else {
                                            $is_active = "";
                                        }
                                        ?>
                                        <li data-target="#carousel-testimonial" data-slide-to="<?= $index ?>" <?= $is_active ?>></li>
                                        <?php
                                    }
                                    ?>
                                </ol>
                                <div class="carousel-inner edit-carousel-indexBottom" role="listbox">
                                    <?php
                                    $is_active_for_hightlight = "";
                                    foreach ($dataHighlightTestimonies as $index => $highlights) {
                                        if ($index == 0) {
                                            $is_active_for_hightlight = "active";
                                        } else {
                                            $is_active_for_hightlight = "";
                                        }
                                        ?>
                                        <div class="item <?= $is_active_for_hightlight ?>">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingCarousel">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="circle-carouselPhoto center-block" style="background-image: url('<?= str_replace('\\', '/', Router::url($highlights['Account']['User']['profile_picture'], true)) ?>');"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-carouselName center text-uppercase font-AvenirLtStd-Light">
                                                            <?= $highlights['Account']['Biodata']['full_name'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-carouselPosition center font-AvenirLtStd-Light">
                                                            <?= $highlights['Testimony']['title'] ?>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-carouselText center font-AvenirLtStd-Light">
                                                            <?= $highlights['Testimony']['message'] ?>
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
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentBacground" style="text-align: center;">
                            <h3><?= __("No Testimony yet.") ?></h3>
                        </div>
                    </div>
                    <?php
                }
                if (!empty($dataTestimonies)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentBacground">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentTitle center text-uppercase font-AvenirLtStd-Black">
                                    <?= __("MORE TESTIMONIES") ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pageList pagelist active contentMark">
                                    <?php
                                    $counter = 0;
                                    foreach ($dataTestimonies as $testimonies) {
                                        if ($counter == 0) {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <?php
                                                }
                                                ?>
                                                <div class="col-md-4 col-sm-4 col-xs-12 boxOut-listTestimonial">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="circle-testiPhoto center-block" style="background-image: url('<?= str_replace('\\', '/', Router::url($testimonies['Account']['User']['profile_picture'], true)) ?>');"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textTestimonial font-AvenirLtStd-Light">
                                                                <?= $testimonies['Testimony']['message'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-testimonialName center font-AvenirLtStd-Light">
                                                                <font class="testi-name font-AvenirLtStd-Heavy">
                                                                <?= $testimonies['Account']['Biodata']['full_name'] ?>
                                                                </font>
                                                                <font class="testi-position font-AvenirLtStd-Light">
                                                                <?php // $testimonies['Testimony']['title'] ?>
                                                                </font>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($counter == 2) {
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                            $counter = 0;
                                        } else {
                                            $counter++;
                                        }
                                    }
                                    ?>                                                           
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-pagination font-Lato">
                                            <div class="boxOut-page">
                                                <?= $this->Expo7->pagination($paginationInfo, $this->request->query, Router::url("", true)) ?>
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
</section>
<script>
    $(document).ready(function () {
        $('.content-nav').find('a').on('click', function (e) {
            var tabLoc = $(this).attr('href');

            $(tabLoc).fadeIn().siblings().hide();
            $(this).siblings().removeClass('active');

            $(tabLoc).siblings().find('.contentMark').fadeIn().siblings().hide();
            $(tabLoc).siblings().find('.pageMark').addClass('active').parents('span').siblings().find('a').removeClass('active');

            e.preventDefault();
        });

        $('.box-pagination').find('a').on('click', function (e) {
            var pageLoc = $(this).attr('href');

            $(pageLoc).fadeIn().siblings().hide();
            $(this).addClass('active').parents('span').siblings().find('a').removeClass('active');

            e.preventDefault();
        });

    });
</script>