<?php

class MemberTestimonialPage extends AppModel {

    var $name = 'MemberTestimonialPage';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
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
        "content_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content_eng" => [
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
