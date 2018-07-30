<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content">
            <div class="boxOut-contentLeft inherit">
                <ul class="nav nav-tabs tabs-left font-RobotoCondensed-Bold">
                    <?php
                    foreach ($dataKnowledgeBase as $i => $knowledgeBases) {
                    ?>
                    <li>
                        <a href="#tabBase-<?= $i ?>" data-toggle="tab"><?= $knowledgeBases['KnowledgeBase']['title'] ?></a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="boxOut-contentRight inherit">
                <div class="tab-content inherit">
                    <?php
                    $is_active = "";
                    foreach ($dataKnowledgeBase as $i => $items) {
                        if($i == 0) {
                            $is_active = "active";
                        } else {
                            $is_active = "";
                        }
                    ?>
                    <div class="tab-pane inherit mCustomScrollbar <?= $is_active ?>" data-mcs-theme="dark-3" id="tabBase-<?= $i ?>">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleTab font-RobotoCondensed-Bold">
                                <?= $items['KnowledgeBase']['title'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textTab font-RobotoCondensed-Light">
                                <?= $items['KnowledgeBase']['description'] ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>