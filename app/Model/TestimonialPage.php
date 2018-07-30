<?php

class TestimonialPage extends AppModel {

    var $name = 'TestimonialPage';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "label_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "label_eng" => [
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
