<?php

namespace Hamzach96\PaymentApi;

class Payment
{
    private static $lightBoxConfig = null;
    private static $lightBoxDomain = null;

    public static function getPaymentDetails()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=PKR&from=USD&amount=1",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: " . config('payment.apiKey')
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

    public static function configureLightBox(
        string $shopPayment,
        float  $MomoPayCommissionAmount,
        string $MID,
        string $TID,
        int    $orderId,
        int    $amountTrxn,
        string $customerPhone
    )
    {
        $configuration = new \stdClass();
        $configuration->momoPaySubMerchantsDataStr = $shopPayment;
        $configuration->MomoPayCommissionAmount = $MomoPayCommissionAmount;
        $configuration->MID = $MID;
        $configuration->TID = $TID;
        $configuration->MerchantReference = $orderId;
        $configuration->AmountTrxn = $amountTrxn;

        $configuration->AdditionalCustomerData = new \stdClass();
        $configuration->AdditionalCustomerData->CustomerMobile = $customerPhone;

        self::$lightBoxConfig = $configuration;
    }

    public static function getConfiguration()
    {
        return self::$lightBoxConfig;
    }

    public static function lightBoxURL()
    {
        $configuration = self::$lightBoxConfig;

        if ($configuration) {
            $lightBoxConfigurationData = LightBox::getLightBoxURL($configuration, false, false);
            self::$lightBoxDomain = 'https://momouat.ug:6006/' . $lightBoxConfigurationData;
            return self::$lightBoxDomain;
        }
    }

    public static function showLightBox()
    {
        $configuration = self::$lightBoxConfig;

        if ($configuration) {
            $url = self::lightBoxURL();
            return view('vendor/lightbox-pages/payment', ["url" => $url]);
        } else {
            return 'Invalid URL';
        }
    }
}
