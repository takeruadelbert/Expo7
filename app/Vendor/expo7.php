<?php

class ExpoSeven {
    
}

function transactionId($id = null) {
    if (empty($id)) {
        return "-";
    }
    return str_pad($id, 8, "0", STR_PAD_LEFT);
}

function labelTransactionAmount($transactionTypeCode, $amount) {
    $transactionTypeCodeList = [
        "DP" => 1,
        "WD" => -1,
        "OB" => -1,
        "IB" => 1,
        "RF" => 1,
    ];
    $amount = $amount * $transactionTypeCodeList[$transactionTypeCode];
    $labelAmount=ac_dollar($amount);
    if ($amount < 0) {
        return "<span style='color:red'>$labelAmount</span>";
    } else {
        return "<span style='color:green'>$labelAmount</span>";
    }
}
