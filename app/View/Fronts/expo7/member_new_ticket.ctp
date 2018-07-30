<section id="content">
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                <div class="col-md-12 col-sm-12 col-xs-12 box-content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                            <div class="col-md-6 col-sm-6 col-xs-12 title-content font-Exo2SemiBold">
                                <?= __("New tickets") ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->create("Ticket", ['type' => 'post', 'action' => 'submit_ticket', 'id' => 'submitTicket', 'type' => 'file'])
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-divLeft">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                        <?= __("Title") ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Ticket][title]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-divRight">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                        <?= __("Select Department") ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php
                                        echo $this->Form->input('Ticket.department_id', ['div' => false, 'label' => false, 'class' => 'select-ful dropdown-konfirmasiPembayaran font-RobotoCondensed-Light', 'options' => $departments, 'empty' => '', 'placeholder' => '- Select Department -']);
                                        ?>
                                    </div>
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

                                    <div class="form-group">
                                        <textarea class="form-control editTextArea font-RobotoCondensed" name="data[Ticket][message]"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow2">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-title font-RobotoCondensed-Bold">
                                    <?= __("Attachments") ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-attachments">                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-6 col-sm-6 col-xs-12 input-form3 lampir-file">
                                            <div class="boxOut-button">
                                                <span class="btn btn-file font-white font-RobotoCondensed-Light">
                                                    <?= __("Choose File") ?><input type="file" name="data[Ticket][attachment]">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRow">
                            <div class="col-md-12 col-sm-12 col-xs-12 box-contentRow">
                                <div class="checkbox edit-checbox edit-checbox-agree font-RobotoCondensed-Light">
                                    <input id="agree" class="select" name="agree" type="checkbox">
                                    <label for="agree">
                                        Saya setuju untuk memberikan akses dan resources yang diperlukan untuk mendapatkan bantuan dan saya bertanggung jawab penuh atas segala resiko yang ditimbulkan dari permintaan bantuan ini
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn button-send font-RobotoCondensed"><?= __("Send") ?><img src="<?= Router::url("/front_file/expo7/img/icon/arrowRight-button.png", true) ?>"></button>
                            <button type="reset" class="btn button-save font-RobotoCondensed"><?= __("Cancel") ?></button>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->end();
                    ?>
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

        $("#submitTicket").validate({
            rules: {
                'data[Ticket][title]': {
                    required: true
                },
                'data[Ticket][message]': {
                    required: true
                },
                'data[Ticket][department_id]': {
                    required: true
                },
                'agree': {
                }
            },
            submitHandler: function (form) {
                if (!$("#agree").is(":checked")) {
                    $.growl.warning({
                        title: "Warning",
                        message: "An agreement yet to be checked."
                    });
                } else {
                    form.submit();
                }
            }
        });
    });
</script>