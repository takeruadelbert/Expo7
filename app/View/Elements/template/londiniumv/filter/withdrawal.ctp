<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><?= __("Filter Data") ?></h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label><?= __("Member") ?></label>
                        <?php
                        if (isset($this->request->query['select_Withdraw_account_id'])) {
                            $dataMember = ClassRegistry::init("Account")->find("first", ["conditions" => ["Account.id" => $this->request->query['select_Withdraw_account_id']], "contain" => ['Biodata']]);
                            if (!empty($dataMember)) {
                                $name = $dataMember['Biodata']['full_name'];
                            } else {
                                $name = "";
                            }
                        } else {
                            $name = "";
                        }
                        echo $this->Form->input(null, ["div" => false, "label" => false, "type" => "hidden", "name" => "select.Withdraw.account_id", "id" => "accountId"])
                        ?>
                        <div class="has-feedback">
                            <input type="text" placeholder="Search member name / ID referral ..." class="form-control typeahead-memberaccount" value="<?= $name ?>">
                            <i class="icon-search3 form-control-feedback" style = "top:0px;"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Wihtdrawal Status") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Withdraw_withdraw_status_id']) ? $this->request->query['Withdraw_withdraw_status_id'] : '', "name" => "Withdraw.withdraw_status_id", "div" => false, "label" => false, "class" => "select-full", 'empty' => "", 'placeholder' => "- Semua -", 'options' => $withdrawStatuses)) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><?= __("Processed Date Period") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['awal_Withdraw_processed_dt']) ? $this->request->query['awal_Withdraw_processed_dt'] : '', "name" => "awal.Withdraw.processed_dt", "div" => false, "label" => false, "class" => "form-control datepicker", 'id' => 'startDate', 'placeholder' => 'start period ...')) ?>
                    </div>
                    <div class="col-md-3">
                        <label><?= __("&nbsp;") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['akhir_Withdraw_processed_dt']) ? $this->request->query['akhir_Withdraw_processed_dt'] : '', "name" => "akhir.Withdraw.processed_dt", "div" => false, "label" => false, "class" => "form-control datepicker", 'id' => 'endDate', 'placeholder' => 'end period ...')) ?>
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
    $(document).ready(function () {
        var memberAccounts = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id_referral'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: false,
            remote: {
                url: '<?= Router::url("/admin/accounts/list_member_by_referral_id_and_name", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
                filter: function (response) {
                    return response.data;
                }
            }
        });
        memberAccounts.clearPrefetchCache();
        memberAccounts.initialize(true);
        $('input.typeahead-memberaccount').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'memberAccounts',
            display: 'id_referral',
            source: memberAccounts.ttAdapter(),
            templates: {
                header: '<center><h5><?= __("Data Member") ?></h5></center><hr>',
                suggestion: function (context) {
                    return '<p><?= __("ID Referral") ?> : ' + context.id_referral + '<br><?= __("Referral Name") ?> : ' + context.full_name + '<br><?= __("Level") ?> : ' + context.level + '<br><?= __("Title") ?> : ' + context.title + '<br> <?= __("Balance") ?> : ' + USD(context.balance) + '</p>';
                },
                empty: [
                    '<center><h5><?= __("Data Member") ?></h5></center><hr> <center><p> <?= __("No data found.") ?></p></center>',
                ]
            }
        });
        $('input.typeahead-memberaccount').bind('typeahead:select', function (ev, suggestion) {
            $('#accountId').val(suggestion.account_id);
        });
        filterReload();
    });
</script>
