<?php echo $this->Form->create("Ticket", array("class" => "form-horizontal form-separate", "action" => "view", "type" => "file", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Reply Ticket") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Main Data") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Dummy.ticket_number", __("Ticket Number"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.ticket_number", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "value" => $this->data['Ticket']['ticket_number'], 'disabled'));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Dummy.account_id", __("Member Name"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.account_id", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'value' => $this->data['Account']['Biodata']['full_name'], 'disabled'));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Dummy.referral_code", __("Referral ID"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.referral_code", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'value' => $this->data['Account']['Member']['id_referral'], 'disabled'));
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Dummy.department_id", __("Department"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.department_id", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'value' => $this->data['Department']['name'], 'disabled'));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="row">
                                        <?php
                                        if (!empty($this->data['Ticket']['attachment_file_path'])) {
                                            ?>
                                            <div class="col-md-6">
                                                <div class="col-sm-3 col-md-4 control-label">
                                                    <label>Attachment File</label>
                                                </div>
                                                <div class="col-sm-9 col-md-8">
                                                    <a href="<?= Router::url("/admin/tickets/download_attachment_file/{$this->data['Ticket']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Download Attachment File"><i class="icon-download5"></i></button></a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Dummy.status", __("Status"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.status", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", 'value' => $this->data['TicketStatus']['name'], 'disabled'));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>                        
                    </table>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive pre-scrollable stn-table">
                    <table width="100%" class="table table-hover table-bordered">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("History Data") ?></h6>
                        </div>

                        <thead>
                            <tr>
                                <th class="text-center" width="50"><?= __("No") ?></th>
                                <th class="text-center"><?= __("Name") ?></th>
                                <th class="text-center"><?= __("Title") ?></th>
                                <th class="text-center"><?= __("Message") ?></th>
                                <th class="text-center"><?= __("Datetime") ?></th>
                                <th class="text-center" width="150"><?= __("Attachment File") ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $this->data['Account']['Biodata']['full_name'] ?></td>
                                <td class="text-center"><?= $this->data['Ticket']['title'] ?></td>
                                <td class=""><?= $this->data['Ticket']['message'] ?></td>
                                <td class="text-center"><?= $this->Html->cvtWaktu($this->data['Ticket']['created']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (!empty($this->data['Ticket']['attachment_file_path'])) {
                                        ?>
                                        <a href="<?= Router::url("/admin/tickets/download_attachment_file/{$this->data['Ticket']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Download Attachment File"><i class="icon-download5"></i></button></a>
                                        <?php
                                    } else {
                                        echo "-";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                            if (!empty($this->data['Child'])) {
                                foreach ($this->data['Child'] as $child) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td class="text-center"><?= $child['Account']['Biodata']['full_name'] ?></td>
                                        <td class="text-center"><?= $child['title'] ?></td>
                                        <td class=""><?= $child['message'] ?></td>
                                        <td class="text-center"><?= $this->Html->cvtWaktu($child['created']) ?></td>
                                        <td class="text-center">
                                            <?php
                                            if (!empty($child['attachment_file_path'])) {
                                                ?>
                                                <a href="<?= Router::url("/admin/tickets/download_attachment_file/{$child['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Download Attachment File"><i class="icon-download5"></i></button></a>
                                                <?php
                                            } else {
                                                echo "-";
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
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <tr>
                            <td>
                                <div class="form-actions text-center">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end() ?>