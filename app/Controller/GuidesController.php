<?php

App::uses('AppController', 'Controller');

class GuidesController extends AppController {

    var $name = "Guides";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_how_to() {
        if ($this->request->is("post") || $this->request->is("put")) {
            $id = 1;
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $this->{ Inflector::classify($this->name) }->data[Inflector::classify($this->name)]['id'] = $id;
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!is_null($id)) {
                    if (!empty($this->Guide->data['Step'])) {
                        foreach ($this->Guide->data['Step'] as $index => $step) {
                            if (!empty($step['icon']['name'])) {
                                App::import("Vendor", "qqUploader");
                                $allowedExt = array("jpg", "jpeg", "png");
                                $size = 10 * 1024 * 1024;
                                $uploader = new qqFileUploader($allowedExt, $size, $step['icon']);
                                $result = $uploader->handleUpload("img" . DS . "icons" . DS);
                                debug($result);
                                switch ($result['status']) {
                                    case 206:
                                        $this->Guide->data['Step'][$index]['icon_path'] = $result['data']['folder'] . $result['data']['fileName'];
                                        break;
                                }
                            }
                            unset($this->Guide->data['Step'][$index]['icon']);
                        }                        
                    }
                    $this->Guide->_deleteableHasmany();
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_how_to'));
                }
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
