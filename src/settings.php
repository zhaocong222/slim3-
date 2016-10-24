<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => true, // Allow the web server to send the content-length header
        'responseChunkSize'=>200,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        //mysql
        'db'=>[
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'weibo',
            'username' => 'root',
            'password' => '123456',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],

    ],
];
