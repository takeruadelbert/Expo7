<style>
    [contentEditable=true]:empty:not(:focus):before{
        content:attr(data-text)
    }

    a {
        color: white;
    }
</style>
<section id="content">
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                <div class="col-md-12 col-sm-12 col-xs-12 box-content">
                    <div class=" inherit box-content-left mCustomScrollbar" data-mcs-theme="dark-3">
                        <ul class="nav nav-tabs tabs-left">
                            <?php
                            $counter_index = 1;
                            foreach ($dataAllInboxMessage as $index => $sent) {
                                if (!empty($sent['Child'])) {
                                    $last_index = count($sent['Child']) - 1;
                                    if (!$sent['Child'][$last_index]['has_recipient_read'] && $sent['Child'][$last_index]['recipient_id'] == $this->Session->read("credential.member.Account.id")) {
                                        $bgcolor = "#E4F4FD";
                                    } else {
                                        $bgcolor = "";
                                    }
                                    ?>
                                    <li>
                                        <a href="#message-<?= $counter_index ?>" data-toggle="tab" class="inbox" data-message-id="<?= $sent['Message']['id'] ?>" data-member-id="<?= $this->Session->read("credential.member.Account.id") ?>" style="background-color: <?= $bgcolor ?>;">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-2 col-sm-3 col-xs-3">
                                                    <div class="boxOut-foto-img">
                                                        <img src="<?= Router::url($sent['Sender']['User']['profile_picture'], true) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-sm-9 col-xs-9 boxOut-borderMessage">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageTitle font-Roboboto-Bold">
                                                            <?= $sent['Sender']['Biodata']['full_name'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageText font-RobotoCondensed-Light">
                                                            <?php
                                                            $limit = 100;
                                                            $text = strip_tags($sent['Message']['content']);
                                                            if (strlen($text) <= $limit) {
                                                                echo $text;
                                                            } else {
                                                                $text = substr($text, 0, $limit);
                                                                echo $text . " ...";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageTanggal font-RobotoCondensed-Light">
                                                            <?= $this->Html->cvtWaktu($sent['Message']['created']) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                } else {
                                    if (!$sent['Message']['has_recipient_read']) {
                                        $bgcolor = "#E6E6E6";
                                    } else {
                                        $bgcolor = "";
                                    }
                                    ?>
                                    <li>
                                        <a href="#message-<?= $counter_index ?>" data-toggle="tab" class="inbox" data-message-id="<?= $sent['Message']['id'] ?>" data-member-id="<?= $this->Session->read("credential.member.Account.id") ?>" style="background-color: <?= $bgcolor ?>;">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-2 col-sm-3 col-xs-3">
                                                    <div class="boxOut-foto-img">
                                                        <img src="<?= Router::url($sent['Sender']['User']['profile_picture'], true) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-sm-9 col-xs-9 boxOut-borderMessage">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageTitle font-Roboboto-Bold">
                                                            <?= $sent['Sender']['Biodata']['full_name'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageText font-RobotoCondensed-Light">
                                                            <?php
                                                            $limit = 100;
                                                            $text = strip_tags($sent['Message']['content']);
                                                            if (strlen($text) <= $limit) {
                                                                echo $text;
                                                            } else {
                                                                $text = substr($text, 0, $limit);
                                                                echo $text . " ...";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageTanggal font-RobotoCondensed-Light">
                                                            <?= $this->Html->cvtWaktu($sent['Message']['created']) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                }
                                $counter_index++;
                            }
                            ?>                           
                        </ul>
                    </div>
                    <div class="inherit box-content-right">
                        <div class="inherit tab-content">
                            <div class="inherit tab-pane active" id="blank">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-tabBlank center font-RobotoCondensed-Light">
                                        <?= __("No messages has been selected") ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $counter = 1;
                            $counter_index = 1;
                            $counter_form = 1;
                            foreach ($dataAllInboxMessage as $index => $allSent) {
                                if (!empty($allSent['Child'])) {
                                    ?>
                                    <div class="inherit tab-pane mCustomScrollbar" data-mcs-theme="dark-3" id="message-<?= $counter_index ?>">
                                        <?php
                                        foreach ($allSent['Child'] as $i => $history) {
                                            if ($i == 0) {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageContent-<?= $counter ?>">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-message-top">
                                                                    <div class="col-md-11 col-sm-11 col-xs-11">
                                                                        <div class="boxOut-message-foto">
                                                                            <div class="box-message-foto">
                                                                                <img src="<?= Router::url($allSent['Sender']['User']['profile_picture'], true) ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="boxOut-message-name font-RobotoCondensed-Bold">
                                                                            <?= $allSent['Sender']['Biodata']['full_name'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 col-sm-1 col-xs-1">
                                                                        <a class="collapse-link boxOut-button-title">
                                                                            <i class="button-title fa fa-chevron-up">
                                                                                <div class="box-button-title"></div>
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="x_content">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMessage">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="box-triangle"></div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-textMessage">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                                    <?= $allSent['Message']['content'] ?>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                                    <?= $this->Html->cvtWaktu($allSent['Message']['created']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($allSent['Recipient']['id'] == $this->Session->read("credential.member.Account.id")) {
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage">
                                                                            <button type="button" class="btn button-reply font-RobotoCondensed reply" id="">Reply</button>
                                                                            <a href="<?= Router::url("/member/message?id={$history['id']}&parent_id={$allSent['Message']['id']}", true) ?>"><button type="button" class="btn button-forward font-RobotoCondensed">Forward</button></a>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                } else {
                                                                    echo "<br>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $counter++;
                                                $counter_index++;
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageContent-<?= $counter ?>">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-message-top">
                                                                <div class="col-md-11 col-sm-11 col-xs-11">
                                                                    <div class="boxOut-message-foto">
                                                                        <div class="box-message-foto">
                                                                            <img src="<?= Router::url($history['Sender']['User']['profile_picture'], true) ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="boxOut-message-name font-RobotoCondensed-Bold">
                                                                        <?= $history['Sender']['Biodata']['full_name'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1 col-xs-1">
                                                                    <a class="collapse-link boxOut-button-title">
                                                                        <i class="button-title fa fa-chevron-up">
                                                                            <div class="box-button-title"></div>
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="x_content">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMessage">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="box-triangle"></div>
                                                                    </div>
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-textMessage">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                                <?= $history['content'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                                <?= $this->Html->cvtWaktu($history['created']) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if ($history['Recipient']['id'] == $this->Session->read("credential.member.Account.id")) {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage">
                                                                        <button type="button" class="btn button-reply font-RobotoCondensed reply" id="">Reply</button>
                                                                        <a href="<?= Router::url("/member/message?id={$history['id']}&parent_id={$allSent['Message']['id']}", true) ?>"><button type="button" class="btn button-forward font-RobotoCondensed">Forward</button></a>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                echo "<br>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($i == count($allSent['Child']) - 1) {
                                                            ?>
                                                            <?= $this->Form->create('Message', ['action' => 'reply_message', 'type' => 'post', 'id' => 'replyMessage' . $counter_form]) ?>
                                                            <div class="x-content replyField" id="">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMessage">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textArea">
                                                                                <div class="x_content">

                                                                                    <div id="editor<?= $counter_form ?>" class="editor-wrapper font-RobotoCondensed-Light" style="overflow:hidden; box-shadow: none; border-radius: 10px 10px 10px 10px; min-height: 160px; border: none; padding: 20px 30px 20px 30px;" contenteditable="true" data-text="Enter Text ..." onkeyup="posting_to_textarea(<?= $counter_form ?>)"></div>

                                                                                    <textarea id="descr<?= $counter_form ?>" class="font-RobotoCondensed-Bold text-area" style="display:none;" name="data[Message][content]" placeholder="Enter Text ..."></textarea>
                                                                                    <input type="hidden" name="data[Message][parent_id]" value="<?= $allSent['Message']['id'] ?>">
                                                                                    <input type="hidden" name="data[Message][recipient_id]" value="<?= $history['Sender']['id'] ?>">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage text-right">
                                                                                        <button type="button" class="btn button-forward font-RobotoCondensed submitReply" id="" data-counter-form="<?= $counter_form ?>" onclick="validateSubmitReply(<?= $counter_form ?>)">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?= $this->Form->end() ?>
                                                            <?php
                                                            $counter_form++;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $counter++;
                                            if ($counter > 2) {
                                                $counter = 1;
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="inherit tab-pane mCustomScrollbar" data-mcs-theme="dark-3" id="message-<?= $counter_index ?>">    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageContent-1">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-message-top">
                                                            <div class="col-md-11 col-sm-11 col-xs-11">
                                                                <div class="boxOut-message-foto">
                                                                    <div class="box-message-foto">
                                                                        <img src="<?= Router::url($allSent['Sender']['User']['profile_picture'], true) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="boxOut-message-name font-RobotoCondensed-Bold">
                                                                    <?= $allSent['Sender']['Biodata']['full_name'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                                <a class="collapse-link boxOut-button-title">
                                                                    <i class="button-title fa fa-chevron-up">
                                                                        <div class="box-button-title"></div>
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMessage">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="box-triangle"></div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-textMessage">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                            <?= $allSent['Message']['content'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                            <?= $this->Html->cvtWaktu($allSent['Message']['created']) ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($allSent['Recipient']['id'] == $this->Session->read("credential.member.Account.id")) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage">
                                                                    <button type="button" class="btn button-reply font-RobotoCondensed reply" id="">Reply</button>
                                                                    <a href="<?= Router::url("/member/message?id={$allSent['Message']['id']}&parent_id=null", true) ?>"><button type="button" class="btn button-forward font-RobotoCondensed">Forward</button></a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            echo "<br>";
                                                        }
                                                        ?>
                                                    </div>
                                                    <?= $this->Form->create('Message', ['action' => 'reply_message', 'type' => 'post', 'id' => 'replyMessage' . $counter_form]) ?>
                                                    <div class="x-content replyField" id="">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMessage">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textArea">
                                                                        <div class="x_content">

                                                                            <div id="editor<?= $counter_form ?>" class="editor-wrapper font-RobotoCondensed-Light" style="overflow:hidden; box-shadow: none; border-radius: 10px 10px 10px 10px; min-height: 160px; border: none; padding: 20px 30px 20px 30px;" contenteditable="true" data-text="Enter Text ..." onkeyup="posting_to_textarea(<?= $counter_form ?>)"></div>

                                                                            <textarea id="descr<?= $counter_form ?>" class="font-RobotoCondensed-Bold text-area" style="display:none;" name="data[Message][content]" placeholder="Enter Text ..."></textarea>
                                                                            <input type="hidden" name="data[Message][parent_id]" value="<?= $allSent['Message']['id'] ?>">
                                                                            <input type="hidden" name="data[Message][recipient_id]" value="<?= $allSent['Sender']['id'] ?>">
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage text-right">
                                                                                <button type="button" class="btn button-forward font-RobotoCondensed submitReply" id="" data-counter-form="<?= $counter_form ?>" onclick="validateSubmitReply(<?= $counter_form ?>)">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    echo $this->Form->end();
                                                    $counter_form++;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $counter_index++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 box-pagination font-Lato">
                                <div class="boxOut-page">
                                    <?= $this->Expo7->pagination($paginationInfo, $this->request->query, Router::url("", true)) ?>
                                </div>
                            </div>
                        </div>
                    </div>
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

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });

        window.prettyPrint;

        $(".replyField").hide();

        $(".reply").click(function () {
            $(".replyField").fadeIn();
        });


        // updating unread message(s) into read message(s)
        $(".inbox").click(function () {
            var messageId = $(this).data('message-id');
            var memberId = $(this).data('member-id');
            $.ajax({
                url: BASE_URL + "/messages/update_unread_message/" + messageId + "/" + memberId,
                type: "POST",
                dataType: "JSON",
                data: {},
                success: function (data) {
//                    console.log(data);
                    $("#unreadMessage").html(data.data);
                    $("a[data-message-id='" + messageId + "'][data-member-id='" + memberId + "']").attr("style", "");
                }
            });
        });
    });

    function validateSubmitReply(counter) {
        if ($("#descr" + counter).html() != "" && $("#descr" + counter).html() != null) {
            $("#replyMessage" + counter).submit();
        } else {
            $.growl.warning({
                title: "Warning",
                message: "Reply Message is still Empty!"
            });
        }
    }

    function posting_to_textarea(counter) {
        var text = $("#editor" + counter).html();
        $("#descr" + counter).html(text);
    }
</script>