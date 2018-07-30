<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><?= __("Filter Data") ?></h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label><?= __("ID Member") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['User_username']) ? $this->request->query['User_username'] : '', "name" => "User.username", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-4">
                        <label ><?= __("ID Referral") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Member_id_referral']) ? $this->request->query['Member_id_referral'] : '', "name" => "Member.id_referral", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-4">
                        <label ><?= __("Member Name") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Biodata_first_name']) ? $this->request->query['Biodata_first_name'] : '', "name" => "Biodata.first_name", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label ><?= __("Rank") ?></label>
                        <?= $this->Form->input(null, array("options" => $ranks, "default" => isset($this->request->query['select_Member_rank_id']) ? $this->request->query['select_Member_rank_id'] : '', "name" => "select.Member.rank_id", "div" => false, "label" => false, "class" => "select-full", "empty" => "", "placeholder" => __("-All-"))) ?>
                    </div>
                    <div class="col-md-4">
                        <label ><?= __("Country") ?></label>
                        <?= $this->Form->input(null, array("options" => $countries, "default" => isset($this->request->query['select_Biodata_country_id']) ? $this->request->query['select_Biodata_country_id'] : '', "name" => "select.Biodata.country_id", "div" => false, "label" => false, "class" => "select-full", "empty" => "", "placeholder" => __("-All-"))) ?>
                    </div>
                    <div class="col-md-2">
                        <label><?= __("Registration Period") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['awal_Account_created']) ? $this->request->query['awal_Account_created'] : '', "name" => "awal.Account.created", "div" => false, "label" => false, "class" => "form-control tip datepicker", "placeholder" => __("Start period"))) ?>
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['akhir_Account_created']) ? $this->request->query['akhir_Account_created'] : '', "name" => "akhir.Account.created", "div" => false, "label" => false, "class" => "form-control tip datepicker", "placeholder" => __("End period"))) ?>
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
