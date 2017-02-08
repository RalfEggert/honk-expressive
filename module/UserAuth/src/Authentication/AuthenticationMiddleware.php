<?php
namespace UserAuth\Authentication;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Request as DiactorosRequest;
use Zend\Stratigility\MiddlewareInterface;


/**
 * Class AuthenticationMiddleware
 *
 * @package UserAuth\Authentication
 */
class AuthenticationMiddleware implements MiddlewareInterface
{
    /**
     * @param Request|DiactorosRequest $request
     * @param Response                 $response
     * @param callable|null|null       $out
     *
     * @return mixed
     */
    public function __invoke(
        Request $request, Response $response, callable $out = null
    ) {
        $postData = $request->getParsedBody();

        if ($request->getMethod() != 'POST'
            || !isset($postData['submit-login'])
            || !isset($postData['username'])
            || !isset($postData['password'])
        ) {
            return $out($request, $response);
        }

        $postData = $request->getParsedBody();

        var_dump($postData);

        return $out($request, $response);
    }
}
