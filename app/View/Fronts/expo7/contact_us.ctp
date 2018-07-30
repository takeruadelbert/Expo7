<section id="content">
    <div class="row">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 container-padding">
                <div id="map-canvas" class="col-md-12 col-sm-12 col-xs-12 boxOut-map">

                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -50px;">
                        <div class="col-md-12 col-sm-12 col-xs-12 backgroundContent">
                            <div class="container">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-triangle">
                                    <div class="col-md-5 col-sm-5 col-xs-5"></div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="arrow-map center-block">

                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contactTitle">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 font-AvenirLtStd-Black center">
                                                        <?= __("CONTACT US") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 font-AvenirLtStd-Light text-center">
                                                        <?= $this->MultiLang->readLangClassic($dataContact['Contact'], "description") ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakContent">
                                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-listLeft font-AvenirLtStd-Light">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakMarginFirst boxOut-listLeftContact">
                                                            <div class="col-md-1 col-sm-1 col-xs-2">
                                                                <img class="imgContact-1" src="<?= Router::url("/front_file/expo7/img/icon/contact-left-1.png", true) ?>">
                                                            </div>
                                                            <div class="col-md-11 col-sm-11 col-xs-10">
                                                                <?= $this->MultiLang->readLangClassic($dataContact['Contact'], "address") ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakMargin boxOut-listLeftContact">
                                                            <div class="col-md-1 col-sm-1 col-xs-2">
                                                                <img class="imgContact-2" src="<?= Router::url("/front_file/expo7/img/icon/contact-left-2.png", true) ?>">
                                                            </div>
                                                            <div class="col-md-11 col-sm-11 col-xs-10">
                                                                <?= $dataContact['Contact']['phone'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="row">
                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listLeftContact">
                                                                                                                <div class="col-md-1 col-sm-1 col-xs-2">
                                                                                                                    <img class="imgContact-4" src="<? Router::url("/front_file/expo7/img/icon/contact-left-4.png", true) ?>">
                                                                                                                </div>
                                                                                                                <div class="col-md-11 col-sm-11 col-xs-10">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleContact-Red">
                                                                                                                            Online Customer Service
                                                                                                                        </div>
                                                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contactLeft-button">
                                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                                                <button type="button" class="btn button-online">ONLINE</button>
                                                    
                                                                                                                                <button type="button" class="btn button-offline">OFFLINE</button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>-->
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-listRight font-AvenirLtStd-Light">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listLeftContact">
                                                            <div class="col-md-1 col-sm-1 col-xs-2">
                                                                <img class="imgContact-3" src="<?= Router::url("/front_file/expo7/img/icon/contact-left-3.png", true) ?>">
                                                            </div>
                                                            <div class="col-md-11 col-sm-11 col-xs-10">
                                                                <?= $this->MultiLang->readLangClassic($dataContact['Contact'], "email") ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="row">
                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listLeftContact">
                                                                                                                <div class="col-md-1 col-sm-1 col-xs-2">
                                                    
                                                                                                                </div>
                                                                                                                <div class="col-md-11 col-sm-11 col-xs-10">
                                                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleContact-Red">
                                                                                                                        Email Support
                                                                                                                    </div>
                                                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleContact-black">
                                                                                                                        Pembayaran : billing@ilugroupmultimedia.co.id
                                                                                                                    </div>
                                                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleContact-black">
                                                                                                                        Technical Support : support@ilugroupmultimedia.co.id
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listLeftContact">
                                                                                                                <div class="col-md-1 col-sm-1 col-xs-2">
                                                                                                                    <img class="imgContact-4" src="<? Router::url("/front_file/expo7/img/icon/contact-left-4.png", true) ?>">
                                                                                                                </div>
                                                                                                                <div class="col-md-11 col-sm-11 col-xs-10">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleContact-Red">
                                                                                                                            Technical Support
                                                                                                                        </div>
                                                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contactLeft-button">
                                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                                                <button type="button" class="btn button-online">ONLINE</button>
                                                    
                                                                                                                                <button type="button" class="btn button-offline">OFFLINE</button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>-->
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        echo $this->Form->create("ContactMessage", ['type' => "post", 'action' => 'contact', 'id' => "contactUs"]);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-bottomContact">
                                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-listLeftBottom font-AvenirLtStd-Light">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listRightContact">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rightTitle">
                                                                <?= __("Name") ?>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <input type="text" placeholder="" class="form-control field-contact-right font-AvenirLtStd-Light" name="data[ContactUs][name]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listRightContact">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rightTitle">
                                                                <?= __("Email") ?>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <input type="text" placeholder="" class="form-control field-contact-right font-AvenirLtStd-Light" name="data[ContactUs][email]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listRightContact">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rightTitle">
                                                                <?= __("Phone Number") ?>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <input type="text" placeholder="" class="form-control field-contact-right font-AvenirLtStd-Light" name="data[ContactUs][phone_number]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-listRightBottom font-AvenirLtStd-Light">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listRightContact">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rightTitle">
                                                                <?= __("Company / Merk") ?>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <input type="text" placeholder="" class="form-control field-contact-right font-AvenirLtStd-Light" name="data[ContactUs][company]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listRightContact">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rightTitle">
                                                                <?= __("Message") ?>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <textarea id="textAreaResize" class="form-control editTextArea font-AvenirLtStd-Light" placeholder="" name="data[ContactUs][message]"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listRightContact">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-captcha">
                                                                <div class="g-recaptcha" data-theme="white" data-sitekey="<?= _RECAPTCHA_SITE_KEY ?>" style="transform:scale(0.5);-webkit-transform:scale(0.5);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                                                <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-buttonRight-Red">
                                                                <button type="submit" class="btn button-kirim font-AvenirLtStd-Light">
                                                                    <div>
                                                                        <?= __("SEND") ?>
                                                                    </div>
                                                                    <img class="imgContact-arrow" src="<?= Router::url("/front_file/expo7/img/icon/contact-buttonArrow.png", true) ?>">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->end() ?>
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
        var lat = <?= $dataContact['Contact']['latitude'] ?>;
        var long = <?= $dataContact['Contact']['longitude'] ?>;

        $.ajax({
            url: "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long + "&sensor=true",
            type: "GET",
            dataType: "JSON",
            data: {},
            success: function (response) {
                var address = response.results[0].formatted_address;
                initialize(lat, long, address);
            }
        });

        $("#contactUs").validate({
            ignore: ".ignore",
            rules: {
                "data[ContactUs][name]": {
                    required: true
                },
                "data[ContactUs][email]": {
                    required: true,
                    email: true
                },
                "data[ContactUs][phone_number]": {
                    required: true,
                    number: true
                },
                "data[ContactUs][company]": {
                    required: true
                },
                "data[ContactUs][message]": {
                    required: true
                },
                hiddenRecaptcha: {
                    required: function() {
                        if(grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                hiddenRecaptcha: "recaptcha is required!"
            }
        });

    });

    function initialize(lat, long, address) {
        setMap(lat, long, address);
    }
</script>