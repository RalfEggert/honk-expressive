<?php
namespace UserAuth\Form;

use Interop\Container\ContainerInterface;
use UserAuth\InputFilter\LoginInputFilter;
use Zend\InputFilter\InputFilterPluginManager;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LoginFormFactory
 *
 * @package UserAuth\Form
 */
class LoginFormFactory implements FactoryInterface
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
        /** @var InputFilterPluginManager $inputFilterManager */
        $inputFilterManager = $container->get(InputFilterPluginManager::class);
        
        $inputFilter = $inputFilterManager->get(LoginInputFilter::class);
        
        $form = new LoginForm();
        $form->setInputFilter($inputFilter);

        return $form;
    }

}