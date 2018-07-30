<?php

App::uses('AppController', 'Controller');

class KnowledgeBasesController extends AppController {

    var $name = "KnowledgeBases";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function _options() {
        
    }
    
    function admin_index() {
        $this->order = "KnowledgeBase.placement_order";
        parent::admin_index();
    }
}
