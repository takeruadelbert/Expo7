<?php

App::uses('AppController', 'Controller');

class EventsController extends AppController {

    var $name = "Events";
    var $disabledAction = array(
    );
    var $contain = [
        "EventStatus",
        "Account" => [
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
        $this->set("eventStatuses", ClassRegistry::init("EventStatus")->find("list", ["fields" => ["EventStatus.id", "EventStatus.name"]]));
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!empty($this->Event->data['Event']['gambar'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->Event->data['Event']['gambar']);
                    $result = $uploader->handleUpload("img" . DS . "events" . DS);
                    switch ($result['status']) {
                        case 206:
                            $this->Event->data['Event']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->Event->data['Event']['gambar']);
                    $this->Event->data['Event']['account_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->Session->setFlash(__("Thumbnail Event is Empty."), 'default', array(), 'danger');
                    $this->redirect(array('action' => 'admin_add'));
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        }
    }

    function admin_edit($id = null) {
        if (!$this->{ Inflector::classify($this->name) }->exists($id)) {
            throw new NotFoundException(__('Data tidak ditemukan'));
        } else {
            if ($this->request->is("post") || $this->request->is("put")) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                $this->{ Inflector::classify($this->name) }->data[Inflector::classify($this->name)]['id'] = $id;
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                    if (!is_null($id)) {
                        if (!empty($this->Event->data['Event']['gambar'])) {
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->Event->data['Event']['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "events" . DS);
                            switch ($result['status']) {
                                case 206:
                                    $this->Event->data['Event']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                    break;
                            }
                            unset($this->Event->data['Event']['gambar']);
                            $this->Event->data['Event']['account_id'] = $this->Session->read("credential.admin.Account.id");
                            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                            $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                            $this->redirect(array('action' => 'admin_index'));
                        } else {
                            $this->Session->setFlash(__("Thumbnail Event is Empty."), 'default', array(), 'danger');
                            $this->redirect(array('action' => 'admin_add'));
                        }
                    }
                } else {
                    $this->request->data[Inflector::classify($this->name)]["id"] = $id;
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                }
            } else {
                $rows = $this->{ Inflector::classify($this->name) }->find("first", array(
                    'conditions' => array(
                        Inflector::classify($this->name) . ".id" => $id
                    ),
                    'recursive' => 2
                ));
                $this->data = $rows;
            }
        }
    }

}
