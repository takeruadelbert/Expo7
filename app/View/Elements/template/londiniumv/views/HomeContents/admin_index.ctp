<?php echo $this->Form->create("HomeContent", array("class" => "form-horizontal form-separate", "action" => "index", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update Home Content") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Home Content") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("HomeContent.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("HomeContent.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("HomeContent.title_eng", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("HomeContent.title_eng", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                            echo $this->Form->label("HomeContent.video_url", __("Video URL"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("HomeContent.video_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                    echo $this->Form->label("HomeContent.content_ind", __("Content (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("HomeContent.content_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("HomeContent.content_eng", __("Content"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("HomeContent.content_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
                $counter = 1;
                if (!empty($this->data['HomeContentDetail'])) {
                    $target_tbody = "";
                    foreach ($this->data['HomeContentDetail'] as $index => $detail) {
                        if ($index == count($this->data['HomeContentDetail']) - 1) {
                            $target_tbody = "target-data-content-detail";
                        } else {
                            $target_tbody = "";
                        }
                        ?>
                        <div class="table-responsive">
                            <table width="100%" class="table" id='table-<?= $counter ?>'>
                                <tbody id="<?= $target_tbody ?>">                            
                                <div class="panel-heading" style="background:#2179cc" id='header-<?= $counter ?>'>
                                    <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Content Detail {$counter}") ?></h6>
                                </div>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("HomeContentDetail.$index.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("HomeContentDetail.$index.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("HomeContentDetail.$index.title_eng", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("HomeContentDetail.$index.title_eng", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("HomeContentDetail.$index.content_ind", __("Content (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                            echo $this->Form->input("HomeContentDetail.$index.content_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", 'placeholder' => "Enter text ..."));
                                            ?>
                                            <input type="hidden" name="data[HomeContentDetail][<?= $index ?>][id]" value="<?= $detail['id'] ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("HomeContentDetail.$index.content_eng", __("Content"), array("class" => "col-sm-2 control-label"));
                                            echo $this->Form->input("HomeContentDetail.$index.content_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", 'placeholder' => "Enter text ..."));
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <a href="javascript:void(false)" onclick="deleteThisRow(<?= $counter ?>)"><i class="icon-remove3"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            if ($index == count($this->data['HomeContentDetail']) - 1) {
                                ?>
                                <table class="table" width="100%">
                                    <tr>
                                        <td>
                                            <div class="form-actions text-center">
                                                <a class="text-success dataN" href="javascript:void(false)" onclick="addThisRow($(this), 'data-content-detail')" data-n="<?= $index ?>" data-i="<?= $index + 1 ?>" data-j="<?= $index ?>"><i class="icon-plus-circle"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        $counter++;
                    }
                } else {
                    ?>
                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <tbody id="target-data-content-detail"> 
                            <div class="panel-heading" style="background:#2179cc">
                                <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Content Detail 1") ?></h6>
                            </div>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("HomeContentDetail.0.title_ind", __("Title (Indonesia)"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("HomeContentDetail.0.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("HomeContentDetail.0.title_eng", __("Title"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("HomeContentDetail.0.title_eng", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->label("HomeContentDetail.0.content_ind", __("Content (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                        echo $this->Form->input("HomeContentDetail.0.content_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", 'placeholder' => "Enter text ..."));
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->label("HomeContentDetail.0.content_eng", __("Content"), array("class" => "col-sm-2 control-label"));
                                        echo $this->Form->input("HomeContentDetail.0.content_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", 'placeholder' => "Enter text ..."));
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table" width="100%">
                            <tr>
                                <td>
                                    <div class="form-actions text-center">
                                        <a class="text-success  dataN" href="javascript:void(false)" onclick="addThisRow($(this), 'data-content-detail')" data-n="1" data-i="2" data-j="1"><i class="icon-plus-circle"></i></a>
                                    </div>
                                </td>
                            </tr>
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
//        CKEDITOR.replace("HomeContentDetail0Content", {
//            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
//            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
//        });
    });
    function deleteThisRow(id) {
        $("#table-" + id).remove();
        $("#header-" + id).remove();
        fixNumber("table");
    }
    function addThisRow(e, t, optFunc) {
        var n = $(e).data("n") + 1;
        var i = $(e).data("i") + 1;
        var template = $('#tmpl-' + t).html();
        Mustache.parse(template);
        var options = {i: i, n: n};
        if (typeof (optFunc) !== 'undefined') {
            $.extend(options, window[optFunc]());
        }
        var rendered = Mustache.render(template, options);
        $('#target-' + t + " tr:last").after(rendered);
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
        reloadStyled();
    }
    function fixNumber(e) {
        var i = <?= $counter ?>;
        $.each($(".table").find(".test"), function () {
            $(this).find(".nomorIdx").html("<i class='icon-menu2'></i>Content Detail " + i);
            i++;
        })
    }
</script>
<script type="x-tmpl-mustache" id="tmpl-data-content-detail">
    <table width="100%" class="table" id="table-{{i}}">
    <div class="panel-heading test" id="header-{{i}}" style="background:#2179cc">
    <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i>Content Detail {{i}}</h6>
    </div>
    <tr>
    <td>
    <div class="form-group">
    <div class="col-md-6">
    <div class="col-sm-3 col-md-4 control-label">
    <label>Title (Indonesia)</label>
    </div>
    <div class="col-sm-9 col-md-8">
    <input type="text" class="form-control" name="data[HomeContentDetail][{{n}}][title_ind]">
    </div>
    </div>
    <div class="col-md-6">
    <div class="col-sm-3 col-md-4 control-label">
    <label>Title</label>
    </div>
    <div class="col-sm-9 col-md-8">
    <input type="text" class="form-control" name="data[HomeContentDetail][{{n}}][title_eng]">
    </div>
    </div>
    </div>
    </td>
    </tr>
    <tr>
    <td>
    <div class="form-group">
    <div class="col-sm-2 control-label">
    <label>Content (Indonesia)</label>
    </div>
    <div class="col-sm-10">
    <textarea id="kontenInd{{n}}" name="data[HomeContentDetail][{{n}}][content_ind]" class="ckeditor-fix"></textarea>
    </div>
    </div>           
    </td>
    </tr>
    <tr>
    <td>
    <div class="form-group">
    <div class="col-sm-2 control-label">
    <label>Content</label>
    </div>
    <div class="col-sm-10">
    <textarea id="konten{{n}}" name="data[HomeContentDetail][{{n}}][content_eng]" class="ckeditor-fix"></textarea>
    </div>
    </div>           
    </td>
    </tr>
    <tr>
    <td class="text-center">
    <a href="javascript:void(false)" onclick="deleteThisRow({{i}})"><i class="icon-remove3"></i></a>
    </td>
    </tr>
    </table>
</script>