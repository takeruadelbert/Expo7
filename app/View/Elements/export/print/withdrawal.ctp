<div style="text-align: center">
    <div style="font-size:11px;font-weight: bold; font-family:Tahoma, Geneva, sans-serif;">
        Withdrawal
    </div>
</div>
<br>
<table width="100%" class="table-data">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Member") ?></th>
            <th colspan="2"><?= __("Amount") ?></th>
            <th><?= __("Processed By") ?></th>
            <th><?= __("Processed Date") ?></th>
            <th><?= __("Note") ?></th>
            <th><?= __("Withdrawal Status") ?></th>
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
                <td class = "text-center" colspan = 8>Tidak Ada Data</td>
            </tr>
            <?php
        } else {
            foreach ($data['rows'] as $item) {
                ?>
                <tr data-withdraw-id="<?= $item['Withdraw']['id'] ?>">
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-center"><?= $item['Account']['Biodata']['full_name'] ?></td>
                    <td class="text-center" style = "border-right-style:none !important" width = "50">$</td>
                    <td class="text-center"><?= ac_dollar($item['Withdraw']['amount']) ?></td>
                    <td class="text-center processedBy"><?= emptyToStrip(@$item['ProcessedBy']['Biodata']['full_name']) ?></td>
                    <td class="text-center processedDt"><?= !empty($item['Withdraw']['processed_dt']) ? $this->Html->cvtWaktu($item['Withdraw']['processed_dt']) : "-" ?></td>
                    <td class="text-center"><?= emptyToStrip(strip_tags(@$item['Withdraw']['note'])) ?></td>
                    <td class="text-center withdrawStatus">
                        <?php
                        echo $item['WithdrawStatus']['name'];
                        ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>