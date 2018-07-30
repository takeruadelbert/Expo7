<?php

class Contact extends AppModel {

    var $name = 'Contact';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "address_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "email_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "phone" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "description_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "address_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "email_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "description_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "latitude" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "longitude" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
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
