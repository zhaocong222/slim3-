<?php
$fp = fopen('http://127.0.0.1','r');
$res = stream_get_meta_data($fp);

print_r($res);
