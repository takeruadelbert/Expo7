<?php

class Biodata extends AppModel {

    public $validate = array(
        'first_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'country_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus dipilih',
        ),
    );
    public $belongsTo = array(
        'State',
        'Country',
        'City',
        'Gender',
        "Religion",
        "Account",
        "IdentityType",
    );
    public $hasOne = array(
    );
    public $virtualFields = array(
        "full_name" => "trim(trim(Trailing ',' from concat(gelar_depan,' ',first_name,' ',last_name,',',gelar_belakang)))",
    );

}
