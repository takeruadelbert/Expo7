<style>
    table.uploadPreviewGame th, table.uploadPreviewGame td {
        text-align: center;
        padding: 5px;
    }

    .code-game {
        text-transform: uppercase;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content" style="margin-top: 0px !important;">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content">
            <?= $this->Form->create('', array('type' => "post", 'id' => "uploadGame", 'type' => 'file')) ?>
            <div class="boxOut-contentLeft" style="width:100%; overflow-y: inherit; height: 620px; padding-top: 30px;">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-right: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Name") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name='data[Game][name]' value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-left: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Code") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed code-game" name='data[Game][code]' value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-left: 100px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Google Play URL") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name='data[Game][google_play_url]' value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-right: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("App Store URL") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name='data[Game][app_store_url]' value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-left: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Thubmnail") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="file" placeholder="" class="form-control font-RobotoCondensed" name='data[Dummy][thumbnail]' accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-left: 100px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Cover") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="file" placeholder="" class="form-control font-RobotoCondensed" name='data[Dummy][cover]' accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-right: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Import Build Game") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="file" placeholder="" class="form-control font-RobotoCondensed" name='data[Dummy][import_build_game]' accept=".zip">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow"></div>
                    <div class="col-md-4 col-sm-4 col-xs-4 boxOut-contentRow" style="padding-left: 100px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Genre") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select multiple name="data[Genre][]" class="form-control">
                                    <?php
                                    foreach ($genres as $value => $genre) {
                                        ?>
                                        <option value="<?= $value ?>"><?= $genre ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 boxOut-contentRow" style="padding-right: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Upload Preview Game") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block-inner">
                                <table border="1" width="100%" class="uploadPreviewGame">
                                    <thead>
                                        <tr>
                                            <th width="50"><?= __("No") ?></th>
                                            <th><?= __("Upload") ?></th>
                                            <th width="70"><?= __("Action") ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="target-upload-preview-game">
                                        <tr>
                                            <td colspan="3">
                                                <a class="text-success" href="javascript:void(false)" onclick="addThisRow($(this), 'upload-preview-game')" data-n="1"><img src="<?= Router::url("/front_file/expo7/img/icon/icon-plus.png", true) ?>" width="20" height="20" title="Add a New Row"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 boxOut-contentRow" style="padding-left: 50px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Description") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block-inner">
                                <textarea class="editor" placeholder="<?= __("Description of the Game ...") ?>" rows="6" style="width:100%;" name="data[Game][description_eng]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="text-align: center;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn button-saveChange font-RobotoCondensed-Bold"><?= __("SUBMIT") ?></button>
                </div>
            </div>
            <?php
            $this->Form->end();
            ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#uploadGame").validate({
            rules: {
                "data[Game][name]": {
                    required: true
                },
                "data[Game][code]": {
                    required: true
                },
                "data[Game][google_play_url]": {
                    required: true,
                    url: true
                },
                "data[Game][app_store_url]": {
                    required: true,
                    url: true
                },
                "data[Dummy][genre]": {
                    required: true,
                },
                "data[Dummy][import_build_game]": {
                    required: true
                },
                "data[Dummy][thumbnail]": {
                    required: true
                },
                "data[Dummy][cover]": {
                    required: true
                },
                "data[Game][description_eng]": {
                    required: true
                }
            },
            messages: {
                "data[Dummy][genre]": {
                    required: "Select at least a genre."
                }
            }
        });
    });
    function deleteThisRow(e) {
        var tbody = $(e).parents("tbody");
        e.parents("tr").remove();
        fixNumber(tbody);
    }

    function addThisRow(e, t, optFunc) {
        var icon_delete = BASE_URL + "/front_file/expo7/img/icon/icon-delete.png";
        var n = $(e).data("n");
        var template = $('#tmpl-' + t).html();
        Mustache.parse(template);
        var options = {
            n: n,
            url: icon_delete
        };
        if (typeof (optFunc) !== 'undefined') {
            $.extend(options, window[optFunc]());
        }
        var rendered = Mustache.render(template, options);
        $('#target-' + t + " tr:last").before(rendered);
        $(e).data("n", n + 1);
        fixNumber($(e).parents("tbody"));
    }

    function fixNumber(e) {
        var i = 1;
        $.each(e.find("tr"), function () {
            $(this).find(".nomorIdx").html(i);
            i++;
        })
    }
</script>
<script type="x-tmpl-mustache" id="tmpl-upload-preview-game">
    <tr>
    <td class="nomorIdx">{{n}}</td>
    <td><input type="file" name="data[Dummy][Preview][{{n}}][preview]" class="form-control font-RobotoCondensed" accept="image/*"></td>
    <td><a href="javascript:void(false)" onclick="deleteThisRow($(this))"><img src="{{url}}" width="20" height="20" title="Delete Row"></a></td>
    </tr>
</script>