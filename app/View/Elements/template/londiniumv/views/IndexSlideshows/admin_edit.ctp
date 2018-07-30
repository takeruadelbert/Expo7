<?php echo $this->Form->create("IndexSlideshow", array("class" => "form-horizontal form-separate", "action" => "edit", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Edit Index Slideshow") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Index Slideshow") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("IndexSlideshow.title_eng", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("IndexSlideshow.title_eng", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("IndexSlideshow.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("IndexSlideshow.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                            echo $this->Form->label("IndexSlideshow.gambar", __("Gambar"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("IndexSlideshow.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control styled"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("IndexSlideshow.slideshow_status_id", __("Status"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("IndexSlideshow.slideshow_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full", "empty" => "", "placeholder" => "- Choose Status -"));
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
                                    echo $this->Form->label("IndexSlideshow.content_eng", __("Content"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("IndexSlideshow.content_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("IndexSlideshow.content_ind", __("Content (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("IndexSlideshow.content_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ..."));
                                    ?>
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