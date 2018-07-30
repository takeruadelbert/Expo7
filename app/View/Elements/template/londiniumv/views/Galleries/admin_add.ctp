<?php echo $this->Form->create("Gallery", array("class" => "form-horizontal form-separate", "action" => "add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Add Gallery") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-3 col-md-4 control-label">
                                                <label>Content Type</label>
                                            </div>
                                            <div class="col-sm-9 col-md-8">
                                                <select class="select-full" name="data[Gallery][content_type_id]">
                                                    <option value="">- Choose Content Type -</option>
                                                    <option value="1">Photo</option>
                                                    <option value="2">Video</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-actions text-right">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                                    <input type="reset" value="Reset" class="btn btn-info">
                                    <input type="submit" value="<?= __("Lanjut") ?>" class="btn btn-danger">
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