<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/withdrawal");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA TITLE") ?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("index/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak") ?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('excel', '<?php echo Router::url("index/excel?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-file-excel"></i>
                        Excel
                    </button>&nbsp;
                    <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/add") ?>
                </div>
                <small class="display-block"></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
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
                                        if ($item['Withdraw']['withdraw_status_id'] == 1) {
                                            echo $this->Form->input("Dummy.dummy", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "select-full changeStatus", "options" => $withdrawStatuses));
                                        } else {
                                            echo $item['WithdrawStatus']['name'];
                                        }
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
            </form>
        </div>
    </div>
    <?php echo $this->element(_TEMPLATE_DIR . "/{$template}/pagination") ?>
</div>

<script>
    $(document).ready(function() {
        $(".changeStatus").change(function() {
            var status = $(this).val();
            var withdraw_id = $(this).parents('tr').data("withdraw-id");
            $.ajax({
                url: BASE_URL + "admin/withdraws/change_status_withdraw/",
                type: "PUT",
                dataType: "JSON",
                data: {
                    id: withdraw_id,
                    status: status
                },
                success: function(response) {
                    if(response.status == 207) {
                        var elem = $("tr[data-withdraw-id='" + withdraw_id + "']");
                        alert(response.message);
                        elem.find(".processedBy").html(response.data.ProcessedBy.Biodata.full_name);
                        elem.find(".processedDt").html(cvtWaktu(response.data.Withdraw.processed_dt));
                        elem.find(".withdrawStatus").html(response.data.WithdrawStatus.name);
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
    });
</script>