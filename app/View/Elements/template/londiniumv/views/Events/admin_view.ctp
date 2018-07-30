<?php echo $this->Form->create("Event", array("class" => "form-horizontal form-separate", "action" => "view", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("View Event") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Event") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Event.title", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Event.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Event.event_date", __("Event Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Event.event_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datepicker", "disabled"));
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
                                    echo $this->Form->label("Event.content", __("Content"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Event.content", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ...", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Event.gambar", __("Thumbnail Photo"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            ?>
                                            <div class="col-sm-9 col-md-8">
                                                <img src="<?= Router::url($this->data['Event']['thumbnail_path'], true) ?>" width="120" height="70">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Event.event_status_id", __("Status"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Event.event_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full", "empty" => "", "placeholder" => "- Choose -", "disabled"));
                                            ?>
                                        </div>
                                    </div>
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