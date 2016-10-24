<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-10-20
 * Time: 上午9:41
 */
//var_dump(file_get_contents('php://input'));
//exit();

//var_dump(stream_get_contents(fopen('php://input', 'r')));
//exit();

$stream = fopen('php://temp', 'w+');
stream_copy_to_stream(fopen('php://input', 'r'), $stream);
rewind($stream);

echo stream_get_contents($stream);