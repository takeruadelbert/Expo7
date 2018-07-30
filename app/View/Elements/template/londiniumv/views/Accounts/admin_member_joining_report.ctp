<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/account-member-joining-report");
?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("JOINING REPORT") ?>
                <div class="pull-right">

                </div>
                <small class="display-block"><?= _APP_CORPORATE ?></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table-nowrap">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="8" bgcolor="#edf7ff" style=" text-align:center">Member Details</th>
                            <th colspan="4" bgcolor="#FFFFCC" style=" text-align:center">Upline Details</th>
                            <th width="4%" rowspan="3" bgcolor="#FFFFCC" style=" text-align:center">Status</th>
                            <th width="1%" rowspan="3" bgcolor="#FFFFCC" style=" text-align:center">Action</th>
                        </tr>
                        <tr>
                            <th width="1%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">No</th>
                            <th width="2%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">Image</th>
                            <th width="1%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">ID Member</th>
                            <th width="1%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">ID Referral</th>
                            <th width="10%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">Member Name</th>
                            <th width="7%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">Country</th>
                            <th width="7%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">Joining Time</th>
                            <th width="7%" rowspan="2" bgcolor="#edf7ff" style=" text-align:center">Last Login</th>
                            <th width="10%" rowspan="2" bgcolor="#FFFFCC" style=" text-align:center">Upline Name</th>
                            <th width="1%" rowspan="2" bgcolor="#FFFFCC" style=" text-align:center">Upline Referral</th>
                            <th colspan="2" bgcolor="#FFFFCC" style=" text-align:center">Upline Rank</th>
                        </tr>
                        <tr>
                            <th style=" text-align:center" width="2%" bgcolor="#FFFFCC">Level</th>
                            <th style=" text-align:center" width="2%" bgcolor="#FFFFCC">Name</th>
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
                                    <td><?= $item['Member']['id_referral'] ?></td>
                                    <td><?= $item['Biodata']['full_name'] ?></td>
                                    <td><?= $item['Biodata']['Country']["name"] ?></td>
                                    <td class="<?= empty($item['Member']["joining_dt"]) ? "text-center" : "" ?>"><?= $this->Html->cvtWaktu($item['Member']["joining_dt"], false) ?></td>
                                    <td class="<?= empty($item['User']["last_login"]) ? "text-center" : "" ?>"><?= $this->Html->cvtWaktu($item['User']["last_login"], false) ?></td>


                                    <td class="<?= empty($item["Member"]["Upline"]["Biodata"]["full_name"]) ? "text-center" : "" ?>"><?= emptyToStrip(@$item["Member"]["Upline"]["Biodata"]["full_name"]) ?></td>
                                    <td class="<?= empty($item["Member"]["Upline"]["Member"]["id_referral"]) ? "text-center" : "" ?>"><?= emptyToStrip(@$item["Member"]["Upline"]["Member"]["id_referral"]) ?></td>
                                    <td class="<?= empty($item["Member"]["Upline"]["Member"]["Rank"]["level"]) ? "text-center" : "" ?>"><?= emptyToStrip(@$item["Member"]["Upline"]["Member"]["Rank"]["level"]) ?></td>
                                    <td class="<?= empty($item["Member"]["Upline"]["Member"]["Title"]["name"]) ? "text-center" : "" ?>"><?= emptyToStrip(@$item["Member"]["Upline"]["Member"]["Rank"]["name"]) ?></td>

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

