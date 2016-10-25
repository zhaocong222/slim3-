<?php
// DIC configuration

$container = $app->getContainer();

//注入renderer 和 logger
// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//注册db服务
$container['db'] = function($c){
    $capsule = new \Illuminate\Database\Capsule\Manager;
    //添加db配置信息
    $capsule->addConnection($c['settings']['db']);
    //把$capsule对象　$this赋值给自己的 $instance属性，
    //方便直接可以静态方法访问比如 \Illuminate\Database\Capsule\Manager::$instance
    $capsule->setAsGlobal();
    //启动
    $capsule->bootEloquent();

    return $capsule;

};

//把HomeController注入到容器中，注入了容器，callableresolver.php的resolve方法会走if ($this->container->has($class)) 里面
$container[HomeController::class] = function($c){
    return new HomeController($c);
};
