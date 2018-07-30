<?php echo $this->Form->create("Account", array("class" => "form-horizontal form-separate", "action" => "add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("Add User") ?>
            </h6>
        </div>
        <div class="table-responsive">
            <table width="100%" class="table">
                <div class="panel-heading" style="background:#2179cc">
                    <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Login") ?></h6>
                </div>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("User.username", __("Username"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("User.username", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("User.email", __("Email"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("User.email", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("User.user_group_id", __("User Group"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("User.user_group_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full", "empty" => "", "placeholder" => __("- Select User Group -")));
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
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-responsive">
            <table width="100%" class="table">
                <div class="panel-heading" style="background:#2179cc">
                    <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Login") ?></h6>
                </div>
                <tr>
                    <td colspan="3" style="width:200px">
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
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
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
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
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
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
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
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
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
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
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
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3" style="width:200px">
                        <div class="panel-body">
                            <div class="block-inner text-danger">
                                <div class="form-actions text-right">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                                    <input type="reset" value="Reset" class="btn btn-info">
                                    <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
echo $this->Form->input("Account.account_status_id", array("type" => "hidden", "div" => false, "label" => false, "class" => "form-control", "value" => "1"));
?>
<?php echo $this->Form->end() ?>