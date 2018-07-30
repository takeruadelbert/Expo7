<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/transaction");
?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("TRANSACTION HISTORY") ?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("index/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak") ?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('excel', '<?php echo Router::url("index/excel?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-file-excel"></i>
                        Excel
                    </button>&nbsp;
                </div>
                <small class="display-block"><?= _APP_CORPORATE ?></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table stn-table-nowrap">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" width="50">No</th>
                            <th colspan="2"><?= __("e-Wallet") ?></th>
                            <th rowspan="2"><?= __("Transaction ID") ?></th>
                            <th rowspan="2"><?= __("Transaction Type") ?></th>
                            <th rowspan="2"><?= __("Transaction Date") ?></th>
                            <th rowspan="2"><?= __("Note") ?></th>
                            <th rowspan="2" colspan="2"><?= __("Amount") ?></th>
                        </tr>
                        <tr>
                            <th><?= __("Member Name") ?></th>
                            <th><?= __("Referral Code") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $limit = intval(isset($this->params['named']['limit']) ? $this->params['named']['limit'] : 10);
                        $page = intval(isset($this->params['named']['page']) ? $this->params['named']['page'] : 1);
                        $i = ($limit * $page) - ($limit - 1);
                        if (empty($data['rows'])) {
                            ?>
                            <tr>
                                <td class = "text-center" colspan ="8"><?= __("No Data") ?></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $item['Balance']['Account']["Biodata"]["full_name"] ?></td>
                                    <td><?= $item['Balance']['Account']["Member"]["id_referral"] ?></td>
                                    <td><?= transactionId($item["Transaction"]["id"]) ?></td>
                                    <td style="text-transform: capitalize"><?= $item['TransactionType']["name"] ?></td>
                                    <td><?= $this->Html->cvtWaktu($item['Transaction']["created"], false) ?></td>
                                    <td>
                                        <?php
                                        switch ($item["TransactionType"]["code"]) {
                                            case "RF":
                                                ?>
                                                <span><?= __("Registration") ?> : <?= $item["RelatedAccount"]["Biodata"]["full_name"] ?> (<?= $item["RelatedAccount"]["Member"]["id_referral"] ?>)</span>
                                                <?php
                                                break;
                                            case "OB":
                                            case "IB":
                                                ?>
                                                <span><?= __("Bonus Registration") ?> : <?= $item["RelatedAccount"]["Biodata"]["full_name"] ?> (<?= $item["RelatedAccount"]["Member"]["id_referral"] ?>)</span>
                                                <?php
                                                break;
                                        }
                                        ?>

                                    </td>
                                    <td class="text-left" width="10">$</td>
                                    <td class="text-right" style="<?= in_array($item["TransactionType"]["code"], ["WD", "OB"]) ? "color:red" : "" ?>"><?= $item['Transaction']['amount'] ?></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <?php echo $this->element(_TEMPLATE_DIR . "/{$template}/pagination") ?>
</div>

