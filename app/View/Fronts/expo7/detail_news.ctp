<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pictureBerita">
                            <img  src="<?= Router::url($dataNews['News']['thumbnail_path'], true) ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentPadding">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleBerita font-AvenirLtStd-Heavy">
                                    <?= $this->MultiLang->readLangClassic($dataNews["News"], "title") ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-dateBerita font-AvenirLtStd-Light">
                                    <?php
                                    if ($this->Session->read("lang") == "ind") {
                                        echo $this->Html->cvtHariTanggal($dataNews['News']['news_date']);
                                    } else {
                                        echo $this->Html->cvtHariTanggalEng($dataNews['News']['news_date']);
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textBerita font-AvenirLtStd-Light">
                                    <?= $this->MultiLang->readLangClassic($dataNews['News'], "content") ?>
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

        (function ($) {
            $(window).on("load", function () {
                $(".content").mCustomScrollbar();
            });
        })(jQuery);

    });
</script>