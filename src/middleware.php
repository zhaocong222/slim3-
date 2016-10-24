<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);


//添加１个应用程序中间件 ,每个传入（incoming） HTTP 请求调用
/*
$app->add(function ($request, $response, $next) {

    //$response->getBody() -> stream->write
    $response->getBody()->write("BEFORE<br>");
    //执行路由对应的匿名函数
    //var_dump(get_class($next)); Slim\App __invoke方法
    $response = $next($request, $response);

    $response->getBody()->write("<br>AFTER");

    return $response;
});
*/

//添加路由中间件，路由中间件只有在当前 HTTP 请求的方法和 URI 都与中间件所在路由相匹配时才会被调用
$mw = function ($request, $response, $next) {
    $response->getBody()->write('路由中间件before');
    $response = $next($request, $response);
    $response->getBody()->write('路由中间件after');

    return $response;
};

//crsf
$app->add(new \Slim\Csrf\Guard);