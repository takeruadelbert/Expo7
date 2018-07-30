<div style="text-align: center">
    <div style="font-size:11px;font-weight: bold; font-family:Tahoma, Geneva, sans-serif;">
        Member List
    </div>
</div>
<br>
<table width="100%" class="table-data">
    <thead>
        <tr>
            <th rowspan="2" width="50">No</th>
            <th rowspan="2"><?= __("Image") ?></th>
            <th rowspan="2"><?= __("ID Member") ?></th>
            <th rowspan="2"><?= __("Username Game") ?></th>
            <th rowspan="2"><?= __("ID Referral") ?></th>
            <th rowspan="2"><?= __("Upline Referal") ?></th>
            <th rowspan="2"><?= __("Member Name") ?></th>
            <th rowspan="2"><?= __("Country") ?></th>
            <th rowspan="2"><?= __("Total Downline") ?></th>
            <th rowspan="2"><?= __("Available Invitation") ?></th>
            <th rowspan="2"><?= __("Email") ?></th>
            <th rowspan="2"><?= __("Registration Time") ?></th>
            <th colspan="2"><?= __("Rank") ?></th>
            <th rowspan="2"><?= __("Status") ?></th>
        </tr>
        <tr>
            <th><?= __("Level") ?></th>
            <th><?= __("Title") ?></th>
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
                <td class = "text-center" colspan ="15"><?= __("No Data") ?></td>
            </tr>
            <?php
        } else {
            foreach ($data['rows'] as $item) {
                ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td><img src="<?= Router::url($item["User"]["profile_picture_thumbnail"]) ?>" style="width:40px;"/></td>
                    <td><?= $item['User']['username'] ?></td>
                    <td><?= emptyToStrip($item['User']['username_game']) ?></td>
                    <td><?= $item['Member']['id_referral'] ?></td>
                    <td class="<?= empty($item["Member"]["Upline"]["Member"]["id_referral"]) ? "text-center" : "" ?>"><?= emptyToStrip(@$item["Member"]["Upline"]["Member"]["id_referral"]) ?></td>
                    <td><?= $item['Biodata']['full_name'] ?></td>
                    <td><?= $item['Biodata']['Country']["name"] ?></td>
                    <td class="text-right"><?= $item['Member']['downline'] ?></td>
                    <td class="text-right"><?= _DOWNLINE_SLOT - $item['Member']['direct_downline'] ?></td>
                    <td><?= $item['User']['email'] ?></td>
                    <td><?= $this->Html->cvtWaktu($item['Account']['created'], false) ?></td>
                    <td class="text-center"><?= $item["Member"]["Rank"]["level"] ?></td>
                    <td><?= $item["Member"]["Title"]["name"] ?></td>
                    <td><?= $item['AccountStatus']['name']; ?></td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>