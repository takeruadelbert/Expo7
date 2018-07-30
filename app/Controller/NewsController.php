<?php

App::uses('AppController', 'Controller');

class NewsController extends AppController {

    var $name = "News";
    var $disabledAction = array(
    );
    var $contain = [
        "NewsStatus",
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
        $this->set("newsStatuses", ClassRegistry::init("NewsStatus")->find("list", ["fields" => ["NewsStatus.id", "NewsStatus.name"]]));
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!empty($this->News->data['News']['gambar'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->News->data['News']['gambar']);
                    $result = $uploader->handleUpload("img" . DS . "news" . DS);
                    switch ($result['status']) {
                        case 206:
                            $this->News->data['News']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->News->data['News']['gambar']);
                    $this->News->data['News']['account_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->Session->setFlash(__("Thumbnail News is Empty."), 'default', array(), 'danger');
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
                        if (!empty($this->News->data['News']['gambar'])) {
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->News->data['News']['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "news" . DS);
                            switch ($result['status']) {
                                case 206:
                                    $this->News->data['News']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                    break;
                            }
                            unset($this->News->data['News']['gambar']);
                            $this->News->data['News']['account_id'] = $this->Session->read("credential.admin.Account.id");
                            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                            $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                            $this->redirect(array('action' => 'admin_index'));
                        } else {
                            $this->Session->setFlash(__("Thumbnail News is Empty."), 'default', array(), 'danger');
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
