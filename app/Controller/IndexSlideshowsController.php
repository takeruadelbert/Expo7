<?php

App::uses('AppController', 'Controller');

class IndexSlideshowsController extends AppController {

    var $name = "IndexSlideshows";
    var $disabledAction = array(
    );
    var $contain = [
        "Account" => [
            "Biodata"
        ],
        "SlideshowStatus"
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
        $this->set("slideshowStatuses", ClassRegistry::init("SlideshowStatus")->find("list", ["fields" => ["SlideshowStatus.id", "SlideshowStatus.name"]]));
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!empty($this->IndexSlideshow->data['IndexSlideshow']['gambar']['name'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->IndexSlideshow->data['IndexSlideshow']['gambar']);
                    $result = $uploader->handleUpload("img" . DS . "index_slideshows" . DS);
                    switch ($result['status']) {
                        case 206:
                            $this->IndexSlideshow->data['IndexSlideshow']['image_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->IndexSlideshow->data['IndexSlideshow']['gambar']);
                    $this->IndexSlideshow->data['IndexSlideshow']['account_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->Session->setFlash(__("Image must not be empty."), 'default', array(), 'danger');
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
                        if (!empty($this->IndexSlideshow->data['IndexSlideshow']['gambar']['name'])) {
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->IndexSlideshow->data['IndexSlideshow']['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "index_slideshows" . DS);
                            switch ($result['status']) {
                                case 206:
                                    $this->IndexSlideshow->data['IndexSlideshow']['image_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                    break;
                            }
                            unset($this->IndexSlideshow->data['IndexSlideshow']['gambar']);
                        }
                        $this->IndexSlideshow->data['IndexSlideshow']['account_id'] = $this->Session->read("credential.admin.Account.id");
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                        $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
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
