<?php echo $this->Form->create("Account", array("class" => "form-horizontal form-separate", "action" => "member_add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("MEMBER REGISTRATION FORM") ?>
                <small class="display-block"><?= __($constantString["formadd-tips"]) ?></small>
            </h6>
        </div>
        <div class="well block">
            <div class="tabbable">
                <ul class="nav nav-pills nav-justified">
                    <li id="tab-step1" class="active"><a href="#tab-referral" data-toggle="tab"><i class="icon-vcard"></i> Referral Information<span class="label label-danger">Step 1</span></a></li>
                    <li id="tab-step2"><a href="#tab-contact" data-toggle="tab"><i class="icon-profile"></i> Contact Information<span class="label label-danger">Step 2</span></a></li>
                </ul>
                <div class="tab-content pill-content">
                    <div class="tab-pane fade in active" id="tab-referral">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Dummy.id_referral", __("ID Referral"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.id_referral", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control typeahead-memberaccount", "placeholder" => __("Search Referral Code...")));
                                            echo $this->Form->hidden("Member.upline_id");
                                            ?>
                                            <div class="has-feedback">
                                                <i class="icon-search3 form-control-feedback" style = "top:0px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Dummy.referral_name", __("Referral Name"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.referral_name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="block-inner text-danger">
                                    <div class="form-actions text-center">
                                        <input type="button" value="<?= __("Next Step") ?>" class="btn btn-warning" onclick="step2();">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="tab-contact">
                        <div class="panel  panel-default">
                            <div class="panel-heading" style="background:#2179cc">
                                <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Login") ?></h6>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("User.username", __("Username"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("User.username", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "value" => "Auto Generate"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("User.username_game", __("Username Game"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("User.username_game", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("User.email", __("Email"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("User.email", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("User.password", __("Password"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input(null, array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled" => true, "value" => "password123", "type" => "text"));
                                            echo $this->Form->input("User.password", array("div" => false, "label" => false, "class" => "form-control", "value" => "password123", "type" => "hidden"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel  panel-default">
                            <div class="panel-heading" style="background:#2179cc">
                                <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Personal Information") ?></h6>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.first_name", __("First Name"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.first_name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.last_name", __("Last Name"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.last_name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.gender_id", __("Gender"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.gender_id", array("empty" => "", "placeholder" => "- Select Gender -", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.birth_date", __("Date of Birth"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.birth_date", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datepicker", "type" => "text"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.identity_type_id", __("Identity Type"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.identity_type_id", array("empty" => "", "placeholder" => "- Select Identity Type -", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.identity_number", __("Identity Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.identity_number", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.country_id", __("Country"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.country_id", array("data-autolist-emptylabel" => "", "data-autolist-target" => "#BiodataStateId", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full autolist", "data-autolist-url" => Router::url("/admin/states/list_by_country/", true), "empty" => "", "placeholder" => "- " . __("Select Country") . "-"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.state_id", __("State"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.state_id", array("data-autolist-emptylabel" => "", "data-autolist-target" => "#BiodataCityId", "data-autolist-url" => Router::url("/admin/cities/list_by_state/", true), "empty" => "", "placeholder" => "- " . __("Select State") . " -", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full autolist"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.city_id", __("City"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.city_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full", "empty" => "", "placeholder" => "- " . __("Select City") . " -"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.address", __("Address"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.address", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.postal_code", __("Postal Code"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.postal_code", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Biodata.handphone", __("Handphone"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Biodata.handphone", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel  panel-default">
                            <div class="panel-heading" style="background:#2179cc">
                                <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Bank Information") ?></h6>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Member.bank_name", __("Name of Bank"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Member.bank_name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Member.bank_branch", __("Branch Name"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Member.bank_branch", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Member.bank_account", __("Account Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Member.bank_account", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Member.bank_an", __("Account Holder"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Member.bank_an", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="block-inner text-danger">
                                    <div class="form-actions text-center">
                                        <input type="button" value="<?= __("Back") ?>" class="btn btn-info" onclick="backToStep1();">
                                        <input type="submit" value="<?= __("Submit") ?>" class="btn btn-danger">
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
<?php echo $this->Form->end() ?>
<script>
    $(document).ready(function () {
        disableStep2();

        var memberAccounts = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id_referral'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: false,
            remote: {
                url: '<?= Router::url("/admin/accounts/list_member_by_referral_id", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
                filter: function (response) {
                    return response.data;
                }
            }
        });
        memberAccounts.clearPrefetchCache();
        memberAccounts.initialize(true);
        $('input.typeahead-memberaccount').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'memberAccounts',
            display: 'id_referral',
            source: memberAccounts.ttAdapter(),
            templates: {
                header: '<center><h5><?= __("Data Member") ?></h5></center><hr>',
                suggestion: function (context) {
                    return '<p><?= __("ID Referral") ?> : ' + context.id_referral + '<br><?= __("Referral Name") ?> : ' + context.full_name + '<br><?= __("Level") ?> : ' + context.level +'<br><?= __("Title") ?> : ' + context.title + '</p>';
                },
                empty: [
                    '<center><h5><?= __("Data Member") ?></h5></center><hr> <center><p> <?= __("No data found.") ?></p></center>',
                ]
            }
        });
        $('input.typeahead-memberaccount').bind('typeahead:select', function (ev, suggestion) {
            $('#DummyReferralName').val(suggestion.full_name);
            $('#MemberUplineId').val(suggestion.account_id);
        });
    });
    function step1() {
        disableStep2();
        enableStep1();
        gotoTab1();
    }

    function step2() {
        if (proceedToStep2()) {
            disableStep1();
            enableStep2();
            gotoTab2();
        }
    }

    function disableStep1() {
        $("#tab-step1").addClass("disabled");
        $("#tab-step1 a").on("click", function (e) {
            return false;
        });
    }

    function disableStep2() {
        $("#tab-step2").addClass("disabled");
        $("#tab-step2 a").on("click", function (e) {
            return false;
        });
    }

    function enableStep1() {
        $("#tab-step1").removeClass("disabled");
        $("#tab-step1 a").unbind("click");
    }

    function enableStep2() {
        $("#tab-step2").removeClass("disabled");
        $("#tab-step2 a").unbind("click");
    }

    function gotoTab1() {
        $("#tab-step1 a").trigger("click");
    }
    function gotoTab2() {
        $("#tab-step2 a").trigger("click");
    }

    function backToStep1() {
        enableStep1();
        disableStep2();
        gotoTab1();
    }

    function proceedToStep2() {
        if (!$("#MemberUplineId").val()) {
            notif("warning", "<?= __("Please fill ID Referral") ?>", "growl")
            return false;
        } else {
            return true;
        }
    }
</script>