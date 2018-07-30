<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/index-slideshow");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("INDEX SLIDESHOW DATA") ?>
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
                            <th width="150"><?= __("Title") ?></th>
                            <th wdith="100"><?= __("Title (Indonesia)") ?></th>
                            <th width="400"><?= __("Content") ?></th>
                            <th width="200"><?= __("Gambar") ?></th>
                            <th width="100"><?= __("Status") ?></th>
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
                                <td class = "text-center" colspan = 9>Tidak Ada Data</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                    <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= $item['IndexSlideshow']['title_eng'] ?></td>
                                    <td class="text-center"><?= $item['IndexSlideshow']['title_ind'] ?></td>
                                    <td>
                                        <?php
                                        $content = strip_tags(html_entity_decode($item['IndexSlideshow']['content_eng']));
                                        $length = 200;
                                        if (strlen($content) > $length) {
                                            echo substr($content, 0, $length) . "...";
                                        } else {
                                            echo $content;
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $path = !empty($item['IndexSlideshow']['image_path']) ? $item['IndexSlideshow']['image_path'] : "/img/no_image.jpg";
                                        ?>
                                        <img src="<?= Router::url($path, true) ?>" width="150px" height="100px">
                                    </td>
                                    <td class="text-center"><?= $item['SlideshowStatus']['name'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= Router::url("/admin/index_slideshows/view/{$item['IndexSlideshow']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                        <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/edit", ["editUrl" => Router::url("/admin/{$this->params['controller']}/edit/{$item[Inflector::classify($this->params['controller'])]['id']}")]) ?>
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

