<?php

App::uses('AppController', 'Controller');

class StatesController extends AppController {

    var $name = "States";
    var $disabledAction = array(
        "admin_index",
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

    function admin_list_by_country($country_id = null) {
        $this->autoRender = false;
        $data = $this->State->find("list", [
            "fields" => [
                "State.id",
                "State.name",
            ],
            "conditions" => [
                "State.country_id" => $country_id
            ]
        ]);
        echo json_encode($this->_generateStatusCode(205, null, $data));
    }

    function list_state($country_id = null) {
        $this->autoRender = false;
        $data = $this->State->find("list", [
            "fields" => [
                "State.id",
                "State.name",
            ],
            "conditions" => [
                "State.country_id" => $country_id
            ]
        ]);
        echo json_encode($this->_generateStatusCode(205, null, $data));
    }

}
