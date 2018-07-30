<?php

class Member extends AppModel {

    var $name = 'Member';
    var $belongsTo = array(
        "Account",
        "Rank",
        "Title",
        "Upline" => [
            "className" => "Account",
            "foreignKey" => "upline_id",
        ]
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

    function generateIdReferral() {
        $found = false;
        do {
            $referral = generateRandomAlphaNumeric();
            $found = !$this->hasAny(["id_referral" => $referral]);
        } while (!$found);
        return $referral;
    }

    function updateAfterRegistration($accountId = null) {
        $account = $this->Account->find("first", [
            "conditions" => [
                "Account.id" => $accountId,
            ],
            "contain" => [
                "Member" => [
                    "Upline" => [
                        "Member",
                    ],
                ],
                "User",
                "Biodata",
            ],
        ]);
        if (!empty($account)) {
            //== start of update upline direct_downline_hold ==
            $uplineMemberId = $account["Member"]["Upline"]["Member"]["id"];
            $this->save(["id" => $uplineMemberId, "direct_downline_hold" => $account["Member"]["Upline"]["Member"]["direct_downline_hold"] + 1]);
            //== end of update upline direct_downline_hold ==
            //== start of creating username ==
            $userId = $account["User"]["id"];
            $inc_id = 1;
            $m = date('m');
            $y = date('y');
            $testCode = "[0-9]{6}$m$y";
            $lastRecord = $this->Account->User->find('first', array("recursive" => -1, 'conditions' => array("not" => ["User.id" => $userId], 'and' => array("User.username regexp" => $testCode)), 'order' => array('User.username' => 'DESC')));
            if (!empty($lastRecord)) {
                $current = $lastRecord["User"]["username"];
                $inc_id += substr($current, 0, 6);
            }
            $inc_id = sprintf("%06d", $inc_id);
            $username = "$inc_id$m$y";
            $this->Account->User->id = $userId;
            $this->Account->User->save(["id" => $userId, "username" => $username]);
            //== end of creating username ==
            //== start of activation code ==
            $activationCode = hash("sha224", uniqid(mt_rand(), true), false);
            $this->Account->id = $accountId;
            $this->Account->save(["id" => $accountId, "activation_code" => $activationCode]);
            //== end of activation code ==
            return true;
        } else {
            return false;
        }
    }

    function approvedPayment($accountId = null) {
        global $registrationFare;
        $account = $this->Account->find("first", [
            "conditions" => [
                "Account.id" => $accountId,
            ],
            "contain" => [
                "Biodata",
                "User",
                "Member" => [
                    "Upline" => [
                        "Member",
                        "Biodata"
                    ],
                    "Rank",
                ],
            ],
        ]);
        if (!$account["Member"]["is_paid"]) {
            $this->saveAll([
                "Account" => [
                    "id" => $accountId,
                    "account_status_id" => 1,
                ],
                "Member" => [
                    "id" => $account["Member"]["id"],
                    "is_paid" => true,
                    "joining_dt" => date("Y-m-d H:i:s"),
                ]
            ]);
            //create eWallet
            ClassRegistry::init("Transaction")->getBalanceId($accountId);
            //update deposit transaction
            ClassRegistry::init("Transaction")->updateTransaction("RF", $registrationFare, _WESTWOOD_ACCOUNT_ID, $accountId);
            //update upline data
            $this->updateUpline($account["Member"]["Upline"]["id"], 1, $accountId);
        }
    }

    function updateUpline($accountId, $chain, $relatedAccountId) {
        global $shareFare;
        //if chain == 7, get bonus
        //if chain <= level, level up
        $account = $this->Account->find("first", [
            "conditions" => [
                "Account.id" => $accountId,
            ],
            "contain" => [
                "Biodata",
                "User",
                "Member" => [
                    "Upline" => [
                        "Member",
                        "Biodata"
                    ],
                    "Rank",
                ],
            ],
        ]);
        $dateUpdate["id"] = $account["Member"]["id"];
        //level up
        if ($account["Member"]["Rank"]["level"] <= $chain) {
            $dateUpdate["rank_id"] = $chain + 1;
        }
        //add downline
        $dateUpdate["downline"] = $account["Member"]["downline"] + 1;
        //add direct downline, remove hold
        if ($chain == 1) {
            $dateUpdate["direct_downline"] = $account["Member"]["direct_downline"] + 1;
            $dateUpdate["direct_downline_hold"] = $account["Member"]["direct_downline_hold"] - 1;
        }
        //update title/reward
        $title = $this->Title->find("first", [
            "order" => "Title.total_downline desc",
            "recursive" => -1,
            "conditions" => [
                "Title.total_downline <=" => $dateUpdate["downline"],
            ],
        ]);
        if (!empty($title)) {
            $dateUpdate["title_id"] = $title["Title"]["id"];
        }
        $this->saveAll([
            "Member" => $dateUpdate,
        ]);
        //add bonus
        if ($chain == 7) {
            //bonus logic here
            ClassRegistry::init("Transaction")->bonusLevel8($account["Account"]["id"], $relatedAccountId, $shareFare);
        }
        if ($chain < 7 && !empty($account["Member"]["upline_id"])) {
            $this->updateUpline($account["Member"]["Upline"]["id"], $chain + 1, $relatedAccountId);
        }
    }

    function generateWdToken($memberId) {
        $token = random_str(18);
        $this->saveAll([
            "Member" => [
                "id" => $memberId,
                "wd_token" => $token,
                "wd_token_expire" => date("Y-m-d H:i:s", strtotime("+15 minutes")),
                "wd_token_valid" => 1,
            ]
        ]);
        return $token;
    }

}

?>
