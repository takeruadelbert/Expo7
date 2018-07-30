<?php

App::uses('AppController', 'Controller');

class DetailPhotosController extends AppController {

    var $name = "DetailPhotos";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_delete($id = null) {
        $this->autoRender = false;
        if(!empty($id)) {
            if($this->request->is("DELETE")) {
                if($this->DetailPhoto->delete($id)) {
                    $this->DetailPhoto->delete($id);
                    return json_encode($this->_generateStatusCode(204, 'File has been deleted.'));
                } else {
                    return json_encode($this->_generateStatusCode(405, 'Error : Deleted failed.'));
                }
            } else {
                return json_encode($this->_generateStatusCode(400, "Error : Invalid Request."));
            }
        } else {
            return json_encode($this->_generateStatusCode(401, "Error : ID is null"));
        }
    }
}
