<div class="row backgroundFooter">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <!--                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman footer-border">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <a href="<? Router::url("/about", true) ?>">
                                                About Us
                                            </a>
                                        </div>
                                    </div>
                                </div>-->
                <!--                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <a href="<? Router::url("/event", true) ?>">
                                                Event Schedule
                                            </a>
                                        </div>
                                    </div>
                                </div>-->
                <!--                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman footer-border">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <a href="<? Router::url("/payment-guide", true) ?>">
                                                Payment 
                                            </a>
                                        </div>
                                    </div>
                                </div>-->
                <!--                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <a href="<? Router::url("/knowledge-base", true) ?>">
                                                Knowledge Base
                                            </a>
                                        </div>
                                    </div>
                                </div>-->
                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman footer-border">

                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman">

                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman footer-border">
                    
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman footer-border">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="<?= Router::url("/term-condition", true) ?>">
                                <?= __("Term & Conditions") ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="<?= Router::url("/privacy-policy", true) ?>">
                                <?= __("Privacy Policies") ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 boxOut-link font-AvenirLtStd-Roman footer-border">
                </div>
            </div>
            <?php
            echo $this->Form->create("Newsletter", ['action' => 'subscribe', 'type' => "post", 'id' => 'newsletter']);
            ?>
            <div class="col-md-3 col-sm-3 col-xs-12 boxOut-fieldSubscribe font-AvenirLtStd-Roman">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-fieldSubscribe">
                        <input type="email" placeholder="SUBSCRIBE? <?= __("Type your email") ?>" class="form-control field-subscribe font-AvenirLtStd-Roman" name="data[Newsletter][email]">
                        <button type="submit" class="btn button-footerGo font-AvenirLtStd-Roman" style="left: 175px;"><?= __("SEND") ?></button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerBottom">
        <div class="footer-find">
            <div class="box-footerFind">
                <?php
                $socialMedia = ClassRegistry::init('SocialMedia')->find("all", [
                    "conditions" => [
                        "SocialMedia.show_status_id" => 2
                    ]
                ]);
                foreach ($socialMedia as $list) {
                    ?>
                    <span class="boxOut-footerFind">
                        <a href="<?= $list['SocialMedia']['url'] ?>">
                            <div class="boxOut-footerCircle center-block">
                                <img src="<?= Router::url($list['SocialMedia']['icon_path'], true) ?>">
                            </div>
                        </a>
                    </span>
                    <?php
                }
                ?>                
            </div>
        </div>
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerCopyrights font-AvenirLtStd-Roman center">
                    Copyrights © <?= _COPYRIGHT_YEAR ?> - <?= _APP_CORPORATE ?> - All Rights Reserved 
                    <br class="hidden-lg hidden-md"><font class="batas-jarak hidden-sm hidden-xs">|</font>       Developed & Maintained By : <a target="_blank" href="<?= _DEVELOPER_WEBSITE ?>" style="color: white;"><?= _DEVELOPER_NAME ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#newsletter").validate({
            rules: {
                "data[Newsletter][email]": {
                    required: true,
                    email: true
                }
            }
        });
    });
</script>