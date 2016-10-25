<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class HomeController
{
    protected $app;
    protected $db;

    public function __construct(\Slim\Container $ci)
    {
        $this->app = $ci;
        //denpendencies.php依赖文件里返回的$capsule对象
        $this->db = $ci->get('db');
    }

    public function index(Request $request, Response $response, $args)
    {
        //echo get_class($this->db->table('user')); Illuminate\Database\Query\Builder
        //find(4) id = 4,写死了，如果表里面没有id字段，无法使用find方法
        $res = $this->db->table('user')->find(4);
        print_r($res);
    }
}