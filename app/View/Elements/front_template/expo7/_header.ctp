<div id="nav" class="row navbar-fixed-top">
    <div class="row header-rowBackgroundIndex">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-headerBlue">
                    <div class="col-md-2 col-sm-1 col-xs-12 background-logoMobile inherit">
                        <a class="inherit "href="index.php">
                            <img class="img-logoHeader2 center-block hidden-lg hidden-md hidden-sm" src="<?= Router::url("/front_file/expo7/img/icon/header-logo5.png", true) ?>">
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-9 col-xs-3">
                        <div id="nav">
                            <div class="navbar navbar-default navbar-static navbar-edit center-block" style="margin-bottom: 0px;">
                                <div class="navbar-header page-scroll toogle-padding">
                                    <button type="button" class="col-md-12 col-sm-12 col-xs-12 navbar-toggle offcanvas-toggle navbar-toggle-edit pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-left">
                                                <a class="navbar-brand header-brand">Menu</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="padding-spanBar">
                                                <span class="icon-bar" style="color: white !important;"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </span>
                                        </div>
                                    </button>
                                </div>


                                <div id="js-bootstrap-offcanvas" class="navbar-offcanvas navbar-offcanvas-touch">

                                    <div class="row">
                                        <div class="hidden-lg hidden-md hidden-sm col-xs-12 boxOut-sideMenu flex">
                                            <a href="<?= Router::url("/", true) ?>">
                                                <img src="<?= Router::url("/front_file/expo7/img/icon/header-logo3.png", true) ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-lg hidden-md hidden-sm col-xs-12 boxOut-titleMenu">
                                            <div class="col-xs-12 box-titleMenu font-oswald">
                                                Menu
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="nav navbar-nav editUl-tab navbar-edit-1 font-MyriadProRegular">
                                        <?php
                                        $is_active1 = "";
                                        $is_active2 = "";
                                        $is_active3 = "";
                                        $is_active4 = "";
                                        $is_active5 = "";
                                        $is_active6 = "";
                                        $is_active7 = "";
                                        $is_active8 = "";
                                        $is_active9 = "";
                                        $is_active10 = "";
                                        switch ($page) {
                                            case "index" :
                                                $is_active1 = "active";
                                                break;
                                            case "about_us" :
                                                $is_active2 = "active";
                                                break;
                                            case "how_to" :
                                                $is_active3 = "active";
                                                break;
                                            case "instruction" :
                                                $is_active4 = "active";
                                                break;
                                            case "game" :
                                                $is_active5 = "active";
                                                break;
                                            case "detail_game" :
                                                $is_active5 = "active";
                                                break;
                                            case "play_game" :
                                                $is_active5 = "active";
                                                break;
                                            case "news" :
                                                $is_active6 = "active";
                                                break;
                                            case "detail_news" :
                                                $is_active6 = "active";
                                                break;
                                            case "our_testimonies" :
                                                $is_active7 = "active";
                                                break;
                                            case "gallery" :
                                                $is_active8 = "active";
                                                break;
                                            case "events" :
                                                $is_active9 = "active";
                                                break;
                                            case "detail_event" :
                                                $is_active9 = "active";
                                                break;
                                            case "contact_us" :
                                                $is_active10 = "active";
                                                break;
                                        }
                                        ?>
                                        <li class="header-navbar-li tab-title <?= $is_active1 ?>">
                                            <a href="<?= Router::url("/", true) ?>">
                                                <div class="border-bottom">
                                                    HOME
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header-navbar-li tab-title <?= $is_active2 ?>">
                                            <a href="<?= Router::url("/about", true) ?>">
                                                <div class="border-bottom">
                                                    <?= __("ABOUT US") ?>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header-navbar-li tab-title <?= $is_active3 ?>">
                                            <a href="<?= Router::url("/how-to", true) ?>">
                                                <div class="border-bottom">
                                                    <?= __("HOW TO") ?>
                                                </div>
                                            </a>
                                        </li>
