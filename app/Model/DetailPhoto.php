<?php

class DetailPhoto extends AppModel {

    var $name = 'DetailPhoto';
    var $belongsTo = array(
        "Gallery"
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
