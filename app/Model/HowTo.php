<?php

class HowTo extends AppModel {

    var $name = 'HowTo';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "Step"
    );
    var $validate = array(
        "title_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "title_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "description_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "description_eng" => [
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
