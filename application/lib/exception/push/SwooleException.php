<?php
/**
 * Created by PhpStorm.
 */

namespace app\lib\exception\push;


use LinCmsTp5\exception\BaseException;

class SwooleException extends BaseException
{
    public $code = 412;
    public $msg  = '连接被拒绝请确认端口是否开启';
    public $error_code = '50001';
}