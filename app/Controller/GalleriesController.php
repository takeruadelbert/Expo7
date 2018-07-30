<?php

App::uses('AppController', 'Controller');

class GalleriesController extends AppController {

    var $name = "Galleries";
    var $disabledAction = array(
    );
    var $contain = [
        "Account" => [
            "Biodata"
        ],
        "ContentType",
        "State",
        "Country",
        "DetailPhoto"
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
        $this->set("contentTypes", ClassRegistry::init("ContentType")->find("list", ["fields" => ["ContentType.id", "ContentType.name"]]));
        $this->set("countries", ClassRegistry::init("Country")->find("list", ["fields" => ["Country.id", "Country.name"]]));
        $this->set("states", ClassRegistry::init("State")->find("list", ['fields' => ["State.id", "State.name"]]));
    }

    function admin_add() {
        if ($this->request->is("POST")) {
            if ($this->data['Gallery']['content_type_id'] == 1) {
                $this->redirect(array('action' => 'admin_add_photo'));
            } else {
                $this->redirect(array('action' => 'admin_add_video'));
            }
        }
    }

    function admin_add_photo() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $this->Gallery->data['Gallery']['account_id'] = $this->Session->read("credential.admin.Account.id");
                $this->Gallery->data['Gallery']['content_type_id'] = 1;
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        }
    }

    function admin_add_video() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!empty($this->Gallery->data['Gallery']['gambar'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "png", "jpeg");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->Gallery->data['Gallery']['gambar']);
                    $result = $uploader->handleUpload("gallery" . DS . "thumbnail" . DS . "video" . DS);
                    switch ($result['status']) {
                        case 206:
                            $this->Gallery->data['Gallery']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->Gallery->data['Gallery']['gambar']);
                    $this->Gallery->data['Gallery']['account_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->Gallery->data['Gallery']['content_type_id'] = 2;
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->Session->setFlash(__("Thumbnail is Empty."), 'default', array(), 'danger');
                    $this->redirect(array('action' => 'admin_add_video'));
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        }
    }

    function admin_edit_video($id = null) {
        if (!$this->{ Inflector::classify($this->name) }->exists($id)) {
            throw new NotFoundException(__('Data tidak ditemukan'));
        } else {
            if ($this->request->is("post") || $this->request->is("put")) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                $this->{ Inflector::classify($this->name) }->data[Inflector::classify($this->name)]['id'] = $id;
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                    if (!is_null($id)) {
                        if (!empty($this->Gallery->data['Gallery']['gambar'])) {
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->Gallery->data['Gallery']['gambar']);
                            $result = $uploader->handleUpload("gallery" . DS . "thumbnail" . DS . "video" . DS);
                            switch ($result['status']) {
                                case 206:
                                    $this->Gallery->data['Gallery']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                    break;
                            }
                            unset($this->Gallery->data['Gallery']['gambar']);
                        }
                        $this->Gallery->data['Gallery']['account_id'] = $this->Session->read("credential.admin.Account.id");
                        $this->Gallery->data['Gallery']['content_type_id'] = 2;
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                        $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
                    } else {
                        $this->Session->setFlash(__("Thumbnail Event is Empty."), 'default', array(), 'danger');
                        $this->redirect(array('action' => 'admin_add'));
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

    function admin_edit_photo($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $this->{ Inflector::classify($this->name) }->id = $id;
            if (!is_null($id)) {
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                    $this->Gallery->data['Gallery']['id'] = $id;
                    $this->Gallery->data['Gallery']['account_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->Gallery->data['Gallery']['content_type_id'] = 1;
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
    }

    function admin_view_video($id) {
        parent::admin_view($id);
    }

    function admin_view_photo($id) {
        parent::admin_view($id);
    }

    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderGallery');
    }

}
