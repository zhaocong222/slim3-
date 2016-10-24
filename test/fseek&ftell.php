<?php
//data.txt 里内容 abcdefg

$fp = fopen(__DIR__.'/data.txt','r') or die('文件打开失败');

//print_r(fstat($fp));
//print_r(stream_get_meta_data($fp));

echo ftell($fp) , PHP_EOL; //输出刚打开文件的指针默认的位置，指针在文件的开头位置为0

echo fread($fp,2) , PHP_EOL; //读取文件中的前２个字符输出，指针位置变化

echo ftell($fp) , PHP_EOL;  //此时指针移动的位置在第2个字节处

/*
★SEEK_CUR:设置指针位置为当前位置加上第二个参数所提供的offset字节。
★SEEK_END:设置指针位置为EOF加上offset字节。在这里，offset必须设置为负值。
★SEEK_SET:设置指针位置为offset字节处。这与忽略第三个参数whence效果相同。
 */

fseek($fp,2,SEEK_CUR); //将指针位置移动到　当前位置(2) + 2的位置

echo ftell($fp) , PHP_EOL;  //指针当前指向的位置为4

echo fread($fp,1) , PHP_EOL; //读取１个字节　e, 此时指针指向5

fseek($fp,-7,SEEK_END); //又将指针移动到 文件末尾指针　＋　-7 的位置

echo fread($fp,1) , PHP_EOL; // 取１字节

rewind($fp); //又移动文件指针到文件的开头

echo ftell($fp); //指针在文件的开头位置，输出0

//关闭资源
fclose($fp);