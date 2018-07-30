<?php

class Gallery extends AppModel {

    var $name = 'Gallery';
    var $belongsTo = array(
        "ContentType",
        "Account",
        "Country",
        "State"
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "DetailPhoto"
    );
    var $validate = array(
        "title" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "date" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "country_id" => [
            "rule" => "notEmpty",
            "message" => "Harus Dipilih"
        ],
        "state_id" => [
            "rule" => "notEmpty",
            "message" => "Harus Dipilih"
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
