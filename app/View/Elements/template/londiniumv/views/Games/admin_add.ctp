<?php echo $this->Form->create("Game", array("class" => "form-horizontal form-separate", "action" => "add", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Add Game") ?>
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
                                            echo $this->Form->input("Game.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Game.code", __("Code"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.code", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                            echo $this->Form->label("Game.categories", __("Category"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.categories", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "select-multiple", "empty" => "", "placeholder" => "- Select Category -", 'options' => $categories, 'multiple' => 'multiple'));
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
                                            echo $this->Form->input("Game.google_play_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Game.app_store_url", __("App Store URL"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.app_store_url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
                                            echo $this->Form->label("Game.thumbnail", __("Thumbnail"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.thumbnail", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control styled"));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Game.cover", __("Cover"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Game.cover", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control styled"));
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
                                    echo $this->Form->label("Game.description_eng", __("Description"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Game.description_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Game.description_ind", __("Description (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Game.description_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "ckeditor-fix", "placeholder" => "Enter text ..."));
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
                                                <div class="col-md-10 text-center">Photo</div>
                                                <div class="col-md-2 text-center">Aksi</div>
                                            </div>
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
                                            <div class="class-sm-9 col-md-8">
                                                <input type="file" class="form-control styled" name="data[Game][import_build]" accept=".zip">
                                                <span class="help-block">Format : ".zip"</span>
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
                <input type="reset" value="Reset" class="btn btn-info">
                <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>
<script src="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader.js" type="text/javascript"></script>
<link href="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader-product.css" rel="stylesheet" type="text/css">
<script>
                    var count = 0;
                    function createUploaderContentThumbnail() {
                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader-content-button'),
                            listElement: document.getElementById('file-uploader-content-list'),
                            action: BASE_URL + 'admin/games/upload_image',
                            allowedExtensions: ['bmp', 'jpg', 'jpeg', 'png'],
                            debug: false,
                            maxConnections: 1,
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
                            onComplete: function (id, fileName, responseJSON) {
                                if (responseJSON.error === undefined) {
                                    var src = BASE_URL + responseJSON.src || '<?php echo Router::url("/img/no_image.jpg"); ?>';
                                    $('#file-uploader-content-list .qq-upload-success').eq(id).prepend('<div class="col-md-10 text-center"><img src="' + src + '" width="100" name="data[GameDetail][' + count + '][gambar]"></div><input type="hidden" value="' + responseJSON.src + '" name="data[GameDetail][' + count + '][image_path]">');
                                    $('#buttonSubmitForm').removeAttr('disabled');
                                    $('#buttonSubmitForm').removeAttr('style');
                                    count++;
                                } else {
                                    setTimeout($('.qq-upload-fail').remove(), 2000);
                                }
                                toggleCheckbox();
                            },
                            onRemove: function (serverIndex) {
                                toggleCheckbox();
                            },
                            onProgress: function (id, fileName, loaded, total) {
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

                    $(document).ready(function () {
                        toggleCheckbox();
                    })

                    function toggleCheckbox() {
                        $(".gallery_photo_default").on("click", function () {
                            $(".gallery_photo_default").prop("checked", false).prop("value", 0);
                            $(this).prop("checked", true).prop("value", 1).siblings().prop("value", 1);
                        })
                    }
</script>