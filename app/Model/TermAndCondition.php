<?php

class TermAndCondition extends AppModel {

    var $name = 'TermAndCondition';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "TermAndConditionDetail"
    );
    var $validate = array(
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
