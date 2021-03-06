<?php echo $this->Form->create("Gallery", array("class" => "form-horizontal form-separate", "action" => "edit_video", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Edit Gallery Video") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Gallery Video") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.title", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.date", __("Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datepicker"));
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
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.gambar", __("Thumbnail"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control styled"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.video_url", __("Video URL"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.video_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.country_id", __("Country"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.country_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full state-country", 'empty' => '', 'placeholder' => '- Choose Country -', "data-state-country-target" => "#GalleryStateId"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.state_id", __("State"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.state_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full state-country-target", 'empty' => '', 'placeholder' => '- Choose State -', 'id' => "GalleryStateId"));
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