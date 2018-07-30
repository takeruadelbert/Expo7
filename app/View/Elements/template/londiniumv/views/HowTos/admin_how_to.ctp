<?php echo $this->Form->create("HowTo", array("class" => "form-horizontal form-separate", "action" => "how_to", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update How To") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <?php
                    $limit = 5;
                    $counter = 1;
                    for ($i = 0; $i < $limit; $i++) {
                        ?>
                        <table width="100%" class="table">
                            <div class="panel-heading" style="background:#2179cc">
                                <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Step " . $counter) ?></h6>
                                <?= $this->Form->input("$i.HowTo.ordering_number", ['type' => 'hidden', 'value' => $counter]); ?>
                            </div>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("$i.HowTo.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                            echo $this->Form->input("$i.HowTo.title_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "form-control"));
                                            echo $this->Form->input("$i.HowTo.id", ['type' => "hidden"]);
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("$i.HowTo.title_eng", __("Title"), array("class" => "col-sm-2 control-label"));
                                            echo $this->Form->input("$i.HowTo.title_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("$i.HowTo.icon", __("Icon"), array("class" => "col-sm-2 control-label"));
                                            echo $this->Form->input("$i.HowTo.icon", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "form-control styled", "type" => "file"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            $icon_path = !empty($this->data[$i]['HowTo']['icon_path']) ? $this->data[$i]['HowTo']['icon_path'] : "/img/no_image.jpg";
                                            ?>
                                            <img src="<?= Router::url("$icon_path", true) ?>" width="50" height="50">
                                            <?php
                                            if(!empty($this->data[$i]['HowTo']['icon_path'])) {
                                                echo $this->Form->input("$i.HowTo.icon_path", ['type' => "hidden"]);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->label("$i.HowTo.description_ind", __("Description (Bahasa Indonesia)"), array("class" => "col-sm-2 control-label"));
                                        echo $this->Form->input("$i.HowTo.description_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->label("$i.HowTo.$i.description_eng", __("Description"), array("class" => "col-sm-2 control-label"));
                                        echo $this->Form->input("$i.HowTo.description_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php
                        $counter++;
                    }
                    ?>
                </div>
                <div class="form-actions text-right">
                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                    <input type="reset" value="Reset" class="btn btn-info">
                    <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>