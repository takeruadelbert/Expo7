<?php

class Testimony extends AppModel {

    var $name = 'Testimony';
    var $belongsTo = array(
        "Account",
        "VerifyStatus",
        'VerifiedBy' => array(
            'className' => 'Account',
            'foreignKey' => 'verified_by_id',
        ),
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        'account_id' => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        'verified_by_id' => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
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
