<?php

class PaymentGuide extends AppModel {

    var $name = 'PaymentGuide';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "description" => [
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
