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
                'type'       => Text::class,
                'attributes' => [
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
                'type'       => Password::class,
                'attributes' => [
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
                'name'       => 'submit-login',
                'type'       => Submit::class,
                'attributes' => [
                    'class' => 'submit',
                    'value' => 'einloggen'
                ],
                'options'    => [
                ],
            ]
        );
    }
}