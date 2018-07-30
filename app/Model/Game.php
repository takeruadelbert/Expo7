<?php

class Game extends AppModel {

    var $name = 'Game';
    var $belongsTo = array(
        "GameStatus",
        "Creator" => [
            "foreign_key" => "creator_id",
            "className" => "Account"
        ]
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "GameDetail" => [
            "dependent" => true
        ],
        "CategoryGameDetail" => [
            "dependent" => true
        ],
        "Scoreboard"
    );
    var $validate = array(
        'name' => array(
            'Harus diisi' => array("rule" => 'notEmpty'),
            'Sudah terdaftar' => array("rule" => 'isUnique'),
        ),
        "description_ind" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "description_eng" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "google_play_url" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        "app_store_url" => [
            'rule' => 'notEmpty',
            'message' => 'Harus Diisi'
        ],
        'code' => array(
            'Harus diisi' => array("rule" => 'notEmpty'),
            'Sudah terdaftar' => array("rule" => 'isUnique'),
        )
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
