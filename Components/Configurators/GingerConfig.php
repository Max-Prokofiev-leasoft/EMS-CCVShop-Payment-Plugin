<?php

namespace GingerPlugins\Components\Configurators;

class GingerConfig extends AppConfig
{
    const PLUGIN_VERSION = '1.0.0';

    const GINGER_TO_CCVSHOP_ORDER_STATUS = [
        'cancelled' => 'CANCELLED',
        'expired' => 'EXPIRED',
        'error' => 'FAILED',
        'completed' => 'SUCCESS',
        'processing' => 'OPEN',
        'pending' => 'OPEN',
        'new' => 'OPEN'
    ];

    const CCVSHOP_TO_BANK_PAYMENTS =
        [
            'applepay' => 'apple-pay',
            'amex' => 'amex',
            'bancontact' => 'bancontact',
            'banktransfer' => 'bank-transfer',
            'creditcard' => 'credit-card',
            'googlepay' => 'google-pay',
            'ideal' => 'ideal',
            'klarnapaylater' => 'klarna-pay-later',
            'klarnadirectdebit' => 'klarna-direct-debit',
            'klarnapaynow' => 'klarna-pay-now',
            'payconiq' => 'payconiq',
            'paypal' => 'paypal',
            'sofort' => 'sofort',

//            'paynow' => null,
//            'tikkiepaymentrequest' => 'tikkie-payment-request',
//            'wechat' => 'wechat',
//            'afterpay' => 'afterpay',

        ];

    public static function getBankPaymentLabels()
    {
        return BankConfig::GINGER_PAYMENTS_LABELS;
    }

    const PRESALE_PAYMENTS = [
        'ideal',
//        'afterpay'
    ];

    const GINGER_PAYMENTS_LABELS = [
        'applepay' => 'Apple Pay',
        'amex' => 'American Express',
        'bancontact' => 'Bancontact',
        'banktransfer' => 'Bank Transfer',
        'creditcard' => 'Credit Card',
        'googlepay' => 'Google Pay',
        'ideal' => 'iDEAL',
        'klarnapaylater' => 'Klarna Pay Later',
        'klarnadirectdebit' => 'Klarna Direct Debit',
        'klarnapaynow' => 'Klarna Pay Now',
        'payconiq' => 'Payconiq',
        'paypal' => 'PayPal',
        'sofort' => 'Sofort',

//        'paynow' => 'Pay Now',
//        'afterpay' => 'Afterpay',
//        'tikkiepaymentrequest' => 'Tikkie Payment Request',
//        'wechat' => 'WeChat'
    ];
    const GINGER_IP_VALIDATION_PAYMENTS = [
//        'afterpay',
        'klarnapaylater'
    ];
    const GINGER_REQUIRED_IBAN_INFO_PAYMENTS = [
        'bank-transfer'
    ];
    const GINGER_REQUIRED_ORDER_LINES_PAYMENTS = [
//        'afterpay',
        'klarnadirectdebit',
        'klarnapaylater'
    ];

    const GINGER_CAPTURE_PAYMENTS = [
        'klarnapaylater',
//        'afterpay'
    ];
}