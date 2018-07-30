<?php

App::uses('AppController', 'Controller');

class TermAndConditionsController extends AppController {

    var $name = "TermAndConditions";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_index() {
        if ($this->request->is("post") || $this->request->is("put")) {
            $id = 1;
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $this->{ Inflector::classify($this->name) }->data[Inflector::classify($this->name)]['id'] = $id;
            
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $this->TermAndCondition->data['TermAndCondition']['id'] = $id;
                $this->TermAndCondition->_deleteableHasmany();
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->request->data[Inflector::classify($this->name)]["id"] = $id;
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array(
                'conditions' => array(
                    Inflector::classify($this->name) . ".id" => 1
                )
            ));
            $this->data = $rows;
        }
    }

}
