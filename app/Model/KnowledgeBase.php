<?php

class KnowledgeBase extends AppModel {

    var $name = 'KnowledgeBase';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
    );
    var $validate = array(
        'title' => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        'description' => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        'placement_order' => [
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
