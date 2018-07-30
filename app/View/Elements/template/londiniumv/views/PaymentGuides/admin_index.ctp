<?php echo $this->Form->create("PaymentGuide", array("class" => "form-horizontal form-separate", "action" => "admin_index", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update Payment Guide") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Payment Guide") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("PaymentGuide.description", __("Description"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("PaymentGuide.description", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
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
<script>
    $(document).ready(function () {
        CKEDITOR.replace("Step0Content", {
            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
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
            $(this).find(".nomorIdx").html("<i class='icon-menu2'></i>Step " + i);
            i++;
        })
    }
</script>
<script type="x-tmpl-mustache" id="tmpl-data-step">
    <table width="100%" class="table" id="table-{{i}}">
    <div class="panel-heading test" id="header-{{i}}" style="background:#2179cc">
    <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i>Step {{i}}</h6>
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
    <input type="number" class="form-control" name="data[Step][{{n}}][ordering_number]">
    </div>
    </div>
    <div class="col-md-6">
    <div class="col-sm-3 col-md-4 control-label">
    <label>Icon</label>
    </div>
    <div class="col-sm-9 col-md-8">
    <input type="file" class="form-control styled" name="data[Step][{{n}}][icon]">
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
    <textarea id="konten{{n}}" name="data[Step][{{n}}][content]"></textarea>
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