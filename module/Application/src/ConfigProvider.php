<?php

namespace Application;

use Application\Action\HomePageAction;
use Application\Action\HomePageFactory;

/**
 * Class ConfigProvider
 *
 * @package Application
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'view_helpers' => $this->getViewHelpers(),
            'routes'       => $this->getRoutes(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies() : array
    {
        return [
            'factories'  => [
                HomePageAction::class => HomePageFactory::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTemplates() : array
    {
        return [
            'layout' => 'layout/default',
            'map'    => [
                'layout/default' => __DIR__
                    . '/../templates/layout/default.phtml',
                'error/error'    => __DIR__ . '/../templates/error/error.phtml',
                'error/404'      => __DIR__ . '/../templates/error/404.phtml',
            ],
            'paths'  => [
                'application' => [__DIR__ . '/../templates/application'],
                'error'       => [__DIR__ . '/../templates/error'],
                'layout'      => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getViewHelpers() : array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getRoutes() : array
    {
        return [
            [
                'name'            => 'home',
                'path'            => '/',
                'middleware'      => HomePageAction::class,
                'allowed_methods' => ['GET'],
            ],
        ];
    }
}