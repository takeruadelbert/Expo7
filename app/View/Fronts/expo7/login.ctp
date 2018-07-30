<div class="row background">
    <div class="col-md-12 col-sm-12 col-xs-12 fit-screen" style="background-image: url('<?= Router::url("/front_file/expo7/img/icon/background-middleLogin.png", true) ?>')">
        <div id="yourEl" class="col-md-12 col-sm-12 col-xs-12 boxOut-middleLogin">

            <div class="col-md-12 col-sm-12 col-xs-12 box-middleContent flex">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 center">
                        <img class="img-logoLogin" src="<?= Router::url("/front_file/expo7/img/icon/header-logo7.png", true) ?>">
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="boxOut-loginContent center-block">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-12 boxOut-loginLeft" style="background-image: url('<?= Router::url("/front_file/expo7/img/icon/login-leftIcon.png", true) ?>')">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-loginLeft-title font-AvenirLtStd-Roman">
                                            <?= $this->MultiLang->readLangClassic($dataLogin['FrontLoginPage'], "title") ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-loginLeft-text font-MyriadProRegular">
                                            <?= $this->MultiLang->readLangClassic($dataLogin['FrontLoginPage'], "content") ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12 boxOut-loginRight">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-user">
                                            <?php
                                            echo $this->Form->create("Account", ['type' => 'post', 'action' => 'login']);
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-username">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleLogin font-MyriadProRegular">
                                                            USERNAME
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" class="form-control input-fieldKomfirmasi font-AvenirLtStd-Roman" placeholder="your email / username" name="data[User][email]">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleLogin font-MyriadProRegular">
                                                            PASSWORD
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="password" class="form-control input-fieldPassword font-AvenirLtStd-Roman" placeholder="" name="data[User][password]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-buttonLogin">
                                                    <button type="submit" class="btn button-login font-AvenirLtStd-Roman">LOGIN</button>
                                                </div>
                                            </div>
                                            <?= $this->Form->end() ?>
                                            <!--                                            <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-email">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleLogin font-MyriadProRegular">
                                                                                                        EMAIL
                                                                                                    </div>
                                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                        <input type="text" class="form-control input-fieldPassword font-AvenirLtStd-Roman" placeholder="">
                                                                                                    </div>
                                                                                                </div>
                                            
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonReset">
                                                                                                <button type="button" class="btn button-resetPassword font-AvenirLtStd-Roman">RESET PASSWORD</button>
                                                                                            </div>
                                                                                        </div>
                                            -->                                            
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-buttonLupa box-lupaPassword">
                                                    <button type="button" class="btn button-lupa font-MyriadProRegular"><a href="<?= Router::url("/forget-password", true) ?>"><?= __("Forget Password ?") ?></a></button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-buttonReset box-login">
                                                    <button type="button" class="btn button-reset font-MyriadProRegular">Login</button>
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
</div>
<script>
//    $(document).ready(function () {
//        $('.box-lupaPassword').find('.button-lupa').on('click', function (e) {
//            $(this).parents('.boxOut-user').find('.box-username').hide(20);
//            $(this).parents('.boxOut-user').find('.box-checkBox').hide();
//            $(this).parents('.boxOut-user').find('.box-lupaPassword').hide();
//            $(this).parents('.boxOut-user').find('.box-buttonLogin').hide();
//            $(this).parents('.boxOut-user').find('.boxCheckBox').hide();
//            $(this).parents('.boxOut-user').find('.box-email').show(20);
//            $(this).parents('.boxOut-user').find('.boxOut-buttonReset').show(20);
//            $(this).parents('.boxOut-user').find('.box-login').show();
//            $(this).parents('.boxOut-user').find('.box-buttonReset').show();
//        });
//
//        $('.box-login').find('.button-reset').on('click', function (e) {
//            $(this).parents('.boxOut-user').find('.box-username').show(20);
//            $(this).parents('.boxOut-user').find('.box-checkBox').show();
//            $(this).parents('.boxOut-user').find('.box-lupaPassword').show();
//            $(this).parents('.boxOut-user').find('.box-buttonLogin').show();
//            $(this).parents('.boxOut-user').find('.boxCheckBox').show();
//            $(this).parents('.boxOut-user').find('.box-email').hide(20);
//            $(this).parents('.boxOut-user').find('.boxOut-buttonReset').hide();
//            $(this).parents('.boxOut-user').find('.box-login').hide();
//            $(this).parents('.boxOut-user').find('.box-buttonReset').hide();
//        });
//
//        $('input,textarea').focus(function () {
//            $(this).data('placeholder', $(this).attr('placeholder'))
//                    .attr('placeholder', '');
//        }).blur(function () {
//            $(this).attr('placeholder', $(this).data('placeholder'));
//        });
//
//
//    });
</script>