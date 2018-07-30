<?php

App::uses('AppController', 'Controller');

class ContactMessagesController extends AppController {

    var $name = "ContactMessages";
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

    function front_contact() {
        if($this->request->is("POST")) {
            $data = [
                "ContactMessage" => [
                    'name' => $this->data['ContactUs']['name'],
                    'email' => $this->data['ContactUs']['email'],
                    'phone_number' => $this->data['ContactUs']['phone_number'],
                    'company' => $this->data['ContactUs']['company'],
                    'message' => $this->data['ContactUs']['message']
                ]                
            ];
            try {
                ClassRegistry::init("ContactMessage")->save($data);
                $this->Session->setFlash(__("Successfully submitted."), 'default', array(), 'success');
            } catch (Exception $ex) {
                $this->Session->setFlash(__("Error"), 'default', array(), 'danger');
            }
            $this->redirect("/contact");
        }
    }
}
