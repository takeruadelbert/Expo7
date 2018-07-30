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
                        <label><?= __("e-Wallet") ?></label>
                        <div class="has-feedback">
                            <?= $this->Form->input(null, array("default" => isset($this->request->query['ignore_ewallet']) ? $this->request->query['ignore_ewallet'] : '', "name" => "ignore_ewallet", "div" => false, "label" => false, "class" => "form-control tip typeahead-balance", "placeholder" => __("Search Member Name / Referral Code..."))) ?>
                            <?= $this->Form->hidden(null, array("default" => isset($this->request->query['select_Transaction_balance_id']) ? $this->request->query['select_Transaction_balance_id'] : '', "name" => "select.Transaction.balance_id", "id" => "filter-balance_id")) ?>
                            <i class="icon-search3 form-control-feedback" style="top:0"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label ><?= __("Transaction Type") ?></label>
                        <?= $this->Form->input(null, array("options" => $transactionTypes, "default" => isset($this->request->query['select_Transaction_transaction_type_id']) ? $this->request->query['select_Transaction_transaction_type_id'] : '', "name" => "select.Transaction.transaction_type_id", "div" => false, "label" => false, "class" => "select-full", "empty" => "", "placeholder" => __("-All-"))) ?>
                    </div>
                    <div class="col-md-2">
                        <label><?= __("Transaction Period") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['awal_Transaction_created']) ? $this->request->query['awal_Transaction_created'] : '', "name" => "awal.Transaction.created", "div" => false, "label" => false, "class" => "form-control tip datepicker", "placeholder" => __("Start period"))) ?>
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['akhir_Transaction_created']) ? $this->request->query['akhir_Transaction_created'] : '', "name" => "akhir.Transaction.created", "div" => false, "label" => false, "class" => "form-control tip datepicker", "placeholder" => __("End period"))) ?>
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
    $(document).ready(function () {
        var balances = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('label'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: false,
            remote: {
                url: '<?= Router::url("/admin/balances/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
                filter: function (response) {
                    return response.data;
                }
            }
        });
        balances.clearPrefetchCache();
        balances.initialize(true);
        $('input.typeahead-balance').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'balances',
            display: 'label',
            source: balances.ttAdapter(),
            templates: {
                header: '<center><h5><?= __("e-Wallet") ?></h5></center><hr>',
                suggestion: function (context) {
                    return '<p><?= __("Member Name") ?> : ' + context.full_name + '<br><?= __("Referral Code") ?> : ' + context.id_referral + '</p>';
                },
                empty: [
                    '<center><h5><?= __("e-Wallet") ?></h5></center><hr> <center><p> <?= __("No data found.") ?></p></center>',
                ]
            }
        });
        $('input.typeahead-balance').bind('typeahead:select', function (ev, suggestion) {
            $('#filter-balance_id').val(suggestion.balance_id);
        });
    });
</script>
