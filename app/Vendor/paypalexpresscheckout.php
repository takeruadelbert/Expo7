<?php

App::uses('Paypal', 'Paypal.Lib');
App::import('Vendor', 'memberEngine');

class PaypalExpo7 {

    var $Paypal;
    var $order;

    function __construct() {
        global $registrationFare;
        $this->Paypal = new Paypal(array(
            'sandboxMode' => true,
            'nvpUsername' => 'suryawono-merchant_api2.yahoo.co.id',
            'nvpPassword' => 'BHBHH7WXTKK79HMC',
            'nvpSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AEdN5mc.O92K7OfleYXWgaMcot97'
        ));
        $this->order = array(
            'description' => 'Your registration with Expo 7',
            'currency' => 'USD',
            'return' => "http://localhost/expo7/checkoutfinish?method=paypalexpress",
            'cancel' => 'http://localhost/expo7/member/dashboard',
            'custom' => 'expo7',
            'shipping' => '0',
            'items' => array(
                0 => array(
                    'name' => 'Registration Fee',
                    'description' => 'Registration Fee',
                    'tax' => 0.00,
                    'subtotal' => $registrationFare,
                    'qty' => 1,
                ),
            )
        );
    }

    function getCheckoutUrl() {
        $memberEngine = new MemberEngine();
        try {
            $paymentUrl = $this->Paypal->setExpressCheckout($this->order);
            return $paymentUrl;
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "<br/>Attempting another connection";
            return false;
        }
    }

    function getExpressCheckoutDetails($token) {
        return $this->Paypal->getExpressCheckoutDetails($token);
    }

    function doExpressCheckoutPayment($token, $payerId) {
        try {
            return $this->Paypal->doExpressCheckoutPayment($this->order, $token, $payerId);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "<br/>Attempting another connection";
            return false;
        }
    }

}
