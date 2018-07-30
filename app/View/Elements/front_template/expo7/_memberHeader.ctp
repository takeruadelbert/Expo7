<div class="top_nav">
    <div class="nav_menu">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-7 col-sm-6 col-xs-7">
                <div class="hidden-lg hidden-md col-sm-2 col-xs-3">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
                <div class="col-md-12 col-sm-10 col-xs-9 boxOut-headerWelcome">
                    <div class="col-md-7 col-sm-12 col-xs-12 boxOut-titleDashboard font-Exo2SemiBold">
                        <?php
                        $subtitle = "";
                        $display = "none";
                        $title = "";
                        switch ($page) {
                            case "member_testimonial" :
                                $title = "TESTIMONIAL";
                                break;
                            case "member_knowledge_base" :
                                $title = "KNOWLEDGE BASE";
                                break;
                            case "member_edit_profile" :
                                $title = "EDIT PROFILE";
                                break;
                            case "member_new_message" :
                                $title = "MESSAGES";
                                $subtitle = "NEW MESSAGES";
                                $display = "";
                                break;
                            case "member_sent_message" :
                                $title = "MESSAGES";
                                $subtitle = "SENT MESSAGE";
                                $display = "";
                                break;
                            case "member_new_ticket" :
                                $title = "TICKETING SYSTEM";
                                $subtitle = "NEW TICKET";
                                $display = "";
                                break;
                            case "member_all_ticket" :
                                $title = "TICKETING SYSTEM";
                                $subtitle = "ALL TICKET";
                                $display = "";
                                break;
                            case "member_all_ticket_open" :
                                $title = "TICKETING SYSTEM";
                                $subtitle = "OPEN TICKET";
                                $display = "";
                                break;
                            case "member_all_ticket_in_progress" :
                                $title = "TICKETING SYSTEM";
                                $subtitle = "IN-PROGRESS TICKET";
                                $display = "";
                                break;
                            case "member_all_ticket_solved" :
                                $title = "TICKETING SYSTEM";
                                $subtitle = "SOLVED TICKET";
                                $display = "";
                                break;
                            case "member_upload_game" :
                                $title = "GAMES";
                                $subtitle = "UPLOAD GAME";
                                $display = "";
                                break;
                            default :
                                $title = "WELCOME TO EXPO 7";
                                break;
                        }
                        echo __($title);
                        ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleDashboard font-RobotoCondensed-Bold" style="display: <?= $display ?>;">
                            <?= $subtitle ?>
                        </div>
                    </div>
                    <?php
                    $is_eng_selected = "";
                    $is_ind_selected = "";
                    if ($this->Session->read("lang")) {
                        $language = $this->Session->read("lang");
                        if ($language == "ind") {
                            $is_ind_selected = "selected";
                            $is_eng_selected = "";
                        } else {
                            $is_ind_selected = "";
                            $is_eng_selected = "selected";
                        }
                    } else {
                        $is_ind_selected = "";
                        $is_eng_selected = "selected";
                    }
                    ?>
                    <div class="col-md-5 col-sm-12 col-xs-12 boxOut-selectHeader">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control dropdown-headerSelectRight font-RobotoCondensed" id="language">
                                <option value="eng" <?= $is_eng_selected ?>><?= __("English") ?></option>
                                <option value="ind" <?= $is_ind_selected ?>><?= __("Indonesia") ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-5">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-table-headerName table-responsive">
                    <table class="table table-headerName col-md-12 col-sm-12 col-xs-12 font-Exo2SemiBold">
                        <tr class="grey-tableTr">
                            <?php
                            if ($this->Session->read('lang') == 'eng') {
                                ?>
                                <td class="td-headerName"><?= __("HOWDY !") ?></td>
                                <?php
                            } else {
                                ?>
                                <td class="td-headerName"><?= __("SELAMAT " . $this->Expo7->is_either_morning_noon_or_evening() . " !") ?></td>
                                <?php
                            }
                            ?>
                            <td class="column-foto hidden-xs" rowspan="2">
                                <div class="boxOut-headerFoto" style="background-image: url('<?php echo str_replace('\\', '/', Router::url($memberEngine->getProfilePictureLink(), true)) ?>');"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-headerGroup"><?= $memberEngine->getFullName() ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#language").on("change", function () {
            var lang = $(this).val();
            var url_query = lang == "ind" ? "?lang=ind" : "?lang=eng";
            window.location.href = window.location.href.split('?')[0] + url_query;
        });
    });
</script>