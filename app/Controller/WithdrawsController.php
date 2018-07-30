<?php

App::uses('AppController', 'Controller');

class WithdrawsController extends AppController {

    var $name = "Withdraws";
    var $disabledAction = array(
        "admin_edit",
        "admin_delete"
    );
    var $contain = [
        "WithdrawStatus",
        "Account" => [
            "Biodata"
        ],
        "ProcessedBy" => [
            "Biodata"
        ]
    ];

    function _options() {
        $this->set("withdrawStatuses", ClassRegistry::init("WithdrawStatus")->find("list", ['fields' => ['WithdrawStatus.id', 'WithdrawStatus.name']]));
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $this->Withdraw->_numberSeperatorRemover();
                $this->Withdraw->data['Withdraw']['amount'] = $this->Withdraw->data['Dummy']['balance'];
                unset($this->Withdraw->data['Dummy']);
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Withdrawal Success."), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        }
    }

    function admin_change_status_withdraw() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->Withdraw->data['Withdraw']['id'] = $this->request->data['id'];
            $this->Withdraw->data['Withdraw']['withdraw_status_id'] = $this->request->data['status'];
            if ($this->request->data['status'] == '2') {
                $this->Withdraw->data['Withdraw']['processed_by_id'] = $this->Session->read("credential.admin.Account.id");
                $this->Withdraw->data['Withdraw']['processed_dt'] = date("Y-m-d H:i:s");
            } else {
                $this->Withdraw->data['Withdraw']['processed_by_id'] = null;
                $this->Withdraw->data['Withdraw']['processed_dt'] = null;
            }
            try {
                $this->Withdraw->saveAll();
                $data = $this->Withdraw->find("first", array("conditions" => array("Withdraw.id" => $this->request->data['id']), "contain" => ["ProcessedBy" => ["Biodata"], "WithdrawStatus"]));

                // post to Transaction Table
                if ($this->request->data['status']) {
                    $code = "WD";
                    $amount = $data['Withdraw']['amount'];
                    $account_id = $data['Withdraw']['account_id'];
                    ClassRegistry::init("Transaction")->updateTransaction($code, $amount, $account_id, $account_id);
                }                
                echo json_encode($this->_generateStatusCode(207, null, $data));
            } catch (Exception $ex) {
                echo "Error found when trying to update status and/or update the transaction table.";
                debug("Error found when trying to update status and/or update the transaction table.");
                die;
            }
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }
    
    function admin_index() {
        $this->_activePrint(func_get_args(), "withdrawal");
        parent::admin_index();
    }

}
