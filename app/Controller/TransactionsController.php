<?php

App::uses('AppController', 'Controller');

class TransactionsController extends AppController {

    var $name = "Transactions";
    var $disabledAction = array(
        "admin_edit",
        "admin_add",
        "admin_multiple_delete",
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
    }

    function admin_index() {
        $this->contain = [
            "Balance" => [
                "Account" => [
                    "Member",
                    "Biodata",
                ],
            ],
            "RelatedAccount" => [
                "Member",
                "Biodata",
            ],
            "TransactionType",
        ];
        $this->order="Transaction.id desc";
        $this->_activePrint(func_get_args(), "transaction");
        parent::admin_index();
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function _options() {
        $this->set("transactionTypes", $this->Transaction->TransactionType->find("list", ["fields" => ["TransactionType.id", "TransactionType.name"]]));
    }

}
