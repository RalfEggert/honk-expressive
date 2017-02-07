<?php

namespace ApplicationTest\Action;

use Application\Action\HomePageAction;
use Prophecy\Prophecy\ObjectProphecy;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageActionTest extends \PHPUnit_Framework_TestCase
{
    /** @var RouterInterface */
    protected $router;

    /**
     * @var TemplateRendererInterface|ObjectProphecy
     */
    protected $template;

    protected function setUp()
    {
        $this->router   = $this->prophesize(RouterInterface::class);
        $this->template = $this->prophesize(TemplateRendererInterface::class);
    }

    public function testResponse()
    {
        $this->template->render('application::home-page', [])->willReturn('<html></html>')
            ->shouldBeCalled();

        $homePage = new HomePageAction($this->router->reveal(), $this->template->reveal());
        $response = $homePage(new ServerRequest(['/']), new Response(), function () {
        });

        $this->assertTrue($response instanceof Response);
    }
}
