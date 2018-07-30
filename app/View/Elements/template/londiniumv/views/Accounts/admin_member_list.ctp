<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/account-member-list");
?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("MEMBER LIST") ?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("member_list/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak") ?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('excel', '<?php echo Router::url("member_list/excel?" . $_SERVER['QUERY_STRING'], true) ?>')">
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
                            <th rowspan="2" width="100"><?= __("Action") ?></th>
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
                                <td class = "text-center" colspan ="16"><?= __("No Data") ?></td>
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
                                    <td class="text-center">
                                    </td>
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

