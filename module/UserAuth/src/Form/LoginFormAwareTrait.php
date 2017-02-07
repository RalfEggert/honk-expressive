<?php
namespace UserAuth\Form;

/**
 * Class LoginFormAwareTrait
 *
 * @package UserAuth\Form
 */
trait LoginFormAwareTrait
{
    /** @var  LoginForm */
    private $loginForm;

    /**
     * @param LoginForm $loginForm
     */
    public function setLoginForm(LoginForm $loginForm)
    {
        $this->loginForm = $loginForm;
    }
}