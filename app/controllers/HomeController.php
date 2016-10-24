<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class HomeController
{
    protected $app;

    public function __construct(\Slim\Container $ci)
    {
        $this->app = $ci;
    }

    public function index(Request $request, Response $response, $args)
    {
        echo '尼玛';
    }
}