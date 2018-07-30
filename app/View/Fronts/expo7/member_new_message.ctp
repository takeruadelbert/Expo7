<section id="content">
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                <div class="col-md-12 col-sm-12 col-xs-12 box-content">
                    <?php
                    echo $this->Form->create('Message', ['action' => 'send_message', 'type' => 'post', 'id' => 'newMessage']);
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                <label><?= __("Name / Referral code") ?></label>
                            </div>
                            <div class="has-feedback">
                                <div class="col-md-12 col-sm-12 col-xs-12">                                             
                                    <input type="text" class="form-control typeahead-ajax-recipient field-reveralCode font-RobotoCondensed" id="nameReveral" placeholder="<?= __("Enter name / referral code ...") ?>">
                                    <i class="icon-search3 form-control-feedback"></i>
                                    <input type="hidden" name="data[Message][recipient_id]" id="accountId">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                    <?= __("Title") ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Message][title]" value="<?= !empty($data_forwardded_message) ? $data_forwardded_message['Message']['title'] : "" ?>">
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
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textArea">
                                    <div class="x_content">
                                        <div id="alerts"></div>
                                        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                                            <div class="btn-group">
                                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                </ul>
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a data-edit="fontSize 5">
                                                            <p style="font-size:17px">Huge</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-edit="fontSize 3">
                                                            <p style="font-size:14px">Normal</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-edit="fontSize 1">
                                                            <p style="font-size:11px">Small</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                                <div class="dropdown-menu input-append">
                                                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                                    <button class="btn" type="button">Add</button>
                                                </div>
                                                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                                            </div>

                                            <div class="btn-group">
                                                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                            </div>
                                        </div>

                                        <div id="editor" class="editor-wrapper"><?= !empty($data_forwardded_message) ? $data_forwardded_message['Message']['content'] : "" ?></div>

                                        <textarea id="descr" class="font-RobotoCondensed-Bold text-area" style="display:none;" name="data[Message][content]"><?= !empty($data_forwardded_message) ? $data_forwardded_message['Message']['content'] : "" ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn button-send font-RobotoCondensed"><?= __("Send") ?><img src="<?= Router::url("/front_file/expo7/img/icon/arrowRight-button.png", true) ?>"></button>
                        </div>
                    </div>
                     <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>
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

        $("#editor").on("change keyup keypress", function () {
            var text = $(this).html();
            $("#descr").html(text);
        });

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });

        window.prettyPrint;
//        prettyPrint();


        /* Cari Member */
        var recipient = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('full_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/front/accounts/member_list", true) ?>',
            remote: {
                url: '<?= Router::url("/front/accounts/member_list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        recipient.clearPrefetchCache();
        recipient.initialize(true);
        $('input.typeahead-ajax-recipient').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'recipient',
            display: 'full_name',
            source: recipient.ttAdapter(),
            templates: {
                header: '<center><h5>Data Person</h5></center><hr>',
                suggestion: function (context) {
                    return '<p> Name : ' + context.full_name + '<br>Reveral Code : ' + context.id_referral + '</p>';
                },
                empty: [
                    '<center><h5>Data Person</h5></center><hr> <center><p> Search Result Not Found. Try Another Name / Reveral Code. </p></center>',
                ]
            }
        });
        $('input.typeahead-ajax-recipient').bind('typeahead:select', function (ev, suggestion) {
            $('#accountId').val(suggestion.id);
        });
        
        $("#newMessage").validate({
            rules: {
                'data[Message][title]': {
                    required: true
                },
            }
        });
    });
</script>