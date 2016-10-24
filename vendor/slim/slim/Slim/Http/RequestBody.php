<?php
/**
 * Slim Framework (http://slimframework.com)
 *
 * @link      https://github.com/slimphp/Slim
 * @copyright Copyright (c) 2011-2016 Josh Lockhart
 * @license   https://github.com/slimphp/Slim/blob/3.x/LICENSE.md (MIT License)
 */
namespace Slim\Http;

/**
 * Provides a PSR-7 implementation of a reusable raw request body
 */
class RequestBody extends Body
{
    /**
     * Create a new RequestBody.
     */
    public function __construct()
    {
        //打开临时区
        $stream = fopen('php://temp', 'w+');
        //在数据流之间进行复制操作,fopen('php://input', 'r')得到的资源流　复制到$stream()
        stream_copy_to_stream(fopen('php://input', 'r'), $stream);
        parent::__construct($stream);
    }
}
