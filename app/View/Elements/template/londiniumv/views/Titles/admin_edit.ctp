<?php echo $this->Form->create("Title", array("class" => "form-horizontal form-separate", "action" => "edit","type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Tambah Agama") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Title") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Title.name", __("Nama"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Title.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Title.total_downline", __("Down Line"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Title.total_downline", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control isdecimal text-right", "value" => !empty($this->data['Title']['total_downline']) ? $this->data['Title']['total_downline'] : 0));
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
                                            echo $this->Form->label("Title.gambar", __("Gambar"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Title.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control styled"));
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
                                    echo $this->Form->label("Title.description", __("Deskripsi"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Title.description", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ..."));
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