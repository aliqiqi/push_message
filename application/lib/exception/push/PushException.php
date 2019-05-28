<?php
/**
 * Created by PhpStorm.
 */

namespace app\lib\exception\push;


use LinCmsTp5\exception\BaseException;

class PushException extends BaseException
{
    public $code = 400;
    public $msg  = '发送失败';
    public $error_code = '50002';
}