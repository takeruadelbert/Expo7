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
                                            echo $this->Form->create("Account", ['type' => 'post', 'id' => 'forgetPassword', 'action' => 'forget_password']);
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-username">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleLogin font-MyriadProRegular">
                                                            EMAIL
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" class="form-control input-fieldKomfirmasi font-AvenirLtStd-Roman" placeholder="your email ..." name="data[User][email]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-buttonLogin">
                                                    <button type="submit" class="btn button-login font-AvenirLtStd-Roman">SUBMIT</button>
                                                </div>
                                            </div>
                                            <?= $this->Form->end() ?>                                 
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-buttonLupa box-lupaPassword">
                                                    <button type="button" class="btn button-lupa font-MyriadProRegular"><a href="<?= Router::url("/login", true) ?>"><?= __("Sign In") ?></a></button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-buttonReset box-login">
                                                    <button type="button" class="btn button-reset font-MyriadProRegular">Submit</button>
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
    $(document).ready(function() {
        $("#forgetPassword").validate({
            rules: {
                "data[User][email]" : {
                    required: true,
                    email: true
                }
            }
        })
    });
</script>