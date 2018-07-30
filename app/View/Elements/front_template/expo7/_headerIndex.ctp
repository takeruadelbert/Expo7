<div id="nav" class="row navbar-fixed-top">
    <div class="row header-rowBacground">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-headerBlue">
                        <div class="col-md-2 col-sm-1 col-xs-12 background-logoMobile inherit">
                            <a class="inherit "href="index.php">
                                <img class="img-logoHeader hidden-xs" src="<?php echo Router::url("/front_file/expo7/img/icon/header-logo2.png", true) ?>">
                                <img class="img-logoHeader2 center-block hidden-lg hidden-md hidden-sm" src="<?php echo Router::url("/front_file/expo7/img/icon/header-logo3.png", true) ?>">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-9 col-xs-3">
                            <div id="nav">
                                <div class="navbar navbar-default navbar-static navbar-edit" style="margin-bottom: 0px;">
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
                                                <a href="index.php">
                                                    <img src="<?php echo Router::url("/front_file/expo7/img/icon/header-logo3.png", true) ?>">
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

                                        <ul class="nav navbar-nav editUl-tab navbar-edit-1 font-PoppinsSemiBold">
                                            <li class="header-navbar-li tab-title active">
                                                <a href="aboutUs.php">
                                                    <div class="border-bottom">
                                                        About
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="howTo.php">
                                                    <div class="border-bottom">
                                                        How To
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="instruction.php">
                                                    <div class="border-bottom">
                                                        Instruction
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="#">
                                                    <div class="border-bottom">
                                                        Games
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="n">
                                                    <div class="border-bottom">
                                                        News
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="ourTestimonies.php">
                                                    <div class="border-bottom">
                                                        Testimonies
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="#">
                                                    <div class="border-bottom">
                                                        Gallery
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="#">
                                                    <div class="border-bottom">
                                                        Event
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="header-navbar-li tab-title">
                                                <a href="contact.php">
                                                    <div class="border-bottom">
                                                        Contact
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-9 boxOut-logiBahasa">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-login font-RobotoCondensed-Bold">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-login">
                                    <?php
                                    if ($memberEngine->isLoggedIn()) {
                                        ?>
                                        <button type="button" class="btn button-header font-PoppinsLight"><a href="<?= Router::url("/member/dashboard", true) ?>">Dashboard</a></button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn button-login2 font-PoppinsLight a-login"><img src="<?php echo Router::url("/front_file/expo7/img/icon/login-logoHeader2.png", true) ?>">Login</button>
                                        <?php
                                    }
                                    ?>
                                    <div class="boxOut-language">
                                        <div class="col-md-3 col-sm-3 col-xs-3 header-bahasa" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/header-bhsIndo.png", true) ?>">
                                            &nbsp;
                                        </div>
                                        <div class = "col-md-9 col-sm-9 col-xs-9 boxOut-dropdown-bahasa">
                                            <select class = "form-control dropdown-bahasa font-PoppinsLight">
                                                <option value = "" selected>INA</option>
                                                <option value = "">ENG</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class = "login-popup">
                                    <form action="#" id="memberlogin">
                                        <div class = "login-arrow"></div>
                                        <div class = "col-md-12 col-sm-12 col-xs-12">
                                            <div class = "row">
                                                <div class = "col-md-12 col-sm-12 col-xs-12 login-title">
                                                    Username/Email
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12 col-sm-12 col-xs-12">
                                                    <input id="memberusername" type = "text" placeholder = "" class = "form-control field-login font-Roboboto" >
                                                </div>
                                            </div>

                                            <div class = "row">
                                                <div class = "col-md-12 col-sm-12 col-xs-12 login-title">
                                                    Password
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12 col-sm-12 col-xs-12">
                                                    <input id="memberpassword" type = "password" placeholder = "" class = "form-control field-login font-Roboboto" >
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12 col-sm-12 col-xs-12">
                                                    <div class = "col-md-12 col-sm-12 col-xs-12 boxCheckBox font-Roboto-Light">
                                                        <div class = "checkbox edit-checbox">
                                                            <input id = "promo" type = "checkbox">
                                                            <label for = "promo">
                                                                Forgot your password
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12 col-sm-12 col-xs-12 center">
                                                    <button type = "submit" class = "btn button-login font-RobotoCondensed-Bold">LOGIN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>