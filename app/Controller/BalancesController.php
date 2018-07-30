<?php

App::uses('AppController', 'Controller');

class BalancesController extends AppController {

    var $name = "Balances";
    var $disabledAction = array(
        "admin_add",
        "admin_edit",
        "admin_multiple_delete",
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_list() {
        $this->autoRender = false;
        $q = $this->request->query["q"];
        $filteredAccountIds = [];
        $accountIds = ClassRegistry::init("Member")->find("list", [
            "fields" => [
                "Member.account_id"
            ],
            "conditions" => [
                "Member.id_referral like" => "%$q%",
            ],
            "recursive" => -1,
            "limit" => 50,
        ]);
        $filteredAccountIds = am($filteredAccountIds, $accountIds);
        $accountIds = ClassRegistry::init("Biodata")->find("list", [
            "fields" => [
                "Biodata.account_id"
            ],
            "conditions" => [
                "OR" => [
                    "Biodata.first_name like" => "%$q%",
                    "Biodata.last_name like" => "%$q%",
                ]
            ],
            "recursive" => -1,
            "limit" => 50,
        ]);
        $filteredAccountIds = am($filteredAccountIds, $accountIds);
        $balances = $this->Balance->find("all", [
            "conditions" => [
                "Balance.account_id" => $filteredAccountIds,
            ],
            "contain" => [
                "Account" => [
                    "Biodata",
                    "Member",
                ]
            ],
        ]);
        $result = [];
        foreach ($balances as $balance) {
            $result[] = [
                "balance_id" => $balance["Balance"]["id"],
                "full_name" => $balance["Account"]["Biodata"]["full_name"],
                "id_referral" => $balance["Account"]["Member"]["id_referral"],
                "label" => $balance["Account"]["Biodata"]["full_name"] . " / " . $balance["Account"]["Member"]["id_referral"],
            ];
        }
        echo json_encode($this->_generateStatusCode(206, null, $result));
    }

    function admin_index() {
        $this->contain = [
            "Account" => [
                "Biodata",
                "Member",
                "User",
            ],
        ];
        $this->_activePrint(func_get_args(), "member_balance");
        parent::admin_index();
    }

}
