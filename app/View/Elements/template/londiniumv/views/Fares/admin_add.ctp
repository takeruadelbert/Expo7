<?php echo $this->Form->create("Fare", array("class" => "form-horizontal form-separate", "action" => "add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update Fare") ?>
                        <div class="pull-right">
                            <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Back") ?>">
                            <input type="reset" value="Reset" class="btn btn-info">
                            <input type="submit" value="<?= __("Save") ?>" class="btn btn-danger">
                        </div>
                        <small class="display-block"><?= _APP_CORPORATE ?></small>
                    </h6>
                </div>
                <div class="table-responsive">
                    <div class="panel-heading" style="background:#2179cc">
                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Fare") ?></h6>
                    </div>
                    <table width="100%" class="table">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Fare.register_fare", __("Registration Fare"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Fare.register_fare", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Fare.share_fare", __("Share Fare"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Fare.share_fare", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>