<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content">
            <?= $this->Form->create('', array('type' => "post", 'id' => "testimonialFormSubmit")) ?>
            <?php
            $is_disabled = "";
            if (!empty($dataTestimony['Testimony']['id'])) {
                $is_disabled = "disabled";
            }
            ?>
            <div class="boxOut-contentLeft inherit">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Title") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name='data[Testimony][title]' value="<?= !empty($dataTestimony['Testimony']['id']) ? $dataTestimony['Testimony']['title'] : "" ?>" <?= $is_disabled ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <?= __("Messages") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block-inner">
                                <textarea class="editor" placeholder="" rows="12" style="width:100%;" name="data[Testimony][message]" <?= $is_disabled ?>><?= !empty($dataTestimony['Testimony']['id']) ? $dataTestimony['Testimony']['message'] : "" ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rating">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                Rating
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="starrr stars">
                                    <?php
                                    if (!empty($dataTestimony['Testimony']['id'])) {
                                        for ($i = 1; $i <= $dataTestimony['Testimony']['rate']; $i++) {
                                            ?>
                                            <a href="#" class="fa-star fa"></a>
                                            <?php
                                        }
                                        if ($i < $dataTestimony['Testimony']['rate']) {
                                            ?>
                                            <a href="#" class="fa-star-o fa"></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <input type="hidden" name="data[Testimony][rate]" id="rating">
                                <input type="hidden" name="data[Testimony][account_id]" value="<?= $this->Session->read("credential.member.Account.id") ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                        if (empty($dataTestimony['Testimony']['id'])) {
                            ?>

                            <button type="button" class="btn button-cancel font-RobotoCondensed-Bold"><?= __("Cancel") ?></button>
                            <input type="submit" class="btn button-send font-RobotoCondensed-Bold" value="<?= __("Send Testimonial") ?>">

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $this->Form->end();
            ?>
            <div class="boxOut-contentRight inherit">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keterangan">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganTitle font-RobotoCondensed-Bold">
                                <?= $this->MultiLang->readLangClassic($dataTestimonyContent['MemberTestimonialPage'], "title") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganText font-RobotoCondensed">
                                <?= $this->MultiLang->readLangClassic($dataTestimonyContent['MemberTestimonialPage'], "content") ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
<?php
if (empty($dataTestimony['Testimony']['id'])) {
    ?>
            $(".stars").starrr();
    <?php
}
?>

        $('.stars-existing').starrr({
            rating: 4
        });

        $('.stars').on('starrr:change', function (e, value) {
            $('.stars-count').html(value);
            $("#rating").val(value);
        });

        $('.stars-existing').on('starrr:change', function (e, value) {
            $('.stars-count-existing').html(value);
        });
    });
</script>
<script>
    $(document).ready(function () {
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'
            ],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function () {
                return false;
            })
                    .change(function () {
                        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                    })
                    .keydown('esc', function () {
                        this.value = '';
                        $(this).change();
                    });

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this),
                        target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });

            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();

                $('.voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('.voiceBtn').hide();
            }
        }

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });

        window.prettyPrint;
//        prettyPrint();
    });
</script>