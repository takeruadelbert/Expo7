<?php

class Country extends AppModel {

    var $name = 'Country';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        "State"
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
    
    function get_country_from_ip_address($ip_address = null) {
        if(!empty($ip_address)) {
            $excluded_ip_address = ["127.0.0.1", "::1"];
            if(!in_array($ip_address, $excluded_ip_address)) {
                $details = json_decode(file_get_contents("http://ipinfo.io/{$ip_address}/json"));
                $country = $details->country;
                $language = $country == "ID" ? "ind" : "eng";
                return $language;
            } else {
                return "eng";
            }
        }
    }

}

?>
