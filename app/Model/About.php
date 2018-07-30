<?php

class About extends AppModel {

    var $name = 'About';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "vision_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "vision_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "mission_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "mission_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "description_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "description_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "video_url" => [
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
