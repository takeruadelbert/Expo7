<style>
    .well {
        background-color: white;
        padding: 0px;
    }
</style>

<section id="content">
    <div class="col-md-2 col-sm-2 col-xs-2">
        <nav class="navbar navbar-default col-md-10" style="margin-top:100px;">
            <div class="container-fluid">
                <nav id="sidebar">
                    <div class="row">
                        <div class="sidebar-header">
                            <h3 style="font-weight: bold;"><?= __("CATEGORIES") ?></h3>
                            <strong>BS</strong>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 categorie font-MyriadProRegular">
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="list-unstyled components">
                                <?php
                                $is_active_all = "";
                                $is_active = "";
                                $color = "";
                                if (!empty($categoryGames)) {
                                    if (!isset($this->request->query['category']) && empty($this->request->query['category'])) {
                                        $is_active_all = "active";
                                        $color = "";
                                    } else {
                                        $is_active_all = "";
                                        $color = "black";
                                    }
                                    ?>
                                    <li class="<?= $is_active_all ?>"><a href="<?= Router::url("/game", true) ?>" style="color: <?= $color ?>;"><?= __("All") ?></a></li>
                                    <?php
                                    foreach ($categoryGames as $category) {
                                        if (isset($this->request->query['category']) && !empty($this->request->query['category'])) {
                                            $is_active = $category['CategoryGame']['name'] == $this->request->query['category'] ? "active" : "";
                                            $color = $category['CategoryGame']['name'] == $this->request->query['category'] ? "" : "black";
                                        } else {
                                            $is_active = "";
                                            $color = "black";
                                        }
                                        ?>
                                        <li class="<?= $is_active ?>"><a href="<?= Router::url("/game?category={$category['CategoryGame']['name']}", true) ?>" style="color: <?= $color ?>;"><?= $category['CategoryGame']['name'] ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
    </div>
    <div class="row backgroundContent container-padding">
        <div class="row">
            <div class="tab-content">
                <div class="col-md-8 col-sm-8 col-xs-8 well" style="min-height: 800px;">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sub font-MyriadProRegular">
                                <?= strtoupper($current_category) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!empty($listGames)) {
                        foreach ($listGames as $game) {
                            $title = seoUrl($game['Game']['name']);
                            ?>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="boxOut-gameImg center-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-gameImg">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-img">
                                                <img src="<?= Router::url($game['Game']['thumbnail_path'], true) ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-img  font-MyriadProRegular">
                                                <?= $game['Game']['name'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-hover">
                                        <button type="button" class="btn button-circle font-RobotoCondensed-Bold" onclick='window.location.assign("<?= Router::url("/game/{$game['Game']['id']}/{$title}", true) ?>")'>DETAIL GAME</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>                
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>