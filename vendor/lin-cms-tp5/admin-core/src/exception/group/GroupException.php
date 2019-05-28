<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/2/19
 * Time: 16:43
 */

namespace LinCmsTp5\admin\exception\group;


use LinCmsTp5\exception\BaseException;

class GroupException extends BaseException
{
    public $code = 400;
    public $msg  = '分组错误';
    public $error_code  = 30000;
}