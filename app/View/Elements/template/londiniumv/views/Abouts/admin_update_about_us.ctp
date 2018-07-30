<?php echo $this->Form->create("About", array("class" => "form-horizontal form-separate", "action" => "update_about_us", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update About Us") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data About Us") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("About.mission_eng", __("Mission"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("About.mission_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("About.mission_ind", __("Mission (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("About.mission_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("About.vision_eng", __("Vision"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("About.vision_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("About.vision_ind", __("Vision (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("About.vision_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("About.description_eng", __("Description"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("About.description_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("About.description_ind", __("Description (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("About.description_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("About.video_url", __("Video URL"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("About.video_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-actions text-right">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                                    <input type="reset" value="Reset" class="btn btn-info">
                                    <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
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