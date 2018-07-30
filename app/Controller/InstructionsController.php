<?php

App::uses('AppController', 'Controller');

class InstructionsController extends AppController {

    var $name = "Instructions";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_instruction() {
        if ($this->request->is("post") || $this->request->is("put")) {
//            $id = 1;
            $this->{ Inflector::classify($this->name) }->set($this->data);
//            $this->{ Inflector::classify($this->name) }->data[Inflector::classify($this->name)]['id'] = $id;            
//            if(empty($this->Instruction->find("first", ['conditions' => ["Instruction.id" => $id]]))) {
//                unset($this->Instruction->data['Instruction']['id']);
//            }
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {

                    if (!empty($this->Instruction->data['Instruction'])) {
                        foreach ($this->Instruction->data['Instruction'] as $index => $instruction) {
                            if (!empty($instruction['icon']['name'])) {
                                App::import("Vendor", "qqUploader");
                                $allowedExt = array("jpg", "jpeg", "png");
                                $size = 10 * 1024 * 1024;
                                $uploader = new qqFileUploader($allowedExt, $size, $instruction['icon']);
                                $result = $uploader->handleUpload("img" . DS . "icons" . DS);
                                switch ($result['status']) {
                                    case 206:
                                        $this->Instruction->data['Instruction'][$index]['icon_path'] = $result['data']['folder'] . $result['data']['fileName'];
                                        break;
                                }
                            }
                            unset($this->Instruction->data['Instruction'][$index]['icon']);
                        }                        
                    }
                    foreach ($this->Instruction->data['Instruction'] as $data) {
                        $this->Instruction->saveAll($data);
                    }
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_instruction'));
            } else {
//                $this->request->data[Inflector::classify($this->name)]["id"] = $id;
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("all", array(
            ));
            $this->data = $rows;
        }
    }

}
