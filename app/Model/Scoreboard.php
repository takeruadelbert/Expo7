<?php

class Scoreboard extends AppModel {
    var $name = 'Scoreboard';
    var $belongsTo = array(
        "Game",
        "Member"
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
    
    function truncate_data() {
        return $this->query('TRUNCATE TABLE scoreboards');
    }

}

?>
