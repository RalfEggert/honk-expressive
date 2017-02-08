<?php
use UserAuth\Authentication\AuthenticationMiddleware;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper\ServerUrlMiddleware;
use Zend\Expressive\Helper\UrlHelperMiddleware;

return [
    'middleware_pipeline' => [
        'always' => [
            'middleware' => [
                ServerUrlMiddleware::class,
                AuthenticationMiddleware::class,
            ],
            'priority' => 10000,
        ],

        'routing' => [
            'middleware' => [
                ApplicationFactory::ROUTING_MIDDLEWARE,
                UrlHelperMiddleware::class,
                ApplicationFactory::DISPATCH_MIDDLEWARE,
            ],
            'priority' => 1,
        ],

        'error' => [
            'middleware' => [
            ],
            'error'    => true,
            'priority' => -10000,
        ],
    ],
];
