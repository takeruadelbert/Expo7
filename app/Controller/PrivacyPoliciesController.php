<?php

App::uses('AppController', 'Controller');

class PrivacyPoliciesController extends AppController {

    var $name = "PrivacyPolicies";
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
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $savedData = [];
                $dataInput = [];
                foreach ($this->PrivacyPolicy->data['PrivacyPolicy'] as $data) {
                    if(!empty($data['id'])) {
                        $dataInput[] = $data['id'];
                        $savedData['PrivacyPolicy']['id'] = $data['id'];
                        $savedData['PrivacyPolicy']['title_ind'] = $data['title_ind'];
                        $savedData['PrivacyPolicy']['short_title_ind'] = $data['short_title_ind'];
                        $savedData['PrivacyPolicy']['content_ind'] = $data['content_ind'];
                        $savedData['PrivacyPolicy']['title_eng'] = $data['title_eng'];
                        $savedData['PrivacyPolicy']['short_title_eng'] = $data['short_title_eng'];
                        $savedData['PrivacyPolicy']['content_eng'] = $data['content_eng'];
                        $savedData['PrivacyPolicy']['ordering_number'] = $data['ordering_number'];
                        $this->PrivacyPolicy->saveAll($savedData);
                    } else {
                        $savedData['PrivacyPolicy']['title_ind'] = $data['title_ind'];
                        $savedData['PrivacyPolicy']['short_title_ind'] = $data['short_title_ind'];
                        $savedData['PrivacyPolicy']['content_ind'] = $data['content_ind'];
                        $savedData['PrivacyPolicy']['title_eng'] = $data['title_eng'];
                        $savedData['PrivacyPolicy']['short_title_eng'] = $data['short_title_eng'];
                        $savedData['PrivacyPolicy']['content_eng'] = $data['content_eng'];
                        $savedData['PrivacyPolicy']['ordering_number'] = $data['ordering_number'];
                        $this->PrivacyPolicy->saveAll($savedData);
                        $dataInput[] = $this->PrivacyPolicy->getLastInsertID();
                    }
                }
                $existingData = [];
                $dataPrivacyPolicies = ClassRegistry::init("PrivacyPolicy")->find("all");
                foreach ($dataPrivacyPolicies as $data) {
                    $existingData[] = $data['PrivacyPolicy']['id'];
                }
                try {
                    $dataDiff = array_diff($existingData, $dataInput);
                    if(!empty($dataDiff)) {
                        foreach ($dataDiff as $diff) {
                            $this->PrivacyPolicy->delete($diff);
                        }
                    }
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                } catch (Exception $ex) {
                    $this->Session->setFlash(__($ex), 'default', array(), 'danger');
                }
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->request->data[Inflector::classify($this->name)]["id"] = $id;
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("all");
            $this->data = $rows;
        }
    }

}
