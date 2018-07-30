<?php

class Account extends AppModel {

    public $validate = array(
    );
    public $belongsTo = array(
        'AccountStatus',
        "PasswordReset",
    );
    public $hasOne = array(
        "User" => array(
            "dependent" => true
        ),
        "Biodata" => array(
            "dependent" => true
        ),
        "Employee" => [
            "dependent" => true
        ],
        "Member" => [
            "dependent" => true,
        ],
        "Balance",
    );
    var $hasMany = array(
        "DirectDownline" => [
            "foreignKey" => "upline_id",
            "className" => "Member",
        ]
    );

    function isValidApiToken($token = false) {
        $account = $this->find("first", [
            "conditions" => [
                "User.api_token" => $token,
            ],
            "contain" => [
                "User",
                "Employee",
            ]
        ]);
        if (!empty($account)) {
            return $account;
        } else {
            return false;
        }
    }

    function _hashPassword($plain) {
        $hashed = hash("sha512", $plain, false);
        return $hashed;
    }

    function _testPassword($password, $salt, $hashedPassword) {
        return $hashedPassword == $this->_hashPassword($password . $salt);
    }

    function get_member_ids($members = null) {
        $contain = [
            "User",
            "Member"
        ];
        if(is_array($members)) {
            $members = $this->find("list",[
                "conditions" => [
                    "User.username" => $members
                ],
                "contain" => $contain,
                "fields" => [
                    "Member.id",
                    "Member.id"
                ]
            ]);
            return $members;
        } else {
            $member = $this->find("first",[
                "conditions" => [
                    "User.username" => $members
                ],
                "contain" => $contain
            ]);
            return $member['Member']['id'];
        }
    }
}
