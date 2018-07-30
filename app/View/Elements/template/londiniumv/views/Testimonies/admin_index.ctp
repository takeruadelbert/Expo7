<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/testimony");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA TESTIMONY") ?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("index/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak") ?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('excel', '<?php echo Router::url("index/excel?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-file-excel"></i>
                        Excel
                    </button>&nbsp;
                    <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/delete") ?>
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
                            <th><?= __("Name") ?></th>
                            <th><?= __("Title") ?></th>
                            <th><?= __("Rate") ?></th>
                            <th width='300'><?= __("Status") ?></th>
                            <th width="50"><?= __("Aksi") ?></th>
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
                                <td class = "text-center" colspan = 7>Tidak Ada Data</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                    <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
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
                                        if ($item['Testimony']['verify_status_id'] == 2 || $item['Testimony']['verify_status_id'] == 3) {
                                            echo $item['VerifyStatus']['name'];
                                        } else {
                                            echo $this->Html->changeStatusSelect($item['Testimony']['id'], ClassRegistry::init("VerifyStatus")->find("list", array("fields" => array("VerifyStatus.id", "VerifyStatus.name"))), $item['Testimony']['verify_status_id'], Router::url("/admin/testimonies/change_status_verify"), "#target-change-status$i");
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= Router::url('/admin/' . $this->params["controller"] . "/view/" . $item[Inflector::classify($this->params['controller'])]['id']) ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail Testimony"><i class="icon-file"></i></button></a>
                                                <?php // $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/edit", ["editUrl" => Router::url("/admin/{$this->params['controller']}/edit/{$item[Inflector::classify($this->params['controller'])]['id']}")]) ?>
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

