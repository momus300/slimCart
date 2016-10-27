<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/27/16
 * Time: 5:58 PM
 */

namespace Cart\Middleware;


use Slim\Views\Twig;

class OldInputMiddleware
{
    protected $view;

    public function __construct(Twig $view)
    {

        $this->view = $view;
    }

    public function __invoke($request, $response, $next)
    {
        if(isset($_SESSION['old'])){
            $this->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
        }

        $_SESSION['old'] = $request->getParams();

        $response = $next($request, $response);
        return $response;
    }
}