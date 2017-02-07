<?php
namespace UserAuth\Form;

use Zend\Form\Element\Password;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * Class LoginForm
 *
 * @package UserAuth\Form
 */
class LoginForm extends Form
{
    /**
     *
     */
    public function init()
    {
        $this->setName('login');
        $this->setAttribute('method', 'post');

        $this->add(
            [
                'name'       => 'username',
                'attributes' => [
                    'type'        => Text::class,
                    'id'          => 'username',
                    'placeholder' => ''
                ],
                'options'    => [
                    'label' => 'Benutzername',
                ]
            ]
        );

        $this->add(
            [
                'name'       => 'password',
                'attributes' => [
                    'type'        => Password::class,
                    'id'          => 'password',
                    'placeholder' => ''
                ],
                'options'    => [
                    'label' => 'Passwort',
                ]
            ]
        );

        $this->add(
            [
                'name'       => 'submit',
                'attributes' => [
                    'type'  => Submit::class,
                    'class' => 'submit',
                    'value' => 'einloggen'
                ]
            ]
        );
    }
}