<?php

namespace Hamzach96\PaymentApi;

class LightBox
{
    public static function getLightBoxURL($configuration, $hideCloseButton, $isEnableReturnUrl): string
    {
        $paymentMethodFromLightBox = null;
        $mId = 0;
        $tId = 0;
        $orderId = "";
        $amount = 0;
        $feeAmount = 0;
        $MerchantReference = "";
        $lang = "";

        $returnUrl = "";
        $configPath = $configuration;
        $secureHash = "";
        $trxDateTime = "";
        $ExpirationDateTime = "";

        $customerEmail = '';
        $customerMobile = '';
        $messageCustomer = '';
        $merchantCustomerId = '';
        $currencyTwo = '';
        $currencyTwoValue = '';
        $additionalFees = 0;

        $showCustomerEmail = null;
        $showCustomerMobile = null;
        $showMessageCustomer = null;
        $showMerchantCustomerId = null;
        $showCurrencyTwo = null;
        $showAdditionalFees = null;
        $consumerEnterAmount = null;

        $tokenCustomerId = null;
        $tokenCustomerSession = null;

        $topBarColor = null;
        $buttonPayColor = null;
        $bodyBackgroundColor = null;
        $textcolor = null;
        $linkTextColor = null;
        $scrollbarColor = null;
        $scrollbarBackgroundColor = null;
        $paymentInfoBackgroundColor = null;
        $paymentInfoLineColor = null;
        $headerOrFooterLineColor = null;
        $closeButtonColor = null;
        $closeButtonBackgroundColor = null;
        $logoOne = '';
        $invoiceNo = '';
        $invoiceServicesStr = '';
        $feeAmount = null;

        $SKU = '';
        $ProductType = '';
        $ProductName = '';
        $CustomRegister = '';
        $MomoPayCommissionAmount = '';
        $momoPaySubMerchantsDataStr = '';

        $paymentMethodFromLightBox = $configuration->paymentMethodFromLightBox ?? null;

        $orderId = $configuration->OrderId ?? null;

        $lang = $configuration->lang ?? null;

        $mId = $configuration->MID ?? null;

        $tId = $configuration->TID ?? null;

        $amount = $configuration->AmountTrxn / 100 ?? null;

        $MerchantReference = $configuration->MerchantReference ?? null;

        $returnUrl = $configuration->ReturnUrl ?? null;

        $secureHash = $configuration->SecureHash ?? null;

        $trxDateTime = $configuration->TrxDateTime ?? null;

        $ExpirationDateTime = $configuration->ExpirationDateTime ?? null;

        $invoiceNo = $configuration->InvoiceNo ?? null;

        $invoiceServicesStr = $configuration->InvoiceServicesStr ?? null;

        if (isset($configuration->FeeAmount)) {
            $feeAmount = $configuration->FeeAmount / 100;
        }

        if(isset($configuration->AdditionalCustomerData)){
            if(isset($configuration->AdditionalCustomerData->CustomerEmail)){
                $customerEmail = $configuration->AdditionalCustomerData->CustomerEmail;
            }
            if(isset($configuration->AdditionalCustomerData->CustomerMobile)){
                $customerMobile = $configuration->AdditionalCustomerData->CustomerMobile;
            }
            if(isset($configuration->AdditionalCustomerData->MessageCustomer)){
                $messageCustomer = $configuration->AdditionalCustomerData->MessageCustomer;
            }
            if(isset($configuration->AdditionalCustomerData->MerchantCustomerId)){
                $merchantCustomerId = $configuration->AdditionalCustomerData->MerchantCustomerId;
            }
            if(isset($configuration->AdditionalCustomerData->CurrencyTwo)){
                $currencyTwo = $configuration->AdditionalCustomerData->CurrencyTwo;
            }
            if(isset($configuration->AdditionalCustomerData->CurrencyTwoValue)){
                $currencyTwoValue = $configuration->AdditionalCustomerData->CurrencyTwoValue;
            }
            if(isset($configuration->AdditionalCustomerData->AdditionalFees)){
                $additionalFees = $configuration->AdditionalCustomerData->AdditionalFees;
            }
        }

        if (isset($configuration->momoPaySubMerchantsDataStr)) {
            $momoPaySubMerchantsDataStr = $configuration->momoPaySubMerchantsDataStr;
        }

        if (isset($configuration->MomoPayCommissionAmount)) {
            $MomoPayCommissionAmount = $configuration->MomoPayCommissionAmount;
        }


        $lightboxHostedQueryString = '/?';
        $lightboxHostedQueryString .= 'paymentMethodFromLightBox=' . $paymentMethodFromLightBox . '&';
        $lightboxHostedQueryString .= 'OrderID=' . $orderId . '&';
        $lightboxHostedQueryString .= 'MID=' . $mId . '&';
        $lightboxHostedQueryString .= 'customerlang=' . $lang . '&';
        $lightboxHostedQueryString .= 'MerchantReference=' . $MerchantReference . '&';
        $lightboxHostedQueryString .= 'amount=' . $amount . '&';
        $lightboxHostedQueryString .= 'TID=' . $tId . '&';
        $lightboxHostedQueryString .= 'secureHashAnonymous=' . $secureHash . '&';
        $lightboxHostedQueryString .= 'trxDateTime=' . $trxDateTime . '&';
        $lightboxHostedQueryString .= 'ExpirationDateTime=' . $ExpirationDateTime . '&';

        $lightboxHostedQueryString .= 'CustomerEmail=' . $customerEmail . '&';
        $lightboxHostedQueryString .= 'CustomerMobile=' . $customerMobile . '&';
        $lightboxHostedQueryString .= 'MessageCustomer=' . $messageCustomer . '&';
        $lightboxHostedQueryString .= 'MerchantCustomerId=' . $merchantCustomerId . '&';
        $lightboxHostedQueryString .= 'CurrencyTwo=' . $currencyTwo . '&';
        $lightboxHostedQueryString .= 'CurrencyTwoValue=' . $currencyTwoValue . '&';
        $lightboxHostedQueryString .= 'AdditionalFees=' . $additionalFees . '&';

        $lightboxHostedQueryString .= 'ShowCustomerEmail=' . $showCustomerEmail . '&';
        $lightboxHostedQueryString .= 'ShowCustomerMobile=' . $showCustomerMobile . '&';
        $lightboxHostedQueryString .= 'ShowMessageCustomer=' . $showMessageCustomer . '&';
        $lightboxHostedQueryString .= 'ShowMerchantCustomerId=' . $showMerchantCustomerId . '&';
        $lightboxHostedQueryString .= 'ShowCurrencyTwo=' . $showCurrencyTwo . '&';
        $lightboxHostedQueryString .= 'ShowAdditionalFees=' . $showAdditionalFees . '&';


        $lightboxHostedQueryString .= 'TokenCustomerId=' . $tokenCustomerId . '&';
        $lightboxHostedQueryString .= 'TokenCustomerSession=' . $tokenCustomerSession . '&';


        $lightboxHostedQueryString .= 'TopBarColor=' . $topBarColor . '&';
        $lightboxHostedQueryString .= 'ButtonPayColor=' . $buttonPayColor . '&';
        $lightboxHostedQueryString .= 'BodyBackgroundColor=' . $bodyBackgroundColor . '&';
        $lightboxHostedQueryString .= 'Textcolor=' . $textcolor . '&';
        $lightboxHostedQueryString .= 'LinkTextColor=' . $linkTextColor . '&';
        $lightboxHostedQueryString .= 'ScrollbarColor=' . $scrollbarColor . '&';
        $lightboxHostedQueryString .= 'ScrollbarBackgroundColor=' . $scrollbarBackgroundColor . '&';
        $lightboxHostedQueryString .= 'PaymentInfoBackgroundColor=' . $paymentInfoBackgroundColor . '&';
        $lightboxHostedQueryString .= 'PaymentInfoLineColor=' . $paymentInfoLineColor . '&';
        $lightboxHostedQueryString .= 'HeaderOrFooterLineColor=' . $headerOrFooterLineColor . '&';
        $lightboxHostedQueryString .= 'CloseButtonColor=' . $closeButtonColor . '&';
        $lightboxHostedQueryString .= 'CloseButtonBackgroundColor=' . $closeButtonBackgroundColor . '&';
        $lightboxHostedQueryString .= 'LogoOne=' . $logoOne . '&';
        $lightboxHostedQueryString .= 'ConsumerEnterAmount=' . $consumerEnterAmount . '&';
        $lightboxHostedQueryString .= 'invoiceNo=' . $invoiceNo . '&';
        $lightboxHostedQueryString .= 'invoiceServicesStr=' . $invoiceServicesStr . '&';
        $lightboxHostedQueryString .= 'feeAmount=' . $feeAmount . '&';
        $lightboxHostedQueryString .= 'momoPaySubMerchantsDataStr=' . $momoPaySubMerchantsDataStr . '&';

        $lightboxHostedQueryString .= 'SKU=' . $SKU . '&';
        $lightboxHostedQueryString .= 'ProductName=' . $ProductName . '&';
        $lightboxHostedQueryString .= 'ProductType=' . $ProductType . '&';
        $lightboxHostedQueryString .= 'CustomRegister=' . $CustomRegister . '&';
        $lightboxHostedQueryString .= 'MomoPayCommissionAmount=' . $MomoPayCommissionAmount . '&';


        if ($hideCloseButton) {
            $lightboxHostedQueryString .= 'hideCloseButton=' . true . '&';
            if ($isEnableReturnUrl) {
                $lightboxHostedQueryString .= 'returnUrl=' . returnUrl;
            }
        }
        return '/Home/LightboxHostedCheckout' . $lightboxHostedQueryString;

    }
}
