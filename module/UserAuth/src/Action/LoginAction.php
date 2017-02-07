<?php
namespace UserAuth\Action;

use Core\Template\TemplateRendererAwareTrait;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use UserAuth\Form\LoginFormAwareTrait;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Stratigility\MiddlewareInterface;

/**
 * Class LoginAction
 *
 * @package UserAuth\Action
 */
class LoginAction implements MiddlewareInterface
{
    use TemplateRendererAwareTrait;
    use LoginFormAwareTrait;

    /**
     * @param Request            $request
     * @param Response           $response
     * @param callable|null|null $out
     *
     * @return mixed
     */
    public function __invoke(
        Request $request, Response $response, callable $out = null
    ) {
        $data = [
            'loginForm' => $this->loginForm,
        ];
        
        return new HtmlResponse(
            $this->renderer->render('user-auth::login', $data)
        );
    }
}