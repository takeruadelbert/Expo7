<?php

class News extends AppModel {

    var $name = 'News';
    var $belongsTo = array(
        "NewsStatus",
        "Account"
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "title_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content_eng" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "title_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content_ind" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "news_date" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "news_status_id" => [
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
