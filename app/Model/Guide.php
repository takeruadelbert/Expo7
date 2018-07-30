<?php

class Guide extends AppModel {

    var $name = 'Guide';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "Step"
    );
    var $validate = array(
        "video_url" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "mechanism" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "fact" => [
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
