<?php

class Kurs {

    public function getUSDtoIDR() {
        $json = file_get_contents('http://data.fixer.io/api/convert?access_key=dbafc34c73d48e58450e3a6995b0d99b&from=USD&to=IDR&amount=1');
        $obj = json_decode($json);
        return $obj->result+50;
    }

}
