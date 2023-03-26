<?php

namespace Hamzach96\PaymentApi;

class Payment {
    public static function getPaymentDetails(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=PKR&from=USD&amount=1",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: ". config('payment.apiKey')
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        $resp = json_decode($response);

//        return "Current rate of dollar in PKR is: ".$resp->result;
        return $response;
    }
}
