<?php

App::uses('CakeSession', 'Model/Datasource');
App::uses('ClassRegistry', 'Utility');

class MemberEngine {

    public $cakeSession;
    public $modelAccount;
    public $accountData;

    function __construct() {
        $this->cakeSession = new CakeSession();
        $this->modelAccount = ClassRegistry::init("Account");
        $this->accountData = $this->modelAccount->find("first", [
            "conditions" => [
                "Account.id" => $this->getAccountId(),
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
                    "Title",
                ],
                "Balance",
            ],
        ]);
    }

    function isLoggedIn() {
        return !empty($this->cakeSession->read("credential.member"));
    }

    function getAccountId() {
        return $this->cakeSession->read("credential.member.Account.id");
    }

    function getBalanceId() {
        return $this->cakeSession->read("credential.member.Balance.id");
    }

    function getUsername() {
        return $this->accountData["User"]["username"];
    }

    function getFullName() {
        return $this->accountData["Biodata"]["full_name"];
    }

    function getProfilePictureLink() {
        return $this->accountData["User"]["profile_picture"];
    }

    function getLevel() {
        return $this->accountData["Member"]["Rank"]["level"];
    }

    function getTitle() {
        return $this->accountData["Member"]["Title"]["name"];
    }

    function getDownline() {
        return $this->accountData["Member"]["downline"];
    }

    function getMoneyTotal() {
        if (empty($this->accountData["Balance"]["id"])) {
            return 0;
        } else {
            return $this->accountData["Balance"]["total_income"];
        }
    }

    function getMoneyEarned() {
        if (empty($this->accountData["Balance"]["id"])) {
            return 0;
        } else {
            return $this->accountData["Balance"]["total_outcome"];
        }
    }

    function getMoneyDue() {
        if (empty($this->accountData["Balance"]["id"])) {
            return 0;
        } else {
            return $this->accountData["Balance"]["total_income"] - $this->accountData["Balance"]["total_outcome"];
        }
    }

    function getReferralCode() {
        return $this->accountData["Member"]["id_referral"];
    }

    function isPaymentMade() {
        return $this->accountData["Member"]["is_paid"];
    }

    function getUplineReferralCode() {
        if (!empty($this->accountData["Member"]["Upline"])) {
            return $this->accountData["Member"]["Upline"]["Member"]["id_referral"];
        } else {
            return "-";
        }
    }

    function getUplineReferraNamel() {
        if (!empty($this->accountData["Member"]["Upline"])) {
            return $this->accountData["Member"]["Upline"]["Biodata"]["full_name"];
        } else {
            return "-";
        }
    }

    function getDirectDownline() {
        $directDownlines = $this->modelAccount->Member->find("all", [
            "conditions" => [
                "Member.upline_id" => $this->getAccountId(),
                "Account.account_status_id" => [1, 2, 3],
            ],
            "contain" => [
                "Rank",
                "Title",
                "Account" => [
                    "User",
                    "Biodata",
                ],
            ],
        ]);
        return $directDownlines;
    }

    function translateRcToAccountId($referral_code) {
        $account = $this->modelAccount->find("first", [
            "conditions" => [
                "Member.id_referral" => $referral_code,
            ],
            "contain" => [
                "Member",
            ],
        ]);
        if (empty($account)) {
            return null;
        } else {
            return $account["Account"]["id"];
        }
    }

    function translateAccountIdToMemberId($accountId) {
        $account = $this->modelAccount->find("first", [
            "conditions" => [
                "Account.id" => $accountId,
            ],
            "contain" => [
                "Member",
            ],
        ]);
        if (empty($account)) {
            return null;
        } else {
            return $account["Member"]["id"];
        }
    }

    function translatePaypalTokenToAccountId($paypalToken) {
        $account = $this->modelAccount->find("first", [
            "conditions" => [
                "Member.paypal_token" => $paypalToken,
            ],
            "contain" => [
                "Member",
            ],
        ]);
        return $account["Account"]["id"];
    }

    function checkPaymentMade($acountId = null) {
        $account = $this->modelAccount->find("first", [
            "conditions" => [
                "Account.id" => $acountId,
            ],
            "contain" => [
                "Member",
            ],
        ]);
        if (!empty($account)) {
            return $account["Member"]["is_paid"];
        } else {
            return null;
        }
    }

    function updatePaypalToken($accountId = null, $token = null) {
        $this->modelAccount->Member->saveAll([
            "Member" => [
                "id" => $this->translateAccountIdToMemberId($accountId),
                "paypal_token" => $token,
            ],
        ]);
    }

    function updateMidtransPayment($accountId = null, $registrationFee = null, $kurs = 0, $orderRef = "", $snaptoken = null) {
        ClassRegistry::init("MidtransPayment")->saveAll([
            "MidtransPayment" => [
                "order_ref" => $orderRef,
                "registration_fee" => $registrationFee,
                "kurs" => $kurs,
                "amount" => ceil($registrationFee * $kurs),
                "snaptoken" => $snaptoken,
            ]
        ]);
        $this->modelAccount->Member->saveAll([
            "Member" => [
                "id" => $this->translateAccountIdToMemberId($accountId),
                "midtrans_payment_id" => ClassRegistry::init("MidtransPayment")->getLastInsertID(),
            ],
        ]);
    }

    function updatePaymentDoneInfoByPaypal($paypalToken = null) {
        $this->modelAccount->Member->approvedPayment($this->translatePaypalTokenToAccountId($paypalToken));
    }

    function getNextTitleTotalDownline($currentDownline = 0) {
        $title = ClassRegistry::init("Title")->find("first", [
            "conditions" => [
                "Title.total_downline >" => $currentDownline
            ],
            "recursive" => -1,
            "order" => "Title.total_downline asc",
        ]);
        if (!empty($title)) {
            return $title["Title"]["total_downline"];
        } else {
            return 9999999999;
        }
    }

    private function _generateChildrenTree($parentAccountId, $n) {
        $nParent = $n;
        $childMembers = $this->modelAccount->Member->find("all", [
            "conditions" => [
                "Member.upline_id" => $parentAccountId,
                "Account.account_status_id" => [1, 2, 3],
            ],
            "contain" => [
                "Account" => [
                    "User",
                    "Biodata",
                ],
            ],
            "recursive" => -1,
        ]);
        $result = [];
        if (empty($childMembers)) {
            return [];
        }
        foreach ($childMembers as $member) {
            $account = $member["Account"];
            $accountId = $account["id"];
            $n++;
            $result[$n] = [
                "id" => $member["Member"]["id_referral"],
                "name" => $account["Biodata"]["full_name"],
                "register" => issetAndNotEmpty($member["Member"]["joining_dt"], "-"),
                "invitations" => _DOWNLINE_SLOT - $member["Member"]["direct_downline"],
                "photo" => Router::url($account["User"]["profile_picture"], true),
                "parent" => $nParent,
                "total_child" => $member["Member"]["downline"],
                "children" => $this->_generateChildrenTree($accountId, $n),
            ];
        }
        return $result;
    }

    function buildGenealogyTree($accountId = null) {
        $account = $this->modelAccount->find("first", [
            "conditions" => [
                "Account.id" => $accountId
            ],
            "recursive" => -1,
            "contain" => [
                "Member",
                "Biodata",
                "User",
            ],
        ]);
        $tree = [];
        $n = 0;
        $tree = [
            $n => [
                "id" => $account["Member"]["id_referral"],
                "name" => $account["Biodata"]["full_name"],
                "register" => issetAndNotEmpty($account["Member"]["joining_dt"], "-"),
                "rawregister" => $account["Member"]["joining_dt"],
                "invitations" => _DOWNLINE_SLOT - $account["Member"]["direct_downline"],
                "photo" => Router::url($account["User"]["profile_picture"], true),
                "parent" => $n,
                "total_child" => $account["Member"]["downline"],
                "children" => $this->_generateChildrenTree($accountId, $n),
            ],
        ];
        return $tree;
    }

    private function _translateChildTreeToJqFormat($tree) {
        $result = [];
        foreach ($tree as $n => $item) {
            $memberObj = new stdClass();
            $memberObj->name = $item["name"] . " ({$item["id"]})";
            $memberObj->id = $n;
            $memberObj->children = $this->_translateChildTreeToJqFormat($item["children"]);
            $result[] = $memberObj;
        }
        return $result;
    }

    function translateToJqtreeFormat($tree) {
        $result = $this->_translateChildTreeToJqFormat($tree);
        return $result;
    }

    private function _translateChildTreeToGoJsFormat($tree, &$result) {
        foreach ($tree as $n => $item) {
            $memberObj = new stdClass();
            $memberObj->full_label = $item["name"] . " ({$item["id"]})";
            $memberObj->name = $item["name"];
            $memberObj->id = $item["id"];
            $memberObj->key = $n;
            $memberObj->parent = $item["parent"];
            $memberObj->total_child = $item["total_child"];
            $memberObj->register = !empty($item["rawregister"]) ? date("d/m/Y", strtotime($item["rawregister"])) : "-";
            $memberObj->invitations = $item["invitations"];
            $memberObj->source = $item["photo"];
            $result[] = $memberObj;
            $this->_translateChildTreeToGoJsFormat($item["children"], $result);
        }
    }

    function translateToGoJsFormat($tree) {
        $result = [];
        $this->_translateChildTreeToGoJsFormat($tree, $result);
        return $result;
    }

}

/**
 * @var \MemberEngine;
 */
$memberEngine = new MemberEngine();
