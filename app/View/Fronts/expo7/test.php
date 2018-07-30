<!DOCTYPE html>
<html>
    <head>
        <title>Games</title>
        <meta http-equiv="refresh" content="3" />
        <!--css-->
        <!--==================================================-->
        <?php include '_css.php'; ?>
        <link rel="stylesheet" href="../css/custom/games.css">
        <link rel="stylesheet" href="../css/custom/gamess.css">
        <link rel="stylesheet" href="../css/custom/nav.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </head>
    <body class="body-offcanvas">


        <!-- Header -->
        <!--==================================================-->
        <header>
            <?php include '_header.php'; ?>
        </header>


        <!-- Container -->
        <!--==================================================-->

        <section id="content">

            <div class="col-md-3 col-sm-4 col-xs-4 boxOut-step1">
                <div class="col-md-12 col-sm-12 col-xs-12 categorie font-MyriadProRegular">
                    <nav>
                        <div class="container-fluid">
                            <div class="row">
                                <ul class="topnav">
                                    <li><div class="sidebar-header">
                                            <h3 style="font-weight:bold" class="font">CATEGORIES</h3>
                                        </div></li>
                                    <li class="icon"><a href="javascript:void(0);" onclick="myFunction()"><span class="jarak">&#9776;</span></a> </li>
                                    <li><a href="#">Action</a></li>
                                    <li class="active"><a href="#">Adventure</a></li>
                                    <li ><a href="#">Arcade</a></li>
                                    <li ><a href="#">Board</br></a></li>
                                    <li ><a href="#">Card</a></li>
                                    <li ><a href="#">Casino</a></li>
                                    <li ><a href="#">Casual</a></li>
                                    <li ><a href="#">Educational</a></li>
                                    <li ><a href="#">Music</a></li>
                                    <li ><a href="#">Puzzle</a></li>
                                    <li ><a href="#">Racing</a></li>
                                    <li ><a href="#">Role Playing</a></li>
                                    <li ><a href="#">Simulation</a></li>
                                    <li ><a href="#">Sports</a></li>
                                    <li ><a href="#">Strategy</a></li>
                                    <li ><a href="#">Trivia</a></li>
                                    <li ><a href="#">Words</a></li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row backgroundContent container-padding">
                <div class="row">
                    <div class="col-md-12 col-sm-8 col-xs-8 well">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 title font-MyriadProRegular">
                                    <ul class="nav nav-tabs">
                                        <li><a href="#home" aria-controls="home" role="tab" data-toggle="tab">HOME</a> </li>
                                        <li><a href="#home" aria-controls="home" role="tab" data-toggle="tab">MOST&ensp;POPULAR</a></li>
                                        <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">NEW&ensp;RELEASE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="settings">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 sub font-MyriadProRegular">
                                            <ul class="breadcrumb">
                                                <li><a href="#">Games</a></li>
                                                <li><a href="#">Categories</a></li>
                                                <li><a href="#">Adventure</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-2 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-1.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    CROSS THE RIVER CROSS THE RIVER CROSS THE RIVER
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold" onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-2 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-2.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    BOB’S ADVENTURE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-3.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    NEIL’S LANDING
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-1.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    CROSS THE RIVER
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold" onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-2.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    BOB’S ADVENTURE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-3.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    NEIL’S LANDING
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-1.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    CROSS THE RIVER
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold" onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-2.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    BOB’S ADVENTURE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-3.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    NEIL’S LANDING
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-1.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    CROSS THE RIVER
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold" onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-2.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    BOB’S ADVENTURE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-3.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    NEIL’S LANDING
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-3.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    NEIL’S LANDING
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-1.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    CROSS THE RIVER
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold" onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-2.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    BOB’S ADVENTURE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="boxOut-gameImg center-block">
                                        <div class="col-md-12 col-sm-6 col-xs-12 box-gameImg">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                    <img src="../img/produk/game-img-3.png">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                    NEIL’S LANDING
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-hover">
                                            <button type="button" class="btn button-circle font-RobotoCondensed-Bold"  onclick='window.location.assign("detailGames.php")'>DETAIL GAME</button>
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


<!--Footer-->
<!--==================================================-->
<footer>
    <?php include '_footer.php'; ?>
</footer>


</body>
<!--js-->
<!--==================================================-->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">;
                                                function myFunction() {
                                                    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
                                                }
                                                $(document).ready(function () {
                                                    var stickyNavTop = $('.boxOut-step1').offset().top;
                                                    var stickyNav = function () {
                                                        var scrollTop = $(window).scrollTop();
                                                        // Kondisi jika discroll maka menu akan selalu diatas, dan sebaliknya
                                                        if (scrollTop > stickyNavTop) {
                                                            if (document.documentElement.clientWidth < 768) {
                                                                $('.boxOut-step1').css({'position': 'fixed', 'color': '#00bff3', 'z-index': 9999})
                                                            } else {
                                                                $('.boxOut-step1').css({'position': 'relative'})
                                                            }
                                                        } else {
                                                            $('.boxOut-step1').css({'position': 'relative'})
                                                        }
                                                    };
// Jalankan fungsi
                                                    stickyNav();
                                                    $(window).scroll(function () {
                                                        stickyNav();
                                                    });
                                                });

</script>
<?php include './_js.php'; ?>
</html>
