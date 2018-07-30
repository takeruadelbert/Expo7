<div style="text-align: center">
    <div style="font-size:11px;font-weight: bold; font-family:Tahoma, Geneva, sans-serif;">
        Testimony
    </div>
</div>
<br>
<table width="100%" class="table-data">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Name") ?></th>
            <th><?= __("Title") ?></th>
            <th><?= __("Rate") ?></th>
            <th width='300'><?= __("Status") ?></th>
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
                <td class = "text-center" colspan = 5>Tidak Ada Data</td>
            </tr>
            <?php
        } else {
            foreach ($data['rows'] as $item) {
                ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-center"><?= $item['Account']['Biodata']['full_name'] ?></td>
                    <td class="text-center"><?= $item['Testimony']['title'] ?></td>
                    <td class="text-center">
                        <div class='stars' style="font-size:20px; color: gold;">
                            <?php
                            for ($i = 0; $i < $item['Testimony']['rate']; $i++) {
                                echo "☆";
                            }
                            ?>
                        </div>
                    </td>
                    <td class='text-center' id = "target-change-status<?= $i ?>">
                        <?php
                        echo $item['VerifyStatus']['name'];
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