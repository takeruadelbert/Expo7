<div class="pull-right boxOut-footer">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footer-copyright font-RobotoCondensed">
                Copyrights @ <?= _COPYRIGHT_YEAR ?> <?= _APP_CORPORATE ?> - All Rights Reserved.
                <br>
                Developed & Maintained By : <a target="_blank" href="<?= _DEVELOPER_WEBSITE ?>" style="color: #1A64B8;"><?= _DEVELOPER_NAME ?></a>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12 boxOut-footer-right">
            <div class="col-md-4 col-sm-4 col-xs-12 hidden-sm hidden-xs boxOut-footer-logo center">
                <img src="<?php echo Router::url("/front_file/expo7/img/icon/header-logo.png", true) ?>">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 boxOut-footer-list font-RobotoCondensed">
                <div class="col-md-4 col-sm-4 col-xs-4 center">
                    <a href="<?= Router::url("/contact", true) ?>">
                        <?= __("Contact Us") ?>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 center boxOut-footer-listCenter">
                    <a href="<?= Router::url("/privacy-policy", true) ?>">
                        <?= __("Privacy Policies") ?>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 center">
                    <a href="<?= Router::url("/term-condition", true) ?>">
                        <?= __("Terms of Service") ?>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 boxOut-footer-findUs">
                <div class="col-md-4 col-sm-4 col-xs-4 boxOut-footer-titleFind font-RobotoCondensed">
                    <?= __("Find Us :") ?>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 boxOut-footer-media">
                    <?php
                    $socialMedia = ClassRegistry::init('SocialMedia')->find("all", [
                        "conditions" => [
                            "SocialMedia.show_status_id" => 2
                        ]
                    ]);
                    foreach ($socialMedia as $list) {
                        ?>
                        <div class="col-md-1 col-sm-1 col-xs-1" style="padding-left:5px; padding-right: 20px;">
                            <a href="<?= $list['SocialMedia']['url'] ?>">
                                <img src="<?= Router::url($list['SocialMedia']['icon_path'], true) ?>">
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>