<section id="content">
    <div class="row backgroundContent container-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-3 col-sm-3 col-xs-12 boxOut-aboutLeft">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutTitle font-AvenirLtStd-Roman">
                                <?= ("ABOUT US") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutText font-AvenirLtStd-Roman">
                                <?= $this->MultiLang->readLangClassic($aboutUs['About'], "description") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 boxOut-aboutRight">
                        <div class="row">
                            <div class="box-homeVideo">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <iframe src="<?= $aboutUs['About']['video_url'] ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-visiMisi">
                    <div class="col-md-4 col-sm-6 col-xs-12 boxOut-visiMisiLeftPadding">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-visiMisiTitle font-AvenirLtStd-Roman">
                                    <?= __("VISION") ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-visiMisiText font-AvenirLtStd-Roman">
                                <?= $this->MultiLang->readLangClassic($aboutUs['About'], "vision") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12 boxOut-visiMisiRightPadding">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-visiMisiTitle font-AvenirLtStd-Roman">
                                    <?= __("MISSION" )?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-visiMisiText font-AvenirLtStd-Roman">
                                <?= $this->MultiLang->readLangClassic($aboutUs['About'], "mission") ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-shadow"></div>
    </div>
</section>