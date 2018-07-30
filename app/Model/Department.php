<?php

class Department extends AppModel {

    var $name = 'Department';
    var $belongsTo = array(
        "Parent" => [
            'className' => "Department",
            'foreignKey' => "parent_id"
        ],
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "Child" => [
            "className" => "Department",
            "foreignKey" => "parent_id",
        ]
    );
    var $validate = array(
        "name" => [
            "rule" => "notEmpty",
            "message" => "Harus Diisi"
        ],
        "uniq_name" => [
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
