<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pictureEvent">
                            <img  src="<?= Router::url($dataEvent['Event']['thumbnail_path'], true) ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentPadding">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-AvenirLtStd-Heavy">
                                    <?= $dataEvent['Event']['title'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-dateEvent font-AvenirLtStd-Light">
                                    <?= $this->Html->cvtTanggal($dataEvent['Event']['event_date']) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-AvenirLtStd-Light">
                                    <?= $dataEvent['Event']['content'] ?>
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