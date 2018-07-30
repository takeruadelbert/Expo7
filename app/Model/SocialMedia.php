<?php

class SocialMedia extends AppModel {

    var $name = 'SocialMedia';
    var $belongsTo = array(
        "ShowStatus"
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "name" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "url" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "show_status_id" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ]
    );
    var $virtualFields = array(
   );

    function beforeValidate($options = array()) {
        
    }

    function deleteData($id = null) {
        return $this->delete($id);
    }

}

?>
