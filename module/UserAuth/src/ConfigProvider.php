<?php

namespace UserAuth;

use UserAuth\Action\LoginAction;
use UserAuth\Action\LoginActionFactory;
use UserAuth\Authentication\AuthenticationMiddleware;
use UserAuth\Form\LoginForm;
use UserAuth\Form\LoginFormFactory;
use UserAuth\InputFilter\LoginInputFilter;
use Zend\ServiceManager\Factory\InvokableFactory;


/**
 * Class ConfigProvider
 *
 * @package UserAuth
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke() : array
    {
        return [
            'dependencies'  => $this->getDependencies(),
            'routes'        => $this->getRoutes(),
            'templates'     => $this->getTemplates(),
            'view_helpers'  => $this->getViewHelpers(),
            'input_filters' => $this->getInputFilters(),
            'form_elements' => $this->getFormElements(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies() : array
    {
        return [
            'factories' => [
                LoginAction::class              => LoginActionFactory::class,
                AuthenticationMiddleware::class => InvokableFactory::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'user-auth' => [__DIR__ . '/../template/user-auth'],
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
                'name'            => 'user-auth-login',
                'path'            => '/login',
                'middleware'      => LoginAction::class,
                'allowed_methods' => ['GET'],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getInputFilters() : array
    {
        return [
            'factories' => [
                LoginInputFilter::class => InvokableFactory::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFormElements() : array
    {
        return [
            'factories' => [
                LoginForm::class => LoginFormFactory::class,
            ],
        ];
    }
}