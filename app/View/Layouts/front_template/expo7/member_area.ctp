<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <!--css-->
        <!--==================================================-->
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_cssDashboard"); ?>
        <?php
        switch ($page) {
            case "member_dashboard":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom/dashboard/dashboard.css", true) ?>">
                <?php
                break;
            case "member_payment":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/jquery-ui.css", true) ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/jquery-ui-timepicker-addon.css", true) ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom/dashboard/registrationForm.css", true) ?>">
                <?php
                break;
            case "member_ewallet_withdraw":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom/dashboard/withdrawal.css", true) ?>">
                <?php
                break;
            case "member_genealogytree":
                ?>
                <link href="<?php echo Router::url("/front_file/expo7/css/hierarchy-view.hack.css", true) ?>" rel="stylesheet">
                <link href="<?php echo Router::url("/front_file/expo7/css/custom/dashboard/genealogy.css", true) ?>" rel="stylesheet">
                <link href="<?php echo Router::url("/front_file/expo7/css/styleTree.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_ewallet_history":
                ?>
                <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/jquery-ui.css", true) ?>">
                <link href="<?php echo Router::url("/front_file/expo7/css/download/jquery-ui-timepicker-addon.css", true) ?>" rel="stylesheet" >
                <link href="<?php echo Router::url("/front_file/expo7/css/custom/dashboard/history.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_testimonial" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/starrr.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/testimonial.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_knowledge_base" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/knowledgeBase.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_edit_profile" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/editProfile.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_new_message" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/newMessage.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/typeaheadjs.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_sent_message" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/sent.css", true) ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "member_inbox_message" :
                ?>                
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/inbox.css", true) ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "member_new_ticket" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/build.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/newTicket.css", true) ?>" rel="stylesheet">
                <?php
                break;
            case "member_all_ticket" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/allTicket.css", true) ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "member_all_ticket_open" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/allTicket.css", true) ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "member_all_ticket_in_progress" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/allTicket.css", true) ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "member_all_ticket_solved" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/download/jquery.mCustomScrollbar.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/allTicket.css", true) ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?= Router::url("/front_file/expo7/css/custom/gallery.css", true) ?>">
                <?php
                break;
            case "member_upload_game" :
                ?>
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/testimonial.css", true) ?>" rel="stylesheet">
                <link href="<?= Router::url("/front_file/expo7/css/custom/dashboard/editProfile.css", true) ?>" rel="stylesheet">
                <?php
                break;
        }
        ?>
        <link rel="stylesheet" href="<?php echo Router::url("/front_file/expo7/css/custom.css", true) ?>"><!-- jQuery -->
        <script src="<?php echo Router::url("/front_file/expo7/js/jquery-2.1.4.js", true) ?>"></script>
    </head>

    <body class="nav-sm">
        <div class="container body">
            <div class="main_container">

                <sideMenu>
                    <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_memberSideMenu"); ?>
                </sideMenu>

                <header>
                    <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_memberHeader"); ?>
                </header>

                <!-- Content -->
                <!--==================================================-->
                <section id="content">
                    <div class="right_col" role="main">
                        <?php
                        echo $this->fetch("content");
                        ?>   
                    </div>
                </section>



                <!-- footer content -->
                <footer>
                    <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_memberFooter"); ?>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/flash/flash-message"); ?>
        <!--js-->
        <!--==================================================-->
        <script>
            var BASE_URL = "<?= Router::url("/", true) ?>";
        </script>
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/expo7/_jsDashboard"); ?>
        <script src="<?php echo Router::url("/js/app.js", true) ?>"></script>
        <?php
        switch ($page) {
            case "member_dashboard":
                ?>
                <script src="<?php echo Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <script src="<?php echo Router::url("/front_file/expo7/js/download/Chart.js", true) ?>"></script>
                <script src="<?php echo Router::url("/front_file/expo7/js/download/bootstrap-brogressbar-manager.js", true) ?>"></script>
                <?php
                break;
            case "member_payment":
                ?>
                <script src="<?php echo Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <script src="<?php echo Router::url("/front_file/expo7/js/jquery-ui.js", true) ?>"></script>
                <script src="<?php echo Router::url("/front_file/expo7/js/download/jquery-ui-timepicker-addon.js", true) ?>"></script>
                <script src="<?php echo Router::url("/front_file/expo7/js/custom/orderDatePicker.js", true) ?>"></script>
                <script src="<?php echo Router::url("/front_file/expo7/js/download/jquery.payment.js", true) ?>"></script>
                <?php
                break;
            case "member_testimonial" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/bootstrap-wysiwyg.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.hotkeys.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/starrr.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/plugins/forms/wysihtml5/wysihtml5.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/plugins/forms/wysihtml5/toolbar.js", true) ?>"></script>
                <?php
                break;
            case "member_knowledge_base" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_edit_profile" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/jquery.validate.js") ?>"></script>
                <?php
                break;
            case "member_genealogytree" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/tree.jquery.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/go-debug.js", true) ?>"></script>
                <?php
                break;
            case "member_new_message" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/bootstrap-wysiwyg.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.hotkeys.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/plugins/forms/typeahead.bundle.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/jquery.validate.js", true) ?>"></script>
                <?php
                break;
            case "member_sent_message" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/bootstrap-wysiwyg.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.hotkeys.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_inbox_message" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/bootstrap-wysiwyg.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.hotkeys.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_new_ticket" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/bootstrap-wysiwyg.min.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.hotkeys.js", true) ?>"></script>
                <script src="<?= Router::url("/front_file/expo7/js/jquery.validate.js", true) ?>"></script>
                <?php
                break;
            case "member_all_ticket" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_all_ticket_open" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_all_ticket_in_progress" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_all_ticket_solved" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/download/jquery.mCustomScrollbar.js", true) ?>"></script>
                <?php
                break;
            case "member_upload_game" :
                ?>
                <script src="<?= Router::url("/front_file/expo7/js/jquery.validate.js", true) ?>"></script>
                <script src="<?= Router::url("/js/plugin/mustache.js", true) ?>"></script>
                <?php
                break;
        }
        ?>
    </body>
</html>
