<?php

class HomeContent extends AppModel {

    var $name = 'HomeContent';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "HomeContentDetail"
    );
    var $validate = array(
        "title_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "title_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content_eng" => [
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