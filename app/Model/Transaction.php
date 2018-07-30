<?php

class Transaction extends AppModel {

    var $name = 'Transaction';
    var $belongsTo = array(
        "RelatedAccount" => [
            "className" => "Account",
            "foreignKey" => "related_account_id",
        ],
        "Balance",
        "TransactionType",
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

    function updateTransaction($typeCode, $amount, $accountId, $relatedAccountId) {
        $transactionType = $this->TransactionType->find("first", [
            "conditions" => [
                "TransactionType.code" => $typeCode,
            ]
        ]);
        $balanceId = $this->getBalanceId($accountId);
        $balanceData = $this->getBalanceData($balanceId);
        if ($transactionType["TransactionType"]["operation"] == "increase") {
            $this->create();
            $toSave = [];
            $toSave["balance_id"] = $balanceId;
            $toSave["transaction_type_id"] = $transactionType["TransactionType"]["id"];
            $toSave["amount"] = $amount;
            if (in_array($typeCode, ["RF", "IB"])) {
                $toSave["related_account_id"] = $relatedAccountId;
            }
            $this->save($toSave);
            //update balance
            $this->Balance->saveAll([
                "Balance" => [
                    "id" => $balanceId,
                    "total_income" => $balanceData["Balance"]["total_income"] + $amount,
                    "amount" => $balanceData["Balance"]["amount"] + $amount,
                ]
            ]);
        } else if ($transactionType["TransactionType"]["operation"] == "reduce") {
            $this->create();
            $toSave = [];
            $toSave["balance_id"] = $balanceId;
            $toSave["transaction_type_id"] = $transactionType["TransactionType"]["id"];
            $toSave["amount"] = $amount;
            if (in_array($typeCode, ["OB"])) {
                $toSave["related_account_id"] = $relatedAccountId;
            }
            $this->save($toSave);
            //update balance
            $this->Balance->saveAll([
                "Balance" => [
                    "id" => $balanceId,
                    "total_outcome" => $balanceData["Balance"]["total_outcome"] + $amount,
                    "amount" => $balanceData["Balance"]["amount"] - $amount,
                ]
            ]);
        }
    }

    function getBalanceId($accountId) {
        $balance = $this->Balance->find("first", [
            "conditions" => [
                "Balance.account_id" => $accountId,
            ],
            "recursive" => -1,
        ]);
        if (!empty($balance)) {
            return $balance["Balance"]["id"];
        } else {
            $this->Balance->create();
            $this->Balance->save([
                "Balance" => [
                    "account_id" => $accountId,
                ]
            ]);
            return $this->Balance->getLastInsertID();
        }
    }

    function bonusLevel8($toAccountId, $relatedAccountId, $amount) {
        $this->updateTransaction("OB", $amount, _WESTWOOD_ACCOUNT_ID, $relatedAccountId);
        $this->updateTransaction("IB", $amount, $toAccountId, $relatedAccountId);
    }

    function getBalanceData($balanceId) {
        $balance = $this->Balance->find("first", [
            "conditions" => [
                "Balance.id" => $balanceId,
            ],
            "recursive" => -1
        ]);
        return $balance;
    }

}

?>
