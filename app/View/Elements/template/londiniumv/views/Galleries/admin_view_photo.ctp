<?php echo $this->Form->create("Gallery", array("class" => "form-horizontal form-separate", "action" => "view_photo", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("View Gallery Photo") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Gallery Photo") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.title", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'disabled'));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.date", __("Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datepicker", 'disabled'));
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
                                            echo $this->Form->label("Country.name", __("Country"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Country.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'disabled'));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("State.name", __("State"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("State.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control" , 'disabled'));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><i class="icon-upload"></i><?= __("Photos") ?></h6>
                                        <div class="">
                                            <span style="" id="file-uploader-content-button">		
                                                <noscript>			
                                                <p>Please enable JavaScript to use file uploader.</p>
                                                <!-- or put a simple form for upload here -->
                                                </noscript>         
                                            </span>
                                        </div>
                                    </div>

                                    <div class="panel-body" id="photo-panel">
                                        <div class="block-row qq-upload-list" id="file-uploader-content-list">
                                            <div class="row row-table">
                                                <div class="col-md-8 text-center">Photo</div>
                                                <div class="col-md-2 text-center">Default</div>
                                            </div>
                                            <?php
                                            $i = 0;
                                            foreach ($this->data['DetailPhoto'] as $photos) {
                                                ?>
                                                <div class="row row-table row-remove-<?php echo $i ?> qq-upload-success">
                                                    <div class="col-md-8 text-center"><img src="<?php echo Router::url($photos['image_path'], true) ?>" width="100"></div>
                                                    <div class="col-md-2 text-center">
                                                        <input <?php echo $photos['is_default'] ? "checked" : "" ?> value="<?php echo $photos['is_default'] ?>" class="gallery_photo_default" type="checkbox" name="" disabled/>
                                                    </div>
                                                </div>
                                                <?php
                                                $i++;
                                            }
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