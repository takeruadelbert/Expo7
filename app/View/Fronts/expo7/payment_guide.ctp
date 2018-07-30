<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titlePage">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-titlePage center font-RobotoCondensed-Bold">
                                    Syarat dan Ketentuan
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-subTitlePage center font-openSans">
                                    <?= $paymentGuides['PaymentGuide']['description'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonPesan center">
                        <button type="button" class="btn button-pesan font-RobotoCondensed-Bold">PESAN SEKARANG</button>
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