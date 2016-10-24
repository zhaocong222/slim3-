<?php


//读写方式
$stream = fopen('php://temp', 'w+');

//如果成功返回拷贝的字节数，否则false
$len = stream_copy_to_stream(fopen('./data.txt','r'),$stream);
//指针设为文件流的开头
rewind($stream);

//var_dump($len);

//从流文件获取内容
echo stream_get_contents($stream);

//或者
//while (!feof($stream)) {
//    echo fread($stream,100);
//}
