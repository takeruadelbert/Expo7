<?php

function midtransCheckout($order_id, $gross_amount) {
    global $registrationFare;

    App::import('Vendor', 'Veritrans');

    Veritrans_Config::$serverKey = _MIDTRANS_SERVER_KEY;

    Veritrans_Config::$isSanitized = true;
    Veritrans_Config::$is3ds = true;

    $transaction = array(
        'transaction_details' => array(
            'order_id' => $order_id,
            'gross_amount' => $gross_amount // no decimal allowed
        ),
        "item_details" => [
            [
                'id' => 'r1',
                'price' => $gross_amount,
                'quantity' => 1,
                'name' => "Biaya Pendaftaran $$registrationFare"
            ],
        ]
    );

    $snapToken = Veritrans_Snap::getSnapToken($transaction);
    return $snapToken;
}

function midtransCheckOrder($orderRef) {
    App::import('Vendor', 'Veritrans');
    $ch = curl_init();
    $midtransUrl = "";
    $cainfo = APP . DS . "Vendor" . DS . "data" . DS . "cacert.pem";
    $auth = "Basic " . base64_encode(_MIDTRANS_SERVER_KEY);
    if (_DEVELOPMENT_STATUS) {
        $midtransUrl = Veritrans_Config::SANDBOX_BASE_URL;
    } else {
        $midtransUrl = Veritrans_Config::PRODUCTION_BASE_URL;
    }
    curl_setopt($ch, CURLOPT_URL, $midtransUrl . "/$orderRef/status");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_CAINFO, $cainfo);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: ' . $auth,
    ));
    $output = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($output);
    return $result;
}
