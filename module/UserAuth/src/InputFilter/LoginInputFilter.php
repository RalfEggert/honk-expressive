<?php

namespace UserAuth\InputFilter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

/**
 * Class LoginFilter
 *
 * @package UserAuth\InputFilter
 */
class LoginInputFilter extends InputFilter
{
    /**
     *
     */
    public function init()
    {
        $this->add(
            [
                'name'       => 'username',
                'required'   => true,
                'filters'    => [
                    ['name' => StringTrim::class],
                    ['name' => StripTags::class],
                ],
                'validators' => [
                    [
                        'name'    => NotEmpty::class,
                        'options' => [
                            'messages' => [
                                NotEmpty::IS_EMPTY => 'Bitte geben Sie Ihren Benutzernamen ein!'
                            ],
                        ],
                    ],
                ],
            ]
        );

        $this->add(
            [
                'name'       => 'password',
                'required'   => true,
                'filters'    => [
                    ['name' => StringTrim::class],
                    ['name' => StripTags::class],
                ],
                'validators' => [
                    [
                        'name'    => NotEmpty::class,
                        'options' => [
                            'messages' => [
                                NotEmpty::IS_EMPTY => 'Bitte geben Sie Ihr Passwort ein!'
                            ],
                        ],
                    ],
                ],
            ]
        );
    }
}
