<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Used Operators
    |--------------------------------------------------------------------------
    |
    | Operators is used to indicate operator you should use in your application.
    | This value is used to enable or not the operator proposed in this package.
    |
    */

    'operators'   =>  [
        'MTN'       =>  env('ENABLE_MTN_MOBILE_MONEY', true),
        'ORANGE'    =>  env('ENABLE_ORANGE_MONEY',false)
    ],


    /*
    |--------------------------------------------------------------------------
    | Operators Credentials
    |--------------------------------------------------------------------------
    |
    | Credentials is the access provided by the different operator to
    | authenticate you on their API platform.
    |
    */

    'credentials'   =>  [
        'MTN'       =>  [
            'code'      =>  env('MTN_BILLMAP_CODE', 'TESTSP'), //The Code that identifies your Service Provider account on BillMap
            'password'  =>  env('MTN_BILLMAP_PASSWORD', 'password') //The Password used to authenticate a payment request.
        ],

        'ORANGE'    =>  [
            'api_key'       =>  env('ORANGE_API_KEY','orange_api_key'),
            'api_secret'    =>  env('ORANGE_API_SECRET','orange_api_secret')
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Operator Environment
    |--------------------------------------------------------------------------
    |
    | Environment is the indicator of each operator's environment you should use
    | in your application.
    |
    */

    'env'     =>  [
        'MTN'       =>  env('MTN_MOBILE_MONEY_ENV', 'prod'),
        'ORANGE'    =>  env('ORANGE_MONEY_ENV', 'prod')
    ],


    /*
    |--------------------------------------------------------------------------
    | Operator Url
    |--------------------------------------------------------------------------
    |
    | Url indicate each operator's link where their API are located. It can change
    | according the defined environment.
    |
    */

    'url'  =>  [
        'MTN'       =>  [
            'test'  =>  env('MTN_URL_TEST', 'https://billmap.mtn.ci:8443'),
            'prod'  =>  env('MTN_URL_PROD', 'https://billmap.mtn.ci')
        ],

        'ORANGE'    =>  [
            'test'  =>  env('ORANGE_URL_TEST', ''),
            'prod'  =>  env('ORANGE_URL_PROD', '')
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Operator Endpoint
    |--------------------------------------------------------------------------
    |
    | Endpoint indicate each operator's resource to call their API in your
    | application.
    |
    */

    'endpoint'  =>  [
        'MTN'   =>  env('MTN_ENDPOINT', '/WebServices/BillPayment.asmx/ProcessOnlinePayment_V1.4'),
        'ORANGE'    =>  env('ORANGE_ENDPOINT', ''),
    ]

];