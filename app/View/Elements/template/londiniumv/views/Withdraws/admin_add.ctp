<?php echo $this->Form->create("Withdraw", array("class" => "form-horizontal form-separate", "action" => "add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("DATA WITHDRAWAL") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Withdrawal") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->label("Dummy.member", __("Nama Member"), array("class" => "col-sm-3 col-md-4 control-label"));
                                            echo $this->Form->input("Dummy.member", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control typeahead-memberaccount", "placeholder" => __("Search Member Name / Referral Code...")));
                                            echo $this->Form->hidden("Withdraw.account_id");
                                            ?>
                                            <div class="has-feedback">
                                                <i class="icon-search3 form-control-feedback" style = "top:0px;"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-3 col-md-4 control-label">
                                                <label>Balance</label>
                                            </div>
                                            <div class="col-md-9 col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">$</button>
                                                    </span>
                                                    <input type="text" class="form-control text-right isdecimal" name="data[Dummy][balance]" readonly id="balance">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>                                
                                <div class="row">
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->label("Withdraw.note", __("Keterangan"), array("class" => "col-sm-2 control-label"));
                                        echo $this->Form->input("Withdraw.note", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "form-control ckeditor-fix", "placeholder" => __("Enter text ...")));
                                        ?>
                                    </div>                                        
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-actions text-right">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                                    <input type="reset" value="Reset" class="btn btn-info">
                                    <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>
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
            $('#WithdrawAccountId').val(suggestion.account_id);
            $("#balance").val(suggestion.balance);
        });
    });
</script>