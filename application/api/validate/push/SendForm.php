<?php
/**
 * Created by PhpStorm.
 * User: DevilKing
 * Date: 2019/5/26
 * Time: 12:45
 */

namespace app\api\validate\push;


use LinCmsTp5\validate\BaseValidate;

class SendForm extends BaseValidate
{
    protected $rule = [
        'to' => 'require|email',
        'title' => 'require',
        'content'=> 'require'
    ];

    protected $message = [
        'to.require' => '收件人不能为空',
        'to.email' => '必须是邮箱',
        'title' => '邮件的标题不能为空',
        'content'=>'邮件的内容不能为空'
    ];
}