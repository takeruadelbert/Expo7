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
                        <div class="has-feedback">
                            <?php
                            $account = "";
                            if (isset($this->request->query['select_Testimony_account_id'])) {
                                $account = ClassRegistry::init("Account")->find("first", [
                                    "conditions" => [
                                        "Account.id" => $this->request->query['select_Testimony_account_id']
                                    ],
                                    "contain" => [
                                        "Biodata"
                                    ]
                                ]);
                            }
                            ?>
                            <label><?= __("Name") ?></label>
                            <input type="text" placeholder="Cari Nama ..." class="form-control typeahead-ajax-account" value="<?= !empty($account) ? $account['Biodata']['full_name'] : "" ?>">
                            <input type="hidden" name="select.Testimony.account_id" id="account">
                            <i class="icon-search3 form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Judul") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Testimony_title']) ? $this->request->query['Testimony_title'] : '', "name" => "Testimony.title", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                </div>
            </div>
            <div class='form-group'>
                <div class='row'>
                    <div class='col-md-6'>
                        <label>Status</label>
                        <?= $this->Form->input(null, ["label" => false, 'div' => false, "name" => "Testimony.verify_status_id", 'class' => "select-full", 'empty' => "", 'placeholder' => "- Choose Status -", 'options' => $verifyStatuses, 'default' => isset($this->request->query['Testimony_verify_status_id']) ? $this->request->query['Testimony_verify_status_id'] : ""]) ?>
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
    /* Cari Nama */
    var account = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('full_name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '<?= Router::url("/admin/accounts/list", true) ?>' + '?q=%QUERY',
        remote: {
            url: '<?= Router::url("/admin/accounts/list", true) ?>' + '?q=%QUERY',
            wildcard: '%QUERY',
        }
    });
    account.clearPrefetchCache();
    account.initialize(true);
    $('input.typeahead-ajax-account').typeahead({
        hint: false,
        highlight: true
    }, {
        name: 'account',
        display: 'full_name',
        source: account.ttAdapter(),
        templates: {
            header: '<center><h5>Data</h5></center><hr>',
            suggestion: function (data) {
                return '<p> Nama : ' + data.full_name + '</p>';
            },
            empty: [
                '<center><h5>Data</h5></center><hr> <center><p> Hasil Pencarian Anda Tidak Dapat Ditemukan. </p></center>',
            ]
        }
    });
    $('input.typeahead-ajax-account').bind('typeahead:select', function (ev, suggestion) {
        $("#account").val(suggestion.id);
    });
</script>
