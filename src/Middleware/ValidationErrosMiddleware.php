<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/27/16
 * Time: 5:58 PM
 */

namespace Cart\Middleware;


use Slim\Views\Twig;

class ValidationErrosMiddleware
{
    protected $view;

    public function __construct(Twig $view)
    {

        $this->view = $view;
    }

    public function __invoke($request, $response, $next)
    {
        if(isset($_SESSION['errors'])){
            $this->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
            unset($_SESSION['errors']);
        }

        $response = $next($request, $response);
        return $response;
    }
}