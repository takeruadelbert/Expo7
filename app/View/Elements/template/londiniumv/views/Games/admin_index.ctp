<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/game");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA GAMES") ?>
                <div class="pull-right">
                    <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/delete") ?>
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
                            <th width="50"><input type="checkbox" class="styled checkall"/></th>
                            <th width="50">No</th>
                            <th><?= __("Thumbnail") ?></th>
                            <th><?= __("Code") ?></th>
                            <th><?= __("Name") ?></th>
                            <th><?= __("Category") ?></th>
                            <th><?= __("Google Play URL") ?></th>
                            <th><?= __("App Store URL") ?></th>
                            <th><?= __("Creator") ?></th>
                            <th><?= __("Status") ?></th>
                            <th width="100"><?= __("Action") ?></th>
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
                                <td class = "text-center" colspan = 11>Tidak Ada Data</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                    <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center">
                                        <?php
                                        $thubmnail = !empty($item['Game']['thumbnail_path']) ? $item['Game']['thumbnail_path'] : "/img/no_image.jpg";
                                        ?>
                                        <img src="<?= Router::url($item['Game']['thumbnail_path'], true) ?>" width="100" height="70">
                                    </td>
                                    <td class="text-center"><?= emptyToStrip(@$item['Game']['code']) ?></td>
                                    <td class="text-center"><?= $item['Game']['name'] ?></td>
                                    <td>
                                        <ul>
                                        <?php
                                        foreach($item['CategoryGameDetail'] as $categories) {
                                        ?>
                                            <li><?= $categories['CategoryGame']['name'] ?></li>
                                        <?php
                                        }
                                        ?>
                                        </ul>
                                    </td>
                                    <td class="text-center"><?= $item['Game']['google_play_url'] ?></td>
                                    <td class="text-center"><?= $item['Game']['app_store_url'] ?></td>
                                    <td class="text-center"><?= !empty($item['Game']['creator_id']) ? $item['Creator']['Biodata']['full_name'] : "Expo 7" ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($item['Game']['game_status_id'] == 1) {
                                            echo $this->Html->changeStatusSelect($item['Game']['id'], ClassRegistry::init("GameStatus")->find("list", array("fields" => array("GameStatus.id", "GameStatus.name"))), $item['Game']['game_status_id'], Router::url("/admin/games/change_status"), null);
                                        } else {
                                            echo $item['GameStatus']['name'];
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= Router::url("/admin/games/view/{$item['Game']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                        <?php
                                        if($item['Game']['game_status_id'] == 1) {
                                            echo $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/edit", ["editUrl" => Router::url("/admin/{$this->params['controller']}/edit/{$item[Inflector::classify($this->params['controller'])]['id']}")]);
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

