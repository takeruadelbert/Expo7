<?php

class CategoryGameDetail extends AppModel {

    var $name = 'CategoryGameDetail';
    var $belongsTo = array(
        "CategoryGame",
        "Game"
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
