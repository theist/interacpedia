<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun'  => [
        'domain' => 'mg.interacpedia.com',
        'secret' => 'key-01cf108307aad1969ab73ac25fca0b87',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses'      => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe'   => [
        'model'  => 'App\User',
        'key'    => '',
        'secret' => '',
    ],

    'facebook' => [
        'client_id'     => '1579172622347450',
        'client_secret' => '6b924a281cf18bf06e3808e041cb4b33',
        'redirect'      => 'http://interacpedia.dev:8888/auth/facebook2'
    ],
    'linkedin' => [
        'client_id' => env('LINKEDIN_KEY'),
        'client_secret' => env('LINKEDIN_SECRET'),
        'redirect' => env('LINKEDIN_REDIRECT_URI'),
    ],
    'twitter' => [
        'client_id'     => 'OCm0K2uiEigQ1Hiw728KHZIC5',
        'client_secret' => 'SrKwExihmKW2k5f1V2MuW8iuAHi3H5nROta6dbHJb1aqKWmYSb',
        'redirect'      => 'http://interacpedia.dev:8888/auth/twitter2'
    ],
    'google' => [
        'client_id' => env('GOOGLE_KEY'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],
];
