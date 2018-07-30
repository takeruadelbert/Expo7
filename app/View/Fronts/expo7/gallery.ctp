<section id="content">
    <div class="row backgroundContent">
        <div class="col-md-12 col-sm-12 col-xs-12 container-padding">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-topContent">
                        <?php
                        $style = "";
                        $url_bg_image = "";
                        $content_type = "";
                        foreach ($dataHighlightGallery as $index => $highlightGallery) {
                            if ($highlightGallery['Gallery']['content_type_id'] == 1) {
                                $url_bg_image = $highlightGallery['DetailPhoto'][0]['image_path'];
                                $content_type = "image";
                            } else {
                                $url_bg_image = $highlightGallery['Gallery']['thumbnail_path'];
                                $content_type = "video";
                            }
                            $content = $highlightGallery['Gallery']['content_type_id'] == 1 ? "view_gallery_photo" : "view_gallery_video";
                            $target = $highlightGallery['Gallery']['content_type_id'] == 1 ? "#modalFoto" : "#modalVideo";
                            if ($index == 0) {
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-topLeftContent" style="background-image: url('<?= str_replace('\\', '/', Router::url($url_bg_image, true)) ?>');">
                                    <img class="icon-video" src="<?= Router::url("/front_file/expo7/img/icon/icon-{$content_type}.png", true) ?>">
                                    <div class="boxOut-topTitleNews">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita-title font-AvenirLtStd-Roman">
                                                <a data-toggle="modal" href="<?= Router::url("/front/popups/content?content={$content}&id={$highlightGallery["Gallery"]["id"]}") ?>" data-target="<?= $target ?>">
                                                    <?= $highlightGallery['Gallery']['title'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita-date font-AvenirLtStd-Light">
                                                <?= $this->Html->cvtTanggal($highlightGallery['Gallery']['date']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-topRightContent">
                                    <?php
                                } else {
                                    if ($index == 1) {
                                        $style = "topRightTopContent";
                                    } else if ($index == 3) {
                                        $style = "topRightBottomContent";
                                    }
                                    if ($index == 1 || $index == 3) {
                                        ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-<?= $style ?>">
                                            <?php
                                        }
                                        ?>
                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-beritaAtas" style="background-image: url('<?= str_replace('\\', '/', Router::url($url_bg_image, true)) ?>');">
                                            <img class="icon-video" src="<?= Router::url("/front_file/expo7/img/icon/icon-{$content_type}.png", true) ?>">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-topTitle">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-topTitle font-AvenirLtStd-Roman">
                                                        <a data-toggle="modal" href="<?= Router::url("/front/popups/content?content={$content}&id={$highlightGallery["Gallery"]["id"]}") ?>" data-target="<?= $target ?>">
                                                            <?= $highlightGallery['Gallery']['title'] ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita-date font-AvenirLtStd-Light">
                                                        <?= $this->Html->cvtTanggal($highlightGallery['Gallery']['date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($index == 2 || $index == 4) {
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-category">
                                    <div class="col-md-4 col-sm-4 col-xs-12 boxOut-titlePage font-AvenirLtStd-Black">
                                        ALL GALLERY
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 font-AvenirLtStd-Roman">
                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-selectTop">
                                            <div class="col-md-4 col-sm-4 col-xs-12 boxOut-dropdownTitle">
                                                COUNTRY
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select class="form-control dropdown-konfirmasiPembayaran state-country" data-state-country-target="#GalleryStateId" id="GalleryCountryId">
                                                    <option value="">- Select Country -</option>
                                                    <?php
                                                    $is_selected = "";
                                                    foreach ($countries as $country) {
                                                        if (!empty($this->request->query['country_id'])) {
                                                            if ($country['Country']['id'] == $this->request->query['country_id']) {
                                                                $is_selected = "selected";
                                                            } else {
                                                                $is_selected = "";
                                                            }
                                                        }
                                                        ?>    
                                                        <option value="<?= $country['Country']['id'] ?>" <?= $is_selected ?>><?= $country['Country']['name'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-selectTop">
                                            <div class="col-md-4 col-sm-4 col-xs-12 boxOut-dropdownTitle">
                                                STATE
                                            </div>
                                            <?php
                                            $is_selected2 = "";
                                            $dataState = [];
                                            if (!empty($this->request->query['state_id']) || !empty($this->request->query['country_id'])) {
                                                $dataState = ClassRegistry::init("State")->find("all", [
                                                    "conditions" => [
                                                        "State.country_id" => $this->request->query['country_id']
                                                    ]
                                                ]);
                                            }
                                            ?>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select class="form-control dropdown-konfirmasiPembayaran state-country-target" id="GalleryStateId">
                                                    <option value="">- Select State -</option>
                                                    <?php
                                                    if (!empty($dataState)) {
                                                        foreach ($dataState as $state) {
                                                            if ($state['State']['id'] == $this->request->query['state_id']) {
                                                                $is_selected2 = "selected";
                                                            } else {
                                                                $is_selected2 = "";
                                                            }
                                                            ?>
                                                            <option value="<?= $state['State']['id'] ?>" <?= $is_selected2 ?>><?= $state['State']['name'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2 boxOut-titlePage font-AvenirLtStd-Black" style="padding-top: 7px; padding-left: 50px;">
                                        <a href="<?= Router::url("/gallery_photo_video", true) ?>" id="filter"><button type="button" class="btn button-continue font-MyriadProRegular" style="width: 100%;">Filter</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pageList pagelist active contentMark">
                                    <?php
                                    $counter = 0;
                                    $style2 = "";
                                    foreach ($gallery as $items) {
                                        if ($items['Gallery']['content_type_id'] == 1) {
                                            $url_bg_image = $items['DetailPhoto'][0]['image_path'];
                                            $content_type = "image";
                                            if ($counter == 0) {
                                                $style2 = "boxOut-photoLeft-side";
                                            } else if ($counter == 1) {
                                                $style2 = "boxOut-photoRight-middle";
                                            } else {
                                                $style2 = "boxOut-photoRight-side";
                                            }
                                        } else {
                                            $url_bg_image = $items['Gallery']['thumbnail_path'];
                                            $content_type = "video";
                                            if ($counter == 0) {
                                                $style2 = "boxOut-video-left";
                                            } else if ($counter == 1) {
                                                $style2 = "";
                                            } else {
                                                $style2 = "boxOut-video-right";
                                            }
                                        }
                                        if ($counter == 0) {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentGallery">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <?php
                                                    }
                                                    $content = $items['Gallery']['content_type_id'] == 1 ? "view_gallery_photo" : "view_gallery_video";
                                                    $target = $items['Gallery']['content_type_id'] == 1 ? "#modalFoto" : "#modalVideo";
                                                    ?>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 <?= $style2 ?>">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-video"  style="background-image: url('<?= str_replace('\\', '/', Router::url($url_bg_image, true)) ?>');">
                                                                <img class="icon-image" src="<?= Router::url("/front_file/expo7/img/icon/icon-{$content_type}.png", true) ?>">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleVideo-tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-titleVideo-tab font-AvenirLtStd-Roman">
                                                                                <a data-toggle="modal" href="<?= Router::url("/front/popups/content?content={$content}&id={$items["Gallery"]["id"]}") ?>" data-target="<?= $target ?>"><?= $items['Gallery']['title'] ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($counter == 2) {
                                                        $counter = 0;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
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
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div id="modalFoto" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-margin">
            <!-- Modal content-->
            <div class="modal-content editModal-content">
                <div class="modal-body editModal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="modal-dialog modal-lg modal-marginGallery">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div id="modalVideo" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-margin">
            <div class="modal-content editModal-content">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        (function ($) {
            $(window).on("load", function () {
                $(".content").mCustomScrollbar();
            });
        })(jQuery);

        $('.boxOut-arrow-left').find('a').on('click', function (e) {
            $(this).parents('.box-homeFoto').find('.secondaryPicture-Barang').siblings().find('a').addClass('zoomGalleryActive');
        });

        $('.content-nav').find('a').on('click', function (e) {
            var tabLoc = $(this).attr('href');

            $(tabLoc).fadeIn().siblings().hide();
            $(this).siblings().removeClass('active');

            $(tabLoc).siblings().find('.contentMark').fadeIn().siblings().hide();
            $(tabLoc).siblings().find('.pageMark').addClass('active').parents('span').siblings().find('a').removeClass('active');

            e.preventDefault();
        });

        $(".state-country").on("change", function () {
            stateList(this, $(this).data("state-country-target"));
        });

        $("#GalleryCountryId, #GalleryStateId").on("change", function () {
            var country_id = $("#GalleryCountryId").val();
            var state_id = $("#GalleryStateId").val();
            if (country_id == "") {
                state_id = "";
                $("#GalleryStateId").val(state_id);
                $("#GalleryStateId").change();
                $("#filter").attr("href", BASE_URL + "gallery_photo_video");
            } else if (country_id != "" || state_id != "") {
                var query_url = BASE_URL + "gallery_photo_video?country_id=" + country_id + "&state_id=" + state_id;
                $("#filter").attr("href", query_url);
            } else {
                $("#filter").attr("href", BASE_URL + "gallery_photo_video");
            }
        });
    });

    function stateList(e, targetE) {
        var id = $(e).val();
        $.ajax({
            url: BASE_URL + "/states/list_state/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var $target = $(targetE);
                $target.html("<option value=''>- Select State -</option>");
                $.each(data.data, function (k, v) {
                    $target.append("<option value='" + k + "'>" + v + "</option>");
                })
            },
            error: function () {

            }
        })
    }
</script>