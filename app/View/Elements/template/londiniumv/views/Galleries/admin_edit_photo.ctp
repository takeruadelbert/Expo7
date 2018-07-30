<?php echo $this->Form->create("Gallery", array("class" => "form-horizontal form-separate", "action" => "edit_photo", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Edit Gallery Photo") ?>
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
                                            echo $this->Form->input("Gallery.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.date", __("Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datepicker"));
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
                                            echo $this->Form->label("Gallery.country_id", __("Country"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.country_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full state-country", 'empty' => '', 'placeholder' => '- Choose Country -', "data-state-country-target" => "#GalleryStateId"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Gallery.state_id", __("State"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Gallery.state_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-full state-country-target", 'empty' => '', 'placeholder' => '- Choose State -', 'id' => "GalleryStateId"));
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
                                        <h6 class="panel-title"><i class="icon-upload"></i><?= __("Upload Photos") ?></h6>
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
                                                <div class="col-md-2 text-center">Aksi</div>
                                            </div>
                                            <?php
                                            $i = 0;
                                            foreach ($this->data['DetailPhoto'] as $photos) {
                                                ?>
                                                <div class="row row-table row-remove-<?php echo $i ?> qq-upload-success">
                                                    <div class="col-md-8 text-center"><img src="<?php echo Router::url($photos['image_path'], true) ?>" width="100"></div>
                                                    <div class="col-md-2 text-center">
                                                        <input <?php echo $photos['is_default'] ? "checked" : "" ?> value="<?php echo $photos['is_default'] ?>" class="gallery_photo_default" type="checkbox" name=""/>
                                                        <input <?php echo $photos['is_default'] ? "checked" : "" ?> value="<?php echo $photos['is_default'] ?>" class="gallery_photo_default" type="hidden" name="data[DetailPhoto][<?php echo $i ?>][is_default]"/>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $photos['image_path'] ?>" name="data[DetailPhoto][<?php echo $i ?>][image_path]">
                                                    <input type="hidden" value="<?php echo $photos['id'] ?>" name="data[DetailPhoto][<?php echo $i ?>][id]">
                                                    <div class="col-md-2 text-center"><a class="" onclick="hapusGambar(<?php echo $photos['id'] ?>, '<?php echo Router::url("/admin/detail_photos/delete/") ?>', <?php echo $i ?>);">Delete</a><span class="qq-upload-failed-text" style="color: red">Failed</span></div>
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
<script src="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader.js" type="text/javascript"></script>
<link href="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader-product.css" rel="stylesheet" type="text/css">
<script>
    var count = $('#file-uploader-content-list .row').size();
    function createUploaderContentThumbnail() {
        var uploader = new qq.FileUploader({
            element: document.getElementById('file-uploader-content-button'),
            listElement: document.getElementById('file-uploader-content-list'),
            action: BASE_URL + 'admin/galleries/upload_image',
            allowedExtensions: ['bmp', 'jpg', 'jpeg', 'png'],
            debug: true,
            fileTemplate: '<div class="row row-table">' +
                    '<div class="col-md-2 text-center">' +
                    '<span class="qq-upload-file hidden"></span>' +
                    '<span class="qq-upload-spinner"></span>' +
                    '<span class="qq-upload-size hidden"></span>' +
                    '<a class="qq-upload-cancel" href="#" onclick="hapusRow(this)">Cancel</a>' +
                    '<a class="qq-upload-remove" href="#" onclick="hapusRow(this)">Delete</a>' +
                    '<span class="qq-upload-failed-text" style="color: red">Failed</span>' +
                    '</div></div>',
            template: '<div class="qq-uploader">' +
                    '<div class="qq-upload-drop-area"><span>Drop file disini untuk mengupload file</span></div>' +
                    '<div class="qq-upload-button">Browse file</div>' +
                    '<div class="qq-upload-list"></div>' +
                    '</div>',
            onComplete: function(id, fileName, responseJSON) {
                if (responseJSON.error === undefined) {
                    var src = BASE_URL + responseJSON.src || '<?php echo Router::url("/img/no_image.jpg"); ?>';
                    $('#file-uploader-content-list .row').last().prepend('<div class="col-md-8 text-center"><img src="' + src + '" width="100"></div><div class="col-md-2 text-center"><input value="0" class="gallery_photo_default" type="checkbox" name=""><input value="0" class="gallery_photo_default" type="hidden" name="data[DetailPhoto][' + count + '][is_default]"></div><input type="hidden" value="' + responseJSON.src + '" name="data[DetailPhoto][' + count + '][image_path]">');
                    $('#buttonSubmitForm').removeAttr('disabled');
                    $('#buttonSubmitForm').removeAttr('style');
                    count++;
                } else {
                    setTimeout($('.qq-upload-fail').remove(), 2000);
                }
                toggleCheckbox();
            },
            onRemove: function(serverIndex) {
                toggleCheckbox();
            },
            onProgress: function(id, fileName, loaded, total) {
                $('#buttonSubmitForm').attr('style', 'background: #c0c0c0');
                $('#buttonSubmitForm').attr('disabled', true);
            }
        });
    }
    createUploaderContentThumbnail();
    function hapusRow(e) {
        if (confirm("Are you sure to delete this photo?")) {
            $(e).closest(".row").remove();
            alert('File has been deleted.');
        } else {
            $(e).closest(".row").append('<div class="col-md-2 text-center"><a class="qq-upload-remove" href="#" onclick="hapusRow(this)">Delete</a></div>');
        }
    }

    function hapusGambar(id, url, e) {
        hapusDataUrl(id, url, function() {
            $("#photo-panel .row-remove-" + e).remove();
            alert('File has been deleted.');
        });
    }
    function hapusAtribut(id, url, e) {
        hapusDataUrl(id, url, function() {
            $(e).closest(".row-table").remove();
        });
    }
    $(document).ready(function() {
        toggleCheckbox();
    })

    function toggleCheckbox() {
        $(".gallery_photo_default").on("click", function() {
            $(".gallery_photo_default").prop("checked", false).prop("value", 0);
            $(this).prop("checked", true).prop("value", 1).siblings().prop("value", 1);
        })
    }
</script>