<?php

App::uses('AppController', 'Controller');

class TestimoniesController extends AppController {

    var $name = "Testimonies";
    var $disabledAction = array(
        "admin_add",
        "admin_edit"
    );
    var $contain = [
        "VerifyStatus",
        'Account' => [
            "Biodata"
        ]
    ];
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function _options() {
        $this->set("verifyStatuses", ClassRegistry::init("VerifyStatus")->find("list", ['VerifyStatus.id', 'VerifyStatus.name']));
    }
    
    function admin_change_status_verify() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->Testimony->data['Testimony']['id'] = $this->request->data['id'];
            $this->Testimony->data['Testimony']['verify_status_id'] = $this->request->data['status'];
            if ($this->request->data['status'] !== '1') {
                $this->Testimony->data['Testimony']['verified_by_id'] = $this->_getEmployeeId();
                $this->Testimony->data['Testimony']['verified_datetime'] = date("Y-m-d H:i:s");
            } else {
                $this->Testimony->data['EmployeeSalary']['verified_by_id'] = null;
                $this->Testimony->data['EmployeeSalary']['verified_datetime'] = null;
            }
            $this->Testimony->saveAll();
            $data = $this->Testimony->find("first", array("conditions" => array("Testimony.id" => $this->request->data['id']), "recursive" => 3));
            echo json_encode($this->_generateStatusCode(207, null, array("status_label" => $data['VerifyStatus']['name'])));
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }
    
    function admin_index() {
        $this->_activePrint(func_get_args(), "testimony");
        parent::admin_index();
    }
}