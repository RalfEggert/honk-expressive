<?php
namespace UserAuth\Action;

use Interop\Container\ContainerInterface;
use UserAuth\Form\LoginForm;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LoginActionFactory
 *
 * @package UserAuth\Action
 */
class LoginActionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null|null    $options
     *
     * @return mixed
     */
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        $formElementManager = $container->get('FormElementManager');

        $renderer  = $container->get(TemplateRendererInterface::class);
        $loginForm = $formElementManager->get(LoginForm::class);

        $action = new LoginAction();
        $action->setRenderer($renderer);
        $action->setLoginForm($loginForm);

        return $action;
    }

}