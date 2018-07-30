<?php

App::uses('AppController', 'Controller');

class HowTosController extends AppController {

    var $name = "HowTos";
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
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if (isset($this->HowTo->data['HowTo']['_wysihtml5_mode'])) {
                unset($this->HowTo->data['HowTo']['_wysihtml5_mode']);
            }
            $saved_data = [];
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                // processing the icon if uploaded
                App::import("Vendor", "qqUploader");
                $allowedExt = array("jpg", "jpeg", "png");
                $size = 10 * 1024 * 1024;
                $icon_path = [];
                foreach ($this->HowTo->data['HowTo'] as $index => $icon) {                    
                    if (!empty($icon['HowTo']['icon']['name'])) {
                        $uploader = new qqFileUploader($allowedExt, $size, $icon['HowTo']['icon']);
                        $result = $uploader->handleUpload("img" . DS . "how_to" . DS);
                        switch ($result['status']) {
                            case 206:
                                $icon_path[] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                break;
                        }
                    } else {
                        if(isset($icon['HowTo']['icon_path']) && !empty($icon['HowTo']['icon_path'])) {
                            $icon_path[] = $icon['HowTo']['icon_path'];
                        } else {
                            $icon_path[] = null;
                        }                        
                    }
                    unset($this->HowTo->data['HowTo'][$index]['HowTo']['icon']);
                }

                foreach ($this->HowTo->data['HowTo'] as $index => $data) {
                    $saved_data[] = [
                        $this->{ Inflector::classify($this->name) }->name => [
                            "id" => $data["HowTo"]['id'],
                            "ordering_number" => $data["HowTo"]['ordering_number'],
                            "title_ind" => $data["HowTo"]['title_ind'],
                            "title_eng" => $data["HowTo"]['title_eng'],
                            "description_ind" => $data["HowTo"]['description_ind'],
                            "description_eng" => $data["HowTo"]['description_eng'],
                            "icon_path" => $icon_path[$index]
                        ]
                    ];
                }
//                debug($saved_data);
//                die;
                try {
                    $this->{ Inflector::classify($this->name) }->saveAll($saved_data);
                    $this->Session->setFlash(__("Data has been saved successfully."), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_how_to'));
                } catch (Exception $ex) {
                    $this->Session->setFlash(__("There was an error when saving the data."), 'default', array(), 'danger');
                }
            } else {
                $this->request->data[Inflector::classify($this->name)]["id"] = $id;
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("all", ['recursive' => -1]);
            $this->data = $rows;
        }
    }

    function front_get_data_how_to($id = null) {
        $this->autoRender = false;
        if ($this->request->is("GET")) {
            if (!empty($id)) {
                $data_how_to = ClassRegistry::init("HowTo")->find("first", [
                    "conditions" => [
                        "HowTo.id" => $id
                    ],
                    "recursive" => -1
                ]);
                return json_encode($this->_generateStatusCode(205, "OK", $data_how_to));
            } else {
                return json_encode($this->_generateStatusCode(401, "Data Not Found."));
            }
        } else {
            return json_encode($this->_generateStatusCode(405));
        }
    }

}
