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
                        <label><?= __("Title") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Event_title']) ? $this->request->query['Event_title'] : '', "name" => "Event.title", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Event Date") ?></label>
                        <?= $this->Form->input(null, ['label' => false, 'div' => false, "type" => "text", 'name' => 'Event.event_date', 'class' => 'form-control datepicker', 'default' => isset($this->request->query['Event_event_date']) ? $this->request->query['Event_event_date'] : ""]); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Event Status</label>
                        <?= $this->Form->input(null, ['div' => false, 'label' => false, 'name' => "Event.event_status_id", 'class' => "select-full", 'options' => $eventStatuses, "empty" => "", "placeholder" => "- Choose Status -", 'default' => isset($this->request->query['Event_event_status_id']) ? $this->request->query['Event_event_status_id'] : ""]) ?>
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
