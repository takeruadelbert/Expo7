<?php

class Ticket extends AppModel {

    var $name = 'Ticket';
    var $belongsTo = array(
        "TicketStatus",
        "Parent" => [
            "className" => "Ticket",
            "foreignKey" => "parent_id"
        ],
        "Account",
        "Department"
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "Child" => [
            "className" => "Ticket",
            "foreignKey" => "parent_id"
        ]
    );
    var $validate = array(
        "title" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "message" => [
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
