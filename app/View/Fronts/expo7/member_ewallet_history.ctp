<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
            <div class="col-md-12 col-sm-12 col-xs-12 box-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-table">

                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                            <table class="table table-history col-md-12 col-sm-12 col-xs-12 font-RobotoCondensed-Light">
                                <tr class="grey-tableTr font-RobotoCondensed-Bold">
                                    <td class="title-table title-table-1 title-1"><?= __("Transaction ID") ?></td>
                                    <td class="title-table title-table-2 title-2"><?= __("Transaction Type") ?></td>
                                    <td class="title-table title-table-1 title-3"><?= __("Date") ?></td>
                                    <td class="title-table title-table-2 title-4"><?= __("Remark") ?></td>
                                    <td class="title-table title-table-1 title-5"><?= __("Amount ($)") ?></td>
                                </tr>
                                <?php
                                if (empty($ewallethistory)) {
                                    ?>
                                    <tr>
                                        <td class = "tr-1-td-1 text-center" colspan ="5"><?= __("No Data") ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($ewallethistory as $n=>$transaction) {
                                        $colorN=$n%2+1;
                                        ?>
                                        <tr>
                                            <td class="tr-<?= $colorN ?>-td-1 center"><?= transactionId($transaction["Transaction"]["id"]) ?></td>
                                            <td class="tr-<?= $colorN ?>-td-2 text-left" style="text-transform: capitalize"><?= $transaction["TransactionType"]["name"] ?></td>
                                            <td class="tr-<?= $colorN ?>-td-1 center"><?= date("d/m/Y", strtotime($transaction["Transaction"]["created"])) ?></td>
                                            <td class="tr-<?= $colorN ?>-td-2 lorem">
                                                <?php
                                                switch ($transaction["TransactionType"]["code"]) {
                                                    case "RF":
                                                        ?>
                                                        <span><?= __("Registration") ?> : <?= $transaction["RelatedAccount"]["Biodata"]["full_name"] ?> (<?= $transaction["RelatedAccount"]["Member"]["id_referral"] ?>)</span>
                                                        <?php
                                                        break;
                                                    case "OB":
                                                    case "IB":
                                                        ?>
                                                        <span><?= __("Bonus Registration") ?> : <?= $transaction["RelatedAccount"]["Biodata"]["full_name"] ?> (<?= $transaction["RelatedAccount"]["Member"]["id_referral"] ?>)</span>
                                                        <?php
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td class="tr-<?= $colorN ?>-td-1 text-right"><?= labelTransactionAmount($transaction["TransactionType"]["code"],$transaction["Transaction"]["amount"]) ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Router::url("/front_file/expo7/js/jquery-ui.js") ?>"></script>
<script src=""<?php echo Router::url("/front_file/expo7/js/download/jquery-ui-timepicker-addon.js") ?>"></script>
<script src=""<?php echo Router::url("/front_file/expo7/js/custom/orderDatePicker.js") ?>"></script>
<script>
    $(document).ready(function () {

        var $unique = $('input.unique');
        $unique.click(function () {
            $unique.filter(':checked').not(this).removeAttr('checked');
        });

    });
</script>