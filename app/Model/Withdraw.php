<?php

class Withdraw extends AppModel {

    var $name = 'Withdraw';
    var $belongsTo = array(
        "Account",
        "WithdrawStatus",
        "ProcessedBy" => array(
            "foreignKey" => "processed_by_id",
            "className" => "Account"
        )
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "account_id" => [
            "rule" => "notEmpty",
            "message" => "Must be filled"
        ],
        "amount" => [
            'rule' => array('comparison', '>', 0),
            'message' => 'Amount must be greater than 0'
        ],
        "processed_by_id" => [
            "rule" => "notEmpty",
            "message" => "Must be not empty"
        ],
        "processed_dt" => [
            "rule" => "notEmpty",
            "message" => "Must be not empty"
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
