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
                        <label><?= __("Username") ?></label>
                        <input type="text" name="User.username" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                    <div class="col-md-6">
                        <label ><?= __("Email") ?></label>
                        <input type="text" name="User.email" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label><?= __("First Name") ?></label>
                        <input type="text" name="Biodata.first_name" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                    <div class="col-md-6">
                        <label ><?= __("Last Name") ?></label>
                        <input type="text" name="Biodata.last_name" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                </div>
            </div>
            <div class="form-actions text-center">
                <input type="button" value="<?= __("Reset") ?>" class="btn btn-danger btn-filter-reset">
                <input type="button" value="<?= __("Search") ?>" class="btn btn-info btn-filter">
            </div>
        </div>
    </div>
</form>
<script>
    filterReload();
</script>
