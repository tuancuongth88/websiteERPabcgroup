<?php

return array(

    'appNameIOS'     => array(
        'environment' =>'development',
        // 'certificate' =>'/path/to/certificate.pem',
        'certificate'=>app_path().'/myCert.pem',
        'passPhrase'  =>'password',
        'service'     =>'apns'
    ),
    'appNameAndroid' => array(
        'environment' =>'production',
        'apiKey'      =>'9107bc8992c05545abd1',
        'service'     =>'gcm'
    )

);