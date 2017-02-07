<?php

use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Container\TemplatedErrorHandlerFactory;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Helper\ServerUrlMiddleware;
use Zend\Expressive\Helper\ServerUrlMiddlewareFactory;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Helper\UrlHelperFactory;
use Zend\Expressive\Helper\UrlHelperMiddleware;
use Zend\Expressive\Helper\UrlHelperMiddlewareFactory;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Router\ZendRouter;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\ZendView\HelperPluginManagerFactory;
use Zend\Expressive\ZendView\ZendViewRendererFactory;
use Zend\View\HelperPluginManager;

return [
    'dependencies' => [
        'invokables' => [
            ServerUrlHelper::class => ServerUrlHelper::class,
            RouterInterface::class => ZendRouter::class,
        ],
        'factories'  => [
            Application::class => ApplicationFactory::class,
            UrlHelper::class => UrlHelperFactory::class,
            'Zend\Expressive\FinalHandler' => TemplatedErrorHandlerFactory::class,

            TemplateRendererInterface::class => ZendViewRendererFactory::class,

            HelperPluginManager::class => HelperPluginManagerFactory::class,
            ServerUrlMiddleware::class => ServerUrlMiddlewareFactory::class,
            UrlHelperMiddleware::class => UrlHelperMiddlewareFactory::class,
        ],
    ],

    'debug' => false,

    'config_cache_enabled' => false,

    'zend-expressive' => [
        'error_handler' => [
            'template_404'   => 'error::404',
            'template_error' => 'error::error',
        ],
    ],
];
