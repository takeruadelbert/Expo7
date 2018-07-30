<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><?= __("Filter Data")?></h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label><?= __("Name") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['SocialMedia_name']) ? $this->request->query['SocialMedia_name'] : '', "name" => "SocialMedia.name", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Status") ?></label>
                        <?= $this->Form->input(null, ['label' => false, 'div' => false, 'name' => 'SocialMedia.show_status_id', 'class' => 'select-full', 'default' => isset($this->request->query['SocialMedia_show_status_id']) ? $this->request->query['SocialMedia_show_status_id'] : "", 'empty' => '', 'placeholder' => '- Select Status -', 'options' => $showStatuses]); ?>
                    </div>
                </div>
            </div>
            <div class="form-actions text-center">
                <input type="button" value="<?= __("Reset") ?>" class="btn btn-danger btn-filter-reset">
                <input type="button" value="<?= __("Cari") ?>" class="btn btn-info btn-filter">
            </div>
        </div>
    </div>
</form>
<script>
    filterReload();
</script>
