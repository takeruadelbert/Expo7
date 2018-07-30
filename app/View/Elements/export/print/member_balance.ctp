<div style="text-align: center">
    <div style="font-size:11px;font-weight: bold; font-family:Tahoma, Geneva, sans-serif;">
        Member Balance
    </div>
</div>
<br>
<table width="100%" class="table-data">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Member Name") ?></th>
            <th><?= __("Username") ?></th>
            <th><?= __("Referral Code") ?></th>
            <th colspan="2"><?= __("Balance") ?></th>
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
                <td class="text-center" colspan="6"><?= __("No Data") ?></td>
            </tr>
            <?php
        } else {
            foreach ($data['rows'] as $item) {
                ?>
                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-left"><?= $item['Account']['Biodata']["full_name"] ?></td>
                    <td class="text-left"><?= $item['Account']['User']["username"] ?></td>
                    <td class="text-center"><?= $item['Account']['Member']["id_referral"] ?></td>
                    <td class="text-left" width="10">$</td>
                    <td class="text-right" width="100"><?= ac_dollar($item['Balance']['amount']) ?></td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td class="text-right" colspan="4"><strong><?= __("Total") ?></strong></td>
            <td class="text-left" width="10">$</td>
            <td class="text-right" width="100"><?= ac_dollar(array_sum(array_column(array_column($data['rows'], "Balance"), "amount"))) ?></td>
        </tr>
    </tfoot>
</table>