<?php

class Balance extends AppModel {

    var $name = 'Balance';
    var $belongsTo = array(
        "Account",
    );
    var $hasOne = array(
    );
    var $hasMany = array(
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
