<?php

class PrivacyPolicy extends AppModel {

    var $name = 'PrivacyPolicy';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        "ordering_number" => [
            'rule' => [
                "notEmpty",
                "isUnique"
            ],
            'message' => "Harus Diisi & Unik"
        ],
        "title_ind" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "short_title_ind" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "content_ind" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "title_eng" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "short_title_eng" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "content_eng" => [
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
