<?php

class Event extends AppModel {

    var $name = 'Event';
    var $belongsTo = array(
        "EventStatus",
        "Account"
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "account_id" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "title" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "content" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "event_date" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "event_status_id" => [
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
