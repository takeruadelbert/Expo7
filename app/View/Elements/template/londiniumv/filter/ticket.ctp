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
                        <label><?= __("Ticket Number") ?></label>
                        <?= $this->Form->input(null, array("default" => isset($this->request->query['Ticket_ticket_number']) ? $this->request->query['Ticket_ticket_number'] : '', "name" => "Ticket.ticket_number", "div" => false, "label" => false, "class" => "form-control tip")) ?>
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Department") ?></label>
                        <?= $this->Form->input(null, ['label' => false, 'div' => false, 'name' => 'select.Ticket.department_id', 'class' => 'select-full', 'default' => isset($this->request->query['select_Ticket_department_id']) ? $this->request->query['select_Ticket_department_id'] : "", 'options' => $departments, 'empty' => '', 'placeholder' => "- Select Department -"]); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Ticket Status</label>
                        <?= $this->Form->input(null, ['div' => false, 'label' => false, 'name' => "Ticket.ticket_status_id", 'class' => "select-full", 'options' => $ticketStatuses, "empty" => "", "placeholder" => "- Select Status -", 'default' => isset($this->request->query['Ticket_ticket_status_id']) ? $this->request->query['Ticket_ticket_status_id'] : ""]) ?>
                    </div>
                    <div class="col-md-6">
                        <div class="has-feedback">
                            <?php
                            $member = "";
                            if (isset($this->request->query['select_Account_id'])) {
                                $member = ClassRegistry::init("Account")->find("first", [
                                    "conditions" => [
                                        "Account.id" => $this->request->query['select_Account_id']
                                    ],
                                    "contain" => [
                                        "Biodata"
                                    ]
                                ]);
                            }
                            ?>
                            <label><?= __("Member Name") ?></label>
                            <input type="text" placeholder="Search Member Name ..." class="form-control typeahead-ajax-member" value="<?= !empty($member) ? $member['Biodata']['full_name'] : "" ?>">
                            <input type="hidden" name="select.Account.id" id="member">
                            <i class="icon-search3 form-control-feedback"></i>
                        </div>
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
    /* Search Member */
    var member = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('full_name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '<?= Router::url("/admin/accounts/list_account_with_member", true) ?>',
        remote: {
            url: '<?= Router::url("/admin/accounts/list_account_with_member", true) ?>' + '?q=%QUERY',
            wildcard: '%QUERY',
        }
    });
    member.clearPrefetchCache();
    member.initialize(true);
    $('input.typeahead-ajax-member').typeahead({
        hint: false,
        highlight: true
    }, {
        name: 'member',
        display: 'full_name',
        source: member.ttAdapter(),
        templates: {
            header: '<center><h5>Data Member</h5></center><hr>',
            suggestion: function (data) {
                return '<p> Name : ' + data.full_name + '<br/> Referral ID : ' + data.referral_id + '</p>';
            },
            empty: [
                '<center><h5>Data Member</h5></center><hr> <center><p> No result found. </p></center>',
            ]
        }
    });
    $('input.typeahead-ajax-member').bind('typeahead:select', function (ev, suggestion) {
        $("#member").val(suggestion.id);
    });
</script>
