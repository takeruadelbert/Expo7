<?php

App::uses('AppController', 'Controller');

class PopupsController extends AppController {

    var $name = "Popups";
    var $disabledAction=array(
        "admin_index",
        "admin_add",
        "admin_edit"
    );
    
    function beforeFilter() {
        parent::beforeFilter();
    }
    
    function admin_content(){
        $this->set("content",$this->params->query['content']);
        $this->set("query",$this->params->query);
    }
    
    function front_content() {
        $this->set("content", $this->params->query['content']);
        $this->set("query", $this->params->query);
        switch ($this->params->query['content']) {
            case "view_gallery_photo" :
                $contain = [
                    "Account" => [
                        "Biodata"
                    ],
                    "DetailPhoto" => [
                        "order" => "DetailPhoto.is_default DESC"
                    ],
                    "State",
                    "Country",
                    "ContentType"
                ];
                $this->data = ClassRegistry::init("Gallery")->find("first",[
                    "conditions" => [
                        "Gallery.id" => $this->params->query['id'],
                        "Gallery.content_type_id" => 1
                    ],
                    "contain" => $contain
                ]);
                break;
            case "view_gallery_video" :
                $contain = [
                    "Account" => [
                        "Biodata"
                    ],
                    "DetailPhoto",
                    "State",
                    "Country",
                    "ContentType"
                ];
                $this->data = ClassRegistry::init("Gallery")->find("first",[
                    "conditions" => [
                        "Gallery.id" => $this->params->query['id'],
                        "Gallery.content_type_id" => 2
                    ],
                    "contain" => $contain
                ]);
                break;
        }
    }
}
