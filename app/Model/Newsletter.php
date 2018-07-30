<?php

class Newsletter extends AppModel {

    var $name = 'Newsletter';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "email" => [
            'rule' => 'isUnique',
            'message' => 'Has been registered'
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
