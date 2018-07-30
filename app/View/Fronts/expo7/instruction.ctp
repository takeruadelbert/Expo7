<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                    <?php
                    foreach($instructions as $list) {
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 box-listStep">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="circle-instruction img-instruction-2" style="background-image: url('<?= str_replace('\\', '/', Router::url("/".$list['Instruction']['icon_path'], true)) ?>');"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 font-MyriadProRegular">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listStep">
                                        <?= $list['Instruction']['content'] ?>
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