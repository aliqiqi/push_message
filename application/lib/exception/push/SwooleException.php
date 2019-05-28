<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/4/30
 * Time: 16:22
 */

namespace app\lib\exception\push;


use LinCmsTp5\exception\BaseException;

class SwooleException extends BaseException
{
    public $code = 412;
    public $msg  = '连接被拒绝请确认端口是否开启';
    public $errorCode = '40001';
}