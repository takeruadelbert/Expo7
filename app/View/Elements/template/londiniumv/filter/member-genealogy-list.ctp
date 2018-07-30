<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><?= __("Filter Data") ?></h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?= __("Referral Code") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['fullname']) ? $this->request->query['fullname'] : '', "name" => "fullname", "div" => false, "label" => false, "class" => "form-control typeahead-memberaccount addon-field", "data-addon-symbol" => '<i class="icon-search3 form-control-feedback" style = "top:0px;"></i>',"id"=>"name", "placeholder" => __("Search Referral Code..."))) ?>
                        <?php echo $this->Form->hidden(null, ["name" => "account_id","id"=>"account_id"]); ?>
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
    $(document).ready(function () {

        var memberAccounts = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id_referral'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: false,
            remote: {
                url: '<?= Router::url("/admin/accounts/search_member", true) ?>' + '?q=%QUERY',
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
                    return '<p><?= __("ID Referral") ?> : ' + context.id_referral + '<br><?= __("Referral Name") ?> : ' + context.full_name + '<br><?= __("Level") ?> : ' + context.level + '<br><?= __("Title") ?> : ' + context.title + '</p>';
                },
                empty: [
                    '<center><h5><?= __("Data Member") ?></h5></center><hr> <center><p> <?= __("No data found.") ?></p></center>',
                ]
            }
        });
        $('input.typeahead-memberaccount').bind('typeahead:select', function (ev, suggestion) {
            $('#fullname').val(suggestion.full_label);
            $('#account_id').val(suggestion.account_id);
        });
    });
</script>
