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
        'to' => 'require|isEmail',
        'title' => 'require',
        'content'=> 'require'
    ];

    protected $message = [
        'to.require' => '收件人不能为空',
        'to.isEmail' => '必须为数组并且每个邮箱格式要正确',
        'title' => '邮件的标题不能为空',
        'content'=>'邮件的内容不能为空'
    ];

    protected function isEmail($value,$rule='',$data='',$field='')
    {
        if(!is_array($value))
        {
            return false;
        }
        foreach($value as $v)
        {
            $rule = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/';
            $result = preg_match($rule, $v);
            if(!$result){
                return false;
            }
        }
        return true;
    }
}