<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/gallery");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA GALLERY") ?>
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
                            <th><?= __("Content Type") ?></th>
                            <th><?= __("Title") ?></th>
                            <th><?= __("Date") ?></th>
                            <th><?= __("Video URL") ?></th>
                            <th><?= __("State") ?></th>
                            <th><?= __("Country") ?></th>
                            <th><?= __("Thumbnail") ?></th>                            
                            <th width="100"><?= __("Aksi") ?></th>
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
                                <td class = "text-center" colspan = 10>Tidak Ada Data</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                    <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= $item['ContentType']['name'] ?></td>
                                    <td class="text-center"><?= $item['Gallery']['title'] ?></td>
                                    <td class="text-center"><?= $this->Html->cvtTanggal($item['Gallery']['date']) ?></td>
                                    <td class="text-center">
                                        <?php
                                        $link = empty($item['Gallery']['video_url']) ? "#" : $item['Gallery']['video_url'];
                                        ?>
                                        <a href="<?= $link ?>" target="_blank"><?= emptyToStrip(@$item['Gallery']['video_url']) ?></a>
                                    </td>
                                    <td class="text-center"><?= $item['State']['name'] ?></td>
                                    <td class="text-center"><?= $item['Country']['name'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        $is_default = false;
                                        if ($item['Gallery']['content_type_id'] == 1) {
                                            foreach ($item['DetailPhoto'] as $photos) {
                                                if (!$is_default) {
                                                    if ($photos['is_default']) {
                                                        $path = $photos['image_path'];
                                                        $is_default = true;
                                                    }
                                                }
                                            }
                                        } else {
                                            $path = !empty($item['Gallery']['thumbnail_path']) ? $item['Gallery']['thumbnail_path'] : "/img/no_image.jpg";
                                        }                                        
                                        ?>
                                        <img src="<?= Router::url($path) ?>" width="100px" height="70px">
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($item['Gallery']['content_type_id'] == 1) {
                                            $ref = "photo";
                                        } else {
                                            $ref = "video";
                                        }
                                        ?>
                                        <a href="<?= Router::url("/admin/galleries/view_{$ref}/{$item['Gallery']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                                <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/edit", ["editUrl" => Router::url("/admin/{$this->params['controller']}/edit_{$ref}/{$item[Inflector::classify($this->params['controller'])]['id']}")]) ?>
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

