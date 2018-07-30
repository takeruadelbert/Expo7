<?php echo $this->Form->create("Title", array("class" => "form-horizontal form-separate", "action" => "view", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("View Testimony") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Testimony") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Account.Biodata.full_name", __("Nama"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Account.Biodata.full_name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Testimony.title", __("Judul"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Testimony.title", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class='col-md-6'>
                                            <div class='col-sm-3 col-md-4 control-label'>
                                                <label>Rate</label>
                                            </div>
                                            <div class='col-sm-9 col-md-8'>
                                                <div class='star' style="font-size: 20px; color: gold;">
                                                <?php
                                                for($i = 0; $i < $this->data['Testimony']['rate']; $i++) {
                                                    echo "☆";
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("VerifyStatus.name", __("Status"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("VerifyStatus.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Testimony.message", __("Message"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Testimony.message", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ...", 'disabled'));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-actions text-right">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
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