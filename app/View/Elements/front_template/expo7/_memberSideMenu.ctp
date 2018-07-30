<div class="col-md-3 left_col">
    <div class="left_col scroll-view" style="width: 100%;">

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="col-md-12 col-md-12 col-xs-12 boxOut-profilePicture-left" style="width: 100% !important;">
            <div class="col-md-12 col-sm-12 col-xs-12 dashboard-logo" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/dashboard-logo.png", true) ?>');">
            </div>
        </div>

        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                    <li class="<?= $page == "member_dashboard" ? "current-page" : "" ?>">
                        <a href="<?= Router::url("/member/dashboard", true) ?>">
                            <i class="fa">
                                <img class="dashboard-homeImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-home.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("Dashboard") ?>
                                </div>
                            </div>
                        </a>
                    </li>                    
                    <li>
                        <a href="<?= Router::url("/member/edit_profile", true) ?>">
                            <i class="fa">
                                <img class="dashboard-profileImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-editProfile.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("EDIT PROFILE") ?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Router::url("/member/downline/genealogytree", true) ?>">
                            <i class="fa">
                                <img class="dashboard-geneologyImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-geneology.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("GENEOLOGY TREE") ?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Router::url("/member/testimonial") ?>">
                            <i class="fa">
                                <img class="dashboard-testimonialImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-testimonial.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("TESTIMONIAL") ?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa">
                                <?php
                                $dataCountUnreadMessage = ClassRegistry::init("Message")->find("count", [
                                    "conditions" => [
                                        "Message.recipient_id" => $this->Session->read("credential.member.Account.id"),
                                        "Message.has_recipient_read" => 0,
                                    ],
                                    "recursive" => -1
                                ]);
                                ?>
                                <div class="count-menu center font-RobotoCondensed" id="unreadMessage">
                                    <?= $dataCountUnreadMessage ?>
                                </div>
                                <img class="dashboard-messagesImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-message.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("MESSAGES") ?>
                                </div>
                            </div>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="<?= Router::url("/member/message", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-message-1" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-newMessage.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("NEW MESSAGE") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/message/inbox", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-2-1 secondMenu-message-2" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-inbox.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-2-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("INBOX") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/message/sent", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-message-3" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-sent.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("SENT ITEM") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= Router::url("/member/knowledge_base") ?>">
                            <i class="fa">
                                <img class="dashboard-knowledgeImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-knowledge.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("KNOWLEDGE BASE") ?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa">
                                <?php
                                $count = 0;
                                $dataCountUnreadTicket = ClassRegistry::init("Ticket")->find("all", [
                                    'conditions' => [
                                        "Ticket.account_id" => $this->Session->read("credential.member.Account.id")
                                    ],
                                    'contain' => [
                                        'Child'
                                    ]
                                ]);
                                foreach ($dataCountUnreadTicket as $parent) {
                                    foreach ($parent['Child'] as $child) {
                                        if ($child['parent_id'] == $parent['Ticket']['id']) {
                                            if (!$child['has_member_read']) {
                                                $count++;
                                            }
                                        }
                                    }
                                }
                                ?>
                                <div class="count-menu center font-RobotoCondensed" id="unreadTicket">
                                    <?= $count ?>
                                </div>
                                <img class="dashboard-ticketingImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-ticketing.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("TICKETING SYSTEM") ?>
                                </div>
                            </div>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="<?= Router::url("/member/ticket", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-ticket-1" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-newTicket.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("NEW TICKET") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/ticket/all", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-2-1 secondMenu-ticket-2" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-allTicket.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-2-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("ALL TICKET") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/ticket/open", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-ticket-3" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-open.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("OPEN") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/ticket/in-progress", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-ticket-5" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-inProgress.png", true) ?>');">
<!--                                                <div class="count-menu2 center font-RobotoCondensed">
                                                    99
                                                </div>-->
                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("IN PROGRESS") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/ticket/solved", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-2-1 secondMenu-ticket-6" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-solved.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-2-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("SOLVED") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa">
                                <img class="dashboard-gamesImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-games.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("GAMES") ?>
                                </div>
                            </div>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="<?= Router::url("/member/upload-game", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-wallet-1" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/dashboard-upload.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("UPLOAD") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/game", true) ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-2-1 secondMenu-wallet-2" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/dashboard-expo.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-2-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("EXPO DEV PORTAL") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa">
                                <img class="dashboard-eWalletImg" src="<?php echo Router::url("/front_file/expo7/img/icon/dashboard-eWallet.png", true) ?>">
                            </i> 
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuText font-RobotoCondensed">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-menuText">
                                    <?= __("e-Wallet") ?>
                                </div>
                            </div>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="<?= Router::url("/member/ewallet/withdraw") ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-1-1 secondMenu-wallet-1" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-withdrawal.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-1-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("WITHDRAW") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>
                            <li>
                                <a href="<?= Router::url("/member/ewallet/history") ?>">
                                    <div class="fa inherit boxOut-secondMenu">
                                        <div class="col-md-12 col-sm-12 col-xs-12 inherit">
                                            <div class="width-secondMenu-img inherit secondMenu-color-2-1 secondMenu-wallet-2" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/secondMenu-history.png", true) ?>');">

                                            </div>
                                            <div class="width-secondMenu-text inherit secondMenu-color-2-2 secondMenu-text font-RobotoCondensed">
                                                <?= __("HISTORY") ?>
                                            </div>
                                        </div> 
                                    </div> 
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMenu">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 box-buttonMenu-up">
                            <a href="<?= Router::url("/", true) ?>"><button type="button" class="btn button-sideMenu font-RobotoCondensed"><?= __("Home") ?></button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="<?= Router::url("/accounts/logout_member", true) ?>"><button type="button" class="btn button-sideMenu font-RobotoCondensed" ><?= __("Logout") ?></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>