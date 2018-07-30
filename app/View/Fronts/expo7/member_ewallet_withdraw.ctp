<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content">
            <?php
            $at_wd_token = "disabled";
            $at_wd_otp = "disabled";
            $at_wd_notice = "disabled";
            $at_wd_complete = "disabled";
            switch ($currentWdStep) {
                case "wd_token":
                    $at_wd_token = "active";
                    break;
                case "wd_otp":
                    $at_wd_otp = "active";
                    break;
                case "wd_notice":
                    $at_wd_notice = "active";
                    break;
                case "wd_complete":
                    $at_wd_complete = "active";
                    break;
            }
            ?>
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="li-1 <?= $at_wd_token ?>">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Confirm your identity">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("CONFIRM YOUR IDENTITY") ?>
                                    </div>
                                </a>
                            </li>

                            <li role="presentation" class="li-2 <?= $at_wd_otp ?>">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Verify OTP or Email">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("VERIFY OTP") ?>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation" class="li-3 <?= $at_wd_notice ?>">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Notice">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("NOTICE") ?>
                                    </div>
                                </a>
                            </li>

                            <li role="presentation" class="li-4 <?= $at_wd_complete ?>">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completed">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("COMPLETED") ?>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane <?= $at_wd_token ?>" role="tabpanel" id="step1">
                            <?php echo $this->Form->create() ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step">
                                    <div class="col-md-6 col-sm-6 col-xs-12 boxOut-fieldLeft">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-field-textTitle font-RobotoCondensed">
                                                <?= __("Username") ?> :
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-field-icon form-group has-feedback">
                                                <input type="text" class="form-control field-icon font-RobotoCondensed" placeholder="" id="sudousername" name="data[username]">
                                                <span class="fa form-control-feedback field-icon-user right" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 boxOut-fieldRight">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-field-textTitle font-RobotoCondensed">
                                                <?= __("Password") ?> :
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-field-icon form-group has-feedback">
                                                <input type="password" class="form-control field-icon font-RobotoCondensed" placeholder="" id="sudopassword" name="data[password]">
                                                <span class="fa form-control-feedback field-icon-password right" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 center">
                                    <button type="submit" class="btn button-next font-RobotoCondensed sudosu"><?= __("Confirm") ?></button>
                                </div>
                            </div>
                            <input type="hidden" name="data[step]" value="wd_token"/>
                            <?php echo $this->Form->end() ?>
                        </div>
                        <div class="tab-pane <?= $at_wd_otp ?>" role="tabpanel" id="step2">
                            <?php echo $this->Form->create() ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-content-step">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-step2-1">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="boxOut-select center-block">
                                                    <div class="checkbox edit-checbox font-RobotoCondensed">
                                                        <input id="otp" class="select" name="data[otp_type]" type="checkbox" value="sms">
                                                        <label for="otp">
                                                            <?= __("Obtain OTP By SMS") ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="boxOut-select center-block">
                                                    <div class="checkbox edit-checbox font-RobotoCondensed">
                                                        <input id="email" class="select" name="data[otp_type]" type="checkbox" value="email">
                                                        <label for="email">
                                                            <?= __("Obtain OTP By Email") ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-step2-2">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-verify center-block">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-field-textTitle font-RobotoCondensed">
                                                    <?= __("Obtain code from OTP or email") ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-field-icon form-group has-feedback">
                                                    <input type="text" class="form-control field-otpEmail font-RobotoCondensed verificationCode" placeholder="" name="data[verification_code]" maxlength="8">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-step2-3">
                                        <div class="boxOut-step2-next center-block">
                                            <img src="<?= Router::url("/front_file/expo7/img/icon/ceklis-white.png", true) ?>">
                                            <div class="ceklis-title font-RobotoCondensed-Bold">
                                                <?= __("IDENTITY VERIFIED") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-button center">
                                    <div class="col-md-12 col-sm-12 col-xs-12 button-step2-1">
                                        <button type="button" class="btn button-next button-select font-RobotoCondensed getverifycode"><?= __("SELECT") ?></button>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 button-step2-2">
                                        <button type="submit" class="btn button-next button-verify font-RobotoCondensed">VERIFY</button>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 button-step2-3">
                                        <button type="button" class="btn button-next next-step font-RobotoCondensed">NEXT</button>
                                    </div>
                                </div>
                                <input type="hidden" name="data[step]" value="wd_otp"/>
                            </div>
                            <?php echo $this->Form->end() ?>
                        </div>
                        
                        <div class="tab-pane <?= $at_wd_notice ?>" role="tabpanel" id="step3">
                            <?= $this->Form->create() ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-content-step-3">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step boxOut-content-step-3">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-step3-text font-RobotoCondensed-Light">
                                                - you account will no longer be held by our premises, meaning if your downline are still continuing any value you earn will not be able to be claimed and will instead be redirected to the bussiness  (Westwood Inc.)
                                                <br>
                                                - We will refund the money back fully ($12.98) with charges that may apply during transaction.
                                                <br>
                                                - if you haven’t paid your $12.98 membership, your account will only be disposed and referalls will be notified that they’re able to their used invitation
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-checbox-agree">
                                                <div class="checkbox edit-checbox edit-checbox-agree font-RobotoCondensed-Light">
                                                    <input id="agree" class="select" name="data[is_agree]" type="checkbox" value="1">
                                                    <label for="agree">
                                                        I agree with the following conditions
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 center">
                                    <button type="submit" class="btn button-next next-step font-RobotoCondensed"><?= __("NEXT") ?></button>
                                </div>
                            </div>
                            <input type="hidden" name="data[step]" value="wd_notice">
                            <?= $this->Form->end() ?>
                        </div>
                        
                        <div class="tab-pane <?= $at_wd_complete ?>" role="tabpanel" id="complete">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step boxOut-content-logout ">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-success-text font-RobotoCondensed-Bold">
                                            <?= __("SUCCESS !!!") ?>
                                        </div>
                                    </div>
