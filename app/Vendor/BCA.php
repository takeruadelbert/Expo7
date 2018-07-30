<?php

/*
 * BCA API
 * Documentation : https://developer.bca.co.id/documentation/
 * Developed by Takeru T.K.
 */

class BCAAPI {

    private $api_key;
    private $api_secret;
    private $client_id;
    private $client_secret;
    private $host;
    private $access_token;
    private $signature;
    private $corporateID;
    private $account_no;
    private $timestamp;

    function __construct() {
        $this->api_key = _BCA_API_KEY;
        $this->api_secret = _BCA_API_SECRET;
        $this->client_id = _BCA_CLIENT_ID;
        $this->client_secret = _BCA_CLIENT_SECRET;
        $this->host = 'https://sandbox.bca.co.id';
        $this->corporateID = _BCA_CORPORATE_ID;
        $this->account_no = _BCA_ACCOUNT_NO;
    }

    function get_access_token() {
        $token_url = "/api/oauth/token";
        $service_url = $this->host . $token_url;

        try {
            $curl = curl_init();
            $headers = array(
                'Authorization: Basic ' . base64_encode($this->client_id . ":" . $this->client_secret) . '',
                'Content-Type: application/x-www-form-urlencoded'
            );
            $data = array(
                'grant_type' => 'client_credentials'
            );
            curl_setopt_array($curl, array(
                CURLOPT_URL => $service_url,
                CURLOPT_SSL_VERIFYPEER => FALSE, // Ignore Verify SSL Certificate
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => http_build_query($data),
            ));
            $result = curl_exec($curl);

            //close curl session
            curl_close($curl);

            $decoded_result = json_decode($result);
            $this->access_token = $decoded_result->access_token;
        } catch (Exception $ex) {
            echo $e;
            debug($e);
            die;
        }
    }

    function generate_signature() {
        $signature_url = "/utilities/signature";
        $service_url = $this->host . $signature_url;
        try {
            $curl = curl_init();
            $curl_post_data = array();
            $timestamp = date(DateTime::ISO8601);
            $timestamp = str_replace('+', '.000+', $timestamp);
            $timestamp = substr($timestamp, 0, (strlen($timestamp) - 2));
            $timestamp .= ':00';
            $headers = array(
                'Timestamp: ' . $timestamp,
                "URI: {$this->host}/banking/v3/corporates/{$this->corporateID}/accounts/{$this->account_no}/statements",
                'AccessToken: ' . $this->access_token,
                'APISecret: ' . _BCA_API_SECRET,
                'HTTPMethod: GET',
            );

            curl_setopt_array($curl, array(
                CURLOPT_URL => $service_url,
                CURLOPT_SSL_VERIFYPEER => FALSE, // Ignore Verify SSL Certificate
                CURLOPT_POST => TRUE,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => $curl_post_data,
                CURLOPT_RETURNTRANSFER => TRUE
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $this->get_timestamp($response);
            $this->get_calculatedHMAC($response);
        } catch (Exception $ex) {
            echo $e;
            debug($e);
            die;
        }
    }

    function get_calculatedHMAC($response) {
        if (!empty($response)) {
            $exploded_response = explode(",", $response);
            $exploded_response2 = explode(":", $exploded_response[8]);
            $this->signature = $exploded_response2[1];
        }
    }

    function get_timestamp($response) {
        if (!empty($response)) {
            $exploded_response = explode(",", $response);
            $exploded_response2 = explode("Timestamp:", $exploded_response[3]);
            $this->timestamp = trim($exploded_response2[1]);
        }
    }

    function get_rate_forex($currency) {
        if (!empty($currency)) {
            $currency = str_replace(" ", "", $currency);
            $this->get_access_token();
            $this->generate_signature();
            $rate_forex_url = "/general/rate/forex";
            $service_url = $this->host . $rate_forex_url;
            $headers = array(
                'X-BCA-Key: ' . $this->api_key,
                'X-BCA-Timestamp: ' . $this->timestamp,
                'Authorization: Bearer ' . $this->access_token,
                'X-BCA-Signature: ' . $this->signature,
                'Content-Type: application/json',
                'Origin: ' . $_SERVER['SERVER_NAME']
            );
//            $params = array(
//                'CurrencyCode' => $currency,
//                'RateType' => 'erate'
//            );
            $ch = curl_init();
            $params = "?CurrencyCode={$currency}&RateType=erate";
            curl_setopt_array($ch, array(
                CURLOPT_URL => $service_url . $params,
                CURLOPT_SSL_VERIFYPEER => FALSE, // Ignore Verify SSL Certificate
//                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => $headers,
//                CURLOPT_POSTFIELDS => http_build_query($params),
            ));
            $output = curl_exec($ch); // This is API Response
            curl_close($ch);
            $returned_result = [];
            $result = json_decode($output);
            if (!empty($result->Currencies)) {
                foreach ($result->Currencies as $currency) {
                    $returned_result[$currency->CurrencyCode] = [
                        "buy" => $currency->RateDetail[0]->Buy,
                        "sell" => $currency->RateDetail[0]->Sell
                    ];
                }
            }
            return $returned_result;
        }
    }

    // for testing purpose
    function test_bca_api() {
        $bca = new BCAAPI();
        $test = $bca->get_rate_forex("USD,AUD,SGD,BND,TWD,JPY");
        debug($test);
        die;
    }

}
