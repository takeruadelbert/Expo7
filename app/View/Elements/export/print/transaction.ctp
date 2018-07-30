<div style="text-align: center">
    <div style="font-size:11px;font-weight: bold; font-family:Tahoma, Geneva, sans-serif;">
        Transaction History
    </div>
</div>
<br>
<table width="100%" class="table-data">
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