<!--                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-success-logout font-RobotoCondensed-Light">
                                            Loggin out in   01:00
                                        </div>
                                    </div>-->
                                </div>
<!--                                <div class="col-md-12 col-sm-12 col-xs-12 center">
                                    <button type="button" class="btn button-logout next-step font-RobotoCondensed">LOGOUT</button>
                                </div>-->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

//        $(".next-step").click(function (e) {
//
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//
//        });
//        $(".prev-step").click(function (e) {
//
//            var $active = $('.wizard .nav-tabs li.active');
//            prevTab($active);
//
//        });
    });

//    function nextTab(elem) {
//        $(elem).next().find('a[data-toggle="tab"]').click();
//    }
//    function prevTab(elem) {
//        $(elem).prev().find('a[data-toggle="tab"]').click();
//    }
//
//    function step2() {
//        $(".li-1").addClass("disabled");
//        $(".li-2").removeClass('disabled').find('a[data-toggle="tab"]').click();
//    }
</script>
<script>
    $(document).ready(function () {

        var $jasa = $('input.select');
        var is_checked = false;
        var verification_method = "";
        var account_id = <?= $this->Session->read("credential.member.Account.id") ?>;
        $jasa.click(function () {
            $jasa.filter(':checked').not(this).removeAttr('checked');
        });

        $('.boxOut-content-button').find('.button-select').on('click', function (e) {
            $("input:checkbox[name='data[otp_type]']").each(function () {
                if ($(this).is(":checked")) {
                    is_checked = true;
                    verification_method = $(this).val();
                }
            });
            if (is_checked) {
                $(this).parents('.box-content-step').find('.box-step2-1').hide();
                $(this).parents('.box-content-step').find('.button-step2-1').hide();
                $(this).parents('.box-content-step').find('.box-step2-2').show();
                $(this).parents('.box-content-step').find('.button-step2-2').show();
                if (verification_method == "sms") { // OTP Verfication Code via SMS

                } else { // otherwise via email
                    $.ajax({
                        url: BASE_URL + "/member/members/sent_verification_code/" + account_id,
                        type: "PUT",
                        dataType: "JSON",
                        data: {},
                        success: function (response) {
//                            console.log(response);
                            if (response.status == 200) {
                                $.growl.notice({
                                    title: "Notice",
                                    message: "We have sent verification code to your email. Please check your inbox."
                                });
                            } else {
                                $.growl.warning({
                                    title: "Warning",
                                    message: response.message
                                });
                            }
                        }
                    });
                }
            } else {
                $.growl.warning({
                    title: "Warning",
                    message: "Please select one of Verfication OTP methods!"
                });
            }
        });

        $('.boxOut-content-button').find('.button-verify').on('click', function (e) {
//            $(this).parents('.box-content-step').find('.box-step2-2').hide();
//            $(this).parents('.box-content-step').find('.button-step2-2').hide();
//            $(this).parents('.box-content-step').find('.box-step2-3').show();
//            $(this).parents('.box-content-step').find('.button-step2-3').show();
        });
    });
</script>