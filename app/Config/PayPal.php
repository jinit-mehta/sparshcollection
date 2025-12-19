<?php

namespace Config;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PayPal
{
    public static function apiContext()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AQrt9nPqqQfhQwFBWzsfIFp9hQLQoIdDwOMOOL29qKKDgZ29wjNrk4NS0KCPS6kHVctmZrosILnRAJhy',
                'EKHsqI_M6__m0_vfhMnRm_im1WepLMOnn5QjB9S4BnksNx_6A3tuo4_h4KluVq-hVxeFhnCb73sVhiI7'
            )
        );

        $apiContext->setConfig([
            'mode' => 'sandbox',
            // or 'live' for production
            'log.LogEnabled' => true,
            'log.FileName' => WRITEPATH . 'logs' . DIRECTORY_SEPARATOR . 'paypal.log',
            'log.LogLevel' => 'INFO', // ERROR, DEBUG, INFO
        ]);

        return $apiContext;
    }
}