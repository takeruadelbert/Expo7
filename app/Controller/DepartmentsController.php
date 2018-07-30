<?php

App::uses('AppController', 'Controller');

class DepartmentsController extends AppController {

    var $name = "Departments";
    var $disabledAction=array(
    );
    var $contain = [
        'Parent'
    ];
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }
    
    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }
    
    function _options() {
        $this->set("parents", ClassRegistry::init("Department")->find("list", ['fields' => ['Department.id', 'Department.name']]));
    }
}
