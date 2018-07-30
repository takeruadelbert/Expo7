<?php

class Rank extends AppModel {

    var $name = 'Rank';
    var $belongsTo = array(
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

    function getList() {
        $ranks = $this->find("all", [
            "order" => "Rank.level asc",
        ]);
        $list = [];
        foreach ($ranks as $rank) {
            $list[$rank["Rank"]["id"]] = "Level {$rank["Rank"]["level"]}";
        }
        return $list;
    }

}

?>