<!--                                        <li class="header-navbar-li tab-title <? $is_active4 ?>">
                                            <a href="<? Router::url("/instruction", true) ?>">
                                                <div class="border-bottom">
                                                    INSTRUCTION
                                                </div>
                                            </a>
                                        </li>-->
                                        <li class="header-navbar-li tab-title <?= $is_active5 ?>">
                                            <a href="<?= Router::url("/game", true) ?>">
                                                <div class="border-bottom">
                                                    <?= __("GAMES") ?>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header-navbar-li tab-title <?= $is_active6 ?>">
                                            <a href="<?= Router::url("/news", true) ?>">
                                                <div class="border-bottom">
                                                    <?= __("NEWS") ?>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header-navbar-li tab-title <?= $is_active7 ?>">
                                            <a href="<?= Router::url("/our-testimonies", true) ?>">
                                                <div class="border-bottom">
                                                    <?= __("TESTIMONIES") ?>
                                                </div>
                                            </a>
                                        </li>
<!--                                        <li class="header-navbar-li tab-title <? $is_active8 ?>">
                                            <a href="<? Router::url("/gallery_photo_video", true) ?>">
                                                <div class="border-bottom">
                                                    GALLERY
                                                </div>
                                            </a>
                                        </li>-->
<!--                                        <li class="header-navbar-li tab-title <? $is_active9 ?>">
                                            <a href="<? Router::url("/events", true) ?>">
                                                <div class="border-bottom">
                                                    EVENT
                                                </div>
                                            </a>
                                        </li>-->
                                        <li class="header-navbar-li tab-title <?= $is_active10 ?>">
                                            <a href="<?= Router::url("/contact", true) ?>">
                                                <div class="border-bottom">
                                                    <?= __("CONTACT") ?>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-9 boxOut-logiBahasa">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-login font-RobotoCondensed-Bold">
                            <div class="col-md-12 col-sm-12 col-xs-12 box-login">
                                <?php
                                switch ($page) {
                                    case $page != "index" :
                                        $style = "color:#808080;";
                                        break;
                                    default :
                                        $style = "";
                                        break;
                                }
                                if (empty($this->Session->read("credential.member.Account.id"))) {
                                    ?>
                                <button type="button" class="btn button-login2 font-MyriadProRegular a-login" onclick="window.location='<?= Router::url("/login", true) ?>'">LOGIN</button>
                                    <?php
                                } else {
                                    ?>
                                <button type="button" class="btn button-login2 font-MyriadProRegular a-login" onclick="window.location='<?= Router::url("/member/dashboard", true) ?>'"><?= $this->Session->read("credential.member.Biodata.full_name") ?></button>
                                    <?php
                                }
                                
                                $is_eng_selected = "";
                                $is_ind_selected = "";
                                if ($this->Session->read("lang")) {
                                    $language = $this->Session->read("lang");
                                    $css_flag = $language == "ind" ? "header-bhsIndo" : "header-bhsEng";
                                    if($language == "ind") {
                                        $is_ind_selected = "selected";
                                        $is_eng_selected = "";
                                    } else {
                                        $is_ind_selected = "";
                                        $is_eng_selected = "selected";
                                    }
                                } else {
                                    $css_flag = "header-bhsEng";
                                    $is_ind_selected = "";
                                    $is_eng_selected = "selected";
                                }
                                ?>
                                <div class="boxOut-language">
                                    <div class="col-md-9 col-sm-9 col-xs-9 boxOut-dropdown-bahasa">
                                        <select class="form-control dropdown-bahasa font-MyriadProRegular" id="language">
                                            <option value="ind" <?= $is_ind_selected ?>>INA</option>
                                            <option value="eng" <?= $is_eng_selected ?>>ENG</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 header-bahasa" style="background-image: url('<?= Router::url("/front_file/expo7/img/icon/{$css_flag}.png", true) ?>">
                                        &nbsp;
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
        $("#language").on("change", function() {
            var lang = $(this).val();
            var url_query = lang == "ind" ? "?lang=ind" : "?lang=eng";
            window.location.href = window.location.href.split('?')[0] + url_query;
        });
    });
</script>