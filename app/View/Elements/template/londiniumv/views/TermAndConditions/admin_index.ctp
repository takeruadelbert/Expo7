<?php echo $this->Form->create("TermAndCondition", array("class" => "form-horizontal form-separate", "action" => "index", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("Update Term and Condition") ?>
            </h6>
        </div>
        <div class="table-responsive">
            <table width="100%" class="table">
                <div class="panel-heading" style="background:#2179cc">
                    <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Term and Condition") ?></h6>
                </div>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="row">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("TermAndCondition.header_ind", __("Header (Indonesia)"), array("class" => "col-sm-8 control-label"));
                                echo $this->Form->input("TermAndCondition.header_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                ?>
                            </div>
                        </div>                        
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="row">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("TermAndCondition.header_eng", __("Header"), array("class" => "col-sm-8 control-label"));
                                echo $this->Form->input("TermAndCondition.header_eng", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                ?>
                            </div>
                        </div>                        
                    </td>
                </tr>
            </table>
            <?php
            $i = 1;
            if (!empty($this->data['TermAndConditionDetail'])) {
                foreach ($this->data['TermAndConditionDetail'] as $k => $details) {
                    ?>
                    <table width="100%" class="table" id="table-<?= $i ?>">
                        <tbody id="target-data-pedoman">
                        <div class="panel-heading" style="background:#2179cc" id="header-<?= $i ?>">
                            <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Term and Conditions Detail $i") ?></h6>
                        </div>                
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("TermAndConditionDetail.$k.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("TermAndConditionDetail.$k.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            echo $this->Form->input("TermAndConditionDetail.$k.id", array("type" => "hidden", "value" => $details['id']));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-sm-3 col-md-4 control-label">
                                                <label>Short Title (Indonesia)</label>
                                            </div>
                                            <div class="col-sm-9 col-md-8">
                                                <input type="text" class="form-control" name="data[TermAndConditionDetail][<?= $k ?>][short_title_ind]" value="<?= !empty($details['short_title_ind']) ? $details['short_title_ind'] : "" ?>">
                                                <span class="help-block">This short title is showed at the left column of Term and Condition list.</span>
                                            </div>
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
                                            echo $this->Form->label("TermAndConditionDetail.$k.title_eng", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("TermAndConditionDetail.$k.title_eng", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-sm-3 col-md-4 control-label">
                                                <label>Short Title</label>
                                            </div>
                                            <div class="col-sm-9 col-md-8">
                                                <input type="text" class="form-control" name="data[TermAndConditionDetail][<?= $k ?>][short_title_eng]" value="<?= !empty($details['short_title_eng']) ? $details['short_title_eng'] : "" ?>">
                                                <span class="help-block">This short title is showed at the left column of Term and Condition list.</span>
                                            </div>
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
                                            echo $this->Form->label("TermAndConditionDetail.$k.ordering_number", __("Ordering Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("TermAndConditionDetail.$k.ordering_number", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                    echo $this->Form->label("TermAndConditionDetail.$k.content_ind", __("Content (Indonesia)"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("TermAndConditionDetail.$k.content_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("TermAndConditionDetail.$k.content_eng", __("Content"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("TermAndConditionDetail.$k.content_eng", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(false)" onclick="deleteRow($('.table'), <?= $i ?>)"><i class="icon-remove3"></i></a>
                            </td>
                        </tr>
                        <?php
                        if ($i == count($this->data['TermAndConditionDetail'])) {
                            ?>
                            <tr>
                                <td>
                                    <div class="form-actions text-right">
                                        <a class="text-success" href="javascript:void(false)" onclick="addThisRow($(this), 'data-pedoman')" data-n="<?= $i ?>" data-i="<?= $i ?>"><i class="icon-plus-circle"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    $i++;
                }
            } else {
                ?>
                <table width="100%" class="table" id="table-1">
                    <tbody id="target-data-pedoman">
                    <div class="panel-heading" style="background:#2179cc" id="header-1">
                        <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Term and Conditions Detail 1") ?></h6>
                    </div>                
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("TermAndConditionDetail.0.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("TermAndConditionDetail.0.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-sm-3 col-md-4 control-label">
                                            <label>Short Title (Indonesia)</label>
                                        </div>
                                        <div class="col-sm-9 col-md-8">
                                            <input type="text" class="form-control" name="data[TermAndConditionDetail][0][short_title_ind]" value="<?= !empty($details['short_title_ind']) ? $details['short_title_ind'] : "" ?>">
                                            <span class="help-block">This short title is showed at the left column of Term and Condition list.</span>
                                        </div>
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
                                            echo $this->Form->label("TermAndConditionDetail.0.ordering_number", __("Ordering Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("TermAndConditionDetail.0.ordering_number", array("type" => "number", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                echo $this->Form->label("TermAndConditionDetail.0.content_ind", __("Content (Indonesia)"), array("class" => "col-sm-8 control-label"));
                                echo $this->Form->input("TermAndConditionDetail.0.content_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                ?>
                            </div>                  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("TermAndConditionDetail.0.content_eng", __("Content)"), array("class" => "col-sm-8 control-label"));
                                echo $this->Form->input("TermAndConditionDetail.0.content_eng", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                ?>
                            </div>                  
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(false)" onclick="deleteRow($('.table'),1)"><i class="icon-remove3"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-actions text-right">
                                <a class="text-success" href="javascript:void(false)" onclick="addThisRow($(this), 'data-pedoman')" data-n="1" data-i="2"><i class="icon-plus-circle"></i></a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <div class="form-actions text-center">
                <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                <input type="reset" value="Reset" class="btn btn-info">
                <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>

<script>
    function deleteRow(e, id) {
        $("#table-" + id).remove();
        $("#header-" + id).remove();
        fixNumber("table");
    }
    function deleteThisRow(e, id) {
        e.find("#table-" + id).remove();
        e.find("#header-" + id).remove();
        fixNumber("table");
    }
    function addThisRow(e, t, optFunc) {
        var n = $(e).data("n");
        var i = $(e).data("i");
        var template = $('#tmpl-' + t).html();
        Mustache.parse(template);
        var options = {i: i, n: n};
        if (typeof (optFunc) !== 'undefined') {
            $.extend(options, window[optFunc]());
        }
        var rendered = Mustache.render(template, options);

        $(".table:last-child #target-" + t + " tr:last").before(rendered);

        $(e).data("n", n + 1);
        $(e).data("i", i + 1);
        CKEDITOR.replace("kontenInd" + n, {
            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
        CKEDITOR.replace("konten" + n, {
            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
        fixNumber($(e).parents("table"));
    }
    function fixNumber(e) {
        var i = <?= $i ?>;
        $.each($(".table").find(".test"), function () {
            $(this).find(".nomorIdx").html("Data Term and Condition Detail " + i);
            i++;
        })
    }
</script>
<script type="x-tmpl-mustache" id="tmpl-data-pedoman">
    <table width="100%" class="table" id="table-{{i}}">
        <div class="panel-heading test" id="header-{{i}}" style="background:#2179cc">
            <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i>Data Term and Condition Detail {{i}}</h6>
        </div>
        <tr>
            <td colspan="3" style="width:200px">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-sm-3 col-md-4 control-label">
                                <label>Title (Indonesia)</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="text" class="form-control" name="data[TermAndConditionDetail][{{n}}][title_ind]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-3 col-md-4 control-label">
                                <label>Short Title (Indonesia)</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="text" class="form-control" name="data[TermAndConditionDetail][{{n}}][short_title_ind]">
                                <span class="help-block">This short title is showed at the left column of Term and Condition list.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:200px">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-sm-3 col-md-4 control-label">
                                <label>Title</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="text" class="form-control" name="data[TermAndConditionDetail][{{n}}][title_eng]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-3 col-md-4 control-label">
                                <label>Short Title</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="text" class="form-control" name="data[TermAndConditionDetail][{{n}}][short_title_eng]">
                                <span class="help-block">This short title is showed at the left column of Term and Condition list.</span>
                            </div>
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
                                <label>Ordering Number</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="number" name="data[TermAndConditionDetail][{{n}}][ordering_number]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <div class="col-sm-8 control-label">
                        <label>Content (Indonesia)</label>
                    </div>
                    <div class="col-sm-12">
                        <textarea id="kontenInd{{n}}" name="data[TermAndConditionDetail][{{n}}][content_ind]"></textarea>
                    </div>
                </div>           
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <div class="col-sm-8 control-label">
                        <label>Content</label>
                    </div>
                    <div class="col-sm-12">
                        <textarea id="konten{{n}}" name="data[TermAndConditionDetail][{{n}}][content_eng]"></textarea>
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