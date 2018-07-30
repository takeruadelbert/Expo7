<?php

App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

    var $name = "Newsletters";
    var $disabledAction = array(
        "admin_add",
        "admin_edit"
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }
    
    function admin_index() {
        $this->order = "Newsletter.created DESC";
        parent::admin_index();
    }

    function front_subscribe() {
        $this->autoRender = false;
        if($this->request->is("POST")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, ['validate' => 'only'])) {
                $savedData = [];
                $savedData['Newsletter']['email'] = $this->data['Newsletter']['email'];
                try {
                    ClassRegistry::init("Newsletter")->save($savedData);
                    $this->Session->setFlash(__("Successfully Subcribe."), 'default', array(), 'success');
                } catch (Exception $ex) {
                    $this->Session->setFlash(__("Error : failed to subscribe."), 'default', array(), 'danger');
                }                
            } else {
                $errors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Error : Email has been registered."), 'default', array(), 'danger');
            }
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Error : failed to subscribe. Please try again."), 'default', array(), 'danger');
            $this->redirect($this->referer());
        }
    }
}
