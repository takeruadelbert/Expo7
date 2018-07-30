<div class="row backgroundContent">
    <div class="container container-padding">
        <div class="col-md-12 col-sm-12 col-xs-12 background-container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-shadowPayment">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 center">
                            <img class="img-ceklis" src="<?php echo Router::url("/front_file/expo7/img/icon/paymentCeklis.png", true) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingTextShadow center font-RobotoCondensed">
                            <?= __("Your account have been actived")?>
                            <br>
                            <?= __("You can now login and continue to payment")?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-terimakasih center">
                            <img src="<?php echo Router::url("/front_file/expo7/img/icon/paymentTerimakasih.png", true) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingTextShadow center font-RobotoCondensed">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingTextRed center font-RobotoCondensed-Bold">
                        </div>
                    </div>
                </div>
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

    });
</script>