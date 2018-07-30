<div class="row backgroundContent">
    <div class="container container-padding">
        <div class="col-md-12 col-sm-12 col-xs-12 background-container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-shadowPayment">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-terimakasih center">
                            <h3>
                                <?= __("Checkout") ?>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-terimakasih center">
                            <?= __("Your transaction is being processed") ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingTextShadowBottom center font-PoppinsLight">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-paddingTextRed center font-PoppinsSemiBold">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= _MIDTRANS_CLIENT_KEY ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        snap.pay('<?= $this->request->query["snaptoken"] ?>', {
            onSuccess: function (result) {
                if (result.status_code == 200) {
                    window.location.href = BASE_URL + "snap/finish?order_id=" + result.order_id + "&transaction_id=" + result.transaction_id;
                }
            },
            onPending: function (result) {
                window.location.href = BASE_URL + "member/dashboard";
            },
            onError: function (result) {
                window.location.href = BASE_URL + "member/dashboard";
            },
            onClose: function () {
                window.location.href = BASE_URL + "member/dashboard";
            },
        });
    })
</script>