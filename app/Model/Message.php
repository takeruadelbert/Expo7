<?php

class Message extends AppModel {

    var $name = 'Message';
    var $belongsTo = array(
        "Recipient" => [
            "className" => "Account",
            "foreginKey" => "recipient_id"
        ],
        "Sender" => [
            "className" => "Account",
            "foreignKey" => "sender_id"
        ],
        "Parent" => [
            "className" => "Message",
            "foreignKey" => "parent_id"
        ]
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "Child" => [
            "className" => "Message",
            "foreignKey" => "parent_id"
        ]
    );
    var $validate = array(
        'title' => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        'recipient_id' => [
            'rule' => 'notEmpty',
            'message' => "Harus Diisi"
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
