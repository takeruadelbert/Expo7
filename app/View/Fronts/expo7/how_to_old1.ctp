<?php
$num_of_step = count($howTo['Step']);
?>
<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-step font-AvenirLtStd-Black center">
                        JUST <?= $num_of_step ?> SIMPLE STEPS
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-step">
                        <?php
                        foreach ($howTo['Step'] as $step) {
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 boxOut-step1">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="circle-step center-block font-AvenirLtStd-Roman">
                                        <?= $step['ordering_number'] ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 step-img center">
                                            <img class="imgStep1" src="<?= Router::url("/{$step['icon_path']}", true) ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 step-text font-AvenirLtStd-Roman text-justify">
                                            <?= $step['content'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-stepVideo">
                        <div class="box-stepVideo">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <iframe src="<?= $howTo['Guide']['video_url'] ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="boxOut-stepKeteranganVideo">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <ul class="nav nav-tabs nav-step-edit">
                                        <li class="col-md-6 col-sm-6 col-xs-6 active">
                                            <a class="red" data-toggle="tab" href="#tab1" style="width: 100%;">
                                                <div class="boxOut-titleTab font-AvenirLtStd-Roman center">
                                                    MECHANISM
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-md-6 col-sm-6 col-xs-6">
                                            <a class="red" data-toggle="tab" href="#tab2">
                                                <div class="boxOut-titleTab font-AvenirLtStd-Roman center">
                                                    FACTS
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textTab">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-justify font-AvenirLtStd-Roman">
                                        <div class="tab-content">
                                            <div id="tab1" class="tab-pane fade in active">
                                                <div class="box-textTab mCustomScrollbar" data-mcs-theme="rounded-dark">
                                                    <?= $howTo['Guide']['mechanism'] ?>
                                                </div>
                                            </div>
                                            <div id="tab2" class="tab-pane fade">
                                                <div class="box-textTab mCustomScrollbar" data-mcs-theme="rounded-dark">
                                                    <?= $howTo['Guide']['fact'] ?>
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

        (function ($) {
            $(window).on("load", function () {
                $(".content").mCustomScrollbar();
            });
        })(jQuery);

    });
</script>