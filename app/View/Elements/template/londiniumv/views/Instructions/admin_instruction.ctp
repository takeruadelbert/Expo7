<?php echo $this->Form->create("Instruction", array("class" => "form-horizontal form-separate", "action" => "instruction", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update Instruction") ?>
                    </h6>
                </div>
                <?php                
                if (!empty($this->data)) {
                    $counter = 1;             
                    $target_tbody = "";
                    foreach ($this->data as $index => $instruction) {
                        if($index == count($this->data) - 1) {
                            $target_tbody = "target-data-instruction";
                        } else {
                            $target_tbody = "";
                        }
                        ?>
                        <div class="table-responsive">
                            <table width="100%" class="table">
                                <tbody id="<?= $target_tbody ?>">                            
                                <div class="panel-heading" style="background:#2179cc">
                                    <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Instruction {$counter}") ?></h6>
                                </div>                
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php
                                                    echo $this->Form->label("Instruction.$index.ordering_number", __("Ordering Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("Instruction.$index.ordering_number", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "value" => $instruction['Instruction']['ordering_number']));
                                                    ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php
                                                    echo $this->Form->label("Instruction.$index.icon", __("Icon"), array("class" => "col-sm-2 col-md-3 control-label"));
                                                    echo $this->Form->input("Instruction.$index.icon", array("div" => array("class" => "col-sm-8 col-md-7"), "label" => false, "class" => "form-control styled", "type" => "file"));
                                                    if (!empty($instruction['Instruction']['icon_path'])) {
                                                        ?>
                                                        <div class="col-sm-2 col-md-2">
                                                            <img src="<?= Router::url("/{$instruction['Instruction']['icon_path']}", true) ?>" width="30" height="30" class="text-center">
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <input type="hidden" name="data[Instruction][<?= $index ?>][id]" value="<?= $instruction['Instruction']['id'] ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Instruction.$index.content", __("Content"), array("class" => "col-sm-2 control-label"));
                                            echo $this->Form->input("Instruction.$index.content", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "form-control ckeditor-fix", "value" => $instruction['Instruction']['content']));
                                            ?>
                                        </div>                  
                                    </td>
                                </tr>
                                <?php
                                if($index == count($this->data) - 1) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="form-actions text-right">
                                            <a class="text-success dataN" href="javascript:void(false)" onclick="addThisRow($(this), 'data-instruction')" data-n="<?= $index ?>" data-i="<?= $index + 1 ?>" data-j="<?= $index ?>"><i class="icon-plus-circle"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        $counter++;
                    }
                } else {
                    $counter = 2;
                    ?>
                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <tbody id="target-data-instruction"> 
                            <div class="panel-heading" style="background:#2179cc">
                                <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Instruction 1") ?></h6>
                            </div>                
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Instruction.0.ordering_number", __("Ordering Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Instruction.0.ordering_number", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Instruction.0.icon", __("Icon"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Instruction.0.icon", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control styled", "type" => "file"));
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
                                        echo $this->Form->label("Instruction.0.content", __("Content"), array("class" => "col-sm-2 control-label"));
                                        echo $this->Form->input("Instruction.0.content", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "form-control ckeditor-fix"));
                                        ?>
                                    </div>                  
                                </td>
                            </tr>                
                            <tr>
                                <td>
                                    <div class="form-actions text-right">
                                        <a class="text-success dataN" href="javascript:void(false)" onclick="addThisRow($(this), 'data-instruction')" data-n="1" data-i="2" data-j="1"><i class="icon-plus-circle"></i></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
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
<script>
    $(document).ready(function () {
//        CKEDITOR.replace("Instruction0Content", {
//            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
//            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
//        });
    });

    function deleteThisRow(e, id) {
        e.find("#table-" + id).remove();
        e.find("#header-" + id).remove();
        fixNumber("table");
    }
    function addThisRow(e, t, optFunc) {
        var n = $(e).data("n")+1;
        var i = $(e).data("i");
        var template = $('#tmpl-' + t).html();
        Mustache.parse(template);
        var options = {i: i, n: n};
        if (typeof (optFunc) !== 'undefined') {
            $.extend(options, window[optFunc]());
        }
        var rendered = Mustache.render(template, options);
        $('#target-' + t + " tr:last").before(rendered);
        $(e).data("n", n + 1);
        $(e).data("i", i + 1);
        CKEDITOR.replace("konten" + n, {
            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
        fixNumber($(e).parents("table"));
        reloadStyled();
    }
    function fixNumber(e) {
        var i = <?= $counter ?>;
        $.each($(".table").find(".test"), function () {
            $(this).find(".nomorIdx").html("<i class='icon-menu2'></i>Instruction " + i);
            i++;
        })
    }
</script>
<script type="x-tmpl-mustache" id="tmpl-data-instruction">
    <table width="100%" class="table" id="table-{{i}}">
    <div class="panel-heading test" id="header-{{i}}" style="background:#2179cc">
    <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i>Instruction {{i}}</h6>
    </div>
    <tr>
    <td colspan="3" style="width:200px">
    <div class="form-group">
    <div class="row">
    <div class=col-md-6>
    <div class="col-sm-3 col-md-4 control-label">
    <label>Ordering Number</label>
    </div>  
    <div class="col-sm-9 col-md-8">
    <input type="number" class="form-control" name="data[Instruction][{{n}}][ordering_number]">
    </div>
    </div>
    <div class="col-md-6">
    <div class="col-sm-3 col-md-4 control-label">
    <label>Icon</label>
    </div>
    <div class="col-sm-9 col-md-8">
    <input type="file" class="form-control styled" name="data[Instruction][{{n}}][icon]">
    </div>
    </div>
    </div>
    </div>
    </td>
    </tr>
    <td>
    <div class="form-group">
    <div class="col-sm-2 control-label">
    <label>Content</label>
    </div>
    <div class="col-sm-10">
    <textarea id="konten{{n}}" name="data[Instruction][{{n}}][content]"></textarea>
    </div>
    </div>           
    </td>
    </tr>
    <tr>
    <td class="text-center">
    <a href="javascript:void(false)" onclick="deleteThisRow($('.table'), {{i}})"><i class="icon-remove3"></i></a>
    </td>
    </tr>
    </table>
</script>