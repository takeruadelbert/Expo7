<?php echo $this->Form->create("Game", array("class" => "form-horizontal form-separate", "action" => "view", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("View Game") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Game") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Game.name", __("Name"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'disabled'));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Game.code", __("Code"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.code", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'disabled'));
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
                                            $category_id = [];
                                            foreach ($this->data['CategoryGameDetail'] as $index => $categoryDetail) {
                                                $category_id[] = $categoryDetail['category_game_id'];
                                            }
                                            echo $this->Form->label("Game.category", __("Category"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.categories", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "default" => $category_id, "class" => "select-multiple", "empty" => "", "placeholder" => "- Select Category -", 'options' => $categories, 'multiple' => 'multiple', 'disabled'));
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
                                            echo $this->Form->label("Game.google_play_url", __("Google Play URL"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.google_play_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'disabled'));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Game.app_store_url", __("App Store URL"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.app_store_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'disabled'));
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
                                            <div class="col-sm-3 col-md-4 control-label">
                                                <label>Thumbnail</label>
                                            </div>
                                            <div class="col-sm-9 col-md-8">
                                                <?php
                                                if (!empty($this->data['Game']['thumbnail_path'])) {
                                                    ?>
                                                    <img src="<?= Router::url($this->data['Game']['thumbnail_path'], true) ?>" width="100" height="70" style="padding-top: 10px;">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-sm-3 col-md-4 control-label">
                                                <label>Cover</label>
                                            </div>
                                            <div class="col-sm-9 col-md-8">
                                                <?php
                                                if (!empty($this->data['Game']['cover_path'])) {
                                                    ?>
                                                    <img src="<?= Router::url($this->data['Game']['cover_path'], true) ?>" width="100" height="70" style="padding-top: 10px;">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Game.description_eng", __("Description"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Game.description_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ...", 'disabled'));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Game.description_ind", __("Description (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Game.description_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ...", 'disabled'));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><i class="icon-upload"></i><?= __("Upload Game Preview") ?></h6>
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
                                                <div class="col-md-12 text-center">Photo</div>
                                            </div>
                                            <?php
                                            $i = 0;
                                            foreach ($this->data['GameDetail'] as $detail) {
                                                ?>
                                                <div class="row row-table row-remove-<?php echo $i ?> qq-upload-success">
                                                    <div class="col-md-12 text-center"><img src="<?php echo Router::url($detail['image_path'], true) ?>" width="100"></div>
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
                    </table>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Import Build Game") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-3 col-md-4 control-label">
                                                <label>Import Build Game</label>
                                            </div>
                                            <div class="class-sm-9 col-md-8 control-label">
                                                <?php
                                                if (!empty($this->data['Game']['build_game_path'])) {
                                                    ?>
                                                    <label><?= basename($this->data['Game']['build_game_path']) . ".zip" ?></label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label>No upload yet</label>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="form-actions text-center">
                <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>