<style>
    [contentEditable=true]:empty:not(:focus):before{
        content:attr(data-text)
    }

    a {
        color: white;
    }
</style>
<section id="content">
    <div class="right_col" role="main" style="margin-left: 0px;">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                <div class="col-md-12 col-sm-12 col-xs-12 box-content">
                    <div class=" inherit box-content-left mCustomScrollbar" data-mcs-theme="dark-3">
                        <ul class="nav nav-tabs tabs-left">
                            <?php
                            foreach ($dataAllTicket as $index => $parent) {
                                switch ($parent['Ticket']['ticket_status_id']) {
                                    case 1 :
                                        $status_style = "waitingOnMember";
                                        break;
                                    case 2 :
                                        $status_style = "inProgress";
                                        break;
                                    case 3 :
                                        $status_style = "solved";
                                        break;
                                    default :
                                        $status_style = "";
                                        break;
                                }
                                if(!empty($parent['Child'])) {
                                    $last_index = count($parent['Child']) - 1;
                                    if (!$parent['Child'][$last_index]['has_member_read'] && $parent['Ticket']['account_id'] == $this->Session->read("credential.member.Account.id")) {
                                        $bgcolor = "#E4F4FD";
                                    } else {
                                        $bgcolor = "";
                                    }
                                } else {
                                    if(!$parent['Ticket']['has_member_read']) {
                                        $bgcolor = "#E4F4FD";
                                    } else {
                                        $bgcolor = "";
                                    }
                                }
                                ?>
                                <li>
                                    <a href="#message-<?= $index ?>" data-toggle="tab" class="ticket" data-ticket-id="<?= $parent['Ticket']['id'] ?>" data-member-id="<?= $this->Session->read("credential.member.Account.id") ?>" style="background-color: <?= $bgcolor ?>;">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-2 col-sm-3 col-xs-3">
                                                <div class="boxOut-foto-img">
                                                    <img src="<?= Router::url($parent['Account']['User']['profile_picture'], true) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-9 col-xs-9 boxOut-borderMessage">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 status-message font-Roboboto status-<?= $status_style ?>">
                                                        <?= $parent['TicketStatus']['name'] ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageTitle font-Roboboto-Bold">
                                                        <div class="name-sales">
                                                            <?= $parent['Department']['name'] ?>
                                                        </div>
                                                        <div class="number-message">
                                                            <?= "#" . $parent['Ticket']['ticket_number'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageText font-RobotoCondensed-Light">
                                                        <?php
                                                        $limit = 100;
                                                        $message = $parent['Ticket']['message'];
                                                        if (strlen($message) > 100) {
                                                            echo substr($message, 0, $limit) . " ...";
                                                        } else {
                                                            echo $message;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageTanggal font-RobotoCondensed-Light">
                                                        <?= $this->Html->cvtWaktu($parent['Ticket']['created']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php
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
                            $counter_form = 1;
                            foreach ($dataAllTicket as $index => $parent) {
                                ?>
                                <div class="inherit tab-pane mCustomScrollbar" data-mcs-theme="dark-3" id="message-<?= $index ?>">
                                    <?php
                                    $counter = 1;
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageContent-<?= $counter ?>">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-message-top">
                                                        <div class="col-md-11 col-sm-11 col-xs-11">
                                                            <div class="boxOut-message-foto">
                                                                <div class="box-message-foto">
                                                                    <img src="<?= Router::url($parent['Account']['User']['profile_picture'], true) ?>">
                                                                </div>
                                                            </div>
                                                            <div class="boxOut-message-name font-RobotoCondensed-Bold">
                                                                <?= $parent['Account']['Biodata']['full_name'] ?>
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
                                                                        <?= $parent['Ticket']['message'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                        <?= $this->Html->cvtWaktu($parent['Ticket']['created']) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($parent['Account']['id'] != $this->Session->read("credential.member.Account.id") && $history['ticket_status_id'] != 3) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage">
                                                                <button type="button" class="btn button-reply font-RobotoCondensed">Reply</button>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (!empty($parent['Ticket']['attachment_file_path'])) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                                                <a href="<?= Router::url("/member/tickets/download_attachment_file/{$parent['Ticket']['id']}", true) ?>"><button type="button" class="btn button-save font-RobotoCondensed" style="right: 100px;">Download Attachment</button></a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $counter++;
                                    foreach ($parent['Child'] as $i => $history) {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-messageContent-<?= $counter ?>">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-message-top">
                                                            <div class="col-md-11 col-sm-11 col-xs-11">
                                                                <div class="boxOut-message-foto">
                                                                    <div class="box-message-foto">
                                                                        <img src="<?= Router::url($history['Account']['User']['profile_picture'], true) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="boxOut-message-name font-RobotoCondensed-Bold">
                                                                    <?= $history['Account']['Biodata']['full_name'] ?>
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
                                                                            <?= $history['message'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 textMessage font-RobotoCondensed-Light">
                                                                            <?= $this->Html->cvtWaktu($history['created']) ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($history['Account']['id'] != $this->Session->read("credential.member.Account.id") && $history['ticket_status_id'] != 3) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage">
                                                                    <button type="button" class="btn button-reply font-RobotoCondensed reply">Reply</button>
                                                                </div>
                                                                <?= $this->Form->create('Ticket', ['action' => 'reply_ticket', 'type' => 'file', 'id' => 'replyTicket' . $counter_form]) ?>
                                                                <div class="x-content replyField" id="">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMessage">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textArea">
                                                                                    <div class="x_content">

                                                                                        <div id="editor<?= $counter_form ?>" class="editor-wrapper font-RobotoCondensed-Light" style="overflow:hidden; box-shadow: none; border-radius: 10px 10px 10px 10px; min-height: 160px; border: none; padding: 20px 30px 20px 30px;" contenteditable="true" data-text="Enter Text ..." onkeyup="posting_to_textarea(<?= $counter_form ?>)"></div>

                                                                                        <textarea id="descr<?= $counter_form ?>" class="font-RobotoCondensed-Bold text-area" style="display:none;" name="data[Ticket][message]" placeholder="Enter Text ..."></textarea>
                                                                                        <input type="hidden" name="data[Ticket][parent_id]" value="<?= $parent['Ticket']['id'] ?>">
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 font-RobotoCondensed-Light title-attach">
                                                                                            Attachments
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-attachments">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-12 input-form3 lampir-file">
                                                                                                    <div class="boxOut-button">
                                                                                                        <span class="btn btn-file font-white font-RobotoCondensed-Light">
                                                                                                            Choose File<input type="file" name="data[Ticket][attachment]">
                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="boxOut-nameFile">
                                                                                                        <input type="text" class="form-control input-fieldKomfirmasi font-RobotoCondensed-Light" placeholder="No File Choose" readonly>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-rightBrowse font-RobotoCondensed-Light">
                                                                                                    (Allowed File Extensions: .jpg, .gif, .jpeg, .png, .pdf, .doc, .docx, .zip, .tif, .xlsx)
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonMessage text-right">
                                                                                            <button type="button" class="btn button-send font-RobotoCondensed submitReply" data-counter-form="<?= $counter_form ?>" onclick="validateSubmitReply(<?= $counter_form ?>)">Send<img src="<?= Router::url("/front_file/expo7/img/icon/arrowRight-button.png", true) ?>"></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            echo $this->Form->end();
                                                        }
                                                        if (!empty($history['attachment_file_path'])) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                                                    <a href="<?= Router::url("/member/tickets/download_attachment_file/{$history['id']}", true) ?>"><button type="button" class="btn button-save font-RobotoCondensed" style="right: 100px;">Download Attachment</button></a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $counter++;
                                        if ($counter > 2) {
                                            $counter = 1;
                                        }
                                    }
                                    if ($parent['Ticket']['ticket_status_id'] != 3) {
                                        echo $this->Form->create("Ticket", ['type' => "post", 'action' => 'close_ticket/' . $parent['Ticket']['id']]);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <button type="submit" class="btn button-save font-RobotoCondensed">If resolve, click here to close the ticket</button>
                                            </div>
                                        </div>
                                        <?php
                                        echo $this->Form->end();
                                    }
                                    ?>
                                </div>
                                <?php
                                $counter_form++;
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

        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $(document).ready(function () {
            $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.lampir-file').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
        });


        jQuery("#number").keydown(function (event) {
            // Allow: backspace, delete, tab, escape, enter and .
            if (jQuery.inArray(event.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                            (event.keyCode == 65 && event.ctrlKey === true) ||
                            // Allow: home, end, left, right
                                    (event.keyCode >= 35 && event.keyCode <= 39)) {
                        // let it happen, don't do anything
                        return;
                    }
                    else {
                        // Ensure that it is a number and stop the keypress
                        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                            event.preventDefault();
                        }
                    }
                });

        $(".replyField").hide();

        $(".reply").click(function () {
            $(".replyField").fadeIn();
        });
        
        // updating unread message(s) into read message(s)
        $(".ticket").click(function () {
            var ticketId = $(this).data('ticket-id');
            var memberId = $(this).data('member-id');
            $.ajax({
                url: BASE_URL + "/tickets/update_unread_ticket/" + ticketId + "/" + memberId,
                type: "POST",
                dataType: "JSON",
                data: {},
                success: function (data) {
//                    console.log(data);
                    $("#unreadTicket").html(data.data);
                    $("a[data-ticket-id='" + ticketId + "'][data-member-id='" + memberId + "']").attr("style", "");
                }
            });
        });
    });

    function validateSubmitReply(counter) {
        if ($("#descr" + counter).html() != "" && $("#descr" + counter).html() != null) {
            $("#replyTicket" + counter).submit();
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