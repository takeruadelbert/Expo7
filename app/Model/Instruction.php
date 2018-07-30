<?php

class Instruction extends AppModel {

    var $name = 'Instruction';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "ordering_number" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content" => [
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
