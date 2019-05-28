<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/4/30
 * Time: 16:22
 */

namespace app\lib\exception\push;


use LinCmsTp5\exception\BaseException;

class PushException extends BaseException
{
    public $code = 400;
    public $msg  = '发送失败';
    public $errorCode = '40002';
}