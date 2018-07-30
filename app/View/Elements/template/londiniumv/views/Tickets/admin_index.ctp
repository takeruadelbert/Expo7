<style>
    #confirm .modal-dialog{
        top:200px;
        width:300px;
    }
</style>
<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/ticket");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA TICKETING SYSTEM") ?>
                <div class="pull-right">
                </div>
                <small class="display-block"></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="50"><input type="checkbox" class="styled checkall"/></th>
                            <th width="50">No</th>
                            <th><?= __("Ticket Number") ?></th>
                            <th><?= __("Name") ?></th>
                            <th><?= __("Department") ?></th>
                            <th><?= __("Title") ?></th>
                            <th><?= __("Message") ?></th>
                            <th><?= __("Status") ?></th>
                            <th width="130"><?= __("Aksi") ?></th>
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
                                <td class = "text-center" colspan = 9>Tidak Ada Data</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                    <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= $item['Ticket']['ticket_number'] ?></td>
                                    <td class="text-center"><?= $item['Account']['Biodata']['full_name'] ?></td>
                                    <td class="text-center"><?= $item['Department']['name'] ?></td>
                                    <td class="text-center"><?= $item['Ticket']['title'] ?></td>
                                    <td class="">
                                        <?php
                                        $limit = 150;
                                        $message = html_entity_decode(strip_tags($item['Ticket']['message']));
                                        if (strlen($message) > $limit) {
                                            echo substr($message, 0, $limit) . " ...";
                                        } else {
                                            echo $message;
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center" id='status' data-ticket-id='<?= $item['Ticket']['id'] ?>'><?= $item['TicketStatus']['name'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($item['Ticket']['ticket_status_id'] != 3) {
                                            ?>
                                            <a href="<?= Router::url("/admin/tickets/reply_ticket/{$item['Ticket']['id']}") ?>" id="reply" data-ticket-id='<?= $item['Ticket']['id'] ?>'><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Reply Ticket"><i class="icon-pencil2"></i></button></a>
                                            <button type="button" class="btn btn-default btn-xs btn-icon tip solvedButton" title="Changed Ticket Status to Solved" data-ticket-id="<?= $item['Ticket']['id'] ?>"><i class="icon-checkmark-circle"></i></button>
                                            <?php
                                        }
                                        ?>
                                        <a href="<?= Router::url("/admin/tickets/view/{$item['Ticket']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="View Ticket"><i class="icon-file"></i></button></a>
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

<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?= __("Ticket Status Changed Confirmation") ?></h4>

            </div>
            <div class="modal-body">
                <div class="te">
                    <div class="popup-confirmation">
                        <span class="alert_big_ico">&nbsp;</span>
                        <div class="text-center">
                            <b>Are you sure to change it to 'Solved'?</b>
                            <div class="clear"></div>
                            <smal class="text-danger">P.S. you cannot revert this once it's done.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= __("Cancel") ?></button>
                <button type="button" class="btn btn-primary" id = "ok" onclick="update_ticket_status()" data-dismiss="modal"><?= __("Ok") ?></button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".solvedButton").click(function () {
            var ticketId = $(this).data("ticket-id");
            $("#ok").attr("onclick", "update_ticket_status(" + ticketId + ")");
            $("#confirm").modal('show');
        });
    });

    function update_ticket_status(ticket_id) {
        $.ajax({
            url: BASE_URL + "/admin/tickets/update_status_ticket_to_solved/" + ticket_id,
            type: "POST",
            dataType: "JSON",
            data: {},
            success: function (data) {
//                console.log(data);
                if (data.status == 202) {
                    $.growl.notice({
                        title: "Success",
                        message: data.message
                    });
                    $("#status[data-ticket-id='" + ticket_id + "']").html("Solved");
                    $("#reply[data-ticket-id='" + ticket_id + "']").hide();
                    $(".solvedButton[data-ticket-id='" + ticket_id + "']").hide();
                } else {
                    $.growl.warning({
                        title: "Warning",
                        message: data.message
                    });
                }
            }
        });
    }
</script>