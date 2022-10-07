<?php

return [
    'smartApi' => [
        'apps' => [
            'sayDate' => "\App\Simotel\SmartApi\SayDateSmartApiApp",
            '*' => "\App\Simotel\SmartApi\SmartApiApp",
        ],
    ],
    'ivrApi' => [
        'apps' => [
            '*' => "\App\Simotel\IvrApiApp",
        ],
    ],
    'trunkApi' => [
        'apps' => [
            '*' => "\App\Simotel\TrunkApiApp",
        ],
    ],
    'extensionApi' => [
        'apps' => [
            '*' => "\App\Simotel\ExtensionApiApp",
        ],
    ],
    'simotelApi' => [
        'api_auth' => 'both',
        'api_user' => 'test',
        'api_pass' => 'Test123456',
        'api_key' => 'pvGmQQ19ZOUF21huSUmST0fU3FVAe0z6EWK9tbuOFnTxZHHLoY',
        'server_address' => 'http://37.156.144.147/api/v4/',
    ],
];
