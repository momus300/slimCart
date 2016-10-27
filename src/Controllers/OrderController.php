<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;
use Cart\Basket\Basket;
use Cart\Models\Product;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

class OrderController
{
    /**
     * @var Basket
     */
    protected $basket;
    /**
     * @var Router
     */
    protected $router;

    public function __construct(Basket $basket, Router $router)
    {

        $this->basket = $basket;
        $this->router = $router;
    }

    public function index(Request $request, Response $response, Twig $view, Product $product, Basket $basket)
    {
        $this->basket->refresh();
        if (!$this->basket->subTotal()) {
            return $response->withRedirect($this->router->pathFor('cart.index'));
        }
        return $view->render($response, 'order/index.twig');
    }

    public function create(Request $request, Response $response)
    {
        $this->basket->refresh();

        if(!$this->basket->subTotal()){
            return $response->withRedirect($this->router->pathFor('cart.index'));
        }

        //validate
    }
}