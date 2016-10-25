<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class WeiboController
{
    protected $app;

    public function __construct(\Slim\Container $ci)
    {
        $this->app = $ci;
    }

    public function index(Request $request, Response $response, $args)
    {
        
    }
}