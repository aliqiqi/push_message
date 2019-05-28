<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/4/26
 * Time: 21:56
 */

namespace LinCmsTp5\admin\exception\logger;


use LinCmsTp5\exception\BaseException;

class LoggerException extends BaseException
{
    public $code = 400;
    public $msg  = '日志信息不能为空';
    public $error_code = 40001;
}