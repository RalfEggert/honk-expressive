<?php

namespace Application\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

class HomePageAction
{
    private $router;

    private $template;

    public function __construct(
        Router\RouterInterface $router,
        Template\TemplateRendererInterface $template = null
    ) {
        $this->router = $router;
        $this->template = $template;
    }

    public function __invoke(
        ServerRequestInterface $request, ResponseInterface $response,
        callable $next = null
    ) {
        $data = [];

        $data['routerName'] = 'Zend Router';
        $data['routerDocs']
                            = 'http://framework.zend.com/manual/current/en/modules/zend.mvc.routing.html';

        $data['templateName'] = 'Zend View';
        $data['templateDocs']
                              = 'http://framework.zend.com/manual/current/en/modules/zend.view.quick-start.html';

        return new HtmlResponse(
            $this->template->render('application::home-page', $data)
        );
    }
}
