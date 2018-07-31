<?php

return [
    '__name' => 'lib-notif-pusher',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-notif-pusher.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-notif-pusher' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            'lib-psr-3' => null
        ],
        'optional' => []
    ],
    '__inject' => [
        [
            'name' => 'libNotifPusher',
            'children' => [
                [
                    'name' => 'id',
                    'question' => 'Pusher app id',
                    'rule' => '!^.+$!'
                ],
                [
                    'name' => 'key',
                    'question' => 'Pusher app key',
                    'rule' => '!^.+$!'
                ],
                [
                    'name' => 'secret',
                    'question' => 'Pusher app secret',
                    'rule' => '!^.+$!'
                ],
                [
                    'name' => 'cluster',
                    'question' => 'Pusher app cluster',
                    'rule' => '!^.+$!'
                ],
            ]
        ]
    ],
    'autoload' => [
        'classes' => [
            'LibNotifPusher\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-notif-pusher/library'
            ],
            'Pusher' => [
                'type' => 'psr4',
                'base' => 'modules/lib-notif-pusher/third-party/Pusher'
            ]
        ],
        'files' => []
    ]
];