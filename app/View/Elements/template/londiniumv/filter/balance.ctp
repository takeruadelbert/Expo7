<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><?= __("Filter Data") ?></h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><?= __("First Name") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Account_Biodata_first_name']) ? $this->request->query['Account_Biodata_first_name'] : '', "name" => "Account.Biodata.first_name", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-3">
                        <label><?= __("Last Name") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Account_Biodata_last_name']) ? $this->request->query['Account_Biodata_last_name'] : '', "name" => "Account.Biodata.last_name", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-3">
                        <label><?= __("Username") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Account_User_username']) ? $this->request->query['Account_User_username'] : '', "name" => "Account.User.username", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-3">
                        <label><?= __("Referral Code") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Account_Member_id_referral']) ? $this->request->query['Account_Member_id_referral'] : '', "name" => "Account.Member.id_referral", "div" => false, "label" => false, "class" => "form-control tip")) ?>
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
