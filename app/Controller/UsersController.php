<?php

class UsersController extends AppController {

    var $disabledAction = array();

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Data User");
        $this->_setPageInfo("admin_add", "Tambah User");
        $this->_setPageInfo("admin_edit", "Edit User");
    }
    
    function member_change_profile_picture() {
        if ($this->request->is("post")) {
            $user_id = $this->Session->read("credential.member.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024; // max file 10MB
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['User']['profile_picture']);
            $result = $uploader->handleUpload("front_file" . DS . "expo7" . DS . "img" . DS . "profile-picture" . DS);
            unset($this->User->data['User']['profile_picture']);
            switch ($result['status']) {
                case 206:
                    $this->User->data['User']['id'] = $user_id;
                    $this->User->data['User']['profile_picture_thumbnail'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $path = $this->User->data['User']['profile_picture'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
            $this->Session->write("credential.member.User.profile_picture", $path);
            $this->Session->setFlash(__("Successfully changed profile picture"), 'default', array(), 'success');
            $this->redirect("/member/edit_profile");
        }
    }
}
