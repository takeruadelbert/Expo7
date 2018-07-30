<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?= __("Email Activation") ?></h4>
</div>
<div class="modal-body with-padding form-horizontal">
    <div class="form-group">
        <?php
        echo $this->Form->label("Dummy.activation_code", __("Activation Code"), array("class" => "col-sm-12 control-label"));
        echo $this->Form->input("Dummy.activation_code", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control"));
        ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __("Close") ?></button>
    <button type="button" class="btn btn-danger submit-activationcode"><?= __("Submit") ?></button>
</div>
<script>
    $(document).ready(function () {
        $(".submit-activationcode").on("click", function () {
            $.ajax({
                url: BASE_URL + "admin/accounts/ajax_account_activation/" + $("#DummyActivationCode").val(),
                type: "GET",
                dataType: "JSON",
                success: function (response) {
                    if (response.status == 208) {
                        notif("notice", response.message, "growl");
                        $("#accountstatus-" + response.data.account_id).html(response.data.status_label);
                        $("#accountactivationbutton-" + response.data.account_id).remove();
                        $(".modal-ajax").modal("hide")
                    } else {
                        notif("warning", response.message, "growl");
                    }
                },
                error: function () {
                    alert("Internal Server Error.");
                }
            });
        })
    })
</script>