<?php
// Routes

$app->get('/weibo/user','HomeController:index');


$app->put('/user', function ($request, $response, $args) {

    $parsedBody = $request->getParsedBody();
    var_dump($parsedBody);
    exit();
});

//因为在middleware中添加了中间件（全局应用），　所以每个路由都会走 crsf中间件
//根据源码里的分析 只有 'POST', 'PUT', 'DELETE', 'PATCH'方法检测 如果失败直接方法 ,
// 所有方法请求方法　生成新的crsf
$app->post('/yinliao',function($request, $response, $args){

    $body = $request->getParsedBody();
    echo '<pre>';
    print_r($body);
    var_dump($body['water'].'的价格是'.$body['price'].'人民币．');
    exit();

});



$app->get('/', function ($request, $response, $args) {

    $token = [
        'name'=>$request->getAttribute('csrf_name'),
        'val'=>$request->getAttribute('csrf_value'),
    ];
    return $this->renderer->render($response, 'xx.phtml', array_merge($args,$token));

    exit();

    $body = $response->getBody();
    $body->write('hello');

    return ' world';
    //$newResponse = $response->withHeader('Content-type', 'application/json');
    //return $response->withJson(['user'=>'lemon']);
    //exit();

    /*
    $headerValueString = $request->getHeaderLine('COOKIE');
    var_dump($headerValueString);
    exit();
    */

    /*
    $headers = $request->getHeaders();
    foreach ($headers as $name => $values) {
        echo $name . ": " . implode(", ", $values)."<br/>";
    }
    exit();
    */

    // Sample log message
    //echo get_class($this); //$this->container ,源代码利用 bindTo 绑定了作用域到container对象上

    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //Slim\Views\PhpRenderer -> dependencies.php 注入
    //$args ->  [{name}]捕获到的参数
    //return $this->renderer->render($response, 'index.phtml', $args);
    //return 'xx';
});

goto END;


//添加路由中间件$mw , $app->get 返回的是　route
$app->get('/lemon', function ($request, $response, $args) {
    return 'lemon';
})->add($mw);

//group多路由中间件 mw 是 middleware里面　添加的中间件
$app->group('/mw', function () use ($app) {

    $app->get('/date', function ($request, $response) {
        return $response->getBody()->write(date('Y-m-d H:i:s'));
    });

    $app->get('/time', function ($request, $response) {
        return $response->getBody()->write(time());
    });

});

//或者直接定义
$app->group('/utils', function () use ($app) {
    $app->get('/date', function ($request, $response) {
        return $response->getBody()->write(date('Y-m-d H:i:s'));
    });
    $app->get('/time', function ($request, $response) {
        return $response->getBody()->write(time());
    });
})->add(function ($request, $response, $next) {

    $response->getBody()->write('It is now ');
    $response = $next($request, $response);
    $response->getBody()->write('. Enjoy!');

    return $response;
});

END: